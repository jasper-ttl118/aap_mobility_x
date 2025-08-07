<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;
use App\Models\Department;
use App\Models\Romutest;

new class extends Component {
    #[Rule('required')]
    public string $department_name;

    public function store()
    {
        $data = $this->validate();
        Department::create($data);

        $this->dispatch('stored');
        $this->reset();
    }
}; ?>

<div>
    <button class="btn btn-primary" x-on:click="create_modal = true">Add Department</button>
    <dialog id="my_modal_1" class="modal">
        <div class="modal-box">      
            <form method="dialog" wire:submit.prevent="store">
                <label class="floating-label">
                    <input wire:model="department_name" type="text" placeholder="Department Name" class="input input-md" />
                    <span>Department Name</span>
                </label>
                <div class="modal-action">
                    <button class="btn">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>   
                </div>
            </form>
        </div>
    {{-- </dialog> --}}
</div>
