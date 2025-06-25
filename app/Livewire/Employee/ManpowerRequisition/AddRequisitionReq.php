<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Requisition;
use Livewire\Attributes\Rule;
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
    public $pendingRequisitions;

    public function mount()
    {
        $this->requisition_department = 'IST';
        $this->requisition_type = 'Replacement';
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
       $this->validate();

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

            $this->dispatch('refreshTable', 'pending');

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
