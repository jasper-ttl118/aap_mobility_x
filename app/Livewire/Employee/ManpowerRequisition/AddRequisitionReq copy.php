<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Candidate;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Requisition;
use App\Models\RequisitionDuty;
use App\Models\RequisitionEducationLevel;
use App\Models\RequisitionOther;
use App\Models\RequisitionSpecialSkill;
use App\Models\RequisitionWorkExperience;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddRequisitionReq extends Component
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
    public $requisition_signature;
    public $requisition_employment_type;
    public $requisition_budget;
    public $requisition_engagement_type;
    public $requisition_work_experience;
    public $requisition_special_skills;
    public $requisition_other_description;
    public $requisition_applicants_sources;
    public $requisition_requestor_name;
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
    public $requisition_date_required = '';
    public $candidates;
    public array $requisition_candidates = [
        ['id' => '', 'value' => '']
    ];
    public $requisition_job_descriptions;
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
        $this->requisition_department = 'IST';
        $this->requisition_job_descriptions = '';

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
        // dd($this->requisition_date_required);
        $originalName = $this->requisition_requestor_signature->getClientOriginalName();

        $path = $this->requisition_requestor_signature->storeAs(
            'requestor_signatures',           // Folder
            $originalName,                    // Filename to save as
            'public'                          // Disk
        );

        $this->requisition_eventual_job_position = $this->requisition_initial_job_position;

        $requisition = Requisition::create([
            'requisition_type' => $this->requisition_type,
            'requisition_department' => $this->requisition_department,
            'requisition_status' => 1,
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
            'requisition_requestor_name' => $this->requisition_requestor_name,
            'requisition_requestor_position' => $this->requisition_requestor_position,
            'requisition_requestor_signature' => $path,
            'requisition_date_required' => $this->requisition_date_required
        ]);

        $relatedData = [
            'requisition_job_descriptions' => [RequisitionDuty::class, 'requisition_duty_description'],
            'requisition_education' => [RequisitionEducationLevel::class, 'requisition_education_level_description'],
            'requisition_other_description' => [RequisitionOther::class, 'requisition_other_description'],
            'requisition_special_skills' => [RequisitionSpecialSkill::class, 'requisition_special_skill_description'],
            'requisition_work_experience' => [RequisitionWorkExperience::class, 'requisition_work_experience_description'],
        ];
        
        foreach ($relatedData as $property => [$model, $column]) {
            foreach ($this->$property as $item) {
                $model::create([
                    'requisition_id' => $requisition->requisition_id,
                    $column => $item['value'],
                ]);
            }
        }

        $candidateIds = collect($this->requisition_candidates)
            ->pluck('value')
            ->filter()
            ->all();

        $requisition->candidates()->attach($candidateIds);

        if ($requisition) {
            $this->dispatch('swal:confirm', [
                'title' => 'Confirm Request',
                'text' => 'Are you sure you want to create this requisition?',
                'icon' => 'question',
                'confirmButtonText' => 'Confirm'
            ]);
        } else {
            $this->dispatch('show-toast', [
                'title' => 'Error',
                'content' => 'An error occurred!',
            ]);
        }
    }


    
    public function render()
    {
        return view('livewire.employee.manpower-requisition.add-requisition-req');
    }
}
