<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Employee;
use Livewire\Component;

class DeleteEmployeeAlert extends Component
{
    public $employee_id;
    protected $listeners = ['getEmployeeId'];

    public function getEmployeeId($employee_id)
    {
        $this->employee_id = $employee_id;
    }

    public function delete()
    {
        $employee = Employee::find($this->employee_id);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
        $query = $employee->delete();

        if($query){
            $this->dispatch('refreshTable', 'employees');

            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Employee Deleted Successfully!',
            ]);
        }
        else{
            $this->dispatch('show-toast', [
                'title' => 'Error',
                'content' => 'An Error Occured',
            ]);
        }

        $this->dispatch(event: 'close-modal');
    }

    public function render()
    {
        return view('livewire.employee.alphalist.delete-employee-alert');
    }
}
