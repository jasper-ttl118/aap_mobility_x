<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Requisition;
use Livewire\Component;

class PendingListTable extends Component
{
    public function render()
    {
        $pendingRequisitions = Requisition::where('requisition_status', 1)
            ->latest()
            ->paginate(5, ['*'], 'pendingPage');
        return view('livewire.employee.manpower-requisition.pending-list-table', compact('pendingRequisitions'));
    }
}
