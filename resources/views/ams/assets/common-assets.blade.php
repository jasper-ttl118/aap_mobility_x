<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'common' => new stdClass()]"
    navbar_selected='Asset Management'>

    <div class="flex flex-1 flex-col lg:ml-52 overflow-y-auto py-10 px-5 lg:py-10 lg:pl-5 lg:pr-2 gap-7 mt-12 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-7">
            <div class="flex h-14 border-b border-gray-200 relative" x-data="{ openCMS: false, openAssets: false }">

                <x-ams.submodules selected="Available Assets" />
            </div>
        </div>

        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-col justify-between">
                {{-- Breadcrumbs --}}
                <div class="flex flex-wrap items-center gap-x-1 text-blue-900 text-sm px-2 pt-3 lg:p-5">
                    <a href="/ams" class="hover:underline">Asset Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="/ams/all-assets" class="hover:underline ">Assets</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>

                    <a href="/ams/all-assets" class="hover:underline font-semibold">Available Assets</a>
                </div>

                <div
                    class="flex flex-col sm:flex-row justify-between items-start sm:items-center -mt-6 px-5 py-6 gap-4">

                    <!-- Title and Subtitle -->
                    <div>
                        <h2 class="font-semibold text-lg text-blue-900">Manage Available Assets</h2>
                        <p class="text-gray-900 text-sm">Borrow, Transfer and View Asset History</p>
                    </div>

                    <!-- Search + Filter Combo -->
                    <div x-data="{ open: false }" class="relative w-full sm:w-[280px]">
                        <div class="flex items-center bg-white border border-gray-300 rounded-md shadow-sm">

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

                            <!-- Filter Button -->
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
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 w-60 bg-white border border-gray-200 rounded-md shadow-lg z-50 text-sm">
                            <div class="p-3 space-y-2 text-gray-700">
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">CATEGORY</label>
                                    <select
                                        class="uppercase w-full rounded-md border-gray-300 shadow-sm text-xs focus:ring-blue-600 focus:border-blue-600">
                                        <option value="">ALL</option>
                                        <option value="1">IT EQUIPMENT</option>
                                        <option value="2">MOBILE DEVICE</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">STATUS</label>
                                    <select
                                        class="uppercase w-full rounded-md border-gray-300 shadow-sm text-xs focus:ring-blue-600 focus:border-blue-600">
                                        <option value="">ALL</option>
                                        <option value="available">AVAILABLE</option>
                                        <option value="in-use">IN USE</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <livewire:ams.asset.available-assets-list />
            </div>
        </div>
    </div>
</x-app-layout>