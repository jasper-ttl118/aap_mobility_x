<?php

namespace App\Livewire\Ams\Asset;

use Livewire\Component;

class Clear extends Component
{
    public $show = false;

    protected $listeners = ['open-clear' => 'showModal'];

    public function showModal()
    {
        $this->show = true;
    }

    public function clear()
    {
        $this->dispatch('clearQueue');
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.ams.asset.clear');
    }
}

