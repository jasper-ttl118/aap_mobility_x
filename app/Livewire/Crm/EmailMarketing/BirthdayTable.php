<?php

namespace App\Livewire\Crm\EmailMarketing;

use App\Models\Customer;
use DateTime;
use Livewire\Component;
use Livewire\WithPagination;

class BirthdayTable extends Component
{
    use WithPagination; 
    public $birthday_filter;
    public $current_month;
    public $date;
    public $current_day;
    public $reset_url = true;

    public function updatingBirthdayFilter()
    {
        $this->resetPage();
    }

    public function changeBirthdayFilter()
    {
        // dd("test", $birthday_filter);
        $this->resetPage();
    }

    public function mount()
    {
        if($this->reset_url)
        {
            $this->reset_url = false;
            $this->resetPage();
        }
    
        $this->current_month = date('n');
        $this->date = new DateTime(); 
        // dd (Carbon::now());
        $this->current_day = $this->date->format('d');
        $this->birthday_filter = "1";
    }
    public function render()
    {
        $customers = Customer::whereMonth('customer_birthdate', $this->birthday_filter)->paginate(4);

        return view('livewire.crm.email-marketing.birthday-table', ['customers' => $customers]);
    }
}
