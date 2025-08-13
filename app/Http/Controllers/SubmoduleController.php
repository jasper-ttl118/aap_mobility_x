<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomPermision as Permission;
use App\Models\Module;
use App\Models\Submodule;

class SubmoduleController extends Controller
{
    public function index()
    {
        $submodules = Submodule::with('module')->get();
        return view('role-permission.submodule.index', compact('submodules'));
    }

    public function create()
    {
        $modules = Module::get();
        return view('role-permission.submodule.create', compact('modules'));
    }

    public function store(Request $request)
    {
       
        // Validate the form inputs
        $request->validate([
            'submodule_name' => 'required|string|max:255',
            'submodule_description' => 'nullable|string|max:500',
            'module_id' => 'nullable|exists:modules,module_id',
            'modules' => 'nullable|string|max:255',
        ]);

        // Create the module
        Submodule::create([
            'submodule_name' => $request->submodule_name,
            'submodule_description' => $request->submodule_description,
            'module_id' => $request->module_id,

        ]);


        return redirect('submodule')->with('status','Sub-module Created Successfully');
    }

    public function edit(Submodule $submodule)
    {   
        $modules = Module::get();
        return view('role-permission.submodule.edit', compact('submodule', 'modules'));
    }

    public function update(Request $request, Submodule $submodule)
    {
        // Validate the form inputs
        $request->validate([
            'submodule_name' => 'required|string|max:255',
            'submodule_description' => 'nullable|string|max:500',
            'module_id' => 'nullable|exists:modules,module_id', // Ensure module exists
            'submodule_status' => 'required|integer|in:0,1',
        ]);
    
        // Update the submodule        
        $submodule->update([
            'submodule_name' => $request->submodule_name,
            'submodule_description' => $request->submodule_description,
            'submodule_status' => $request->submodule_status,
            'module_id' => $request->module_id, // Correct key name
        ]);
    
        return redirect('submodule')->with('status', 'Submodule Updated Successfully ');
    }

    public function destroy($id)
    {
        $module = Submodule::find($id);
        $module->delete();
        return redirect('submodule')->with('status', 'Sub-module Deleted Successfully');
    }
}
