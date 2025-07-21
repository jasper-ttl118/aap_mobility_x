<div class="w-full lg:w-4/12 mt-8 lg:-mt-3.5 lg:ml-6">
    <div class="sticky -top-6">
        <div class="bg-white rounded-xl shadow-xl border border-transparent p-5">

            <!-- Header -->
            <div class="flex justify-between items-center mb-5">
                <div class="flex items-center gap-3">
                    <div class="bg-blue-100 p-1 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-10 text-blue-600">

                            <!-- Solid Filled Circle -->
                            <path
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Z" />

                            <!-- Animated Checkmark (stroke only) -->
                            <path d="M9 12.75 11.25 15 15 9.75" fill="none" stroke="white" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" class="animate-drawCheck"
                                style="stroke-dasharray: 24; stroke-dashoffset: 24;" />
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
            {{-- @foreach ($assets as $index => $asset)
            <div class="border rounded-md shadow bg-white">
                <!-- Header -->
                <button wire:click="$set('selected', {{ $selected === $index ? 'null' : $index }})"
                    class="w-full flex justify-between items-center px-4 py-2 text-left">
                    <span class="font-semibold text-blue-900 text-md">
                        {{ $asset['asset_name'] ?? 'N/A' }}
                        @if (!empty($asset['brand_name_custom']))
                        : {{ $asset['brand_name_custom'] }} {{ $asset['model_name'] ?? '' }}
                        @elseif (!empty($asset['brand_id']))
                        : {{ $brands->firstWhere('brand_id', $asset['brand_id'])->brand_name ?? 'N/A' }} {{
                        $asset['model_name'] ?? '' }}
                        @elseif (!empty($asset['model_name']))
                        : {{ $asset['model_name'] }}
                        @endif
                    </span>

                    <svg @class([ 'w-4 h-4 transition-transform duration-300' , 'rotate-180'=> $selected === $index
                        ]) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Details -->
                @if ($selected === $index)
                <div class="px-4 pb-3 pt-2 text-xs text-gray-700 space-y-1 overflow-hidden">
                    <!-- ASSET NAME -->
                    <div class="flex justify-between"><strong>Asset Name:</strong> <span class="ml-4">{{
                            $asset['asset_name'] ?? 'N/A' }}</span></div>
                    <!-- BRAND -->
                    <div class="flex justify-between">
                        <strong>Brand:</strong>
                        <span class="ml-4">
                            {{
                            ($asset['brand_id'] ?? null)
                            ? ($brands->firstWhere('brand_id', $asset['brand_id'])->brand_name ?? 'N/A')
                            : ($asset['brand_name_custom'] ?? 'N/A')
                            }}
                        </span>
                    </div>

                    <!-- MODEL -->
                    <div class="flex justify-between"><strong>Model:</strong> <span class="ml-4">{{ $asset['model_name']
                            ?? 'N/A' }}</span></div>

                    <!-- CATEGORY -->
                    <div class="flex justify-between">
                        <strong>Category:</strong>
                        <span class="ml-4">
                            {{
                            $categories->firstWhere('category_id', $asset['category_id'])->category_name
                            ?? 'N/A'
                            }}
                        </span>
                    </div>

                    <!-- STATUS -->
                    <div class="flex justify-between">
                        <strong>Status:</strong>
                        <span class="ml-4">
                            {{ $statuses->firstWhere('status_id', $asset['status_id'])->status_name ?? 'N/A' }}
                        </span>
                    </div>

                    <!-- CONDITION -->
                    <div class="flex justify-between">
                        <strong>Condition:</strong>
                        <span class="ml-4">
                            {{ $conditions->firstWhere('condition_id', $asset['condition_id'])->condition_name ?? 'N/A'
                            }}
                        </span>
                    </div>

                    <!-- PURCHASE DATE -->
                    <div class="flex justify-between">
                        <strong>Purchase Date:</strong>
                        <span class="ml-4">
                            {{ isset($asset['purchase_date'])
                            ? strtoupper(\Carbon\Carbon::parse($asset['purchase_date'])->format('F'))
                            . ' ' . \Carbon\Carbon::parse($asset['purchase_date'])->format('j, Y')
                            : 'N/A' }}
                        </span>
                    </div>

                    <!-- WARRANTY EXP DATE -->
                    <div class="flex justify-between">
                        <strong>Warranty Expiration Date:</strong>
                        <span class="ml-4">
                            {{ isset($asset['warranty_exp_date'])
                            ? strtoupper(\Carbon\Carbon::parse($asset['warranty_exp_date'])->format('F'))
                            . ' ' . \Carbon\Carbon::parse($asset['warranty_exp_date'])->format('j, Y')
                            : 'N/A' }}
                        </span>
                    </div>

                    <!-- WARRANTY IN YEARS -->
                    <div class="flex justify-between">
                        <strong>Warranty (Years):</strong>
                        <span class="ml-4">
                            {{ isset($asset['warranty_years']) ? $asset['warranty_years'] . ' YEARS' : 'N/A' }}
                        </span>
                    </div>

                    <!-- FREE REPLACEMENT PERIOD -->
                    <div class="flex justify-between">
                        <strong>Free Replacement Period:</strong>
                        <span class="ml-4">
                            {{ isset($asset['free_replacement_value'], $asset['free_replacement_unit'])
                            ? $asset['free_replacement_value'] . ' ' . $asset['free_replacement_unit']
                            : 'N/A' }}
                        </span>
                    </div>

                    <!-- FREE REPLACEMENT DATE -->
                    <div class="flex justify-between">
                        <strong>Free Replacement Date:</strong>
                        <span class="ml-4">
                            {{ isset($asset['free_replacement_date'])
                            ? strtoupper(\Carbon\Carbon::parse($asset['free_replacement_date'])->format('F'))
                            . ' ' . \Carbon\Carbon::parse($asset['free_replacement_date'])->format('j, Y')
                            : 'N/A' }}
                        </span>
                    </div>

                    <!-- ASSET TYPE -->
                    <div class="flex justify-between">
                        <strong>Asset Type:</strong>
                        <span class="ml-4">
                            {{ $asset['asset_type'] === '1' ? 'COMMON ASSET' : ($asset['asset_type'] === '2' ?
                            'NON-COMMON ASSET' : 'N/A') }}
                        </span>
                    </div>

                    <!-- ASSIGNED TO -->
                    <div class="flex justify-between">
                        <strong>Assigned To:</strong>
                        <span class="ml-4">
                            @if ($asset['asset_type'] === '1')
                            {{ strtoupper($departments->firstWhere('department_id',
                            $asset['department_id'])?->department_name) ??
                            'N/A' }}
                            @elseif ($asset['asset_type'] === '2')
                            @php
                            $employee = $employees->firstWhere('employee_id', $asset['employee_id']);
                            @endphp
                            {{ $employee ? strtoupper($employee->employee_lastname) . ', ' .
                            strtoupper($employee->employee_firstname) : 'N/A' }}
                            @else
                            N/A
                            @endif
                        </span>
                    </div>

                    <!-- DATE ASSIGNED -->
                    <div class="flex justify-between">
                        <strong>Date Assigned:</strong>
                        <span class="ml-4">
                            {{ isset($asset['date_accountable'])
                            ? strtoupper(\Carbon\Carbon::parse($asset['date_accountable'])->format('F'))
                            . ' ' . \Carbon\Carbon::parse($asset['date_accountable'])->format('j, Y')
                            : 'N/A' }}
                        </span>
                    </div>

                    <!-- SERIAL NUMBERS -->
                    @if(in_array($asset['category_id'] ?? null, [1, 6]))
                    <div class="flex justify-between">
                        <strong>Device Serial #:</strong>
                        <span class="ml-4">{{ $asset['device_serial'] ?? 'N/A' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <strong>Charger Serial #:</strong>
                        <span class="ml-4">{{ $asset['charger_serial'] ?? 'N/A' }}</span>
                    </div>
                    @endif

                    <!-- DESCRIPTION -->
                    <div class="flex justify-between"><strong>Description:</strong> <span
                            class="ml-4 truncate max-w-[60%] text-right">{{ $asset['description'] ?? 'N/A' }}</span>
                    </div>
                </div>
                @endif
            </div>
            @endforeach --}}
            @foreach ($assets as $index => $asset)
            <div
                class="collapse bg-white border border-gray-300 shadow-lg mb-1 rounded-lg {{ $selected === $index ? 'collapse-open' : '' }} ">
                <div class="collapse-title font-semibold text-blue-900 text-sm cursor-pointer flex items-center justify-between p-3
                    {{ $selected !== $index ? 'hover:bg-[#EDF0FF]' : '' }}"
                    wire:click="$set('selected', {{ $selected === $index ? 'null' : $index }})">


                    <span class="whitespace-normal">
                        
                        {{ $asset['asset_name'] ?? 'N/A' }}
                        @if (!empty($asset['brand_name_custom']))
                        : {{ $asset['brand_name_custom'] }} {{ $asset['model_name'] ?? '' }}
                        @elseif (!empty($asset['brand_id']))
                        : {{ $brands->firstWhere('brand_id', $asset['brand_id'])->brand_name ?? 'N/A' }} {{
                        $asset['model_name'] ?? '' }}
                        @elseif (!empty($asset['model_name']))
                        : {{ $asset['model_name'] }}
                        @endif
                    </span>

                    <!-- Custom Arrow Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class=" h-4 w-4 transition-transform duration-400 ease-in-out transform {{ $selected === $index ? 'rotate-180' : '' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

                <div class="collapse-content text-xs text-gray-700 space-y-1">
                    <div class="flex ">
                        <button
                            class="ml-auto w-5 h-5 flex items-center justify-center rounded-full text-green-600 hover:bg-green-600 hover:text-white transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </div>
                    <div class="border-t border-gray-300"></div>

                    <!-- your content here (unchanged) -->
                    <div class="flex justify-between mt-1"><strong>Asset Name:</strong> <span class="ml-4">{{
                            $asset['asset_name'] ?? 'N/A' }}</span></div>
                    <div class="flex justify-between"><strong>Brand:</strong> <span class="ml-4">{{
                            $asset['brand_name_custom'] ?? ($brands->firstWhere('brand_id',
                            $asset['brand_id'])->brand_name ?? 'N/A') }}</span></div>
                    <div class="flex justify-between"><strong>Model:</strong> <span class="ml-4">{{ $asset['model_name']
                            ?? 'N/A' }}</span></div>
                    <div class="flex justify-between"><strong>Category:</strong> <span class="ml-4">{{
                            $categories->firstWhere('category_id', $asset['category_id'])->category_name ?? 'N/A'
                            }}</span></div>
                    <div class="flex justify-between"><strong>Status:</strong> <span class="ml-4">{{
                            $statuses->firstWhere('status_id', $asset['status_id'])->status_name ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between"><strong>Condition:</strong> <span class="ml-4">{{
                            $conditions->firstWhere('condition_id', $asset['condition_id'])->condition_name ?? 'N/A'
                            }}</span></div>
                    <div class="flex justify-between"><strong>Purchase Date:</strong>
                        <span class="ml-4">
                            {{ isset($asset['purchase_date']) ?
                            strtoupper(\Carbon\Carbon::parse($asset['purchase_date'])->format('F j, Y')) : 'N/A' }}
                        </span>
                    </div>
                    <div class="flex justify-between"><strong>Warranty Expiration Date:</strong>
                        <span class="ml-4">
                            {{ isset($asset['warranty_exp_date']) ?
                            strtoupper(\Carbon\Carbon::parse($asset['warranty_exp_date'])->format('F j, Y')) : 'N/A' }}
                        </span>
                    </div>
                    <div class="flex justify-between"><strong>Warranty (Years):</strong> <span class="ml-4">{{
                            $asset['warranty_years'] ?? 'N/A' }} YEARS</span></div>
                    <div class="flex justify-between"><strong>Free Replacement Period:</strong> <span class="ml-4">{{
                            $asset['free_replacement_value'] ?? '' }} {{ $asset['free_replacement_unit'] ?? '' }}</span>
                    </div>
                    <div class="flex justify-between"><strong>Free Replacement Date:</strong>
                        <span class="ml-4">
                            {{ isset($asset['free_replacement_date']) ?
                            strtoupper(\Carbon\Carbon::parse($asset['free_replacement_date'])->format('F j, Y')) : 'N/A'
                            }}
                        </span>
                    </div>
                    <div class="flex justify-between"><strong>Asset Type:</strong>
                        <span class="ml-4">
                            {{ $asset['asset_type'] === '1' ? 'COMMON ASSET' : ($asset['asset_type'] === '2' ?
                            'NON-COMMON ASSET' : 'N/A') }}
                        </span>
                    </div>
                    <div class="flex justify-between"><strong>Assigned To:</strong>
                        <span class="ml-4">
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
                    <div class="flex justify-between"><strong>Date Assigned:</strong>
                        <span class="ml-4">
                            {{ isset($asset['date_accountable']) ?
                            strtoupper(\Carbon\Carbon::parse($asset['date_accountable'])->format('F j, Y')) : 'N/A' }}
                        </span>
                    </div>

                    @if(in_array($asset['category_id'] ?? null, [1, 6]))
                    <div class="flex justify-between"><strong>Device Serial #:</strong> <span class="ml-4">{{
                            $asset['device_serial'] ?? 'N/A' }}</span></div>
                    <div class="flex justify-between"><strong>Charger Serial #:</strong> <span class="ml-4">{{
                            $asset['charger_serial'] ?? 'N/A' }}</span></div>
                    @endif

                    <div class="flex justify-between items-start">
                        <strong>Description:</strong>
                        <span class="ml-16  text-right">{{ strtoupper($asset['description']) ?? 'N/A'
                            }}</span>
                    </div>
                </div>
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