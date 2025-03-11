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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('employee_firstname');
            $table->string('employee_middlename')->nullable();
            $table->string('employee_lastname');
            $table->string('employee_email')->unique();
            $table->text('employee_address')->nullable();
            $table->string('employee_position');
            $table->string('employee_department');
            $table->string('employee_contact_number');
            $table->boolean('employee_status')->default(1);
            $table->timestamp('employee_date_created')->useCurrent();
            $table->timestamp('employee_date_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
