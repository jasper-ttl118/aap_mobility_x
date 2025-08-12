<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Asset;
use App\Models\Brand;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;

class AssetSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Asset::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // SHORT CODES (ALL CAPS) FOR PROPERTY CODE PREFIX
        $shortCodes = [
            'LAPTOP'            => 'LPTP',
            'PRINTER'           => 'PRTR',
            'OFFICE TABLE'      => 'TBLE',
            'SWITCH'            => 'SWCH',
            'CELLPHONE'         => 'CPHN',
            'MONITOR'           => 'MNTR',
            'ROUTER'            => 'RUTR',
            'OFFICE CHAIR'      => 'CHR',
            'PHOTOCOPIER'       => 'PHCP',
            'DESKTOP'           => 'DSKT',
            'TABLET'            => 'TBLT',
            'PROJECTOR'         => 'PJTR',
            'SCANNER'           => 'SCNR',
            'UPS'               => 'UPSP',
            'ACCESS POINT'      => 'ACPT',
            'CCTV'              => 'CCTV',
        ];

        // 15 ASSETS ACROSS MULTIPLE CATEGORIES
        // category_id: 1=IT EQUIPMENT, 6=MOBILE DEVICES (use brand_id), others use brand_name_custom
        // asset_type: 2=NON-COMMON (employee), 1=COMMON (department)
        $assets = [
            ['asset_name' => 'Laptop',        'brand' => 'Dell',       'model' => 'LATITUDE 5420',   'category_id' => 1, 'asset_type' => 2, 'branch_id' => 2,  'department_id' => 10],
            ['asset_name' => 'Printer',       'brand' => 'HP',         'model' => 'LASERJET PRO',    'category_id' => 1, 'asset_type' => 1, 'branch_id' => 2,  'department_id' => 7],
            ['asset_name' => 'Office Table',  'brand' => 'IKEA',       'model' => 'OFFICEPRO',       'category_id' => 2, 'asset_type' => 1, 'branch_id' => 2,  'department_id' => 1],
            ['asset_name' => 'Switch',        'brand' => 'Cisco',      'model' => 'CATALYST 2960',   'category_id' => 1, 'asset_type' => 1, 'branch_id' => 2,  'department_id' => 10],
            ['asset_name' => 'Cellphone',     'brand' => 'Apple',      'model' => 'IPHONE 13',       'category_id' => 6, 'asset_type' => 2, 'branch_id' => 2,  'department_id' => 10],
            ['asset_name' => 'Monitor',       'brand' => 'Samsung',    'model' => 'S24F350',         'category_id' => 1, 'asset_type' => 1, 'branch_id' => 2,  'department_id' => 8],
            ['asset_name' => 'Desktop',       'brand' => 'Lenovo',     'model' => 'THINKCENTRE',     'category_id' => 1, 'asset_type' => 2, 'branch_id' => 2,  'department_id' => 10],
            ['asset_name' => 'Tablet',        'brand' => 'Samsung',    'model' => 'GALAXY TAB A9',   'category_id' => 6, 'asset_type' => 2, 'branch_id' => 2,  'department_id' => 4],
            ['asset_name' => 'Office Chair',  'brand' => 'Steelcase',  'model' => 'SERIES 1',        'category_id' => 2, 'asset_type' => 1, 'branch_id' => 2,  'department_id' => 4],
            ['asset_name' => 'Photocopier',   'brand' => 'Ricoh',      'model' => 'MP 301',          'category_id' => 5, 'asset_type' => 1, 'branch_id' => 2,  'department_id' => 7],
            ['asset_name' => 'Projector',     'brand' => 'Epson',      'model' => 'EB-X06',          'category_id' => 5, 'asset_type' => 1, 'branch_id' => 2,  'department_id' => 4],
            ['asset_name' => 'Scanner',       'brand' => 'Fujitsu',    'model' => 'FI-7160',         'category_id' => 5, 'asset_type' => 1, 'branch_id' => 2,  'department_id' => 7],
            ['asset_name' => 'UPS',           'brand' => 'APC',        'model' => 'BX1100LI-MS',     'category_id' => 3, 'asset_type' => 1, 'branch_id' => 2,  'department_id' => 10],
            ['asset_name' => 'Access Point',  'brand' => 'Cisco',      'model' => 'AIR-AP1850',      'category_id' => 1, 'asset_type' => 2, 'branch_id' => 2,  'department_id' => 10],
            ['asset_name' => 'CCTV',          'brand' => 'Hikvision',  'model' => 'DS-2CD1043G0',    'category_id' => 3, 'asset_type' => 1, 'branch_id' => 2,  'department_id' => 1],
        ];

        // Code maps for building property_code
        $branchCodes = Branch::pluck('branch_code', 'branch_id')->map(fn ($c) => strtoupper($c))->toArray();
        $deptCodes   = Department::pluck('department_code', 'department_id')->map(fn ($c) => strtoupper($c))->toArray();

        // Only use employees 1..10 for NON-COMMON assignment
        $employeeIds = Employee::whereBetween('employee_id', [1, 10])->pluck('employee_id')->all();
        if (empty($employeeIds)) {
            throw new \Exception('NO EMPLOYEES WITH IDs 1..10. SEED 10 EMPLOYEES FIRST.');
        }

        // Helper: generate 15-digit IMEI
        $genImei = function () {
            $n = '';
            for ($i = 0; $i < 15; $i++) {
                $n .= random_int(0, 9);
            }
            return $n;
        };

        $sequence = 1; // 0001..0015

        foreach ($assets as $item) {
            $categoryId   = (int) $item['category_id'];
            $assetType    = (int) $item['asset_type'];
            $assetNameUC  = strtoupper($item['asset_name']);
            $modelUC      = strtoupper($item['model']);

            // BRAND LOGIC
            $brand_id = null;
            $brand_name_custom = null;

            if (in_array($categoryId, [1, 6], true)) {
                // IT/Mobile: must use brand_id from your provided list
                $brand = Brand::where('brand_name', strtoupper($item['brand']))->first();
                if (!$brand) {
                    throw new \Exception("BRAND '{$item['brand']}' NOT FOUND IN BRANDS TABLE.");
                }
                $brand_id = $brand->brand_id;
                $brand_name_custom = null;
            } else {
                // Other categories: custom brand name (ALL CAPS), no brand_id
                $brand_id = null;
                $brand_name_custom = strtoupper($item['brand']);
            }

            // Resolve assignment + codes for property_code
            $assignedEmployeeId   = null;
            $assignedDepartmentId = null;

            $deptCodeForCode   = null;
            $branchCodeForCode = null;

            if ($assetType === 2) {
                // NON-COMMON → assign to random employee (ID 1..10)
                $assignedEmployeeId = $employeeIds[array_rand($employeeIds)];
                $emp = Employee::select('department_id', 'branch_id')->find($assignedEmployeeId);

                // Use employee's department/branch codes
                $deptCodeForCode   = $emp?->department_id ? ($deptCodes[$emp->department_id] ?? 'DEPT') : 'DEPT';
                $branchCodeForCode = $emp?->branch_id ? ($branchCodes[$emp->branch_id] ?? 'MAIN') : 'MAIN';

                // In DB: department_id must be NULL for NON-COMMON
                $assignedDepartmentId = null;
            } else {
                // COMMON → assign to provided department (cap at 35)
                $deptId = min((int) $item['department_id'], 35);
                $assignedDepartmentId = $deptId;

                $deptCodeForCode   = $deptCodes[$deptId] ?? 'DEPT';
                $branchCodeForCode = $branchCodes[(int) $item['branch_id']] ?? 'MAIN';

                // In DB: employee_id must be NULL for COMMON
                $assignedEmployeeId = null;
            }

            // PROPERTY CODE
            $short = $shortCodes[$assetNameUC] ?? substr(preg_replace('/[^A-Z]/', '', $assetNameUC), 0, 4);
            $seq   = str_pad((string) $sequence, 4, '0', STR_PAD_LEFT);
            $propertyCode = strtoupper("{$short}-{$branchCodeForCode}-{$deptCodeForCode}-{$seq}");

            // Dates and costs
            $purchaseDate  = now()->subDays(random_int(200, 400));
            $warrantyYears = random_int(1, 3);
            $warrantyExp   = $purchaseDate->copy()->addYears($warrantyYears);
            $freeUnit      = random_int(0, 1) ? 'days' : 'weeks';
            $freeOffset    = random_int(15, 60);
            $freeReplace   = $purchaseDate->copy()->add($freeUnit, $freeOffset);
            $acqCost       = random_int(5000, 120000);

            // IMEI only for Mobile Devices (category_id = 6)
            $imei1 = null;
            $imei2 = null;
            if ($categoryId === 6) {
                $imei1 = $genImei();
                $imei2 = $genImei();
            }

            Asset::create([
                'property_code'           => $propertyCode,
                'asset_name'              => $assetNameUC,
                'brand_id'                => $brand_id,            // IT/Mobile only
                'brand_name_custom'       => $brand_name_custom,   // others only
                'model_name'              => $modelUC,
                'category_id'             => $categoryId,
                'status_id'               => random_int(1, 5),
                'condition_id'            => random_int(1, 5),
                'device_serial_number'    => in_array($categoryId, [1, 6], true) ? ('DEV-' . random_int(100000, 999999)) : null,
                'charger_serial_number'   => in_array($categoryId, [1, 6], true) ? ('CHR-' . random_int(100000, 999999)) : null,
                'imei1'                   => $imei1,
                'imei2'                   => $imei2,
                'acquisition_cost'        => $acqCost,
                'asset_type'              => $assetType,               // 2=NON-COMMON, 1=COMMON
                'employee_id'             => $assignedEmployeeId,      // set for NON-COMMON
                'department_id'           => $assignedDepartmentId,    // set for COMMON
                'date_accountable'        => now()->subDays(random_int(10, 60)),
                'purchase_date'           => $purchaseDate,
                'warranty_exp_date'       => $warrantyExp,
                'free_replacement_period' => $freeReplace,
                'maint_sched'             => now()->addMonths(4),
                'last_maint_sched'        => now()->subMonths(1),
                'service_provider'        => 'SERVICEPRO INC.',
                'check_out_status'        => 'IN USE',
                'check_out_date'          => now()->subMonth(),
                'check_in_date'           => null,
                'description'             => 'AUTO-SEEDED ASSET RECORD.',
                'qr_code_path'            => 'STORAGE/QRCODES/' . $propertyCode . '.PNG',
                'qr_code_data'            => $propertyCode,
                'ams_active'              => 1,
                'created_by_id'           => 1,
            ]);

            $sequence++;
        }
    }
}
