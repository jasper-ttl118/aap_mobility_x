<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'asset' => new stdClass()]"
    navbar_selected='Asset Management'>
    {{-- bg --}}
    <div
        class="flex flex-1 flex-col lg:ml-52 overflow-y-auto py-10 px-5 lg:py-10 lg:pl-5 lg:pr-2 gap-7 mt-12 bg-[#f3f4f6]">
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

        {{-- Content --}}
        <div class="flex flex-col lg:flex-row">
            <div x-ref="scrollTarget"
                class="@container/main rounded-md border-2 border-gray-100 bg-white justify-center items-center flex w-full lg:w-8/12 flex-col shadow-lg -mt-4">
                <div class="flex flex-col justify-between w-full mt-3" x-init="setTimeout(() => {
          $refs.scrollTarget.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }, 800)">
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
                        <a href="#" class="hover:underline font-semibold">Add Asset</a>
                    </div>
                </div>

                <main x-data="{ selectedCategory: '' }">


                    <section class="space-y-1.5">
                        <div x-data="{step: 1}"
                            class="p-10 bg-white rounded-xl space-y-8 @lg/main:space-y-14 shadow-lg">

                            <div x-show="step === 1" class="gap-y-3 flex flex-col">
                                <div class="w-full flex flex-col items-start justify-start gap-y-1 -mt-5">
                                    <h2 class="text-xl font-bold text-[#071d49]">Add New Asset</h2>
                                    <p class="text-sm text-gray-600 leading-tight"><em>Enter all relevant information
                                            for
                                            the asset.</em></p>
                                </div>

                                <div class="flex items-center gap-2 mt-2">
                                    <!-- Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-5 text-blue-800">
                                        <path fill-rule="evenodd"
                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                            clip-rule="evenodd" />
                                    </svg>


                                    <!-- Heading -->
                                    <h3 class="text-md font-semibold text-blue-800">Asset Information</h3>
                                </div>


                                <!-- Asset Basic Info -->
                                <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-x-3 gap-y-6">

                                    <!-- Category -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Category</label>
                                        <select x-model="selectedCategory" name="category_id"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                            <option value="">SELECT CATEGORY</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->category_id }}">
                                                    {{ strtoupper($category->category_name) }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <!-- Condition -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Condition</label>
                                        <select name="condition_id"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                            <option value="">SELECT CONDITION</option>
                                            @foreach ($conditions as $condition)
                                                <option value="{{ $condition->condition_id }}">
                                                    {{ strtoupper($condition->condition_name) }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <!-- Status -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Status</label>
                                        <select name="status_id"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                            <option value="">SELECT STATUS</option>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->status_id }}">
                                                    {{ strtoupper($status->status_name) }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>



                                    <!-- Asset Name -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Asset Name</label>
                                        <input type="text" x-ref="assetName" placeholder="ASSET NAME"
                                            class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                    </div>

                                    <!-- BRAND -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Brand Name</label>

                                        <!-- Dropdown for IT Equipment or Mobile Devices -->
                                        <select name="brand_id"
                                            x-show="selectedCategory === '1' || selectedCategory === '6'" x-cloak
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                            <option value="">SELECT BRAND</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->brand_id }}">{{ strtoupper($brand->brand_name) }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <!-- Text Input for other categories -->
                                        <input type="text" name="brand_name_custom"
                                            x-show="selectedCategory !== '1' && selectedCategory !== '6'" x-cloak
                                            placeholder="BRAND NAME"
                                            class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm" />
                                    </div>


                                    <!-- Model -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Model</label>
                                        <input type="text" x-ref="model" placeholder="MODEL"
                                            class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                    </div>
                                </div>

                                <!-- Technical Specs (Conditional) -->
                                <div x-show="selectedCategory === '1' || selectedCategory === '6'" x-transition
                                    class="mt-3">
                                    <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-x-3 gap-y-6 mt-3">
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

                                <!-- Assignment -->
                                <div x-data="{ type: '', assignedTo: '' }"
                                    class="w-full border-t border-gray-400 mt-3 pt-3">
                                    <div class="flex items-center gap-2 mt-2 pb-4">
                                        <!-- Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-5 text-blue-800">
                                            <path fill-rule="evenodd"
                                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                                clip-rule="evenodd" />
                                        </svg>



                                        <!-- Heading -->
                                        <h3 class="text-md font-semibold text-blue-800">Asset Assignment</h3>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-3 gap-y-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Type</label>
                                            <select x-model="type"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                                <option class="text-xs" value="">SELECT TYPE</option>
                                                <option class="text-xs" value="common">COMMON ASSET</option>
                                                <option class="text-xs" value="non-common">NON-COMMON ASSET</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700"
                                                x-text="type === 'common' ? 'Department Assigned' : 'Employee Assigned'"></label>
                                            <select name="department_id"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm"
                                                x-show="type === 'common'" x-transition>
                                                <option value="">SELECT DEPARTMENT</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->department_id }}">
                                                        {{ strtoupper($department->department_name) }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            <select name="employee_id"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm"
                                                x-show="type !== 'common'" x-transition>
                                                <option value="">SELECT EMPLOYEE</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->employee_id }}">
                                                        {{ strtoupper($employee->employee_lastname) }},
                                                        {{ strtoupper($employee->employee_firstname) }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Date Assigned</label>
                                            <input type="date"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                        </div>
                                    </div>
                                </div>

                                <!-- Warranty Section -->
                                <div class="w-full border-t border-gray-400 mt-6 pt-3">
                                    <div class="flex items-center gap-2 mt-2 pb-4">
                                        <!-- Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-5 text-blue-800">
                                            <path fill-rule="evenodd"
                                                d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <!-- Heading -->
                                        <h3 class="text-md font-semibold text-blue-800">Warranty Information</h3>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-5 gap-6" x-data="{
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

                                        <!-- Warranty Fields (spans 3/5 = 60%) -->
                                        <div class="col-span-5 md:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-4">
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
                                                <div class="flex gap-2 mt-1 items-start">
                                                    <input type="number" min="0"
                                                        class="uppercase w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm"
                                                        placeholder="E.G., 30">
                                                    <select x-model="unit"
                                                        class="uppercase w-28 rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm">
                                                        <option value="days">DAYS</option>
                                                        <option value="weeks">WEEKS</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Warranty Expiration Date -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Warranty
                                                    Expiration Date</label>
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

                                        <!-- Description (spans 2/5 = 40%) -->
                                        <div class="col-span-5 md:col-span-2 flex flex-col">
                                            <label class="block text-sm font-medium text-gray-700">Description</label>
                                            <textarea
                                                class="uppercase mt-1 block flex-grow resize-none w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm"
                                                placeholder="DESCRIPTION"></textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!-- Add to List Button -->
                            <div class="flex justify-end mt-6">
                                <button type="button" @click="addAsset"
                                    class="btn text-[#151847] px-5 py-2 rounded-lg ring-0  hover:bg-[#F6D400]/80  active:bg-[#F6D400] bg-[#F6D400] text-sm">
                                    Add
                                </button>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
            <!-- Right Side Sticky Card -->
            <div class="w-full lg:w-4/12 mt-8 lg:-mt-3.5 lg:ml-6" x-data="{
        icons: [
            `<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-6'>
                <path fill-rule='evenodd' d='M2.25 5.25a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3V15a3 3 0 0 1-3 3h-3v.257c0 .597.237 1.17.659 1.591l.621.622a.75.75 0 0 1-.53 1.28h-9a.75.75 0 0 1-.53-1.28l.621-.622a2.25 2.25 0 0 0 .659-1.59V18h-3a3 3 0 0 1-3-3V5.25Zm1.5 0v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5Z' clip-rule='evenodd' />
            </svg>`,
            `<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-6'>
                <path d='M10.5 18.75a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z' />
                <path fill-rule='evenodd' d='M8.625.75A3.375 3.375 0 0 0 5.25 4.125v15.75a3.375 3.375 0 0 0 3.375 3.375h6.75a3.375 3.375 0 0 0 3.375-3.375V4.125A3.375 3.375 0 0 0 15.375.75h-6.75ZM7.5 4.125C7.5 3.504 8.004 3 8.625 3H9.75v.375c0 .621.504 1.125 1.125 1.125h2.25c.621 0 1.125-.504 1.125-1.125V3h1.125c.621 0 1.125.504 1.125 1.125v15.75c0 .621-.504 1.125-1.125 1.125h-6.75A1.125 1.125 0 0 1 7.5 19.875V4.125Z' clip-rule='evenodd' />
            </svg>`,
            `<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-6'>
                <path d='M10.5 18a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z' />
                <path fill-rule='evenodd' d='M7.125 1.5A3.375 3.375 0 0 0 3.75 4.875v14.25A3.375 3.375 0 0 0 7.125 22.5h9.75a3.375 3.375 0 0 0 3.375-3.375V4.875A3.375 3.375 0 0 0 16.875 1.5h-9.75ZM6 4.875c0-.621.504-1.125 1.125-1.125h9.75c.621 0 1.125.504 1.125 1.125v14.25c0 .621-.504 1.125-1.125 1.125h-9.75A1.125 1.125 0 0 1 6 19.125V4.875Z' clip-rule='evenodd' />
            </svg>`
        ],
        currentIndex: 0,
        get currentIcon() {
            return this.icons[this.currentIndex];
        },
        rotate() {
            setInterval(() => {
                this.currentIndex = (this.currentIndex + 1) % this.icons.length;
            }, 1000);
        }
     }" x-init="rotate">
                <div class="sticky -top-6">
                    <div class="bg-white rounded-md shadow-xl border border-transparent px-2 py-5 space-y-5">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <div class="bg-blue-100 text-blue-700 p-2 rounded-full">
                                    <div x-html="currentIcon"></div>
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold text-blue-900">Asset Summary</h2>
                                    <p class="text-xs text-gray-500">Review and finalize assets</p>
                                </div>
                            </div>
                        </div>

                        <div x-data="accordionData" class="bg-transparent p-2 rounded-md space-y-1">
                            <div class="text-xs font-semibold text-gray-700 mb-1">Total Assets: <span
                                    x-text="assets.length"></span></div>

                            <template x-for="(asset, index) in assets" :key="asset.id">
                                <div class="border rounded-md shadow bg-white">
                                    <!-- Accordion Header -->
                                    <button @click="selected !== index ? selected = index : selected = null"
                                        class="w-full flex justify-between items-center px-4 py-2 text-left">
                                        <span class="font-semibold text-blue-900 text-sm" x-text="asset.name"></span>
                                        <svg :class="{ 'rotate-180': selected === index }"
                                            class="w-4 h-4 transform transition-transform duration-300" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>

                                    <!-- Accordion Content -->
                                    <div x-show="selected === index" x-collapse x-cloak
                                        class="px-4 pb-3 pt-2 text-xs text-gray-700 space-y-1">
                                        <div><strong>Brand:</strong> <span x-text="asset.brand"></span></div>
                                        <div><strong>Model:</strong> <span x-text="asset.model"></span></div>
                                        <div><strong>Category:</strong> <span x-text="asset.category"></span></div>
                                        <div><strong>Status:</strong> <span x-text="asset.status"></span></div>
                                        <div><strong>Condition:</strong> <span x-text="asset.condition"></span></div>
                                        <div><strong>Purchase Date:</strong> <span x-text="asset.purchase_date"></span>
                                        </div>
                                        <div><strong>Warranty Expiry:</strong> <span
                                                x-text="asset.warranty_expiry"></span>
                                        </div>
                                        <div><strong>Warranty Years:</strong> <span
                                                x-text="asset.warranty_years"></span>
                                        </div>
                                        <div><strong>Replacement Period:</strong> <span
                                                x-text="asset.replacement_period"></span></div>
                                        <div><strong>Replacement Unit:</strong> <span
                                                x-text="asset.replacement_unit"></span></div>
                                        <div><strong>Assignment Type:</strong> <span
                                                x-text="asset.assignment_type"></span>
                                        </div>
                                        <div><strong>Assigned To:</strong> <span x-text="asset.assigned_to"></span>
                                        </div>
                                        <div><strong>Date Assigned:</strong> <span x-text="asset.date_assigned"></span>
                                        </div>
                                        <div><strong>Serial #:</strong> <span x-text="asset.device_serial"></span></div>
                                        <div><strong>Charger Serial #:</strong> <span
                                                x-text="asset.charger_serial"></span>
                                        </div>
                                        <div><strong>Operating System:</strong> <span x-text="asset.os"></span></div>
                                        <div><strong>Description:</strong> <span x-text="asset.description"></span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <script>
                            document.addEventListener('alpine:init', () => {
                                Alpine.data('accordionData', () => ({
                                    selected: null,
                                    assets: [
                                        {
                                            id: 1,
                                            name: 'Dell Laptop',
                                            brand: 'DELL',
                                            model: 'XPS 13',
                                            category: 'IT EQUIPMENT',
                                            status: 'IN USE',
                                            condition: 'BRAND NEW',
                                            purchase_date: '2023-01-01',
                                            warranty_expiry: '2025-01-01',
                                            warranty_years: 2,
                                            replacement_period: '30',
                                            replacement_unit: 'DAYS',
                                            assignment_type: 'NON-COMMON',
                                            assigned_to: 'DOE, JOHN',
                                            date_assigned: '2023-01-10',
                                            device_serial: 'SN123456789',
                                            charger_serial: 'CH987654321',
                                            os: 'Windows 11 Pro',
                                            description: 'Developer laptop with accessories'
                                        },
                                        {
                                            id: 2,
                                            name: 'Office Chair',
                                            brand: 'HERMAN MILLER',
                                            model: 'AERON',
                                            category: 'FURNITURE',
                                            status: 'AVAILABLE',
                                            condition: 'USED - GOOD',
                                            purchase_date: '2022-06-10',
                                            warranty_expiry: '2024-06-10',
                                            warranty_years: 2,
                                            replacement_period: '0',
                                            replacement_unit: 'DAYS',
                                            assignment_type: 'COMMON',
                                            assigned_to: 'IT DEPARTMENT',
                                            date_assigned: '2022-06-15',
                                            device_serial: '',
                                            charger_serial: '',
                                            os: '',
                                            description: 'Ergonomic chair for team lead'
                                        },
                                        {
                                            id: 3,
                                            name: 'Warehouse Scanner',
                                            brand: 'HONEYWELL',
                                            model: 'X123',
                                            category: 'TOOLS',
                                            status: 'UNDER MAINTENANCE',
                                            condition: 'USED - FAIR',
                                            purchase_date: '2021-09-05',
                                            warranty_expiry: '2023-09-05',
                                            warranty_years: 2,
                                            replacement_period: '7',
                                            replacement_unit: 'DAYS',
                                            assignment_type: 'COMMON',
                                            assigned_to: 'WAREHOUSE',
                                            date_assigned: '2021-10-01',
                                            device_serial: 'WS456789123',
                                            charger_serial: 'CH456789123',
                                            os: 'Firmware v2.1',
                                            description: 'Handheld barcode scanner'
                                        }
                                        // Add up to 5 assets here...
                                    ]
                                }));
                            });
                        </script>


                        <!-- Buttons -->
                        <div class="flex flex-col gap-2">
                            <button
                                class="w-full bg-red-100 text-red-600 hover:bg-red-200 text-sm font-medium py-2 rounded-md">
                                Clear Queue
                            </button>
                            <button
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 rounded-md">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
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