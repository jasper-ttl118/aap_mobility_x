@props(['asset', 'section'])

<div x-data="{
    showConfirm: false,
    open: @entangle('showModal'),
    init() {
        const self = this;
        window.Livewire.on('show-save-confirm', () => {
        console.log('Received Livewire show-save-confirm');
            self.showConfirm = true;
        });
        window.Livewire.on('close-edit-modal', () => {
            self.open = false;
        });
    }
}" x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60" x-transition>

    <div @click.away="$wire.closeModal()" class="w-[600px] max-w-full bg-white rounded-2xl  overflow-visible">

        <!-- Blue Header Section -->
        <div
            class="w-full bg-blue-900 text-white px-6 pb-3 flex items-center gap-x-3 border-t-[16px] border-blue-900 rounded-t-2xl">

            @if ($section === 'name')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                    clip-rule="evenodd" />
            </svg>
            <h2 class="text-xl font-bold">Edit Asset Information</h2>

            @elseif ($section === 'info')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                    clip-rule="evenodd" />
            </svg>
            <h2 class="text-xl font-bold">Edit Asset Information</h2>

            @elseif ($section === 'maintenance')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <h2 class="text-xl font-bold">Edit Maintenance Information</h2>

            @elseif ($section === 'assignment')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                    clip-rule="evenodd" />
            </svg>
            <h2 class="text-xl font-bold">Edit Assignment Information</h2>

            @elseif ($section === 'warranty')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                    clip-rule="evenodd" />
            </svg>
            <h2 class="text-xl font-bold">Edit Warranty Information</h2>

            @elseif ($section === 'description')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625ZM7.5 15a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 7.5 15Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H8.25Z"
                    clip-rule="evenodd" />
                <path
                    d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
            </svg>
            <h2 class="text-xl font-bold">Edit Description</h2>
            @endif
        </div>


        <!-- Modal Body -->
        <div class="px-6 py-6 space-y-6">
            @csrf
            @if ($asset)
            @if ($section === 'name')
            <div x-data="{ categoryId: @entangle('category_id') }" class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- ASSET NAME -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Asset Name</label>
                    <input type="text" wire:model.defer="asset_name" placeholder="ASSET NAME"
                        class="form-input mt-1 w-full uppercase text-sm border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">

                    @error('asset_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message}}</p>
                    @enderror
                </div>

                <!-- MODEL NAME -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Model Name</label>
                    <input type="text" wire:model.defer="model_name" placeholder="MODEL NAME"
                        class="form-input mt-1 w-full uppercase text-sm border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                    @error('model_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message}}</p>
                    @enderror
                </div>

                <!-- BRAND -->
                <div x-data="{ open: false, categoryId: @entangle('category_id'), brandId: @entangle('brand_id'),
                                                                                                           selected: '{{ in_array($asset->category_id, [1, 6]) && $asset->brand ? strtoupper($asset->brand->brand_name) : 'SELECT BRAND' }}',
                                                                                                           toggle(id, label) { this.brandId = id; this.selected = label; this.open = false; $wire.set('brand_id', id); },
                                                                                                           init() {
                                                                                                               this.$watch('categoryId', (value) => {
                                                                                                                   if (!['1', '6'].includes(String(value))) {
                                                                                                                       this.brandId = '';
                                                                                                                       this.selected = 'BRAND NAME';
                                                                                                                   } else if (!this.selected || this.selected === 'BRAND NAME') {
                                                                                                                       this.selected = 'SELECT BRAND';
                                                                                                                   }
                                                                                                               });
                                                                                                           } }"
                    x-init="init" class="relative w-full md:col-span-1">

                    <label class="block text-sm font-medium text-gray-700 flex justify-between items-center">
                        Brand Name
                        <div class="relative group inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="size-5 hover:bg-orange-400 hover:text-white rounded-full text-orange-500 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                            <div
                                class="absolute left-full mt-8 -translate-y-1/2 ml-2 w-64 z-10 p-3 border-l-4 border-orange-400 bg-orange-50 rounded-md shadow text-xs text-justify text-orange-800 opacity-0 group-hover:opacity-90 pointer-events-none transition-opacity duration-300">
                                <p>
                                    If you're updating the asset to an IT Equipment or Mobile Device, change the
                                    <strong>Category</strong> first. Then, choose a brand from the dropdown list.
                                    For other asset types, manually enter the brand name.
                                </p>
                            </div>
                        </div>
                    </label>

                    <!-- IT/Mobile Brand Dropdown -->
                    <template x-if="['1','6'].includes(String(categoryId))">
                        <div class="relative">
                            <button type="button" @click="open = !open"
                                class="mt-1 w-full bg-white border border-gray-300 rounded-md shadow-sm px-4 py-2 text-left text-sm uppercase font-semibold text-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                                <span x-text="selected"></span>
                                <svg class="absolute right-3 top-4 w-4 h-4 text-gray-500 pointer-events-none"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <ul x-show="open" @click.outside="open = false" x-transition
                                class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                                <li @click="toggle('', 'SELECT BRAND')"
                                    class="cursor-pointer px-4 py-2 hover:bg-blue-200 uppercase">
                                    SELECT BRAND
                                </li>
                                @foreach ($brands as $brand)
                                <li @click="toggle('{{ $brand->brand_id }}', '{{ strtoupper($brand->brand_name) }}')"
                                    class="cursor-pointer px-4 py-2 hover:bg-blue-200 uppercase">
                                    {{ strtoupper($brand->brand_name) }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </template>

                    <!-- Other Categories: Brand Name Text -->
                    <template x-if="!['1','6'].includes(String(categoryId))">
                        <input type="text" wire:model.defer="brand_name_custom" placeholder="BRAND NAME"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm uppercase font-semibold text-blue-800" />
                        @if ($errors->has('model_name'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('model_name') }}</p>
                        @endif

                    </template>
                </div>
            </div>

            @elseif ($section === 'info')
            <div x-data="{ categoryId: @entangle('category_id') }" class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Property Code (Disabled) -->
                <div class="relative group">
                    <label class="block text-sm font-medium text-gray-700">Property Code</label>
                    <input type="text" class="form-input mt-1 w-full cursor-not-allowed bg-gray-100 text-gray-500"
                        value="{{ $asset->property_code }}" disabled>
                    <div
                        class="absolute left-0 -top-6 z-10 hidden group-hover:flex px-3 py-1 bg-black text-white text-xs rounded shadow-lg">
                        Property codes are auto-generated
                    </div>
                </div>

                <!-- Category -->
                <div x-data="{
                                                                                                    open: false,
                                                                                                    selected: '{{ $asset->category->category_name ?? '' }}',
                                                                                                    categoryValue: @entangle('category_id'),
                                                                                                }"
                    class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <button type="button" @click="open = !open"
                        class="mt-1 w-full bg-white border border-gray-300 rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                        <span x-text="selected" class="block truncate"></span>
                        <svg class="absolute right-3 mt-6 top-3 w-4 h-4 text-gray-500 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown List -->
                    <ul x-show="open" @click.outside="open = false" x-transition
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                        <li @click="selected = 'SELECT CATEGORY'; categoryValue = ''; open = false"
                            class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                            SELECT CATEGORY
                        </li>
                        @foreach ($categories as $category)
                        <li @click="selected = '{{ strtoupper($category->category_name) }}'; categoryValue = '{{ $category->category_id }}'; open = false"
                            class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                            {{ strtoupper($category->category_name) }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Status -->
                <div x-data="{
                                                                                                    open: false,
                                                                                                    selected: '{{ optional($statuses->firstWhere('status_id', $status_id))->status_name ?? '' }}',
                                                                                                    value: @entangle('status_id')
                                                                                                }"
                    class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <button type="button" @click="open = !open"
                        class="mt-1 w-full bg-white border border-gray-300 rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                        <span x-text="selected" class="block truncate"></span>
                        <svg class="absolute right-3 mt-6 top-3 w-4 h-4 text-gray-500 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <ul x-show="open" @click.outside="open = false" x-transition
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                        @foreach ($statuses as $status)
                        <li @click="selected = '{{ strtoupper($status->status_name) }}'; value = '{{ $status->status_id }}'; open = false"
                            class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                            {{ strtoupper($status->status_name) }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Condition -->
                <div x-data="{
                                                                                                    open: false,
                                                                                                    selected: '{{ optional($conditions->firstWhere('condition_id', $condition_id))->condition_name ?? '' }}',
                                                                                                    value: @entangle('condition_id')
                                                                                                }"
                    class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700">Condition</label>
                    <button type="button" @click="open = !open"
                        class="mt-1 w-full bg-white border border-gray-300 rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                        <span x-text="selected" class="block truncate"></span>
                        <svg class="absolute right-3 mt-6 top-3 w-4 h-4 text-gray-500 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <ul x-show="open" @click.outside="open = false" x-transition
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                        @foreach ($conditions as $condition)
                        <li @click="selected = '{{ strtoupper($condition->condition_name) }}'; value = '{{ $condition->condition_id }}'; open = false"
                            class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                            {{ strtoupper($condition->condition_name) }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Device Serial Number -->
                <div x-show="['1', '6'].includes(String(categoryId))" x-cloak>
                    <label class="block text-sm font-medium text-gray-700">Device Serial Number</label>
                    <input type="text" wire:model.defer="device_serial_number"
                        class="form-input mt-1 w-full text-sm uppercase">
                </div>

                <!-- Charger Serial Number -->
                <div x-show="['1', '6'].includes(String(categoryId))" x-cloak>
                    <label class="block text-sm font-medium text-gray-700">Charger Serial Number</label>
                    <input type="text" wire:model.defer="charger_serial_number"
                        class="form-input mt-1 w-full text-sm uppercase">
                </div>
            </div>

            @elseif ($section === 'maintenance')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Next Maintenance Schedule -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Next Maintenance Schedule</label>
                    <input type="date" wire:model.defer="maint_sched" class="form-input mt-1 w-full">
                </div>

                <!-- Last Maintenance -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Last Maintenance</label>
                    <input type="date" wire:model.defer="last_maint_sched" class="form-input mt-1 w-full">
                </div>

                <!-- Service Provider -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Service Provider</label>
                    <input type="text" wire:model.defer="service_provider"
                        class="form-input mt-1 w-full text-sm uppercase">
                </div>

                <!-- Check-Out Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Check-Out Status</label>
                    <input type="text" wire:model.defer="check_out_status"
                        class="form-input mt-1 w-full text-sm uppercase">
                </div>

                <!-- Check-Out Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Check-Out Date</label>
                    <input type="date" wire:model.defer="check_out_date" class="form-input mt-1 w-full">
                </div>

                <!-- Check-In Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Check-In Date</label>
                    <input type="date" wire:model.defer="check_in_date" class="form-input mt-1 w-full">
                </div>
            </div>

            @elseif ($section === 'assignment')
            <div x-data="{ assetType: @entangle('asset_type') }" class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Asset Type -->
                <div x-data="{
                                                                                open: false,
                                                                                selected: '{{ $asset_type == '2' ? 'NON-COMMON ASSET' : ($asset_type == '1' ? 'COMMON ASSET' : 'SELECT ASSET TYPE') }}',
                                                                                assetTypeValue: @entangle('asset_type')
                                                                            }" class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700">Asset Type</label>

                    <button type="button" @click="open = !open"
                        class="mt-1 w-full bg-white border border-gray-300 rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                        <span x-text="selected"></span>
                        <svg class="absolute right-3 mt-6 top-3 w-4 h-4 text-gray-500 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <ul x-show="open" @click.outside="open = false" x-transition
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                        <li @click="selected = 'COMMON ASSET'; assetTypeValue = '1'; open = false"
                            class="cursor-pointer px-4 py-2 hover:bg-blue-200 uppercase">
                            COMMON ASSET
                        </li>
                        <li @click="selected = 'NON-COMMON ASSET'; assetTypeValue = '2'; open = false"
                            class="cursor-pointer px-4 py-2 hover:bg-blue-200 uppercase">
                            NON-COMMON ASSET
                        </li>
                    </ul>
                </div>

                <!-- Assigned To -->
                <div x-data="{
                                                                                open: false,
                                                                                assetType: @entangle('asset_type'),
                                                                                departmentId: @entangle('department_id'),
                                                                                employeeId: @entangle('employee_id'),
                                                                                selected: '',

                                                                                toggle(item, label) {
                                                                                    if (this.assetType == 1) {
                                                                                        this.departmentId = item;
                                                                                    } else {
                                                                                        this.employeeId = item;
                                                                                    }
                                                                                    this.selected = label;
                                                                                    this.open = false;
                                                                                },

                                                                                init() {
                                                                                    this.selected = '{{ 
                                                                                        $asset_type == '2'
                    ? (isset($asset->employee)
                        ? strtoupper($asset->employee->employee_lastname . ', ' . $asset->employee->employee_firstname)
                        : 'SELECT EMPLOYEE')
                    : (isset($asset->department)
                        ? strtoupper($asset->department->department_name)
                        : 'SELECT DEPARTMENT')
                                                                                    }}';

                                                                                    this.$watch('assetType', (value) => {
                                                                                        this.selected = value == '1' ? 'SELECT DEPARTMENT' :
                                                                                                        value == '2' ? 'SELECT EMPLOYEE' :
                                                                                                        'ASSIGNED TO';
                                                                                    });
                                                                                }
                                                                            }" x-init="init" class="relative w-full">

                    <label class="block text-sm font-medium text-gray-700">Assigned To</label>

                    <button type="button" @click="open = !open"
                        class="mt-1 w-full bg-white border border-gray-300 rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                        <span x-text="selected"></span>
                        <svg class="absolute right-3 mt-6 top-3 w-4 h-4 text-gray-500 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Options -->
                    <ul x-show="open" @click.outside="open = false" x-transition
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">

                        <!-- Show Departments -->
                        <template x-if="assetType == 1">
                            <div>
                                <li @click="toggle('', 'SELECT DEPARTMENT')"
                                    class="cursor-pointer px-4 py-2 hover:bg-blue-200 uppercase">
                                    SELECT DEPARTMENT
                                </li>
                                @foreach ($departments as $dept)
                                <li @click="toggle('{{ $dept->department_id }}', '{{ strtoupper($dept->department_name) }}')"
                                    class="cursor-pointer px-4 py-2 hover:bg-blue-200 uppercase">
                                    {{ strtoupper($dept->department_name) }}
                                </li>
                                @endforeach
                            </div>
                        </template>

                        <!-- Show Employees -->
                        <template x-if="assetType == 2">
                            <div>
                                <li @click="toggle('', 'SELECT EMPLOYEE')"
                                    class="cursor-pointer px-4 py-2 hover:bg-blue-200 uppercase">
                                    SELECT EMPLOYEE
                                </li>
                                @foreach ($employees as $emp)
                                <li @click="toggle('{{ $emp->employee_id }}', '{{ strtoupper($emp->employee_lastname) }}, {{ strtoupper($emp->employee_firstname) }}')"
                                    class="cursor-pointer px-4 py-2 hover:bg-blue-200 uppercase">
                                    {{ strtoupper($emp->employee_lastname) }},
                                    {{ strtoupper($emp->employee_firstname) }}
                                </li>
                                @endforeach
                            </div>
                        </template>
                    </ul>
                </div>

                <!-- Date Assigned -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Date Assigned</label>
                    <input type="date" wire:model.defer="date_accountable" class="form-input mt-1 w-full">
                </div>

            </div>

            @elseif ($section === 'warranty')
            <div x-data="{
    purchaseDate: @entangle('purchase_date'),
    expirationDate: @entangle('warranty_exp_date'),
    freeReplacementDate: @entangle('free_replacement_period'),

    warrantyYears: 0,
    freeReplacementValue: 0,
    freeReplacementUnit: 'days',

    init() {
        this.computeWarrantyYears();
        this.computeFreeReplacementPeriod();

        this.$watch('warrantyYears', value => {
            if (this.purchaseDate && value >= 0) {
                const base = new Date(this.purchaseDate);
                const clone = new Date(base.getTime());
                clone.setFullYear(clone.getFullYear() + Number(value));
                this.expirationDate = clone.toISOString().split('T')[0];
            }
        });

        this.$watch('purchaseDate', () => {
            this.computeWarrantyYears();
            this.computeFreeReplacementDate();
        });

        this.$watch('expirationDate', () => this.computeWarrantyYears());
        this.$watch('freeReplacementValue', () => this.computeFreeReplacementDate());
        this.$watch('freeReplacementUnit', () => this.computeFreeReplacementDate());
    },

    computeWarrantyYears() {
        if (this.purchaseDate && this.expirationDate) {
            const p = new Date(this.purchaseDate);
            const e = new Date(this.expirationDate);
            let years = e.getFullYear() - p.getFullYear();
            const m = e.getMonth() - p.getMonth();
            const d = e.getDate() - p.getDate();
            if (m < 0 || (m === 0 && d < 0)) years--;
            this.warrantyYears = years;
        }
    },

    computeFreeReplacementDate() {
    if (!this.purchaseDate || this.freeReplacementValue === null) return;

    const [year, month, day] = this.purchaseDate.split('-').map(Number);
    const date = new Date(year, month - 1, day); // local time

    const value = Number(this.freeReplacementValue); // FIX: force numeric
    const daysToAdd = this.freeReplacementUnit === 'weeks'
        ? value * 7
        : value;

    date.setDate(date.getDate() + daysToAdd);

    const yyyy = date.getFullYear();
    const mm = String(date.getMonth() + 1).padStart(2, '0');
    const dd = String(date.getDate()).padStart(2, '0');

    this.freeReplacementDate = `${yyyy}-${mm}-${dd}`;
}

