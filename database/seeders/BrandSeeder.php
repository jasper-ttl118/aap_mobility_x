<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Brand::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $brands = [
            ['brand_name' => 'Dell'],
            ['brand_name' => 'HP'],
            ['brand_name' => 'Cisco'],
            ['brand_name' => 'Apple'],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'brand_name' => strtoupper($brand['brand_name']),
            ]);
        }
    }
}
