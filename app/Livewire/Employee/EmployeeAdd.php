<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class EmployeeAdd extends Component
{
    public $employee_firstname;
    public $employee_middlename;
    public $employee_lastname;
    public $employee_email;
    public $employee_address;
    public $employee_position;
    public $employee_department;
    public $employee_contact_number;
    public function add()
    {
        $query = Employee::create([
            'employee_firstname' => $this->employee_firstname,
            'employee_middlename' => $this->employee_middlename,
            'employee_lastname' => $this->employee_lastname,
            'employee_email' => $this->employee_email,
            'employee_address' => $this->employee_address,
            'employee_position' => $this->employee_position,
            'employee_department' => $this->employee_department,
            'employee_contact_number' => $this->employee_contact_number,
        ]);

        if($query)
            dump("Success");
        else
            dump("Failed");
    }
    public function render()
    {
        return view('livewire.employee.employee-add');
    }
}
