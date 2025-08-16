<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\AssetStatus;

class AssetStatusSeeder extends Seeder
{
    public function run(): void
    {
        try {
            if (DB::getDriverName() !== 'sqlite') {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            }
                AssetStatus::truncate();
            if (DB::getDriverName() !== 'sqlite') {
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
        } catch (Exception $e) {
            $this->command->warn('Foreign checks skipped. Reason: '  . $e->getMessage());
        }

        $statuses = [
            ['status_id' => 1, 'status_name' => 'AVAILABLE', 'status_description' => 'CURRENTLY NOT ASSIGNED OR IN USE AND IS AVAILABLE FOR ALLOCATION.'],
            ['status_id' => 2, 'status_name' => 'IN USE', 'status_description' => 'ASSIGNED TO A USER OR DEPARTMENT AND IS CURRENTLY BEING UTILIZED.'],
            ['status_id' => 3, 'status_name' => 'UNDER MAINTENANCE', 'status_description' => 'UNDERGOING SCHEDULED MAINTENANCE, REPAIRS, OR SERVICING.'],
            ['status_id' => 4, 'status_name' => 'DECOMMISSIONED', 'status_description' => 'REACHED THE END OF ITS USEFUL LIFE AND IS NO LONGER IN ACTIVE USE.'],
            ['status_id' => 5, 'status_name' => 'ON HOLD', 'status_description' => 'TEMPORARILY ON HOLD OR SUSPENDED FROM USE DUE TO SPECIFIC REASONS.'],
            ['status_id' => 6, 'status_name' => 'LOST/STOLEN', 'status_description' => 'REPORTED AS LOST OR STOLEN. SUBJECT TO INVESTIGATION OR REPLACEMENT.'],
        ];

        DB::table('asset_statuses')->insert($statuses);
    }
}
