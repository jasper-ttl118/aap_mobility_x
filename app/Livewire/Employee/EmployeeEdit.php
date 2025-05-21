<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class EmployeeEdit extends Component
{
    public $employee;
    public $employee_id;
    public $employee_firstname;
    public $employee_middlename;
    public $employee_lastname;
    public $employee_email;
    public $employee_address;
    public $employee_position;
    public $employee_department;
    public $employee_contact_number;
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

        if($query)
             dump("Success Edit!");
        else   
            dump("Edit Failed/Error");
    }
    
    public function render()
    {
        return view('livewire.employee.employee-edit');
    }
}
