<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class ChatMessage extends Component
{
    protected $listeners = ['openChatModal', 'resetChat'];
    public $employee_id;
    public $employee;
    public $message;

    public function openChatModal($employee_id)
    {
        $this->employee_id = $employee_id;
        $this->employee = Employee::find($this->employee_id);
    }

    public function resetChat()
    {
        $this->employee = null;
        $this->employee_id = null;
        $this->message = null;
    }

    public function sendMessage()
    {
        dump($this->message);
    }
    
    public function render()
    {
        return view('livewire.chat-message');
    }
}
