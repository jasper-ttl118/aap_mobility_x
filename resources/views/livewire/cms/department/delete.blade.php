<?php

use Livewire\Volt\Component;
use App\Models\Department;
use Livewire\Attributes\On;

new class extends Component {
    public $id;

    #[On('show-delete-toast')]
    public function destroy($id)
    {
        $this->id = $id;
        $department = Department::findOrFail($id);
        $department->delete();

        $this->dispatch('refresh-list');
        $this->dispatch('showDeleteToast');
    }

    #[On('restore')]
    public function restore()
    {
        $department = Department::withTrashed()->findOrFail($this->id);
        $department->restore();
        $this->dispatch('refresh-list');
    }
}; ?>

<div>
    <livewire:components.toast.delete />
</div>
