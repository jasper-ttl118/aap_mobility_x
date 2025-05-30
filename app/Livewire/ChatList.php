<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatList extends Component
{
    public $employees;

    public function mount()
    {
        $this->employees = Employee::all();
        // dd($this->employees[0]->employee_firstname);
    }
    public function render()
    {
        return view('livewire.chat-list');
    }
}
