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
        Schema::create('employee_emergency_contacts', function (Blueprint $table) {
            $table->id('employee_emergency_contact_id');
            $table->foreignId('employee_id')->constrained('employees', 'employee_id')->onDelete('cascade');
            $table->string('employee_emergency_contact_name');
            $table->string('employee_emergency_contact_relationship');
            $table->string('employee_emergency_contact_number');
            $table->string('employee_emergency_contact_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_emergency_contacts');
    }
};
