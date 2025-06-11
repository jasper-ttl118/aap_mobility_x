<?php

namespace App\Livewire\Crm\Customer;

use App\Models\Customer;
use Livewire\Component;

class MemberProfile extends Component
{
     protected $listeners = ['viewMemberProfile', 'resetMemberProfile'];
    public $member;

    public function viewMemberProfile($member_id)
    {
        $this->member = Customer::find($member_id);
    }

    public function resetMemberProfile()
    {
        $this->member = null;
    }
    public function render()
    {
        return view('livewire.crm.customer.member-profile');
    }
}
