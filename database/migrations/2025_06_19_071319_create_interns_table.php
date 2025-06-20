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
        Schema::create('interns', function (Blueprint $table) {
            $table->id('intern_id');
            $table->string('intern_firstname');
            $table->string('intern_middlename')->nullable();
            $table->string('intern_lastname');
            $table->boolean('intern_type');
            $table->string('intern_school');
            $table->integer('intern_required_hours');
            $table->string('intern_email')->unique();
            $table->text('intern_address')->nullable();
            $table->string('intern_position');
            $table->string('intern_department');
            $table->string('intern_contact_number');
            $table->boolean('intern_status')->default(1);
            $table->timestamp('intern_date_created')->useCurrent();
            $table->timestamp('intern_date_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interns');
    }
};
