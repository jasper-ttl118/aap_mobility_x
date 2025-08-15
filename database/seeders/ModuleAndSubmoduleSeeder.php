<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Submodule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ModuleAndSubmoduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Initiated by: romu-dev
     * Contains the modules and submodules
     * Note: Ensure that the InitialSeeder has been executed 
     * to create the superadmin role before running this seeder.
     * 
     * List of Modules Included:
     * 1. Dashboard
     * 2. RBAC Management
     * 3. Employee Management
     * 4. CRM
     * 5. Asset Management
     * 6. CMS
     * 7.
     */
    public function run(): void
    {
        /**
         * Define your modules and submodules here
         * Update this if new modules and submodules will be deployed
         * 
         * If new modules and submodules will be created, append to this array
         * with this template:
         * 
         * [
         *      'name' =>  {moduleName},
         *      'description' => {moduleDescription},
         *      'submodules' => [
         *          ['name' =>  {submoduleName1}, 'description' => {submoduleDescription1} ],
         *          ['name' =>  {submoduleName2}, 'description' => {submoduleDescription2} ],
         *          (add submodules as needed)
         *      ],
         * ]
         * 
         * Replace fields enclosed in curly braces {} with their corresponding values.
         */
        $modules = [
            [
                'name' => 'Dashboard',
                'description' => 'Main dashboard module',
                'submodules' => [
                    ['name' => 'User Analytics', 'description' => 'View user analytics' ],
                ],
            ],
            [
                'name' => 'RBAC Management',
                'description' => 'Manage roles, permissions, and user access',
                'submodules' => [

                ],
            ],
            [
                'name' => 'Employee Management',
                'description' => 'Manage employee profiles and records',
                'submodules' => [
                    ['name' => 'Alphalist', 'description' => 'Alphalist'],
                    ['name' => 'Manpower Requisition', 'description' => 'Manpower Requisition'],
                    ['name' => 'Vacancy List', 'description' => 'Vacancy List'],
                ],
            ],
            [
                'name' => 'CRM',
                'description' => '',
                'submodules' => [
                    ['name' => 'Dashboard', 'description' => 'Dashboard'],
                    ['name' => 'Members', 'description' => 'Members'],
                    ['name' => 'Email Marketing', 'description' => 'Email Marketing'],
                    ['name' => 'Corporate', 'description' => 'Corporate'],
                    ['name' => 'Sales Tracking', 'description' => 'Sales Tracking'],
                ],
            ],
            [
                'name' => 'Asset Management',
                'description' => '',
                'submodules' => [
                    ['name' => 'Dashboard', 'description' => 'Dashboard'],
                    ['name' => 'Assets', 'description' => 'Assets'],
                    ['name' => 'Scan QR', 'description' => 'Scan QR'],
                ],
            ],
            [
                'name' => 'CMS',
                'description' => '',
                'submodules' => [
                    
                ],
            ],
        ];

        // Checkpoint: End of Module Array

        // Insert submodule
        $submoduleId = DB::table('submodules')->insertGetId([
            'module_id' => $moduleId,
            'submodule_name' => 'User Analytics',
            'submodule_description' => 'View user analytics',
            'submodule_status' => 1,
            'submodule_created' => now(),
            'submodule_updated' => now(),
        ]);

        $allPermissionNames = [];

        foreach ($modules as $mod) {
            // Create or update module
            $module = Module::updateOrCreate(
                ['module_name' => $mod['name']],
                [
                    'module_description' => $mod['description'],
                    'module_status' => 1,
                    'module_created' => now(),
                    'module_updated' => now(),
                ]
            );

            // Create a permission for the module itself
            $modulePermissionName = 'access ' . strtolower(str_replace(' ', '_', $mod['name']));

            $permission = Permission::updateOrCreate(
                ['permission_name' => $modulePermissionName, 'permission_guard_name' => 'web'],
                [
                    'permission_description' => 'can access ' . $modulePer
                ],
            );

            $allPermissionNames[] = $permission->name;

            foreach ($mod['submodules'] as $sub) {
                // Create or update submodule
                Submodule::updateOrCreate(
                    ['submodule_name' => $sub['name'], 'module_id' => $module->id],
                    [
                        'submodule_description' => $sub['description'],
                        'module_id' => $module->id,
                    ]
                );

                // Create a permission for each submodule
                $subPermissionName = 'access ' . strtolower(str_replace(' ', '_', $sub['name']));
                $permission = Permission::updateOrCreate(
                    ['name' => $subPermissionName, 'guard_name' => 'web'],
                    ['name' => $subPermissionName]
                );
                $allPermissionNames[] = $permission->name;
            }
        }

        // Assign all permissions to superadmin
        $superadmin = Role::where('name', 'Super Admin')->first();

        if ($superadmin) {
            $superadmin->syncPermissions($allPermissionNames);
        }
    }
}
