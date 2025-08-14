<?php

use Livewire\Volt\Component;

new class extends Component {
    public $toast = null;
    protected $listeners = ['showToast'];

    public function showToast($message='Hello!', $type = 'success', $duration = 10000)
    {
        $this->toast = [
            'id' => uniqid(),
            'message' => $message,
            'type' => $type,
            'duration' => $duration,
        ];
    }

    public function clearToast()
    {
        $this->toast = null;
    }

    public function restore()
    {
        $this->dispatch('restore');
        $this->toast = null;
    }
}; ?>

<div>
    @if ($toast)
        <div
            x-data="{
                show: true,
                progress: 100,
                intervalId: null,
                startTime: null,
                duration: {{ $toast['duration'] }},

                start() {
                    if (this.intervalId) {
                        clearInterval(this.intervalId);
                    }

                    this.show = true;
                    this.progress = 100;
                    this.startTime = Date.now();

                    this.intervalId = setInterval(() => {
                        const elapsed = Date.now() - this.startTime;
                        this.progress = Math.max(0, 100 - ((elapsed / this.duration) * 100));

                        if (elapsed >= this.duration) {
                            clearInterval(this.intervalId);
                            this.show = false;
                            $wire.clearToast();
                        }
                    }, 50);
                },

                reset() {
                    clearInterval(this.intervalId);
                    this.show = false;
                    $wire.clearToast();
                },

                specialButtonPressed() {
                    $wire.restore();
                    this.show = false;
                    clearInterval(this.intervalId);
                }
            }"
            x-init="start()"
            x-show="show"
            x-transition.opacity.duration.300ms
            wire:key="{{ $toast['id'] }}"
            class="fixed bottom-4 right-8 z-50"
        >
            <div class="shadow-md">
                <div class="min-w-32 px-2 py-1 bg-red-100 rounded-t text-sm flex items-center text-red-800">
                    {{-- Slot --}}
                    <div class="flex justify-center items-center p-0.5 gap-2">
                        <x-icon.exclamation-triangle class="size-7" />
                        <div>Item deleted successfully.</div>
                    </div>
                    <button @click="specialButtonPressed()" class="btn btn-ghost btn-sm py-0.5 px-2 ml-6 text-md hover:bg-red-800 hover:text-white">Undo</button>
                    <div class="divider divider-horizontal mx-0"></div>
                    <button @click="reset()" class="btn btn-ghost btn-sm p-0.5 hover:bg-red-800 hover:text-white">
                        <x-icon.x-mark class="size-[1rem]" />
                    </button>
                </div>
                {{-- Progress Bar --}}
                <div class="h-1 bg-red-400 rounded-b overflow-hidden">
                    <div
                        class="h-full bg-red-800 transition-all duration-50"
                        :style="`width: ${progress}%;`"
                    ></div>
                </div>
            </div>
        </div>
    @endif
</div>




                