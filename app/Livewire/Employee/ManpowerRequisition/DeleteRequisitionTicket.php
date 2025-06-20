<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Requisition;
use Livewire\Component;

class DeleteRequisitionTicket extends Component
{
    public $requisition_id;
    protected $listeners = ['getRequisitionId'];

    public function getRequisitionId($requisition_id)
    {
        $this->requisition_id = $requisition_id;
    }
    public function delete()
    {
        $requisition = Requisition::find($this->requisition_id);
        $query = $requisition->delete();

        if($query){
            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Requisition Deleted Successfully!',
            ]);

            $this->dispatch('close-modal');
        }
        else{
            $this->dispatch('show-toast', [
                'title' => 'Error',
                'content' => 'An Error Occured!',
            ]);
        }
    }
    public function render()
    {
        return view('livewire.employee.manpower-requisition.delete-requisition-ticket');
    }
}
