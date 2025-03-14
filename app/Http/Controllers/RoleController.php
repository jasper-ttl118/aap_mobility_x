<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use App\Models\Organization;
use App\Models\Module;
use App\Models\Submodule;
use App\Models\Role as ExtendedRole;
use App\Models\Permission as ExtendedPermission;

use function PHPUnit\Framework\isEmpty;

class RoleController extends Controller
{
    public function index()
    {
        $roles = SpatieRole::with('organization', 'permissions')->get();        
        return view('role-permission.role.index', compact('roles'));
    }

    public function create()
    {
        $organizations = Organization::get();
        $modules = Module::with('submodules')->get();
        $submodules = Submodule::get();
        $permissions = SpatiePermission::get();

        return view('role-permission.role.create', compact('organizations', 'modules', 'permissions'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'required|string',
            'org_id' => 'required|exists:organizations,org_id',
            'module_id' => 'required|array',
            'module_id.*' => 'exists:modules,module_id',
            'submodule_id' => 'required|array',
            'submodule_id.*' => 'exists:submodules,submodule_id',
            'permission_id' => 'required|array',
            'permission_id.*' => 'exists:permissions,permission_id',
        ]);
    
        // Create the role with organization
        $role = ExtendedRole::create([
            'role_name' => $request->role_name,
            'role_description' => $request->role_description,
            'org_id' => $request->org_id,
        ]);

    
        // ✅ Assign modules to a role
        $role->modules()->sync($request->module_id);
    
        // ✅ Assign submodule with multiple permissions in a role
        if (is_array($request->permission_id)) {
            foreach ($request->submodule_id as $submoduleId) {
                // Get unique permissions for this submodule
                $permissions = $request->permission_id[$submoduleId] ?? [];
        
                // Avoid duplicates by using sync or checking for existing records
                foreach (array_unique($permissions) as $permissionId) {
                    // Insert only if the record doesn't already exist
                    DB::table('role_has_submodule_permissions')->updateOrInsert(
                        [
                            'role_id' => $role->role_id,
                            'submodule_id' => $submoduleId,
                            'permission_id' => $permissionId
                        ],
                        [
                            'role_id' => $role->role_id,
                            'submodule_id' => $submoduleId,
                            'permission_id' => $permissionId
                        ]
                    );
                }
            }
        }
    
        return redirect('role')->with('status', 'Role Created Successfully');
    }

    public function edit(Role $role)
    {   
        return view('role-permission.role.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        
    }

    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        return redirect('role')->with('status', 'Role Deleted Successfully');
    }

    // public function addPermissionToRole($roleId)
    // {
    //     $permissions = Permission::get();
    //     $role = Role::findorFail($roleId);
    //     $rolePermissions = DB::table('role_has_permissions')
    //                     ->where('role_has_permissions.role_id',$role->id)
    //                     ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
    //                     ->all();
    //     return view('role-permission.role.add-permissions',[
    //         'role' => $role,
    //         'permissions' => $permissions,
    //         'rolePermissions' => $rolePermissions
    //     ]);
    // }

    // public function givePermissionToRole(Request $request, $roleId)
    // {
    //     $request->validate([
    //         'permission' => 'required'
    //     ]);

    //     $role = Role::findOrFail($roleId);
    //     $role->syncPermissions($request->permission);

    //     return redirect()->back()->with('status','Permissions added to role');
    // }

    // public function addRoleWithPermissions()
    // {  
    //     $permissions = Permission::get();
    //     return view('role-permission.role.add-role-with-permissions',[
    //         'permissions' => $permissions
    //     ]);
    // }

    // public function saveRoleWithPermissions(Request $request)
    // {  
    //     $request->validate([
    //         'name' => [
    //             'required',
    //             'string',
    //             'unique:permissions,name'
    //         ],
    //         'permission' => 'required'
    //     ]);

    //     $role = Role::create([
    //         'name' => $request->name
    //     ]);

    //     $role->syncPermissions($request->permission);


    //     return redirect('role')->with('status','Role Created Successfully');
    // }

    // public function updateRoleWithPermissions($roleId)
    // {  
    //     $role = Role::findorFail($roleId);
    //     $permissions = Permission::get();
    //     $rolePermissions = DB::table('role_has_permissions')
    //                     ->where('role_has_permissions.role_id',$role->id)
    //                     ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
    //                     ->all();
    //     return view('role-permission.role.edit-role-with-permissions',[
    //         'role' => $role,
    //         'permissions' => $permissions,
    //         'rolePermissions' => $rolePermissions
    //     ]);

    // }

    // public function editRoleWithPermissions (Request $request, $roleId)
    // {
    //     $role = Role::findorFail($roleId);

    //     $request->validate([
    //         'name' => [
    //             'required',
    //             'string',
    //             'unique:roles,name,'.$role->id
    //         ],
    //         'permission' => 'required'
    //     ]);

    //     $role->update([
    //         'name' => $request->name
    //     ]);

    //     $role->refresh(); 
    //     $role = Role::findOrFail($role->id);
    //     $role->syncPermissions($request->permission);

        
    //     return redirect('role')->with('status', 'Role Updated Successfully');
    // }
}
