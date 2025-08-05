<?php

namespace App\Livewire\Ams;

use Livewire\Component;

class NavigationBar extends Component
{
    public $tab = ''; // Passed in from MainView

    public function setTab($tab)
    {
        // dd($tab);
        $this->tab = $tab;
        $this->dispatch('tabChanged', $tab);
    }

    public function render()
    {
        return view('livewire.ams.navigation-bar');
    }
}
