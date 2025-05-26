<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //pivot table for adding many permissions to a submodule
    {
        Schema::create('submodule_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('submodule_id');
            $table->unsignedBigInteger('permission_id');
        
            $table->foreign('submodule_id')
                  ->references('submodule_id')
                  ->on('submodules')
                  ->onDelete('cascade');
        
            $table->foreign('permission_id')
                  ->references('permission_id')
                  ->on('permissions')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submodule_permissions');
    }
};
