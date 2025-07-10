<?php

namespace App\Livewire\Ams\Asset;

use App\Models\Asset;
use Livewire\Component;
use Livewire\WithPagination;

class AssetList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    //filters
    public $category = '';
    public $status = '';
    public $condition = '';
    public $department = '';

    protected $listeners = ['apply-filters' => 'applyFilters'];

    public function viewAsset($asset_id)
    {
        $this->dispatch('view-asset', id: $asset_id)->to('ams.asset.view-asset-modal');
    }

    #[On('apply-filters')]
    public function applyFilters($filters)
    {
        $this->category = $filters['category'];
        $this->status = $filters['status'];
        $this->condition = $filters['condition'];
        $this->department = $filters['department'];
        
    }


    public function render()
    {
        $assets = Asset::with(['employee', 'category', 'status', 'condition', 'department'])
            ->where('ams_active', 1)
            ->when($this->category, fn($q) => $q->where('category_id', $this->category))
            ->when($this->status, fn($q) => $q->where('status_id', $this->status))
            ->when($this->condition, fn($q) => $q->where('condition_id', $this->condition))
            ->when($this->department, fn($q) => $q->where('department_id', $this->department))
            ->orderBy('asset_id')
            ->paginate(4);

        return view('livewire.ams.asset.asset-list', compact('assets'));
    }
}
