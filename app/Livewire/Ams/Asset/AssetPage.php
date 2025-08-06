<?php

namespace App\Livewire\Ams\Asset;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Asset;

class AssetPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    public $viewMode = 'list'; // 'list' or 'create'
    protected $listeners = ['viewModeChanged' => 'setViewMode'];

    public function setViewMode($mode)
    {
        $this->viewMode = $mode;
    }

    public function showCreateForm()
    {
        $this->viewMode = 'create';
    }
    public function returnToList()
    {
        $this->viewMode = 'list';
    }

    public function render()
    {
        // ✅ Define $assets BEFORE compact()
        $assets = Asset::with(['employee', 'category', 'status'])
            ->where('ams_active', 1)
            ->orderBy('property_code')
            ->paginate(4);

        return view('livewire.ams.asset.asset-page', compact('assets'));
    }
}
