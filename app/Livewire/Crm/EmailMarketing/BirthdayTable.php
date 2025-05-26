<?php

namespace App\Livewire\Crm\EmailMarketing;

use App\Models\Customer;
use DateTime;
use Livewire\Component;
use Livewire\WithPagination;

class BirthdayTable extends Component
{
    use WithPagination; 
    protected $listeners = ["changeFilter" => "changeBirthdayFilter"];
    public $filter;
    public $current_month;
    public $date;
    public $current_day;
    public $reset_url = true;
    public function changeBirthdayFilter($birthday_filter)
    {
        // dd("test", $birthday_filter);
        $this->resetPage();
        $this->filter = $birthday_filter;
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
        $this->filter = "1";
    }
    public function render()
    {
        $customers = Customer::whereRaw('MONTH(customer_birthdate) = ?',  $this->filter)->paginate(5);

        return view('livewire.crm.email-marketing.birthday-table', ['customers' => $customers]);
    }
}
