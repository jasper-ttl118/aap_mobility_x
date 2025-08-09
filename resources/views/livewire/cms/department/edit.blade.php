<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use App\Models\Department;

new class extends Component {
    public $department;

    public $department_id;
    #[Rule('required')]
    public $department_name;

    public $showEditModal = false;

    #[On('show-edit-modal')]
    public function showEditModal($id)
    {
        $this->department = Department::findOrFail($id);
        $this->fill($this->department);
        $this->showEditModal = true;
    }

    public function update()
    {
        $data = $this->validate();
        $this->department->update($data);

        $this->dispatch('refresh-list');
        $this->reset();
    }
}; ?>

<div>
    <x-modal-box wire:show="showEditModal">
        <form wire:submit="update">
            <fieldset class="fieldset">
                <legend class="legend">
                    Edit Department
                </legend>
                <label class="label text-black">
                    Department Name
                </label>
                <input wire:model="department_name" class="input input-primary bg-white" />
                <button type="button" x-on:click="$wire.showEditModal = false" class="btn btn-secondary">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </fieldset>
        </form>
    </x-modal-box>
</div>
