<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'asset' => new stdClass()]"
    navbar_selected='Asset Management'>

    <div class="flex flex-1 flex-col lg:ml-52 overflow-y-auto py-10 px-5 lg:p-10 gap-7 mt-12 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-7 ">
            <div class="flex h-14 border-b border-gray-200 relative" x-data="{ openCMS: false, openAssets: false }">

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
            class="@container/main rounded-md border-2 border-gray-100 bg-white justify-center items-center flex w-full flex-col shadow-lg -mt-4">
            <div class="flex flex-col justify-between w-full mt-3">
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
                    <a href="#" class="hover:underline font-semibold">Edit Asset</a>
                </div>
            </div>

            <main x-data="{ selectedCategory: '' }" class="space-y-6 w-full">
                <section class="space-y-1.5">
                    <div x-data="{step: 1}" class="p-10 bg-white rounded-xl space-y-8 @lg/main:space-y-14 shadow-lg">

                        <!-- Forms -->
                        <div x-show="step === 1" class="gap-y-5 flex flex-col">
                            <!-- Title and Description -->
                            <div class="w-full flex flex-col items-start justify-start gap-y-1 -mt-10 mb-4">
                                <h2 class="text-2xl font-bold text-[#071d49]">Edit Asset</h2>
                                <p class="text-sm text-gray-600 leading-tight"><em>Modify relevant information for the
                                        asset.</em></p>
                            </div>


                            <!-- Asset Basic Information Grid (3 Columns) -->
                            <!-- Card Wrapper -->
                            <div
                                class="w-full rounded-xl p-4 border-l-[15px] shadow-xl shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] border-[#ffdd00] space-y-6">
                                <!-- Heading with Icon -->
                                <div class="flex items-center gap-2 text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <h3 class="text-md font-semibold text-blue-800">Asset Information</h3>
                                </div>


                                <!-- Grid Section -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-10 gap-y-6">
                                    <!-- Category -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Category</label>
                                        <select x-model="selectedCategory"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                            <option value="">SELECT CATEGORY</option>
                                            <option value="1">IT EQUIPMENT</option>
                                            <option value="2">OFFICE FURNITURE AND FIXTURES</option>
                                            <option value="3">MACHINERY AND EQUIPMENT</option>
                                            <option value="4">VEHICLES</option>
                                            <option value="5">FACILITIES AND INFRASTRUCTURE</option>
                                            <option value="6">MOBILE DEVICES</option>
                                            <option value="7">HIGH VALUE ASSETS</option>
                                            <option value="8">LABORATORY EQUIPMENTS</option>
                                            <option value="9">COMPANY OWNED TOOLS</option>
                                            <option value="10">PREVENTIVE AND SAFETY EQUIPMENT</option>
                                        </select>
                                    </div>

                                    <!-- Condition -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Condition</label>
                                        <select
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                            <option value="">SELECT CONDITION</option>
                                            <option value="brand_new">BRAND NEW</option>
                                            <option value="used_good">USED - GOOD</option>
                                            <option value="used_fair">USED - FAIR</option>
                                            <option value="damaged">DAMAGED</option>
                                            <option value="for_disposal">FOR DISPOSAL</option>
                                        </select>
                                    </div>

                                    <!-- Status -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Status</label>
                                        <select
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                            <option value="">SELECT STATUS</option>
                                            <option value="1">IN USE</option>
                                            <option value="2">AVAILABLE</option>
                                            <option value="3">UNDER MAINTENANCE</option>
                                            <option value="4">DECOMISSIONED/RETIRED</option>
                                            <option value="5">ON HOLD</option>
                                            <option value="6">STOLEN</option>
                                        </select>
                                    </div>

                                    <!-- Asset Name -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Asset Name</label>
                                        <input type="text" placeholder="ASSET NAME"
                                            class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                    </div>

                                    <!-- Brand Name -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Brand Name</label>
                                        <select x-show="selectedCategory === '1' || selectedCategory === '6'" x-cloak
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                            <option value="">SELECT BRAND</option>
                                            <option value="HP">HP</option>
                                            <option value="Dell">DELL</option>
                                            <option value="Lenovo">LENOVO</option>
                                            <option value="Apple">APPLE</option>
                                            <option value="Samsung">SAMSUNG</option>
                                            <option value="Acer">ACER</option>
                                            <option value="Asus">ASUS</option>
                                        </select>
                                        <input x-show="selectedCategory !== '1' && selectedCategory !== '6'" x-cloak
                                            type="text" placeholder="BRAND NAME"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                    </div>

                                    <!-- Model -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Model</label>
                                        <input type="text" placeholder="MODEL"
                                            class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                    </div>
                                </div>
                                <div x-show="selectedCategory === '1' || selectedCategory === '6'" x-transition
                                    class="mt-3">
                                    <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-x-10 gap-y-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Device Serial
                                                Number</label>
                                            <input type="text" placeholder="DEVICE SERIAL NUMBER"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Charger Serial
                                                Number</label>
                                            <input type="text" placeholder="CHARGER SERIAL NUMBER"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Operating
                                                System</label>
                                            <input type="text" placeholder="OPERATING SYSTEM"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Type + Date + Assigned Dropdown (3 Columns) -->
                            <div x-data="{ type: '', assignedTo: '' }"
                                class="w-full rounded-xl p-4 border-l-[15px] shadow-xl shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] border-[#ffdd00] space-y-6">
                                <div class="flex items-center gap-2 text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <h3 class="text-md font-semibold text-blue-800">Asset Assignment</h3>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-10 gap-y-6">

                                    <!-- Type -->
                                    <div class="relative group">
                                        <label class="block text-sm font-medium text-gray-700">Type</label>
                                        <select x-model="type"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm ">
                                            <option value="">SELECT TYPE</option>
                                            <option value="common">COMMON ASSET</option>
                                            <option value="non-common">NON-COMMON ASSET</option>
                                        </select>

                                    </div>

                                    <!-- Department or Employee -->
                                    <div class="relative group">
                                        <label class="block text-sm font-medium text-gray-700"
                                            x-text="type === 'common' ? 'Department Assigned' : 'Employee Assigned'"></label>

                                        <select x-show="type === 'common'" x-transition
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm ">
                                            <option value="">SELECT DEPARTMENT</option>
                                            <option value="hr">HUMAN RESOURCES</option>
                                            <option value="it">IT SERVICES</option>
                                            <option value="acct">ACCOUNTING</option>
                                            <option value="ops">OPERATIONS</option>
                                            <option value="sales">SALES</option>
                                        </select>

                                        <select x-show="type !== 'common'" x-transition
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm ">
                                            <option value="">SELECT EMPLOYEE</option>
                                            <option value="1">DOE, JOHN</option>
                                            <option value="3">KANG, HAERIN</option>
                                            <option value="3">TANAKA, AOI</option>
                                            <option value="4">FERNANDEZ, MIGUEL</option>
                                        </select>


                                    </div>

                                    <!-- Date Assigned -->
                                    <div class="relative group">
                                        <label class="block text-sm font-medium text-gray-700">Date Assigned</label>
                                        <input type="date"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm ">

                                    </div>
                                </div>
                            </div>

                            {{-- Maintenance --}}
                            <div
                                class="w-full rounded-xl p-4 border-l-[15px] shadow-xl shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] border-[#ffdd00] space-y-6">
                                <div class="flex items-center gap-2 text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>


                                    <h3 class="text-md font-semibold text-blue-800">Maintenance Information</h3>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-10 gap-y-6">

                                    <!-- Service Provider -->
                                    <div class="relative group">
                                        <label class="block text-sm font-medium text-gray-700">Maintenance Service
                                            Provider</label>
                                        <input type="text" placeholder="Service Provider"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300  shadow-sm text-sm ">
                                    </div>

                                    <!-- Next Maintenance -->
                                    <div class="relative group">
                                        <label class="block text-sm font-medium text-gray-700">Next Maintenance
                                            Schedule</label>
                                        <input type="date"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm ">

                                    </div>

                                    <!-- Last Maintenance -->
                                    <div class="relative group">
                                        <label class="block text-sm font-medium text-gray-700">Last Maintenance
                                            Schedule</label>
                                        <input type="date"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm ">

                                    </div>


                                    <!-- Check-in Status -->
                                    <div class="relative group">
                                        <label class="block text-sm font-medium text-gray-700">Check-in
                                            Status</label>
                                        <select x-model="type"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm ">
                                            <option value="">SELECT TYPE</option>
                                            <option value="common">IN USE</option>
                                            <option value="non-common">ON GOING</option>
                                        </select>

                                    </div>

                                    <!-- Check-in Date -->
                                    <div class="relative group">
                                        <label class="block text-sm font-medium text-gray-700">Check-in Date</label>
                                        <input type="date"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm ">

                                    </div>

                                    <!-- Check-out Date -->
                                    <div class="relative group">
                                        <label class="block text-sm font-medium text-gray-700">Check-out
                                            Date</label>
                                        <input type="date"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm ">

                                    </div>
                                </div>
                            </div>
                            <div
                                class="w-full rounded-xl p-4 border-l-[15px] shadow-xl shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] border-[#ffdd00] space-y-6">
                                <div class="flex items-center gap-2 text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                            clip-rule="evenodd" />
                                    </svg>


                                    <h3 class="text-md font-semibold text-blue-800">Warranty Information</h3>
                                </div>

                                <div class="w-full flex flex-col md:flex-row gap-6">

                                    <!-- LEFT -->
                                    <div class="w-full md:w-1/2 grid grid-cols-1 md:grid-cols-2 gap-6" x-data="{
                            purchaseDate: '',
                            expirationDate: '',
                            warrantyYears: '',
                            computeExpiration() {
                                if (this.purchaseDate && this.warrantyYears !== '') {
                                    let purchase = new Date(this.purchaseDate);
                                    purchase.setFullYear(purchase.getFullYear() + parseInt(this.warrantyYears));
                                    this.expirationDate = purchase.toISOString().split('T')[0];
                                }
                            },
                            computeYears() {
                                if (this.purchaseDate && this.expirationDate) {
                                    const start = new Date(this.purchaseDate);
                                    const end = new Date(this.expirationDate);
                                    const diff = end.getFullYear() - start.getFullYear();
                                    this.warrantyYears = diff;
                                }
                            }
                        }" x-init="
                            $watch('warrantyYears', value => computeExpiration());
                            $watch('expirationDate', value => computeYears());
                            $watch('purchaseDate', () => {
                                if (warrantyYears !== '') computeExpiration();
                                else if (expirationDate) computeYears();
                            });
                        ">


                                        <!-- Purchase Date -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Purchase
                                                Date</label>
                                            <input type="date" x-model="purchaseDate"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                        </div>

                                        <!-- Free Replacement Period -->
                                        <div x-data="{ unit: 'days' }">
                                            <label class="block text-sm font-medium text-gray-700">Free Replacement
                                                Period</label>
                                            <div class="flex gap-2 mt-1">
                                                <input type="number" min="0"
                                                    class="uppercase w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm"
                                                    placeholder="E.G., 30">
                                                <select x-model="unit"
                                                    class="uppercase w-32 rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                                    <option value="days">DAYS</option>
                                                    <option value="weeks">WEEKS</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Warranty Expiration Date -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Warranty
                                                Expiration
                                                Date</label>
                                            <input type="date" x-model="expirationDate"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                        </div>

                                        <!-- Warranty Duration -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Warranty Duration
                                                (Years)</label>
                                            <input type="number" min="0" x-model="warrantyYears"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm"
                                                placeholder="E.G., 2">
                                        </div>
                                    </div>

                                    <!-- RIGHT: Description -->
                                    <div class="w-full md:w-1/2 flex flex-col h-[150px]">
                                        <label class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea
                                            class="uppercase mt-1 flex-grow resize-none block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm"
                                            placeholder="DESCRIPTION"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="flex justify-end items-end ">
                                <button
                                    class="btn text-white px-5 py-2 rounded-lg ring-0 ring-blue-900 hover:bg-blue-900/80 hover:ring-2 active:bg-blue-900 bg-blue-900 text-sm">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</x-app-layout>