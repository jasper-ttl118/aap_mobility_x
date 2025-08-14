<?php

use Livewire\Volt\Component;

new class extends Component {
    public $toast = null;
    protected $listeners = ['showToast'];

    public function showToast($message, $type = 'success', $duration = 10000)
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
}; ?>

<div class="fixed top-4 right-4 space-y-4 z-50">
    @if ($toast)
        <div
            class="fixed top-4 right-4 z-50 w-64"
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
                }
            }"
            x-init="start()"
            x-show="show"
            x-transition.opacity.duration.300ms
            wire:key="{{ $toast['id'] }}"
        >
            
        </div>
    @endif
</div>


<button @click="reset()" class="ml-2 text-white font-bold">&times;</button>


{{-- Progress Bar --}}
                <div class="h-1 mt-2 bg-white bg-opacity-30 rounded overflow-hidden">
                    <div
                        class="h-full bg-white transition-all duration-50"
                        :style="`width: ${progress}%;`"
                    ></div>
                </div>