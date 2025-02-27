<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('role-permission.user.index', compact('users'));
    }

    public function create() {
        $roles = Role::pluck('name', 'name')->all();
        return view('role-permission.user.create', compact('roles'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|string|max:20|min:6',
            'roles' => 'required',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        $user->syncRoles($request->roles);
    
        return redirect('/user')->with('status', 'User created successfully with roles');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('role-permission.user.edit',[
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|max:20|min:6',
            'roles' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);
        
        return redirect('/user')->with('status','User updated successfully');
    }

    public function destroy($userId)
    {
        $user = User::find($userId);
        $user->delete();
        return redirect('user')->with('status', 'User Deleted Successfully');
    }
}
