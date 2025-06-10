<?php

namespace App\Livewire\Crm\Customer;

use App\Models\Customer;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerTable extends Component
{
    use WithPagination; 
    protected $paginationTheme = "tailwind";
    public $member_filter = 1;

    public function changeMemberFilter()
    {
       $this->resetPage();
    }

    public function render()
    {
        $customers = Customer::where('customer_status', '=', $this->member_filter)->paginate(4);

        return view('livewire.crm.customer.customer-table', ['customers' => $customers]);
    }
}
