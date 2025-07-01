<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Requisition;
use Livewire\Attributes\Rule;
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
    public $status; // for updating of table

    protected $listeners = ['loadEditRequisitionRequest', 'resetRequisitionData'];
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

    public function resetRequisitionData()
    {
        $this->requisition = null;
    }

    public function loadEditRequisitionRequest($requisition_id, $status)
    {
        $this->status = $status;
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
            $this->dispatch('refreshTable', $this->status);

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

        $this->resetRequisitionData();
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.employee.manpower-requisition.edit-requisition-ticket');
    }
}
