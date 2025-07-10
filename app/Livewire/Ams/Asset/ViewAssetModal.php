<?php

namespace App\Livewire\Ams\Asset;

use App\Models\Asset;
use Livewire\Component;

class ViewAssetModal extends Component
{
    public $showModal = false;
    public $asset = null;

    protected $listeners = ["view-asset" => "showAssetModal"];

    public function showAssetModal($id)
    {
        $this->asset = Asset::with(['employee', 'department', 'category', 'status', 'condition'])->find($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->asset = null;
    }

    public function render()
    {
        return view('livewire.ams.asset.view-asset-modal');
    }
}

