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
    public $search = '';


    protected $listeners = ['apply-filters' => 'applyFilters','search-assets'=> 'updateSearch'];

    

    #[On('apply-filters')]
    public function applyFilters($filters)
    {
        $this->category = $filters['category'];
        $this->status = $filters['status'];
        $this->condition = $filters['condition'];
        $this->department = $filters['department'];

    }
    #[On('search-assets')]
    public function updateSearch($value)
    {
        $this->search = $value;
    }

    public function render()
{
    $assets = Asset::with(['employee', 'category', 'status', 'condition', 'department', 'brand'])
        ->where('ams_active', 1)
        ->when($this->category, fn($q) => $q->where('category_id', $this->category))
        ->when($this->status, fn($q) => $q->where('status_id', $this->status))
        ->when($this->condition, fn($q) => $q->where('condition_id', $this->condition))
        ->when($this->department, fn($q) => $q->where('department_id', $this->department))
        ->when($this->search, function ($query) {
            $query->where(function ($q) {
                $q->where('asset_name', 'like', '%' . $this->search . '%')
                  ->orWhere('model_name', 'like', '%' . $this->search . '%')
                  // brand_name_custom for non-IT
                  ->orWhere('brand_name_custom', 'like', '%' . $this->search . '%')
                  // brand_id relationship for IT
                  ->orWhereHas('brand', function ($brandQuery) {
                      $brandQuery->where('brand_name', 'like', '%' . $this->search . '%');
                  });
            });
        })
        ->orderBy('property_code')
        ->paginate(4);

    return view('livewire.ams.asset.asset-list', compact('assets'));
}

}
