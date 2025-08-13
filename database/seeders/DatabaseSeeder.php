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
            BrandSeeder::class,

            CandidateSeeder::class,
            DepartmentSeeder::class,
            EmployeeSeeder::class,
            AssetSeeder::class,

            RolePermissionUserSeeder::class,

            InitialSeeder::class,

            checkRBACSeeder::class,
            checkSpatieAssignments::class,
            checkSpatieImplementation::class,
            ConditionSeeder::class,

            // dependent migrations
        ]);
    }
}
