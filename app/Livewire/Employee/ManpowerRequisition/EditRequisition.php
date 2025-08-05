<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Candidate;
use App\Models\Department;
use App\Models\Requisition;
use App\Models\RequisitionDuty;
use App\Models\RequisitionEducationLevel;
use App\Models\RequisitionOther;
use App\Models\RequisitionSpecialSkill;
use App\Models\RequisitionWorkExperience;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditRequisition extends Component
{
    use WithFileUploads;
    public $requisition_job_position;
    public $requisition_type;
    public $requisition_department;
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
    public $role;
    public $user_role;
    public $allowedRoles;
    public $isDisabled;
    public $requisition_status;

    public function mount(Requisition $requisition)
    {
        $this->role = auth()->user()->roles;
        $this->user_role = $this->role[0]->role_name;

        // Change this so it will fetch the permitted roles from db
        $this->allowedRoles = ['CEO', 'CFO', 'COO', 'HR Manager'];

        $this->isDisabled = !in_array($this->user_role, $this->allowedRoles);

        $this->requisition_status = $requisition->requisition_status;

        // Job Information fields
        $this->departments = Department::all();
        $this->requisition_id = $requisition->requisition_id;
        $this->requisition_department = $requisition->department->department_id;
        $this->requisition_section =  $requisition->requisition_section;
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

        $this->requisition_work_experience = $requisition->requisition_work_experience;
        $this->requisition_special_skill = $requisition->requisition_special_skill;
        $this->requisition_other_description = $requisition->requisition_other;
        $this->requisition_job_description = $requisition->requisition_job_description;    
        $this->requisition_education_level = $requisition->requisition_education_level;

        $this->requisition_requestor_name = $requisition->requisition_requestor_name;
        $this->requisition_requestor_position = $requisition->requisition_requestor_position;

        $this->requisition_endorser_name = $requisition->requisition_endorser_name;
        $this->requisition_endorser_position = $requisition->requisition_endorser_position;

        $this->requisition_approver_name = $requisition->requisition_approver_name;
        $this->requisition_approver_position = $requisition->requisition_approver_position;

        $this->requisition_approver_1_name = $requisition->requisition_approver_1_name;
        $this->requisition_approver_position_1 = $requisition->requisition_approver_position_1;

        $this->requisition_applicants_sources = $requisition->requisition_applicants_sources;
        
        $this->requisition_candidates = $requisition->candidates->map(function ($candidate) {
            return [
                'id' => $candidate->candidate_id,
                'value' => $candidate->candidate_id,
            ];
        })->values()->toArray();
    
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
        ];
    }

    public function confirmSave()
    {
        try {
            $this->validate();
            $this->dispatch('swal:confirm', [
                'title' => 'Confirm Request',
                'text' => 'Are you sure you want to update this requisition?',
                'icon' => 'question',
                'confirmButtonText' => 'Confirm'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->setErrorBag($e->validator->getMessageBag());
            // dd($e->errors());
            // dump('error');
        }
    }

    public function save()
    {
        $uniqueConditions = [
            'requisition_id' => $this->requisition_id
        ];

        $updateData = [
            'requisition_status' => $this->requisition_status,
            'requisition_section' => $this->requisition_section,
            'requisition_initial_job_position' => $this->requisition_initial_job_position,
            'requisition_justification' => $this->requisition_justification,
            'requisition_eventual_job_position' => $this->requisition_eventual_job_position,
            'requisition_number_required' => $this->requisition_number_required,
            'requisition_contract_duration' => $this->requisition_contract_duration,
            'requisition_type' => $this->requisition_type,
            'requisition_employment_type' => $this->requisition_employment_type,
            'requisition_budget' => $this->requisition_budget,
            'requisition_engagement_type' => $this->requisition_engagement_type,
            'requisition_date_required' => $this->requisition_date_required,
            'requisition_applicants_sources' => $this->requisition_applicants_sources,
            'requisition_requestor_name' => $this->requisition_requestor_name,
            'requisition_requestor_position' => $this->requisition_requestor_position,
            'requisition_endorser_name' => $this->requisition_endorser_name,
            'requisition_endorser_position' => $this->requisition_endorser_position,
            'requisition_job_description' => $this->requisition_job_description,
            'requisition_education_level' => $this->requisition_education_level,
            'requisition_work_experience' => $this->requisition_work_experience,
            'requisition_special_skill' => $this->requisition_special_skill,
            'requisition_other' => $this->requisition_other_description,
            'department_id' => $this->requisition_department,
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
                'text' => 'Requisition updated successfully',
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
    
    public function render()
    {
        return view('livewire.employee.manpower-requisition.edit-requisition');
    }
}
