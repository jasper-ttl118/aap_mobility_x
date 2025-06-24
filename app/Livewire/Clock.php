<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Clock extends Component
{
    public $currentHour;
    public $currentMinute;
    public $currentMeridiem;
    public $currentDate;

    public $currentDay;


    public function mount()
    {
        $this->updateTime();
    }

    public function updateTime()
    {
        $now = Carbon::now('Asia/Manila');
        $this->currentHour = $now->format('h');
        $this->currentMinute = $now->format('i');
        $this->currentDate = $now->format('F j, Y');
        $this->currentDay = $now->format('l');
        $this->currentMeridiem = $now->format('A');
    }

    public function render()
    {
        return view('livewire.clock');
    }
}
