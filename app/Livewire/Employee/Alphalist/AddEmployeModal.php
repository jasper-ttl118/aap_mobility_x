<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Employee;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddEmployeModal extends Component
{
    public $employee_firstname = '';
    public $employee_middlename = '';
    public $employee_lastname = '';
    public $employee_email = '';
    public $employee_address = '';
    public $employee_position = '';
    public $employee_department = '';
    public $employee_contact_number = '';
    
    public function rules()
    {
        return [
            'employee_firstname' => 'required',
            'employee_lastname' => 'required',
            'employee_email' => 'required',
            'employee_address' => 'required',
            'employee_position' => 'required',
            'employee_department' => 'required',
            'employee_contact_number' => 'required|min:11'
        ];
    }

    public function messages()
    {
        return [
            'employee_firstname.required' => 'First name is required.',
            'employee_lastname.required' => 'Last name is required.',
            'employee_email.required' => 'Email is required.',
            'employee_address.required' => 'Address is required.',
            'employee_position.required' => 'Employee Position is required.',
            'employee_department.required' => 'Department is required.',
            'employee_contact_number.required' => 'Contact Number is required.',
            'employee_contact_number.min' => 'Must be at least 11 characters.'

        ];
    }

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
            $this->dispatch('refreshTable', 'employees');

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

        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.employee.alphalist.add-employe-modal');
    }
}
