<div class="w-full lg:w-4/12 mt-8 lg:-mt-3.5 lg:ml-6">
    <div class="sticky -top-6">
        <div class="bg-white rounded-xl shadow-xl border border-transparent p-5">

            <!-- Header -->
            <div class="flex justify-between items-center mb-5">
                <div class="flex items-center gap-3">
                    <div class="bg-blue-100 p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-7 text-blue-900">
                            <path fill-rule="evenodd"
                                d="M9 1.5H5.625c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5Zm6.61 10.936a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 14.47a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd" />
                            <path
                                d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-blue-900">Asset Summary</h2>
                        <p class="text-xs text-gray-500">Review and finalize assets</p>
                    </div>
                </div>
            </div>

            <!-- Total Count -->
            <div class="text-xs font-semibold text-gray-700 mb-5">
                Total Assets: {{ count($assets) }}
            </div>

            <!-- Accordion List -->
            @foreach ($assets as $index => $asset)
            <div class="border rounded-md shadow bg-white">
                <!-- Header -->
                <button wire:click="$set('selected', {{ $selected === $index ? 'null' : $index }})"
                    class="w-full flex justify-between items-center px-4 py-2 text-left">
                    <span class="font-semibold text-blue-900 text-sm">{{ $asset['name'] }}</span>
                    <svg @class([ 'w-4 h-4 transition-transform duration-300' , 'rotate-180'=> $selected === $index
                        ]) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Details -->
                @if ($selected === $index)
                <div class="px-4 pb-3 pt-2 text-xs text-gray-700 space-y-1 overflow-hidden">
                    <div class="flex justify-between"><strong>Asset Name:</strong> <span class="ml-4">{{ $asset['name']
                            }}</span></div>
                    <div class="flex justify-between"><strong>Brand:</strong> <span class="ml-4">{{ $asset['brand']
                            }}</span></div>
                    <div class="flex justify-between"><strong>Model:</strong> <span class="ml-4">{{ $asset['model']
                            }}</span></div>
                    <div class="flex justify-between"><strong>Category:</strong> <span class="ml-1 text-right truncate max-w-[90%]" 
                    title="{{ $asset['category'] }}">{{ $asset['category'] }}</span></div>
                    <div class="flex justify-between"><strong>Status:</strong> <span class="ml-4">{{ $asset['status']
                            }}</span></div>
                    <div class="flex justify-between"><strong>Condition:</strong> <span class="ml-4">{{
                            $asset['condition'] }}</span></div>
                    <div class="flex justify-between"><strong>Purchase Date:</strong> <span class="ml-4">{{
                            $asset['purchase_date'] }}</span></div>
                    <div class="flex justify-between"><strong>Warranty Expiry:</strong> <span class="ml-4">{{
                            $asset['warranty_expiry'] }}</span></div>
                    <div class="flex justify-between"><strong>Warranty (Years):</strong> <span class="ml-4">{{
                            $asset['warranty_years'] }}</span></div>
                    <div class="flex justify-between"><strong>FreeReplacement Period:</strong> <span class="ml-4">{{
                            $asset['replacement_period'] }}</span></div>
                    <div class="flex justify-between"><strong>Free Replacement Unit:</strong> <span class="ml-4">{{
                            $asset['replacement_unit'] }}</span></div>
                    <div class="flex justify-between"><strong>Assignment Type:</strong> <span class="ml-4">{{
                            $asset['assignment_type'] }}</span></div>
                    <div class="flex justify-between"><strong>Assigned To:</strong> <span class="ml-4">{{
                            $asset['assigned_to'] }}</span></div>
                    <div class="flex justify-between"><strong>Date Assigned:</strong> <span class="ml-4">{{
                            $asset['date_assigned'] }}</span></div>
                    <div class="flex justify-between"><strong>Device Serial #:</strong> <span class="ml-4">{{
                            $asset['device_serial'] }}</span></div>
                    <div class="flex justify-between"><strong>Charger Serial #:</strong> <span class="ml-4">{{
                            $asset['charger_serial'] }}</span></div>
                    <div class="flex justify-between"><strong>Description:</strong> <span
                            class="ml-4 text-right truncate max-w-[60%]">{{ $asset['description'] }}</span></div>
                </div>
                @endif
            </div>
            @endforeach

            <!-- Action Buttons -->
            <div class="flex flex-col gap-2 pt-2 mt-5">
                <button wire:click="clearQueue"
                    class="w-full bg-red-100 text-red-600 hover:bg-red-200 text-sm font-medium py-2 rounded-md">
                    Clear Queue
                </button>
                <button wire:click="submitAll"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 rounded-md">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>