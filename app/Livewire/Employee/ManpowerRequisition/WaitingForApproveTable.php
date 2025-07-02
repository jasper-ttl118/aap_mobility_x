<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Requisition;
use Livewire\Component;

class WaitingForApproveTable extends Component
{
    public function render()
    {
        $waitingApprovalRequisitions = Requisition::where('requisition_status', 2)
        ->latest()
        ->paginate(5, ['*'], 'waitingApprovalPage');
        return view('livewire.employee.manpower-requisition.waiting-for-approve-table', compact('waitingApprovalRequisitions'));
    }
}
