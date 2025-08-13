<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        try {
            if (DB::getDriverName() !== 'sqlite') {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            }
                Brand::truncate();
            if (DB::getDriverName() !== 'sqlite') {
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
        } catch (Exception $e) {
            $this->command->warn('Foreign checks skipped. Reason: '  . $e->getMessage());
        }

        $brands = [
            ['brand_name' => 'Dell'],
            ['brand_name' => 'HP'],
            ['brand_name' => 'Cisco'],
            ['brand_name' => 'Apple'],
            ['brand_name' => 'Lenovo'],
            ['brand_name' => 'Acer'],
            ['brand_name' => 'Asus'],
            ['brand_name' => 'Samsung'],
            ['brand_name' => 'Huawei'],
            ['brand_name' => 'Xiaomi'],
            ['brand_name' => 'Oppo'],
            ['brand_name' => 'Vivo'],
            ['brand_name' => 'OnePlus'],
            ['brand_name' => 'Microsoft'],
            ['brand_name' => 'Google'],
            ['brand_name' => 'Sony'],
            ['brand_name' => 'LG'],
            ['brand_name' => 'Razer'],
            ['brand_name' => 'Alienware'],
            ['brand_name' => 'MSI'],
            ['brand_name' => 'Nokia'],
            ['brand_name' => 'Realme'],
            ['brand_name' => 'Panasonic'],
            ['brand_name' => 'Toshiba'],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'brand_name' => strtoupper($brand['brand_name']),
            ]);
        }
    }
}
