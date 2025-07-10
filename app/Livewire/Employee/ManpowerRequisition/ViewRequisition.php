<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Candidate;
use App\Models\Requisition;
use Livewire\Component;

class ViewRequisition extends Component
{
    public $requisition;
    public $department;
    public $candidates;

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
    public $requisition_applicants_sources;
    public $requisition_requestor_name;
    public $requisition_requestor_position;
    public $requisition_endorser_name;
    public $requisition_endorser_position;
    public $requisition_approver_name;
    public $requisition_approver_position;
    public $requisition_approver_name_1;
    public $requisition_approver_position_1;
    public $requisition_work_experience;
    public $requisition_special_skill;
    public $requisition_other_description;
    public $requisition_job_description;
    public $requisition_education_level;
    public $requisition_date_required;

    protected $listeners = ['loadRequisitionRequest'];

    public function mount(Requisition $requisition)
    {
        $this->requisition = $requisition;

        $this->department = $requisition->requisition_department;
        $this->candidates = $requisition->candidates;

        $this->requisition_job_position          = $requisition->requisition_job_position;
        $this->requisition_type                  = $requisition->requisition_type;
        $this->requisition_department            = $requisition->department->department_name;
        $this->requisition_section               = $requisition->requisition_section;
        $this->requisition_initial_job_position  = $requisition->requisition_initial_job_position;
        $this->requisition_justification         = $requisition->requisition_justification;
        $this->requisition_eventual_job_position = $requisition->requisition_eventual_job_position;
        $this->requisition_number_required       = $requisition->requisition_number_required;
        $this->requisition_date_required         = $requisition->requisition_date_required;
        $this->requisition_contract_duration     = $requisition->requisition_contract_duration;
        $this->requisition_employment_type       = $requisition->requisition_employment_type;
        $this->requisition_budget                = $requisition->requisition_budget;
        $this->requisition_engagement_type       = $requisition->requisition_engagement_type;
        $this->requisition_applicants_sources    = $requisition->requisition_applicants_sources;

        $this->requisition_requestor_name        = $requisition->requisition_requestor_name;
        $this->requisition_requestor_position    = $requisition->requisition_requestor_position;

        $this->requisition_endorser_name         = $requisition->requisition_endorser_name;
        $this->requisition_endorser_position     = $requisition->requisition_endorser_position;

        $this->requisition_approver_name         = $requisition->requisition_approver_name;
        $this->requisition_approver_position     = $requisition->requisition_approver_position;

        $this->requisition_approver_name_1       = $requisition->requisition_approver_name_1;
        $this->requisition_approver_position_1   = $requisition->requisition_approver_position_1;

        $this->requisition_work_experience       = $requisition->requisition_work_experience;
        $this->requisition_special_skill       = $requisition->requisition_special_skill;
        $this->requisition_other_description     = $requisition->requisition_other;
        $this->requisition_job_description     = $requisition->requisition_job_description;    
        $this->requisition_education_level    = $requisition->requisition_education_level;
    }

    public function render()
    {
        return view('livewire.employee.manpower-requisition.view-requisition');
    }
}
