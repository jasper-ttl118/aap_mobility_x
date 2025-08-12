<div x-data="{ show: @entangle('show') }" x-show="show" x-transition.opacity x-cloak
    class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 z-50">

    <div class="bg-white rounded-xl shadow-2xl max-w-sm w-full mx-4 relative overflow-hidden">
        <!-- Close button -->
        <button @click="show = false;"
            class="absolute top-5 right-5 p-1.5 text-gray-400 hover:text-gray-600 hover:bg-gray-50 rounded-full transition-all duration-200">
            <!-- Close Icon (Heroicon X-Mark) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Modal content -->
        <div class="px-8 py-10 text-center">
            <!-- Animated Success Icon -->
            <div class="mx-auto p-4 size-16 bg-green-100 rounded-full flex items-center justify-center">
                <div class="size-12 text-green-100 bg-green-500 p-2 rounded-full flex items-center justify-center shadow-inner">
                    <!-- CheckCircle Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-circle-check-big-icon lucide-circle-check-big">
                        <path d="M21.801 10A10 10 0 1 1 17 3.335" />
                        <path d="m9 11 3 3L22 4" />
                    </svg>
                </div>
            </div>


            <!-- Message -->
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Success!</h2>
            <p class="text-gray-500 mb-8 leading-relaxed">
                The asset has been succesfully added.
            </p>

            <!-- Buttons -->
            <div class="space-y-3 mt-1">
                <button wire:click="addAnother"
                    class="w-full h-11 inline-flex items-center justify-center px-6 py-4 bg-blue-800 text-white font-semibold rounded-xl hover:bg-blue-900 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add Another Asset
                </button>

                <button wire:click="done"
                    class="w-full h-11 px-6 bg-gray-200 text-gray-800 font-semibold rounded-xl hover:bg-gray-300 transition-all duration-200 inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 mr-2">
                        <path fill-rule="evenodd"
                            d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z"
                            clip-rule="evenodd" />
                    </svg>

                    Back to Asset List
                </button>

            </div>
        </div>
    </div>
</div>