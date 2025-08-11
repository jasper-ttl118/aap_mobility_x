<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;
use App\Models\Department;

new class extends Component {
    #[Rule('required')]
    public $department_name;

    #[Rule('nullable')]
    public $department_code;

    public function store()
    {
        $data = $this->validate();
        Department::create($data);

        $this->js('closeCreateModal');
        $this->reset();
        $this->dispatch('refresh-list');
    }
}; ?>


<div>
    <button x-on:click="$js.showCreateModal" class="btn btn-primary">
        Add Department
    </button>

    <x-modal-box name="CreateModal">
        <form wire:submit="store">
            <div class="flex flex-col gap-3">
                <div class="text-blue-900 font-semibold text-lg">
                    Add Department
                </div>
                {{-- Input Fields --}}
                <label class="floating-label">
                    <input wire:model="department_code" placeholder="Enter Department Code" class="input input-sm w-96 placeholder:italic" />
                    <span>Department Code</span>
                </label>
                <label class="floating-label">
                    <input wire:model="department_name" placeholder="Enter Department Name" class="input input-sm w-96 placeholder:italic" />
                    <span>Department Name</span>
                </label>

                {{-- Action Buttons --}}
                <div class="flex justify-end gap-2 mt-2">
                    <button type="button" x-on:click="$js.closeCreateModal" class="btn btn-outline btn-secondary text-gray-700 hover:text-white btn-sm">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </x-modal-box>
</div>
