<?php

namespace App\Livewire\Employee\VacancyList;

use App\Models\Requisition;
use Livewire\Component;

class ViewVacantJob extends Component
{
    public $requisition;
    protected $listeners = ['loadVacantJob'];

    public function loadVacantJob($requisition_id)
    {
        $this->requisition = Requisition::find($requisition_id);
    }
    public function render()
    {
        return view('livewire.employee.vacancy-list.view-vacant-job');
    }
}
