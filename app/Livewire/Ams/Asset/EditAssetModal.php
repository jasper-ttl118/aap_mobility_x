<?php

namespace App\Livewire\Ams\Asset;

use App\Models\Asset;
use App\Models\Brand;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use App\Models\AssetStatus;
use App\Models\AssetCategory;
use App\Models\AssetCondition;

class EditAssetModal extends Component
{
    // Models
    public $asset;

    // UI States
    public $showModal = false;
    public $section = 'info';

    // Reference Data
    public $categories = [];
    public $statuses = [];
    public $conditions = [];
    public $departments = [];
    public $employees = [];
    public $brands = [];

    // Constants
    public $itCategoryIds = [1, 6]; // IT Equipment or Mobile Devices

    // Basic Info Fields
    public $asset_name;
    public $model_name;
    public $brand_id;
    public $brand_name_custom;
    public $category_id;
    public $status_id;
    public $condition_id;
    public $device_serial_number;
    public $charger_serial_number;
    public $initialCategoryGroup;
    public $triggerNameModal = false;

    // Assignment
    public $asset_type;
    public $employee_id;
    public $department_id;
    public $date_accountable;

    // Warranty
    public $purchase_date;
    public $warranty_exp_date;
    public $free_replacement_period;
    public $free_replacement_value;
    public $free_replacement_unit;

    // Maintenance
    public $maint_sched;
    public $last_maint_sched;
    public $service_provider;
    public $check_out_status;
    public $check_out_date;
    public $check_in_date;

    // Description
    public $description;

    protected $listeners = ['open-edit-asset-modal' => 'loadSection'];

    

    #[On('open-edit-asset-modal')]
    public function loadSection($payload)
    {
        $this->asset = Asset::with(['category', 'status', 'condition', 'department', 'employee'])
            ->findOrFail($payload['assetId']);

        // Assign editable fields
        $this->asset_name = $this->asset->asset_name;
        $this->model_name = $this->asset->model_name;

        if (!$this->category_id) {
            $this->category_id = $this->asset->category_id;
        }


        $this->status_id = $this->asset->status_id;
        $this->condition_id = $this->asset->condition_id;
        $this->asset_type = $this->asset->asset_type;
        $this->purchase_date = optional($this->asset->purchase_date)?->format('Y-m-d');
        $this->warranty_exp_date = optional($this->asset->warranty_exp_date)?->format('Y-m-d');
        $this->free_replacement_period = optional($this->asset->free_replacement_period)?->format('Y-m-d');
        $this->free_replacement_value = $this->asset->free_replacement_value;
        $this->free_replacement_unit = $this->asset->free_replacement_unit;
        $this->device_serial_number = $this->asset->device_serial_number;
        $this->charger_serial_number = $this->asset->charger_serial_number;
        $this->maint_sched = optional($this->asset->maint_sched)?->format('Y-m-d');
        $this->last_maint_sched = optional($this->asset->last_maint_sched)?->format('Y-m-d');
        $this->service_provider = $this->asset->service_provider;
        $this->check_out_status = $this->asset->check_out_status;
        $this->check_out_date = optional($this->asset->check_out_date)?->format('Y-m-d');
        $this->check_in_date = optional($this->asset->check_in_date)?->format('Y-m-d');
        $this->description = $this->asset->description;
        $this->date_accountable = optional($this->asset->date_accountable)?->format('Y-m-d');
        $this->initialCategoryGroup = $this->getCategoryGroup($this->category_id);

        if (in_array($this->category_id, $this->itCategoryIds)) {
            $this->brand_id = $this->asset->brand_id;
        } else {
            $this->brand_name_custom = $this->asset->brand_name_custom;
        }

        if ($this->asset_type == 1) {
            $this->department_id = $this->asset->department_id;
        } elseif ($this->asset_type == 2) {
            $this->employee_id = $this->asset->employee_id;
        }


        // Load select options
        $this->categories = AssetCategory::all();
        $this->statuses = AssetStatus::all();
        $this->conditions = AssetCondition::all();
        $this->departments = Department::all();
        $this->employees = Employee::all();
        $this->brands = Brand::all();

        $this->section = $payload['section'] ?? 'info';
        $this->showModal = true;
        $this->triggerNameModal = false;
    }
    private function getCategoryGroup($categoryId)
    {
        return in_array((int) $categoryId, $this->itCategoryIds) ? 'it_mobile' : 'other';
    }


