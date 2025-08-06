<?php

namespace App\Livewire\Crm\EmailMarketing;

use Livewire\Component;

class EditDraftMessage extends Component
{
    public $subject;
    public $content;
    public $draft_sched;
    public $recipient;
    public function update()
    {
        $this->dispatch('show-toast', [
            'title' => 'Success',
            'content' => 'Message Updated Successfully!',
        ]);
    }

    public function render()
    {
        return view('livewire.crm.email-marketing.edit-draft-message');
    }
}
