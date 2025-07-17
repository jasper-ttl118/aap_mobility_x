<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users or customize as needed
    }

    public function rules(): array
    {
        return [
            'assets' => ['required', 'array', 'min:1'],

            'assets.*.asset_name' => ['required', 'string'],
            'assets.*.category_id' => ['required', 'exists:asset_categories,category_id'],
            'assets.*.status_id' => ['required', 'exists:asset_statuses,status_id'],
            'assets.*.condition_id' => ['required', 'exists:asset_conditions,condition_id'],

            'assets.*.brand_id' => ['nullable', 'exists:brands,brand_id'],
            'assets.*.brand_name_custom' => ['nullable', 'string'],

            'assets.*.model_name' => ['nullable', 'string'],
            'assets.*.device_serial_number' => ['nullable', 'string'],
            'assets.*.charger_serial_number' => ['nullable', 'string'],

            'assets.*.asset_type' => ['required', 'in:1,2'], // 1 = common, 2 = non-common
            'assets.*.employee_id' => ['nullable', 'exists:employees,employee_id'],
            'assets.*.department_id' => ['nullable', 'exists:departments,department_id'],

            'assets.*.purchase_date' => ['nullable', 'date'],
            'assets.*.warranty_exp_date' => ['nullable', 'date'],
            'assets.*.free_replacement_period' => ['nullable', 'string'],
            'assets.*.maint_sched' => ['nullable', 'date'],
            'assets.*.last_maint_sched' => ['nullable', 'date'],
            'assets.*.service_provider' => ['nullable', 'string'],
            'assets.*.check_out_status' => ['nullable', 'string'],
            'assets.*.check_out_date' => ['nullable', 'date'],
            'assets.*.check_in_date' => ['nullable', 'date'],
            'assets.*.date_accountable' => ['nullable', 'date'],
            'assets.*.description' => ['nullable', 'string'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            foreach ($this->assets as $index => $asset) {
                $category = $asset['category_id'] ?? null;
                $type = $asset['asset_type'] ?? null;

                $isITorMobile = in_array($category, ['1', '6']);

                // Brand validation
                if ($isITorMobile && empty($asset['brand_id'])) {
                    $validator->errors()->add("assets.$index.brand_id", "Brand Name is required.");
                }

                if (!$isITorMobile && empty($asset['brand_name_custom'])) {
                    $validator->errors()->add("assets.$index.brand_name_custom", "Brand Name is required.");
                }

                // Assignment validation
                if ($type == '1' && empty($asset['department_id'])) {
                    $validator->errors()->add("assets.$index.department_id", "Department is required for Common Assets.");
                }

                if ($type == '2' && empty($asset['employee_id'])) {
                    $validator->errors()->add("assets.$index.employee_id", "Employee is required for Non-Common Assets.");
                }
            }
        });
    }

    public function prepareForValidation(): void
    {
        $assets = collect($this->assets)->map(function ($asset) {
            return collect($asset)->map(function ($value) {
                return is_string($value) ? strtoupper($value) : $value;
            })->toArray();
        });

        $this->merge([
            'assets' => $assets->toArray()
        ]);
    }
}
