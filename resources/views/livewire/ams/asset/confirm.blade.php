<div 
    x-data 
    x-cloak 
    x-show="$wire.show" 
    x-transition.opacity 
    class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center"
    style="display: none;"
>

    <div @click.away="$wire.set('show', false)"
        class="bg-white rounded-xl shadow-xl p-6 w-full max-w-md text-center space-y-4 mx-4">

        <!-- Header Icon -->
        <div class="flex items-center justify-center">
            <div class="bg-blue-200 rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-package-check-icon lucide-package-check text-blue-700 size-10">
                    <path d="m16 16 2 2 4-4" />
                    <path
                        d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
                    <path d="m7.5 4.27 9 5.15" />
                    <polyline points="3.29 7 12 12 20.71 7" />
                    <line x1="12" x2="12" y1="22" y2="12" />
                </svg>
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-lg font-semibold text-gray-800">Confirm Submit Assets</h2>

        <!-- Description -->
        <p class="text-sm text-gray-600">Are you sure you want to submit all checked assets?</p>

        <!-- Buttons -->
        <div class="flex gap-3 mt-4">
            <!-- Cancel Button -->
            <button wire:click="$set('show', false)"
                class="flex-1 flex items-center justify-center px-4 py-2 text-sm font-medium rounded-md border border-gray-300 text-gray-800 hover:bg-gray-100">
                Cancel
            </button>

            <!-- Submit Button with Icon -->
            <button wire:click="submit" showSubmitModal = false
                class="flex-1 flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium rounded-md bg-blue-600 text-white hover:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-check-icon lucide-check size-5">
                    <path d="M20 6 9 17l-5-5" />
                </svg>
                Submit
            </button>
        </div>
    </div>
</div>



