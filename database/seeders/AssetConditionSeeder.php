<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetConditionSeeder extends Seeder
{
    public function run(): void
    {
        // Optional: clear existing records first
        DB::table('asset_conditions')->truncate();

        $conditions = [
            ['condition_name' => 'BRAND NEW', 'condition_description' => 'Unused and in perfect condition.'],
            ['condition_name' => 'USED - GOOD', 'condition_description' => 'Lightly used with no functional issues.'],
            ['condition_name' => 'USED - FAIR', 'condition_description' => 'Functional but with visible wear or minor defects.'],
            ['condition_name' => 'DAMAGED', 'condition_description' => 'Defective or significantly worn, needs repair.'],
            ['condition_name' => 'FOR DISPOSAL', 'condition_description' => 'No longer usable, scheduled for disposal.'],
        ];

        DB::table('asset_conditions')->insert($conditions);
    }
}
