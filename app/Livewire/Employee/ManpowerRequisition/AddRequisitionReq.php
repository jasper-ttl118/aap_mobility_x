<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use Livewire\Component;

class AddRequisitionReq extends Component
{
    public $job_position;
    public $job_description;
    public $requisition_type;
    public $requestor_name;
    public $salary_min;
    public $salary_max;

    public function add()
    {
        dump("adding...");
    }
    public function render()
    {
        return view('livewire.employee.manpower-requisition.add-requisition-req');
    }
}
