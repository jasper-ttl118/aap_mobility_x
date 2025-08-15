<div x-data="{ open: @entangle('open') }" x-cloak>
    <div x-show="open" x-transition.opacity class="fixed inset-0 z-[100] flex items-center justify-center bg-black/50 p-4">
        <div @click.outside="$wire.close()" class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl border border-gray-200 p-6">
            <!-- Close -->
            <button @click="$wire.close()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                    <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                </svg>
            </button>

            <!-- Header -->
            <div class="flex items-center gap-2 text-blue-700 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6 lucide lucide-package-search-icon lucide-package-search"><path d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"/><path d="m7.5 4.27 9 5.15"/><polyline points="3.29 7 12 12 20.71 7"/><line x1="12" x2="12" y1="22" y2="12"/><circle cx="18.5" cy="15.5" r="2.5"/><path d="M20.27 17.27 22 19"/></svg>
                <span class="text-sm font-semibold uppercase">Asset Overview</span>
            </div>

            @if($asset)
            <ul class="space-y-2 uppercase">
                <li class="flex justify-between items-center"><span class="text-xs text-gray-500 font-semibold">Property Code</span>
                    <span class="text-sm text-gray-900">{{ $asset->property_code ?? 'N/A' }}</span></li>

                <li class="flex justify-between items-center"><span class="text-xs text-gray-500 font-semibold">Category</span>
                    <span class="text-sm text-gray-900 text-right break-words max-w-[70%]">
                        {{ $asset->category->category_name ?? 'N/A' }}
                    </span></li>

                <li class="flex justify-between items-center"><span class="text-xs text-gray-500 font-semibold">Status</span>
                    <span class="text-sm text-gray-900">{{ $asset->status->status_name ?? 'N/A' }}</span></li>

                <li class="flex justify-between items-center"><span class="text-xs text-gray-500 font-semibold">Condition</span>
                    <span class="text-sm text-gray-900">{{ $asset->condition->condition_name ?? 'N/A' }}</span></li>

                @if($asset->device_serial_number)
                    <li class="flex justify-between items-center"><span class="text-xs text-gray-500 font-semibold">Device Serial #</span>
                        <span class="text-sm text-gray-900">{{ $asset->device_serial_number }}</span></li>
                @endif

                @if($asset->charger_serial_number)
                    <li class="flex justify-between items-center"><span class="text-xs text-gray-500 font-semibold">Charger Serial #</span>
                        <span class="text-sm text-gray-900">{{ $asset->charger_serial_number }}</span></li>
                @endif

                <li class="flex justify-between items-center"><span class="text-xs text-gray-500 font-semibold">Asset Type</span>
                    <span class="text-sm text-gray-900">
                        {{ $asset->asset_type == 1 ? 'COMMON' : ($asset->asset_type == 2 ? 'NON-COMMON' : 'N/A') }}
                    </span></li>

                @if($asset->asset_type == 1 && $asset->department)
                    <li class="flex justify-between items-center">
                        <span class="text-xs text-gray-500 font-semibold">Assigned To</span>
                        <span class="text-sm text-gray-900 text-right break-words max-w-[70%]">
                            {{ $asset->department->department_name }}
                        </span>
                    </li>
                @elseif($asset->asset_type == 2 && $asset->employee)
                    <li class="flex justify-between items-center">
                        <span class="text-xs text-gray-500 font-semibold">Department</span>
                        <span class="text-sm text-gray-900 text-right break-words max-w-[70%]">
                            {{ $asset->employee->department->department_name ?? 'N/A' }}
                        </span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-xs text-gray-500 font-semibold">Assigned To</span>
                        <span class="text-sm text-gray-900">
                            {{ $asset->employee->employee_lastname }}, {{ $asset->employee->employee_firstname }}
                        </span>
                    </li>
                @else
                    <li class="flex justify-between items-center">
                        <span class="text-xs text-gray-500 font-semibold">Assigned To</span>
                        <span class="text-sm text-gray-900">N/A</span>
                    </li>
                @endif

                <li class="flex justify-between items-center">
                    <span class="text-xs text-gray-500 font-semibold">Date Assigned</span>
                    <span class="text-sm text-gray-900">
                        {{ optional($asset->date_accountable)->format('F d, Y') ?? 'N/A' }}
                    </span>
                </li>
            </ul>
            @endif
        </div>
    </div>
</div>
