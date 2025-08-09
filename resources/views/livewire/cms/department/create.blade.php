<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;
use App\Models\Department;
use App\Models\Romutest;

new class extends Component {
    #[Rule('required')]
    public string $department_name;

    public $showCreateModal = false;

    public function store()
    {
        $data = $this->validate();
        Department::create($data);

        $this->dispatch('stored');
        $this->reset();
    }
}; ?>

<div>
    <button x-on:click="$wire.showCreateModal = true" class="btn btn-primary">
        Add Department
    </button>

    <x-modal-box wire:show="showCreateModal">
       <form wire:submit="store">
            <fieldset class="fieldset">
                <label class="label text-black">Department Name</label>
                <input wire:model="department_name" type="text" class="input input-primary bg-white" placeholder="Enter Department Name" />
                <button x-on:click="$wire.showCreateModal = false" class="btn btn-outline btn-secondary">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </fieldset>
        </form>
    </x-modal-box>
</div>
