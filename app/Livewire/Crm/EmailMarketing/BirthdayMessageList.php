<?php

namespace App\Livewire\Crm\EmailMarketing;

use App\Models\Message;
use Livewire\Component;

class BirthdayMessageList extends Component
{
    public function render()
    {
        $messages = Message::paginate(5);

        return view('livewire.crm.email-marketing.birthday-message-list', ['messages' => $messages]);
    }
}
