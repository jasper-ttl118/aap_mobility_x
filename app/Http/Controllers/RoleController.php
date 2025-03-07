<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use function PHPUnit\Framework\isEmpty;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('role-permission.role.index', [
            'role' => $roles
        ]);
    }

    public function create()
    {
        return view('role-permission.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
            ]);

            Role::create([
                'name' => $request->name
            ]);

            return redirect('role')->with('status','Role Created Successfully');
    }

    public function edit(Role $role)
    {   
        return view('role-permission.role.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ]
        ]);

        $role->update([
            'name' => $request->name
        ]);

        $role->refresh(); 

        return redirect('role')->with('status', 'Role Updated Successfully');
    }

    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        return redirect('role')->with('status', 'Role Deleted Successfully');
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findorFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                        ->where('role_has_permissions.role_id',$role->id)
                        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                        ->all();
        return view('role-permission.role.add-permissions',[
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status','Permissions added to role');
    }

    public function addRoleWithPermissions()
    {  
        $permissions = Permission::get();
        return view('role-permission.role.add-role-with-permissions',[
            'permissions' => $permissions
        ]);
    }

    public function saveRoleWithPermissions(Request $request)
    {  
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ],
            'permission' => 'required'
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);

        $role->syncPermissions($request->permission);


        return redirect('role')->with('status','Role Created Successfully');
    }

    public function updateRoleWithPermissions($roleId)
    {  
        $role = Role::findorFail($roleId);
        $permissions = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
                        ->where('role_has_permissions.role_id',$role->id)
                        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                        ->all();
        return view('role-permission.role.edit-role-with-permissions',[
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);

    }

    public function editRoleWithPermissions (Request $request, $roleId)
    {
        $role = Role::findorFail($roleId);

        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ],
            'permission' => 'required'
        ]);

        $role->update([
            'name' => $request->name
        ]);

        $role->refresh(); 
        $role = Role::findOrFail($role->id);
        $role->syncPermissions($request->permission);

        
        return redirect('role')->with('status', 'Role Updated Successfully');
    }
}
