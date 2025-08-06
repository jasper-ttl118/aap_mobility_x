<div x-data="{ show: @entangle('show') }" x-show="show" x-transition.opacity x-cloak
    class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 z-50">

    <div class="bg-white rounded-xl shadow-2xl max-w-sm w-full mx-4 relative overflow-hidden">
        <!-- Close button -->
        <button @click="show = false; $wire.closeSuccess()"
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
                The asset has been succesfully transferred.
            </p>
        </div>
    </div>
</div>