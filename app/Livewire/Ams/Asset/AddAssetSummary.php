<?php

namespace App\Livewire\Ams\Asset;

use App\Models\Asset;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class AddAssetSummary extends Component
{
    public $assets = [
        // [
        //     'category_id' => 1,
        //     'category_name' => 'IT EQUIPMENT',
        //     'property_code' => 'LPTP-MAIN-IT01-0001',
        //     'condition_id' => 1,
        //     'condition_name' => 'Excellent',
        //     'status_id' => 1,
        //     'status_name' => 'Available',
        //     'asset_name' => 'Laptop',
        //     'model_name' => 'LATITUDE 5420',
        //     'brand_id' => 1,
        //     'brand_name' => 'DELL',
        //     'brand_name_custom' => null,
        //     'device_serial_number' => 'DEV-123456',
        //     'charger_serial_number' => 'CHR-654321',
        //     'imei1' => null,
        //     'imei2' => null,
        //     'acquisition_cost' => 55000,
        //     'asset_type' => 2,
        //     'asset_type_name' => 'Non-Common',
        //     'employee_id' => 1,
        //     'department_id' => null,
        //     'assigned_to_name' => 'DOE, JOHN A.',
        //     'date_accountable' => '2025-07-01',
        //     'purchase_date' => '2024-06-15',
        //     'warranty_exp_date' => '2027-06-15',
        //     'warranty_years' => 3,
        //     'free_replacement_value' => 30,
        //     'free_replacement_unit' => 'days',
        //     'free_replacement_date' => '2024-07-15',
        //     'description' => 'TEST LAPTOP ENTRY',
        //     'queue_id' => 1,
        // ],
        // [
        //     'category_id' => 6,
        //     'category_name' => 'MOBILE DEVICE',
        //     'property_code' => 'TBLT-MAIN-MOB1-0002',
        //     'condition_id' => 2,
        //     'condition_name' => 'Good',
        //     'status_id' => 2,
        //     'status_name' => 'In Use',
        //     'asset_name' => 'Tablet',
        //     'model_name' => 'GALAXY TAB A9',
        //     'brand_id' => 2,
        //     'brand_name' => 'SAMSUNG',
        //     'brand_name_custom' => null,
        //     'device_serial_number' => null,
        //     'charger_serial_number' => null,
        //     'imei1' => '356789012345678',
        //     'imei2' => '356789012345679',
        //     'acquisition_cost' => 25000,
        //     'asset_type' => 1,
        //     'asset_type_name' => 'Common',
        //     'employee_id' => null,
        //     'department_id' => 2,
        //     'assigned_to_name' => 'IT DEPARTMENT',
        //     'date_accountable' => '2025-07-05',
        //     'purchase_date' => '2024-05-20',
        //     'warranty_exp_date' => '2026-05-20',
        //     'warranty_years' => 2,
        //     'free_replacement_value' => 12,
        //     'free_replacement_unit' => 'weeks',
        //     'free_replacement_date' => '2024-08-12',
        //     'description' => 'TEST TABLET ENTRY',
        //     'queue_id' => 2,
        // ],
    ];

    public $selected = null;
    public $checked = []; // track which indexes/assets are marked
    protected $listeners = [
        'add-asset-to-queue' => 'addAssetToQueue',
        'clearQueue',
        'submitAll'
    ];

    public function markChecked($index)
    {
        $this->checked[$index] = isset($this->checked[$index]) ? !$this->checked[$index] : true;

        if ($this->checked[$index]) {
            $this->selected = $index + 1;
        } else {
            $this->selected = null; // optional: collapse when unchecked
        }
    }

    public function checkAll()
    {
        if (count($this->checked) === count($this->assets) && !in_array(false, $this->checked, true)) {
            // All currently checked → uncheck all
            $this->checked = array_fill(0, count($this->assets), false);
            $this->selected = null;
        } else {
            // Check all
            $this->checked = array_fill(0, count($this->assets), true);
            $this->selected = null; // or set to a specific index if needed
        }
    }


    #[On('add-asset-to-queue')]
    public function addAssetToQueue($payload)
    {
        if (count($this->assets) >= 5) {
            $this->dispatch('queue-full');
            return;
        }

        $qid = $payload['queue_id'] ?? null;

        $this->assets = collect($this->assets)
            ->when($qid, fn($c) => $c->reject(fn($a) => ($a['queue_id'] ?? null) === $qid))
            ->values()
            ->push($payload)
            ->toArray();
    }


    public function clearQueue()
    {
        $this->assets = [];
        $this->checked = [];
    }

    public function confirmSubmit()
    {
        $this->dispatch('open-confirm');
    }
    public function confirmClear()
    {
        $this->dispatch('open-clear');
    }

    public function editAsset($index)
    {
        if (!isset($this->assets[$index])) {
            return;
        }

        // Copy asset from queue
        $asset = $this->assets[$index];

        // Remove property_code so AddAssetForm will regenerate it
        unset($asset['property_code']);


        // Emit event with modified payload
        $this->dispatch('prefill-asset-form', asset: $asset);
    }

    public function removeAsset($index)
    {
        if (isset($this->assets[$index])) {
            unset($this->assets[$index]);

            // Also remove corresponding checked status if it exists
            if (isset($this->checked[$index])) {
                unset($this->checked[$index]);
            }

            // Reindex both arrays to maintain alignment
            $this->assets = array_values($this->assets);
            $this->checked = array_values($this->checked);
        }
    }


    private function assigneeKey(array $a): ?string
    {
        $t = (int) ($a['asset_type'] ?? 0);
        if ($t === 2 && !empty($a['employee_id']))
            return 'E:' . (int) $a['employee_id'];
        if ($t === 1 && !empty($a['department_id']))
            return 'D:' . (int) $a['department_id'];
        return null;
    }

    // public function submitAll()
    // {
    //     if (empty($this->assets)) {
    //         $this->dispatch('no-assets-to-submit'); 
    //         session()->flash('success', 'No assets to submit.');
    //         return;
    //     }

    //     DB::transaction(function () {
    //         // Collect assignees in this batch
    //         $empIds = [];
    //         $deptIds = [];
    //         foreach ($this->assets as $a) {
    //             $t = (int) ($a['asset_type'] ?? 0);
    //             if ($t === 2 && !empty($a['employee_id']))
    //                 $empIds[] = (int) $a['employee_id'];
    //             if ($t === 1 && !empty($a['department_id']))
    //                 $deptIds[] = (int) $a['department_id'];
    //         }
    //         $empIds = array_values(array_unique(array_filter($empIds)));
    //         $deptIds = array_values(array_unique(array_filter($deptIds)));

    //         // Seed "seen" from DB (case-insensitive on name), lock to prevent races
    //         // Map: $seen[$assigneeKey][$category_id][ASSET_NAME_UPPER] = true
    //         $seen = [];

    //         if ($empIds || $deptIds) {
    //             $existing = Asset::query()
    //                 ->when($empIds, fn($q) => $q->whereIn('employee_id', $empIds))
    //                 ->orWhere(fn($q) => $deptIds ? $q->whereIn('department_id', $deptIds) : $q)
    //                 ->select('employee_id', 'department_id', 'category_id', 'asset_name')
    //                 ->lockForUpdate()
    //                 ->get();

    //             foreach ($existing as $row) {
    //                 $key = $row->employee_id ? 'E:' . (int) $row->employee_id : 'D:' . (int) $row->department_id;
    //                 $seen[$key][$row->category_id][mb_strtoupper(trim((string) $row->asset_name))] = true;
    //             }
    //         }

    //         // Validate batch against DB + within-batch dupes
    //         $conflicts = [];
    //         foreach ($this->assets as $i => $a) {
    //             $assignee = $this->assigneeKey($a);
    //             $catId = (int) ($a['category_id'] ?? 0);
    //             $nameRaw = (string) ($a['asset_name'] ?? '');
    //             $nameKey = mb_strtoupper(trim($nameRaw));

    //             if (!$assignee || !$catId || $nameKey === '') {
    //                 $conflicts[] = "Row #" . ($i + 1) . ": missing assignee, category, or asset_name.";
    //                 continue;
    //             }

    //             if (!empty($seen[$assignee][$catId][$nameKey])) {
    //                 $conflicts[] = "Row #" . ($i + 1) . ": duplicate '{$nameRaw}' in category {$catId} for {$assignee}.";
    //                 continue;
    //             }

    //             // Reserve to catch within-batch duplicates
    //             $seen[$assignee][$catId][$nameKey] = true;

    //             // Optional: enforce unique property_code if provided
    //             if (
    //                 !empty($a['property_code']) &&
    //                 Asset::where('property_code', $a['property_code'])->lockForUpdate()->exists()
    //             ) {
    //                 $conflicts[] = "Row #" . ($i + 1) . ": property_code exists ({$a['property_code']}).";
    //             }
    //         }

    //         if ($conflicts) {
    //             throw ValidationException::withMessages(['assets' => $conflicts]);
    //         }

    //         // Create
    //         foreach ($this->assets as $asset) {
    //             $asset['employee_id'] = $asset['employee_id'] ?: null;
    //             $asset['department_id'] = $asset['department_id'] ?: null;
    //             $asset['free_replacement_date'] = !empty($asset['free_replacement_date']) ? $asset['free_replacement_date'] : null;

    //             Asset::create([
    //                 'asset_name' => $asset['asset_name'],
    //                 'brand_id' => $asset['brand_id'] ?? null,
    //                 'brand_name_custom' => $asset['brand_name_custom'] ?? null,
    //                 'model_name' => $asset['model_name'],
    //                 'property_code' => $asset['property_code'] ?? null,

    //                 'category_id' => $asset['category_id'],
    //                 'status_id' => $asset['status_id'],
    //                 'condition_id' => $asset['condition_id'],

    //                 'device_serial_number' => $asset['device_serial_number'] ?? null,
    //                 'charger_serial_number' => $asset['charger_serial_number'] ?? null,

    //                 'asset_type' => $asset['asset_type'],
    //                 'department_id' => $asset['department_id'],
    //                 'employee_id' => $asset['employee_id'],
    //                 'date_accountable' => $asset['date_accountable'] ?? null,

    //                 'purchase_date' => $asset['purchase_date'] ?? null,
    //                 'warranty_exp_date' => $asset['warranty_exp_date'] ?? null,
    //                 'free_replacement_period' => $asset['free_replacement_date'] ?? null, // your current field

    //                 'description' => $asset['description'] ?? null,
    //             ]);
    //         }
    //     });

    //     $this->assets = [];
    //     $this->checked = [];
    //     $this->dispatch('form-cleared');
    //     $this->dispatch('show-success-modal');
    //     session()->flash('success', 'Assets stored successfully.');
    // }


    public function submitAll()
{
    if (empty($this->assets)) {
        $this->dispatch('no-assets-to-submit');
        session()->flash('success', 'No assets to submit.');
        return;
    }

    DB::transaction(function () {
        // Collect assignees
        $empIds = [];
        $deptIds = [];
        foreach ($this->assets as $a) {
            $t = (int) ($a['asset_type'] ?? 0);
            if ($t === 2 && !empty($a['employee_id']))      $empIds[]  = (int) $a['employee_id'];
            elseif ($t === 1 && !empty($a['department_id']))$deptIds[] = (int) $a['department_id'];
        }
        $empIds  = array_values(array_unique(array_filter($empIds)));
        $deptIds = array_values(array_unique(array_filter($deptIds)));

        // DB map only
        $seenDb = [];
        if ($empIds || $deptIds) {
            $existing = Asset::query()
                ->when($empIds, fn($q) => $q->whereIn('employee_id', $empIds))
                ->orWhere(fn($q) => $deptIds ? $q->whereIn('department_id', $deptIds) : $q)
                ->select('employee_id','department_id','category_id','asset_name','brand_id','brand_name_custom','model_name')
                ->lockForUpdate()
                ->get();

            foreach ($existing as $row) {
                $assigneeKey = $row->employee_id ? 'E:'.$row->employee_id : 'D:'.$row->department_id;
                $nameKey     = mb_strtoupper(trim((string) $row->asset_name));
                $seenDb[$assigneeKey][$row->category_id][$nameKey][] = [
                    'brand_id'          => $row->brand_id ? (int) $row->brand_id : null,
                    'brand_name_custom' => $row->brand_id ? null : ($row->brand_name_custom ? mb_strtoupper(trim($row->brand_name_custom)) : null),
                    'model_key'         => mb_strtoupper(trim((string) $row->model_name)),
                ];
            }
        }

        // Helpers
        $normCombo = function (array $a): array {
            return [
                'brand_id'          => !empty($a['brand_id']) ? (int) $a['brand_id'] : null,
                'brand_name_custom' => empty($a['brand_id']) && !empty($a['brand_name_custom'])
                    ? mb_strtoupper(trim((string) $a['brand_name_custom'])) : null,
                'model_key'         => mb_strtoupper(trim((string) ($a['model_name'] ?? ''))),
            ];
        };
        $comboEq = function (array $x, array $y): bool {
            if (($x['model_key'] ?? null) !== ($y['model_key'] ?? null)) return false;
            if (!empty($x['brand_id']) || !empty($y['brand_id'])) {
                return ($x['brand_id'] ?? null) === ($y['brand_id'] ?? null);
            }
            return ($x['brand_name_custom'] ?? null) === ($y['brand_name_custom'] ?? null);
        };
        $makeKey = fn($k,$c,$n) => $k.'|'.$c.'|'.$n;

        // Batch-only maps
        $seenBatch  = [];
        $batchFirst = [];

        // Validation + merge
        $conflicts = [];
        $cMissing = 0;
        $cDupMismatch = 0;
        $cPcode = 0;
        $skip = [];

        foreach ($this->assets as $i => $a) {
            $idx     = $i + 1;
            $catId   = (int) ($a['category_id'] ?? 0);
            $nameRaw = (string) ($a['asset_name'] ?? '');
            $nameKey = mb_strtoupper(trim($nameRaw));
            $pc      = $a['property_code'] ?? null;

            // assignee
            $assigneeKey = null; $atype = null; $aid = null;
            $t = (int) ($a['asset_type'] ?? 0);
            if ($t === 2 && !empty($a['employee_id'])) {
                $atype = 'employee';   $aid = (int) $a['employee_id'];   $assigneeKey = 'E:'.$aid;
            } elseif ($t === 1 && !empty($a['department_id'])) {
                $atype = 'department'; $aid = (int) $a['department_id']; $assigneeKey = 'D:'.$aid;
            }

            // missing fields
            $missing = [];
            if (!$assigneeKey) $missing[] = 'assignee';
            if (!$catId)       $missing[] = 'category_id';
            if ($nameKey==='') $missing[] = 'asset_name';
            if ($missing) {
                $cMissing++;
                $this->dispatch('asset-missing', payload: [
                    'index'=>$idx,'missing'=>$missing,'category_id'=>$catId,'asset_name'=>$nameRaw,
                    'assignee_type'=>$atype,'assignee_id'=>$aid,
                ]);
                $conflicts[] = "Row #{$idx}: missing ".implode(', ', $missing).'.';
                continue;
            }

            $k   = $makeKey($assigneeKey, $catId, $nameKey);
            $cur = $normCombo($a);

            // 1) check DB only
            if (!empty($seenDb[$assigneeKey][$catId][$nameKey])) {
                $matchesDb = false;
                foreach ($seenDb[$assigneeKey][$catId][$nameKey] as $combo) {
                    if ($comboEq($cur, $combo)) { $matchesDb = true; break; }
                }
                if ($matchesDb) {
                    $skip[$i] = true;
                    $this->dispatch('asset-merged-db', payload: [
                        'index'=>$idx,'category_id'=>$catId,'asset_name'=>$nameRaw,
                        'assignee_type'=>$atype,'assignee_id'=>$aid,
                        'brand_id'=>$a['brand_id'] ?? null,'brand_name_custom'=>$a['brand_name_custom'] ?? null,
                        'model_name'=>$a['model_name'] ?? '',
                    ]);
                    continue;
                }
                $cDupMismatch++;
                $this->dispatch('asset-duplicate-mismatch-1', payload: [
                    'index'=>$idx,'category_id'=>$catId,'asset_name'=>$nameRaw,
                    'assignee_type'=>$atype,'assignee_id'=>$aid,
                    'brand_id'=>$a['brand_id'] ?? null,'brand_name_custom'=>$a['brand_name_custom'] ?? null,
                    'model_name'=>$a['model_name'] ?? '',
                ]);
                $conflicts[] = "Row #{$idx}: duplicate name with different brand/model (DB) for {$assigneeKey}.";
                continue;
            }

            // 2) check current batch only
            if (!empty($seenBatch[$assigneeKey][$catId][$nameKey])) {
                $firstIdx   = $batchFirst[$k]['index'] ?? null;
                $firstCombo = $batchFirst[$k]['combo'] ?? null;

                if ($firstCombo && $comboEq($cur, $firstCombo)) {
                    $skip[$i] = true;
                    $this->dispatch('asset-merged-batch', payload: [
                        'index'=>$idx,'merged_into'=>$firstIdx,'category_id'=>$catId,'asset_name'=>$nameRaw,
                        'assignee_type'=>$atype,'assignee_id'=>$aid,
                        'brand_id'=>$a['brand_id'] ?? null,'brand_name_custom'=>$a['brand_name_custom'] ?? null,
                        'model_name'=>$a['model_name'] ?? '',
                    ]);
                    continue;
                }

                $cDupMismatch++;
                $this->dispatch('asset-duplicate-mismatch-2', payload: [
                    'index'=>$idx,'merged_into'=>$firstIdx,'category_id'=>$catId,'asset_name'=>$nameRaw,
                    'assignee_type'=>$atype,'assignee_id'=>$aid,
                    'brand_id'=>$a['brand_id'] ?? null,'brand_name_custom'=>$a['brand_name_custom'] ?? null,
                    'model_name'=>$a['model_name'] ?? '',
                ]);
                $conflicts[] = "Row #{$idx}: duplicate name with different brand/model (batch) for {$assigneeKey}.";
                continue;
            }

            // 3) first time seen in batch → register
            $seenBatch[$assigneeKey][$catId][$nameKey][] = $cur;
            $batchFirst[$k] = ['index'=>$idx,'combo'=>$cur];

            // property code uniqueness (optional)
            if (!empty($pc) && Asset::where('property_code', $pc)->lockForUpdate()->exists()) {
                $cPcode++;
                $this->dispatch('asset-propertycode-duplicate', payload: [
                    'index'=>$idx,'property_code'=>$pc,
                ]);
                $conflicts[] = "Row #{$idx}: property_code exists ({$pc}).";
            }
        }

        if ($conflicts) {
            $this->dispatch('submit-blocked', totals: [
                'missing' => $cMissing,
                'duplicate_mismatch' => $cDupMismatch,
                'duplicate_property_code' => $cPcode,
                'total_rows' => count($this->assets),
            ]);
            throw \Illuminate\Validation\ValidationException::withMessages(['assets' => $conflicts]);
        }

        // Create only non-skipped rows
        foreach ($this->assets as $i => $asset) {
            if (!empty($skip[$i])) continue;

            $asset['employee_id']           = $asset['employee_id'] ?: null;
            $asset['department_id']         = $asset['department_id'] ?: null;
            $asset['free_replacement_date'] = !empty($asset['free_replacement_date']) ? $asset['free_replacement_date'] : null;

            Asset::create([
                'asset_name'             => $asset['asset_name'],
                'brand_id'               => $asset['brand_id'] ?? null,
                'brand_name_custom'      => $asset['brand_name_custom'] ?? null,
                'model_name'             => $asset['model_name'],
                'property_code'          => $asset['property_code'] ?? null,
                'category_id'            => $asset['category_id'],
                'status_id'              => $asset['status_id'],
                'condition_id'           => $asset['condition_id'],
                'device_serial_number'   => $asset['device_serial_number'] ?? null,
                'charger_serial_number'  => $asset['charger_serial_number'] ?? null,
                'imei1'                  => $asset['imei1'] ?? null,
                'imei2'                  => $asset['imei2'] ?? null,
                'asset_type'             => $asset['asset_type'],
                'department_id'          => $asset['department_id'],
                'employee_id'            => $asset['employee_id'],
                'date_accountable'       => $asset['date_accountable'] ?? null,
                'purchase_date'          => $asset['purchase_date'] ?? null,
                'warranty_exp_date'      => $asset['warranty_exp_date'] ?? null,
                'free_replacement_period'=> $asset['free_replacement_date'] ?? null,
                'description'            => $asset['description'] ?? null,
            ]);
        }
    });

    // success
    $this->dispatch('form-cleared');
    $this->dispatch('show-success-modal');
    // $this->dispatch('submit-success');

    $this->assets = [];
    $this->checked = [];
    session()->flash('success', 'Assets stored successfully.');
}




    public function render()
    {
        return view('livewire.ams.asset.add-asset-summary', [
            'categories' => \App\Models\AssetCategory::all(),
            'conditions' => \App\Models\AssetCondition::all(),
            'statuses' => \App\Models\AssetStatus::all(),
            'brands' => \App\Models\Brand::all(),
            'departments' => \App\Models\Department::all(),
            'employees' => \App\Models\Employee::all(),
        ]);
    }
}