,

    computeFreeReplacementPeriod() {
        if (this.purchaseDate && this.freeReplacementDate) {
            const p = new Date(this.purchaseDate);
            const f = new Date(this.freeReplacementDate);
            const diffDays = Math.ceil((f - p) / (1000 * 60 * 60 * 24));

            if (diffDays > 30) {
                this.freeReplacementUnit = 'weeks';
                this.freeReplacementValue = Math.round(diffDays / 7);
            } else {
                this.freeReplacementUnit = 'days';
                this.freeReplacementValue = diffDays;
            }
        }
    }
}" x-init="init" class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Purchase Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Purchase Date</label>
                    <input type="date" x-model="purchaseDate" class="form-input mt-1 w-full">
                    @error('purchase_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Free Replacement Period -->
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Free Replacement Period</label>
                    <div class="flex gap-3">
                        <input type="number" min="0" x-model="freeReplacementValue"
                            class="form-input mt-1 w-full text-sm" placeholder="Enter duration">
                        <select x-model="freeReplacementUnit"
                            class="form-select mt-1 w-40 rounded-md border-gray-300 focus:ring-blue-600 focus:border-blue-600 text-sm">
                            <option value="days">Days</option>
                            <option value="weeks">Weeks</option>
                        </select>
                    </div>
                    <input type="hidden" x-model="freeReplacementDate">
                </div>

                <!-- Warranty Expiration Years -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Warranty Period (Years)</label>
                    <input type="number" min="0" x-model="warrantyYears" class="form-input mt-1 w-full"
                        placeholder="Enter years">
                </div>

                <!-- Warranty Expiration Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Warranty Expiration Date</label>
                    <input type="date" x-model="expirationDate" class="form-input mt-1 w-full">
                    @error('warranty_exp_date')
                    <p class="text-red-500 text-xs mt-1">The warranty expiration date field must be a date after or
                        equal to purchase date</p>
                    @enderror
                </div>


            </div>

            @elseif ($section === 'description')
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea rows="5" wire:model.defer="description"
                    class="form-input mt-1 w-full text-sm text-gray-800 border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600"></textarea>
            </div>
            @endif

            @else
            <p class="text-gray-500">Loading asset details...</p>
            @endif
        </div>



        <!-- Modal Footer -->
        <div class="px-6 py-2 border-t bg-gray-50 flex justify-end gap-2 rounded-b-2xl" x-data="{ showConfirm: false }">
            <!-- Trigger Confirm Modal -->
            <!-- Save Button -->
            <button @click="$wire.checkBeforeSave()"
                class="bg-blue-700 hover:bg-blue-600 text-white font-medium px-5 py-2 rounded-md shadow-sm transition">
                Save
            </button>


            <!-- Cancel/Close -->
            <button @click="open = false"
                class="bg-white text-gray-700 hover:bg-gray-100 border border-gray-300 font-medium px-5 py-2 rounded-md shadow-sm transition duration-150 ease-in-out">
                Cancel
            </button>
        </div>
    </div>
    <!-- Confirmation Modal -->
    <div x-show="showConfirm" x-transition
        class="fixed inset-0 z-60 flex items-center justify-center bg-black bg-opacity-60">
        <div @click.away="showConfirm = false" class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md space-y-4">

            <h3 class="text-lg font-semibold text-gray-800">Save Changes?</h3>
            <p class="text-sm text-gray-600">Are you sure you want to apply the changes to this asset?</p>

            <div class="flex justify-end gap-3 mt-4">
                <button @click="showConfirm = false"
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-md">
                    Cancel
                </button>
                <button @click="$wire.save(); showConfirm = false; open = false"
                    class="px-4 py-2 bg-blue-700 hover:bg-blue-600 text-white text-sm font-medium rounded-md">
                    Confirm
                </button>
            </div>
        </div>
    </div>
</div>