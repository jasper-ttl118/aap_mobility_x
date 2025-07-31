<div class="w-full lg:w-4/12 mt-8 lg:-mt-3.5 lg:ml-6">
    <div class="sticky -top-6">
        <div class="bg-white rounded-xl shadow-xl border border-transparent p-5">

            <!-- Header -->
            <div class="flex justify-between items-center mb-5">
                <div class="flex items-center gap-3">
                    <div class="bg-blue-100 border border-blue-200 p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-list-checks-icon lucide-list-checks text-blue-700 size-8">
                            <path d="m3 17 2 2 4-4" />
                            <path d="m3 7 2 2 4-4" />
                            <path d="M13 6h8" />
                            <path d="M13 12h8" />
                            <path d="M13 18h8" />
                        </svg>


                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-blue-900">Asset Summary</h2>
                        <p class="text-xs text-gray-500">Review and finalize assets</p>
                    </div>
                </div>
            </div>

            @if (!empty($assets))
            <!-- Total Count -->
            <div class="text-xs font-semibold text-gray-700 mb-5">
                Checked Assets: {{ count($checked) }} of {{ count($assets) }}
            </div>
            @endif

            @if (empty($assets))
            <div x-data="{
                icons: [$refs.icon1, $refs.icon2, $refs.icon3, $refs.icon4, $refs.icon5],
                current: 0,
                rotate() {
                    this.icons.forEach((el, i) => el.classList.toggle('hidden', i !== this.current));
                    this.current = (this.current + 1) % this.icons.length;
                },
                init() {
                    this.rotate(); // show first
                    setInterval(() => this.rotate(), 1500);
                }
            }" x-init="init"
                class="flex flex-col items-center justify-center bg-[#FAFBFF] border border-[#D6DDF4] rounded-xl py-6 px-6 text-center shadow-sm select-none">

                <!-- Rotating SVG Icons -->
                <div class="relative w-12 h-12 mb-4 text-[#A6B5E0]">
                    <svg x-ref="icon1" class="absolute inset-0 w-12 h-12 hidden" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M18 5a2 2 0 0 1 2 2v8.526a2 2 0 0 0 .212.897l1.068 2.127a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45l1.068-2.127A2 2 0 0 0 4 15.526V7a2 2 0 0 1 2-2z" />
                        <path d="M20.054 15.987H3.946" />
                    </svg>

                    <svg x-ref="icon2" class="absolute inset-0 w-12 h-12 hidden" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 9V6a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3" />
                        <path
                            d="M3 16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V11a2 2 0 0 0-4 0z" />
                        <path d="M5 18v2" />
                        <path d="M19 18v2" />
                    </svg>


                    <svg x-ref="icon3" class="absolute inset-0 w-12 h-12 hidden" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2" />
                        <circle cx="7" cy="17" r="2" />
                        <path d="M9 17h6" />
                        <circle cx="17" cy="17" r="2" />
                    </svg>




                    <svg x-ref="icon4" class="absolute inset-0 w-12 h-12 hidden" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10 18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a3 3 0 0 1-3-3 1 1 0 0 1 1-1z" />
                        <path
                            d="M13 10H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1l-.81 3.242a1 1 0 0 1-.97.758H8" />
                        <path d="M14 4h3a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-3" />
                        <path d="M18 6h4" />
                        <path d="m5 10-2 8" />
                        <path d="m7 18 2-8" />
                    </svg>


                    <svg x-ref="icon5" class="absolute inset-0 w-12 h-12 hidden" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h8" />
                        <path d="M10 19v-3.96 3.15" />
                        <path d="M7 19h5" />
                        <rect width="6" height="10" x="16" y="12" rx="2" />
                    </svg>

                </div>

                <!-- Message -->
                <h3 class="text-lg font-semibold text-[#A6B5E0] mb-1">No Assets Yet</h3>
                <p class="text-xs text-[#8D9AC1]">Start by adding assets to populate this list.</p>
            </div>
            @endif


            @foreach ($assets as $index => $asset)
            <div
                class="collapse bg-white overflow-visible border border-gray-300 shadow-lg mb-1 rounded-lg {{ $selected === $index ? 'collapse-open' : '' }} ">
                <div class="collapse-title font-semibold text-blue-900 text-sm cursor-pointer flex items-center justify-between px-3 py-2
                {{ $selected !== $index ? 'hover:bg-[#EDF0FF] rounded-lg' : '' }}"
                    wire:click="$set('selected', {{ $selected === $index ? 'null' : $index }})">

                    <!-- Left Section: Button + Title -->
                    <div class="flex items-center gap-2">
                        <!-- Button with Tooltip -->
                        <div class="relative group">
                            <button wire:click.stop="markChecked({{ $index }})" @if($selected !==$index) disabled @endif
                                class="group/button w-6 h-6 flex items-center justify-center rounded-full transition duration-200 
                    {{ isset($checked[$index]) && $checked[$index]
                        ? 'bg-green-600 text-white '
                        : ($selected === $index
                            ? 'text-green-600 hover:bg-green-600 hover:text-white '
                            : 'text-gray-500  ') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </button>

                            <!-- Tooltip -->
                            <div
                                class="absolute -top-9 left-1/2 -translate-x-1/2 z-50 hidden group-hover:flex px-2 py-2 rounded bg-black text-white text-xs whitespace-nowrap shadow-md">
                                Mark as Checked
                            </div>
                        </div>

                        <!-- Title Text -->
                        <span class="whitespace-normal">
                            {{ $asset['asset_name'] ?? 'N/A' }}
                            @if (!empty($asset['brand_name_custom']))
                            : {{ $asset['brand_name_custom'] }} {{ $asset['model_name'] ?? '' }}
                            @elseif (!empty($asset['brand_id']))
                            : {{ $brands->firstWhere('brand_id', $asset['brand_id'])->brand_name ?? 'N/A' }}
                            {{ $asset['model_name'] ?? '' }}
                            @elseif (!empty($asset['model_name']))
                            : {{ $asset['model_name'] }}
                            @endif
                        </span>
                    </div>

                    <!-- Right Arrow Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 transition-transform duration-400 ease-in-out transform {{ $selected === $index ? 'rotate-180' : '' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

                <div class="collapse-content text-xs text-gray-700 space-y-0.5">
                    <div class="flex justify-end">
                        <!-- Edit -->
                        <button wire:click.stop="editAsset({{ $index }})"
                            class="group relative flex items-center justify-center w-6 h-6  text-blue-600 hover:text-blue-600  hover:bg-blue-100 rounded-full transition-all duration-150 ease-in-out hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-4">
                                <path
                                    d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                <path
                                    d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                            </svg>

                            <!-- Tooltip -->
                            <div
                                class="absolute bottom-full mb-2 px-2 py-1 text-xs text-white bg-gray-900 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
                                Edit
                            </div>
                        </button>

                        <!-- Remove -->
                        <button wire:click.stop="removeAsset({{ $index }})"
                            class="group relative flex items-center justify-center w-6 h-6  text-red-600 hover:text-red-600 hover:bg-red-100 rounded-full transition-all duration-150 ease-in-out hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-4">
                                <path fill-rule="evenodd"
                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <!-- Tooltip -->
                            <div
                                class="absolute bottom-full mb-2 px-2 py-1 text-xs text-white bg-gray-900 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
                                Remove
                            </div>
                        </button>
                    </div>

                    <div class="border-t border-[A6B5E0] pb-[1px]"></div>


                    <!-- Begin striped rows -->
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white"><strong>Asset
                            Name:</strong> <span class="ml-4">{{ $asset['asset_name'] ?? 'N/A' }}</span></div>
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white">
                        <strong>Brand:</strong> <span class="ml-4">{{ $asset['brand_name_custom'] ??
                            ($brands->firstWhere('brand_id', $asset['brand_id'])->brand_name ?? 'N/A') }}</span>
                    </div>
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white">
                        <strong>Model:</strong> <span class="ml-4">{{ $asset['model_name'] ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between text-right px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white">
                        <strong class="text-left">Category:</strong> <span class="ml-auto">{{
                            $categories->firstWhere('category_id',
                            $asset['category_id'])->category_name ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white">
                        <strong>Status:</strong> <span class="ml-4">{{ $statuses->firstWhere('status_id',
                            $asset['status_id'])->status_name ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white">
                        <strong>Condition:</strong> <span class="ml-4">{{ $conditions->firstWhere('condition_id',
                            $asset['condition_id'])->condition_name ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white"><strong>Asset
                            Type:</strong> <span class="ml-4">{{ $asset['asset_type'] === '1' ? 'COMMON ASSET' :
                            ($asset['asset_type'] === '2' ? 'NON-COMMON ASSET' : 'N/A') }}</span></div>
                    <div class="flex justify-between text-right px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white">
                        <strong class="text-left">Assigned To:</strong>
                        <span class="ml-auto">
                            @if ($asset['asset_type'] === '1')
                            {{ strtoupper($departments->firstWhere('department_id',
                            $asset['department_id'])?->department_name) ?? 'N/A' }}
                            @elseif ($asset['asset_type'] === '2')
                            @php $employee = $employees->firstWhere('employee_id', $asset['employee_id']); @endphp
                            {{ $employee ? strtoupper($employee->employee_lastname) . ', ' .
                            strtoupper($employee->employee_firstname) : 'N/A' }}
                            @else
                            N/A
                            @endif
                        </span>
                    </div>
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white"><strong>Date
                            Assigned:</strong> <span class="ml-4">{{ isset($asset['date_accountable']) ?
                            strtoupper(\Carbon\Carbon::parse($asset['date_accountable'])->format('F j, Y')) : 'N/A'
                            }}</span></div>

                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white">
                        <strong>Purchase Date:</strong> <span class="ml-4">{{ isset($asset['purchase_date']) ?
                            strtoupper(\Carbon\Carbon::parse($asset['purchase_date'])->format('F j, Y')) : 'N/A'
                            }}</span>
                    </div>
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white">
                        <strong>Warranty Expiration Date:</strong> <span class="ml-4">{{
                            isset($asset['warranty_exp_date']) ?
                            strtoupper(\Carbon\Carbon::parse($asset['warranty_exp_date'])->format('F j, Y')) : 'N/A'
                            }}</span>
                    </div>
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white">
                        <strong>Warranty (Years):</strong> <span class="ml-4">{{ $asset['warranty_years'] ?? 'N/A' }}
                            YEARS</span>
                    </div>
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white"><strong>Free
                            Replacement Period:</strong>
                        <span class="ml-4">
                            @if (!empty($asset['free_replacement_value']) && !empty($asset['free_replacement_unit']))
                            {{ $asset['free_replacement_value'] }} {{ $asset['free_replacement_unit'] }}
                            @else
                            N/A
                            @endif
                        </span>
                    </div>
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white"><strong>Free
                            Replacement Date:</strong> <span class="ml-4">{{ isset($asset['free_replacement_date']) ?
                            strtoupper(\Carbon\Carbon::parse($asset['free_replacement_date'])->format('F j, Y')) : 'N/A'
                            }}</span></div>
                    

                    @if(in_array($asset['category_id'] ?? null, [1, 6]))
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white"><strong>Device
                            Serial #:</strong> <span class="ml-4">{{ $asset['device_serial_number'] ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white"><strong>Charger
                            Serial #:</strong> <span class="ml-4">{{ $asset['charger_serial_number'] ?? 'N/A' }}</span>
                    </div>
                    @endif

                    <div class="flex justify-between items-start px-3 py-1 rounded odd:bg-[#EDF0FF] even:bg-white">
                        <strong>Description:</strong>
                        <span class="ml-auto text-right">
                            {{ !empty($asset['description']) ? strtoupper($asset['description']) : 'N/A' }}
                        </span>
                    </div>

                    <div class="border-t border-[A6B5E0]"></div>
                </div>

            </div>
            @endforeach

            <!-- Action Buttons -->
            <div>
                <div class="flex flex-col gap-2 pt-2 mt-5">
                    <!-- Clear Assets Button -->
                    <button wire:click="confirmClear"
                        class="w-full bg-red-200 text-red-600 hover:bg-red-600 hover:text-white text-sm font-medium py-2 rounded-md">
                        Clear Assets
                    </button>

                    <!-- Submit Button -->
                    <div class="relative group">
                        <button wire:click="confirmSubmit" @if(empty($assets) || count($checked) !==count($assets))
                            disabled @endif class="w-full text-sm font-medium py-2 rounded-md transition
                            {{ empty($assets) || count($checked) !== count($assets)
                                ? 'bg-blue-300 text-white'
                                : 'bg-blue-600 hover:bg-blue-700 text-white' }}">
                            Submit
                        </button>

                        @if(empty($assets))
                        <div
                            class="absolute top-10 left-1/2 -translate-x-1/2 z-10 hidden group-hover:flex px-3 py-1 bg-black text-white text-xs rounded shadow">
                            Add assets first.
                        </div>
                        @elseif(count($checked) !== count($assets))
                        <div
                            class="absolute top-10 left-1/2 -translate-x-1/2 z-10 hidden group-hover:flex px-3 py-1 bg-black text-white text-xs rounded shadow text-center">
                            Please review and check all asset details.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>