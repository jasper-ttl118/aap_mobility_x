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

class ApproveRequisitionRequest extends Component
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
        
    ];
    public array $requisition_job_descriptions = [];
    public array $requisition_education = [];
    public $departments;

    public $requisition_id;

    public function mount(Requisition $requisition)
    {
        // Job Information fields
        $this->departments = Department::all();
        $this->requisition_id = $requisition->requisition_id;
        $this->requisition_department = $requisition->requisition_department;
        $this->requisition_section = 'Development Team';
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
        $this->requisition_requestor_name = $requisition->requisition_requestor_name;
        $this->requisition_requestor_position = $requisition->requisition_requestor_position;
        $this->requisition_requestor_signature = $requisition->requisition_requestor_signature;
        $this->requisition_endorser_name = $requisition->requisition_endorser_name;
        $this->requisition_endorser_position = $requisition->requisition_endorser_position;
        $this->requisition_endorser_signature = $requisition->requisition_endorser_signature;
        $this->requisition_approver_name = $requisition->requisition_approver_name;
        $this->requisition_approver_position = $requisition->requisition_approver_position;
        $this->requisition_approver_signature = $requisition->requisition_approver_signature;
        $this->requisition_approver_name_1 = $requisition->requisition_approver_name_1;
        $this->requisition_approver_position_1 = $requisition->requisition_approver_position_1;
        $this->requisition_approver_signature_1 = $requisition->requisition_approver_signature_1;
        

        // Hiring Specification fields
        $this->requisition_job_descriptions = $requisition->requisitionDuties->map(function ($duty) {
            return [
                'id' => $duty->requisition_duty_id,
                'value' => $duty->requisition_duty_description,
            ];
        })->toArray();

        $this->requisition_education = $requisition->requisitionEducationLevels->map(function ($education) {
            return [
                'id' => $education->requisition_education_level_id,
                'value' => $education->requisition_education_level_description,
            ];
        })->toArray();
        
        $this->requisition_work_experience = $requisition->requisitionWorkExperiences->map(function ($work) {
            return [
                'id' => $work->requisition_work_experience_id,
                'value' => $work->requisition_work_experience_description,
            ];
        })->toArray();

        $this->requisition_special_skills = $requisition->requisitionSpecialSkills->map(function ($skill) {
            return [
                'id' => $skill->requisition_special_skill_id,
                'value' => $skill->requisition_special_skill_description,
            ];
        })->toArray();

        $this->requisition_other_description = $requisition->requisitionOthers->map(function ($other) {
            return [
                'id' => $other->requisition_other_id,
                'value' => $other->requisition_other_description,
            ];
        })->toArray();

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

    public function save()
    {
        //  dd($this);       
        $path = '';
        $path1 = '';
        $originalName = '';
        $originalName1 = '';
        if ($this->requisition_approver_signature instanceof \Illuminate\Http\UploadedFile) {
            $originalName = $this->requisition_approver_signature->getClientOriginalName();
        }

        if ($this->requisition_approver_signature_1 instanceof \Illuminate\Http\UploadedFile) {
            $originalName1 = $this->requisition_approver_signature_1->getClientOriginalName();
        }

       if ($this->requisition_approver_signature instanceof \Illuminate\Http\UploadedFile) {
            $originalName = $this->requisition_approver_signature->getClientOriginalName();
            $path = $this->requisition_approver_signature->storeAs('approver_signatures', $originalName, 'public');
            $this->requisition_approver_signature = $path;
        }

        if ($this->requisition_approver_signature_1 instanceof \Illuminate\Http\UploadedFile) {
            $originalName1 = $this->requisition_approver_signature_1->getClientOriginalName();
            $path1 = $this->requisition_approver_signature_1->storeAs('approver_signatures', $originalName1, 'public');
            $this->requisition_approver_signature_1 = $path1;
        }

        $uniqueConditions = [
            'requisition_id' => $this->requisition_id
        ];

        $updateData = [
            'requisition_status' => 3,
            'requisition_section' => $this->requisition_section,
            'requisition_initial_job_position' => $this->requisition_initial_job_position,
            'requisition_justification' => $this->requisition_justification,
            'requisition_eventual_job_position' => $this->requisition_eventual_job_position,
            'requisition_type' => $this->requisition_type,
            'requisition_number_required' => $this->requisition_number_required,
            'requisition_contract_duration' => $this->requisition_contract_duration,
            'requisition_employment_type' => $this->requisition_employment_type,
            'requisition_budget' => $this->requisition_budget,
            'requisition_engagement_type' => $this->requisition_engagement_type,
            'requisition_date_required' => $this->requisition_date_required,
            'requisition_applicants_sources' => $this->requisition_applicants_sources,
            'requisition_requestor_name' => $this->requisition_requestor_name,
            'requisition_requestor_position' => $this->requisition_requestor_position,
            'requisition_requestor_signature' => $this->requisition_requestor_signature, 
            'requisition_endorser_name' => $this->requisition_endorser_name,
            'requisition_endorser_position' => $this->requisition_endorser_position,
            'requisition_endorser_signature' => $this->requisition_endorser_signature,
            'requisition_approver_name' => $this->requisition_approver_name,
            'requisition_approver_position' => $this->requisition_approver_position,
            'requisition_approver_signature' => $path,
            'requisition_approver_name_1' => $this->requisition_approver_name_1,
            'requisition_approver_position_1' => $this->requisition_approver_position_1,
            'requisition_approver_signature_1' => $path1,
        ];

        DB::table('requisitions')->updateOrInsert($uniqueConditions, $updateData);

        $requisition = Requisition::where($uniqueConditions)->latest('requisition_id')->first();

        $relatedData = [
            'requisition_job_descriptions' => [RequisitionDuty::class, 'requisition_duty_description'],
            'requisition_education' => [RequisitionEducationLevel::class, 'requisition_education_level_description'],
            'requisition_other_description' => [RequisitionOther::class, 'requisition_other_description'],
            'requisition_special_skills' => [RequisitionSpecialSkill::class, 'requisition_special_skill_description'],
            'requisition_work_experience' => [RequisitionWorkExperience::class, 'requisition_work_experience_description'],
        ];

        foreach ($relatedData as $property => [$model, $column]) {
            $submittedValues = collect($this->$property)
                ->pluck('value')
                ->filter()
                ->unique()
                ->values();

            // Get existing values from the DB for this requisition
            $existingValues = $model::where('requisition_id', $requisition->requisition_id)
                ->pluck($column);

            $toDelete = $existingValues->diff($submittedValues);

            if ($toDelete->isNotEmpty()) {
                $model::where('requisition_id', $requisition->requisition_id)
                    ->whereIn($column, $toDelete)
                    ->delete();
            }

            foreach ($submittedValues as $value) {
                $model::updateOrInsert(
                    [
                        'requisition_id' => $requisition->requisition_id,
                        $column => $value,
                    ],
                    [] 
                );
            }
        }

        $candidateIds = collect($this->requisition_candidates)
            ->pluck('value')
            ->filter()
            ->all();

        $requisition->candidates()->sync($candidateIds);

        if ($requisition) {
            $this->requisition_approver_signature = $originalName;
            $this->requisition_approver_signature = $originalName1;
                        
            $this->dispatch('swal:confirm', [
                'title' => 'Confirm Approval',
                'text' => 'Are you sure you want to approve this requisition?',
                'icon' => 'question',
                'confirmButtonText' => 'Confirm'
            ]);

        } else {
            dump('failed');
            $this->dispatch('show-toast', [
                'title' => 'Error',
                'content' => 'An error occurred!',
            ]);
        }
    }
    
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

    public function render()
    {
        return view('livewire.employee.manpower-requisition.approve-requisition-request');
    }
}
