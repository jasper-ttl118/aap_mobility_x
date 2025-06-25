<?php

namespace App\Livewire\Employee\VacancyList;

use App\Models\Requisition;
use Livewire\Component;
use Livewire\WithPagination;

class VacantTable extends Component
{
    use WithPagination;
    protected $listeners = ['refreshVacancyTable'];
    public function refreshVacancyTable()
    {
        $this->resetPage('vacantPage');
    }
    public function render()
    {
        $approvedRequisitions = Requisition::where('requisition_status', '=', 2)->paginate(5, ['*'], 'vacantPage');
        return view('livewire.employee.vacancy-list.vacant-table', compact('approvedRequisitions') );
    }
}
