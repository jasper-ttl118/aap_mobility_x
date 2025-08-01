<div class=" bg-white px-6 flex items-center justify-center">
    <div class="w-full max-w-6xl overflow-hidden px-5 pb-5">
        <!-- Header -->
        <div class="border-b border-gray-300 pb-3 ">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-[#071d49] mb-1">Transfer Asset</h2>
                    <p class="text-sm text-gray-600 leading-tight">
                        <em>Enter transfer information.</em>
                    </p>
                </div>
            </div>
        </div>

        <!-- Body Content -->
        <div class="flex">
            <!-- Asset Summary Sidebar -->
            <div class="w-[35%] p-5 border-r border-gray-200 space-y-4">

                {{-- Top Summary Card --}}
                <div class="rounded-lg border border-gray-200 p-3 bg-[#FAFBFF] shadow-xl">
                    <div class="flex items-start gap-4">
                        <!-- Shared Icon -->
                        <div
                            class="w-10 h-10 rounded-lg bg-blue-800 flex items-center justify-center self-center text-white">
                            @switch($asset->category_id)
                            @case(1)
                            {{-- Icon for IT Equipment --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6 lucide lucide-cpu-icon lucide-cpu">
                                <path d="M12 20v2" />
                                <path d="M12 2v2" />
                                <path d="M17 20v2" />
                                <path d="M17 2v2" />
                                <path d="M2 12h2" />
                                <path d="M2 17h2" />
                                <path d="M2 7h2" />
                                <path d="M20 12h2" />
                                <path d="M20 17h2" />
                                <path d="M20 7h2" />
                                <path d="M7 20v2" />
                                <path d="M7 2v2" />
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                                <rect x="8" y="8" width="8" height="8" rx="1" />
                            </svg>
                            @break

                            @case(2)
                            {{-- Icon for Furniture --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6 lucide lucide-sofa-icon lucide-sofa">
                                <path d="M20 9V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v3" />
                                <path
                                    d="M2 16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v1.5a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5V11a2 2 0 0 0-4 0z" />
                                <path d="M4 18v2" />
                                <path d="M20 18v2" />
                                <path d="M12 4v9" />
                            </svg>
                            @break

                            @case(3)
                            {{-- Icon for Machinery --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6  lucide lucide-cog-icon lucide-cog">
                                <path d="M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z" />
                                <path d="M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                <path d="M12 2v2" />
                                <path d="M12 22v-2" />
                                <path d="m17 20.66-1-1.73" />
                                <path d="M11 10.27 7 3.34" />
                                <path d="m20.66 17-1.73-1" />
                                <path d="m3.34 7 1.73 1" />
                                <path d="M14 12h8" />
                                <path d="M2 12h2" />
                                <path d="m20.66 7-1.73 1" />
                                <path d="m3.34 17 1.73-1" />
                                <path d="m17 3.34-1 1.73" />
                                <path d="m11 13.73-4 6.93" />
                            </svg>
                            @break

                            @case(4)
                            {{-- Icon for Vehicles --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6  lucide lucide-car-icon lucide-car">
                                <path
                                    d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2" />
                                <circle cx="7" cy="17" r="2" />
                                <path d="M9 17h6" />
                                <circle cx="17" cy="17" r="2" />
                            </svg>
                            @break

                            @case(5)
                            {{-- Icon for facilities --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6  lucide lucide-building-icon lucide-building">
                                <rect width="16" height="20" x="4" y="2" rx="2" ry="2" />
                                <path d="M9 22v-4h6v4" />
                                <path d="M8 6h.01" />
                                <path d="M16 6h.01" />
                                <path d="M12 6h.01" />
                                <path d="M12 10h.01" />
                                <path d="M12 14h.01" />
                                <path d="M16 10h.01" />
                                <path d="M16 14h.01" />
                                <path d="M8 10h.01" />
                                <path d="M8 14h.01" />
                            </svg>
                            @break

                            @case(6)
                            {{-- Icon for Mobile Devices --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="size-6  lucide lucide-tablet-smartphone-icon lucide-tablet-smartphone">
                                <rect width="10" height="14" x="3" y="8" rx="2" />
                                <path d="M5 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2h-2.4" />
                                <path d="M8 18h.01" />
                            </svg>
                            @break

                            @case(7)
                            {{-- Icon for High Value Assets --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6  lucide lucide-microwave-icon lucide-microwave">
                                <rect width="20" height="15" x="2" y="4" rx="2" />
                                <rect width="8" height="7" x="6" y="8" rx="1" />
                                <path d="M18 8v7" />
                                <path d="M6 19v2" />
                                <path d="M18 19v2" />
                            </svg>
                            @break

                            @case(8)
                            {{-- Icon for laboratory equipment --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6 lucide lucide-microscope-icon lucide-microscope">
                                <path d="M6 18h8" />
                                <path d="M3 22h18" />
                                <path d="M14 22a7 7 0 1 0 0-14h-1" />
                                <path d="M9 14h2" />
                                <path d="M9 12a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2Z" />
                                <path d="M12 6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3" />
                            </svg>
                            @break

                            @case(9)
                            {{-- Icon for Company Owned Tools --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6 lucide lucide-drill-icon lucide-drill">
                                <path d="M10 18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a3 3 0 0 1-3-3 1 1 0 0 1 1-1z" />
                                <path
                                    d="M13 10H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1l-.81 3.242a1 1 0 0 1-.97.758H8" />
                                <path d="M14 4h3a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-3" />
                                <path d="M18 6h4" />
                                <path d="m5 10-2 8" />
                                <path d="m7 18 2-8" />
                            </svg>
                            @break

                            @case(10)
                            {{-- Icon for Safety Equipment --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="size-6 lucide lucide-fire-extinguisher-icon lucide-fire-extinguisher">
                                <path d="M15 6.5V3a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v3.5" />
                                <path d="M9 18h8" />
                                <path d="M18 3h-3" />
                                <path d="M11 3a6 6 0 0 0-6 6v11" />
                                <path d="M5 13h4" />
                                <path d="M17 10a4 4 0 0 0-8 0v10a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2Z" />
                            </svg>
                            @break

                            @default
                            {{-- Fallback Icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            @endswitch
                        </div>

                        <!-- Text Info (Two stacked lines) -->
                        <div class="flex flex-col justify-center uppercase">
                            <div>
                                <span class="text-sm font-bold text-gray-900 ">{{ $asset['brand_name_custom'] ??
                                    ($brands->firstWhere('brand_id', $asset['brand_id'])->brand_name ?? 'N/A') }}</span>
                                <span class="text-sm font-bold text-gray-900">{{ $asset->model_name }}</span>
                            </div>
                            <div class="text-xs text-gray-700 ">{{ $asset->asset_name }}</div>
                        </div>
                    </div>
                </div>


                {{-- Navigation Tabs --}}
                <div x-data="{ activeTab: 'overview' }" class="space-y-4">

                    <div class="rounded-lg border border-gray-200 bg-[#FAFBFF] shadow-xl">
                        <nav class="flex items-center px-2">
                            <!-- Overview Link -->
                            <button @click="activeTab = 'overview'"
                                class="w-1/2 flex items-center gap-2 px-4 py-2 text-sm border-b-2 transition-all"
                                :class="activeTab === 'overview' 
                    ? 'text-blue-800 font-bold border-blue-800' 
                    : 'text-gray-500 font-medium border-transparent hover:text-blue-700 hover:border-blue-300'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="size-5 lucide lucide-package-icon lucide-package">
                                    <path
                                        d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z" />
                                    <path d="M12 22V12" />
                                    <polyline points="3.29 7 12 12 20.71 7" />
                                    <path d="m7.5 4.27 9 5.15" />
                                </svg>
                                Overview
                            </button>

                            <!-- Assignment Link -->
                            <button @click="activeTab = 'assignment'"
                                class="w-1/2 flex items-center gap-2 px-4 py-2 text-sm border-b-2 transition-all"
                                :class="activeTab === 'assignment' 
                    ? 'text-blue-800 font-bold border-blue-800' 
                    : 'text-gray-500 font-medium border-transparent hover:text-blue-700 hover:border-blue-300'">
                                <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                Assignment
                            </button>
                        </nav>
                    </div>

                    <div class="rounded-xl border border-gray-200 p-5 bg-[#FAFBFF] shadow-xl">
                        <!-- Overview Section -->
                        <div x-show="activeTab === 'overview'">
                            <ul class="space-y-1 uppercase">
                                <li class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500 font-semibold">Property Code</span>
                                    <span class="text-sm text-gray-900 font-normal">{{ $asset->property_code ?? 'N/A'
                                        }}</span>
                                </li>


                                <li class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500 font-semibold">Category</span>
                                    <span class="text-sm text-gray-900 font-normal">{{ $asset->category->category_name
                                        ?? 'N/A'
                                        }}</span>
                                </li>

                                <li class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500 font-semibold">Status</span>
                                    <span class="text-sm text-gray-900 font-normal">{{ $asset->status->status_name ??
                                        'N/A'
                                        }}</span>
                                </li>

                                <li class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500 font-semibold">Condition</span>
                                    <span class="text-sm text-gray-900 font-normal">{{ $asset->condition->condition_name
                                        ?? 'N/A'
                                        }}</span>
                                </li>

                                @if(!empty($asset->device_serial_number))
                                <li class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500 font-semibold">Device Serial #</span>
                                    <span class="text-sm text-gray-900 font-normal">{{ $asset->device_serial_number
                                        }}</span>
                                </li>
                                @endif

                                @if(!empty($asset->charger_serial_number))
                                <li class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500 font-semibold">Charger Serial #</span>
                                    <span class="text-sm text-gray-900 font-normal">{{ $asset->charger_serial_number
                                        }}</span>
                                </li>
                                @endif
                            </ul>

                        </div>

                        <!-- Assignment Section -->
                        <div x-show="activeTab === 'assignment'" x-cloak>
                            <ul class="space-y-1 uppercase">

                                <!-- Asset Type -->
                                <li class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500 font-semibold">Asset Type</span>
                                    <span class="text-sm text-gray-900 font-normal">
                                        {{ $asset->asset_type == 1 ? 'COMMON' : ($asset->asset_type == 2 ?
                                        'NON-COMMON' : 'N/A') }}
                                    </span>
                                </li>

                                <!-- Assigned To -->
                                @if($asset->asset_type == 1 && $asset->department)
                                <li class="flex justify-between items-start">
                                    <span class="text-xs text-gray-500 font-semibold ">Assigned To</span>
                                    <span
                                        class="text-sm text-gray-900 font-normal ml-auto max-w-[70%] text-end whitespace-normal break-words">
                                        {{ $asset->department->department_name }}
                                    </span>
                                </li>

                                @elseif($asset->asset_type == 2 && $asset->employee)
                                <li class="flex justify-between items-start">
                                    <span class="text-xs text-gray-500 font-semibold">Department</span>
                                    <span class="text-sm text-gray-900 font-normal ml-auto max-w-[70%] text-end whitespace-normal break-words">{{
                                        $asset->employee->department->department_name ?? 'N/A' }}</span>
                                </li>

                                <li class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500 font-semibold ">Assigned To</span>
                                    <span class="text-sm text-gray-900 font-normal">
                                        {{ $asset->employee->employee_lastname }}, {{
                                        $asset->employee->employee_firstname }}
                                    </span>
                                </li>
                                @else
                                <li class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500 font-semibold">Assigned To</span>
                                    <span class="text-sm text-gray-900 font-normal">N/A</span>
                                </li>
                                @endif

                                <!-- Assigned Date -->
                                <li class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500 font-semibold">Date Assigned</span>
                                    <span class="text-sm text-gray-900 font-normal">
                                        {{ \Carbon\Carbon::parse($asset->date_accountable)->format('F d, Y') ?? 'N/A' }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Main Transfer Form -->
            <div class="flex-1 p-8">
                <h2 class="text-lg font-medium flex gap-3 text-gray-900 mb-6 uppercase">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-pen-icon lucide-user-pen"><path d="M11.5 15H7a4 4 0 0 0-4 4v2"/><path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><circle cx="10" cy="7" r="4"/></svg>
                    Transfer Information
                </h2>



                <!-- Action Buttons -->
                <div class="flex justify-end mt-8">
                    <button
                        class="px-6 py-2 bg-blue-800 hover:bg-blue-900 text-white text-sm rounded-lg font-medium transition-all">
                        Submit Transfer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>