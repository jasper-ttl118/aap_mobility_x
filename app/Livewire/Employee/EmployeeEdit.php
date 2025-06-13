<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EmployeeEdit extends Component
{
    public $employee;
    public $employee_id;
    #[Rule('required|alpha')]
    public $employee_firstname;

    #[Rule('required|regex:/^[A-Za-z .]+$/')]
    public $employee_middlename;

    #[Rule('required|alpha')]
    public $employee_lastname;

    #[Rule('required|email')]
    public $employee_email;

    #[Rule('required|regex:/^[A-Za-z0-9 ._-]+$/')]
    public $employee_address;

    #[Rule('required')]
    public $employee_position;

    #[Rule('required')]
    public $employee_department;

    #[Rule('required|regex:/^[09][0-9]+/|min:11')]
    public $employee_contact_number;

    #[Rule('required')]
    public $employee_status;

    public function mount(Employee $employee)
    {
        $this->employee_id = $employee->employee_id;
        $this->employee_firstname = $employee->employee_firstname;
        $this->employee_middlename = $employee->employee_middlename;
        $this->employee_lastname = $employee->employee_lastname;
        $this->employee_email = $employee->employee_email;
        $this->employee_address = $employee->employee_address;
        $this->employee_position = $employee->employee_position;
        $this->employee_department = $employee->employee_department;
        $this->employee_contact_number = $employee->employee_contact_number;
        $this->employee_status = $employee->employee_status;
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
    }
    
    public function render()
    {
        return view('livewire.employee.employee-edit');
    }
}
