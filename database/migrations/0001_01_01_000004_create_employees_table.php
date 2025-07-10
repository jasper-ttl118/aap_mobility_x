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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('employee_id'); 
            $table->string('employee_firstname', 255);
            $table->string('employee_middlename', 255)->nullable();
            $table->string('employee_lastname', 255);
            $table->string('employee_suffix', 100)->nullable();
            $table->string('employee_mother_maiden_name', 255);
            $table->string('employee_gender', 50);
            $table->string('employee_profile_picture', 255)->nullable();
            $table->foreignId('department_id')->constrained('departments', 'department_id')->onDelete('cascade');
            $table->string('employee_section', 255);
            $table->boolean('employee_status')->default(1);
            $table->timestamp('employee_date_created')->useCurrent();
            $table->timestamp('employee_date_updated')->useCurrent()->useCurrentOnUpdate();

            $table->string('employee_birthdate', 255)->nullable();
            $table->string('employee_birthplace', 255)->nullable();
            $table->string('employee_religion', 255)->nullable();
            $table->string('employee_personal_email', 255)->nullable();
            $table->string('employee_contact_no1', 255)->nullable();
            $table->string('employee_contact_no2', 255)->nullable();
            $table->string('employee_viber_number', 255)->nullable();
            $table->string('employee_educational_attainment', 255)->nullable();
            $table->string('employee_school_attended', 255)->nullable();
            $table->string('employee_college_course', 255)->nullable();
            $table->string('employee_job_position', 255)->nullable();
            $table->string('employee_company_email', 255)->nullable();
            $table->string('employee_company_number', 255)->nullable();
            $table->string('employee_employment_type', 255)->nullable();
            $table->string('employee_civil_status', 255)->nullable();
            $table->string('employee_marriage_certificate_path', 255)->nullable();

            $table->boolean('employee_sss_updated')->nullable();
            $table->boolean('employee_philhealth_updated')->nullable();
            $table->boolean('employee_pagibig_updated')->nullable();
            $table->string('employee_pagibig_mdf_path', 255)->nullable();
            $table->string('employee_sss_number', 255)->nullable();
            $table->string('employee_philhealth_number', 255)->nullable();
            $table->string('employee_pagibig_number', 255)->nullable();
            $table->string('employee_tin_number', 255)->nullable();

            $table->string('employee_father_name', 255);
            $table->string('employee_father_birthdate', 255);
            $table->string('employee_father_birth_certificate', 255)->nullable();
            $table->string('employee_mother_name', 255);
            $table->string('employee_mother_birthdate', 255);
            $table->string('employee_mother_birth_certificate', 255)->nullable();
            $table->string('employee_blood_type', 255)->nullable();

            // Present Address
            $table->string('employee_present_house_no', 255)->nullable();
            $table->string('employee_present_street', 255)->nullable();
            $table->string('employee_present_brgy', 255)->nullable();
            $table->string('employee_present_city', 255)->nullable();
            $table->string('employee_present_province', 255)->nullable();
            $table->string('employee_present_zip_code', 255)->nullable();

            // Permanent Address
            $table->string('employee_permanent_house_no', 255)->nullable();
            $table->string('employee_permanent_street', 255)->nullable();
            $table->string('employee_permanent_brgy', 255)->nullable();
            $table->string('employee_permanent_city', 255)->nullable();
            $table->string('employee_permanent_province', 255)->nullable();
            $table->string('employee_permanent_zip_code', 255)->nullable();

            // Index for department_id
            $table->index('department_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('employees');
    }
};
