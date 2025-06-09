<?php

namespace App\Livewire\Crm\Corporate;
use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class AgentTable extends Component
{
    use WithPagination;
    protected $listeners = ['viewAgentProfile'];
    public $reset_url = true;
    
    public function viewAgentProfile($agent_id)
    {
        dump($agent_id);
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
        return view('livewire.crm.corporate.agent-table', ['corporates' => $corporates]);
    }
}
