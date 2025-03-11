<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class checkRBACSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // //Create Organization
        // DB::table('organizations')->insert([
        //     'org_name' => Str::random(10),
        //     'org_description' => Str::random(20),
        //     'org_logo' => Str::random(10),
        //     'org_status' => 1,
        //     'org_date_created' => Carbon::now(),
        //     'org_date_updated' => Carbon::now(),
        // ]);

        // DB::table('organizations')->insert([
        //     'org_name' => Str::random(10),
        //     'org_description' => Str::random(20),
        //     'org_logo' => Str::random(10),
        //     'org_status' => 1,
        //     'org_date_created' => Carbon::now(),
        //     'org_date_updated' => Carbon::now(),
        // ]);

        // //Create 2 Employees
        // DB::table('employees')->insert([
        //     'employee_firstname' => Str::random(10),
        //     'employee_middlename' => Str::random(10),
        //     'employee_lastname' => Str::random(10),
        //     'employee_email' => Str::random(10).'@example.com',
        //     'employee_address' => Str::random(10),
        //     'employee_position' => Str::random(10),
        //     'employee_department' => Str::random(10),
        //     'employee_contact_number' => Str::random(10),
        //     'employee_status' => 1,
        //     'employee_date_created' => Carbon::now(),
        //     'employee_date_updated' => Carbon::now(),
        // ]);

        // DB::table('employees')->insert([
        //     'employee_firstname' => Str::random(10),
        //     'employee_middlename' => Str::random(10),
        //     'employee_lastname' => Str::random(10),
        //     'employee_email' => Str::random(10).'@example.com',
        //     'employee_address' => Str::random(10),
        //     'employee_position' => Str::random(10),
        //     'employee_department' => Str::random(10),
        //     'employee_contact_number' => Str::random(10),
        //     'employee_status' => 1,
        //     'employee_date_created' => Carbon::now(),
        //     'employee_date_updated' => Carbon::now(),
        // ]);

        //Create User
        DB::table('users')->insert([
            'employee_id' => 1,
            'user_name' => Str::random(10),
            'user_password' => Hash::make('password'),
            'org_id' => 1,
            'role_id' => 1,
            'user_date_created' => Carbon::now(),
            'user_date_updated' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'employee_id' => 1,
            'user_name' => Str::random(10),
            'user_password' => Hash::make('password'),
            'org_id' => 1,
            'role_id' => 1,
            'user_date_created' => Carbon::now(),
            'user_date_updated' => Carbon::now(),
        ]);

    }
}
