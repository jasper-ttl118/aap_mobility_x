<div>
    <a wire:click="display"
        class="flex items-center gap-2 rounded-md bg-[#5556AB] px-4 py-2 text-sm font-medium text-white transition-colors cursor-pointer hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
        Birthday Reminder
    </a>

    @if ($show)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-6">
                <!-- Modal Header -->
                {{-- <div class="flex justify-between items-center border-b pb-3">
                    <h2 class="text-xl font-semibold text-blue-900">Birthday Reminder</h2>
                    <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600" wire:click="close">
                        &#10005;
                    </button>
                </div> --}}

                <!-- Modal Body -->
                <div class="text-gray-700 p-4 space-y-4">
                    <!-- Employee Name -->
                    <div>
                        <h2 class="text-xl font-semibold text-blue-900 ">Birthday Reminder</h2>
                        <p class="mt-1">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                    </div>

                    {{-- Filter dropdown --}}
                    <livewire:customer.birthday-filter>

                    <div class="flex justify-end mt-0">
                        <button class="p-2 m-2 bg-[#5556AB] text-white font-semibold text-sm rounded-md">Send to All Via SMS</button>
                        <button class="p-2 m-2 bg-[#E3D400] text-[#0003BD] font-semibold text-sm rounded-md">Send to All Via Email</button>
                    </div>

                    {{-- Customer Records --}}
                    <div>
                        <livewire:customer.birthday-table>
                    </div>

                </div>

                <div class="flex justify-end gap-2 border-t pt-3">       
                    <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300" wire:click="close">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
