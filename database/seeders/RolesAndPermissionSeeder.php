<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pivot: submodule_has_permissions
        DB::table('submodule_has_permissions')->insert([
            'submodule_id' => $submoduleId,
            'permission_id' => $permissionId,
        ]);

        // Pivot: org_has_modules
        DB::table('org_has_modules')->insert([
            'org_id' => $orgId,
            'module_id' => $moduleId,
        ]);

        // Pivot: role_has_modules
        DB::table('role_has_modules')->insert([
            'role_id' => $roleId,
            'module_id' => $moduleId,
        ]);

        DB::table('role_has_modules')->insert([
            'role_id' => $roleId,
            'module_id' => 2,
        ]);

        DB::table('role_has_modules')->insert([
            'role_id' => $roleId,
            'module_id' => 3,
        ]);

        // Pivot: role_has_submodules
        DB::table('role_has_submodules')->insert([
            'role_id' => $roleId,
            'submodule_id' => $submoduleId,
        ]);

        // Pivot: role_has_submodule_permissions
        DB::table('role_has_submodule_permissions')->insert([
            'role_id' => $roleId,
            'submodule_id' => $submoduleId,
            'permission_id' => $permissionId,
        ]);
    }
}
