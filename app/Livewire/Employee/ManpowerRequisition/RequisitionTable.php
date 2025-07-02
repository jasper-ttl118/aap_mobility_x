<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Requisition;
use Livewire\Component;
use Livewire\WithPagination;

class RequisitionTable extends Component
{
    use WithPagination;
    protected $listeners = ['refreshTable'];
    
    public function refreshTable($status)
    {
        if($status === 'pending'){                  
            $this->resetPage('pendingPage');        
        }else if($status ==='approved'){
            $this->resetPage('approvedPage');
        }else if($status === 'waiting'){
            $this->resetPage('waitingApproval');
        }
    }

  public function render()
    {
        $pendingRequisitions = Requisition::where('requisition_status', 1)
            ->latest()
            ->paginate(5, ['*'], 'pendingPage');

        $approvedRequisitions = Requisition::where('requisition_status', 3)
            ->latest()
            ->paginate(5, ['*'], 'approvedPage');

        $waitingRequisitions = Requisition::where('requisition_status', 2)
            ->latest()
            ->paginate(5, ['*'], 'waitingApproval');

        return view('livewire.employee.manpower-requisition.requisition-table', [
            'pendingRequisitions' => $pendingRequisitions,
            'approvedRequisitions' => $approvedRequisitions,
            'waitingRequisitions' => $waitingRequisitions,
        ]);
    }
}
