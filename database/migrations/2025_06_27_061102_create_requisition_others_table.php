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
        Schema::create('requisition_others', function (Blueprint $table) {
            $table->id('requisition_other_id');
            $table->foreignId('requisition_id')->constrained('requisitions', 'requisition_id')->onDelete('cascade');
            $table->string('requisition_other_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisition_others');
    }
};
