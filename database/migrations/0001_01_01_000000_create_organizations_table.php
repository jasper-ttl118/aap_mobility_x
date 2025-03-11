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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id('org_id');
            $table->string('org_name');
            $table->text('org_description')->nullable();
            $table->string('org_logo')->nullable();
            $table->boolean('org_status')->default(1);
            $table->timestamp('org_date_created')->useCurrent();
            $table->timestamp('org_date_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
