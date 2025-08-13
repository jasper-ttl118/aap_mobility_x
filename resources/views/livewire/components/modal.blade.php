<?php

use Livewire\Volt\Component;

new class extends Component {
    public $showModal = true;
}; ?>

<div wire:show="showModal" x-transition.duration.500ms>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <!-- Modal Container -->
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg mx-4">
            
            <!-- Header -->
            <div class="px-6 py-4 border-b flex justify-between items-center">
            <h2 class="text-lg font-semibold">Modal Title</h2>
            <button x-on:click="$wire.showModal = false" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
            </div>
            
            <!-- Body -->
            <div class="px-6 py-4">
            <p>Your modal content goes here.</p>
            </div>
            
            <!-- Footer -->
            <div class="px-6 py-4 border-t flex justify-end space-x-2">
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancel</button>
            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
            </div>

        </div>
    </div>
</div>
