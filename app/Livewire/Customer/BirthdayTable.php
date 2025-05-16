<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Carbon\Carbon;
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
        $this->filter = "Today";
    }

    public function render()
    {
        switch($this->filter){
            case "Today":
                $customers = Customer::whereRaw('DAY(customer_birthdate) = ?', [$this->current_day])
                                     ->whereRaw('MONTH(customer_birthdate) = ?', [$this->current_month])
                                     ->paginate(3);
                break;
            case "This Week":
                $startOfWeek = Carbon::now()->startOfWeek();
                $endOfWeek = Carbon::now()->endOfWeek();    

                $customers = Customer::whereMonth('customer_birthdate', $startOfWeek->month)
                    ->whereDay('customer_birthdate', '>=', $startOfWeek->day)
                    ->whereDay('customer_birthdate', '<=', $endOfWeek->day)
                    ->paginate(3);
                break;
            case "This Month":
                $customers = Customer::whereRaw('MONTH(customer_birthdate) = ?', [$this->current_month])->paginate(3);
                break;
        }

        return view('livewire.customer.birthday-table', ['customers' => $customers]);
    }
}
