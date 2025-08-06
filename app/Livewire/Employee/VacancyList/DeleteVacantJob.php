<?php

namespace App\Livewire\Employee\VacancyList;

use App\Models\Requisition;
use Livewire\Component;

class DeleteVacantJob extends Component
{
    public $requisition_id;
    protected $listeners = ['getVacantJobId'];
    
    public function getVacantJobId($requisition_id)
    {
        $this->requisition_id = $requisition_id;
    }

    public function delete()
    {
        $requisition = Requisition::find($this->requisition_id);
        $query = $requisition->delete();

        if($query){
            $this->dispatch('refreshVacancyTable');

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
        return view('livewire.employee.vacancy-list.delete-vacant-job');
    }
}
