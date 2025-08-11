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

    #[Rule('nullable')]
    public $department_code;

    #[On('show-edit-modal')]
    public function showEditModal($id)
    {
        $this->department = Department::findOrFail($id);
        $this->fill($this->department);
        $this->js('showEditModal');
    }

    public function update()
    {
        $data = $this->validate();
        $this->department->update($data);

        $this->js('closeEditModal');
        $this->reset();
        $this->dispatch('refresh-list');
    }
}; ?>

<div>
    <x-modal-box name="EditModal">
        <form wire:submit="update">
            <div class="flex flex-col gap-3">
                <div class="text-blue-900 font-semibold text-lg">
                    Edit Department
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
                    <button type="button" x-on:click="$js.closeEditModal" class="btn btn-outline btn-secondary text-gray-700 hover:text-white btn-sm">
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
