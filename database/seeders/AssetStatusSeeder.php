<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['status_id' => 1, 'status_name' => 'Available', 'status_description' => 'Currently not assigned or in use and is available for allocation.'],
            ['status_id' => 2, 'status_name' => 'In Use', 'status_description' => 'Assigned to a user or department and is currently being utilized.'],
            ['status_id' => 3, 'status_name' => 'Checked Out', 'status_description' => 'Temporarily checked out by a user or department for a specific period or task.'],
            ['status_id' => 4, 'status_name' => 'Under Maintenance', 'status_description' => 'Undergoing scheduled maintenance, repairs, or servicing.'],
            ['status_id' => 5, 'status_name' => 'In Repair', 'status_description' => 'Being repaired due to damage, malfunction, or maintenance issues.'],
            ['status_id' => 6, 'status_name' => 'Retired/Decommissioned', 'status_description' => 'Reached the end of its useful life and is no longer in active use.'],
            ['status_id' => 7, 'status_name' => 'Lost', 'status_description' => 'Reported as lost or missing and requires further investigation or resolution.'],
            ['status_id' => 8, 'status_name' => 'Pending Disposal', 'status_description' => 'Has been marked for disposal but has not yet been officially retired or removed from inventory.'],
            ['status_id' => 9, 'status_name' => 'Damaged', 'status_description' => 'Suffered damage and is currently not functional or requires repairs.'],
            ['status_id' => 10, 'status_name' => 'On Hold', 'status_description' => 'Temporarily on hold or suspended from use due to specific reasons, such as pending investigation or legal matters.'],
            ['status_id' => 11, 'status_name' => 'Missing', 'status_description' => 'Item or asset not able to be found.'],
        ];

        DB::table('asset_statuses')->insert($statuses);
    }
}

