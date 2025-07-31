<?php

namespace App\Livewire\Ams\Asset;

use Livewire\Component;
use App\Models\AssetCategory;
use Illuminate\Support\Facades\Validator;
use function Termwind\render;

class AddAssetForm extends Component
{
    // Inputs
    public $category_id, $category_name;
    public $condition_id, $condition_name;
    public $status_id, $status_name;
    public $asset_name;
    public $property_code;
    public $brand_id, $brand_name, $brand_name_custom;
    public $model_name;
    public $device_serial_number, $charger_serial_number;
    public $asset_type, $asset_type_name;
    public $department_id, $employee_id, $assigned_to_name;
    public $date_accountable;
    public $purchase_date, $warranty_exp_date, $warranty_years;
    public $free_replacement_value, $free_replacement_unit, $free_replacement_date;
    public $description;
    public $searchTerm = '';
    public $filteredDepartments = [];
    public $filteredEmployees = [];
    protected $listeners = ['prefill-asset-form' => 'loadAsset','form-cleared' => 'render'];

    public function mount()
    {
        $this->filteredDepartments = \App\Models\Department::all();
        $this->filteredEmployees = \App\Models\Employee::all();
    }

    public function updatedSearchTerm()
    {
        if ($this->asset_type === '1') {
            $this->filteredDepartments = \App\Models\Department::where('department_name', 'like', '%' . $this->searchTerm . '%')->get();
        } elseif ($this->asset_type === '2') {
            $this->filteredEmployees = \App\Models\Employee::where(function ($query) {
                $query->where('employee_firstname', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('employee_lastname', 'like', '%' . $this->searchTerm . '%');
            })->get();
        }
    }

    public function updatedAssetType()
    {
        // $this->searchTerm = '';

        if ($this->asset_type === '1') {
            $this->filteredDepartments = \App\Models\Department::all();
        } elseif ($this->asset_type === '2') {
            $this->filteredEmployees = \App\Models\Employee::all();
        }
    }

    public function loadAsset($asset)
    {
        $this->property_code = $asset['property_code'] ?? null;
        $this->category_id = $asset['category_id'] ?? null;
        $this->category_name = $asset['category_name'] ?? null;
        $this->condition_id = $asset['condition_id'] ?? null;
        $this->condition_name = $asset['condition_name'] ?? null;
        $this->status_id = $asset['status_id'] ?? null;
        $this->status_name = $asset['status_name'] ?? null;
        $this->asset_name = $asset['asset_name'];
        $this->brand_id = $asset['brand_id'] ?? null;
        $this->brand_name_custom = $asset['brand_name_custom'] ?? null;
        $this->brand_name = $asset['brand_name'] ?? null;
        $this->model_name = $asset['model_name'] ?? '';
        $this->device_serial_number = $asset['device_serial_number'] ?? null;
        $this->charger_serial_number = $asset['charger_serial_number'] ?? null;

        $this->asset_type = $asset['asset_type'] ?? null;
        $this->asset_type_name = $asset['asset_type_name'] ?? null;
        $this->employee_id = $asset['employee_id'] ?? null;
        $this->department_id = $asset['department_id'] ?? null;
        $this->assigned_to_name = $asset['assigned_to_name'] ?? null;
        $this->date_accountable = $asset['date_accountable'] ?? null;


        $this->purchase_date = $asset['purchase_date'] ?? null;
        $this->warranty_exp_date = $asset['warranty_exp_date'] ?? null;
        $this->warranty_years = $asset['warranty_years'] ?? null;
        $this->free_replacement_value = $asset['free_replacement_value'] ?? null;
        $this->free_replacement_unit = $asset['free_replacement_unit'] ?? null;
        $this->free_replacement_date = $asset['free_replacement_date'] ?? null;
        $this->description = $asset['description'] ?? '';

    }

    public function rules()
    {
        return [
            'property_code' => 'required|string|max:255',
            'category_id' => 'required|exists:asset_categories,category_id',
            'category_name' => 'nullable|string|max:255',
            'condition_id' => 'required|exists:asset_conditions,condition_id',
            'condition_name' => 'nullable|string|max:255',
            'status_id' => 'required|exists:asset_statuses,status_id',
            'status_name' => 'nullable|string|max:255',
            'asset_name' => 'required|string|max:255',
            'brand_id' => 'required_if:category_id,1,6',
            'brand_name_custom' => 'required_unless:category_id,1,6',
            'brand_name' => 'nullable|string|max:255',
            'model_name' => 'required|string|max:255',
            'device_serial_number' => 'nullable',
            'charger_serial_number' => 'nullable',

            'asset_type' => 'required|in:1,2',
            'asset_type_name' => 'nullable|string|max:255',
            'department_id' => 'required_if:asset_type,1',
            'employee_id' => 'required_if:asset_type,2',
            'assigned_to_name' => 'nullable|string|max:255',
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
        $this->$propertyName = strip_tags($this->$propertyName);
    }

    public function addToQueue()
    {

        // Apply category-based nulling logic
        if (in_array($this->category_id, [1, 6])) {
            // IT Equipment or Mobile Devices: Use dropdown brand
            $this->brand_name_custom = null;
        } else {
            // Other categories: Use manual brand input
            $this->brand_id = null;
            $this->brand_name = null;
        }

        // Trim custom brand input before validation
        $this->brand_name_custom = trim($this->brand_name_custom) === '' ? null : $this->brand_name_custom;

        // Validate input
        $validated = $this->validate();

        // Convert all string fields to uppercase
        foreach ($validated as $key => $value) {
            if (is_string($value)) {
                $validated[$key] = strtoupper($value);
            }
        }

        // Dispatch with transformed payload
        $this->dispatch('add-asset-to-queue', $validated);

        // Reset form
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
