<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Requisition;
use Livewire\Component;

class DeleteRequisitionTicket extends Component
{
    public $requisition_id;
    public $status; // Used for updating/refreshing the table
    protected $listeners = ['getRequisitionId'];
    
    public function getRequisitionId($requisition_id, $status)
    {
        $this->requisition_id = $requisition_id;
        $this->status = $status;
    }
    public function delete()
    {
        $requisition = Requisition::find($this->requisition_id);
        $query = $requisition->update([
            'requisition_is_deleted' => 1 // 1 = Closed
        ]);

        if($query){
            $this->dispatch('refreshTable', $this->status);

            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Requisition Deleted Successfully!',
            ]);
        }
        else{
            $this->dispatch('show-toast', [
                'title' => 'Error',
                'content' => 'An Error Occured!',
            ]);
        }

        $this->dispatch('close-modal');
    }
    public function render()
    {
        return view('livewire.employee.manpower-requisition.delete-requisition-ticket');
    }
}
