<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'asset' => new stdClass()]"
    navbar_selected='Asset Management'>

    <div class="flex flex-1 flex-col lg:ml-52 mt-12 overflow-y-auto py-10 px-5 lg:p-10 gap-7 bg-[#f3f4f6] ">
        <!-- Options Container -->
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-7">
            <div class="flex h-14 border-b border-gray-200 relative" x-data="{ openCMS: false, openAssets: false }">

                <!-- Dashboard -->
                <div class="relative group  lg:mx-0  w-auto py-4 px-2 lg:p-4 text-center border-b cursor-pointer">
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
                        class="absolute text-start left-1/2 -translate-x-1/2 mt-5 w-40 rounded-md border border-gray-200 bg-white shadow-lg z-10">
                        <a href="/ams/cms/branch-department"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-800">Branches
                            / Departments</a>
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
                <div
                    class="relative group  lg:mx-0 w-auto py-4 px-2 lg:p-4 text-center  lg:border-b-2 border-blue-900 cursor-pointer">
                    <button @click="openAssets = !openAssets; openCMS = false"
                        class="flex justify-center items-center gap-x-1 w-full font-inter transition-colors duration-150"
                        :class="openAssets ? 'text-blue-800 font-semibold' : 'text-blue-800 font-semibold hover:text-blue-800'">
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
                        class="absolute text-start left-1/2 -translate-x-1/2 mt-5 w-40 rounded-md border border-gray-200 bg-white shadow-lg z-10">
                        <a href="/ams/all-assets"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-800">All
                            Assets</a>
                        <a href="/ams/common-assets"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-800">Available
                            Assets</a>
                        <a href="/ams/assets-for-sale"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-800">Assets
                            for Sale</a>
                    </div>
                </div>

                <!-- Scan QR -->
                <div class="relative group  lg:mx-0 w-auto py-4 px-2 lg:p-4 text-center border-b  cursor-pointer">
                    <a href="/ams/scan-qr" class="block text-gray-600 hover:text-blue-800 font-inter">Scan QR</a>
                </div>
            </div>
        </div>


        <!-- Header Section -->
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-col justify-between">

                <!-- Breadcrumbs -->
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
                    <a href="/ams/all-assets" class="hover:underline font-semibold">All Assets</a>
                </div>

                <!-- Header Title and Controls -->
                <div
                    class="flex flex-col sm:flex-row items-start sm:items-center justify-between -mt-6 px-5 py-6 gap-4">

                    <!-- Left: Page Title -->
                    <div>
                        <h2 class="font-semibold text-lg text-[#071d49]">Manage AAP Assets</h2>
                        <p class="text-gray-900 text-sm">Add, Edit, View Details, See History and Pull Out Assets</p>
                    </div>

                    <!-- Right: Controls (search+filter + button) -->
                    <div class="flex flex-row flex-wrap items-stretch gap-3 w-full sm:w-auto sm:justify-end">

                        <!-- Search + Filter Combo -->
                        <div x-data="{ open: false }" class="relative flex flex-1 min-w-0 sm:w-72">
                            <div
                                class="flex items-center flex-grow bg-white border border-gray-300 rounded-lg shadow-sm w-full">

                                <!-- Search Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5 text-gray-400 ml-3">
                                    <path fill-rule="evenodd"
                                        d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <!-- Search Input -->
                                <input type="text" placeholder="SEARCH"
                                    class="uppercase text-sm px-2 py-2 w-full bg-transparent border-white outline-none focus:outline-none focus:ring-0 focus:border-white">

                                <!-- Filter Icon -->
                                <button @click="open = !open"
                                    class="p-2 border-l border-gray-300 hover:bg-gray-100 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5 text-gray-700">
                                        <path
                                            d="M18.75 12.75h1.5a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM12 6a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 6ZM12 18a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 18ZM3.75 6.75h1.5a.75.75 0 1 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM5.25 18.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 0 1.5ZM3 12a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 12ZM9 3.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM12.75 12a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0ZM9 15.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Filter Dropdown -->
                            <!-- Filter Dropdown -->
                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 mt-10 w-full sm:w-72 bg-white border border-gray-200 rounded-md shadow-lg z-50 text-sm">

                                <div class="p-3 space-y-2 text-gray-700">

                                    <!-- CATEGORY -->
                                    <div>
                                        <div class="flex items-center gap-1 mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4 text-gray-500">
                                                <path
                                                    d="M12.378 1.602a.75.75 0 0 0-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03ZM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 0 0 .372-.648V7.93ZM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 0 0 .372.648l8.628 5.033Z" />
                                            </svg>
                                            <label class="block text-xs font-medium text-gray-500">CATEGORY</label>
                                        </div>
                                        <select id="category"
                                            class="uppercase w-full rounded-md border-gray-300 shadow-sm text-xs focus:ring-blue-600 focus:border-blue-600">
                                            <option value="">ALL CATEGORIES</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ strtoupper($category->category_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <!-- STATUS -->
                                    <div>
                                        <div class="flex items-center gap-1 mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4 text-gray-500">
                                                <path fill-rule="evenodd"
                                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                                    clip-rule="evenodd" />
                                            </svg>


                                            <label class="block text-xs font-medium text-gray-500">STATUS</label>
                                        </div>
                                        <select id="status"
                                            class="uppercase w-full rounded-md border-gray-300 shadow-sm text-xs focus:ring-blue-600 focus:border-blue-600">
                                            <option value="">ALL STATUS</option>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}">{{ strtoupper($status->status_name) }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <!-- CONDITION -->
                                    <div>
                                        <div class="flex items-center gap-1 mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4 text-gray-500">
                                                <path fill-rule="evenodd"
                                                    d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <label class="block text-xs font-medium text-gray-500">CONDITION</label>
                                        </div>
                                        <select id="condition"
                                            class="uppercase w-full rounded-md border-gray-300 shadow-sm text-xs focus:ring-blue-600 focus:border-blue-600">
                                            <option value="">ALL CONDITIONS</option>
                                            @foreach ($conditions as $condition)
                                                <option value="{{ $condition->id }}">
                                                    {{ strtoupper($condition->condition_name) }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <!-- DEPARTMENT -->
                                    <div>
                                        <div class="flex items-center gap-1 mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4 text-gray-500">
                                                <path fill-rule="evenodd"
                                                    d="M4.5 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5h-.75V3.75a.75.75 0 0 0 0-1.5h-15ZM9 6a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm-.75 3.75A.75.75 0 0 1 9 9h1.5a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM9 12a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm3.75-5.25A.75.75 0 0 1 13.5 6H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM13.5 9a.75.75 0 0 0 0 1.5H15A.75.75 0 0 0 15 9h-1.5Zm-.75 3.75a.75.75 0 0 1 .75-.75H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM9 19.5v-2.25a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.75.75h-4.5A.75.75 0 0 1 9 19.5Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <label class="block text-xs font-medium text-gray-500">DEPARTMENT</label>
                                        </div>
                                        <select id="department"
                                            class="uppercase w-full rounded-md border-gray-300 shadow-sm text-xs focus:ring-blue-600 focus:border-blue-600">
                                            <option value="">ALL DEPARTMENTS</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">
                                                    {{ strtoupper($department->department_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- APPLY FILTERS BUTTON -->
                                    <div class="pt-2">
                                        <button onclick="applyLivewireFilters()" type="button"
                                            class="w-full flex items-center justify-center gap-2 bg-blue-900 text-white text-xs font-semibold px-3 py-2 rounded-md shadow hover:bg-blue-800 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                            APPLY FILTERS
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add Asset Button -->
                        <a href="assets/create"
                            class="flex items-center justify-center gap-2 rounded-md bg-blue-900 px-4 py-2 text-sm text-white transition-colors hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400 w-full sm:w-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <span>Add New Asset</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Livewire Component -->
            <livewire:ams.asset.asset-list />
        </div>
    </div>
    <script>
        function applyLivewireFilters() {
            const category = document.getElementById('category')?.value;
            const status = document.getElementById('status')?.value;
            const condition = document.getElementById('condition')?.value;
            const department = document.getElementById('department')?.value;

            if (window.livewire && typeof window.livewire.emit === 'function') {
                window.livewire.emit('applyFilters', category, status, condition, department);
            } else {
                console.error('Livewire is not available or emit is not a function.');
            }
        }
    </script>


</x-app-layout>