<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Requisition;
use Livewire\Component;

class AddRequisitionReq extends Component
{
    public $requisition_job_position;
    public $requisition_job_description;
    public $requisition_type;
    public $requisition_department;
    public $requisition_requestor_name;
    public $requisition_salary_min;
    public $requisition_salary_max;
    public $pendingRequisitions;
    public $requisition_section;
    public $requisition_initial_job_position;
    public $requisition_justification;
    public $requisition_eventual_job_position;
    public $requisition_number_required;
    public $requisition_contract_duration;
    public $requisition_signature;
    public $requisition_employment_type;
    public $requisition_budget;
    public $requisition_engagement_type;
    public $requisition_work_experience;
    public $requisition_special_skills;
    public $requisition_other_description;
    public $requisition_applicants_sources;
    public $requisition_requestor_position;
    public $requisition_requestor_signature;
    public $requisition_endorser_name;
    public $requisition_endorser_position;
    public $requisition_endorser_signature;
    public $requisition_approver_name;
    public $requisition_approver_position;
    public $requisition_approver_signature;
    public $requisition_approver_name_1;
    public $requisition_approver_position_1;
    public $requisition_approver_signature_1;
    public $candidates;
    public array $requisition_candidates = [
        ['id' => '', 'value' => '']
    ];
    public array $requisition_job_descriptions = [];
    public $departments;
    public array $requisition_education = [];

    public function updating($name, $value)
    {
        if ($name === 'requisition_candidates' ) {
            // dump($this->requisition_candidates);
        } 
        else if ($name === 'requisition_job_descriptions')
        {
            // dump($value);
        }
        else if ($name === 'requisition_education')
        {
            // dump($value);
        }
        else if($name === 'requisition_work_experience')
        {
            // dump($value);
        }
    }

    public function mount()
    {
        $this->departments = Department::all();
        $this->requisition_department = $this->departments[0]->department_name;
        $this->requisition_section = 'Development Team';
        $this->requisition_department = 'IST';

        // Change this to candidates table
        $this->candidates = Employee::all()
            ->map(function ($employee) {
                $fullName = $employee->employee_firstname;

                if (!empty($employee->employee_middlename)) {
                    $fullName .= ' ' . $employee->employee_middlename;
                }

                $fullName .= ' ' . $employee->employee_lastname;

                return trim($fullName);
            })
            ->values()
            ->all();

        // $this->requisition_type = 'New Position';
    }

    protected function rules()
    {
        return [
            'requisition_job_position' => 'required|string',
            'requisition_job_description' => 'required|string',
            'requisition_type' => 'required',
            'requisition_department' => 'required',
            'requisition_requestor_name' => 'required|string',
            'requisition_salary_min' => ['required', 'integer', 'min:1'],
            'requisition_salary_max' => ['required', 'integer', 'min:1', function ($attribute, $value, $fail) {
                if ($this->requisition_salary_min && $value < $this->requisition_salary_min) {
                    $fail('Maximum salary must be greater than the minimum salary.');
                }
            }],
        ];
    }

    protected function messages()
    {
        return [
            'requisition_job_position.required' => 'Job position is required.',
            'requisition_job_description.required' => 'Job description is required.',
            'requisition_type.required' => 'Requisition type is required.',
            'requisition_department.required' => 'Department is required.',
            'requisition_requestor_name.required' => 'Requestor name is required.',
            'requisition_salary_min.required' => 'Minimum salary is required.',
            'requisition_salary_max.required' => 'Maximum salary is required.',
            'requisition_salary_min.min' => 'Number must be greater than zero.',
            'requisition_salary_max.min' => 'Number must be greater than zero.',
        ];
    }

    public function add()
    {
        // $this->validate();
        $this->requisition_eventual_job_position = $this->requisition_initial_job_position;
        $formattedCandidates = collect($this->requisition_candidates)
            ->pluck('value')
            ->filter()
            ->implode(', ');

        $query = Requisition::create([
            'requisition_job_description' => $this->requisition_job_description,
            'requisition_type' => $this->requisition_type,
            'requisition_candidates' => $formattedCandidates, 
            'requisition_department' => $this->requisition_department,
            'requisition_requestor_name' => $this->requisition_requestor_name,
            'requisition_salary_min' => $this->requisition_salary_min,
            'requisition_salary_max' => $this->requisition_salary_max,
            'requisition_status' => 1,
            'requisition_section' => $this->requisition_section,
            'requisition_initial_job_position' => $this->requisition_initial_job_position,
            'requisition_justification' => $this->requisition_justification,
            'requisition_eventual_job_position' => $this->requisition_eventual_job_position,
            'requisition_number_required' => $this->requisition_number_required,
            'requisition_contract_duration' => $this->requisition_contract_duration,
            'requisition_signature' => 'signature',
            'requisition_employment_type' => $this->requisition_employment_type,
            'requisition_budget' => $this->requisition_budget,
            'requisition_engagement_type' => $this->requisition_engagement_type,
            'requisition_education' => $this->requisition_education,
            'requisition_work_experience' => $this->requisition_work_experience,
            'requisition_special_skills' => $this->requisition_special_skills,
            'requisition_other_description' => $this->requisition_other_description,
            'requisition_applicants_sources' => $this->requisition_applicants_sources,
            'requisition_requestor_position' => $this->requisition_requestor_position,
            'requisition_requestor_signature' => 'signature',
            'requisition_endorser_name' => $this->requisition_endorser_name,
            'requisition_endorser_position' => $this->requisition_endorser_position,
            'requisition_endorser_signature' => 'signature',
            'requisition_approver_name' => $this->requisition_approver_name,
            'requisition_approver_position' => $this->requisition_approver_position,
            'requisition_approver_signature' => 'signature',
            'requisition_approver_name_1' => $this->requisition_approver_name_1,
            'requisition_approver_position_1' => $this->requisition_approver_position_1,
            'requisition_approver_signature_1' => 'signature',
        ]);

        if ($query) {
            $this->dispatch('refreshTable', 'pending');
            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Requisition Submitted Successfully!',
            ]);
            $this->dispatch('close-modal');
        } else {
            $this->dispatch('show-toast', [
                'title' => 'Error',
                'content' => 'An Error Occured!',
            ]);
        }
    }

    
    public function render()
    {
        return view('livewire.employee.manpower-requisition.add-requisition-req');
    }
}
