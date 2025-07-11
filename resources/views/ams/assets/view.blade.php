<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'asset' => new stdClass()]"
    navbar_selected='Asset Management'>

    <div class="flex flex-1 flex-col lg:ml-52 overflow-y-auto py-10 px-5 lg:p-10 gap-7 mt-12 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class="rounded-md  bg-white shadow-lg -mt-7 ">
            <div class="flex h-14  border-b border-gray-200 relative" x-data="{ openCMS: false, openAssets: false }">

                <!-- Dashboard -->
                <div class="relative group  lg:mx-0 w-auto py-4 px-2 lg:p-4 text-center  border-b cursor-pointer">
                    <a href="/ams" class="block text-gray-600 hover:text-blue-800 font-inter">Dashboard</a>
                </div>

                <!-- CMS -->
                <div class="relative w-auto  lg:mx-0 py-4 px-2 lg:p-4 text-center border-b">
                    <button @click="openCMS = !openCMS; openAssets = false"
                        class="flex justify-center items-center gap-x-1 w-full font-inter transition-colors duration-150"
                        :class="openCMS ? 'text-blue-800 font-semibold' : 'text-gray-600 hover:text-blue-800'">
                        <span>CMS</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                            class="size-4 transition-transform duration-200" :class="{ 'rotate-180': openCMS }">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>


                    <!-- CMS Dropdown -->
                    <div x-show="openCMS" @click.outside="openCMS = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute left-1/2 -translate-x-1/2 mt-5 w-40 rounded-md border border-gray-200 bg-white shadow-lg z-10 min-w-fit text-left">
                        <a href="/ams/cms/branch-department"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-800">Branches
                            /
                            Departments</a>
                        <a href="/ams/cms/employees"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-800">Employees</a>
                        <a href="/ams/cms/asset-categories"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-800">Asset
                            Categories</a>
                        <a href="/ams/cms/asset-status"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-800">Asset
                            Status</a>
                    </div>
                </div>

                <!-- Assets -->
                <div class="relative w-auto py-4 px-2 lg:p-4 lg:mx-0 text-center border-b-2 border-blue-900">
                    <button @click="openAssets = !openAssets; openCMS = false"
                        class="flex justify-center items-center gap-x-1 w-full font-inter text-blue-800 font-semibold transition-colors duration-150"
                        :class="openAssets ? 'text-blue-800 font-semibold' : 'text-blue-800 hover:text-blue-800'">
                        <span>Assets</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                            class="size-4 transition-transform duration-200" :class="{ 'rotate-180': openAssets }">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>


                    <!-- Assets Dropdown -->
                    <div x-show="openAssets" @click.outside="openAssets = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute left-1/2 -translate-x-1/2 mt-5 w-40 rounded-md border border-gray-200 bg-white shadow-lg z-10 min-w-fit text-left">
                        <a href="/ams/all-assets"
                            class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-800">All
                            Assets</a>
                        <a href="/ams/common-assets"
                            class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-800">Available
                            Assets</a>
                        <a href="/ams/assets-for-sale"
                            class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-800">Assets
                            for Sale</a>
                    </div>
                </div>

                <!-- Scan QR -->
                <div class="relative group  lg:mx-0  w-auto py-4 px-2 lg:p-4 text-center border-b cursor-pointer">
                    <a href="/ams/scan-qr" class="block  text-gray-600">Scan QR</a>
                </div>
            </div>
        </div>

        <div
            class="@container/main rounded-md  bg-white justify-center items-center flex w-full flex-col shadow-lg -mt-4">
            <main x-data="{ selectedCategory: '', editMode: false }" class="space-y-1 w-full">
                <div class="flex flex-col justify-between w-full mt-0">
                    {{-- Breadcrumbs --}}
                    <div class="flex flex-wrap items-center gap-x-1 text-blue-900 text-sm px-2 pt-3 lg:p-5">
                        <a href="/ams" class="hover:underline">Asset Management</a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <a href="/ams/all-assets" class="hover:underline">Assets</a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <a href="/ams/all-assets" class="hover:underline">All Assets</a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <a href="#" class="hover:underline font-semibold "
                            x-text="editMode ? 'Edit Asset' : 'View Asset'">
                        </a>

                    </div>
                </div>

                {{-- CONTENT --}}
                <div x-data="{ showQR: false }" class="bg-transparent  px-6 pb-6 w-full max-w-6xl mx-auto space-y-3">
                    <input type="hidden" id="currentAssetId" value="{{ $asset->asset_id }}">
                    <!-- Header Info -->
                    <div class="grid grid-cols-4 items-start border-b border-gray-400 pb-3 w-full gap-3 -mt-2">

                        <div class="col-span-1 flex items-start gap-3">
                            <!-- Left: QR Button (Spans 3 rows) -->
                            <div x-data="{ showQR: false }" class="flex flex-col items-start relative group">

                                <button @click="showQR = true" :class="editMode ? '' : 'animate-pulseScale'"
                                    class="w-12  h-12 inline-flex items-center justify-center rounded-md bg-blue-900 text-white hover:bg-yellow-400 hover:scale-110 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        :class="editMode ? '' : ''" class="size-12">
                                        <path fill-rule="evenodd"
                                            d="M3 4.875C3 3.839 3.84 3 4.875 3h4.5c1.036 0 1.875.84 1.875 1.875v4.5c0 1.036-.84 1.875-1.875 1.875h-4.5A1.875 1.875 0 0 1 3 9.375v-4.5ZM4.875 4.5a.375.375 0 0 0-.375.375v4.5c0 .207.168.375.375.375h4.5a.375.375 0 0 0 .375-.375v-4.5a.375.375 0 0 0-.375-.375h-4.5Zm7.875.375c0-1.036.84-1.875 1.875-1.875h4.5C20.16 3 21 3.84 21 4.875v4.5c0 1.036-.84 1.875-1.875 1.875h-4.5a1.875 1.875 0 0 1-1.875-1.875v-4.5Zm1.875-.375a.375.375 0 0 0-.375.375v4.5c0 .207.168.375.375.375h4.5a.375.375 0 0 0 .375-.375v-4.5a.375.375 0 0 0-.375-.375h-4.5ZM6 6.75A.75.75 0 0 1 6.75 6h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75A.75.75 0 0 1 6 7.5v-.75Zm9.75 0A.75.75 0 0 1 16.5 6h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75ZM3 14.625c0-1.036.84-1.875 1.875-1.875h4.5c1.036 0 1.875.84 1.875 1.875v4.5c0 1.035-.84 1.875-1.875 1.875h-4.5A1.875 1.875 0 0 1 3 19.125v-4.5Zm1.875-.375a.375.375 0 0 0-.375.375v4.5c0 .207.168.375.375.375h4.5a.375.375 0 0 0 .375-.375v-4.5a.375.375 0 0 0-.375-.375h-4.5Zm7.875-.75a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Zm6 0a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75ZM6 16.5a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Zm9.75 0a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Zm-3 3a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Zm6 0a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div
                                    class="absolute -top-5 ml-10 mb-2 left-1/2 -translate-x-1/2 z-10 hidden group-hover:flex px-2 py-1 rounded bg-black text-white text-xs whitespace-nowrap">
                                    Show QR Code
                                </div>

                                <!-- QR Modal -->
                                <div x-show="showQR" x-transition
                                    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
                                    <div @click.outside="showQR = false"
                                        class="bg-white p-6 rounded-xl shadow-xl w-[350px] h-[350px] flex flex-col items-center justify-center relative">
                                        <img src="{{ asset('qr-code.png') }}" alt="QR Code"
                                            class="w-80 h-80 object-contain">
                                    </div>
                                </div>
                            </div>

                            <!-- Column 2: Asset Name -->
                            <div class="flex flex-col items-start text-left w-full">
                                <span class="text-xs font-semibold text-gray-600 mb-1">Asset Name</span>

                                <template x-if="!editMode">
                                    <div class="text-xl font-bold uppercase text-blue-800">
                                        {{ $asset->asset_name ?? 'NO DATA' }}
                                    </div>
                                </template>

                                <template x-if="editMode">
                                    <input type="text" name="asset_name"
                                        value="{{ old('asset_name', $asset->asset_name) }}"
                                        class="text-sm border border-gray-300 rounded-md px-2 py-1 w-full uppercase font-semibold text-blue-800 focus:ring-2 focus:ring-blue-500">
                                </template>
                            </div>
                        </div>

                        <!-- Column 3: Brand -->
                        <div class="flex flex-col items-start text-left w-full relative group">
                            <div class="flex items-center gap-1 mb-1">
                                <span class="text-xs font-semibold text-gray-600">Brand</span>

                                <!-- Info Icon + Tooltip (only in Edit Mode) -->
                                <template x-if="editMode">
                                    <div class="relative group">
                                        <div x-data="{
                tips: [
                    'For IT equipment or mobile devices, select a brand from the registered list.',
                    'For other assets, change the category first before assigning a brand.'
                ],
                index: 0,
                get currentTip() {
                    return this.tips[this.index];
                },
                init() {
                    setInterval(() => {
                        this.index = (this.index + 1) % this.tips.length;
                    }, 2500);
                }
            }" x-show="editMode" class="relative group">
                                            <!-- Tooltip Above Icon -->
                                            <div class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 w-64 text-xs text-white bg-black px-3 py-2 rounded-md shadow-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-30 text-center"
                                                x-text="currentTip"></div>

                                            <!-- Info SVG Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4 text-orange-500 cursor-pointer">
                                                <path fill-rule="evenodd"
                                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                </template>
                            </div>

                            <!-- View Mode -->
                            <template x-if="!editMode">
                                <div class="text-xl font-bold uppercase text-blue-800">
                                    @if (in_array($asset->category_id, [1, 6]))
                                        {{ $asset->brand->brand_name ?? 'NO DATA' }}
                                    @else
                                        {{ $asset->brand_name_custom ?? 'NO DATA' }}
                                    @endif
                                </div>
                            </template>

                            <!-- Edit Mode -->
                            <template x-if="editMode">
                                @if (in_array($asset->category_id, [1, 6]))
                                    <select name="brand_id"
                                        class="text-sm border border-gray-300 rounded-md px-2 py-1 w-full uppercase font-semibold text-blue-800 focus:ring-2 focus:ring-blue-500">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)

                                            @php
                                                $isSelected = $brand->brand_id == $asset->brand_id ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $brand->id }}" {{ $isSelected }}>
                                                {{ strtoupper($brand->brand_name) }}
                                            </option>


                                        @endforeach
                                    </select>
                                @else
                                    <input type="text" name="brand_name_custom"
                                        value="{{ old('brand_name_custom', $asset->brand_name_custom) }}"
                                        class="text-sm border border-gray-300 rounded-md px-2 py-1 w-full uppercase font-semibold text-blue-800 focus:ring-2 focus:ring-blue-500">
                                @endif
                            </template>
                        </div>


                        <!-- Column 4: Model -->
                        <div class="flex flex-col items-start text-left w-full">
                            <span class="text-xs font-semibold text-gray-600 mb-1">Model</span>

                            <template x-if="!editMode">
                                <div class="text-xl font-semibold uppercase text-blue-800">
                                    {{ $asset->model_name ?? 'NO DATA' }}
                                </div>
                            </template>

                            <template x-if="editMode">
                                <input type="text" name="model_name" value="{{ old('model_name', $asset->model_name) }}"
                                    class="text-sm border border-gray-300 rounded-md px-2 py-1 w-full uppercase font-semibold text-blue-800 focus:ring-2 focus:ring-blue-500">
                            </template>
                        </div>


                        <!-- Right: Toggle -->
                        <div class="pt-2 flex flex-col items-center">
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-medium text-gray-800 select-none"
                                    x-text="editMode ? 'Edit Mode' : 'View Mode'">
                                </span>

                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" x-model="editMode" class="sr-only peer">
                                    <div class="w-16 h-6 bg-blue-500 peer-checked:bg-yellow-400 rounded-full transition-all duration-300 
                            border-2 border-blue-700 peer-checked:border-yellow-600"></div>
                                    <div class="absolute -top-[6px] -left-[2px] peer-checked:left-[29px] border border-1 border-gray-400 w-9 h-9 rounded-full bg-white 
                            flex items-center justify-center transition-all duration-300 shadow-xl">
                                        <!-- Icons -->
                                        <template x-if="!editMode">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-6 text-blue-600">
                                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                        </template>
                                        <template x-if="editMode">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-6 text-yellow-700">
                                                <path
                                                    d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                <path
                                                    d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                            </svg>

                                        </template>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Group Cards: 2 Columns -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 overflow-visible">

                        <!-- Classification -->
                        <div @click="if (editMode) openSectionEditor('info')"
                            :class="['rounded-lg p-4 transform transition duration-200 ease-in-out bg-[#FAFBFF] hover:z-10 shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] hover:scale-110',editMode  ? 'border-l-[16px] border-yellow-400 animate-shake'  : 'border-l-[16px] border-blue-600']">
                            <div class="flex  items-center gap-x-2 mb-3 text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-4">
                                    <path fill-rule="evenodd"
                                        d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <h3 class="text-sm font-bold text-blue-700 uppercase flex flex-row">Asset
                                    Information
                                </h3>
                            </div>

                            <div class="grid grid-cols-1  gap-1 text-sm">
                                <!-- Column Items -->
                                <div class="flex justify-between">
                                    <span class="font-bold text-gray-600">Property Code:</span>
                                    <span class="text-gray-800">{{ $asset->property_code ?? 'NO DATA' }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="font-bold text-gray-600">Category:</span>
                                    <span
                                        class="text-gray-800">{{ $asset->category->category_name ?? 'NO DATA' }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="font-bold text-gray-600">Status:</span>
                                    <span class="text-gray-800">{{ $asset->status->status_name ?? 'NO DATA' }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="font-bold text-gray-600">Condition:</span>
                                    <span
                                        class="text-gray-800">{{ $asset->condition->condition_name ?? 'NO DATA' }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="font-bold text-gray-600">Device SN:</span>
                                    <span class="text-gray-800">{{ $asset->device_serial_number ?? 'NO DATA' }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="font-bold text-gray-600">Charger SN:</span>
                                    <span class="text-gray-800">{{ $asset->charger_serial_number ?? 'NO DATA' }}</span>
                                </div>
                            </div>
                        </div>


                        <!-- Maintenance -->
                        <div @click="editMode && openSectionEditor('maintenance')"
                            :class="['rounded-lg p-4 transform transition duration-200 ease-in-out bg-[#FAFBFF] hover:z-10 shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] hover:scale-110',editMode  ? 'border-l-[16px] border-yellow-400 animate-shake'  : 'border-l-[16px] border-blue-600']">
                            <div class="flex items-center gap-x-2 mb-3 text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-4">
                                    <path fill-rule="evenodd"
                                        d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <h3 class="text-sm font-bold text-blue-700 uppercase">Maintenance</h3>
                            </div>
                            <div class="grid grid-cols-1 gap-1 text-sm">
                                <div class="flex justify-between"><span class="font-bold text-gray-600">Next
                                        Maintenance Schedule:</span><span
                                        class="text-gray-800">{{ optional($asset->maint_sched)->format('F d, Y') ?? 'NO DATA' }}</span>
                                </div>
                                <div class="flex justify-between"><span class="font-bold text-gray-600">Last
                                        Maintenance:</span><span
                                        class="text-gray-800">{{ optional($asset->last_maint_sched)->format('F d, Y') ?? 'NO DATA' }}</span>
                                </div>
                                <div class="flex justify-between"><span class="font-bold text-gray-600">Maintenance
                                        Service Provider:</span><span
                                        class="text-gray-800">{{ $asset->service_provider ?? 'NO DATA' }}</span>
                                </div>
                                <div class="flex justify-between"><span class="font-bold text-gray-600">Check-Out
                                        Status:</span><span
                                        class="text-gray-800">{{ $asset->check_out_status ?? 'NO DATA' }}</span>
                                </div>
                                <div class="flex justify-between"><span class="font-bold text-gray-600">Check-Out
                                        Date:</span><span
                                        class="text-gray-800">{{ optional($asset->check_out_date)->format('F d, Y') ?? 'NO DATA' }}</span>
                                </div>
                                <div class="flex justify-between"><span class="font-bold text-gray-600">Check-In
                                        Date:</span><span
                                        class="text-gray-800">{{ optional($asset->check_in_date)->format('F d, Y') ?? 'NO DATA' }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Assignment -->
                        <div @click="editMode && openSectionEditor('assignment')"
                            :class="['rounded-lg p-4 transform transition duration-200 ease-in-out bg-[#FAFBFF] hover:z-10 shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] hover:scale-110', editMode  ? 'border-l-[16px] border-yellow-400 animate-shake' : 'border-l-[16px] border-blue-600']">
                            <div class="flex items-center gap-x-2 mb-3 text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-4">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <h3 class="text-sm font-bold text-blue-700 uppercase">Assignment</h3>
                            </div>
                            <div class="grid grid-cols-1 gap-1 text-sm">
                                <div class="flex justify-between"><span class="font-bold text-gray-600">Assigned
                                        To:</span>
                                    <span class="text-gray-800">

                                        @if ($asset->asset_type === '2')
                                            {{ strtoupper(($asset->employee->employee_lastname ?? '') . ', ' . ($asset->employee->employee_firstname ?? '')) }}
                                        @elseif ($asset->asset_type === '1')
                                            {{ strtoupper($asset->department->department_name ?? 'NO DATA') }}
                                        @else
                                            NO DATA
                                        @endif
                                    </span>
                                </div>
                                <div class="flex justify-between"><span class="font-bold text-gray-600">Date
                                        Assigned:</span>
                                    <span
                                        class="text-gray-800">{{ optional($asset->date_accountable)->format('F d, Y') ?? 'NO DATA' }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Warranty -->
                        <div @click="editMode && openSectionEditor('warranty')"
                            :class="[ 'rounded-lg p-4 transform transition duration-200 ease-in-out bg-[#FAFBFF] hover:z-10 shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] hover:scale-110',editMode  ? 'border-l-[16px] border-yellow-400 animate-shake' : 'border-l-[16px] border-blue-600']">
                            <div class="flex items-center gap-x-2 mb-3 text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-4">
                                    <path fill-rule="evenodd"
                                        d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <h3 class="text-sm font-bold text-blue-700 uppercase">Warranty</h3>
                            </div>
                            <div class="grid grid-cols-1 gap-1 text-sm">
                                <div class="flex justify-between"><span class="font-bold text-gray-600">Purchase
                                        Date:</span><span
                                        class="text-gray-800">{{ optional($asset->purchase_date)->format('F d, Y') ?? 'NO DATA' }}</span>
                                </div>
                                <div class="flex justify-between"><span class="font-bold text-gray-600">Warranty
                                        Expiration Date:</span><span
                                        class="text-gray-800">{{ optional($asset->warranty_exp_date)->format('F d, Y') ?? 'NO DATA' }}</span>
                                </div>
                            </div>
                        </div>



                        <!-- Description -->
                        @if ($asset->description)
                            <div @click="editMode && openSectionEditor('description')" :class="['rounded-lg p-4 transform transition duration-200 ease-in-out bg-[#FAFBFF] hover:z-10 shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] hover:scale-110',editMode  ? 'border-l-[16px] border-yellow-400 animate-shake' : 'border-l-[16px] border-blue-600'
                                                                                                                        ]">
                                <div class="flex items-center gap-x-2 mb-3 text-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4">
                                        <path fill-rule="evenodd"
                                            d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625ZM7.5 15a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 7.5 15Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H8.25Z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                                    </svg>

                                    <h3 class="text-sm font-bold text-blue-700 uppercase">Description</h3>
                                </div>
                                <p class="text-sm text-gray-800 text-justify">{{ $asset->description }}</p>
                            </div>
                        @endif


                    </div>

                    <livewire:ams.asset.edit-asset-modal />


                    <div class="flex justify-end gap-x-3 mt-6">
                        <!-- Back Button -->
                        <a href="/ams/all-assets"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-900 text-white rounded-md text-sm hover:bg-blue-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Back to Assets List
                        </a>
                    </div>
                </div>
            </main>
        </div>

        <script>
            function openSectionEditor(cardId) {
                // Get the asset ID from a hidden input field or global JS variable
                const assetId = document.getElementById('currentAssetId')?.value;

                if (!assetId) {
                    console.error("Asset ID not found.");
                    return;
                }
                const payload = {
                    section: cardId,
                    assetId: assetId
                };

                // Log values for debugging
                console.log("Card ID:", cardId);
                console.log("Asset ID:", assetId);
                console.log('Dispatching to Livewire with:', payload);

                // Dispatch Livewire event with section and asset ID
                Livewire.dispatch('open-edit-asset-modal', { payload });
            }
        </script>
        <script>
            window.addEventListener('open-edit-asset-modal', event => {
                console.log('Event received:', event.detail);
            });
        </script>


</x-app-layout>