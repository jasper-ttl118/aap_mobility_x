<?php

namespace App\Livewire\Ams\Asset;

use Livewire\Component;
use App\Models\Asset;

class AvailableAssetsList extends Component
{
    public function render()
    {
        $availableAssets = Asset::with(['employee', 'category', 'status', 'condition', 'department', 'brand'])
            ->where('ams_active', 1)
            ->whereHas('status', fn($q) => $q->where('status_name', 'AVAILABLE'))
            ->orderBy('property_code')
            ->paginate(10);

        return view('livewire.ams.asset.available-assets-list', compact('availableAssets'));
    }
}
