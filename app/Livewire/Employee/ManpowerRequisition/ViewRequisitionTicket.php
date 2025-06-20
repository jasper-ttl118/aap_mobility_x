<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Requisition;
use Livewire\Component;

class ViewRequisitionTicket extends Component
{

    public $requisition;
    protected $listeners = ['loadRequisitionRequest'];

    public function loadRequisitionRequest($requisition_id)
    {
        $this->requisition = Requisition::find($requisition_id);
    }
    public function approve()
    {
        $query = Requisition::find($this->requisition->requisition_id)->update(
[
                'requisition_status' => 2
            ]
        );

        if($query){      
            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Requisition Approved!',
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

    public function reject()
    {
        $query = Requisition::find($this->requisition->requisition_id)->update(
[
                'requisition_status' => 3
            ]
        );

        if($query){      
            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Requisition Rejected!',
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
        return view('livewire.employee.manpower-requisition.view-requisition-ticket');
    }
}
