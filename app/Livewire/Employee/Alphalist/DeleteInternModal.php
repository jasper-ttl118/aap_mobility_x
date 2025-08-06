<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Intern;
use Livewire\Component;

class DeleteInternModal extends Component
{
    public $intern_id;
    protected $listeners = ['getInternId'];
    public function getInternId($intern_id)
    {
        $this->intern_id = $intern_id;
    }

    public function delete()
    {
        $intern = Intern::find($this->intern_id);
        $query = $intern->delete();

        if($query){
            $this->dispatch('refreshTable', 'interns');

            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Intern Deleted Successfully!',
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
        return view('livewire.employee.alphalist.delete-intern-modal');
    }
}
