<?php

namespace App\Livewire\Employee\Alphalist;

use Livewire\Component;
use Livewire\WithFileUploads;

class AddEmployee extends Component
{
    use WithFileUploads;
    // Basic Personal Information
    public $employee_lastname;
    public $employee_firstname;
    public $employee_middlename;
    public $employee_suffix;
    public $employee_maiden_name;
    public $employee_gender;
    public $employee_age;
    public $employee_birthdate;
    public $employee_birthplace;
    public $employee_religion;

    // Address Information
    // public $employee_present_address;
    // public $employee_permanent_address;
    public $present_house_no;
    public $present_street;
    public $present_brgy;
    public $present_city;
    public $present_province;
    public $present_zip_code;
    public $permanent_house_no;
    public $permanent_street;
    public $permanent_brgy;
    public $permanent_city;
    public $permanent_province;
    public $permanent_zip_code;

    // Contact Information
    public $employee_personal_email;
    public $employee_contact_no1;
    public $employee_contact_no2;
    public $employee_viber_number;

    // Educational Information
    public $employee_educational_attainment;
    public $employee_school_attended;
    public $employee_college_vocational_status;

    // Employment Information
    public $employee_job_position;
    public $department_id;
    public $employee_company_email;
    public $employee_employment_type;

    // Civil Status Information
    public $employee_civil_status;
    public $marriage_certificate_path;
    public $parents_birth_certificate_path;

    // Government Details Update Status
    public $sss_updated;
    public $philhealth_updated;
    public $pagibig_updated;
    public $pagibig_mdf_path;

    // Government IDs
    public $employee_sss_number;
    public $employee_philhealth_number;
    public $employee_pagibig_number;
    public $employee_tin_number;

    // Family Information
    public $employee_children_count;
    public $children_birth_certificates_path;
    public $employee_children_details = [
        ['name' => '', 'birthdate' => '']
    ];
    public $parents_birth_certificate_dependents_path;
    public $employee_parents_details;
    public $employee_father_name;
    public $employee_father_birthdate;
    public $employee_mother_name;
    public $employee_mother_birthdate;


    // Medical Information
    public $employee_blood_type;

    // Emergency Contact 1
    public $emergency_contact_1_name;
    public $emergency_contact_1_relationship;
    public $emergency_contact_1_number;
    public $emergency_contact_1_address;

    // Emergency Contact 2
    public $emergency_contact_2_name;
    public $emergency_contact_2_relationship;
    public $emergency_contact_2_number;
    public $emergency_contact_2_address;

    // System fields
    public $employee_status;
    public function mount()
    {
        $this->employee_gender = 'Male';
        $this->employee_religion = 'Catholic';
        $this->employee_status = 'Single';
    }
    public function add()
    {
        dump($this);
    }

    public function addChild()
    {
        $this->employee_children_details[] = ['name' => '', 'birthdate' => ''];
        // dump($this->employee_children_details);
    }

    public function removeChild($index)
    {
        unset($this->employee_children_details[$index]);
        $this->employee_children_details = array_values($this->employee_children_details);
    }

    public function render()
    {
        return view('livewire.employee.alphalist.add-employee');
    }
}
