<?php
// app/Http/Livewire/LiveClock.php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class LiveClock extends Component
{
    public $currentTime;
    public $currentDate;

    public function mount()
    {
        dump("mount");
        $this->updateTime();
    }

    public function updateTime()
    {
        $now = Carbon::now();
        $this->currentTime = $now->format('h:i:s A');
        $this->currentDate = $now->format('l, F j, Y');
    }

    public function render()
    {
        dump("test");
        return view('livewire.live-clock');
    }
}