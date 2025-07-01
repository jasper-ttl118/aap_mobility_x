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
            // $table->string('requisition_job_position');
            $table->text('requisition_job_description');
            $table->string('requisition_type');
            $table->string('requisition_department');
            $table->string('requisition_requestor_name');
            $table->integer('requisition_salary_min');
            $table->integer('requisition_salary_max');
            $table->tinyInteger('requisition_status')->unsigned();

            $table->string('requisition_candidates');
            $table->string('requisition_section');
            $table->string('requisition_initial_job_position');
            $table->string('requisition_justification');
            $table->string('requisition_eventual_job_position');
            $table->integer('requisition_number_required');
            $table->string('requisition_contract_duration');
            $table->string('requisition_signature');
            $table->string('requisition_employment_type');
            $table->string('requisition_budget');
            $table->string('requisition_engagement_type');
            $table->text('requisition_education');
            $table->text('requisition_work_experience');
            $table->text('requisition_special_skills');
            $table->text('requisition_other_description')->nullable();
            $table->string('requisition_applicants_sources');
            $table->string('requisition_requestor_position');
            $table->string('requisition_requestor_signature');
            $table->string('requisition_endorser_name');
            $table->string('requisition_endorser_position');
            $table->string('requisition_endorser_signature');
            $table->string('requisition_approver_name');
            $table->string('requisition_approver_position');
            $table->string('requisition_approver_signature');
            $table->string('requisition_approver_name_1');
            $table->string('requisition_approver_position_1');
            $table->string('requisition_approver_signature_1');
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
