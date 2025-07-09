<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Asset;

class AssetSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Asset::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $assets = [
            ['asset_name' => 'Laptop', 'brand' => 'Dell', 'model' => 'Latitude 5420', 'category_id' => 1, 'type' => '2'],
            ['asset_name' => 'Printer', 'brand' => 'HP', 'model' => 'LaserJet Pro', 'category_id' => 2, 'type' => '1'],
            ['asset_name' => 'Office Table', 'brand' => 'IKEA', 'model' => 'OfficePro', 'category_id' => 3, 'type' => '1'],
            ['asset_name' => 'Switch', 'brand' => 'Cisco', 'model' => 'Catalyst 2960', 'category_id' => 4, 'type' => '2'],
            ['asset_name' => 'Cellphone', 'brand' => 'Apple', 'model' => 'iPhone 13', 'category_id' => 5, 'type' => '2'],
        ];

        $counter = 1001;

        foreach ($assets as $item) {
            $propertyCode = 'EMP1-C' . $item['category_id'] . '-' . $counter;
            $isITOrMobile = in_array($item['category_id'], [1, 2, 4, 5]); // Laptop, Printer, Switch, Cellphone
            $assetType = $item['type']; // 1 = common (dept), 2 = non-common (employee)

            Asset::create([
                'property_code'           => strtoupper($propertyCode),
                'asset_name'              => strtoupper($item['asset_name']),
                'brand_name'              => strtoupper($item['brand']),
                'model_name'              => strtoupper($item['model']),
                'category_id'             => $item['category_id'],
                'status_id'               => rand(1, 5),
                'condition_id'            => rand(1, 5),
                'device_serial_number'    => $isITOrMobile ? strtoupper('DEV-' . rand(100000, 999999)) : null,
                'charger_serial_number'   => $isITOrMobile ? strtoupper('CHR-' . rand(100000, 999999)) : null,
                'asset_type'              => $assetType,
                'employee_id'             => $assetType === '2' ? 1 : null,
                'department_id'           => $assetType === '1' ? 1 : null,
                'date_accountable'        => now()->subDays(rand(10, 60)),
                'purchase_date'           => now()->subYear(),
                'warranty_exp_date'       => now()->addYear(),
                'free_replacement_period' => now()->addMonths(6),
                'maint_sched'             => now()->addMonths(4),
                'last_maint_sched'        => now()->subMonths(1),
                'service_provider'        => strtoupper('ServicePro Inc.'),
                'check_out_status'        => strtoupper('In Use'),
                'check_out_date'          => now()->subMonth(),
                'check_in_date'           => null,
                'description'             => strtoupper('Auto-seeded asset record.'),
                'qr_code_path'            => 'storage/qrcodes/' . strtoupper($propertyCode) . '.png',
                'qr_code_data'            => strtoupper($propertyCode),
                'ams_active'              => '1',
                'created_by_id'           => 1,
            ]);

            $counter++;
        }
    }
}
