<?php

namespace App\Livewire\Employee\VacancyList;

use App\Models\Requisition;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditVacantJob extends Component
{
    public $requisition;
    public $requisition_id;
    #[Rule('required')]
    public $requisition_job_position;
    #[Rule('required')]
    public $requisition_job_description;
    #[Rule('required')]
    public $requisition_type;
    #[Rule('required')]
    public $requisition_department;
    #[Rule('required')]
    public $requisition_requestor_name;
    #[Rule('required|integer|min:1', message: ['requisition_salary_min.min' => 'Number must be greater than zero.'])]
    public $requisition_salary_min;
    #[Rule('required|integer|min:1', message: ['requisition_salary_max.min' => 'Number must be greater than zero.'])]
    public $requisition_salary_max;

    protected $listeners = ['loadEditVacantJob', 'resetVacantJob'];
    public function resetVacantJob()
    {
        $this->requisition = null;
    }

    public function loadEditVacantJob($requisition_id)
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
        $this->validate();

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
            $this->dispatch('refreshVacancyTable');

            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Requisition Updated Successfully!',
            ]);
        }
        else{
            $this->dispatch('show-toast', [
                'title' => 'Error',
                'content' => 'An Error Occured!',
            ]);
        }

        $this->resetVacantJob();
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.employee.vacancy-list.edit-vacant-job');
    }
}
