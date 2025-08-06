<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Employee;
use App\Models\Intern;
use Livewire\Component;

class ViewInternModal extends Component
{
    public $intern;
    public $viewOpen = false;
    protected $listeners = ['toggleInternModal'];

    public function toggleInternModal($intern_id)
    {
        $this->intern = Intern::findOrFail($intern_id);
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
