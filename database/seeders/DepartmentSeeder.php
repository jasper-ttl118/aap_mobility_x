<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'Administrative and Tower',
            'Autocare',
            'Office of the CEO',
            'MarComm',
            'Department of Corporate Affair and Governance',
            'ERS Central',
            'Accounting',
            'Human Resources and Development',
            'Insurance',
            'Information Systems Technology',
            'Legal',
            'Membership - Main',
            'Membership - Alabang',
            'Membership - Baliwag',
            'Membership - Dasmariñas',
            'Membership - Cebu',
            'Membership - Davao (Abreeza)',
            'Membership - Davao (SM Ecoland)',
            'Membership - Fairview',
            'Membership - Feliz',
            'Membership - La Union',
            'Membership - Southwoods',
            'Membership - Calamba',
            'Membership - Sta. Rosa',
            'Membership - Lipa',
            'Membership - Makati',
            'Membership - Ermita',
            'Membership - Market - Market',
            'Membership - Marquee',
            'Membership - San Fernando Pampanga',
            'Motorsports',
            'Motorpool',
            'Purchasing Road Safety',
            'Travel/Lakbay',
            'SOMCO',
        ];

        foreach ($departments as $name) {
            DB::table('departments')->insert([
                'department_name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
