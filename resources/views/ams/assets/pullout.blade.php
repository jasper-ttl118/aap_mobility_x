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
                <div class="relative w-auto py-4 px-2 lg:p-4 lg:mx-0 text-center lg:border-b-2 border-blue-900">
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
            <main x-data="{ selectedCategory: '' }" class="space-y-1 w-full">
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
                        <a href="#" class="hover:underline font-semibold">Pullout Asset</a>
                    </div>
                </div>

                <!-- Pull-Out Form Section -->
                <section class="space-y-1.5 -mt-6">
                    <div class="px-10 pt-2 pb-5 bg-transparent space-y-8 shadow-lg">
                        <!-- Title -->
                        <div class="w-full flex flex-col items-start gap-y-1">
                            <h2 class="text-xl font-bold text-[#071d49]">Pull-Out Asset Form</h2>
                            <p class="text-sm text-gray-600"><em>Log asset pull-outs for repair, upgrade, or
                                    disposal.</em></p>
                        </div>

                        <!-- Form Grid -->
                        <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-x-10 gap-y-6">
                            <!-- Date of Pullout -->
                            <div x-data="{ today: (new Date()).toISOString().split('T')[0] }">
                                <label class="block text-sm font-medium text-gray-700">Date of Pull-Out</label>
                                <input type="date" x-bind:value="today"
                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                            </div>


                            <!-- Control Number -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Control Number</label>
                                <input type="text" placeholder="E.G., CTRL-2025-0001"
                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                            </div>

                            <!-- Asset Pulled Out -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Item Pulled Out</label>
                                <select
                                    class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                    <option value="">SELECT ASSET</option>
                                    <option>LAPTOP - DELL LATITUDE</option>
                                    <option>MONITOR - SAMSUNG 24"</option>
                                    <option>CPU - LENOVO THINKCENTRE</option>
                                    <option>MOUSE - LOGITECH M100</option>
                                    <option>KEYBOARD - HP KB1156</option>
                                </select>
                            </div>

                            <!-- Reason -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Reason for Pull-Out</label>
                                <select
                                    class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                    <option value="">SELECT REASON</option>
                                    <option value="repair">REPAIR</option>
                                    <option value="upgrade">UPGRADE</option>
                                    <option value="disposal">DISPOSAL</option>
                                </select>
                            </div>

                            <!-- To Be Received By -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">To Be Received By</label>
                                <select
                                    class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                    <option value="">SELECT DEPARTMENT</option>
                                    <option value="asset_mgmt">ASSET MANAGEMENT</option>
                                    <option value="it_dept">IT DEPARTMENT</option>
                                </select>
                            </div>

                            <!-- Notes -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Notes</label>
                                <textarea rows="3" placeholder="Additional notes or context here..."
                                    class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm resize-none"></textarea>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-end">
                            <button
                                class="text-white px-5 py-2 rounded-lg ring-0 ring-blue-900 hover:bg-blue-900/80 hover:ring-2 active:bg-blue-900 bg-blue-900 text-sm">
                                Submit
                            </button>
                        </div>
                    </div>
                </section>

            </main>
        </div>
</x-app-layout>