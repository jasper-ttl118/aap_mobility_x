<?php

namespace App\Livewire\Ams\Asset;

use Livewire\Component;
use App\Models\AssetCategory;
use Illuminate\Support\Facades\Validator;

class AddAssetForm extends Component
{
    // Inputs
    public $category_id, $category_name;
    public $condition_id, $condition_name;
    public $status_id, $status_name;
    public $asset_name;
    public $brand_id, $brand_name, $brand_name_custom;
    public $model_name;
    public $device_serial_number, $charger_serial_number;
    public $asset_type;
    public $department_id, $employee_id, $assigned_to_name;
    public $date_accountable;
    public $purchase_date, $warranty_exp_date, $warranty_years;
    public $free_replacement_value, $free_replacement_unit, $free_replacement_date;
    public $description;

    public function rules()
    {
        return [
            'category_id' => 'required|exists:asset_categories,category_id',
            'condition_id' => 'required|exists:asset_conditions,condition_id',
            'status_id' => 'required|exists:asset_statuses,status_id',
            'asset_name' => 'required|string|max:255',

            'brand_id' => 'required_if:category_id,1,6',
            'brand_name_custom' => 'required_unless:category_id,1,6',

            'model_name' => 'required|string|max:255',
            'asset_type' => 'required|in:1,2',
            'department_id' => 'required_if:asset_type,1',
            'employee_id' => 'required_if:asset_type,2',
            'date_accountable' => 'required|date|before_or_equal:today',
            'purchase_date' => 'required|date|before_or_equal:today',
            'warranty_exp_date' => 'nullable|date|after_or_equal:purchase_date',
            'warranty_years' => 'nullable|integer|min:0',
            'free_replacement_value' => 'nullable|integer|min:0',
            'free_replacement_unit' => 'nullable|in:DAYS,WEEKS',
            'free_replacement_date' => 'nullable|date|after_or_equal:purchase_date',
            'description' => 'nullable|string|max:2000',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addToQueue()
    {
    $validated = $this->validate();

    // Convert all string fields to uppercase
    foreach ($validated as $key => $value) {
        if (is_string($value)) {
            $validated[$key] = strtoupper($value);
        }
    }

    // Dispatch with transformed payload
    $this->dispatch('add-asset-to-queue', $validated);

    $this->reset();
    $this->dispatch('form-cleared');
   
    session()->flash('success', 'Asset validated and dispatched to queue.');
}


    public function render()
    {
        return view('livewire.ams.asset.add-asset-form', [
            'categories' => \App\Models\AssetCategory::all(),
            'conditions' => \App\Models\AssetCondition::all(),
            'statuses' => \App\Models\AssetStatus::all(),
            'brands' => \App\Models\Brand::all(),
            'departments' => \App\Models\Department::all(),
            'employees' => \App\Models\Employee::all(),
        ]);
    }
}
