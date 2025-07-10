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


        $validated['asset_type'] = $request->asset_type === 'common' ? 1 : 2;
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
        return view('ams.assets.view', compact('asset'));
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
            'categories' => AssetCategory::orderBy('category_name')->get(),
            'statuses' => AssetStatus::orderBy('status_name')->get(),
            'conditions' => AssetCondition::orderBy('condition_name')->get(),
            'departments' => Department::orderBy('department_name')->get(),
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
        return view('ams.assets.create2');
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
