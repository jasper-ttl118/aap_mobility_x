<?php

namespace App\Livewire\Crm\Corporate;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithPagination;

class ResellerTable extends Component
{
    use WithPagination;
    public $reset_url = true;
    use WithPagination;
    public $reset_url = true;

    public function openProfileModal($reseller_id)
    public function openProfileModal($reseller_id)
    {
        $this->dispatch('viewResellerProfile', reseller_id: $reseller_id)
        ->to('crm.corporate.resellers-profile');
        $this->dispatch('viewResellerProfile', reseller_id: $reseller_id)
        ->to('crm.corporate.resellers-profile');
    }

    public function mount()
    {
        if($this->reset_url)
        {
            $this->reset_url = false;
            $this->resetPage();
        }
    }


    public function mount()
    {
        if($this->reset_url)
        {
            $this->reset_url = false;
            $this->resetPage();
        }
    }

    public function render()
    {
        $corporates = Customer::paginate(4);
        return view('livewire.crm.corporate.reseller-table', ['corporates' => $corporates]);
    }
}