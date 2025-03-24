<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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

    public function store(Request $request)
    {

        $request->validate([
            'employee_id' => 'required',
            'user_name' => 'required|string|max:255',
            'user_password' => 'required|string|max:20|min:6',
            'org_id' => 'required|exists:organizations,org_id',
            'role_id' => 'required|exists:roles,role_id',
        ]);

        $user = User::create([
            'employee_id' => $request->employee_id,
            'user_name' => $request->user_name,
            'user_password' => Hash::make($request->user_password),
            'org_id' => $request->org_id,
            'role_id' => $request->role_id,
        ]);

        DB::table('model_has_roles')->insert([
            'model_id' => $user->user_id,
            'role_id' => $request->role_id,
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

        $user->update([
            'employee_id' => $request->employee_id,
            'user_name' => $request->user_name,
            'user_password' => Hash::make($request->user_password),
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
