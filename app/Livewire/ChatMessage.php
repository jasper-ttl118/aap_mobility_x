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
    public $messages = [];
    public $message = '';

    public function openChatModal($employee_id)
    {
        $this->employee_id = $employee_id;
        $this->employee = Employee::find($this->employee_id);
    }

    public function resetChat()
    {
        $this->reset('employee');
        $this->reset('employee_id');
        $this->reset('messages');
        $this->reset('message');
    }

    public function addMessage($event)
    {
        $this->messages[] = $event['message'] ?? '[No message received]';
    }

    public function sendMessage()
    {
        if(empty($this->message))
            return;

        $this->messages[] = $this->message;
        broadcast(new MessageEvent($this->message));
        $this->message = '';
    }
    
    public function render()
    {
        return view('livewire.chat-message');
    }
}
