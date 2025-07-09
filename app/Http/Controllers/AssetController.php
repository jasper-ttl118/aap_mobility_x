<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
        return view('ams.assets.asset');
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
