<?php

namespace App\Livewire\Crm\Corporate;
use App\Models\Customer;
use Livewire\Component;

class AgentTable extends Component
{
    public function render()
    {
        $corporates = Customer::paginate(perPage: 5);
        return view('livewire.crm.corporate.agent-table', ['corporates' => $corporates]);
    }
}
