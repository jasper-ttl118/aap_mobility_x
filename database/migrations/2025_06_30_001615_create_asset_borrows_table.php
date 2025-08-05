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
        Schema::create('asset_borrows', function (Blueprint $table) {
            $table->id('borrow_id');
            $table->foreignId('asset_id');
            
            // Borrowed from 
            $table->unsignedBigInteger('emp_id_borrow_from')->nullable();
            $table->foreign('emp_id_borrow_from')->references('employee_id')->on('employees')->onDelete('set null');

            // Borrower 
            $table->unsignedBigInteger('emp_id_borrowing')->nullable();
            $table->foreign('emp_id_borrowing')->references('employee_id')->on('employees')->onDelete('set null');

            $table->date('date_borrowed');
            $table->date('date_due');
            $table->date('date_returned')->nullable();
            $table->enum('borrow_status', ['Borrowed', 'Returned']);
            $table->text('notes');

            // Add submitted and approved by when Users are impemented 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_borrows');
    }
};
