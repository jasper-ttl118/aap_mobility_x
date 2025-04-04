<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Module;
use App\Models\Submodule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Organization;


class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles', 'organization', 'employee')->get();

        return view('role-permission.user.index', compact('users'));
    }

    public function find()
    {
        return view('role-permission.user.search');
    }

    public function search(Request $request)
    {

        $search = $request->input('search');

        $employees = Employee::where('employee_firstname', 'LIKE', "%{$search}%")
            ->orWhere('employee_middlename', 'LIKE', "%{$search}%")
            ->orWhere('employee_lastname', 'LIKE', "%{$search}%")
            ->orWhere('employee_id', 'LIKE', "%{$search}%")
            // Add any other searchable fields
            ->get();

        return response()->json([
            'employees' => $employees
        ]);
    }

    public function create($id)
    {
        $employee = Employee::find($id);
        $org_with_roles = Organization::with('roles')->get();

        return view('role-permission.user.create', compact('employee', 'org_with_roles'));
    }

    public function displayRoleAccess(Request $request)
    {

        $organizations = Organization::get();
        $all_modules = Module::all();
        $submodules = Submodule::get();
        $permissions = Permission::all();

        $selected_role = Role::with('organization')->find($request->selectedValue);

        if ($selected_role) {
            // Get modules assigned to this role
            $modules = $selected_role->modules()->with('submodules')->get();

            // Get all permissions for this role grouped by submodule
            $rolePermissions = DB::table('role_has_submodule_permissions')
                ->where('role_id', $selected_role->role_id)
                ->join('permissions', 'role_has_submodule_permissions.permission_id', '=', 'permissions.permission_id')
                ->select('role_has_submodule_permissions.*', 'permissions.permission_name')
                ->get();

            // Prepare the modules structure
            $preparedModules = [];

            foreach ($modules as $module) {
                $moduleData = [
                    'module_id' => $module->module_id,
                    'module_name' => $module->module_name,
                    'submodules' => []
                ];


                foreach ($module->submodules as $submodule) {
                    $submoduleData = [
                        'submodule_id' => $submodule->submodule_id,
                        'submodule_name' => $submodule->submodule_name,
                        'permissions' => []
                    ];

                    // Find permissions for this submodule
                    foreach ($rolePermissions as $permission) {
                        if ($permission->submodule_id == $submodule->submodule_id) {
                            $submoduleData['permissions'][] = [
                                'permission_id' => $permission->permission_id,
                                'permission_name' => $permission->permission_name
                            ];
                        }
                    }

                    $moduleData['submodules'][] = $submoduleData;
                }

                $preparedModules[] = $moduleData;
            }

            // Add prepared modules to the role
            $selected_role->prepared_modules = $preparedModules;
        }

        return response()->json([
            'organizations' => $organizations,
            'all_modules' => $all_modules,
            'submodules' => $submodules,
            'permissions' => $permissions,
            'selected_role' => $selected_role
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'employee_id' => 'required',
            'user_name' => 'required|string|max:255',
            'user_password' => 'required|string|max:20|min:6',
            'org_id' => 'required|exists:organizations,org_id',
            'role_id' => 'required|exists:roles,role_id',
        ]);

        //If new role is created, then create a new role
        if (!empty($request->new_role_name)) {

            // Assign the role to the user
            $request->validate([
                'new_role_name' => 'required|string|max:255',
                'new_role_description' => 'nullable|string|max:500',
                'org_id' => 'required|exists:organizations,org_id',
                'module_id' => 'required|array',
                'module_id.*' => 'exists:modules,module_id',
                'submodule_id' => 'required|array',
                'submodule_id.*' => 'exists:submodules,submodule_id',
                'permission_id' => 'required|array',
                'permission_id.*' => 'exists:permissions,permission_id',
            ]);

            // Create the role with organization
            $role = Role::create([
                'role_name' => $request->new_role_name,
                'role_description' => $request->new_role_description,
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
        }

        // Create the user
        $user = User::create([
            'employee_id' => $request->employee_id,
            'user_name' => $request->user_name,
            'user_password' => Hash::make($request->user_password),
            'org_id' => $request->org_id,
            'role_id' => $role->role_id,
        ]);

        DB::table('model_has_roles')->insert([
            'model_id' => $user->user_id,
            'role_id' => $role->role_id,
            'org_id' => $request->org_id,
            'model_type' => 'App\Models\User',
        ]);



        return redirect('/user')->with('status', 'User created successfully with roles');
    }

    public function edit(User $user)
    {
        $employee = Employee::find($user->employee->employee_id);
        $org_with_roles = Organization::with('roles')->get();

        return view('role-permission.user.edit', compact('employee', 'org_with_roles', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'employee_id' => 'required',
            'user_name' => 'required|string|max:255',
            'user_password' => 'nullable|string|max:20|min:6',
            'org_id' => 'required|exists:organizations,org_id',
            'role_id' => 'required|exists:roles,role_id',
            'user_status' => 'required|integer|in:0,1',
        ]);

        //Stopper if the user_password is empty
        if (!empty($request->user_password)) {
            $user->update([
                'user_password' => Hash::make($request->user_password),
            ]);
        }

        $user->update([
            'employee_id' => $request->employee_id,
            'user_name' => $request->user_name,
            'org_id' => $request->org_id,
            'role_id' => $request->role_id,
            'user_status' => $request->user_status,
        ]);

        $for_pivot = DB::table('model_has_roles')->where('model_id', '=', $user->user_id);


        $for_pivot->update([
            'role_id' => $request->role_id,
            'org_id' => $request->org_id,
            'model_type' => 'App\Models\User',
            'model_id' => $user->user_id,
        ]);

        return redirect('/user')->with('status', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user')->with('status', 'User Deleted Successfully');
    }

    public function viewDashboard()
    {
        $users = User::with('roles', 'organization', 'employee')->where('user_id', '=', Auth::user()->user_id)->first();

        return view('test_pages.dashboard', compact('users'));
    }
}
