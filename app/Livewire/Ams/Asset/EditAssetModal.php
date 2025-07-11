<?php

namespace App\Livewire\Ams\Asset;

use App\Models\Asset;
use Livewire\Component;

class EditAssetModal extends Component
{
    public $asset;
    public $showModal = false;
    public $section = 'info';

    protected $listeners = ['open-edit-asset-modal' => 'loadSection'];

    #[On('open-edit-asset-modal')]
    public function loadSection($payload)
    {
        
        $this->asset = Asset::with(['category', 'status', 'condition', 'department'])
            ->findOrFail($payload['assetId']);
        $this->section = $payload['section'] ?? 'info';
        $this->showModal = true;
    }



    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.ams.asset.edit-asset-modal');
    }
}

