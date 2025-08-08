<?php

use Livewire\WithPagination;
use Livewire\Volt\Component;
use App\Models\Department;
use Livewire\Attributes\On;

new class extends Component {
    use WithPagination;

    #[On('refresh-list')]
    public function refreshList()
    {
        $this->dispatch('$refresh')->self();
    }

    public function with(): array
    {
        return [
            'departments' => Department::latest()->paginate(10),
        ];
    }
}; ?>

<div>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr :wire:key="'$department->id'">
                        <td>{{ $department->department_name }}</td>
                        <td class="w-[12.5%] py-4">
                            <div class="flex flex-row justify-center items-center gap-2">
                                <button @click="$dispatch('show-edit-modal', { id: {{ $department->department_id }}})" class="btn btn-ghost text-blue-800">
                                    <x-icon.edit />
                                </button>
                                <button @click="$dispatch('show-delete-toast', { id: {{ $department->department_id }}})" class="btn btn-ghost text-red-700">
                                    <x-icon.delete />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $departments->links(data: ['scrollTo' => false]) }}
</div>
