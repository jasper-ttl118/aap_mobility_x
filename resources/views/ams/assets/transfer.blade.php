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
                        <a href="#" class="hover:underline font-semibold">Transfer Asset</a>
                    </div>
                </div>

                <!-- Asset Transfer Form Section -->
                <section class="space-y-1.5 -mt-6">
                    <div class="px-10 pt-2 pb-5 bg-transparent space-y-4 shadow-lg" x-data="{
        today: (new Date()).toISOString().split('T')[0],
        transferTo: 'employee', // or 'department'
        selectedAsset: {
            name: 'LAPTOP',
            brand: 'DELL',
            model: 'LATITUDE 5520'
        }
    }">
                        <!-- Title -->
                        <div class="w-full flex flex-col items-start gap-y-1">
                            <h2 class="text-xl font-bold text-[#071d49]">Asset Transfer Form</h2>
                            <p class="text-sm text-gray-600"><em>Transfer assets to employees or departments.</em></p>
                        </div>

                        <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-x-10 gap-y-6">
                            <!-- Asset Information Display -->
                            <div class="md:col-span-3 bg-gray-50 border border-gray-200 rounded-lg p-2 space-y-2">
                                <h3 class="text-blue-900 font-semibold text-base mb-1">Selected Asset</h3>

                                <div
                                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-2 text-sm text-gray-700">
                                    <!-- Asset Name -->
                                    <div class="flex flex-col">
                                        <span class="font-medium text-gray-500">Asset Name</span>
                                        <span class="uppercase font-semibold text-[#071d49]">LAPTOP</span>
                                    </div>

                                    <!-- Brand -->
                                    <div class="flex flex-col">
                                        <span class="font-medium text-gray-500">Brand</span>
                                        <span class="uppercase font-semibold text-[#071d49]">DELL</span>
                                    </div>

                                    <!-- Model -->
                                    <div class="flex flex-col">
                                        <span class="font-medium text-gray-500">Model</span>
                                        <span class="uppercase font-semibold text-[#071d49]">LATITUDE 5520</span>
                                    </div>

                                    <!-- Assigned To -->
                                    <div class="flex flex-col">
                                        <span class="font-medium text-gray-500">From</span>
                                        <template x-if="transferTo === 'employee'">
                                            <span class="uppercase font-semibold text-[#071d49]">FERNANDEZ,
                                                MIGUEL</span>
                                        </template>
                                        <template x-if="transferTo === 'department'">
                                            <span class="uppercase font-semibold text-[#071d49]">IT SERVICES</span>
                                        </template>
                                    </div>
                                </div>
                            </div>


                            <!-- Date of Transfer -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Date of Transfer</label>
                                <input type="date" x-bind:value="today"
                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                            </div>

                            <!-- Control Number -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Control Number</label>
                                <input type="text" placeholder="E.G., CTRL-2025-0042"
                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                            </div>

                            <div></div>

                            <!-- To Dropdown -->
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Transfer To</label>
                                <select x-model="transferTo"
                                    class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                    <option value="" disabled>SELECT TRANSFER TARGET</option>
                                    <option value="employee">EMPLOYEE</option>
                                    <option value="department">DEPARTMENT</option>
                                </select>
                            </div>


                            <!-- Conditional Dropdown -->
                            <template x-if="transferTo === 'employee'">
                                <div class="col-span-3 md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">Select Employee</label>
                                    <select
                                        class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                        <option value="" >SELECT EMPLOYEE</option>
                                        <option>FERNANDEZ, MIGUEL</option>
                                        <option>KANG, HAERIN</option>
                                        <option>HERMOSURA, DON</option>
                                    </select>
                                </div>
                            </template>
                            <template x-if="transferTo === 'department'">
                                <div class="col-span-3 md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">Select Department</label>
                                    <select
                                        class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                        <option value="" disabled>SELECT DEPARTMENT</option>
                                        <option>HUMAN RESOURCES</option>
                                        <option>IT SERVICES</option>
                                        <option>ACCOUNTING</option>
                                        <option>OPERATIONS</option>
                                        <option>SALES</option>
                                    </select>
                                </div>
                            </template>


                            <div></div>
                            <!-- Condition -->
                            <div class="md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Condition</label>
                                <select
                                    class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                    <option value="" disabled>SELECT CONDITION</option>
                                    <option>BRAND NEW</option>
                                    <option>USED - GOOD</option>
                                    <option>USED - FAIR</option>
                                    <option>DAMAGED</option>
                                    <option>FOR DISPOSAL</option>
                                </select>
                            </div>

                            <!-- Reason for Transfer -->
                            <div class="md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Reason for Transfer</label>
                                <textarea rows="2"
                                    class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm resize-none"
                                    placeholder="E.G., DEPARTMENT RESTRUCTURE OR ROLE CHANGE"></textarea>
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