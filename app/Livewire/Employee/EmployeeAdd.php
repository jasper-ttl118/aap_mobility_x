<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EmployeeAdd extends Component
{
    #[Rule('required|alpha')]
    public $employee_firstname = '';

    #[Rule('required|alpha')]
    public $employee_middlename = '';

    #[Rule('required|alpha')]
    public $employee_lastname = '';

    #[Rule('required|email')]
    public $employee_email = '';

    #[Rule('required|alpha_dash')]
    public $employee_address = '';
    
    #[Rule('required')]
    public $employee_position = '';

    #[Rule('required')]
    public $employee_department = '';

    #[Rule('required|numeric|min:11')]
    public $employee_contact_number = '';
    
    public function mount()
    {
        $this->employee_department = 'IST';
        $this->employee_position = 'Manager';
    }
    public function add()
    {
        $this->validate();
        
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
        
        if($query){      
            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Employee Added Successfully!',
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
        return view('livewire.employee.employee-add');
    }
}
