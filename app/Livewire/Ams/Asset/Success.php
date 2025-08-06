<?php

namespace App\Livewire\Ams\Asset;

use Livewire\Component;

class Success extends Component
{
    public $show = false;

    protected $listeners = ['show-success-modal' => 'openModal'];

    public function openModal()
    {
        $this->show = true;
    }

    public function addAnother()
    {
        // do something
        $this->show = false;
    }

    public function done()
    {
        // redirect or clear
        return redirect('/ams/all-assets');
    }

    public function render()
    {
        return view('livewire.ams.asset.success');
    }
}
