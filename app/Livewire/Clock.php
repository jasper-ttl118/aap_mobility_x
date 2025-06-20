<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Clock extends Component
{
    public $currentTime;
    public $currentDate;

    public function mount()
    {
        $this->updateTime();
    }

    public function updateTime()
    {
        $now = Carbon::now('Asia/Manila');
        $this->currentTime = $now->format('h:i:s A');
        $this->currentDate = $now->format('l, F j, Y');
    }

    public function render()
    {
        return view('livewire.clock');
    }
}
