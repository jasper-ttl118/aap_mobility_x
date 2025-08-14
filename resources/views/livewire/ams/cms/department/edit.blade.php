<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;
use App\Models\Department;

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
    <form wire:submit="store">
        <input wire:model="department_name">
        <button type="submit">Submit</button>
    </form>
</div>
