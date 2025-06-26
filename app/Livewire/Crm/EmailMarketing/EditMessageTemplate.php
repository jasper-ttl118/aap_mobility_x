<?php

namespace App\Livewire\Crm\EmailMarketing;

use Livewire\Component;

class EditMessageTemplate extends Component
{
    public function save()
    {
       $this->dispatch('show-toast', [
            'title' => 'Success',
            'content' => 'Template Updated Successfully!',
        ]);
    }
    public function render()
    {
        return view('livewire.crm.email-marketing.edit-message-template');
    }
}
