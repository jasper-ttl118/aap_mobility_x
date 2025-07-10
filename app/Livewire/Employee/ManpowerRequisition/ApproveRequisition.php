<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Candidate;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Requisition;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApproveRequisition extends Component
{
    use WithFileUploads;
    public $requisition_job_position;
    public $requisition_type;
    public $requisition_section;
    public $requisition_initial_job_position;
    public $requisition_justification;
    public $requisition_eventual_job_position;
    public $requisition_number_required;
    public $requisition_contract_duration;
    public $requisition_employment_type;
    public $requisition_budget;
    public $requisition_engagement_type;
    public $requisition_work_experience;
    public $requisition_special_skill;
    public $requisition_other_description;
    public $requisition_applicants_sources;
    public $requisition_requestor_name;
    public $requisition_requestor_position;
    public $requisition_endorser_name;
    public $requisition_endorser_position;
    public $requisition_approver_name;
    public $requisition_approver_position;
    public $requisition_approver_name_1;
    public $requisition_approver_position_1;
    public $requisition_date_required = '';
    public $candidates;
    public array $requisition_candidates = [
        
    ];
    public $requisition_job_description;
    public $requisition_education_level;
    public $departments;
    public $requisition_id;
    public $requisition_status;
    public $department_id;

    public function mount(Requisition $requisition)
    {
        // Job Information fields
        // dump($requisition->requisition_status);   
        $user = auth()->user();
        $employee_id = $user->employee_id;
        $employee = Employee::find($employee_id);
        $this->requisition_status = $requisition->requisition_status;

        $fullName = function ($employee) {
            return trim(
                $employee->employee_firstname 
                . ' ' 
                . ($employee->employee_middlename ? $employee->employee_middlename . ' ' : '') 
                . $employee->employee_lastname
            );
        };

        switch ($this->requisition_status) {
            case 1:
                $this->requisition_requestor_name = $fullName($employee);
                $this->requisition_requestor_position = $employee->employee_job_position;
                break;

            case 2:
                $this->requisition_requestor_name = $requisition->requisition_requestor_name;
                $this->requisition_requestor_position = $requisition->requisition_requestor_position;

                $this->requisition_endorser_name = $fullName($employee);
                $this->requisition_endorser_position = $employee->employee_job_position;
                break;

            case 3:
                $this->requisition_requestor_name = $requisition->requisition_requestor_name;
                $this->requisition_requestor_position = $requisition->requisition_requestor_position;

                $this->requisition_endorser_name = $requisition->requisition_endorser_name;
                $this->requisition_endorser_position = $requisition->requisition_endorser_position;

                $this->requisition_approver_name = $fullName($employee);
                $this->requisition_approver_position = $employee->employee_job_position;
                break;

            case 4:
                $this->requisition_requestor_name = $requisition->requisition_requestor_name;
                $this->requisition_requestor_position = $requisition->requisition_requestor_position;

                $this->requisition_endorser_name = $requisition->requisition_endorser_name;
                $this->requisition_endorser_position = $requisition->requisition_endorser_position;

                $this->requisition_approver_name = $requisition->requisition_approver_name;
                $this->requisition_approver_position = $requisition->requisition_approver_position;

                $this->requisition_approver_name_1 = $fullName($employee);
                $this->requisition_approver_position_1 = $employee->employee_job_position;
                break;
        }

        $this->department_id = $requisition->department->department_id ;
        $this->departments = Department::all();
        $this->requisition_id = $requisition->requisition_id;
        $this->requisition_section = $requisition->requisition_section;
        $this->requisition_initial_job_position = $requisition->requisition_initial_job_position;
        $this->requisition_eventual_job_position = $requisition->requisition_eventual_job_position;
        $this->requisition_type = $requisition->requisition_type;
        $this->requisition_budget = $requisition->requisition_budget;
        $this->requisition_number_required = $requisition->requisition_number_required;
        $this->requisition_date_required = $requisition->requisition_date_required;
        $this->requisition_employment_type = $requisition->requisition_employment_type;
        $this->requisition_engagement_type = $requisition->requisition_engagement_type;
        $this->requisition_contract_duration = $requisition->requisition_contract_duration;
        $this->requisition_justification = $requisition->requisition_justification;
        
        // Hiring Specification fields
        $this->requisition_job_description = $requisition->requisition_job_description;
        
        $this->requisition_education_level = $requisition->requisition_education_level;
        
        $this->requisition_work_experience = $requisition->requisition_work_experience;

        $this->requisition_special_skill = $requisition->requisition_special_skill;

        $this->requisition_other_description = $requisition->requisition_other;

        $this->requisition_applicants_sources = $requisition->requisition_applicants_sources;
        
        $this->requisition_candidates = $requisition->candidates->map(function ($candidate) {
            return [
                'id' => $candidate->candidate_id,
                'value' => $candidate->candidate_id,
            ];
        })->values()->toArray();
    
        $this->getAllCandidates();
    }

    public function getAllCandidates()
    {
        $this->candidates = Candidate::all()
            ->map(function ($candidate) {
                $fullName = $candidate->candidate_firstname;

                if (!empty($candidate->candidate_middlename)) {
                    $fullName .= ' ' . $candidate->candidate_middlename;
                }

                $fullName .= ' ' . $candidate->candidate_lastname;

                return [
                    'id' => $candidate->candidate_id,   
                    'name' => trim($fullName),
                ];
            })
            ->values()
            ->all();
    }

    public function confirmApprove()
    {
        try {
            $this->validate();
            $this->change_color = false;
            $this->dispatch('swal:confirm', [
                'title' => 'Confirm Request',
                'text' => 'Are you sure you want to approve this requisition?',
                'icon' => 'question',
                'confirmButtonText' => 'Confirm'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->setErrorBag($e->validator->getMessageBag());
            // dd($e->errors());
            $this->change_color = true;
            // dump('error');
        }
    }

    public function approve()
    {
        $uniqueConditions = [
            'requisition_id' => $this->requisition_id
        ];

        $new_status = $this->requisition_status + 1;

        $updateData = [
            'requisition_status' => $new_status,
            'requisition_type' => $this->requisition_type,
            'requisition_job_description' => $this->requisition_job_description,
            'requisition_education_level' => $this->requisition_education_level,
            'requisition_work_experience' => $this->requisition_work_experience,
            'requisition_special_skill' => $this->requisition_special_skill,
            'requisition_other' => $this->requisition_other_description,
            'department_id' => $this->department_id,
            'requisition_section' => $this->requisition_section,
            'requisition_initial_job_position' => $this->requisition_initial_job_position,
            'requisition_justification' => $this->requisition_justification,
            'requisition_eventual_job_position' => $this->requisition_eventual_job_position,
            'requisition_number_required' => $this->requisition_number_required,
            'requisition_contract_duration' => $this->requisition_contract_duration,
            'requisition_employment_type' => $this->requisition_employment_type,
            'requisition_budget' => $this->requisition_budget,
            'requisition_engagement_type' => $this->requisition_engagement_type,
            'requisition_applicants_sources' => $this->requisition_applicants_sources,
            'requisition_date_required' => $this->requisition_date_required,
            'requisition_requestor_name' => $this->requisition_requestor_name,
            'requisition_requestor_position' => $this->requisition_requestor_position,
            'requisition_endorser_name' => $this->requisition_endorser_name,
            'requisition_endorser_position' => $this->requisition_endorser_position,
            'requisition_approver_name' => $this->requisition_approver_name,
            'requisition_approver_position' => $this->requisition_approver_position,
            'requisition_approver_name_1' => $this->requisition_approver_name_1,
            'requisition_approver_position_1' => $this->requisition_approver_position_1
        ];

        DB::table('requisitions')->updateOrInsert($uniqueConditions, $updateData);

        $requisition = Requisition::where($uniqueConditions)->latest('requisition_id')->first();

        $candidateIds = collect($this->requisition_candidates)
            ->pluck('value')
            ->filter()
            ->all();

        $requisition->candidates()->sync($candidateIds);

         if ($requisition) {
            $this->dispatch('swal:result', [
                'title' => 'Success',
                'text' => 'Requisition approved successfully',
                'icon' => 'success',
            ]);
        } else {
            $this->dispatch('swal:result', [
                'title' => 'Error',
                'text' => 'Error',
                'icon' => 'Warning',
            ]);
        }
    }

    protected function rules()
    {
        return [
            'requisition_type' => 'required|string',
            'requisition_job_description' => 'required|string',
            'requisition_education_level' => 'required|string',
            'requisition_work_experience' => 'required|string',
            'requisition_eventual_job_position' => 'required|string',
            'requisition_special_skill' => 'required|string',
            'requisition_other_description' => 'nullable|string',
            'department_id' => 'required|exists:departments,department_id',
            'requisition_section' => 'required|string',
            'requisition_initial_job_position' => 'required|string',
            'requisition_justification' => 'required|string',
            'requisition_number_required' => 'required|integer|min:1',
            'requisition_contract_duration' => 'nullable|string',
            'requisition_employment_type' => 'required|string',
            'requisition_budget' => 'required|min:1',
            'requisition_engagement_type' => 'required|string',
            'requisition_applicants_sources' => 'nullable|string',
            'requisition_date_required' => 'required|date|after_or_equal:today',
            'requisition_candidates' => 'nullable|array',
            'requisition_requestor_name' => 'required|string',
            'requisition_requestor_position' => 'required|string'
        ];
    }
    protected function messages()
    {
        return [
            'requisition_type.required' => 'The requisition type is required.',
            'requisition_job_description.required' => 'Please provide a job description.',
            'requisition_education_level.required' => 'Education level is required.',
            'requisition_work_experience.required' => 'Work experience is required.',
            'department_id.required' => 'Please select a department.',
            'department_id.exists' => 'The selected department is invalid.',
            'requisition_section.required' => 'Section field is required.',
            'requisition_initial_job_position.required' => 'Initial job position is required.',
            'requisition_eventual_job_position.required' => 'Eventual job position is required.',
            'requisition_justification.required' => 'Please provide a justification.',
            'requisition_number_required.required' => 'Specify the number of job slot.',
            'requisition_number_required.integer' => 'The number of job slot must be a number.',
            'requisition_number_required.min' => 'At least one person must be required.',
            'requisition_budget.min' => 'The budget must be at least 0.',
            'requisition_budget.required' => 'Budget is required.',
            'requisition_employment_type.required' => 'Employment type is required.',
            'requisition_date_required.required' => 'Date required is required.',
            'requisition_date_required.date' => 'Please provide a valid date.',
            'requisition_date_required.after_or_equal' => 'The date must be today or in the future.',
            'requisition_engagement_type.required' => 'Engagement type is required.',
            'requisition_special_skill' => 'Special skill is required.',
            'requisition_requestor_name' => 'Requestor Name is required.',
            'requisition_requestor_position' => 'Requestor Position is required.'
        ];
    }

    public function validateStep($step)
    {
        if ($step == 0) {
            // dump('step zero');
            $this->validate([
                'department_id' => 'required',
                'requisition_section' => 'required|string|max:255',
                'requisition_initial_job_position' => 'required|string|max:255',
                'requisition_eventual_job_position' => 'required|string|max:255',
                'requisition_type' => 'required|in:New Position,Replacement',
                'requisition_employment_type' => 'required|in:Regular,Probationary,Contractual',
                'requisition_budget' => 'required|in:On Budget,Not On Budget',
                'requisition_engagement_type' => 'required|in:Direct Hire,Thru Agency',
                'requisition_number_required' => 'required|integer|min:1',
                'requisition_date_required' => 'required|date',
                'requisition_justification' => 'required|string',
                'requisition_job_description' => 'required|string',
            ]);
        }

        if ($step == 1) {
            $this->validate([
                'requisition_job_description' => 'required|string',
                'requisition_education_level' => 'required|string',
                'requisition_work_experience' => 'required|string',
            ]);
        }

        if ($step == 2) {
            $this->validate([
                'requisition_requestor_name' => 'required|string',
                'requisition_requestor_position' => 'required|string'
            ]);
        }

        return true;
    }

    public function render()
    {
        return view('livewire.employee.manpower-requisition.approve-requisition');
    }
}
