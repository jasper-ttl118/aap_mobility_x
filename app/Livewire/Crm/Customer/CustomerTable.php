<?php

namespace App\Livewire\Crm\Customer;

use App\Models\Customer;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerTable extends Component
{
    use WithPagination; 
    protected $paginationTheme = "tailwind";
    public function render()
    {
        $customers = Customer::paginate(4);

        return view('livewire.crm.customer.customer-table', ['customers' => $customers]);
    }
}
