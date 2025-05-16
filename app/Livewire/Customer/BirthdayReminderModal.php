<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class BirthdayReminderModal extends Component
{
    public $show = false;

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
        return view('livewire.customer.birthday-reminder-modal');
    }
}
