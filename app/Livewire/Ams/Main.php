<?php

namespace App\Livewire\Ams;

use Livewire\Component;

class Main extends Component
{
    public $tab = 'assets';
     public $viewMode = 'list';

    protected $listeners = ['tabChanged' => 'setTab'];

    public function setTab($tab)
    {
        $this->tab = $tab;
    }
    public function render()
    {
        
        return view('livewire.ams.main');
    }
}
