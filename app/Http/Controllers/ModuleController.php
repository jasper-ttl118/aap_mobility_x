<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\Module;
use App\Models\Submodule;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::with('submodules')->get();
        return view('role-permission.module.index', compact('modules'));
    }

    public function create()
    {
        $submodules = Submodule::get();

        return view('role-permission.module.create', compact('submodules'));
    }

    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'module_name' => 'required|string|max:255',
            'module_description' => 'nullable|string|max:500',
            'submodules' => 'array', // Ensure submodules is an array
        ]);

        // Create the module
        $module = Module::create([
            'module_name' => $request->module_name,
            'module_description' => $request->module_description,
        ]);

        // Assign selected submodules to this module
        if ($request->has('submodules')) {
            foreach ($request->submodules as $submoduleId) {
                Submodule::where('submodule_id', $submoduleId)->update([
                    'module_id' => $module->module_id
                ]);
            }
        }


        return redirect('module')->with('status', 'Module Created Successfully');
    }

    public function edit(Module $module)
    {
        $all_submodules = Submodule::all();
        $module->load('submodules'); //load submodules
        return view('role-permission.module.edit', compact('module', 'all_submodules'));
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'module_name' => 'required|string|max:255',
            'module_description' => 'nullable|string|max:500',
            'submodules' => 'nullable|array', // Allow submodules to be empty
            'module_status' => 'required|integer|in:0,1',
        ]);

        // Update the module
        $module->update([
            'module_name' => $request->module_name,
            'module_description' => $request->module_description,
            'module_status' => $request->module_status,
        ]);

        // Reset previous submodule assignments
        Submodule::where('module_id', $module->module_id)->update(['module_id' => null]);

        // Assign selected submodules to this module (if any)
        if (!empty($request->submodules)) {
            Submodule::whereIn('submodule_id', $request->submodules)->update([
                'module_id' => $module->module_id
            ]);
        }

        return redirect('module')->with('status', 'Module Updated Successfully');
    }

    public function destroy($id)
    {
        $module = Module::find($id);
        $module->delete();
        return redirect('module')->with('status', 'Module Deleted Successfully');
    }
}
