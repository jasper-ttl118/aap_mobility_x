<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Employee;
use App\Models\Intern;
use Livewire\Component;
use Livewire\WithPagination;

class AlphalistTable extends Component
{
    use WithPagination;
    protected $listeners = ['refreshTable'];

    public function refreshTable($status)
    {
        if($status === 'employees'){
            $this->resetPage('employeePage');
        }else if($status === 'interns'){
            $this->resetPage('internPage');
        }
    }
    public function render()
    {
        $employees = Employee::paginate(5, ['*'], 'employeePage');
        $interns = Intern::paginate(5, ['*'], 'internPage');
        return view('livewire.employee.alphalist.alphalist-table', compact('employees', 'interns'));
    }
}
