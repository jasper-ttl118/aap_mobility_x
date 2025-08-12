<?php

namespace App\Livewire\Ams\Asset;

use Carbon\Carbon;
use App\Models\Asset;
use App\Models\Branch;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Str;
use App\Models\AssetCategory;
use function Termwind\render;
use Illuminate\Support\Facades\Validator;

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
    public $device_serial_number, $charger_serial_number, $imei1, $imei2, $acquisition_cost;
    public $asset_type, $asset_type_name;
    public $department_id, $employee_id, $assigned_to_name;
    public $date_accountable;
    public $purchase_date, $warranty_exp_date, $warranty_years;
    public $free_replacement_value, $free_replacement_unit, $free_replacement_date;
    public $isAssetLoading;
    public $description;
    public $queue_id = null;
    public $searchTerm = '';
    public $filteredDepartments = [];
    public $filteredEmployees = [];
    public $showToast = false;

    protected $listeners = ['prefill-asset-form' => 'loadAsset', 'form-cleared' => 'render', 'queue-full' => 'queueFull'];

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
        if ($this->isAssetLoading)
            return;
        $this->property_code = null;
        if ($this->asset_type === '1') {
            $this->employee_id = null;
            $this->filteredDepartments = \App\Models\Department::all();
        } elseif ($this->asset_type === '2') {
            $this->department_id = null;
            $this->filteredEmployees = \App\Models\Employee::all();
        }
    }
    public function updatedCategoryId($value)
    {
        // Skip clearing if loading from backend
        if ($this->isAssetLoading)
            return;

        // Clear category-dependent fields
        $this->device_serial_number = '';
        $this->charger_serial_number = '';
        $this->imei1 = '';
        $this->imei2 = '';
        $this->acquisition_cost = '';
        $this->brand_id = '';
        $this->brand_name = '';
        $this->brand_name_custom = '';
    }
    public function updatedEmployeeId()
    {
        if ($this->isAssetLoading)
            return;
        if ((int) $this->asset_type === 2) {
            $this->property_code = null; // code depends on branch/department via employee
            // optionally mirror derived dept
            $this->resolveDepartmentIdFromContext(true);
        }
    }

    public function updatedDepartmentId()
    {
        if ($this->isAssetLoading)
            return;
        if ((int) $this->asset_type === 1) {
            $this->property_code = null; // code depends on dept for common
        }
    }

    public function updatedAssetName()
    {
        if ($this->isAssetLoading)
            return;
        $this->property_code = null; // first segment changes
    }

    public function loadAsset($asset)
    {
        $this->isAssetLoading = true;
        $this->category_id = $asset['category_id'] ?? null;
        $this->category_name = $asset['category_name'] ?? null;
        $this->property_code = '';
        $this->condition_id = $asset['condition_id'] ?? null;
        $this->condition_name = $asset['condition_name'] ?? null;
        $this->status_id = $asset['status_id'] ?? null;
        $this->status_name = $asset['status_name'] ?? null;
        $this->asset_name = $asset['asset_name'] ?? null;
        $this->model_name = $asset['model_name'] ?? '';

        // Brand logic
        if (in_array($this->category_id, [1, 6])) {
            $this->brand_id = $asset['brand_id'] ?? null;
            $this->brand_name = $asset['brand_name'] ?? null;
            $this->brand_name_custom = null;
        } else {
            $this->brand_id = null;
            $this->brand_name = null;
            $this->brand_name_custom = $asset['brand_name_custom'] ?? null;
        }


        // IT category (e.g., Desktop, Laptop)
        if ($this->category_id == 1) {
            $this->device_serial_number = $asset['device_serial_number'] ?? null;
            $this->charger_serial_number = $asset['charger_serial_number'] ?? null;
            $this->imei1 = null;
            $this->imei2 = null;
        }

        // Mobile category (e.g., Phone, Tablet)
        elseif ($this->category_id == 6) {
            $this->imei1 = $asset['imei1'] ?? null;
            $this->imei2 = $asset['imei2'] ?? null;
            $this->device_serial_number = null;
            $this->charger_serial_number = null;
        }

        // Clear all serial fields if not IT or Mobile
        else {
            $this->device_serial_number = null;
            $this->charger_serial_number = null;
            $this->imei1 = null;
            $this->imei2 = null;
        }

        // Acquisition cost is only relevant for category 1 and 6
        $this->acquisition_cost = in_array($this->category_id, [1, 6]) ? ($asset['acquisition_cost'] ?? null) : null;

        // Asset assignment
        $this->asset_type = $asset['asset_type'] ?? null;
        $this->asset_type_name = $asset['asset_type_name'] ?? null;
        $this->employee_id = $asset['employee_id'] ?? null;
        $this->department_id = $asset['department_id'] ?? null;
        $this->assigned_to_name = $asset['assigned_to_name'] ?? null;
        $this->date_accountable = $asset['date_accountable'] ?? null;

        // Warranty and replacement
        $this->purchase_date = $asset['purchase_date'] ?? null;
        $this->warranty_exp_date = $asset['warranty_exp_date'] ?? null;
        $this->warranty_years = $asset['warranty_years'] ?? null;
        $this->free_replacement_value = $asset['free_replacement_value'] ?? null;
        $this->free_replacement_unit = $asset['free_replacement_unit'] ?? null;
        $this->free_replacement_date = $asset['free_replacement_date'] ?? null;

        $this->description = $asset['description'] ?? '';
        $this->queue_id = $asset['queue_id'] ?? null;
        $this->isAssetLoading = false;
    }

    public function queueFull()
    {
        $this->showToast = true;
        $this->dispatch('hide-toast', ['timeout' => 2000]);
    }

    public function rules()
    {
        $rules = [
            'property_code' => 'nullable|string|max:255',

            // Category
            'category_id' => 'required|exists:asset_categories,category_id',
            'category_name' => 'nullable|string|max:255',

            // Asset Info
            'asset_name' => 'required|string|max:255',
            'model_name' => 'required|string|max:255',

            // Condition
            'condition_id' => 'required|exists:asset_conditions,condition_id',
            'condition_name' => 'nullable|string|max:255',

            // Status
            'status_id' => 'required|exists:asset_statuses,status_id',
            'status_name' => 'nullable|string|max:255',

            // Optional brand label
            'brand_name' => 'nullable|string|max:255',

            // Asset Type
            'asset_type' => 'required|in:1,2',
            'asset_type_name' => 'nullable|string|max:255',
            'department_id' => 'required_if:asset_type,1',
            'employee_id' => 'required_if:asset_type,2',
            'assigned_to_name' => 'nullable|string|max:255',

            // Date fields
            'date_accountable' => 'required|date|before_or_equal:today',
            'purchase_date' => 'required|date|before_or_equal:today',
            'warranty_exp_date' => 'required|date|after_or_equal:purchase_date',
            'warranty_years' => 'required|integer|min:0',

            // Replacement Period
            'free_replacement_value' => 'required|integer|min:0',
            'free_replacement_unit' => 'required|in:DAYS,WEEKS',
            'free_replacement_date' => 'nullable|date|after_or_equal:purchase_date',

            // Description
            'description' => 'required|string|max:2000',
        ];

        // Conditional IT Fields
        if ($this->category_id == 1) {
            $rules['device_serial_number'] = ['required', 'string', 'max:255'];
            $rules['charger_serial_number'] = ['required', 'string', 'max:255'];
        }

        // Conditional Mobile Fields
        if ($this->category_id == 6) {
            $rules['imei1'] = ['required', 'string', 'max:255'];
            $rules['imei2'] = ['required', 'string', 'max:255'];
        }

        // Acquisition Cost (IT or Mobile)
        if (in_array($this->category_id, [1, 6])) {
            $rules['acquisition_cost'] = ['required', 'string', 'max:255'];
        }

        // Brand logic
        if (in_array($this->category_id, [1, 6])) {
            $rules['brand_id'] = ['required', 'integer'];
        } else {
            $rules['brand_name_custom'] = ['required', 'string', 'max:255'];
        }

        return $rules;
    }


    public function updated($propertyName)
    {
        $this->$propertyName = strip_tags($this->$propertyName);
    }
    public function refreshDropdowns()
    {
        if ($this->asset_type === '1') {
            $this->filteredDepartments = \App\Models\Department::all();
        } elseif ($this->asset_type === '2') {
            $this->filteredEmployees = \App\Models\Employee::all();
        }

        if (!$this->asset_type) {
            $this->filteredDepartments = \App\Models\Department::all();
            $this->filteredEmployees = \App\Models\Employee::all();
        }
    }

    public function addToQueue()
    {
        if ((int) $this->asset_type === 2 && empty($this->department_id)) {
            $this->resolveDepartmentIdFromContext(true); // this can fill $this->department_id
        }

        if (empty($this->property_code)) {
            $this->generateAndAssignPropertyCodeOrFail();
            if (empty($this->property_code)) {
                return; // an error message was already added
            }
        }
        // dump($this->property_code);
        // Trim before validation
        $this->brand_name_custom = trim($this->brand_name_custom) === '' ? null : $this->brand_name_custom;

        // Nulling logic by category
        if ($this->category_id == 1) {
            // IT Equipment
            $this->imei1 = null;
            $this->imei2 = null;
            $this->brand_name_custom = null;
        } elseif ($this->category_id == 6) {
            // Mobile Devices
            $this->device_serial_number = null;
            $this->charger_serial_number = null;
            $this->brand_name_custom = null;
        } else {
            // Other Categories
            $this->device_serial_number = null;
            $this->charger_serial_number = null;
            $this->imei1 = null;
            $this->imei2 = null;
            $this->acquisition_cost = null;
            $this->brand_id = null;
            $this->brand_name = null;
        }

        
        if ((int) $this->asset_type === 2) {
            $this->department_id = null;
        }

        
        if ((int) $this->asset_type === 1) {
            $this->employee_id = null;
        }

        // Validate input
        $validated = $this->validate();

        // Convert all string fields to uppercase
        foreach ($validated as $key => $value) {
            if (is_string($value)) {
                $validated[$key] = strtoupper($value);
            }
        }

        if (empty($this->queue_id)) {
            $this->queue_id = (string) Str::uuid();
        }
        $validated['queue_id'] = $this->queue_id;

        // Dispatch with validated and transformed data
        $this->dispatch('add-asset-to-queue', $validated);

        // Optional debug output
        // dump($validated);

        // Reset form
        $this->reset([
            'property_code',
            'category_id',
            'category_name',
            'condition_id',
            'condition_name',
            'status_id',
            'status_name',
            'asset_name',
            'model_name',
            'brand_id',
            'brand_name',
            'brand_name_custom',
            'device_serial_number',
            'charger_serial_number',
            'imei1',
            'imei2',
            'acquisition_cost',
            'asset_type',
            'asset_type_name',
            'department_id',
            'employee_id',
            'assigned_to_name',
            'date_accountable',
            'purchase_date',
            'warranty_exp_date',
            'warranty_years',
            'free_replacement_value',
            'free_replacement_unit',
            'free_replacement_date',
            'description',
            'searchTerm',
        ]);

        // new item next time
        $this->queue_id = null;
        $this->resetDraft();

        // rehydrate dropdowns & clear validation
        $this->refreshDropdowns();
        $this->resetValidation();

        // notify Alpine etc.
        $this->dispatch('form-cleared');

        session()->flash('success', 'Asset validated and dispatched to queue.');
    }
    public function resetDraft(): void
    {
        // identifiers
        $this->queue_id = null;
        $this->property_code = null;

        // branch context used by generator
        $this->branch_id = null;
        $this->branch_code = null;
    }


    # ----------------------------------------------------------
    # Property Code Generation (NAME4-BRANCH-DEPT-####)
    # ----------------------------------------------------------


    public function generateAndAssignPropertyCodeOrFail(): void
    {
        $code = $this->buildPropertyCode(); // returns ?string
        if (!$code) {
            // buildPropertyCode already set $this->addError with a precise reason
            return;
        }
        $this->property_code = $code;
    }

    private function buildPropertyCode(): ?string
    {
        // Hard prereqs common to both types
        if (!$this->asset_name) {
            $this->addError('asset_name', 'Asset name is required before generating the code.');
            return null;
        }
        if ($this->asset_type === null || $this->asset_type === '') {
            $this->addError('asset_type', 'Select asset type (common/non-common) before generating the code.');
            return null;
        }
        if ((int) $this->asset_type === 2 && !$this->employee_id) {
            $this->addError('employee_id', 'Select an employee for non-common assets so we can resolve department/branch.');
            return null;
        }

        // ✅ Resolve department for either case (common: from form, non-common: from employee)
        $deptId = $this->resolveDepartmentIdFromContext(true);
        if (!$deptId) {
            $this->addError('department_id', 'Unable to resolve department (select one for common assets, or ensure the employee has a department).');
            return null;
        }

        // Parts
        $nameCode = $this->name4FromAssetName($this->asset_name);

        $dept = Department::find($deptId);
        if (!$dept) {
            $this->addError('department_id', 'Department not found.');
            return null;
        }
        $deptCode = strtoupper($dept->department_code ?: substr($dept->department_name ?? 'XXX', 0, 3));

        $year = now()->year;

        // Branch code (non-common: from employee’s branch; common: random for now)
        $branchCode = $this->resolveBranchCodeStrict();
        if (!$branchCode) {
            return null; // specific error already added
        }

        // Serial per prefix
        $prefix = sprintf('%s-%s-%s-%d-', $nameCode, $branchCode, $deptCode, $year);
        $latest = Asset::where('property_code', 'like', $prefix . '%')
            ->orderBy('property_code', 'desc')
            ->value('property_code');

        $next = $latest ? ((int) substr($latest, -4)) + 1 : 1;
        $serial = str_pad($next, 4, '0', STR_PAD_LEFT);

        return $prefix . $serial;
    }


    /** First letter (even if vowel) + next consonants until 4 total; pad with X. */
    protected function name4FromAssetName(string $name): string
    {
        // Remove all non-letters but keep spaces (temporarily)
        $clean = preg_replace('/[^A-Za-z\s]/', '', $name);

        // Remove spaces entirely now for processing
        $clean = str_replace(' ', '', $clean);

        // Uppercase everything
        $clean = strtoupper($clean);

        if ($clean === '') {
            return 'XXXX';
        }

        // First letter (even if vowel)
        $first = $clean[0];

        // Get the rest of the letters
        $rest = substr($clean, 1);

        // Remove vowels from the rest
        $restConsonants = preg_replace('/[AEIOU]/i', '', $rest);

        // Build up to 4 characters: first + consonants
        $code = $first . substr($restConsonants, 0, 3);
        $code = substr($code, 0, 4);

        // Pad with X if fewer than 4
        return str_pad($code, 4, 'X');
    }


    /**
     * For non-common (2): uses employee -> branch -> branch_code (required).
     * For common (1): picks a random branch_code (required to exist).
     * Returns UPPER branch_code or null; also sets an explicit validation error.
     */
    protected function resolveBranchCodeStrict(): ?string
    {
        if ((int) $this->asset_type === 2) {
            $emp = Employee::with('branch')->find($this->employee_id);
            if (!$emp) {
                $this->addError('employee_id', 'Employee not found.');
                return null;
            }
            if (!$emp->branch) {
                $this->addError('employee_id', 'Employee has no branch assigned.');
                return null;
            }
            $code = strtoupper((string) $emp->branch->branch_code);
            if ($code === '') {
                $this->addError('employee_id', 'Employee’s branch has no branch_code.');
                return null;
            }
            // optionally mirror on component:
            $this->branch_id = $emp->branch_id;
            $this->branch_code = $code;
            return $code;
        }

        // Common (1): random branch required
        $branch = Branch::inRandomOrder()->first();
        if (!$branch) {
            $this->addError('asset_type', 'No branches defined; cannot pick a random branch code.');
            return null;
        }
        $code = strtoupper((string) $branch->branch_code);
        if ($code === '') {
            $this->addError('asset_type', 'Randomly selected branch has empty branch_code.');
            return null;
        }
        $this->branch_id = $branch->branch_id ?? null;
        $this->branch_code = $code;
        return $code;
    }
    /**
     * Determine which department to use:
     * - Common (1): use $this->department_id from the form
     * - Non-common (2): derive from selected employee
     * Optionally mirror it back onto the form so the UI is consistent.
     */
    protected function resolveDepartmentIdFromContext(bool $mirrorToForm = true): ?int
    {
        // Common asset: department must be explicitly selected
        if ((int) $this->asset_type === 1) {
            return $this->department_id ? (int) $this->department_id : null;
        }

        // Non-common: derive from employee
        if ((int) $this->asset_type === 2) {
            if (!$this->employee_id) {
                return null;
            }
            $emp = Employee::find($this->employee_id);
            if (!$emp || !$emp->department_id) {
                return null;
            }
            if ($mirrorToForm && empty($this->department_id)) {
                // Mirror so downstream UI/state stays consistent
                $this->department_id = (int) $emp->department_id;
            }
            return (int) $emp->department_id;
        }

        return null;
    }




    public function render()
    {
        return view('livewire.ams.asset.add-asset-form', [
            'categories' => \App\Models\AssetCategory::all(),
            'conditions' => \App\Models\AssetCondition::all(),
            'statuses' => \App\Models\AssetStatus::all(),
            'brands' => \App\Models\Brand::all(),
            'departments' => $this->filteredDepartments,
            'employees' => $this->filteredEmployees,
        ]);
    }
}
