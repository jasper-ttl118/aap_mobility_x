<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['category_id' => 1, 'category_name' => 'IT Equipment', 'category_description' => 'Computers, servers, laptops, printers, networking devices.'],
            ['category_id' => 2, 'category_name' => 'Office Furniture and Fixtures', 'category_description' => 'Desks, chairs, tables, cabinets, shelves.'],
            ['category_id' => 3, 'category_name' => 'Machinery and Equipment', 'category_description' => 'Manufacturing equipment, industrial machinery, specialized tools.'],
            ['category_id' => 4, 'category_name' => 'Vehicles', 'category_description' => 'Cars, trucks, vans used for transportation or logistics.'],
            ['category_id' => 5, 'category_name' => 'Facilities and Infrastructure', 'category_description' => 'Building structures, HVAC systems, electrical systems, generators.'],
            ['category_id' => 6, 'category_name' => 'Mobile Devices', 'category_description' => 'Stocked goods, raw materials, finished products.'],
            ['category_id' => 7, 'category_name' => 'High Value Assets', 'category_description' => 'Smartphones, tablets, mobile devices issued to employees.'],
            ['category_id' => 8, 'category_name' => 'Laboratory Equipments', 'category_description' => 'Scientific or research equipment used in laboratories.'],
            ['category_id' => 9, 'category_name' => 'Company Owned Tools', 'category_description' => 'Hand tools, power tools, measuring devices used for specific tasks.'],
            ['category_id' => 10, 'category_name' => 'Preventive and Safety Equipment', 'category_description' => 'Comprehensive tools and systems designed to proactively identify, prevent, and mitigate risks for assets. Includes condition monitoring, predictive maintenance, emergency response, safety training, and compliance management. Enhances safety, reduces downtime, and ensures operational continuity.'],
        ];

        DB::table('asset_categories')->insert($categories);
    }
}

