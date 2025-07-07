<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Department;
use App\Models\Employee;
use Carbon\Carbon;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditEmployee extends Component
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
    public $employee_college_vocational_status;

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
    public $employee_id;

    // Emergency Contacts
    public $emergency_contact_details = [
        ['name' => '', 'relationship' => '', 'number' => '', 'address' => '']
    ];
    public $departments;
    public function mount(Employee $employee)
    {
        $this->employee_id = $employee->employee_id;
        // Basic Info
        $this->employee_profile_picture         = $employee['employee_profile_picture'] ?? null;
        $this->employee_lastname                = $employee['employee_lastname'] ?? null;
        $this->employee_firstname               = $employee['employee_firstname'] ?? null;
        $this->employee_middlename              = $employee['employee_middlename'] ?? null;
        $this->employee_suffix                  = $employee['employee_suffix'] ?? null;
        $this->employee_mother_maiden_name      = $employee['employee_mother_maiden_name'] ?? null;
        $this->employee_gender                  = $employee['employee_gender'] ?? null;
        $this->employee_birthdate = isset($employee['employee_birthdate'])
            ? Carbon::parse($employee['employee_birthdate'])->toDateString() // outputs '2024-02-02'
            : null;        
        $this->employee_birthplace              = $employee['employee_birthplace'] ?? null;
        $this->employee_religion                = $employee['employee_religion'] ?? null;

        // Address Info
        $this->present_house_no                 = $employee['employee_present_house_no'] ?? null;
        $this->present_street                   = $employee['employee_present_street'] ?? null;
        $this->present_brgy                     = $employee['employee_present_brgy'] ?? null;
        $this->present_city                     = $employee['employee_present_city'] ?? null;
        $this->present_province                 = $employee['employee_present_province'] ?? null;
        $this->present_zip_code                 = $employee['employee_present_zip_code'] ?? null;

        $this->permanent_house_no               = $employee['employee_permanent_house_no'] ?? null;
        $this->permanent_street                 = $employee['employee_permanent_street'] ?? null;
        $this->permanent_brgy                   = $employee['employee_permanent_brgy'] ?? null;
        $this->permanent_city                   = $employee['employee_permanent_city'] ?? null;
        $this->permanent_province               = $employee['employee_permanent_province'] ?? null;
        $this->permanent_zip_code               = $employee['employee_permanent_zip_code'] ?? null;

        // Contact Info
        $this->employee_personal_email          = $employee['employee_personal_email'] ?? null;
        $this->employee_contact_no1             = $employee['employee_contact_no1'] ?? null;
        $this->employee_contact_no2             = $employee['employee_contact_no2'] ?? null;
        $this->employee_company_email           = $employee['employee_company_email'] ?? null;
        $this->employee_company_number          = $employee['employee_company_number'] ?? null;
        $this->employee_viber_number            = $employee['employee_viber_number'] ?? null;

        // Educational Info
        $this->employee_educational_attainment  = $employee['employee_educational_attainment'] ?? null;
        $this->employee_school_attended         = $employee['employee_school_attended'] ?? null;
        $this->employee_college_vocational_status = $employee['employee_college_vocational_status'] ?? null;

        // Employment Info
        $this->employee_job_position            = $employee['employee_job_position'] ?? null;
        $this->department_id                    = $employee['department_id'] ?? null;
        $this->employee_employment_type         = $employee['employee_employment_type'] ?? null;
        $this->employee_section                 = $employee['employee_section'] ?? null; // not in employee, but included

        // Civil Status
        $this->employee_civil_status            = $employee['employee_civil_status'] ?? null;
        $this->marriage_certificate_path        = $employee['employee_marriage_certificate_path'] ?? null;

        // Government Status
        $this->sss_updated                      = $employee['employee_sss_updated'] ?? null;
        $this->philhealth_updated               = $employee['employee_philhealth_updated'] ?? null;
        $this->pagibig_updated                  = $employee['employee_pagibig_updated'] ?? null;
        $this->pagibig_mdf_path                 = $employee['employee_pagibig_mdf_path'] ?? null;

        // Government IDs
        $this->employee_sss_number              = $employee['employee_sss_number'] ?? null;
        $this->employee_philhealth_number       = $employee['employee_philhealth_number'] ?? null;
        $this->employee_pagibig_number          = $employee['employee_pagibig_number'] ?? null;
        $this->employee_tin_number              = $employee['employee_tin_number'] ?? null;

        // Family Info
        $this->employee_children_count          = $employee['employee_children_count'] ?? null;
        $this->employee_father_name             = $employee['employee_father_name'] ?? null;
        $this->employee_father_birthdate        = $employee['employee_father_birthdate'] ?? null;
        $this->employee_father_birth_certificate = $employee['employee_father_birth_certificate'] ?? null;
        $this->employee_mother_name             = $employee['employee_mother_name'] ?? null;
        $this->employee_mother_birthdate        = $employee['employee_mother_birthdate'] ?? null;
        $this->employee_mother_birth_certificate = $employee['employee_mother_birth_certificate'] ?? null;

        // Medical Info
        $this->employee_blood_type              = $employee['employee_blood_type'] ?? null;

        $this->employee_children_details = $employee->employeeChildren->map(function ($child) {
            return [
                'name' => $child->employee_child_name,
                'birthdate' => $child->employee_child_birthdate,
                'birth_certificate'=> $child->employee_child_birth_certificate, 
            ];
        })->toArray();

        $this->emergency_contact_details = $employee->employeeEmergencyContacts->map(function ($contact) {
            return [
                'name' => $contact->employee_emergency_contact_name,
                'relationship' => $contact->employee_emergency_contact_relationship,
                'number' => $contact->employee_emergency_contact_number, 
                'address' => $contact->employee_emergency_contact_address
            ];
        })->toArray();

        // dump($employee);
        $this->departments = Department::all();
    }

    public function save()
    {
        // dump($this);
        DB::beginTransaction();

        try {
            $employee = Employee::findOrFail($this->employee_id);

            // FILE UPLOADS
            $employee_profile_path = $employee->employee_profile_picture;
            $marriage_certificate_path = $employee->employee_marriage_certificate_path;
            $father_birth_cert_path = $employee->employee_father_birth_certificate;
            $mother_birth_cert_path = $employee->employee_mother_birth_certificate;
            $pagibig_mdf_path = $employee->employee_pagibig_mdf_path;

            if (isset($this->employee_profile_picture)) {
                $originalName = $this->employee_profile_picture->getClientOriginalName();
                $filename = time() . '_' . $originalName;
                $employee_profile_path = $this->employee_profile_picture->storeAs('employee-profile', $filename, 'public');
            }

            if (isset($this->marriage_certificate_path)) {
                $originalName = $this->marriage_certificate_path->getClientOriginalName();
                $filename = time() . '_' . $originalName;
                $marriage_certificate_path = $this->marriage_certificate_path->storeAs('employee-profile', $filename, 'public');
            }

            if (isset($this->employee_father_birth_certificate)) {
                $originalName = $this->employee_father_birth_certificate->getClientOriginalName();
                $filename = time() . '_' . $originalName;
                $father_birth_cert_path = $this->employee_father_birth_certificate->storeAs('employee-profile', $filename, 'public');
            }

            if (isset($this->employee_mother_birth_certificate)) {
                $originalName = $this->employee_mother_birth_certificate->getClientOriginalName();
                $filename = time() . '_' . $originalName;
                $mother_birth_cert_path = $this->employee_mother_birth_certificate->storeAs('employee-profile', $filename, 'public');
            }

            if (isset($this->pagibig_mdf_path)) {
                $originalName = $this->pagibig_mdf_path->getClientOriginalName();
                $filename = time() . '_' . $originalName;
                $pagibig_mdf_path = $this->pagibig_mdf_path->storeAs('employee-profile', $filename, 'public');
            }

            // UPDATE EMPLOYEE
            $employee->update([
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
                'employee_college_vocational_status' => $this->employee_college_vocational_status,

                // Employment
                'employee_job_position'        => $this->employee_job_position,
                'department_id'                => $this->department_id,
                'employee_employment_type'     => $this->employee_employment_type,
                'employee_section'             => $this->employee_section,

                // Civil Status
                'employee_civil_status'        => $this->employee_civil_status,
                'employee_marriage_certificate_path' => $marriage_certificate_path,

                // Government Update
                'employee_sss_updated'         => $this->sss_updated,
                'employee_philhealth_updated'  => $this->philhealth_updated,
                'employee_pagibig_updated'     => $this->pagibig_updated,
                'employee_pagibig_mdf_path'    => $pagibig_mdf_path,

                // Government IDs
                'employee_sss_number'          => $this->employee_sss_number,
                'employee_philhealth_number'   => $this->employee_philhealth_number,
                'employee_pagibig_number'      => $this->employee_pagibig_number,
                'employee_tin_number'          => $this->employee_tin_number,

                // Family
                'employee_children_count'      => $this->employee_children_count,
                'employee_father_name'         => $this->employee_father_name,
                'employee_father_birthdate'    => $this->employee_father_birthdate,
                'employee_father_birth_certificate' => $father_birth_cert_path,
                'employee_mother_name'         => $this->employee_mother_name,
                'employee_mother_birthdate'    => $this->employee_mother_birthdate,
                'employee_mother_birth_certificate' => $mother_birth_cert_path,

                // Medical
                'employee_blood_type'          => $this->employee_blood_type,
            ]);

            // UPDATE CHILDREN
            $employee->employeeChildren()->delete(); // Or update logic if needed
            foreach ($this->employee_children_details as $child) {
                $certificatePath = null;

                if (isset($child['birth_certificate'])) {
                    $originalName = $child['birth_certificate']->getClientOriginalName();
                    $uniqueName = time() . '_' . $originalName;
                    $child['birth_certificate']->storeAs('birth-certificates/children', $uniqueName, 'public');
                    $certificatePath = 'birth-certificates/children/' . $uniqueName;
                }

                $employee->employeeChildren()->create([
                    'employee_child_name' => $child['name'],
                    'employee_child_birthdate' => $child['birthdate'],
                    'employee_child_birth_certificate' => $certificatePath,
                ]);
            }

            // UPDATE EMERGENCY CONTACTS
            $employee->employeeEmergencyContacts()->delete(); // Or update logic if needed
            foreach ($this->emergency_contact_details as $contact) {
                $employee->employeeEmergencyContacts()->create([
                    'employee_emergency_contact_name' => $contact['name'],
                    'employee_emergency_contact_relationship' => $contact['relationship'],
                    'employee_emergency_contact_number' => $contact['number'],
                    'employee_emergency_contact_address' => $contact['address'],
                ]);
            }

            DB::commit();

            $this->dispatch('swal:result', [
                'title' => 'Updated',
                'text' => 'Employee information updated successfully!',
                'icon' => 'success',
            ]);
            dump('inside');
        } catch (\Exception $e) {
            DB::rollBack();
            dump($e->getMessage());
            session()->flash('toast', 'Update failed: ' . $e->getMessage());
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

    public function render()
    {
        return view('livewire.employee.alphalist.edit-employee');
    }
}
