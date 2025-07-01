<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Asset;
use App\Models\Employee;

class AssetSeeder extends Seeder
{
    public function run(): void
    {
        // Safely clear the table before seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Asset::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $assets = [
            ['name' => 'Dell Latitude 5420', 'category_id' => 1, 'employee_id' => 1],
            ['name' => 'HP LaserJet Pro', 'category_id' => 2, 'employee_id' => 1],
            ['name' => 'Office Table', 'category_id' => 3, 'employee_id' => 1],
            ['name' => 'Cisco Switch', 'category_id' => 4, 'employee_id' => 1],
            ['name' => 'iPhone 13', 'category_id' => 5, 'employee_id' => 1],
        ];

        $counter = 1001;

        foreach ($assets as $item) {
            $propertyCode = 'ASSET-C-' . $item['category_id'] . $counter;

            Asset::create([
                'property_code' => $propertyCode,
                'asset_name' => $item['name'],
                'category_id' => $item['category_id'],
                'status_id' => rand(1, 11), // Random status between 1 and 11
                'purchase_date' => now()->subYear(),
                'warranty_exp_date' => now()->addYear(),
                'maint_sched' => now()->addMonths(6),
                'last_maint_sched' => now()->subMonths(2),
                'service_provider' => 'ServicePro Inc.',
                'check_out_status' => 'In Use',
                'check_out_date' => now()->subMonth(),
                'check_in_date' => null,
                'description' => 'Auto-seeded asset record.',
                'employee_id' => $item['employee_id'],
                'date_accountable' => now()->subMonth(),
                'qr_code_path' => 'storage/qrcodes/' . $propertyCode . '.png',
                'qr_code_data' => $propertyCode,
                'ams_active' => '1',
                'created_by_id' => 1,
            ]);

            $counter++;
        }
    }
}
