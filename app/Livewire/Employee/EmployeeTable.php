<?php

namespace App\Livewire\Employee;

use Livewire\Component;

class EmployeeTable extends Component
{
    public $employees;
    public $temp;

    public function mount()
    {
        $this->temp = 5;
    }
    public function showEmployeeModal($employee)
    {   
        $this->dispatch('toggleModal', employee: $employee)
        ->to('employee.employee-modals');
        // $this->temp = $employee_id;
        // dump($employee_id);
    }

    public function render()
    {
        return view('livewire.employee.employee-table');
    }
}
