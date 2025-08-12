<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $departments = [
            ['department_id' => 1,  'department_code' => 'ADM',        'department_name' => 'Administrative and Tower'],
            ['department_id' => 2,  'department_code' => 'AUTOCARE',   'department_name' => 'Autocare'],
            ['department_id' => 3,  'department_code' => 'CEO',        'department_name' => 'Office of the CEO'],
            ['department_id' => 4,  'department_code' => 'MARCOMM',    'department_name' => 'MarComm'],
            ['department_id' => 5,  'department_code' => 'DCAG',       'department_name' => 'Department of Corporate Affair and Governance'],
            ['department_id' => 6,  'department_code' => 'ERSC',       'department_name' => 'ERS Central'],
            ['department_id' => 7,  'department_code' => 'ACC',        'department_name' => 'Accounting'],
            ['department_id' => 8,  'department_code' => 'HRD',        'department_name' => 'Human Resources and Development'],
            ['department_id' => 9,  'department_code' => 'INS',        'department_name' => 'Insurance'],
            ['department_id' => 10, 'department_code' => 'IST',        'department_name' => 'Information Systems Technology'],
            ['department_id' => 11, 'department_code' => 'LEGAL',      'department_name' => 'Legal'],
            ['department_id' => 12, 'department_code' => 'MBR-MAIN',   'department_name' => 'Membership - Main'],
            ['department_id' => 13, 'department_code' => 'MBR-ALA',    'department_name' => 'Membership - Alabang'],
            ['department_id' => 14, 'department_code' => 'MBR-BLWG',   'department_name' => 'Membership - Baliwag'],
            ['department_id' => 15, 'department_code' => 'MBR-DASMA',  'department_name' => 'Membership - Dasmariñas'],
            ['department_id' => 16, 'department_code' => 'MBR-CEBU',   'department_name' => 'Membership - Cebu'],
            ['department_id' => 17, 'department_code' => 'MBR-DVO-A',  'department_name' => 'Membership - Davao (Abreeza)'],
            ['department_id' => 18, 'department_code' => 'MBR-DVO-SM', 'department_name' => 'Membership - Davao (SM Ecoland)'],
            ['department_id' => 19, 'department_code' => 'MBR-FAIR',   'department_name' => 'Membership - Fairview'],
            ['department_id' => 20, 'department_code' => 'MBR-FELIZ',  'department_name' => 'Membership - Feliz'],
            ['department_id' => 21, 'department_code' => 'MBR-LU',     'department_name' => 'Membership - La Union'],
            ['department_id' => 22, 'department_code' => 'MBR-SWD',    'department_name' => 'Membership - Southwoods'],
            ['department_id' => 23, 'department_code' => 'MBR-CLMB',   'department_name' => 'Membership - Calamba'],
            ['department_id' => 24, 'department_code' => 'MBR-STR',    'department_name' => 'Membership - Sta. Rosa'],
            ['department_id' => 25, 'department_code' => 'MBR-LIPA',   'department_name' => 'Membership - Lipa'],
            ['department_id' => 26, 'department_code' => 'MBR-MKT',    'department_name' => 'Membership - Makati'],
            ['department_id' => 27, 'department_code' => 'MBR-ERMT',   'department_name' => 'Membership - Ermita'],
            ['department_id' => 28, 'department_code' => 'MBR-MRKT',   'department_name' => 'Membership - Market - Market'],
            ['department_id' => 29, 'department_code' => 'MBR-MRQ',    'department_name' => 'Membership - Marquee'],
            ['department_id' => 30, 'department_code' => 'MBR-SFP',    'department_name' => 'Membership - San Fernando Pampanga'],
            ['department_id' => 31, 'department_code' => 'MSPORTS',    'department_name' => 'Motorsports'],
            ['department_id' => 32, 'department_code' => 'MPOOL',      'department_name' => 'Motorpool'],
            ['department_id' => 33, 'department_code' => 'PRS',        'department_name' => 'Purchasing Road Safety'],
            ['department_id' => 34, 'department_code' => 'TRAVEL',     'department_name' => 'Travel/Lakbay'],
            ['department_id' => 35, 'department_code' => 'SOMCO',      'department_name' => 'SOMCO'],
        ];

        // Add timestamps
        $departments = array_map(function ($dept) use ($now) {
            return array_merge($dept, [
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }, $departments);

        // Upsert to avoid duplicates
        DB::table('departments')->upsert(
            $departments,
            ['department_id'], // unique key
            ['department_code', 'department_name', 'updated_at']
        );
    }
}
