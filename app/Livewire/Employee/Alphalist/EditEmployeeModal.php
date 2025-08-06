<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Employee;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditEmployeeModal extends Component
{
    public $employee;
    public $employee_id;
    public $employee_firstname;
    public $employee_middlename = '';
    public $employee_lastname;
    public $employee_email;
    public $employee_address;
    public $employee_position;
    public $employee_department;
    public $employee_contact_number;
    public $employee_status;
    protected $listeners = ["loadEmployeeInfo", "resetEmployeeProfile"];

    public function rules()
    {
        return [
            'employee_firstname' => 'required',
            'employee_lastname' => 'required',
            'employee_email' => 'required',
            'employee_address' => 'required',
            'employee_position' => 'required',
            'employee_department' => 'required',
            'employee_contact_number' => 'required|min:11',
            'employee_status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'employee_firstname.required' => 'First name is required.',
            'employee_lastname.required' => 'Last name is required.',
            'employee_email.required' => 'Email is required.',
            'employee_address.required' => 'Address is required.',
            'employee_position.required' => 'Employee position is required.',
            'employee_department.required' => 'Department is required.',
            'employee_contact_number.required' => 'Contact number is required.',
            'employee_contact_number.min' => 'Must be at least 11 characters.',
            'employee_status.required' => 'Status is required.'
        ];
    }
    public function loadEmployeeInfo($employee_id)
    {
         $this->employee = Employee::find($employee_id);
         $this->employee_id = $employee_id;
         $this->employee_firstname =  $this->employee->employee_firstname;
         $this->employee_middlename = $this->employee->employee_middlename;
         $this->employee_lastname =  $this->employee->employee_lastname;
         $this->employee_email = $this->employee->employee_email;
         $this->employee_address = $this->employee->employee_address;
         $this->employee_position = $this->employee->employee_position;
         $this->employee_department = $this->employee->employee_department;
         $this->employee_contact_number = $this->employee->employee_contact_number;
         $this->employee_status = $this->employee->employee_status;
    }

    public function resetEmployeeProfile()
    {
        $this->employee = null;
    }

    public function edit()
    {   
        $this->validate();

        $query = Employee::find($this->employee_id)->update([
            'employee_firstname' => $this->employee_firstname, 
            'employee_middlename' => $this->employee_middlename,
            'employee_lastname' => $this->employee_lastname,
            'employee_email' => $this->employee_email,
            'employee_address' => $this->employee_address,
            'employee_position' => $this->employee_position,
            'employee_department' => $this->employee_department,
            'employee_contact_number' => $this->employee_contact_number,
            'employee_status' => $this->employee_status,
        ]);

        if($query){
            $this->dispatch('refreshTable', 'employees');

            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Employee Updated Successfully!',
            ]);
        }
        else{
            $this->dispatch('show-toast', [
                'title' => 'Error',
                'content' => 'An Error Occured!',
            ]);
        }

        $this->resetEmployeeProfile();
        $this->dispatch(event: 'close-modal');
    }
    
    public function render()
    {
        return view('livewire.employee.alphalist.edit-employee-modal');
    }
}
