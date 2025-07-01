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
        Schema::create('histories', function (Blueprint $table) {
            $table->id('history_id');
            $table->foreignId('asset_id');

            // Two employees: origin and target of the action
            $table->foreignId('emp_id_transfer_from')->nullable()->onDelete('set null');
            $table->foreignId('emp_id_transfer_to')->nullable()->onDelete('set null');

            // Optional foreign references
            $table->foreignId('borrow_id')->nullable();
            $table->foreignId('transfer_id')->nullable();

            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
