<div>
    <!-- Header Title and Controls -->
    <div class="flex flex-col items-start justify-between gap-4 px-5 py-6 -mt-6 sm:flex-row sm:items-center">

        <div>
            <h2 class="font-semibold text-lg text-[#071d49]">AAP Assets</h2>
            <p class="text-sm text-gray-900">Add, Edit, View Details, See History and Pull Out Assets</p>
        </div>

        <!-- Right: Controls (search+filter + button) -->
        <div class="flex flex-row flex-wrap items-stretch w-full sm:w-auto sm:justify-end">

            <div x-data="{ open: false }" class="flex flex-col items-center justify-end w-full gap-3 sm:flex-row">

                <div class="relative w-full sm:w-72">
                    <div class="flex items-center overflow-hidden bg-white border border-gray-300 rounded-md shadow-sm">


                        <!-- Search Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 ml-3 text-gray-400">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                clip-rule="evenodd" />
                        </svg>


                        <!-- Search Input -->
                        <input type="text" wire:model.live="search" placeholder="SEARCH ASSETS"
                            class="w-full px-2 py-2 text-sm uppercase bg-transparent border-white outline-none focus:outline-none focus:ring-0 focus:border-white">

                        <!-- Filter Button + Tooltip -->
                        <div class="relative group">
                            <button @click="open = !open"
                                class="relative z-10 p-2 border-l border-gray-300 hover:bg-gray-100 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5 text-gray-700">
                                    <path
                                        d="M18.75 12.75h1.5a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM12 6a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 6ZM12 18a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 18ZM3.75 6.75h1.5a.75.75 0 1 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM5.25 18.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 0 1.5ZM3 12a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 12ZM9 3.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM12.75 12a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0ZM9 15.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                                </svg>
                            </button>

                            <!-- Tooltip -->
                            <div
                                class="absolute z-10 px-2 py-1 mb-2 text-xs text-white transition -translate-x-1/2 bg-black rounded opacity-0 bottom-full left-1/2 whitespace-nowrap group-hover:opacity-100">
                                Show Filters
                            </div>
                        </div>

                        <!-- Filter Dropdown -->
                        <div x-data="{
                                categoryId: @entangle('filterCategory'),
                                statusId: @entangle('filterStatus'),
                                conditionId: @entangle('filterCondition'),
                                departmentId: @entangle('filterDepartment'),
                                get hasFilters() {
                                    return this.categoryId || this.statusId || this.conditionId || this.departmentId;
                                }
                            }" x-show="open" @click.away="open = false"
                            class="absolute left-0 z-50 w-full mt-2 text-sm bg-white border border-gray-300 rounded-md shadow-lg top-full">


                            <div class="p-3 space-y-2 text-gray-700">

                                <!-- CATEGORY -->
                                <div x-data="{
                                        open: false,
                                        selected: 'ALL CATEGORIES',
                                        categoryId: @entangle('filterCategory'),
                                        init() {
                                            window.addEventListener('reset-filters', () => {
                                                this.selected = 'ALL CATEGORIES';
                                            });
                                        }
                                    }" class="relative w-full text-xs">
                                    <!-- Label with Icon -->
                                    <div class="flex items-center gap-1 mb-1 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4">
                                            <path
                                                d="M12.378 1.602a.75.75 0 0 0-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03ZM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 0 0 .372-.648V7.93ZM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 0 0 .372.648l8.628 5.033Z" />
                                        </svg>
                                        <label class="font-medium">CATEGORY</label>
                                    </div>

                                    <!-- Trigger -->
                                    <button type="button" @click="open = !open"
                                        class="relative w-full py-2 pl-3 pr-8 text-xs text-left text-gray-700 uppercase bg-white border border-gray-300 shadow-sm rounded-xl focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">

                                        <!-- Selected Text -->
                                        <span x-text="selected"></span>

                                        <!-- Chevron Icon -->
                                        <span class="absolute text-gray-500 pointer-events-none right-2 top-2">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                    </button>

                                    <!-- Options -->
                                    <ul x-show="open" @click.outside="open = false" x-transition
                                        class="absolute z-10 w-full py-1 mt-1 overflow-auto text-xs bg-white shadow-lg max-h-60 rounded-xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <li @click="selected = 'ALL CATEGORIES'; categoryId=''; open = false"
                                            class="px-4 py-2 uppercase cursor-pointer select-none hover:bg-blue-100">
                                            ALL CATEGORIES
                                        </li>
                                        @foreach ($categories as $category)
                                        <li @click="selected = '{{ strtoupper($category->category_name) }}'; categoryId = '{{ $category->category_id }}'; open = false"
                                            class="px-4 py-2 uppercase cursor-pointer select-none hover:bg-blue-100">
                                            {{ strtoupper($category->category_name) }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- STATUS -->
                                <div x-data="{
                                        open: false,
                                        selected: 'ALL STATUS',
                                        statusId: @entangle('filterStatus'),
                                        init() {
                                            window.addEventListener('reset-filters', () => {
                                                this.selected = 'ALL STATUS';
                                            });
                                        }
                                    }" class="relative w-full text-xs">
                                    <div class="flex items-center gap-1 mb-1 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4">
                                            <path fill-rule="evenodd"
                                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <label class="font-medium">STATUS</label>
                                    </div>
                                    <button type="button" @click="open = !open"
                                        class="relative w-full py-2 pl-3 pr-8 text-xs text-left text-gray-700 uppercase bg-white border border-gray-300 shadow-sm rounded-xl focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                        <span x-text="selected"></span>
                                        <span class="absolute text-gray-500 pointer-events-none right-2 top-2">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                    </button>
                                    <ul x-show="open" @click.outside="open = false" x-transition
                                        class="absolute z-10 w-full py-1 mt-1 overflow-auto text-xs bg-white shadow-lg max-h-60 rounded-xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <li @click="selected = 'ALL STATUS'; statusId=''; open = false"
                                            class="px-4 py-2 uppercase cursor-pointer hover:bg-blue-100">
                                            ALL STATUS
                                        </li>
                                        @foreach ($statuses as $status)
                                        <li @click="selected = '{{ strtoupper($status->status_name) }}'; statusId = '{{ $status->status_id }}'; open = false"
                                            class="px-4 py-2 uppercase cursor-pointer hover:bg-blue-100">
                                            {{ strtoupper($status->status_name) }}
                                        </li>
                                        @endforeach
                                    </ul>
                                    <input type="hidden" name="status" :value="statusId">
                                </div>

                                <!-- CONDITION -->
                                <div x-data="{
                                        open: false,
                                        selected: 'ALL CONDITIONS',
                                        conditionId: @entangle('filterCondition'),
                                        init() {
                                            window.addEventListener('reset-filters', () => {
                                                this.selected = 'ALL CONDITIONS';
                                            });
                                        }
                                    }" class="relative w-full text-xs">
                                    <div class="flex items-center gap-1 mb-1 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4">
                                            <path fill-rule="evenodd"
                                                d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <label class="font-medium">CONDITION</label>
                                    </div>
                                    <button type="button" @click="open = !open"
                                        class="relative w-full py-2 pl-3 pr-8 text-xs text-left text-gray-700 uppercase bg-white border border-gray-300 shadow-sm rounded-xl focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                        <span x-text="selected"></span>
                                        <span class="absolute text-gray-500 pointer-events-none right-2 top-2">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                    </button>
                                    <ul x-show="open" @click.outside="open = false" x-transition
                                        class="absolute z-10 w-full py-1 mt-1 overflow-auto text-xs bg-white shadow-lg max-h-60 rounded-xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <li @click="selected = 'ALL CONDITIONS'; conditionId=''; open = false"
                                            class="px-4 py-2 uppercase cursor-pointer hover:bg-blue-100">
                                            ALL CONDITIONS
                                        </li>
                                        @foreach ($conditions as $condition)
                                        <li @click="selected = '{{ strtoupper($condition->condition_name) }}'; conditionId = '{{ $condition->condition_id }}'; open = false"
                                            class="px-4 py-2 uppercase cursor-pointer hover:bg-blue-100">
                                            {{ strtoupper($condition->condition_name) }}
                                        </li>
                                        @endforeach
                                    </ul>
                                    <input type="hidden" name="condition" :value="conditionId">
                                </div>

                                <!-- DEPARTMENT -->
                                <div x-data="{
                                        open: false,
                                        selected: 'ALL DEPARTMENTS',
                                        departmentId: @entangle('filterDepartment'),
                                        init() {
                                            window.addEventListener('reset-filters', () => {
                                                this.selected = 'ALL DEPARTMENTS';
                                            });
                                        }
                                    }" class="relative w-full text-xs">
                                    <div class="flex items-center gap-1 mb-1 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4">
                                            <path fill-rule="evenodd"
                                                d="M4.5 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5h-.75V3.75a.75.75 0 0 0 0-1.5h-15ZM9 6a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm-.75 3.75A.75.75 0 0 1 9 9h1.5a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM9 12a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm3.75-5.25A.75.75 0 0 1 13.5 6H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM13.5 9a.75.75 0 0 0 0 1.5H15A.75.75 0 0 0 15 9h-1.5Zm-.75 3.75a.75.75 0 0 1 .75-.75H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM9 19.5v-2.25a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.75.75h-4.5A.75.75 0 0 1 9 19.5Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <label class="font-medium">DEPARTMENT</label>
                                    </div>
                                    <button type="button" @click="open = !open"
                                        class="relative w-full py-2 pl-3 pr-8 text-xs text-left text-gray-700 uppercase bg-white border border-gray-300 shadow-sm rounded-xl focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                        <span x-text="selected"></span>
                                        <span class="absolute text-gray-500 pointer-events-none right-2 top-2">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                    </button>
                                    <ul x-show="open" @click.outside="open = false" x-transition
                                        class="absolute z-10 w-full py-1 mt-1 overflow-auto text-xs bg-white shadow-lg max-h-60 rounded-xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <li @click="selected = 'ALL DEPARTMENTS'; departmentId=''; open = false"
                                            class="px-4 py-2 uppercase cursor-pointer hover:bg-blue-100">
                                            ALL DEPARTMENTS
                                        </li>
                                        @foreach ($departments as $department)
                                        <li @click="selected = '{{ strtoupper($department->department_name) }}'; departmentId = '{{ $department->department_id }}'; open = false"
                                            class="px-4 py-2 uppercase cursor-pointer hover:bg-blue-100">
                                            {{ strtoupper($department->department_name) }}
                                        </li>
                                        @endforeach
                                    </ul>
                                    <input type="hidden" name="department" :value="departmentId">
                                </div>

                                <!-- CLEAR FILTERS BUTTON -->
                                <div>
                                    <button type="button" @click="
                                            categoryId = '';
                                            statusId = '';
                                            conditionId = '';
                                            departmentId = '';
                                            selected = 'ALL CATEGORIES';
                                            $dispatch('reset-filters'); 
                                            $wire.set('search', '');
                                            $wire.set('$filterCategory', '');
                                            $wire.set('filterStatus', '');
                                            $wire.set('filterCondition', '');
                                            $wire.set('filterDepartment', '');
                                            $wire.resetFilters();
                                            
                                        "
                                        class="flex items-center justify-center w-full gap-2 px-3 py-2 text-xs font-semibold text-red-600 transition bg-gray-100 rounded-md hover:text-white hover:bg-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="size-4 lucide lucide-delete-icon lucide-delete">
                                            <path
                                                d="M10 5a2 2 0 0 0-1.344.519l-6.328 5.74a1 1 0 0 0 0 1.481l6.328 5.741A2 2 0 0 0 10 19h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z" />
                                            <path d="m12 9 6 6" />
                                            <path d="m18 9-6 6" />
                                        </svg>
                                        CLEAR FILTERS
                                    </button>
                                </div>

                                <!-- APPLY FILTERS BUTTON with Tooltip -->
                                <div class="relative" x-data="{ showTooltip: false }">
                                    <button type="button" @click="open = false" wire:click="$refresh"
                                        :disabled="!hasFilters" @mouseenter="if (!hasFilters) showTooltip = true"
                                        @mouseleave="showTooltip = false"
                                        class="relative flex items-center justify-center w-full gap-2 px-3 py-2 text-xs font-semibold text-white transition bg-blue-900 rounded-md hover:bg-blue-800 disabled:bg-blue-200 disabled:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                        APPLY FILTERS
                                    </button>

                                    <!-- Tooltip -->
                                    <div x-show="showTooltip" x-cloak x-transition
                                        class="absolute z-50 px-2 py-1 mb-1 text-xs text-white transform -translate-x-1/2 bg-gray-800 rounded-md shadow-md bottom-full left-1/2 whitespace-nowrap">
                                        Set filters first
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Asset Button -->
                <a href="assets/create"
                    class="flex items-center justify-center gap-2 rounded-md bg-blue-900 px-4 py-2.5 text-sm text-white transition-colors hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400 w-full sm:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span>Add New Asset</span>
                </a>
            </div>
        </div>
    </div>

    <div class="overflow-auto hide-scrollbar">
        <div class="min-w-[1100px] w-full px-5 pb-2 rounded-sm ">
            <script>
                window.addEventListener('filter-changed', event => {
                console.log(`[Livewire] ${event.detail.property} = ${event.detail.value}`);
            });
            </script>

            <table class="w-full text-sm text-center text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th class="py-3">Asset Name</th>
                        <th class="py-3">Brand</th>
                        <th class="py-3">Model</th>
                        <th class="py-3">Assigned To</th>
                        <th class="py-3">Status</th>
                        <th class="py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)

                    <tr class="border-b border-gray-200 {{ $loop->even ? 'bg-[#EDF0FF]' : 'bg-white' }}">

                        <td class="py-3 pl-3 text-left text-gray-900">{{ $asset->asset_name }}</td>
                        <td class="py-3 text-gray-900">
                            @if (in_array($asset->category_id, [1, 6]))
                            {{ $asset->brand->brand_name ?? 'NO DATA' }}
                            @else
                            {{ $asset->brand_name_custom ?? 'NO DATA' }}
                            @endif
                        </td>
                        <td class="py-3 text-gray-900">{{ $asset->model_name }}</td>
                        <td class="py-3 text-gray-900">
                            @if ($asset->asset_type === '2' && $asset->employee)
                            {{ strtoupper($asset->employee->employee_lastname) }},
                            {{ strtoupper($asset->employee->employee_firstname) }}
                            @elseif ($asset->asset_type === '1' && $asset->department)
                            {{ strtoupper($asset->department->department_name) }}
                            @else
                            N/A
                            @endif
                        </td>

                        <td class="py-3 text-gray-900">
                            @php
                            $statusClass = match ($asset->status->status_name) {
                            'AVAILABLE' => 'bg-green-600',
                            'IN USE' => 'bg-blue-600',
                            'UNDER MAINTENANCE' => 'bg-yellow-500',
                            'DECOMMISSIONED' => 'bg-gray-700',
                            'ON HOLD' => 'bg-purple-600',
                            'LOST/STOLEN' => 'bg-red-600',
                            default => 'bg-gray-400',
                            };
                            @endphp

                            <span class="text-white text-xs font-medium px-2 py-1 rounded-full {{ $statusClass }}">
                                {{ $asset->status->status_name }}
                            </span>
                        </td>
                        <td class="py-3 pr-2">
                            <div class="flex items-center justify-center gap-3">

                                <!-- View Details -->
                                <div class="relative">
                                    <a href="{{ route('ams.asset.view', ['id' => $asset->asset_id]) }}"
                                        class="inline-flex items-center justify-center text-gray-700 transition group hover:text-black">

                                        <!-- Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4 hover:scale-110">
                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path fill-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <!-- Tooltip -->
                                        <div
                                            class="absolute z-10 px-2 py-1 mb-2 text-xs text-white transition -translate-x-1/2 bg-black rounded opacity-0 pointer-events-none bottom-full left-1/2 whitespace-nowrap group-hover:opacity-100">
                                            View Details
                                        </div>
                                    </a>
                                </div>


                                <!-- View History -->
                                <div class="relative">
                                    <a href="assets/history"
                                        class="inline-flex items-center justify-center transition group text-amber-600 hover:text-amber-800">

                                        <!-- Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4 hover:scale-110">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <!-- Tooltip -->
                                        <div
                                            class="absolute z-10 px-2 py-1 mb-2 text-xs text-white transition -translate-x-1/2 bg-black rounded opacity-0 pointer-events-none bottom-full left-1/2 whitespace-nowrap group-hover:opacity-100">
                                            View History
                                        </div>
                                    </a>
                                </div>


                                <!-- Pull Out -->
                                <div class="relative">
                                    <a href="assets/pullout"
                                        class="inline-flex items-center justify-center text-red-700 transition group hover:text-red-900">
                                        <!-- Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4 hover:scale-110">
                                            <path
                                                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                                            <path fill-rule="evenodd"
                                                d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <!-- Tooltip -->
                                        <div
                                            class="absolute z-10 px-2 py-1 mb-2 text-xs text-white transition -translate-x-1/2 bg-black rounded opacity-0 pointer-events-none bottom-full left-1/2 whitespace-nowrap group-hover:opacity-100">
                                            Pull Out
                                        </div>
                                    </a>
                                </div>

                                <div class="relative">
                                    <a href="assets/repair-request"
                                        class="inline-flex items-center justify-center text-teal-700 transition group hover:text-teal-900">
                                        <!-- Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4 hover:scale-110">
                                            <path fill-rule="evenodd"
                                                d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z"
                                                clip-rule="evenodd" />
                                            <path
                                                d="m10.076 8.64-2.201-2.2V4.874a.75.75 0 0 0-.364-.643l-3.75-2.25a.75.75 0 0 0-.916.113l-.75.75a.75.75 0 0 0-.113.916l2.25 3.75a.75.75 0 0 0 .643.364h1.564l2.062 2.062 1.575-1.297Z" />
                                            <path fill-rule="evenodd"
                                                d="m12.556 17.329 4.183 4.182a3.375 3.375 0 0 0 4.773-4.773l-3.306-3.305a6.803 6.803 0 0 1-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 0 0-.167.063l-3.086 3.748Zm3.414-1.36a.75.75 0 0 1 1.06 0l1.875 1.876a.75.75 0 1 1-1.06 1.06L15.97 17.03a.75.75 0 0 1 0-1.06Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <!-- Tooltip -->
                                        <div
                                            class="absolute z-10 px-2 py-1 mb-2 text-xs text-white transition -translate-x-1/2 bg-black rounded opacity-0 pointer-events-none bottom-full left-1/2 whitespace-nowrap group-hover:opacity-100">
                                            Repair Request
                                        </div>
                                    </a>
                                </div>


                            </div>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="flex items-center justify-between px-4 text-sm text-gray-600">

                <div x-data="{ localPerPage: @entangle('perPage') }"
                    class="flex items-center gap-3 mt-4 text-sm text-gray-700">
                    <label for="perPage" class="text-gray-600">Show</label>
                    <select id="perPage" x-model="localPerPage" @change="$wire.set('perPage', parseInt(localPerPage))"
                        class="w-20 px-2 py-1 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-400 focus:border-blue-400">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                    </select>
                    <span>entries per page</span>
                </div>

                <!-- Pagination Links -->
                {{-- <div>
                    {{ $assets->links() }}
                </div> --}}
            </div>

        </div>
    </div>
</div>