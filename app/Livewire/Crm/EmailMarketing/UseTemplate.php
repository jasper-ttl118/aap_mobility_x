<?php

namespace App\Livewire\Crm\EmailMarketing;

use Livewire\Component;

class UseTemplate extends Component
{
    public function create()
    {
        $this->dispatch('show-toast', [
            'title' => 'Success',
            'content' => 'Message Sent Successfully!',
        ]);
    }
    
    public function render()
    {
        return view('livewire.crm.email-marketing.use-template');
    }
}
