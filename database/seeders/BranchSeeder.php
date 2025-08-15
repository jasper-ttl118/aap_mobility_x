<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $branches = [
            ['branch_id' => 1,  'branch_code' => 'ALA',        'branch_name' => 'Alabang'],
            ['branch_id' => 2,  'branch_code' => 'MAIN',       'branch_name' => 'Quezon City'],
            ['branch_id' => 3,  'branch_code' => 'MKT',        'branch_name' => 'Makati'],
            ['branch_id' => 4,  'branch_code' => 'PAM',        'branch_name' => 'Pampanga'],
            ['branch_id' => 5,  'branch_code' => 'CEBU',       'branch_name' => 'Cebu'],
            ['branch_id' => 6,  'branch_code' => 'DAV',        'branch_name' => 'Davao'],
            ['branch_id' => 7,  'branch_code' => 'LIPA',       'branch_name' => 'Lipa Batangas'],
            ['branch_id' => 8,  'branch_code' => 'SOM',        'branch_name' => 'Somco'],
            ['branch_id' => 9,  'branch_code' => 'AYAF',       'branch_name' => 'Ayala Feliz'],
            ['branch_id' => 10, 'branch_code' => 'FAIR',       'branch_name' => 'Fairview'],
            ['branch_id' => 11, 'branch_code' => 'LU',         'branch_name' => 'LA UNION'],
            ['branch_id' => 12, 'branch_code' => 'SOWD',       'branch_name' => 'SOUTHWOODS'],
            ['branch_id' => 13, 'branch_code' => 'CLMB',       'branch_name' => 'CALAMBA'],
            ['branch_id' => 14, 'branch_code' => 'DSMA',       'branch_name' => 'DASMARIÑAS'],
            ['branch_id' => 15, 'branch_code' => 'STR',        'branch_name' => 'STA ROSA'],
            ['branch_id' => 16, 'branch_code' => 'ABRZ',       'branch_name' => 'AAP ABREEZA'],
            ['branch_id' => 17, 'branch_code' => 'MRQ',        'branch_name' => 'MARQUEE'],
            ['branch_id' => 18, 'branch_code' => 'EMTA',       'branch_name' => 'ERMITA'],
            ['branch_id' => 19, 'branch_code' => 'BTB',        'branch_name' => 'BY THE BAY'],
            ['branch_id' => 20, 'branch_code' => 'BLWG',       'branch_name' => 'BALIWAG'],
            ['branch_id' => 21, 'branch_code' => 'MRKT MRKT',  'branch_name' => 'MARKET! MARKET!'],
        ];

        // Add timestamps (if your table uses them)
        $branches = array_map(function ($b) use ($now) {
            return array_merge($b, ['created_at' => $now, 'updated_at' => $now]);
        }, $branches);

        // Upsert by primary key to avoid duplicates on repeated seeding
        DB::table('branches')->upsert(
            $branches,
            ['branch_id'],                      // unique/constraint column(s)
            ['branch_code', 'branch_name', 'updated_at'] // columns to update on conflict
        );
    }
}
