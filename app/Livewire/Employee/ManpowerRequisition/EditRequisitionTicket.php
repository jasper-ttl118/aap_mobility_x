<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Requisition;
use Livewire\Component;

class EditRequisitionTicket extends Component
{
    public $requisition;
    public $requisition_id;
    public $requisition_job_position;
    public $requisition_job_description;
    public $requisition_type;
    public $requisition_department;
    public $requisition_requestor_name;
    public $requisition_salary_min;
    public $requisition_salary_max;

    protected $listeners = ['loadEditRequisitionRequest', 'resetRequisitionData'];
    public function resetRequisitionData()
    {
        $this->requisition = null;
    }

    public function loadEditRequisitionRequest($requisition_id)
    {
        $this->requisition = Requisition::find($requisition_id);
        $this->requisition_id = $requisition_id;
        $this->requisition_job_position = $this->requisition->requisition_job_position;
        $this->requisition_job_description = $this->requisition->requisition_job_description; 
        $this->requisition_type = $this->requisition->requisition_type;
        $this->requisition_department = $this->requisition->requisition_department;
        $this->requisition_requestor_name = $this->requisition->requisition_requestor_name;
        $this->requisition_salary_min = $this->requisition->requisition_salary_min;
        $this->requisition_salary_max = $this->requisition->requisition_salary_max;
    }

    public function edit()
    {
        $query = Requisition::find($this->requisition_id)->update([
            'requisition_job_position' => $this->requisition_job_position,
            'requisition_job_description' => $this->requisition_job_description,
            'requisition_type' => $this->requisition_type,
            'requisition_department' => $this->requisition_department,
            'requisition_requestor_name' => $this->requisition_requestor_name,
            'requisition_salary_min' => $this->requisition_salary_min,
            'requisition_salary_max' => $this->requisition_salary_max,
        ]);

        if($query){      
            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Requisition Updated Successfully!',
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
        return view('livewire.employee.manpower-requisition.edit-requisition-ticket');
    }
}
