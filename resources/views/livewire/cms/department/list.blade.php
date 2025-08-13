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

    public function paginationView()
    {
        return 'custom-pagination-links';
    }

    public function with(): array
    {
        return [
            'departments' => Department::latest()->paginate(6),
        ];
    }
}; ?>

<div>
    <div class="overflow-x-auto mt-1 mb-3">
        <table class="table table-fixed">
            <thead class="bg-gray-100 text-sm text-gray-700 uppercase">
                <tr>
                    <th class="w-32 p-1 m-0 text-center">Code</th>
                    <th class="p-1 m-0 text-center">Name</th>
                    <th class="w-32 p-1 m-0 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr :wire:key="'$department->id'" class="p-0 m-0 text-sm">
                        <td class="p-1 m-0 text-center">{{ $department->department_code }}</td>
                        <td class="p-1 m-0 text-center">{{ $department->department_name }}</td>
                        <td class="p-1 m-0">
                            <div class="flex flex-row justify-center items-center">
                                <button @click="$dispatch('show-edit-modal', { id: {{ $department->department_id }}})" class="btn btn-ghost text-blue-800 px-2 py-0.5">
                                    <x-icon.edit />
                                </button>
                                <button @click="$dispatch('show-delete-toast', { id: {{ $department->department_id }}})" class="btn btn-ghost text-red-700 px-2 py-0.5">
                                    <x-icon.delete />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $departments->links(data: ['scrollTo' => false, ]) }}
    </div>
</div>
