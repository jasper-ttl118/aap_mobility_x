<?php

namespace App\Livewire\Crm\EmailMarketing;

use Livewire\Component;

class DeleteMessage extends Component
{
    public function delete()
    {
        $this->dispatch('show-toast', [
            'title' => 'Success',
            'content' => 'Message Deleted Successfully!',
        ]);
    }
    public function render()
    {
        return view('livewire.crm.email-marketing.delete-message');
    }
}
