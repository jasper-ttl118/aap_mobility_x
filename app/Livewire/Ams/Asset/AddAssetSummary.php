<?php

namespace App\Livewire\Ams\Asset;

use Livewire\Component;
use Livewire\Attributes\On;

class AddAssetSummary extends Component
{
    public $assets = [
        [
            'category_id' => '1',
            'condition_id' => '1',
            'status_id' => '2',

            'asset_name' => 'LAPTOP',
            'brand_id' => '3',
            'brand_name_custom' => null,
            'model_name' => 'INSPIRON 14',

            'asset_type' => '2',
            'department_id' => null,
            'employee_id' => '1',

            'date_accountable' => '2025-07-10',
            'purchase_date' => '2025-07-01',
            'warranty_exp_date' => '2027-07-01',
            'warranty_years' => 2,

            'free_replacement_value' => 14,
            'free_replacement_unit' => 'DAYS',
            'free_replacement_date' => '2025-07-15',

            'device_serial' => 'DL202507001',
            'charger_serial' => 'DLCHG5420-2025',

            'description' => 'Assigned for remote work and on-site duties.'
        ],
        [
            'category_id' => '3',
            'condition_id' => '2',
            'status_id' => '3',

            'asset_name' => 'PC',
            'brand_id' => null,
            'brand_name_custom' => 'HP',
            'model_name' => '400 G7 SFF',

            'asset_type' => '1',
            'department_id' => '2',
            'employee_id' => null,

            'date_accountable' => '2025-06-20',
            'purchase_date' => '2025-06-15',
            'warranty_exp_date' => '2026-06-15',
            'warranty_years' => 1,

            'free_replacement_value' => 30,
            'free_replacement_unit' => 'DAYS',
            'free_replacement_date' => '2025-07-15',

            'device_serial' => null,
            'charger_serial' => null,

            'description' => 'Spare unit for department overflow usage.'
        ]
    ];

    public $selected = null;
    public $checked = []; // track which indexes/assets are marked

    public function markChecked($index)
    {
        $this->checked[$index] = isset($this->checked[$index]) ? !$this->checked[$index] : true;

        if ($this->checked[$index]) {
            $this->selected = $index + 1;
        } else {
            $this->selected = null; // optional: collapse when unchecked
        }
    }

    protected $listeners = ['add-asset-to-queue' => 'addAssetToQueue', 'clearQueue'];


    #[On('add-asset-to-queue')]
    public function addAssetToQueue($payload)
    {

        $this->assets[] = $payload;
    }

    public function clearQueue()
    {
        $this->assets = [];
    }

    public function submitAll()
    {
        // You can insert into DB here or dispatch a job
        foreach ($this->assets as $asset) {
            // Asset::create($asset); // or call a service
        }

        $this->assets = [];
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

