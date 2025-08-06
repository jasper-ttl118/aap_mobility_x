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


    protected $listeners = ['apply-filters' => 'applyFilters', 'search-assets' => 'updateSearch'];



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
            $searchTerm = '%' . $this->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('asset_name', 'like', $searchTerm)
                  ->orWhere('model_name', 'like', $searchTerm)
                  ->orWhere('brand_name_custom', 'like', $searchTerm)
                  ->orWhereHas('brand', fn($b) => $b->where('brand_name', 'like', $searchTerm))
                  ->orWhereHas('category', fn($c) => $c->where('category_name', 'like', $searchTerm))
                  ->orWhereHas('status', fn($s) => $s->where('status_name', 'like', $searchTerm))
                  ->orWhereHas('condition', fn($cond) => $cond->where('condition_name', 'like', $searchTerm))
                  ->orWhereHas('employee', function ($emp) use ($searchTerm) {
                      $emp->where('employee_firstname', 'like', $searchTerm)
                          ->orWhere('employee_lastname', 'like', $searchTerm)
                          ->orWhereRaw("CONCAT(employee_lastname, ', ', employee_firstname) LIKE ?", [$searchTerm]);
                  })
                  ->orWhereHas('department', fn($d) => $d->where('department_name', 'like', $searchTerm));
            });
        })
        ->orderBy('property_code')
        ->paginate(8);

    return view('livewire.ams.asset.asset-list', compact('assets'));
}


}
