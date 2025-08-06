<?php

namespace App\Livewire\Ams\Asset;

use Livewire\Component;

class TransferSuccess extends Component
{
    public $show = false;

    protected $listeners = ['show-transfer-success-modal' => 'openModal'];

    public function openModal()
    {
        $this->show = true;
    }
    public function closeSuccess(){
        return redirect()->to('/ams/common-assets');
    }
    public function render()
    {
        return view('livewire.ams.asset.transfer-success');
    }
}
