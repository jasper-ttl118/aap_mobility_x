<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id('asset_id');
            $table->string('property_code');
            $table->string('asset_name');
            
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('brand_name_custom')->nullable();

            $table->foreign('brand_id')->references('brand_id')->on('brands')->nullOnDelete();

            $table->string('model_name');
            $table->foreignId('category_id');
            $table->foreignId('status_id');
            $table->foreignId('condition_id');
            $table->string('device_serial_number')->nullable();
            $table->string('charger_serial_number')->nullable();

            $table->enum('asset_type', ['1', '2']); // 1 for common asset, 2 for non-commons
            $table->foreignId('employee_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->date('date_accountable');

            $table->date('purchase_date');
            $table->date('warranty_exp_date')->nullable();
            $table->date('free_replacement_period')->nullable();
            $table->date('maint_sched')->nullable();
            $table->date('last_maint_sched')->nullable();
            $table->string('service_provider')->nullable();
            $table->string('check_out_status')->nullable(); //Hardcode with details
            $table->date('check_out_date')->nullable();
            $table->date('check_in_date')->nullable();
            $table->text('description')->nullable();

            $table->string('qr_code_path')->nullable();
            ;
            $table->string('qr_code_data')->nullable();
            ;
            $table->enum('ams_active', ['1', '2']); // 1 = Active | 2 = Soft Deleted
            $table->unsignedInteger('created_by_id')->nullable();  // User
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
