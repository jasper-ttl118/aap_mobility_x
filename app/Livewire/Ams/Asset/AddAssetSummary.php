<?php

namespace App\Livewire\Ams\Asset;

use App\Models\Asset;
use Livewire\Component;
use Livewire\Attributes\On;

class AddAssetSummary extends Component
{
    public $assets = [];
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

    #[On('add-asset-to-queue')]
    public function addAssetToQueue($payload)
    {
        $this->assets = collect($this->assets)
            ->reject(fn($asset) => $asset['property_code'] === $payload['property_code'])
            ->values()
            ->toArray();

        $this->assets[] = $payload;
    }

    public function clearQueue()
    {
        $this->assets = [];
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
        if (!isset($this->assets[$index]))
            return;

        $asset = $this->assets[$index];

        // Emit event with full asset payload to AddAssetForm
        $this->dispatch('prefill-asset-form', asset: $asset);
    }
    public function removeAsset($index)
    {
        if (isset($this->assets[$index])) {
            unset($this->assets[$index]);

            // Reindex the array to prevent broken indexes
            $this->assets = array_values($this->assets);
        }
    }

    public function submitAll()
    {
        foreach ($this->assets as $asset) {

            $asset['employee_id'] = $asset['employee_id'] ?: null;
            $asset['department_id'] = $asset['department_id'] ?: null;
            $asset['free_replacement_date'] = !empty($asset['free_replacement_date']) ? $asset['free_replacement_date'] : null;

            Asset::create([
                'asset_name' => $asset['asset_name'],
                'brand_id' => $asset['brand_id'],
                'brand_name_custom' => $asset['brand_name_custom'],
                'model_name' => $asset['model_name'],
                'property_code' => $asset['property_code'],

                'category_id' => $asset['category_id'],
                'status_id' => $asset['status_id'],
                'condition_id' => $asset['condition_id'],

                'device_serial_number' => $asset['device_serial_number'],
                'charger_serial_number' => $asset['charger_serial_number'],

                'asset_type' => $asset['asset_type'],
                'department_id' => $asset['department_id'],
                'employee_id' => $asset['employee_id'],
                'date_accountable' => $asset['date_accountable'],

                'purchase_date' => $asset['purchase_date'],
                'warranty_exp_date' => $asset['warranty_exp_date'],
                'free_replacement_period' => $asset['free_replacement_date'],

                'description' => $asset['description'],
            ]);
        }

        $this->assets = [];
        $this->checked = [];
        $this->dispatch('form-cleared');

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

