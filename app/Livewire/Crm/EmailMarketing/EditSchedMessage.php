<?php

namespace App\Livewire\Crm\EmailMarketing;

use Livewire\Component;

class EditSchedMessage extends Component
{
    public $subject;
    public $recipient;
    public $sched_date;
    public $content;
    public function update()
    {
        $this->dispatch('show-toast', [
            'title' => 'Success',
            'content' => 'Message Updated Successfully!',
        ]);
    }
    public function render()
    {
        return view('livewire.crm.email-marketing.edit-sched-message');
    }
}
