<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Asset;
use App\Models\Brand;

class AssetSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Asset::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $assets = [
            ['asset_name' => 'Laptop', 'brand' => 'Dell', 'model' => 'Latitude 5420', 'category_id' => 1, 'type' => '2'],
            ['asset_name' => 'Printer', 'brand' => 'HP', 'model' => 'LaserJet Pro', 'category_id' => 1, 'type' => '1'],
            ['asset_name' => 'Office Table', 'brand' => 'IKEA', 'model' => 'OfficePro', 'category_id' => 2, 'type' => '1'],
            ['asset_name' => 'Switch', 'brand' => 'Cisco', 'model' => 'Catalyst 2960', 'category_id' => 1, 'type' => '2'],
            ['asset_name' => 'Cellphone', 'brand' => 'Apple', 'model' => 'iPhone 13', 'category_id' => 6, 'type' => '2'],
        ];

        $counter = 1001;

        foreach ($assets as $item) {
            $propertyCode = 'EMP1-C' . $item['category_id'] . '-' . $counter;
            $isITDevice = in_array($item['category_id'], [1, 6]);
            $assetType = $item['type'];

            $brand_id = null;
            $brand_name_custom = null;

            if ($isITDevice) {
                $brand = Brand::where('brand_name', strtoupper($item['brand']))->first();

                if (!$brand) {
                    throw new \Exception("Brand '{$item['brand']}' not found. Please seed the brands table first.");
                }

                $brand_id = $brand->brand_id;
            } else {
                $brand_name_custom = strtoupper($item['brand']);
            }

            $purchaseDate = now()->subDays(rand(200, 400));
            $warrantyYears = rand(1, 3);
            $warrantyExpDate = $purchaseDate->copy()->addYears($warrantyYears);

            // Random free replacement: either X days or X weeks from purchase
            $freeUnit = rand(0, 1) ? 'days' : 'weeks';
            $freeOffset = rand(15, 60);
            $freeReplacementDate = $purchaseDate->copy()->add($freeUnit, $freeOffset);

            Asset::create([
                'property_code' => strtoupper($propertyCode),
                'asset_name' => strtoupper($item['asset_name']),
                'brand_id' => $brand_id,
                'brand_name_custom' => $brand_name_custom,
                'model_name' => strtoupper($item['model']),
                'category_id' => $item['category_id'],
                'status_id' => rand(1, 5),
                'condition_id' => rand(1, 5),
                'device_serial_number' => $isITDevice ? strtoupper('DEV-' . rand(100000, 999999)) : null,
                'charger_serial_number' => $isITDevice ? strtoupper('CHR-' . rand(100000, 999999)) : null,
                'asset_type' => $assetType,
                'employee_id' => $assetType === '2' ? 1 : null,
                'department_id' => $assetType === '1' ? 1 : null,
                'date_accountable' => now()->subDays(rand(10, 60)),
                'purchase_date' => $purchaseDate,
                'warranty_exp_date' => $warrantyExpDate,
                'free_replacement_period' => $freeReplacementDate,
                'maint_sched' => now()->addMonths(4),
                'last_maint_sched' => now()->subMonths(1),
                'service_provider' => strtoupper('ServicePro Inc.'),
                'check_out_status' => strtoupper('IN USE'),
                'check_out_date' => now()->subMonth(),
                'check_in_date' => null,
                'description' => strtoupper('AUTO-SEEDED ASSET RECORD.'),
                'qr_code_path' => 'storage/qrcodes/' . strtoupper($propertyCode) . '.png',
                'qr_code_data' => strtoupper($propertyCode),
                'ams_active' => '1',
                'created_by_id' => 1,
            ]);

            $counter++;
        }
    }
}
