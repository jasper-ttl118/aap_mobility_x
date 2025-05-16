<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class BirthdayFilter extends Component
{
    public $birthday_filter = "Today";

    public function changeBirthdayFilter()
    {
        $this->dispatch('changeFilter', birthday_filter: $this->birthday_filter)
        ->to('customer.birthday-table');
        // dd($this->birthday_filter);
    }

    public function render()
    {
        return view('livewire.customer.birthday-filter');
    }
}
