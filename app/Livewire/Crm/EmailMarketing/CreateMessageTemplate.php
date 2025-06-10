<?php

namespace App\Livewire\Crm\EmailMarketing;

use Livewire\Component;

class CreateMessageTemplate extends Component
{
    public $subject;
    public $content;
    public function create()
    {
        // if(empty($this->subject) || empty($this->content))
        // {
        //     dump("Empty");
        //     return;
        // }

        $this->dispatch('show-toast', [
            'title' => 'Success',
            'content' => 'Template Added Successfully!',
        ]);
    }

    public function render()
    {
        return view('livewire.crm.email-marketing.create-message-template');
    }
}
