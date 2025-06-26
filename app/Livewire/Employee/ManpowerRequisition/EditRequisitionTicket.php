<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use Livewire\Component;

class EditRequisitionTicket extends Component
{
    public $job_position;
    public $job_description;
    public $department;
    public $requisition_type;
    public $requestor_name;
    public $salary_min;
    public $salary_max;
    public function mount()
    {
         $this->job_position = "Junior Full Stack Developer";
         $this->job_description = "Proficient In Laravel\nKnowledgeable in MySQL";
         $this->department;
         $this->requisition_type;
         $this->requestor_name = "John Doe";
         $this->salary_min = 200000;
         $this->salary_max = 250000;
    }
    public function render()
    {
        return view('livewire.employee.manpower-requisition.edit-requisition-ticket');
    }
}
