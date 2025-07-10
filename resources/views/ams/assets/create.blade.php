<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'asset' => new stdClass()]"
    navbar_selected='Asset Management'>

    <div class="flex flex-1 flex-col lg:ml-52 overflow-y-auto p-10 gap-7 mt-12 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-7">
            <div class="flex flex-col lg:flex-row border-b border-gray-200 relative ">

                <!-- Dashboard -->
                <div class="w-full lg:w-32 p-4 text-center border-b lg:border-b-0">
                    <a href="/ams" class="block text-gray-600 hover:text-blue-800 font-inter">Dashboard</a>
                </div>

                <!-- CMS with Dropdown -->
                <div class="relative group w-full lg:w-32 p-4 text-center border-b lg:border-b-0 cursor-pointer">
                    <a href="/ams/cms/branch-department"
                        class="block text-gray-600 hover:text-blue-800 font-inter">CMS</a>

                    <div
                        class="absolute top-full left-0 mt-1 w-32 rounded-md border border-gray-200 bg-white shadow-lg z-10 opacity-0 group-hover:opacity-100 group-hover:visible invisible transition-opacity duration-200">
                        <a href="/ams/cms/branch-department"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-800">Branches/
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

                <!-- Assets with Dropdown -->
                <div
                    class="relative group w-full lg:w-32 p-4 text-center border-b-2 border-b-2 border-blue-900 cursor-pointer">
                    <a href="#" class="block font-semibold text-blue-900">Assets </a>

                    <div
                        class="absolute top-full left-0 mt-1 w-32 rounded-md border border-gray-200 bg-white shadow-lg z-10 opacity-0 group-hover:opacity-100 group-hover:visible invisible transition-opacity duration-200">
                        <a href="/ams/all-assets"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-800">All
                            Assets</a>
                        <a href="/ams/common-assets"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-800">Common
                            Assets</a>
                        <a href="/ams/assets-for-sale"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-800">Assets
                            for Sale</a>
                    </div>
                </div>

                <!-- Scan QR -->
                <div class="w-full lg:w-32 p-4 text-center">
                    <a href="/ams/scan-qr" class="block text-gray-600 hover:text-blue-800 font-inter">Scan QR</a>
                </div>
            </div>
        </div>
        <!-- Add this style once in your layout -->
        <style>
            input,
            select,
            textarea,
            option,
            ::placeholder {
                text-transform: uppercase !important;
            }
        </style>

        <div
            class="@container/main rounded-md border-2 border-gray-100 bg-white justify-center items-center flex w-full flex-col shadow-lg -mt-4">
            <div class="flex flex-col justify-between w-full mt-3">
                {{-- Breadcrumbs --}}
                <div class="flex justify-start w-full gap-x-1 text-[#071d49] text-sm px-7 pt-5">
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
                    <a href="#" class="hover:underline font-semibold">Add Asset</a>
                </div>
            </div>


            <!-- <header class="mt-3 mb-0 flex justify-center flex-col items-start w-full px-10">
                <h2 class="text-2xl font-medium text-[#151847] leading-none">ADD NEW ASSET</h2>
            </header> -->

            <!-- Main -->
            <main x-data="{ selectedCategory: '', selectedType: ''   }" class=" -mt-2 pt-0 w-full">
                <section class=" space-y-1.5">
                    <div x-data="{step: 1}"
                        class="bg-white  pt-0 pb-10 px-10  rounded-xl space-y-8 @lg/main:space-y-14 shadow-lg">


                        <div class="w-full flex justify-center mt-5">
                            <div class="w-full max-w-5xl bg-white px-10 py-5">
                                <!-- First Row: Left + Right -->
                                <div class="flex flex-row gap-8 w-full">
                                    <!-- Left Column -->

                                    <div class="w-1/2 space-y-2">
                                        <div class="flex items-center gap-2">
                                            <!-- SVG Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-6 text-gray-700">
                                                <path d="M16.5 7.5h-9v9h9v-9Z" />
                                                <path fill-rule="evenodd"
                                                    d="M8.25 2.25A.75.75 0 0 1 9 3v.75h2.25V3a.75.75 0 0 1 1.5 0v.75H15V3a.75.75 0 0 1 1.5 0v.75h.75a3 3 0 0 1 3 3v.75H21A.75.75 0 0 1 21 9h-.75v2.25H21a.75.75 0 0 1 0 1.5h-.75V15H21a.75.75 0 0 1 0 1.5h-.75v.75a3 3 0 0 1-3 3h-.75V21a.75.75 0 0 1-1.5 0v-.75h-2.25V21a.75.75 0 0 1-1.5 0v-.75H9V21a.75.75 0 0 1-1.5 0v-.75h-.75a3 3 0 0 1-3-3v-.75H3A.75.75 0 0 1 3 15h.75v-2.25H3a.75.75 0 0 1 0-1.5h.75V9H3a.75.75 0 0 1 0-1.5h.75v-.75a3 3 0 0 1 3-3h.75V3a.75.75 0 0 1 .75-.75ZM6 6.75A.75.75 0 0 1 6.75 6h10.5a.75.75 0 0 1 .75.75v10.5a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V6.75Z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <!-- Heading -->
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                Asset Information
                                            </h3>
                                        </div>

                                        <!-- Description Text -->
                                        <p class="text-sm text-gray-500">
                                            Fill out the asset information. Enter the name, brand and important
                                            description of the asset.
                                        </p>
                                        <!-- Technical Specs (Conditional) -->
                                        <template x-if="selectedCategory === '1' || selectedCategory === '6'">
                                            <div class="border-t pt-6 space-y-4">
                                                <h3 class="text-sm font-semibold text-gray-800">Technical Specifications
                                                </h3>

                                                <!-- Model -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">Model</label>
                                                    <input type="text"
                                                        class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm placeholder:text-sm">
                                                </div>

                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700">Device
                                                            Serial Number</label>
                                                        <input type="text"
                                                            class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm placeholder:text-sm">
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700">Charger
                                                            Serial Number</label>
                                                        <input type="text"
                                                            class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm placeholder:text-sm">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700">RAM</label>
                                                        <input type="text"
                                                            class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm placeholder:text-sm">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700">Storage</label>
                                                        <input type="text"
                                                            class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm placeholder:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>


                                    <!-- Right Column -->
                                    <div class="w-full md:w-1/2 space-y-6">
                                        <!-- Asset Name -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Asset Name</label>
                                            <input type="text" placeholder="Asset Name"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm placeholder:text-sm">
                                        </div>

                                        <!-- Category -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Category</label>
                                            <select x-model="selectedCategory"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                                <option value="">Select Category</option>
                                                <option value="1">IT Equipment</option>
                                                <option value="2">Office Furniture and Fixtures</option>
                                                <option value="3">Machinery and Equipment</option>
                                                <option value="4">Vehicles</option>
                                                <option value="5">Facilities and Infrastructure</option>
                                                <option value="6">Mobile Devices</option>
                                                <option value="7">High Value Assets</option>
                                                <option value="8">Laboratory Equipments</option>
                                                <option value="9">Company Owned Tools</option>
                                                <option value="10">Preventive and Safety Equipment</option>
                                            </select>
                                        </div>

                                        <!-- Brand Name (Conditional) -->
                                        <template x-if="selectedCategory === '1' || selectedCategory === '6'">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Brand
                                                    Name</label>
                                                <select
                                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                                    <option value="">Select Brand</option>
                                                    <option>Dell</option>
                                                    <option>HP</option>
                                                    <option>Lenovo</option>
                                                    <option>Asus</option>
                                                    <option>Apple</option>
                                                </select>
                                            </div>
                                        </template>

                                        <template x-if="selectedCategory !== '1' && selectedCategory !== '6'">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Brand
                                                    Name</label>
                                                <input type="text" placeholder="Brand Name"
                                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm placeholder:text-sm">
                                            </div>
                                        </template>



                                        <!-- Description -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Description</label>
                                            <textarea rows="3" placeholder="Enter asset description"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm placeholder:text-sm"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <!-- 🔹 Full-Width Divider Between Brand Name & Category -->
                                <div class="w-full border-t border-gray-400 my-6"></div>

                                <!-- Second Row: Category Onward -->
                                <div class="flex flex-row gap-8 w-full">
                                    <!-- Left Spacer (keep alignment) -->
                                    <div class="w-1/2 space-y-2">
                                        <div class="flex items-center gap-2">
                                            <!-- SVG Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-6 text-gray-700">
                                                <path fill-rule="evenodd"
                                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <!-- Heading -->
                                            <h3 class="text-lg font-semibold text-gray-900">Asset Assignment</h3>
                                        </div>

                                        <!-- Description Text -->
                                        <p class="text-sm text-gray-500">
                                            Assign the asset. This data will be used for accountability tracking.
                                        </p>
                                    </div>


                                    <!-- Right Column Continued -->
                                    <div class="w-1/2 space-y-6">

                                        <!-- Type -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Type</label>
                                            <select x-model="selectedType"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                                <option value="">Select Type</option>
                                                <option value="common">Common Asset</option>
                                                <option value="non-common">Non-Common Asset</option>
                                            </select>
                                        </div>

                                        <!-- Date Assigned -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Date Assigned</label>
                                            <input type="date"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                        </div>

                                        <!-- Assigned To -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700"
                                                x-text="selectedType === 'common' ? 'Department Assigned' : 'Employee Assigned'"></label>

                                            <select x-show="selectedType === 'common'" x-cloak
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                                <option value="">Select Department</option>
                                                <option value="1">IT Department</option>
                                                <option value="2">Finance Department</option>
                                                <option value="3">Human Resources</option>
                                                <option value="4">Operations</option>
                                                <option value="5">Marketing</option>
                                            </select>

                                            <select x-show="selectedType !== 'common'" x-cloak
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                                <option value="">Select Employee</option>
                                                <option value="1">Doe, John</option>
                                                <option value="2">Kang, Haerin</option>
                                                <option value="3">Tanaka, Aoi</option>
                                                <option value="4">Fernandez, Miguel</option>
                                                <option value="5">Ramos, Lea</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- 🔹 Full-Width Divider Between Assigned To & Purchase Date -->
                                <div class="w-full border-t border-gray-400 my-6"></div>

                                <!-- Third Row: Purchase and Warranty Section -->
                                <div class="flex flex-row gap-8 w-full">
                                    <div class="w-1/2 space-y-2">
                                        <div class="flex items-center gap-2">
                                            <!-- SVG: Calendar Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-6 text-gray-700">
                                                <path
                                                    d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                                                <path fill-rule="evenodd"
                                                    d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <!-- Heading -->
                                            <h3 class="text-lg font-semibold text-gray-900">Warranty Information</h3>
                                        </div>
                                        <!-- Description -->
                                        <p class="text-sm text-gray-500">
                                            Specify the warranty coverage for the asset for proper tracking of support
                                            eligibility.
                                        </p>
                                    </div>
                                    <div class="w-1/2 space-y-6">
                                        <div x-data="{
            purchaseDate: '',
            duration: '',
            expiry: '',

            updateExpiry() {
                if (this.purchaseDate && this.duration !== '') {
                    const date = new Date(this.purchaseDate);
                    date.setFullYear(date.getFullYear() + parseInt(this.duration));
                    this.expiry = date.toISOString().split('T')[0];
                }
            },

            updateDuration() {
                if (this.purchaseDate && this.expiry) {
                    const start = new Date(this.purchaseDate);
                    const end = new Date(this.expiry);
                    const diffYears = end.getFullYear() - start.getFullYear();
                    this.duration = diffYears >= 0 ? diffYears : '';
                }
            }
        }" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <!-- Purchase Date -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Purchase
                                                    Date</label>
                                                <input type="date" x-model="purchaseDate"
                                                    @change="updateExpiry(); updateDuration()"
                                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                            </div>

                                            <!-- Warranty Duration -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Warranty Duration
                                                    (Years)</label>
                                                <input type="number" min="0" x-model="duration" @input="updateExpiry()"
                                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm placeholder:text-sm"
                                                    placeholder="e.g., 2">
                                            </div>

                                            <!-- Warranty Expiration Date -->
                                            <div class="md:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Warranty
                                                    Expiration Date</label>
                                                <input type="date" x-model="expiry" @change="updateDuration()"
                                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                            </div>
                                        </div>

                                        <!-- Free Replacement Period -->
                                        <div x-data="{ unit: 'days' }">
                                            <label class="block text-sm font-medium text-gray-700">Free Replacement
                                                Period</label>
                                            <div class="flex gap-2 mt-1">
                                                <input type="number" min="0" placeholder="e.g., 30"
                                                    class="uppercase w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm placeholder:text-sm">
                                                <select x-model="unit"
                                                    class="uppercase w-32 rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                                    <option value="days">Days</option>
                                                    <option value="weeks">Weeks</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="pt-4 text-right">
                                            <button type="submit"
                                                class="btn text-white px-5 py-2 rounded-lg ring-0 ring-blue-900 hover:bg-blue-900/80 hover:ring-2 active:bg-blue-900 bg-blue-900">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Ensure uppercase everywhere -->
                        <style>
                            input,
                            textarea,
                            select,
                            option,
                            ::placeholder {
                                text-transform: uppercase !important;
                            }
                        </style>

                    </div>
                </section>
            </main>
        </div>
    </div>


    <script>
        new TomSelect("#employeeSelect", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
    </script>
</x-app-layout>