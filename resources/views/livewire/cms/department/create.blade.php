<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;
use App\Models\Department;

new class extends Component {
    #[Rule('required')]
    public $department_name;

    public $showCreateModal = false;

    public $showCreateModal = false;

    public function store()
    {
        $data = $this->validate();
        Department::create($data);

        $this->dispatch('refresh-list');
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
                <label class="label text-black">
                    Department Name
                </label>
                <input wire:model="department_name" class="input input-primary bg-white" />
                <button type="button" x-on:click="$wire.showCreateModal = false" class="btn btn-secondary">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </fieldset>
        </form>
    </x-modal-box>
</div>
