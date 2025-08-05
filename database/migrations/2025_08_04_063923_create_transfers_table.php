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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();

            // References
            $table->unsignedBigInteger('asset_id');
            $table->unsignedBigInteger('from_department_id')->nullable();
            $table->unsignedBigInteger('from_employee_id')->nullable();
            $table->unsignedBigInteger('to_department_id')->nullable();
            $table->unsignedBigInteger('to_employee_id')->nullable();

            // Transfer details
            $table->date('transfer_date');
            $table->string('control_number')->unique();
            $table->text('reason')->nullable();

            // Timestamps
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('asset_id')->references('asset_id')->on('assets')->onDelete('cascade');
            $table->foreign('from_department_id')->references('department_id')->on('departments')->nullOnDelete();
            $table->foreign('from_employee_id')->references('employee_id')->on('employees')->nullOnDelete();
            $table->foreign('to_department_id')->references('department_id')->on('departments')->nullOnDelete();
            $table->foreign('to_employee_id')->references('employee_id')->on('employees')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
