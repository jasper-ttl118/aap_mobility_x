<?php

namespace App\Livewire\Crm\Corporate;

use App\Models\Customer;
use Livewire\Component;

class ResellerTable extends Component
{

    public $selectedCustomerId;
    public $selectedCustomer;
    protected $listeners = ['openProfileModal'];

    public function openProfileModal($customer_id)
    {
        dump( $customer_id);
    }
    // public function display($customer_id)
    // {
    //     $this->selectedCustomerId = $customer_id;
    //     $this->selectedCustomer = Customer::find($customer_id);
    //     dump($this->selectedCustomer);
    // }
    public function render()
    {
        $corporates = Customer::paginate(perPage: 5);
        return view('livewire.crm.corporate.reseller-table', ['corporates' => $corporates]);
    }
}
