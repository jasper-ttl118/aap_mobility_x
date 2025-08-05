<?php

namespace Database\Seeders;

use App\Models\Employee;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Employee::factory()->count(20)->create();
    }
}
