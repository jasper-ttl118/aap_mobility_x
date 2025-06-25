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
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id('requisition_id');
            $table->string('requisition_job_position');
            $table->text('requisition_job_description');
            $table->string('requisition_type');
            $table->string('requisition_department');
            $table->string('requisition_requestor_name');
            $table->integer('requisition_salary_min');
            $table->integer('requisition_salary_max');
            $table->tinyInteger('requisition_status')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitions');
    }
};
