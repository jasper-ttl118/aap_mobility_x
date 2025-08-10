<?php

use Livewire\Volt\Component;
use App\Models\Department;
use Livewire\Attributes\On;
use App\Helpers\Toast;

new class extends Component {
    public $id;

    #[On('show-delete-toast')]
    public function destroy($id)
    {
        $this->id = $id;
        $department = Department::findOrFail($id);
        $department->delete();

        $this->dispatch('refresh-list');
        $this->js('showToast');
    }

    public function restore()
    {
        $department = Department::withTrashed()->findOrFail($this->id);
        $department->restore();

        $this->js('closeToast');
        $this->dispatch('refresh-list');
    }
}; ?>

<div>
    <x-toast delay="3000" class="flex items-center text-red-800">
        <div class="flex justify-center items-center p-0.5 gap-2">
            <x-icon.exclamation-triangle class=" size-7" />
            <div>Item deleted successfully.</div>
        </div>
        <button wire:click="restore" class="btn btn-ghost btn-sm p-0.5 mr-2 ml-6 text-md">Undo</button>
    </x-toast>
</div>
