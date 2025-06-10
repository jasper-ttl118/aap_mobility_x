<?php

namespace App\Livewire\Crm\Corporate;
use App\Models\Customer;
use Livewire\Component;

class ResellersProfile extends Component
{
    protected $listeners = ['viewResellerProfile', 'resetResellerProfile'];
    public $reseller;


    public function viewResellerProfile($reseller_id)
    {
        $this->reseller = Customer::find($reseller_id);
    }

    public function resetResellerProfile()
    {
        $this->reseller = null;
    }

    public function render()
    {
        return view('livewire.crm.corporate.resellers-profile');
    }
}