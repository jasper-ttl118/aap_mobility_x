<?php

namespace App\Livewire\Ams\Asset;

use App\Models\Asset;
use Livewire\Component;
use Livewire\WithPagination;

class AssetList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    
    public function render()
    {
        $assets = Asset::with(['employee', 'category', 'status'])
            ->where('ams_active', 1)
            ->orderBy('property_code')
            ->paginate(4);
            
        return view('livewire.ams.asset.asset-list',compact('assets'));
    }
}
