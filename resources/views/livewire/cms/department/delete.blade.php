<?php

use Livewire\Volt\Component;
use App\Models\Department;
use Livewire\Attributes\On;
use App\Helpers\Toast;

new class extends Component {
    #[On('show-delete-toast')]
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        $this->dispatch('refresh-list');
        Toast::show();
    }
}; ?>

<div>
    <livewire:components.progress />
    <x-toast>
        <div class="toast" >
            <div class="alert alert-info flex flex-col">
                <span>Department Deleted</span>
                <x-progress> </x-progress>
            </div>
        </div>
    </x-toast>
    
</div>
