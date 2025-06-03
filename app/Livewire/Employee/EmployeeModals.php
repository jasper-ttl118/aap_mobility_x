<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use DateTime;
use Livewire\Component;

class EmployeeModals extends Component
{

    public $employee;
    public $viewOpen = false;
    protected $listeners = ['toggleModal' => 'toggle'];

    public function toggle($employeeId)
    {
        $this->employee = Employee::findOrFail($employeeId);
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
