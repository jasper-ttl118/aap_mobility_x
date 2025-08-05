<?php

namespace App\Livewire\Toast;

use Livewire\Component;

class Toast extends Component
{
    public $open;
    public function mount()
    {
        if (session()->has('toast')) {
            $this->open = true;
        }else{
            // dump('not displaying');
        }
    }
    public function render()
    {
        if($this->open){
            $toast = session('toast');
            // dump($toast);
            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => $toast['message'],
            ]);
        }
        return view('livewire.toast.toast');
    }
}
