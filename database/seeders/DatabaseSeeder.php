<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            // independent migrations
            AssetCategorySeeder::class,
            AssetStatusSeeder::class,
            BranchSeeder::class,
            DepartmentSeeder::class,
            BrandSeeder::class,
            CandidateSeeder::class,
            EmployeeSeeder::class,
            AssetSeeder::class,


            InitialSeeder::class,


            RolePermissionUserSeeder::class,

            checkRBACSeeder::class,
            checkSpatieAssignments::class,
            checkSpatieImplementation::class,
            ConditionSeeder::class,

            // dependent migrations
        ]);
    }
}
