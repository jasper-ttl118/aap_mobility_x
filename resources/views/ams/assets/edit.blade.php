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

            <form method="POST" action="{{ route('ams.asset.update', $asset->asset_id) }}">
                @csrf
                @method('PUT')
                <main class="space-y-6 w-full">
                    <section class="space-y-1.5">
                        <div class="px-10 pt-10 pb-5  rounded-xl space-y-8 @lg/main:space-y-14 ">

                            <!-- Forms -->
                            <div class="gap-y-5 flex flex-col">
                                <!-- Title and Description -->
                                <div class="w-full flex flex-col items-start justify-start gap-y-1 -mt-10 mb-4">
                                    <h2 class="text-2xl font-bold text-[#071d49]">Edit Asset</h2>
                                    <p class="text-sm text-gray-600 leading-tight"><em>Modify relevant information for
                                            the
                                            asset.</em></p>
                                </div>


                                <!-- Asset Basic Information Grid (3 Columns) -->
                                <!-- Card Wrapper -->
                                <div class="w-full rounded-xl p-4 border-l-[15px] shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] border-[#ffdd00] space-y-6 bg-[#FAFBFF]"
                                    x-data="{ selectedCategory: null }"
                                    x-init="selectedCategory = Number('{{ old('category_id', $asset->category_id) }}')">
                                    <!-- Heading -->
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
                                            <select x-model="selectedCategory" name="category_id"
                                                @change="console.log('Changed to:', selectedCategory)"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]">
                                                <option value="">SELECT CATEGORY</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->category_id }}" {{ $asset->category_id == $category->category_id ? 'selected' : '' }}>
                                                        {{ strtoupper($category->category_name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Condition -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Condition</label>
                                            <select name="condition_id"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]">
                                                <option value="">SELECT CONDITION</option>
                                                @foreach ($conditions as $condition)
                                                    <option value="{{ $condition->condition_id }}" {{ $asset->condition_id == $condition->condition_id ? 'selected' : '' }}>
                                                        {{ strtoupper($condition->condition_name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Status -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Status</label>
                                            <select name="status_id"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]">
                                                <option value="">SELECT STATUS</option>
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status->status_id }}" {{ $asset->status_id == $status->status_id ? 'selected' : '' }}>
                                                        {{ strtoupper($status->status_name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Asset Name -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Asset Name</label>
                                            <input type="text" name="asset_name"
                                                value="{{ old('asset_name', $asset->asset_name) }}"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]"
                                                placeholder="ASSET NAME">
                                        </div>

                                        <!-- Brand Name -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Brand Name</label>
                                            <!-- Brand Select (for categories 1 or 6) -->
                                            <select name="brand_id"
                                                x-show="Number(selectedCategory) === 1 || Number(selectedCategory) === 6"
                                                x-cloak
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]">
                                                <option value="">SELECT BRAND</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->brand_id }}" {{ $asset->brand_id == $brand->brand_id ? 'selected' : '' }}>
                                                        {{ strtoupper($brand->brand_name) }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <!-- Manual Brand Input (other categories) -->
                                            <input type="text" name="brand_name"
                                                x-show="Number(selectedCategory) !== 1 && Number(selectedCategory) !== 6"
                                                x-cloak value="{{ old('brand_name', $asset->brand_name_custom) }}"
                                                placeholder="BRAND NAME"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]">
                                        </div>

                                        <!-- Model -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Model</label>
                                            <input type="text" name="model_name"
                                                value="{{ old('model_name', $asset->model_name) }}" placeholder="MODEL"
                                                class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]">
                                        </div>
                                    </div>

                                    <!-- Device Fields for IT Equipment and Mobile Devices -->
                                    <div x-show="Number(selectedCategory) === 1 || Number(selectedCategory) === 6"
                                        x-transition class="mt-3">
                                        <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-x-10 gap-y-6">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Device Serial
                                                    Number</label>
                                                <input type="text" name="device_serial_number"
                                                    value="{{ old('device_serial_number', $asset->device_serial_number) }}"
                                                    placeholder="DEVICE SERIAL NUMBER"
                                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Charger Serial
                                                    Number</label>
                                                <input type="text" name="charger_serial_number"
                                                    value="{{ old('charger_serial_number', $asset->charger_serial_number) }}"
                                                    placeholder="CHARGER SERIAL NUMBER"
                                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Operating
                                                    System</label>
                                                <input type="text" name="operating_system"
                                                    value="{{ old('operating_system', $asset->operating_system) }}"
                                                    placeholder="OPERATING SYSTEM"
                                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]">
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <!-- Type + Date + Assigned Dropdown (3 Columns) -->
                                <div x-data="{ 
    type: '{{ old('asset_type', $asset->asset_type) == 1 ? 'common' : 'non-common' }}' 
}" class="w-full rounded-xl p-4 border-l-[15px] shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] border-[#ffdd00] space-y-6 bg-[#FAFBFF]">

                                    <!-- Heading -->
                                    <div class="flex items-center gap-2 text-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                            class="size-5">
                                            <path fill-rule="evenodd"
                                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <h3 class="text-md font-semibold text-blue-800">Asset Assignment</h3>
                                    </div>

                                    <!-- Grid -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-10 gap-y-6">

                                        <!-- Type -->
                                        <div class="relative group">
                                            <label class="block text-sm font-medium text-gray-700">Type</label>
                                            <select name="asset_type" x-model="type"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm bg-white">
                                                <option value="">SELECT TYPE</option>
                                                <option value="common" @if(old('asset_type', $asset->asset_type) == 1)
                                                selected @endif>COMMON ASSET</option>
                                                <option value="non-common" @if(old('asset_type', $asset->asset_type) == 2)
                                                selected @endif>NON-COMMON ASSET</option>
                                            </select>
                                        </div>

                                        <!-- Department (Common) -->
                                        <div class="relative group" x-show="type === 'common'" x-cloak>
                                            <label class="block text-sm font-medium text-gray-700">Department
                                                Assigned</label>
                                            <select name="department_id"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm bg-white">
                                                <option value="">SELECT DEPARTMENT</option>
                                                @foreach ($departments as $dept)
                                                    <option value="{{ $dept->department_id }}" @if(old('department_id', $asset->department_id) == $dept->department_id) selected @endif>
                                                        {{ strtoupper($dept->department_name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Employee (Non-Common) -->
                                        <div class="relative group" x-show="type === 'non-common'" x-cloak>
                                            <label class="block text-sm font-medium text-gray-700">Employee
                                                Assigned</label>
                                            <select name="employee_id"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm bg-white">
                                                <option value="">SELECT EMPLOYEE</option>
                                                @foreach ($employees as $emp)
                                                    <option value="{{ $emp->employee_id }}" @if(old('employee_id', $asset->employee_id) == $emp->employee_id) selected @endif>
                                                        {{ strtoupper($emp->employee_lastname) }},
                                                        {{ strtoupper($emp->employee_firstname) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Date Assigned -->
                                        <div class="relative group">
                                            <label class="block text-sm font-medium text-gray-700">Date Assigned</label>
                                            <input type="date" name="date_accountable"
                                                value="{{ old('date_accountable', optional($asset->date_accountable)->format('Y-m-d')) }}"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm bg-white">
                                        </div>

                                    </div>
                                </div>





                                {{-- Maintenance --}}
                                <div
                                    class="w-full rounded-xl p-4 border-l-[15px] shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] border-[#ffdd00] space-y-6 bg-[#FAFBFF]">
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
                                            <input type="text" name="service_provider"
                                                value="{{ old('service_provider', $asset->service_provider) }}"
                                                placeholder="SERVICE PROVIDER"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-sm bg-[ffffff]">
                                        </div>

                                        <!-- Next Maintenance -->
                                        <div class="relative group">
                                            <label class="block text-sm font-medium text-gray-700">Next Maintenance
                                                Schedule</label>
                                            <input type="date" name="maint_sched"
                                                value="{{ old('maint_sched', optional($asset->maint_sched)->format('Y-m-d')) }}"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm bg-[ffffff]">
                                        </div>

                                        <!-- Last Maintenance -->
                                        <div class="relative group">
                                            <label class="block text-sm font-medium text-gray-700">Last Maintenance
                                                Schedule</label>
                                            <input type="date" name="last_maint_sched"
                                                value="{{ old('last_maint_sched', optional($asset->last_maint_sched)->format('Y-m-d')) }}"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm bg-[ffffff]">
                                        </div>

                                        <!-- Check-in Status -->
                                        <div class="relative group">
                                            <label class="block text-sm font-medium text-gray-700">Check-in
                                                Status</label>
                                            <select name="check_out_status"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm bg-[ffffff]">
                                                <option value="">SELECT STATUS</option>
                                                <option value="IN USE" {{ old('check_out_status', $asset->check_out_status) == 'IN USE' ? 'selected' : '' }}>IN USE
                                                </option>
                                                <option value="ON GOING" {{ old('check_out_status', $asset->check_out_status) == 'ON GOING' ? 'selected' : '' }}>ON GOING
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Check-in Date -->
                                        <div class="relative group">
                                            <label class="block text-sm font-medium text-gray-700">Check-in Date</label>
                                            <input type="date" name="check_in_date"
                                                value="{{ old('check_in_date', optional($asset->check_in_date)->format('Y-m-d')) }}"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm bg-[ffffff]">
                                        </div>

                                        <!-- Check-out Date -->
                                        <div class="relative group">
                                            <label class="block text-sm font-medium text-gray-700">Check-out
                                                Date</label>
                                            <input type="date" name="check_out_date"
                                                value="{{ old('check_out_date', optional($asset->check_out_date)->format('Y-m-d')) }}"
                                                class="uppercase mt-1 block w-full rounded-md border border-gray-300 bg-gray-100 shadow-sm text-sm bg-[ffffff]">
                                        </div>
                                    </div>
                                </div>


                                <div
                                    class="w-full rounded-xl p-4 border-l-[15px] shadow-[0_-4px_8px_rgba(0,0,0,0.1),4px_0_8px_rgba(0,0,0,0.1),0_4px_8px_rgba(0,0,0,0.1),-4px_0_8px_rgba(0,0,0,0.1)] border-[#ffdd00] space-y-6 bg-[#FAFBFF]">
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
                                        <div class="w-full md:w-1/2 grid grid-cols-1 md:grid-cols-2 gap-6"  x-data="{
        purchaseDate: '{{ old('purchase_date', optional($asset->purchase_date)->format('Y-m-d')) }}',
        expirationDate: '{{ old('warranty_exp_date', optional($asset->warranty_exp_date)->format('Y-m-d')) }}',
        warrantyYears: 0,
        freeReplacementDate: '{{ old('free_replacement_period', $asset->free_replacement_period) }}',
        freeReplacementValue: 0,
        freeReplacementUnit: 'days',

        init() {
            this.computeWarrantyYears();
            this.computeFreeReplacementPeriod();

            // Recalculate expiration date when years are changed
            this.$watch('warrantyYears', value => {
                if (this.purchaseDate && value > 0) {
                    const base = new Date(this.purchaseDate);
                    base.setFullYear(base.getFullYear() + Number(value));
                    this.expirationDate = base.toISOString().split('T')[0];
                }
            });

            // Recalculate warrantyYears when dates are manually adjusted
            this.$watch('purchaseDate', () => this.computeWarrantyYears());
            this.$watch('expirationDate', () => this.computeWarrantyYears());
        },

        computeWarrantyYears() {
            if (this.purchaseDate && this.expirationDate) {
                const p = new Date(this.purchaseDate);
                const e = new Date(this.expirationDate);
                let years = e.getFullYear() - p.getFullYear();
                const mDiff = e.getMonth() - p.getMonth();
                const dDiff = e.getDate() - p.getDate();
                if (mDiff > 0 || (mDiff === 0 && dDiff > 0)) years += 1;
                this.warrantyYears = years;
            }
        },

        computeFreeReplacementPeriod() {
            if (this.purchaseDate && this.freeReplacementDate) {
                const p = new Date(this.purchaseDate);
                const f = new Date(this.freeReplacementDate);
                const diffTime = f - p;
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                if (diffDays > 30) {
                    this.freeReplacementUnit = 'weeks';
                    this.freeReplacementValue = Math.round(diffDays / 7);
                } else {
                    this.freeReplacementUnit = 'days';
                    this.freeReplacementValue = diffDays;
                }
            }
        }
    }" x-init="init()">
                                            <!-- Purchase Date -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Purchase
                                                    Date</label>
                                                <input type="date" x-model="purchaseDate" name="purchase_date"
                                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]">
                                            </div>

                                            <!-- Free Replacement Period -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Free Replacement
                                                    Period</label>
                                                <div class="flex gap-2 mt-1">
                                                    <input type="number" min="0" x-model="freeReplacementValue"
                                                        class="uppercase w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]"
                                                        placeholder="E.G., 30">
                                                    <select x-model="freeReplacementUnit"
                                                        class="uppercase w-32 rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]">
                                                        <option value="days">DAYS</option>
                                                        <option value="weeks">WEEKS</option>
                                                    </select>
                                                </div>

                                                <!-- 🔒 Hidden computed field -->
                                                <input type="hidden" name="free_replacement_period" :value="(() => {
            const base = new Date(purchaseDate);
            const days = freeReplacementUnit === 'weeks' ? freeReplacementValue * 7 : freeReplacementValue;
            base.setDate(base.getDate() + days);
            return base.toISOString().split('T')[0];
        })()" />
                                            </div>


                                            <!-- Warranty Expiration Date -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Warranty
                                                    Expiration
                                                    Date</label>
                                                <input type="date" x-model="expirationDate" name="warranty_exp_date"
                                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]">
                                            </div>

                                            <!-- Warranty Duration -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Warranty Duration
                                                    (Years)</label>
                                                <input type="number" min="1" x-model="warrantyYears"
                                                    name="warranty_years"
                                                    class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]"
                                                    placeholder="E.G., 1">
                                            </div>
                                        </div>

                                        <!-- RIGHT: Description -->
                                        <div class="w-full md:w-1/2 flex flex-col h-[150px] ">
                                            <label class="block text-sm font-medium text-gray-700">Description</label>
                                            <textarea name="description"
                                                class="uppercase mt-1 flex-grow resize-none block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600 text-sm bg-[ffffff]"
                                                placeholder="DESCRIPTION">{{ old('description', $asset->description) }}</textarea>
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
            </form>
        </div>
    </div>
</x-app-layout>