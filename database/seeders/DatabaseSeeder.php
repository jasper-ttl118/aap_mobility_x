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

            // dependent migration
            EmployeeSeeder::class,
            AssetSeeder::class,

            // InitialSeeder::class,
            SuperAdminSeeder::class,

            // RolePermissionUserSeeder::class,
            checkRBACSeeder::class,
            checkSpatieAssignments::class,
            checkSpatieImplementation::class,
            AssetConditionSeeder::class,

            // TODO: WIP, coupled to 'superadmin' entry, then uses syncPermission so treat it as last seeder
            ModuleAndSubmoduleSeeder::class,
        ]);
    }
}
