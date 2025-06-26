<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Employee;
use Livewire\Component;

class ViewEmployeeModal extends Component
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
        return view('livewire.employee.alphalist.view-employee-modal');
    }
}
