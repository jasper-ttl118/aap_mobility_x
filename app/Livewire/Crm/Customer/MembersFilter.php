<?php

namespace App\Livewire\Crm\Customer;

use Livewire\Component;

class MembersFilter extends Component
{
    public $member_filter = "1";

    public function changeMemberFilter()
    {
        $this->dispatch('changeMemberFilter', member_filter: $this->member_filter)
        ->to('crm.customer.customer-table');
        // dd($this->birthday_filter);
    }

    public function render()
    {
        return view('livewire.crm.customer.members-filter');
    }
}
