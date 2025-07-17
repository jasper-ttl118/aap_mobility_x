<?php

namespace App\Livewire\Ams\Asset;

use Livewire\Component;

class AddAssetSummary extends Component
{
    public $assets = [];
    public $selected = null;

    protected $listeners = ['add-asset-to-queue' => 'addAssetToQueue', 'clearQueue'];


   
    public function addAssetToQueue($payload)
    {
        $this->assets[] = $payload;
    }

    public function clearQueue()
    {
        $this->assets = [];
    }

    public function submitAll()
    {
        // You can insert into DB here or dispatch a job
        foreach ($this->assets as $asset) {
            // Asset::create($asset); // or call a service
        }

        $this->assets = [];
        session()->flash('success', 'Assets stored successfully.');
    }

    public function render()
    {
        return view('livewire.ams.asset.add-asset-summary');
    }
}

