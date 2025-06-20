<?php

namespace App\Livewire\Employee\ManpowerRequisition;

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

    public function add()
    {
       $query = Requisition::create([
            'requisition_job_position' => $this->requisition_job_position,
            'requisition_job_description' => $this->requisition_job_description,
            'requisition_type' => $this->requisition_type,
            'requisition_department' => $this->requisition_department,
            'requisition_requestor_name' => $this->requisition_requestor_name,
            'requisition_salary_min' => $this->requisition_salary_min,
            'requisition_salary_max' => $this->requisition_salary_max,
            'requisition_status' => 1
       ]);

        if($query){      
            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Requisition Submitted Successfully!',
            ]);

            $this->dispatch('close-modal');
        }
        else{
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
