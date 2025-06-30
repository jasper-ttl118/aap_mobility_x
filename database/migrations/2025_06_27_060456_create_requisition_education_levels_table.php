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
        Schema::create('requisition_education_levels', function (Blueprint $table) {
            $table->id('requisition_education_level_id');
            $table->foreignId('requisition_id')->constrained('requisitions', 'requisition_id')->onDelete('cascade');
            $table->string('requisition_education_level_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisition_education_levels');
    }
};
