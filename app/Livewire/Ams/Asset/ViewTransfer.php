<?php

namespace App\Livewire\Ams\Asset;

use Livewire\Component;
use App\Models\Asset;

class ViewTransfer extends Component
{
    public $open = false;
    public $asset;

    protected $listeners = [
        'open-transfer-view' => 'open',
        'close-transfer-view' => 'close',
    ];

    public function open(int $assetId): void
    {
        $this->asset = Asset::with(['category','status','condition','department','employee.department'])
            ->findOrFail($assetId);

        $this->open = true;
        $this->resetErrorBag();
    }

    public function close(): void
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.ams.asset.view-transfer');
    }
}
