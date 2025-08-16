<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomRole as Role;
use App\Models\CustomPermision as Permission;
use Carbon\Carbon;

class checkSpatieImplementation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create Role
        Role::create([
            'role_name' => 'admin',
            'role_description' => 'This is a description of the role',
            'role_status' => 1,
            'role_date_created' => Carbon::now(),
            'role_date_updated' => Carbon::now(),
        ]);

        Role::create([
            'role_name' => 'staff',
            'role_description' => 'This is a description of the role',
            'role_status' => 1,
            'role_date_created' => Carbon::now(),
            'role_date_updated' => Carbon::now(),
        ]);

        //Create Permission
        Permission::create([
            'permission_name' => 'create',
            'permission_description' => 'This is a description of the permission',
        ]);

        Permission::create([
            'permission_name' => 'read',
            'permission_description' => 'This is a description of the permission',
        ]);
    }
}
