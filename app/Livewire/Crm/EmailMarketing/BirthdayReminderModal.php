<?php

namespace App\Livewire\Crm\EmailMarketing;

use Livewire\Component;

class BirthdayReminderModal extends Component
{
    public $show = false;
    public $selected_tab;
    public function showCustomerList()
    {
        $this->selected_tab = 'list';
    }

    public function showBirthdayMessageList()
    {
        $this->selected_tab = 'message-list';
    }
    public function display()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.crm.email-marketing.birthday-reminder-modal');
    }
}
