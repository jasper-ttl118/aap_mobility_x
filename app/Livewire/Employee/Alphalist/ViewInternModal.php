<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Employee;
use Livewire\Component;

class ViewInternModal extends Component
{
    public $employee;
    public $viewOpen = false;
    protected $listeners = ['toggleInternModal'];

    public function toggleInternModal($intern_id)
    {
        $this->employee = Employee::findOrFail($intern_id);
        $this->viewOpen = true;
    }

    public function close()
    {
        $this->viewOpen = false;
    }

    public function render()
    {
        return view('livewire.employee.alphalist.view-intern-modal');
    }
}
