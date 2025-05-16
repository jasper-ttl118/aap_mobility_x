<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerTable extends Component
{
    use WithPagination; 
    protected $paginationTheme = "tailwind";

    public function render()
    {
        $customers = Customer::paginate(4);

        return view('livewire.customer.customer-table', [
            'customers' => $customers
        ]);
    }
}
