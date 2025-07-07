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
        // Only add columns that don't already exist
        $newColumnsToAdd = [
            'employee_birthdate' => 'date_nullable',
            'employee_birthplace' => 'string_nullable',
            'employee_religion' => 'string_nullable',
            'employee_permanent_address' => 'text_nullable',
            'employee_personal_email' => 'string_nullable',
            'employee_contact_no1' => 'string_nullable',
            'employee_contact_no2' => 'string_nullable',
            'employee_viber_number' => 'string_nullable',
            'employee_educational_attainment' => 'string_nullable',
            'employee_school_attended' => 'string_nullable',
            'employee_college_vocational_status' => 'string_nullable',
            'employee_job_position' => 'string_nullable',
            'employee_company_email' => 'string_nullable',
            'employee_employment_type' => 'string_nullable',
            'employee_civil_status' => 'string_nullable',
            'employee_marriage_certificate_path' => 'string_nullable',
            'employee_parents_birth_certificate_path' => 'string_nullable',
            'employee_sss_updated' => 'boolean_nullable',
            'employee_philhealth_updated' => 'boolean_nullable',
            'employee_pagibig_updated' => 'boolean_nullable',
            'employee_pagibig_mdf_path' => 'string_nullable',
            'employee_sss_number' => 'string_nullable',
            'employee_philhealth_number' => 'string_nullable',
            'employee_pagibig_number' => 'string_nullable',
            'employee_tin_number' => 'string_nullable',
            'employee_children_count' => 'string_nullable',
            'employee_children_birth_certificates_path' => 'string_nullable',

            'employee_children_1_details' => 'string_nullable',
            'employee_children_1_age' => 'string_nullable',
            'employee_children_1_birthdate' => 'string_nullable',
            'employee_children_2_details' => 'string_nullable',
            'employee_children_2_age' => 'string_nullable',
            'employee_children_2_birthdate' => 'string_nullable',

            'employee_parents_birth_certificate_dependents_path' => 'string_nullable',

            'employee_parents_1_details' => 'string_nullable',
            'employee_parents_1_age' => 'string_nullable',
            'employee_parents_1_birthdate' => 'string_nullable',
            'employee_parents_2_details' => 'string_nullable',
            'employee_parents_2_age' => 'string_nullable',
            'employee_parents_2_birthdate' => 'string_nullable',

            'employee_blood_type' => 'string_nullable',
            'employee_emergency_contact_1_name' => 'string_nullable',
            'employee_emergency_contact_1_relationship' => 'string_nullable',
            'employee_emergency_contact_1_number' => 'string_nullable',
            'employee_emergency_contact_1_address' => 'text_nullable',
            'employee_emergency_contact_2_name' => 'string_nullable',
            'employee_emergency_contact_2_relationship' => 'string_nullable',
            'employee_emergency_contact_2_number' => 'string_nullable',
            'employee_emergency_contact_2_address' => 'text_nullable',
        ];

        Schema::table('employees', function (Blueprint $table) use ($newColumnsToAdd) {
            foreach ($newColumnsToAdd as $columnName => $columnType) {
                if (!Schema::hasColumn('employees', $columnName)) {
                    switch ($columnType) {
                        case 'string_nullable':
                            $table->string($columnName)->nullable();
                            break;
                        case 'text_nullable':
                            $table->text($columnName)->nullable();
                            break;
                        case 'date_nullable':
                            $table->date($columnName)->nullable();
                            break;
                        case 'boolean_nullable':
                            $table->boolean($columnName)->nullable();
                            break;
                    }
                }
            }
        });

        // Rename existing employee_address to employee_present_address
        Schema::table('employees', function (Blueprint $table) {
            if (Schema::hasColumn('employees', 'employee_address') && !Schema::hasColumn('employees', 'employee_present_address')) {
                $table->renameColumn('employee_address', 'employee_present_address');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Drop the new columns that were added
            $columnsToRemove = [
                'emergency_contact_2_address',
                'emergency_contact_2_number',
                'emergency_contact_2_relationship',
                'emergency_contact_2_name',
                'emergency_contact_1_address',
                'emergency_contact_1_number',
                'emergency_contact_1_relationship',
                'emergency_contact_1_name',
                'employee_blood_type',
                'employee_parents_2_birthdate',
                'employee_parents_2_age',
                'employee_parents_2_details',
                'employee_parents_1_birthdate',
                'employee_parents_1_age',
                'employee_parents_1_details',
                'parents_birth_certificate_dependents_path',
                'employee_children_2_birthdate',
                'employee_children_2_age',
                'employee_children_2_details',
                'employee_children_1_birthdate',
                'employee_children_1_age',
                'employee_children_1_details',
                'children_birth_certificates_path',
                'employee_children_count',
                'employee_tin_number',
                'employee_pagibig_number',
                'employee_philhealth_number',
                'employee_sss_number',
                'pagibig_mdf_path',
                'pagibig_updated',
                'philhealth_updated',
                'sss_updated',
                'parents_birth_certificate_path',
                'marriage_certificate_path',
                'employee_civil_status',
                'employee_employment_type',
                'employee_company_email',
                'employee_job_position',
                'employee_college_vocational_status',
                'employee_school_attended',
                'employee_educational_attainment',
                'employee_viber_number',
                'employee_contact_no2',
                'employee_contact_no1',
                'employee_personal_email',
                'employee_permanent_address',
                'employee_religion',
                'employee_birthplace',
                'employee_birthdate'
            ];

            foreach ($columnsToRemove as $column) {
                if (Schema::hasColumn('employees', $column)) {
                    $table->dropColumn($column);
                }
            }
        });

        // Rename back to original column name
        Schema::table('employees', function (Blueprint $table) {
            if (Schema::hasColumn('employees', 'employee_present_address') && !Schema::hasColumn('employees', 'employee_address')) {
                $table->renameColumn('employee_present_address', 'employee_address');
            }
        });
    }
};