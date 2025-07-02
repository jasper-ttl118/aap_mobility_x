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
        Schema::create('asset_transfers', function (Blueprint $table) {
            $table->id('transfer_id');
            $table->foreignId('asset_id');

            // Transfer from 
            $table->unsignedBigInteger('emp_id_transfer_from')->nullable();
            $table->foreign('emp_id_transfer_from')->references('employee_id')->on('employees')->onDelete('set null');

            // Transfer to 
            $table->unsignedBigInteger('emp_id_transfer_to')->nullable();
            $table->foreign('emp_id_transfer_to')->references('employee_id')->on('employees')->onDelete('set null');

            $table->date('date_transferred');
            $table->text('notes')->nullable();
            // Add submitted and approved by when Users are impemented 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_transfers');
    }
};
