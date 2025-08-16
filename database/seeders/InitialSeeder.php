<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert organization
        $orgId = DB::table('organizations')->insertGetId([
            'org_name' => 'Acme Corp',
            'org_description' => 'Main demo organization',
            'org_logo' => null,
            'org_color' => '#3490dc',
            'org_status' => 1,
            'org_date_created' => now(),
            'org_date_updated' => now(),
        ]);

        // Insert employee
        $employeeId = DB::table('employees')->insertGetId([
            'employee_firstname' => 'John',
            'employee_middlename' => 'A.',
            'employee_lastname' => 'Doe',
            'employee_personal_email' => 'john.doe@example.com',
            'employee_position' => 'Manager',
            'branch_id' => 2,
            'department_id' => 10,
            'employee_section' => 'Development Team',
            'employee_status' => 1,
            'employee_date_created' => now(),
            'employee_date_updated' => now(),
            'employee_mother_maiden_name' => 'Smith',
            'employee_gender' => 'Male',
            'employee_father_name' => 'Robert Doe',
            'employee_father_birthdate' => '1970-01-01',
            'employee_mother_name' => 'Jane Doe',
            'employee_mother_birthdate' => '1972-02-02',
        ]);
        // Insert permission
        $permissionId = DB::table('permissions')->insertGetId([
            'permission_name' => 'view_dashboard',
            'permission_description' => 'Can view dashboard',
            'permission_status' => 1,
            'permission_date_created' => now(),
            'permission_date_updated' => now(),
            'permission_guard_name' => 'web',
        ]);

        // Insert role
    $roleId = DB::table('roles')->insertGetId([
            'role_name' => 'Super Admin',
            'role_description' => 'Full access',
            'role_status' => 1,
            'role_date_created' => now(),
            'role_date_updated' => now(),
            'role_guard_name' => 'web',
            'org_id' => $orgId,
        ]);

        // Insert user
        $userId = DB::table('users')->insertGetId([
            'employee_id' => $employeeId,
            'user_name' => 'superadmin',
            'user_password' => Hash::make('password'),
            'org_id' => $orgId,
            'role_id' => 1,
            'user_status' => 1,
            'user_date_created' => now(),
            'user_date_updated' => now(),
        ]);

        // Insert module
        $moduleId = DB::table('modules')->insertGetId([
            'module_name' => 'Dashboard',
            'module_description' => 'Main dashboard module',
            'module_status' => 1,
            'module_created' => now(),
            'module_updated' => now(),
        ]);

        DB::table('modules')->insert([
            'module_name' => 'RBAC Management',
            'module_description' => 'Main dashboard module',
            'module_status' => 1,
            'module_created' => now(),
            'module_updated' => now(),
        ]);

        DB::table('modules')->insert([
            'module_name' => 'Employee Management',
            'module_description' => 'Main dashboard module',
            'module_status' => 1,
            'module_created' => now(),
            'module_updated' => now(),
        ]);

        DB::table('modules')->insert([
            'module_name' => 'CRM',
            'module_description' => 'Main dashboard module',
            'module_status' => 1,
            'module_created' => now(),
            'module_updated' => now(),
        ]);

        DB::table('modules')->insert([
            'module_name' => 'Asset Management',
            'module_description' => 'Main dashboard module',
            'module_status' => 1,
            'module_created' => now(),
            'module_updated' => now(),
        ]);

        DB::table('modules')->insert([
            'module_name' => 'CMS',
            'module_description' => 'Main dashboard module',
            'module_status' => 1,
            'module_created' => now(),
            'module_updated' => now(),
        ]);


        // Insert submodule
        $submoduleId = DB::table('submodules')->insertGetId([
            'module_id' => $moduleId,
            'submodule_name' => 'User Analytics',
            'submodule_description' => 'View user analytics',
            'submodule_status' => 1,
            'submodule_created' => now(),
            'submodule_updated' => now(),
        ]);

        DB::table('submodules')->insertGetId([
            'module_id' => $moduleId,
            'submodule_name' => 'Dashboard',
            'submodule_description' => 'Dashboard',
            'submodule_status' => 1,
            'submodule_created' => now(),
            'submodule_updated' => now(),
        ]);

        DB::table('submodules')->insertGetId([
            'module_id' => $moduleId,
            'submodule_name' => 'Members',
            'submodule_description' => 'Members',
            'submodule_status' => 1,
            'submodule_created' => now(),
            'submodule_updated' => now(),
        ]);

        DB::table('submodules')->insertGetId([
            'module_id' => $moduleId,
            'submodule_name' => 'Email Marketing',
            'submodule_description' => 'Email Marketing',
            'submodule_status' => 1,
            'submodule_created' => now(),
            'submodule_updated' => now(),
        ]);

        DB::table('submodules')->insertGetId([
            'module_id' => $moduleId,
            'submodule_name' => 'Corporate',
            'submodule_description' => 'Corporate',
            'submodule_status' => 1,
            'submodule_created' => now(),
            'submodule_updated' => now(),
        ]);

        DB::table('submodules')->insertGetId([
            'module_id' => $moduleId,
            'submodule_name' => 'Sales Tracking',
            'submodule_description' => 'Sales Tracking',
            'submodule_status' => 1,
            'submodule_created' => now(),
            'submodule_updated' => now(),
        ]);

        DB::table('submodules')->insertGetId([
            'module_id' => $moduleId,
            'submodule_name' => 'Alphalist',
            'submodule_description' => 'Alphalist',
            'submodule_status' => 1,
            'submodule_created' => now(),
            'submodule_updated' => now(),
        ]);

        DB::table('submodules')->insertGetId([
            'module_id' => $moduleId,
            'submodule_name' => 'Manpower Requisition',
            'submodule_description' => 'Manpower Requisition',
            'submodule_status' => 1,
            'submodule_created' => now(),
            'submodule_updated' => now(),
        ]);
        

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

        // Pivot: model_has_roles
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => "App\Models\User",
            'model_id' => 1,
            'org_id' => 1
        ]);
    }
}
