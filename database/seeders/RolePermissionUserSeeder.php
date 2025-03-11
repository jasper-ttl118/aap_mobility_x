<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

use App\Models\Organization;

class RolePermissionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::findById(1);
        // $permissions = Permission::findById(1);

        // echo $role;
        // echo $permissions;


        // // Assign Permissions to Role
        // $role->syncPermissions($permissions);

        //  // Find User
        // $user = User::find(2);

        // // Assign Role to User
        // $user->assignRole($role);

        $permissions = Permission::whereIn('permission_id', [1, 2])->get();
        $role->syncPermissions($permissions);


        

    }
}
