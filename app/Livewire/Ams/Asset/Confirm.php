<?php

namespace App\Livewire\Ams\Asset;


use Livewire\Component;

class Confirm extends Component
{
    public $show = false;


    protected $listeners = ['open-confirm' => 'open'];

    public function open()
    {
        $this->show = true;
    }

    public function submit()
    {
        $this->dispatch('submitAll');
        $this->show = false;

    }

    public function render()
    {
        return view('livewire.ams.asset.confirm');
    }
}
