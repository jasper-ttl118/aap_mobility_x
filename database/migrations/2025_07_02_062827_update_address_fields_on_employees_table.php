<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Drop old address columns if they exist
            if (Schema::hasColumn('employees', 'employee_present_address')) {
                $table->dropColumn('employee_present_address');
            }
            if (Schema::hasColumn('employees', 'employee_permanent_address')) {
                $table->dropColumn('employee_permanent_address');
            }

            // Add new present address fields
            $table->string('present_house_no')->nullable();
            $table->string('present_street')->nullable();
            $table->string('present_brgy')->nullable();
            $table->string('present_city')->nullable();
            $table->string('present_province')->nullable();
            $table->string('present_zip_code')->nullable();

            // Add new permanent address fields
            $table->string('permanent_house_no')->nullable();
            $table->string('permanent_street')->nullable();
            $table->string('permanent_brgy')->nullable();
            $table->string('permanent_city')->nullable();
            $table->string('permanent_province')->nullable();
            $table->string('permanent_zip_code')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Drop new address columns
            $table->dropColumn([
                'present_house_no',
                'present_street',
                'present_brgy',
                'present_city',
                'present_province',
                'present_zip_code',
                'permanent_house_no',
                'permanent_street',
                'permanent_brgy',
                'permanent_city',
                'permanent_province',
                'permanent_zip_code',
            ]);

            // Re-add old address fields
            $table->text('employee_present_address')->nullable();
            $table->text('employee_permanent_address')->nullable();
        });
    }
};
