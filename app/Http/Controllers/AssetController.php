<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Brand;
use App\Models\Employee;
use App\Models\Department;
use App\Models\AssetStatus;
use Illuminate\Http\Request;
use App\Models\AssetCategory;
use App\Models\AssetCondition;
use Illuminate\Validation\Rule;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ams.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asset = Asset::with(['category', 'status', 'condition', 'department', 'employee'])
            ->findOrFail($id);

        return view('ams.assets.edit', [
            'asset' => $asset,
            'departments' => Department::all(),
            'employees' => Employee::all(),
            'categories' => AssetCategory::all(),
            'statuses' => AssetStatus::all(),
            'conditions' => AssetCondition::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'asset_name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'brand_id' => 'nullable|integer',
            'brand_name' => 'nullable|string|max:255',
            'model_name' => 'required|string|max:255',
            'status_id' => 'required|integer',
            'condition_id' => 'required|integer',
            'device_serial_number' => 'nullable|string|max:255',
            'charger_serial_number' => 'nullable|string|max:255',
            'operating_system' => 'nullable|string|max:255',
            'service_provider' => 'nullable|string|max:255',
            'asset_type' => 'required|string',
            'employee_id' => 'nullable|integer',
            'department_id' => 'nullable|integer',
            'date_accountable' => 'nullable|date',
            'purchase_date' => 'nullable|date',
            'warranty_exp_date' => 'nullable|date',
            'free_replacement_period' => 'nullable|date',
            'maint_sched' => 'nullable|date',
            'last_maint_sched' => 'nullable|date',
            'check_out_status' => 'nullable|string',
            'check_out_date' => 'nullable|date',
            'check_in_date' => 'nullable|date',
            'description' => 'nullable|string|max:1000',
        ]);
        // Determine brand saving logic based on category
        if (in_array((int) $request->category_id, [1, 6])) {
            $validated['brand_id'] = $request->brand_id;
            $validated['brand_name_custom'] = null;
        } else {
            $validated['brand_id'] = null;
            $validated['brand_name_custom'] = strtoupper($request->brand_name);
        }


        // Normalize text input to uppercase
        $request->merge([
            'asset_name' => strtoupper($request->asset_name),
            'model_name' => strtoupper($request->model_name),
            'brand_name' => strtoupper($request->brand_name),
            'device_serial_number' => strtoupper($request->device_serial_number),
            'charger_serial_number' => strtoupper($request->charger_serial_number),
            'operating_system' => strtoupper($request->operating_system),
            'service_provider' => strtoupper($request->service_provider),
            'description' => strtoupper($request->description),
        ]);

        // Apply logic for asset_type
        $validated['asset_type'] = $request->asset_type === 'common' ? 1 : 2;

        // Get the validated + merged (uppercase) values
        $validated = array_merge($validated, $request->only([
            'asset_name',
            'model_name',
            'brand_name',
            'device_serial_number',
            'charger_serial_number',
            'operating_system',
            'service_provider',
            'description',
        ]));

        // Perform update
        $asset = Asset::findOrFail($id);
        $asset->update($validated);

        return redirect()->route('allAssets')->with('success', 'Asset updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function dashboard()
    {
        return view('ams.dashboard.dashboard');
    }

    public function show($id)
    {
        $asset = Asset::with(['category', 'employee', 'department', 'status', 'condition'])->findOrFail($id);
        $brands = Brand::orderBy('brand_name')->get();
        $categories = AssetCategory::orderBy('category_name')->get();
        $status = AssetStatus::orderBy('status_name')->get();
        $conditions = AssetCondition::orderBy('condition_name')->get();
        $departments = Department::orderBy('department_name')->get();
        $employees = Employee::orderBy('employee_id')->get();


        return view('ams.assets.view', compact(
            'asset',
            'brands',
            'categories',
            'status',
            'conditions',
            'departments',
            'employees'
        ));

    }




    // CMS
    public function cms()
    {
        return view('ams.cms.branches-department');
    }
    public function employees()
    {
        return view('ams.cms.employees');
    }
    public function categories()
    {
        return view('ams.cms.categories');
    }
    public function addCategory()
    {
        return view('ams.cms.create-category');
    }
    public function status()
    {
        return view('ams.cms.status');
    }
    public function addStatus()
    {
        return view('ams.cms.create-status');
    }
    public function addBranch()
    {
        return view('ams.cms.create-branch');
    }
    public function addDepartment()
    {
        return view('ams.cms.create-department');
    }



    //Assets
    public function allAssets()
    {
        return view('ams.assets.asset', [
            'categories' => AssetCategory::orderBy('category_id')->get(),
            'statuses' => AssetStatus::orderBy('status_id')->get(),
            'conditions' => AssetCondition::orderBy('condition_id')->get(),
            'departments' => Department::orderBy('department_id')->get(),
        ]);
    }
    public function commonAssets()
    {
        return view('ams.assets.common-assets');
    }
    public function assetsForSale()
    {
        return view('ams.assets.assets-for-sale');
    }
    public function addAsset()
    {
        return view('ams.assets.create2', [
            'categories' => AssetCategory::orderBy('category_id')->get(),
            'statuses' => AssetStatus::orderBy('status_id')->get(),
            'conditions' => AssetCondition::orderBy('condition_id')->get(),
            'departments' => Department::orderBy('department_id')->get(),
            'brands' => Brand::orderBy('brand_id')->get(),
            'employees' => Employee::orderBy('employee_id')->get(),
        ]);
    }
    public function editAsset()
    {
        return view('ams.assets.edit');
    }
    public function assetHistory()
    {
        return view('ams.assets.history');
    }
    public function pulloutAsset()
    {
        return view('ams.assets.pullout');
    }
    public function repairRequestAsset()
    {
        return view('ams.assets.repair-request');
    }
    public function transferAsset()
    {
        return view('ams.assets.transfer');
    }
    public function borrowAsset()
    {
        return view('ams.assets.borrow');
    }

    // QR
    public function scanQr()
    {
        return view('ams.scan_qr.scan-qr');
    }

}
