<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Department;
use App\Models\Employee;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddEmployee extends Component
{
    use WithFileUploads;
    // Basic Personal Information
    public $employee_profile_picture;
    public $employee_lastname;
    public $employee_firstname;
    public $employee_middlename;
    public $employee_suffix;
    public $employee_mother_maiden_name;
    public $employee_gender;
    // public $employee_age;
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
    public $employee_company_email;
    public $employee_company_number;
    public $employee_viber_number;

    // Educational Information
    public $employee_educational_attainment;
    public $employee_school_attended;
    public $employee_college_course;

    // Employment Information
    public $employee_job_position;
    public $department_id;
    public $employee_employment_type;
    public $employee_section;

    // Civil Status Information
    public $employee_civil_status;
    public $marriage_certificate_path;

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
    // public $children_birth_certificates_path;
    public $employee_children_details = [
        ['name' => '', 'birthdate' => '', 'birth_certificate' => '']
    ];
    // public $parents_birth_certificate_dependents_path;
    // public $employee_parents_details;
    public $employee_father_name;
    public $employee_father_birthdate;
    public $employee_father_birth_certificate;
    public $employee_mother_name;
    public $employee_mother_birthdate;
    public $employee_mother_birth_certificate;

    // Medical Information
    public $employee_blood_type;

    // Emergency Contacts
    public $emergency_contact_details = [
        ['name' => '', 'relationship' => '', 'number' => '', 'address' => '']
    ];
    public $departments;


    public function mount()
    {
        $this->employee_gender = 'Male';
        $this->employee_religion = 'Catholic';
        $this->employee_suffix = 'Jr.';
        $this->departments = Department::all();
        $this->employee_blood_type = 'A+';
        $this->employee_civil_status = 'Single';
        $this->employee_employment_type = 'Regular';
        $this->department_id = 1; 
        $this->employee_educational_attainment = 'No Grade Completed';
    }

    public function add()
    {
        // dump($this);
        // dd($this->employee_children_details);
        // $this->validate();
        DB::beginTransaction();

        try {
            // dd('end');
            $employee_profile_path = null;
            $marriage_certificate_path = null;
            $father_birth_cert_path = null;
            $mother_birth_cert_path = null;
            $pagibig_mdf_path = null;

            if ($this->employee_profile_picture) {
                $originalName = $this->employee_profile_picture->getClientOriginalName();
                $filename = time() . '_' . $originalName;
                $employee_profile_path = $this->employee_profile_picture->storeAs('employee-profile', $filename, 'public');
            }

            if ($this->marriage_certificate_path) {
                $originalName = $this->marriage_certificate_path->getClientOriginalName();
                $filename = time() . '_' . $originalName;
                $marriage_certificate_path = $this->marriage_certificate_path->storeAs('employee-profile', $filename, 'public');
            }

            if ($this->employee_father_birth_certificate) {
                $originalName = $this->employee_father_birth_certificate->getClientOriginalName();
                $filename = time() . '_' . $originalName;
                $father_birth_cert_path = $this->employee_father_birth_certificate->storeAs('employee-profile', $filename, 'public');
            }

            if ($this->employee_mother_birth_certificate) {
                $originalName = $this->employee_mother_birth_certificate->getClientOriginalName();
                $filename = time() . '_' . $originalName;
                $mother_birth_cert_path = $this->employee_mother_birth_certificate->storeAs('employee-profile', $filename, 'public');
            }

            if ($this->pagibig_mdf_path) {
                $originalName = $this->pagibig_mdf_path->getClientOriginalName();
                $filename = time() . '_' . $originalName;
                $pagibig_mdf_path = $this->pagibig_mdf_path->storeAs('employee-profile', $filename, 'public');
            }

            // dump($father_birth_cert_path, $mother_birth_cert_path);


            // 1. Create Employee
            $employee = Employee::create([
                'employee_profile_picture'     => $employee_profile_path,
                'employee_lastname'            => $this->employee_lastname,
                'employee_firstname'           => $this->employee_firstname,
                'employee_middlename'          => $this->employee_middlename,
                'employee_suffix'              => $this->employee_suffix,
                'employee_mother_maiden_name'  => $this->employee_mother_maiden_name,
                'employee_gender'              => $this->employee_gender,
                'employee_birthdate'           => $this->employee_birthdate,
                'employee_birthplace'          => $this->employee_birthplace,
                'employee_religion'            => $this->employee_religion,

                // Present Address
                'employee_present_house_no'             => $this->present_house_no,
                'employee_present_street'               => $this->present_street,
                'employee_present_brgy'                 => $this->present_brgy,
                'employee_present_city'                 => $this->present_city,
                'employee_present_province'             => $this->present_province,
                'employee_present_zip_code'             => $this->present_zip_code,

                // Permanent Address
                'employee_permanent_house_no'           => $this->permanent_house_no,
                'employee_permanent_street'             => $this->permanent_street,
                'employee_permanent_brgy'               => $this->permanent_brgy,
                'employee_permanent_city'               => $this->permanent_city,
                'employee_permanent_province'           => $this->permanent_province,
                'employee_permanent_zip_code'           => $this->permanent_zip_code,

                // Contact Info
                'employee_personal_email'      => $this->employee_personal_email,
                'employee_contact_no1'         => $this->employee_contact_no1,
                'employee_contact_no2'         => $this->employee_contact_no2,
                'employee_company_email'       => $this->employee_company_email,
                'employee_company_number'      => $this->employee_company_number,
                'employee_viber_number'        => $this->employee_viber_number,

                // Education
                'employee_educational_attainment' => $this->employee_educational_attainment,
                'employee_school_attended'        => $this->employee_school_attended,
                'employee_college_course' => $this->employee_college_course,

                // Employment
                'employee_job_position'        => $this->employee_job_position,
                'department_id'                => $this->department_id,
                'employee_employment_type'     => $this->employee_employment_type,
                'employee_section'             => $this->employee_section,

                // Civil Status
                'employee_civil_status'        => $this->employee_civil_status,
                'employee_marriage_certificate_path'    => $marriage_certificate_path,

                // Government Update
                'employee_sss_updated'                  => $this->sss_updated,
                'employee_philhealth_updated'           => $this->philhealth_updated,
                'employee_pagibig_updated'              => $this->pagibig_updated,
                'employee_pagibig_mdf_path'             => $pagibig_mdf_path,

                // Government IDs
                'employee_sss_number'          => $this->employee_sss_number,
                'employee_philhealth_number'   => $this->employee_philhealth_number,
                'employee_pagibig_number'      => $this->employee_pagibig_number,
                'employee_tin_number'          => $this->employee_tin_number,

                // Family
                'employee_father_name'         => $this->employee_father_name,
                'employee_father_birthdate'    => $this->employee_father_birthdate,
                'employee_father_birth_certificate' => $father_birth_cert_path,
                'employee_mother_name'         => $this->employee_mother_name,
                'employee_mother_birthdate'    => $this->employee_mother_birthdate,
                'employee_mother_birth_certificate' => $mother_birth_cert_path,

                // Medical
                'employee_blood_type'          => $this->employee_blood_type,
            ]);

            // 2. Add Children
            foreach ($this->employee_children_details as $child) {
                if (empty($child['name']) && empty($child['birthdate'])) {
                    continue;
                }

                $certificatePath = null;

                if ($child['birth_certificate']) {
                    $originalName = $child['birth_certificate']->getClientOriginalName();
                    $uniqueName = time() . '_' . $originalName;
                    
                    // Store the file
                    $child['birth_certificate']->storeAs('birth-certificates/children', $uniqueName, 'public');

                    // Save full relative path to DB
                    $certificatePath = 'birth-certificates/children/' . $uniqueName;
                    // dump($certificatePath);
                }

                $employee->employeeChildren()->create([
                    'employee_child_name'              => $child['name'],
                    'employee_child_birthdate'         => $child['birthdate'],
                    'employee_child_birth_certificate' => $certificatePath,
                ]);
            }
            

            // 3. Add Emergency Contacts
            foreach ($this->emergency_contact_details as $contact) {
                $employee->employeeEmergencyContacts()->create([
                    'employee_emergency_contact_name'        => $contact['name'],
                    'employee_emergency_contact_relationship'=> $contact['relationship'],
                    'employee_emergency_contact_number'      => $contact['number'],
                    'employee_emergency_contact_address'     => $contact['address'],
                ]);
            }

            DB::commit();

            if ($employee) {
                // dump('test');
                $this->dispatch('swal:result', [
                    'title' => 'Success',
                    'text' => 'Employee added successfully!',
                    'icon' => 'success',
                ]);
            } else {
                // dump('else');
                $this->dispatch('swal:result', [
                    'title' => 'Error',
                    'text' => 'Error',
                    'icon' => 'Warning',
                ]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            dump($e->getMessage());
            session()->flash('toast', 'Failed to add employee: ' . $e->getMessage());
        }
    }   

    public function addChild()
    {
        $this->employee_children_details[] = ['name' => '', 'birthdate' => '', 'birth_certificate' => ''];
        // dump($this->employee_children_details);
    }

    public function removeChild($index)
    {
        unset($this->employee_children_details[$index]);
        $this->employee_children_details = array_values($this->employee_children_details);
    }

    public function addContact()
    {
        $this->emergency_contact_details[] = ['name' => '', 'relationship' => '', 'number' => '', 'address' => ''];
        // dump(count($this->emergency_contact_details));
    }

    public function removeContact($index)
    {
        unset($this->emergency_contact_details[$index]);
        $this->emergency_contact_details = array_values($this->emergency_contact_details);
    }

    public function rules()
    {
        return [
            'employee_lastname' => 'required',
            'employee_firstname' => 'required',
            'employee_middlename' => 'required',
            'employee_mother_maiden_name' => 'required',
            'employee_gender' => 'required',
            'employee_birthdate' => 'required|date',
            'employee_birthplace' => 'required',
            'employee_religion' => 'required',

            // Present Address
            'present_house_no' => 'required',
            'present_street' => 'required',
            'present_brgy' => 'required',
            'present_city' => 'required',
            'present_province' => 'required',
            'present_zip_code' => 'required',

            // Permanent Address
            'permanent_house_no' => 'required',
            'permanent_street' => 'required',
            'permanent_brgy' => 'required',
            'permanent_city' => 'required',
            'permanent_province' => 'required',
            'permanent_zip_code' => 'required',

            // Contact
            'employee_personal_email' => 'required|email',
            'employee_contact_no1' => 'required',
            'employee_viber_number' => 'required',

            // Education
            'employee_educational_attainment' => 'required',
            'employee_school_attended' => 'required',
            'employee_college_course' => 'required',

            // Employment
            'employee_job_position' => 'required',
            'department_id' => 'required',
            'employee_employment_type' => 'required',
            'employee_section' => 'required',

            // Civil Status
            'employee_civil_status' => 'required',

            // Parental Info
            'employee_father_name' => 'required',
            'employee_father_birthdate' => 'required|date',
            'employee_father_birth_certificate' => 'required|file',

            'employee_mother_name' => 'required',
            'employee_mother_birthdate' => 'required|date',
            'employee_mother_birth_certificate' => 'required|file',

            'employee_tin_number' => 'required',
            'employee_pagibig_number' => 'required',
            'employee_philhealth_number' => 'required',
            'employee_sss_number' => 'required',

            'emergency_contact_details' => 'required',
            // Medical
            'employee_blood_type' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'required' => 'This field is required.',
            'employee_personal_email.email' => 'Please enter a valid email address.',
            'employee_birthdate.date' => 'Please enter a valid birthdate.',
            'employee_father_birthdate.date' => 'Please enter a valid birthdate.',
            'employee_mother_birthdate.date' => 'Please enter a valid birthdate.'
        ];
    }

    public function validateStep($step)
    {
        for ($i = 1; $i <= $step; $i++) {
            match ($i) {
                1 => $this->validate([
                    'employee_lastname' => 'required',
                    'employee_firstname' => 'required',
                    'employee_middlename' => 'required',
                    'employee_mother_maiden_name' => 'required',
                    'employee_gender' => 'required',
                    'employee_birthdate' => 'required|date',
                    'employee_birthplace' => 'required',
                    'employee_religion' => 'required',
                    'employee_civil_status' => 'required',
                    'employee_blood_type' => 'required',
                    'present_house_no' => 'required',
                    'present_street' => 'required',
                    'present_brgy' => 'required',
                    'present_city' => 'required',
                    'present_province' => 'required',
                    'present_zip_code' => 'required',
                    'permanent_house_no' => 'required',
                    'permanent_street' => 'required',
                    'permanent_brgy' => 'required',
                    'permanent_city' => 'required',
                    'permanent_province' => 'required',
                    'permanent_zip_code' => 'required',
                ]),
                2 => $this->validate([
                    'employee_personal_email' => 'required|email',
                    'employee_contact_no1' => 'required',
                    'employee_viber_number' => 'required'
                ]),
                3 => $this->validate([
                    'employee_educational_attainment' => 'required',
                    'employee_school_attended' => 'required',
                    'employee_college_course' => 'required'
                ]),
                4 => $this->validate([
                    'employee_job_position' => 'required',
                    'department_id' => 'required',
                    'employee_employment_type' => 'required',
                    'employee_section' => 'required'
                ]),
                5 => $this->validate([
                    'employee_tin_number' => 'required',
                    'employee_pagibig_number' => 'required',
                    'employee_philhealth_number' => 'required',
                    'employee_sss_number' => 'required'
                ]),
                6 => $this->validate([
                    'employee_father_name' => 'required',
                    'employee_father_birthdate' => 'required|date',
                    'employee_father_birth_certificate' => 'required',
                    'employee_mother_name' => 'required',
                    'employee_mother_birthdate' => 'required|date',
                    'employee_mother_birth_certificate' => 'required'
                ]),
                7 => $this->validate([]), // Add validation here if needed
                default => null,
            };
        }

        return true;
    }

    public function render()
    {
        return view('livewire.employee.alphalist.add-employee');
    }
}
