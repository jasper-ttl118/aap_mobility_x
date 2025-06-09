<?php

namespace App\Livewire\Crm\Corporate;
use App\Models\Customer;
use Livewire\Component;

class ResellersProfile extends Component
{
    
    public $corporates;

    public function mount($customer_id){
        $this->corporates = Customer::where("customer_id", $customer_id)->get();
    }
    public function render()
    {
        return view('livewire.crm.corporate.resellers-profile');
    }
}
