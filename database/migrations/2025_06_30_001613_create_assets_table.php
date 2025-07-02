<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('assets')){
            Schema::create('assets', function (Blueprint $table) {
                $table->id('asset_id');
                $table->string('property_code');
                $table->string('asset_name');
                $table->foreignId('category_id');
                $table->foreignId('status_id');
                $table->date('purchase_date')->nullable();
                $table->date('warranty_exp_date')->nullable();
                $table->date('maint_sched')->nullable();
                $table->date('last_maint_sched')->nullable();
                $table->string('service_provider')->nullable();
                $table->string('check_out_status')->nullable(); //Hardcode with details
                $table->date('check_out_date')->nullable();    
                $table->date('check_in_date')->nullable();
                $table->text('description')->nullable();
                $table->foreignId('employee_id');
                $table->date('date_accountable')->nullable();
                $table->string('qr_code_path');
                $table->string('qr_code_data');
                $table->enum('ams_active',['1','2']); // 1 = Active | 2 = Soft Deleted
                $table->unsignedInteger('created_by_id')->nullable();  // User
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
