<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Requisition;
use Livewire\Component;
use Livewire\WithPagination;

class RequisitionTable extends Component
{
    use WithPagination;
    protected $listeners = ['refreshTable'];
    public $requisition_filter;
    public $status_class;
    public $status_text;
    
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

    public function mount()
    {
        $this->requisition_filter = 1;
        $this->status_class = "bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-gray-300";
        $this->status_text = "Pending";
    }
    public function changeRequisitionFilter()
    {
        $this->resetPage('pendingPage');
        switch ($this->requisition_filter){
            case 1:
                $this->status_class = "bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-gray-300";
                $this->status_text = "Pending";
                break;
            case 2:
                $this->status_class ='text-white bg-indigo-500 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg';
                $this->status_text = 'Dept. Head Approved';
                break;
            case 3:
                $this->status_class = "bg-purple-800 text-purple-100 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg";
                $this->status_text = 'HR Approved';
                break;
            case 4:
                $this->status_class ='text-yellow-700 bg-yellow-100 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg';
                $this->status_text = 'CFO Approved';
                break;
            case 5:
                $this->status_class = 'bg-green-600 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg';
                $this->status_text = 'CEO Approved';
                break;
        }
    }

    public function render()
    {
            $requisitions = Requisition::where('requisition_status', $this->requisition_filter)
                ->where('requisition_is_deleted', 0)->
                with('department')
                ->latest()
                ->paginate(5, ['*'], 'pendingPage');
            // dd($requisitions);
            return view('livewire.employee.manpower-requisition.requisition-table', [
                'requisitions' => $requisitions
            ]);
    }
}
