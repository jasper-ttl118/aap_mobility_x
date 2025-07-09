<?php

namespace App\Livewire\Ams\Asset;

use App\Models\Asset;
use Livewire\Component;
use Livewire\WithPagination;

class AssetList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function viewAsset($asset_id)
    {
        $this->dispatch('view-asset', id: $asset_id)->to('ams.asset.view-asset-modal');
    }

    public function render()
    {
        $assets = Asset::with(['employee', 'category', 'status'])
            ->where('ams_active', 1)
            ->orderBy('property_code')
            ->paginate(4);

        return view('livewire.ams.asset.asset-list', compact('assets'));
    }
}
