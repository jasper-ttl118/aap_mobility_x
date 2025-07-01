<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Candidate;
use App\Models\Department;
use App\Models\Requisition;
use Livewire\Component;
use Livewire\WithFileUploads;

class CheckRequisitionRequest extends Component
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
    public $departments;
    public array $requisition_education = [];
    public function mount(Requisition $requisition)
    {
        // Job Information fields
        $this->departments = Department::all();
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

        // dd($this->requisition_candidates);
    
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

    
    public function updating($name, $value)
    {
        if ($name === 'requisition_candidates' ) {
            dump($this->requisition_candidates);
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
        return view('livewire.employee.manpower-requisition.check-requisition-request');
    }
}
