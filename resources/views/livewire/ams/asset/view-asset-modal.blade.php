<div x-data="{ showQR: false }">
    @if ($showModal && $asset)
        <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center px-4">
            <div class="bg-white p-6 rounded-xl shadow-2xl w-full max-w-6xl relative overflow-y-auto max-h-[90vh]">

                <!-- Close Button -->
                <button wire:click="closeModal"
                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 transition text-xl">✕</button>

                <!-- Modal Header -->
                <h2 class="text-2xl font-bold text-blue-900 mb-4 border-b pb-2">Asset Information</h2>

                <!-- Grid Layout -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm text-gray-700">

                    <!-- Column 1 -->
                    <div class="space-y-3">
                        <div>
                            <h3 class="text-base font-semibold text-[#1D4ED8] mb-1">Basic Info</h3>
                            <div class="grid grid-cols-2 gap-1">
                                <div class="font-semibold">Asset Name:</div><div>{{ $asset->asset_name ?? 'NO DATA' }}</div>
                                <div class="font-semibold">Property Code:</div><div>{{ $asset->property_code ?? 'NO DATA' }}</div>
                                <div class="font-semibold">Brand:</div><div>{{ $asset->brand_name ?? 'NO DATA' }}</div>
                                <div class="font-semibold">Model:</div><div>{{ $asset->model_name ?? 'NO DATA' }}</div>
                                <div class="font-semibold">Category:</div><div>{{ $asset->category->category_name ?? 'NO DATA' }}</div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-base font-semibold text-[#1D4ED8] mb-1">Serial Numbers</h3>
                            <div class="grid grid-cols-2 gap-1">
                                <div class="font-semibold">Device SN:</div><div>{{ $asset->device_serial_number ?? 'NO DATA' }}</div>
                                <div class="font-semibold">Charger SN:</div><div>{{ $asset->charger_serial_number ?? 'NO DATA' }}</div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-base font-semibold text-[#1D4ED8] mb-1">Status & Condition</h3>
                            <div class="grid grid-cols-2 gap-1">
                                <div class="font-semibold">Status:</div><div>{{ $asset->status->status_name ?? 'NO DATA' }}</div>
                                <div class="font-semibold">Condition:</div><div>{{ $asset->condition->condition_name ?? 'NO DATA' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="space-y-3">
                        <div>
                            <h3 class="text-base font-semibold text-[#1D4ED8] mb-1">Assignment</h3>
                            <div class="grid grid-cols-2 gap-1">
                                <div class="font-semibold">Assigned To:</div>
                                <div>
                                    @if ($asset->asset_type === '2')
                                        {{ strtoupper($asset->employee->employee_lastname ?? 'NO DATA') }},
                                        {{ strtoupper($asset->employee->employee_firstname ?? '') }}
                                    @elseif ($asset->asset_type === '1')
                                        {{ strtoupper($asset->department->department_name ?? 'NO DATA') }}
                                    @else
                                        NO DATA
                                    @endif
                                </div>
                                <div class="font-semibold">Date Accountable:</div>
                                <div>{{ optional($asset->date_accountable)->format('F d, Y') ?? 'NO DATA' }}</div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-base font-semibold text-[#1D4ED8] mb-1">Warranty</h3>
                            <div class="grid grid-cols-2 gap-1">
                                <div class="font-semibold">Purchase Date:</div><div>{{ optional($asset->purchase_date)->format('F d, Y') ?? 'NO DATA' }}</div>
                                <div class="font-semibold">Warranty Exp:</div><div>{{ optional($asset->warranty_exp_date)->format('F d, Y') ?? 'NO DATA' }}</div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-base font-semibold text-[#1D4ED8] mb-1">Maintenance</h3>
                            <div class="grid grid-cols-2 gap-1">
                                <div class="font-semibold">Maint. Schedule:</div><div>{{ optional($asset->maint_sched)->format('F d, Y') ?? 'NO DATA' }}</div>
                                <div class="font-semibold">Last Maint.:</div><div>{{ optional($asset->last_maint_sched)->format('F d, Y') ?? 'NO DATA' }}</div>
                                <div class="font-semibold">Service Provider:</div><div>{{ $asset->service_provider ?? 'NO DATA' }}</div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-base font-semibold text-[#1D4ED8] mb-1">Check-In / Out</h3>
                            <div class="grid grid-cols-2 gap-1">
                                <div class="font-semibold">Check-Out Status:</div><div>{{ $asset->check_out_status ?? 'NO DATA' }}</div>
                                <div class="font-semibold">Check-Out Date:</div><div>{{ optional($asset->check_out_date)->format('F d, Y') ?? 'NO DATA' }}</div>
                                <div class="font-semibold">Check-In Date:</div><div>{{ optional($asset->check_in_date)->format('F d, Y') ?? 'NO DATA' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Column 3 -->
                    <div class="space-y-3 flex flex-col justify-between">
                        <div>
                            <h3 class="text-base font-semibold text-[#1D4ED8] mb-1">QR Code</h3>
                            <button @click="showQR = true"
                                class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded shadow text-sm">
                                View QR
                            </button>
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-[#1D4ED8] mb-1">Description</h3>
                            <p class="text-justify text-gray-700 text-sm">{{ $asset->description ?? 'NO DATA' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- QR Modal -->
        <div x-show="showQR" x-cloak class="fixed inset-0 bg-black bg-opacity-75 z-50 flex items-center justify-center">
            <div class="relative">
                <button @click="showQR = false" class="absolute -top-6 -right-6 text-white text-3xl font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-6" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 011.06 1.06L13.06 12l5.47 5.47a.75.75 0 01-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                @if ($asset->qr_code_path)
                    <img src="{{ Storage::url($asset->qr_code_path) }}" alt="QR Code"
                        class="w-[400px] h-[400px] object-contain rounded-lg shadow-xl border-2 border-white">
                @else
                    <div class="text-white text-lg">No QR Code Available</div>
                @endif
            </div>
        </div>
    @endif
</div>
