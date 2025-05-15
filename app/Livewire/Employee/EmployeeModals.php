<?php

namespace App\Livewire\Employee;

use DateTime;
use Livewire\Component;

class EmployeeModals extends Component
{

    public $employee;
    public $viewOpen = false;
    protected $listeners = ['toggleModal' => 'toggle'];

    public function toggle($employee)
    {
        $this->employee =  (object) $employee;
        // dd(new DateTime($this->employee->employee_date_created));
        $this->viewOpen = true;
    }

    public function close()
    {
        $this->viewOpen = false;
    }

    public function render()
    {
        return view('livewire.employee.employee-modals');
    }
}
