<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'asset' => new stdClass()]"
    navbar_selected='Asset Management'>

    <div class="flex flex-1 flex-col lg:ml-52 overflow-y-auto p-10 gap-7 mt-12 bg-[#f3f4f6]">
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

            <header class="mt-5 flex justify-center flex-col items-start w-full px-10">
                <h2 class="text-2xl font-medium text-[#151847]">ADD NEW ASSET</h2>
            </header>
            <main x-data="{ selectedCategory: '' }" class="space-y-6 w-full">
                <section class="space-y-1.5">
                    <div x-data="{step: 1}" class="p-10 bg-white rounded-xl space-y-8 @lg/main:space-y-14 shadow-lg">

                        <!-- Forms -->
                        <div x-show="step === 1" class="gap-y-7 flex flex-col">
                            <!-- Title and Description -->
                            <div class="w-full flex flex-col items-start justify-start gap-y-1">
                                <h2 class="text-lg font-bold mb-2 text-[#071d49]">Asset Basic Information</h2>
                                <p class="text-sm text-gray-600 leading-tight"><em>Enter all relevant information for
                                        the asset.</em></p>
                            </div>

                            <!-- Asset Name -->
                            <div class="w-full">
                                <label class="block text-sm font-medium text-gray-700">Asset Name</label>
                                <input type="text" placeholder="Asset Name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                            </div>

                            <!-- Category and Type Dropdowns -->
                            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-x-14 gap-y-6">
                                <!-- Category Dropdown -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Category</label>
                                    <select x-model="selectedCategory"
                                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
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

                                <!-- Type Dropdown -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Type</label>
                                    <select
                                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                        <option value="">Select Type</option>
                                        <option value="common">Common Asset</option>
                                        <option value="non-common">Non-Common Asset</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Employee Assigned and Date -->
                            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-x-14 gap-y-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Date Assigned</label>
                                    <input type="date"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                                </div>

                                {{-- ADD SEARCH FUNCTION --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Employee Assigned</label>
                                    <select id="employeeSelect"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                                        <option value="">Select Employee</option>
                                        <option value="1">Doe, John</option>
                                        <option value="3">Kang, Haerin</option>
                                        <option value="3">Tanaka, Aoi</option>
                                        <option value="4">Fernandez, Miguel</option>
                                    </select>
                                </div>

                            </div>

                            <!-- Purchase & Warranty Section -->
                            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-x-14 gap-y-6" x-data="{
        purchaseDate: '',
        expirationDate: '',
        warrantyYears: '',
        
        // Compute expiration from purchase date + years
        computeExpiration() {
            if (this.purchaseDate && this.warrantyYears !== '') {
                let purchase = new Date(this.purchaseDate);
                purchase.setFullYear(purchase.getFullYear() + parseInt(this.warrantyYears));
                this.expirationDate = purchase.toISOString().split('T')[0];
            }
        },

        // Compute years from purchase and expiration
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
                                    <label class="block text-sm font-medium text-gray-700">Purchase Date</label>
                                    <input type="date" x-model="purchaseDate"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                                </div>

                                <!-- Warranty Duration (Years) -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Warranty Duration
                                        (Years)</label>
                                    <input type="number" min="0" x-model="warrantyYears"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600"
                                        placeholder="e.g., 2">
                                </div>

                                <!-- Computed Warranty Expiration (Editable) -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Warranty Expiration
                                        Date</label>
                                    <input type="date" x-model="expirationDate"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                                </div>

                                <!-- Free Replacement Duration -->
                                <div x-data="{ unit: 'days' }">
                                    <label class="block text-sm font-medium text-gray-700">Free Replacement
                                        Period</label>
                                    <div class="flex gap-2 mt-1">
                                        <input type="number" min="0"
                                            class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600"
                                            placeholder="e.g., 30">
                                        <select x-model="unit"
                                            class="w-32 rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                                            <option value="days">Days</option>
                                            <option value="weeks">Weeks</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="w-full">
                                <label class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600"></textarea>
                            </div>

                            <!-- Conditional Technical Specs -->
                            <div x-show="selectedCategory === '1' || selectedCategory === '6'" x-transition
                                class="border-t pt-6">
                                <h3 class="text-sm font-semibold text-gray-800 mb-2">Technical Specifications</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Serial Number</label>
                                        <input type="text"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Processor</label>
                                        <input type="text"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">RAM</label>
                                        <input type="text"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Storage</label>
                                        <input type="text"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                                    </div>
                                </div>
                            </div>

                            <!-- Next Button -->
                            <div class="flex justify-end items-end pt-4">
                                <button @click="step++"
                                    class="btn text-white px-5 py-2 rounded-lg ring-0 ring-blue-900 hover:bg-blue-900/80 hover:ring-2 active:bg-blue-900 bg-blue-900">
                                    Save
                                </button>
                            </div>
                        </div>
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