<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;
use App\Events\MessageEvent;

class ChatMessage extends Component
{
    protected $listeners = ['openChatModal', 'resetChat', 'echo:chat,MessageEvent' => 'addMessage'];
    public $employee_id;
    public $employee;
    public $messages;

    public function openChatModal($employee_id)
    {
        $this->employee_id = $employee_id;
        $this->employee = Employee::find($this->employee_id);
    }

    public function resetChat()
    {
        $this->employee = null;
        $this->employee_id = null;
        $this->messages = null;
    }

    public function addMessage($event)
    {
        $this->messages = $event['message'] ?? '[No message received]';

    }

    public function sendMessage()
    {
        broadcast(new MessageEvent($this->messages));
    }
    
    public function render()
    {
        return view('livewire.chat-message');
    }
}