    public function updatedAssetType($value)
    {
        if ($value == 1) {
            $this->employee_id = null;
        } elseif ($value == 2) {
            $this->department_id = null;
        }
    }

    public function checkBeforeSave()
    {
        $currentGroup = $this->getCategoryGroup($this->category_id);

        if ($currentGroup !== $this->initialCategoryGroup) {
            // Close the current modal
            $this->showModal = false;

            // Reopen modal with the name section
            $this->loadSection([
                'assetId' => $this->asset->asset_id,
                'section' => 'name',

            ]);
            $this->device_serial_number = null;
            $this->charger_serial_number = null;
            $this->showModal = true;
        } else {
            $this->validate([
                'asset_name' => 'required|string|max:255',
                'model_name' => 'required|string|max:255',
                'category_id' => 'required|exists:asset_categories,category_id',
                'status_id' => 'required|exists:asset_statuses,status_id',
                'condition_id' => 'required|exists:asset_conditions,condition_id',
                'asset_type' => 'required|in:1,2',
                'purchase_date' => 'required|date',
                'warranty_exp_date' => 'nullable|date|after_or_equal:purchase_date',
                'free_replacement_period' => 'nullable|date|after_or_equal:purchase_date',
                'free_replacement_value' => 'nullable|numeric',
                'free_replacement_unit' => 'nullable|string|in:days,weeks',
                'device_serial_number' => 'nullable|string|max:255',
                'charger_serial_number' => 'nullable|string|max:255',
                'maint_sched' => 'nullable|date',
                'last_maint_sched' => 'nullable|date',
                'service_provider' => 'nullable|string|max:255',
                'check_out_status' => 'nullable|string|max:255',
                'check_out_date' => 'nullable|date',
                'check_in_date' => 'nullable|date',
                'description' => 'nullable|string',
                'date_accountable' => 'nullable|date',
                'department_id' => 'nullable|required_if:asset_type,1|exists:departments,department_id',
                'employee_id' => 'nullable|required_if:asset_type,2|exists:employees,employee_id',
            ]);

            // Show confirmation modal in Alpine

            $this->dispatch('show-save-confirm');
        }
    }
    protected function uppercaseInputs()
    {
        foreach (get_object_vars($this) as $key => $value) {
            if (is_string($value)) {
                $this->$key = strtoupper($value);
            }
        }
    }


    public function save()
    {


        $this->uppercaseInputs();
        $this->asset->update([
            'asset_name' => $this->asset_name,
            'model_name' => $this->model_name,
            'category_id' => $this->category_id,
            'status_id' => $this->status_id,
            'condition_id' => $this->condition_id,
            'asset_type' => $this->asset_type,
            'purchase_date' => $this->purchase_date,
            'warranty_exp_date' => $this->warranty_exp_date,
            'free_replacement_period' => $this->free_replacement_period,
            'free_replacement_value' => $this->free_replacement_value,
            'free_replacement_unit' => $this->free_replacement_unit,
            'device_serial_number' => $this->device_serial_number,
            'charger_serial_number' => $this->charger_serial_number,
            'maint_sched' => $this->maint_sched,
            'last_maint_sched' => $this->last_maint_sched,
            'service_provider' => $this->service_provider,
            'check_out_status' => $this->check_out_status,
            'check_out_date' => $this->check_out_date,
            'check_in_date' => $this->check_in_date,
            'description' => $this->description,
            'date_accountable' => $this->date_accountable,
            'brand_id' => in_array($this->category_id, $this->itCategoryIds) ? $this->brand_id : null,
            'brand_name_custom' => !in_array($this->category_id, $this->itCategoryIds) ? $this->brand_name_custom : null,
            'department_id' => $this->asset_type == 1 ? $this->department_id : null,
            'employee_id' => $this->asset_type == 2 ? $this->employee_id : null,
        ]);

        session()->flash('message', 'Asset updated successfully.');
        $this->showModal = false;
        $this->dispatch('asset-saved');

    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.ams.asset.edit-asset-modal');
    }
}
