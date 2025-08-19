<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert organization
        $orgId = DB::table('organizations')->insertGetId([
            'org_name' => 'AAP',
            'org_description' => 'Automobile Association of the Philippines',
            'org_logo' => null,
            'org_color' => '#3490dc',
            'org_status' => 1,
            'org_date_created' => now(),
            'org_date_updated' => now(),
        ]);

        // Insert superadmin employee
        $employeeId = DB::table('employees')->insertGetId([
            'employee_firstname' => 'Romeo',
            'employee_middlename' => 'R.',
            'employee_lastname' => 'Montague',
            'employee_personal_email' => 'romeo@montague.com',
            'employee_job_position' => 'Manager',
            'branch_id' => 2,
            'department_id' => 10,
            'employee_section' => 'Development Team',
            'employee_status' => 1,
            'employee_date_created' => now(),
            'employee_date_updated' => now(),
            'employee_mother_maiden_name' => 'Capulet',
            'employee_gender' => 'Male',
            'employee_father_name' => 'Lord Montague',
            'employee_father_birthdate' => '1970-01-01',
            'employee_mother_name' => 'Lady Montague',
            'employee_mother_birthdate' => '1972-02-02',
        ]);

        // Insert role
        $roleId = DB::table('roles')->insertGetId([
            'role_name' => 'Super Admin',
            'role_description' => 'Full access to the system',
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

        // Pivot: model_has_roles
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => "App\Models\User",
            'model_id' => 1,
            'org_id' => 1
        ]);
    }
}
