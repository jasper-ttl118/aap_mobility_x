<?php

namespace App\Livewire\Ams\Asset;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Brand;


class DuplicateError extends Component
{
    public $showDuplicateWarning = false;
    public $type = null;   // 'duplicate-mismatch-db' | 'duplicate-mismatch-batch' | 'merged-db' | 'merged-batch'
    public $error = null;

    protected $listeners = [
        'asset-merged-batch' => 'onAssetMergedBatch',
        'asset-merged-db' => 'onAssetMergedDb',
        'asset-duplicate-mismatch-1' => 'onAssetDuplicateMismatchDb',
        'asset-duplicate-mismatch-2' => 'onAssetDuplicateMismatchBatch',
    ];

    public function onAssetMergedBatch($payload = []): void
    {
        $p = $this->normalize($payload);
        $this->type = 'merged-batch';
        $this->error = $this->buildError($p) + ['merged_into' => $p['merged_into'] ?? null];
        $this->showDuplicateWarning = true;
    }

    public function onAssetMergedDb($payload = []): void
    {
        $p = $this->normalize($payload);
        $this->type = 'merged-db';
        $this->error = $this->buildError($p);
        $this->showDuplicateWarning = true;
    }

    public function onAssetDuplicateMismatchDb($payload = []): void
    {
        $p = $this->normalize($payload);
        $this->type = 'duplicate-mismatch-db';
        $this->error = $this->buildError($p);
        $this->showDuplicateWarning = true;
    }

    public function onAssetDuplicateMismatchBatch($payload = []): void
    {
        $p = $this->normalize($payload);
        $this->type = 'duplicate-mismatch-batch';
        $this->error = $this->buildError($p) + ['merged_into' => $p['merged_into'] ?? null];
        $this->showDuplicateWarning = true;
    }

    private function normalize($payload): array
    {
        if (is_array($payload) && isset($payload['payload']) && is_array($payload['payload'])) {
            return $payload['payload'];
        }
        return (array) $payload;
    }

    private function buildError(array $p): array
    {
        return [
            'row' => $p['index'] ?? null,
            'asset_name' => $p['asset_name'] ?? '',
            'category_id' => $p['category_id'] ?? null,
            'assignee' => $this->resolveAssigneeLabel($p['assignee_type'] ?? null, $p['assignee_id'] ?? null),
            'brand_label' => $this->resolveBrandLabel($p['brand_id'] ?? null, $p['brand_name_custom'] ?? null),
            'model_name' => $p['model_name'] ?? '',
        ];
    }

    private function resolveBrandLabel($brandId, $brandCustom): string
    {
        if (!empty($brandId)) {
            $b = Brand::select('brand_name')->find((int) $brandId);
            return $b?->brand_name ?? "Brand #{$brandId}";
        }
        return $brandCustom ? strtoupper($brandCustom) : 'Unknown Brand';
    }

    private function resolveAssigneeLabel(?string $type, ?int $id): string
    {
        if ($type === 'employee' && $id) {
            $e = Employee::select('employee_lastname', 'employee_firstname', 'employee_middlename')->find($id);
            if ($e) {
                $mi = $e->employee_middlename ? strtoupper(substr($e->employee_middlename, 0, 1)) . '.' : '';
                return strtoupper($e->employee_lastname) . ', ' . $e->employee_firstname . ' ' . $mi;
            }
            return "Employee #{$id}";
        }
        if ($type === 'department' && $id) {
            $d = Department::select('department_name')->find($id);
            return $d?->department_name ?? "Department #{$id}";
        }
        return 'Unknown assignee';
    }

    public function render()
    {
        return view('livewire.ams.asset.duplicate-error');
    }
}
