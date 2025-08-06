<?php

namespace App\Livewire\Crm\EmailMarketing;

use Livewire\Component;

class BirthdayFilter extends Component
{
    public $birthday_filter = "1";

    public function changeBirthdayFilter()
    {
        $this->dispatch('changeFilter', birthday_filter: $this->birthday_filter)
        ->to('crm.email-marketing.birthday-table');
        // dd($this->birthday_filter);
    }
    public function render()
    {
        return view('livewire.crm.email-marketing.birthday-filter');
    }
}
