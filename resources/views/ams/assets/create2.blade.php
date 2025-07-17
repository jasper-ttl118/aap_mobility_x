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

        {{-- Content --}}
        <div class="flex flex-col lg:flex-row">
            <div x-ref="scrollTarget"
                class="@container/main rounded-xl border-2 border-gray-100 bg-white justify-center items-center flex w-full lg:w-8/12 flex-col shadow-xl -mt-4">
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

                <form>
                    {{-- <form method="POST" action="{{ route('asset.queue.validate') }}" id="assetForm"> --}}
                        @csrf
                        <div class="p-10 space-y-8 space-y-1.5 @lg/main:space-y-14">
                            <div class="gap-y-3 flex flex-col">
                                <div class="w-full flex flex-col gap-y-1 -mt-5">
                                    <div class="flex justify-between items-start w-full">
                                        <!-- Left Side: Title and Subtitle -->
                                        <div class="flex flex-col items-start">
                                            <h2 class="text-xl font-bold text-[#071d49]">Add New Asset</h2>
                                            <p class="text-sm text-gray-600 leading-tight">
                                                <em>Enter all relevant information for the asset.</em>
                                            </p>
                                        </div>

                                        <!-- Right Side: Required Fields Note -->
                                        <div class="text-xs italic text-red-600 font-medium pt-8">
                                            * - required fields
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 mt-2">
                                    <!-- Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-5 text-blue-800">
                                        <path fill-rule="evenodd"
                                            d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                                            clip-rule="evenodd" />
                                    </svg>


                                    <!-- Heading -->
                                    <h3 class="text-md font-semibold text-blue-800">Asset Information</h3>
                                </div>

                                <!-- Asset Basic Info -->
                                <div x-data="{
                                        openCategory: false,
                                        selectedCategoryName: '',
                                        selectedCategoryId: '',
                                        selectedBrandName: '',
                                        openCondition: false,
                                        openStatus: false,
                                        openBrand: false,
                                        showBrandDropdown() {
                                            return this.selectedCategoryId === '1' || this.selectedCategoryId === '6';
                                        }
                                    }" class="w-full grid grid-cols-1 md:grid-cols-3 gap-x-3 gap-y-6">

                                    <!-- CATEGORY DROPDOWN -->
                                    <div class="relative w-full">
                                        <div class="flex items-center justify-between">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Category
                                                <span class="text-red-600" x-show="!selectedCategoryId">*</span>
                                            </label>

                                            <!-- Tooltip Icon -->
                                            <div class="relative group flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="size-5 hover:bg-orange-400 hover:text-white rounded-full text-orange-500 cursor-pointer transition">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                                </svg>

                                                <!-- Tooltip Content -->
                                                <div
                                                    class="absolute left-full top-1/2 -translate-y-1/2 ml-2 w-64 z-10 p-3 border-l-4 border-orange-400 bg-orange-50 rounded-md shadow text-xs text-justify text-orange-800 opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-300">
                                                    <p>
                                                        Select the <strong>Category</strong> first. For <strong>IT
                                                            Equipments</strong> or <strong>Mobile Devices</strong>,
                                                        choose a brand from the dropdown list. For other asset types,
                                                        manually enter the brand name.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" @click="openCategory = !openCategory" :class="[
                                                        'mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none',
                                                        selectedCategoryId 
                                                            ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600' 
                                                            : 'border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                                                    ]">
                                            <span x-text="selectedCategoryName || 'SELECT CATEGORY'"
                                                class="block truncate uppercase"></span>

                                            <svg class="absolute right-3 mt-6 top-3 w-4 h-4 text-gray-500 pointer-events-none"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                        @error('category_name')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror

                                        <ul x-show="openCategory" @click.outside="openCategory = false" x-transition
                                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                                            <li @click="selectedCategoryName = ''; selectedCategoryId = ''; openCategory = false"
                                                class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                SELECT CATEGORY
                                            </li>

                                            @foreach ($categories as $category)
                                            <li @click="selectedCategoryName = '{{ strtoupper($category->category_name) }}'; selectedCategoryId = '{{ $category->category_id }}'; openCategory = false"
                                                class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                {{ strtoupper($category->category_name) }}
                                            </li>
                                            @endforeach
                                        </ul>

                                        <input type="hidden" name="category_name" :value="selectedCategoryName">
                                    </div>

                                    <!-- CONDITION DROPDOWN -->
                                    <div x-data="{ 
                                            open: false, 
                                            selected: '', 
                                            showGreen: false 
                                        }" class="relative w-full">

                                        <!-- Label -->
                                        <div class="flex items-center justify-between">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Condition <span class="text-red-600" x-show="!showGreen">*</span>
                                            </label>
                                        </div>

                                        <!-- Dropdown Button -->
                                        <button type="button" @click="open = !open" :class="[
                                                    'mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none',
                                                    showGreen 
                                                        ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600' 
                                                        : 'border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                                                ]">
                                            <span x-text="selected || 'SELECT CONDITION'"
                                                class="block truncate uppercase"></span>
                                            <svg class="absolute right-3 mt-6 top-3 w-4 h-4 text-gray-500 pointer-events-none"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown Options -->
                                        <ul x-show="open" @click.outside="open = false" x-transition
                                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">

                                            <li @click="
                                                    selected = ''; 
                                                    showGreen = false; 
                                                    $refs.input.value = ''; 
                                                    open = false
                                                "
                                                class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                SELECT CONDITION
                                            </li>

                                            @foreach ($conditions as $condition)
                                            <li @click="
                                                    selected = '{{ strtoupper($condition->condition_name) }}'; 
                                                    showGreen = true; 
                                                    $refs.input.value = '{{ $condition->condition_name }}'; 
                                                    open = false
                                                "
                                                class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                {{ strtoupper($condition->condition_name) }}
                                            </li>
                                            @endforeach
                                        </ul>

                                        <!-- Hidden Input -->
                                        <input type="hidden" name="condition_name" x-ref="input">
                                    </div>

                                    <!-- STATUS DROPDOWN -->
                                    <div x-data="{ 
                                            open: false, 
                                            selected: '', 
                                            showGreen: false 
                                        }" class="relative w-full">

                                        <!-- Label with asterisk toggle -->
                                        <div class="flex items-center justify-between">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Status <span class="text-red-600" x-show="!showGreen">*</span>
                                            </label>
                                        </div>

                                        <!-- Dropdown button -->
                                        <button type="button" @click="open = !open" :class="[
                                                'mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none',
                                                showGreen 
                                                    ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600' 
                                                    : 'border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                                            ]">
                                            <span x-text="selected || 'SELECT STATUS'"
                                                class="block truncate uppercase"></span>
                                            <svg class="absolute right-3 mt-6 top-3 w-4 h-4 text-gray-500 pointer-events-none"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <ul x-show="open" @click.outside="open = false" x-transition
                                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">

                                            <li @click="
                                                    selected = ''; 
                                                    showGreen = false; 
                                                    $refs.input.value = ''; 
                                                    open = false
                                                "
                                                class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                SELECT STATUS
                                            </li>

                                            @foreach ($statuses as $status)
                                            <li @click="
                                                        selected = '{{ strtoupper($status->status_name) }}'; 
                                                        showGreen = true; 
                                                        $refs.input.value = '{{ $status->status_name }}'; 
                                                        open = false
                                                    "
                                                class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                {{ strtoupper($status->status_name) }}
                                            </li>
                                            @endforeach
                                        </ul>

                                        <!-- Hidden input for Livewire/form -->
                                        <input type="hidden" name="status_name" x-ref="input">
                                    </div>

                                    <!-- ASSET NAME -->
                                    <div x-data="{ 
                                                    assetName: '', 
                                                    showCheck: false,
                                                    handleBlur() {
                                                        this.showCheck = this.assetName.trim().length > 0;
                                                    }
                                                }">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Asset Name <span class="text-red-600" x-show="!showCheck"
                                                x-transition>*</span>
                                        </label>

                                        <div class="relative w-full">

                                            <!-- Input Field -->
                                            <input type="text" name="asset_name" placeholder="ASSET NAME"
                                                autocomplete="off" x-model="assetName" @blur="handleBlur" :class="[
                                                        'uppercase mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm  focus:outline-none',
                                                        showCheck 
                                                            ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600' 
                                                            : 'border-gray-300 focus:ring-blue-600 focus:border-blue-600'
                                                    ]">
                                        </div>
                                    </div>

                                    <!-- BRAND FIELD -->
                                    <div x-data="{
                                                brandName: '',
                                                showCheck: false,
                                                handleBrandBlur() {
                                                    this.showCheck = this.brandName.trim().length > 0;
                                                }
                                            }" class="relative w-full">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Brand Name <span class="text-red-600" x-show="!showCheck"
                                                x-transition>*</span>
                                        </label>

                                        <!-- Styled Dropdown for IT or Mobile -->
                                        <div x-show="showBrandDropdown()" x-cloak class="relative w-full">
                                            <button type="button" @click="openBrand = !openBrand" :class="[
                                                        'mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none',
                                                        selectedBrandName.trim().length > 0 
                                                            ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600' 
                                                            : 'border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                                                    ]">
                                                <span x-text="selectedBrandName || 'SELECT BRAND'"
                                                    class="block truncate uppercase"></span>

                                                <svg class="absolute right-3 -mt-4 w-4 h-4 text-gray-500 pointer-events-none"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </button>

                                            <!-- Dropdown Options -->
                                            <ul x-show="openBrand" @click.outside="openBrand = false" x-transition
                                                class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                                                <li @click="selectedBrandName = 'SELECT BRAND'; $refs.brandInput.value = ''; openBrand = false"
                                                    class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                    SELECT BRAND
                                                </li>
                                                @foreach ($brands as $brand)
                                                <li @click="selectedBrandName = '{{ addslashes(strtoupper($brand->brand_name)) }}'; $refs.brandInput.value = '{{ $brand->brand_name }}'; openBrand = false"
                                                    class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                    {{ strtoupper($brand->brand_name) }}
                                                </li>
                                                @endforeach

                                            </ul>

                                            <input type="hidden" name="brand_name" x-ref="brandInput">
                                        </div>

                                        <!-- Text Input for non-IT or non-Mobile -->
                                        <div x-show="!showBrandDropdown()" x-cloak class="relative w-full">

                                            <!-- Brand Name Input -->
                                            <input type="text" name="brand_name_custom" x-model="brandName"
                                                autocomplete="off" @blur="handleBrandBlur" placeholder="BRAND NAME"
                                                :class="[
                                                        'uppercase mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm  focus:outline-none',
                                                        showCheck 
                                                            ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600' 
                                                            : 'border-gray-300 focus:ring-blue-600 focus:border-blue-600'
                                                    ]">
                                        </div>

                                    </div>

                                    <!-- MODEL -->
                                    <div x-data="{
                                                    modelName: '',
                                                    showCheck: false,
                                                    handleModelBlur() {
                                                        this.showCheck = this.modelName.trim().length > 0;
                                                    }
                                                }">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Model <span class="text-red-600" x-show="!showCheck" x-transition>*</span>
                                        </label>

                                        <div class="relative w-full">

                                            <!-- Model Input -->
                                            <input type="text" name="model_name" x-model="modelName" autocomplete="off"
                                                @blur="handleModelBlur" placeholder="MODEL" :class="[
                                                        ' uppercase mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm  focus:outline-none',
                                                        showCheck 
                                                            ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600' 
                                                            : 'border-gray-300 focus:ring-blue-600 focus:border-blue-600'
                                                    ]">
                                        </div>

                                    </div>

                                    <!-- TECHNICAL SPECS -->
                                    <div x-show="showBrandDropdown()" x-transition class="md:col-span-3">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-3">

                                            <!-- Device Serial Number -->
                                            <div x-data="{ serial: '', touched: false }">
                                                <label class="block text-sm font-medium text-gray-700">Device Serial
                                                    Number</label>
                                                <input type="text" name="device_serial_number" autocomplete="off"
                                                    placeholder="SERIAL NUMBER" x-model="serial" @blur="touched = true"
                                                    :class="[
                                                        'uppercase mt-1 block w-full rounded-md shadow-sm text-sm',
                                                        touched && serial.trim().length > 0 
                                                            ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600'
                                                            : 'border-gray-300 focus:ring-blue-600 focus:border-blue-600'
                                                    ]">
                                            </div>

                                            <!-- Charger Serial Number -->
                                            <div x-data="{ serial: '', touched: false }">
                                                <label class="block text-sm font-medium text-gray-700">Charger Serial
                                                    Number</label>
                                                <input type="text" name="charger_serial_number" autocomplete="off"
                                                    placeholder="SERIAL NUMBER" x-model="serial" @blur="touched = true"
                                                    :class="[
                                                            'uppercase mt-1 block w-full rounded-md shadow-sm text-sm',
                                                            touched && serial.trim().length > 0 
                                                                ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600'
                                                                : 'border-gray-300 focus:ring-blue-600 focus:border-blue-600'
                                                        ]">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Assignment -->
                                <div x-data="{
                                                type: '',
                                                openType: false,
                                                openAssignee: false,
                                                selectedAssigneeLabel: '',
                                                selectedAssigneeId: '',
                                                selectedType: '',
                                            }" class="w-full border-t border-gray-400 mt-3 pt-3">


                                    <!-- Header -->
                                    <div class="flex items-center gap-2 mt-2 pb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-5 text-blue-800">
                                            <path fill-rule="evenodd"
                                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <h3 class="text-md font-semibold text-blue-800">Asset Assignment</h3>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-3 gap-y-6">

                                        <!-- Type Dropdown -->
                                        <div class="relative w-full">
                                            <div class="flex items-center justify-between">
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Asset Type
                                                    <span class="text-red-600" x-show="!selectedType"
                                                        x-transition>*</span>
                                                </label>


                                                <!-- Tooltip Icon -->
                                                <div class="relative group flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-5 hover:bg-orange-400 hover:text-white rounded-full text-orange-500 cursor-pointer transition">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                                    </svg>

                                                    <!-- Tooltip Content -->
                                                    <div
                                                        class="absolute left-full top-1/2 -translate-y-1/2 ml-2 w-64 z-10 p-3 border-l-4 border-orange-400 bg-orange-50 rounded-md shadow text-xs text-justify text-orange-800 opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-300">
                                                        <p>
                                                            Select Asset Type. Assign <strong>Common Assets</strong> to
                                                            Departments and <strong>Non-Common Assets</strong> to
                                                            Employees.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" @click="openType = !openType" :class="[
                                                        'mt-1 w-full bg-white rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none relative',
                                                        selectedType 
                                                            ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600'
                                                            : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                                                    ]">
                                                <span x-text="selectedType || 'SELECT TYPE'"
                                                    class="block truncate uppercase"></span>
                                                <svg class="absolute right-3 top-[10px] w-4 h-4 text-gray-500 pointer-events-none"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </button>
                                            <ul x-show="openType" @click.outside="openType = false" x-transition
                                                class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                                                <li @click="
                                                        selectedType = 'COMMON ASSET';
                                                        type = 'common';
                                                        selectedAssigneeLabel = 'SELECT DEPARTMENT';
                                                        selectedAssigneeId = '';
                                                        openType = false"
                                                    class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                    COMMON ASSET
                                                </li>
                                                <li @click="
                                                        selectedType = 'NON-COMMON ASSET';
                                                        type = 'non-common';
                                                        selectedAssigneeLabel = 'SELECT EMPLOYEE';
                                                        selectedAssigneeId = '';
                                                        openType = false"
                                                    class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                    NON-COMMON ASSET
                                                </li>
                                            </ul>

                                            <input type="hidden" name="assignment_type" :value="type">

                                        </div>

                                        <!-- Assigned To Dropdown -->
                                        <div x-data="{
                                                    showTypeWarning: false,
                                                    handleAssigneeClick() {
                                                        if (!type) {
                                                            this.showTypeWarning = true;
                                                            setTimeout(() => this.showTypeWarning = false, 3000);
                                                            return;
                                                        }
                                                        openAssignee = !openAssignee;
                                                    }
                                                }" class="relative w-full">

                                            <label class="block text-sm font-medium text-gray-700"
                                                x-html="type === 'common' 
                                                ? ('Department Assigned' + (selectedAssigneeId === '' ? ' <span class=\'text-red-600\'>*</span>' : '')) 
                                                : ('Employee Assigned' + (selectedAssigneeId === '' ? ' <span class=\'text-red-600\'>*</span>' : ''))">
                                            </label>

                                            <!-- Dropdown -->
                                            <div>
                                                <button type="button" @click="handleAssigneeClick" :class="[
                                                        'mt-1 w-full bg-white rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none relative',
                                                        selectedAssigneeId 
                                                            ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600'
                                                            : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                                                    ]">
                                                    <span x-text="selectedAssigneeLabel || 'SELECT EMPLOYEE'"
                                                        class="block truncate uppercase"></span>
                                                    <svg class="absolute right-3 top-[10px] w-4 h-4 text-gray-500 pointer-events-none"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7" />
                                                    </svg>
                                                </button>

                                                <!-- Warning message -->
                                                <div x-show="showTypeWarning" x-transition
                                                    class="mt-1 text-xs italic text-orange-600 px-2 py-1 ">
                                                    Select Asset Type first.
                                                </div>

                                                <!-- Department Options -->
                                                <ul x-show="openAssignee && type === 'common'"
                                                    @click.outside="openAssignee = false" x-transition
                                                    class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                                                    <li @click="
                                                        selectedAssigneeLabel = 'SELECT DEPARTMENT';
                                                        selectedAssigneeId = '';
                                                        openAssignee = false"
                                                        class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                        SELECT DEPARTMENT
                                                    </li>
                                                    @foreach ($departments as $department)
                                                    <li @click="
                                                            selectedAssigneeLabel = '{{ strtoupper($department->department_name) }}';
                                                            selectedAssigneeId = '{{ $department->department_id }}';
                                                            openAssignee = false"
                                                        class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                        {{ strtoupper($department->department_name) }}
                                                    </li>
                                                    @endforeach
                                                </ul>

                                                <!-- Employee Options -->
                                                <ul x-show="openAssignee && type === 'non-common'"
                                                    @click.outside="openAssignee = false" x-transition
                                                    class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                                                    <li @click="
                                                            selectedAssigneeLabel = 'SELECT EMPLOYEE';
                                                            selectedAssigneeId = '';
                                                            openAssignee = false"
                                                        class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                        SELECT EMPLOYEE
                                                    </li>
                                                    @foreach ($employees as $employee)
                                                    <li @click="
                                                            selectedAssigneeLabel = '{{ strtoupper($employee->employee_lastname) }}, {{ strtoupper($employee->employee_firstname) }}';
                                                            selectedAssigneeId = '{{ $employee->employee_id }}';
                                                            openAssignee = false"
                                                        class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                        {{ strtoupper($employee->employee_lastname) }},
                                                        {{ strtoupper($employee->employee_firstname) }}
                                                    </li>
                                                    @endforeach
                                                </ul>

                                                <!-- Hidden Input -->
                                                <input type="hidden" name="assignment_type" :value="type">
                                                <input type="hidden" name="assignee_id" :value="selectedAssigneeId">
                                                <input type="hidden" name="assigned_to_name"
                                                    :value="selectedAssigneeLabel">
                                            </div>
                                        </div>

                                        <!-- Date Assigned -->
                                        <div x-data="{
                                                dateAssigned: '',
                                                
                                            }" class="relative w-full">

                                            <!-- Label -->
                                            <label class="block text-sm font-medium text-gray-700">
                                                Date Assigned
                                                <span class="text-red-600" x-show="!dateAssigned" x-transition>*</span>
                                            </label>

                                            <!-- Input -->
                                            <div x-data="{
                                                    dateAssigned: '',
                                                    today: new Date().toISOString().split('T')[0]
                                                }">
                                                <input type="date" name="date_assigned" x-model="dateAssigned"
                                                                                                    :max="today" :class="[
                                                                'mt-1 block w-full rounded-md shadow-sm text-sm uppercase',
                                                                dateAssigned 
                                                                    ? 'border-2 border-green-600 focus:ring-green-600 focus:border-green-600'
                                                                    : 'border border-gray-300 focus:ring-blue-600 focus:border-blue-600'
                                                            ]">
                                            </div>

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
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Purchase Date <span class="text-red-600" x-show="!purchaseDate"
                                                        x-transition>*</span>
                                                </label>

                                                <input type="date" name="purchase_date" x-model="purchaseDate" :class="[
                                                    'uppercase mt-1 block w-full rounded-md shadow-sm text-sm',
                                                    purchaseDate 
                                                        ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600'
                                                        : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                                                ]">
                                            </div>


                                            <!-- Free Replacement Period -->
                                            <div x-data="{
                                                        replacementValue: '',
                                                        replacementUnit: '',
                                                        openUnit: false,
                                                        clearUnitIfEmpty() {
                                                            if (!this.replacementValue) {
                                                                this.replacementUnit = '';
                                                            }
                                                        }
                                                    }" x-effect="clearUnitIfEmpty()" class="relative w-full">
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Free Replacement Period
                                                </label>

                                                <div class="flex gap-2 mt-1 items-start">
                                                    <input type="number" name="free_replacement_value"
                                                        x-model="replacementValue" min="0"
                                                        class="uppercase w-5/12 rounded-md shadow-sm text-sm px-2 py-2 bg-white focus:outline-none"
                                                        :class="replacementValue 
                                                            ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600' 
                                                            : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'"
                                                        placeholder="E.G., 30">

                                                    <div class="relative w-7/12">
                                                        <button type="button" @click="openUnit = !openUnit"
                                                            class="w-full rounded-md shadow-sm text-sm px-3 py-2 text-left bg-white uppercase focus:outline-none"
                                                            :class="replacementValue 
                                                                ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600' 
                                                                : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'">
                                                            <span x-text="replacementUnit || 'SELECT'"
                                                                class="block truncate"></span>
                                                            <svg class="absolute right-2 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-500 pointer-events-none"
                                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M19 9l-7 7-7-7" />
                                                            </svg>
                                                        </button>

                                                        <ul x-show="openUnit" @click.outside="openUnit = false"
                                                            x-transition
                                                            class="absolute z-10 mt-1 w-full bg-white shadow-lg rounded-xl py-1 text-sm ring-1 ring-black ring-opacity-5 overflow-auto text-gray-800">
                                                            <li @click="replacementUnit = 'DAYS'; openUnit = false"
                                                                class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                                DAYS
                                                            </li>
                                                            <li @click="replacementUnit = 'WEEKS'; openUnit = false"
                                                                class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                                                WEEKS
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <!-- Hidden Input for form submission -->
                                                <input type="hidden" name="free_replacement_unit"
                                                    :value="replacementUnit">
                                            </div>



                                            <!-- Warranty Expiration Date -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Warranty Expiration Date
                                                </label>
                                                <input type="date" name="warranty_exp_date" x-model="expirationDate"
                                                    :class="[
                                                        'uppercase mt-1 block w-full rounded-md shadow-sm text-sm',
                                                        expirationDate 
                                                            ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600' 
                                                            : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                                                    ]">
                                            </div>


                                            <!-- Warranty Duration -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Warranty Duration (Years)
                                                </label>
                                                <input type="number" name="warranty_years" min="0"
                                                    x-model="warrantyYears" :class="[
                                                        'uppercase mt-1 block w-full rounded-md shadow-sm text-sm',
                                                        warrantyYears 
                                                            ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600' 
                                                            : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                                                    ]" placeholder="E.G., 2">
                                            </div>

                                        </div>

                                        <!-- Description (spans 2/5 = 40%) -->
                                        <div class="col-span-5 md:col-span-2 flex flex-col"
                                            x-data="{ description: '' }">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Description
                                            </label>
                                            <textarea name="description" x-model="description" :class="[
                                                    'uppercase mt-1 block flex-grow resize-none w-full rounded-md shadow-sm text-sm',
                                                    description 
                                                        ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600'
                                                        : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                                                ]" placeholder="DESCRIPTION">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add to List Button -->
                                <div class="flex justify-end mt-6">
                                    <button type="button" onclick="emitAsset()"
                                        class="btn text-[#151847] px-5 py-2 rounded-lg ring-0  hover:bg-[#F6D400]/80  active:bg-[#F6D400] bg-[#F6D400] text-sm">
                                        Add
                                    </button>


                                    <script>
                                        function emitAsset() {
                                            const getVal = (sel) => document.querySelector(sel)?.value?.toUpperCase() || '';
                                            const getRaw = (sel) => document.querySelector(sel)?.value || '';

                                            const payload = {
                                                id: Date.now(),
                                                name: getVal('input[name="asset_name"]'),
                                                brand: getVal('input[name="brand_name"]') || getVal('input[name="brand_name_custom"]'),
                                                model: getVal('input[name="model_name"]'),
                                                category: getVal('input[name="category_name"]'),
                                                status: getVal('input[name="status_name"]'),
                                                condition: getRaw('input[name="condition_name"]'),
                                                purchase_date: getRaw('input[name="purchase_date"]'),
                                                warranty_expiry: getRaw('input[name="warranty_exp_date"]'),
                                                warranty_years: getRaw('input[name="warranty_years"]'),
                                                replacement_period: getRaw('input[name="free_replacement_value"]'),
                                                replacement_unit: getRaw('select[name="free_replacement_unit"]'),
                                                assignment_type: getVal('input[name="assignment_type"]'),
                                                assigned_to: getVal('input[name="assigned_to_name"]'),
                                                date_assigned: getRaw('input[name="date_assigned"]'),
                                                device_serial: getVal('input[name="device_serial_number"]'),
                                                charger_serial: getVal('input[name="charger_serial_number"]'),
                                                description: getVal('textarea[name="description"]')
                                            };
                                            console.log('Dispatching asset to Livewire:', payload);
                                            Livewire.dispatch('add-asset-to-queue', {payload});
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
            {{-- @if(session('validatedAsset'))
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                                        const payload = @json(session('validatedAsset'));
                                        console.log('Dispatching asset to Livewire:', payload);
                                            
                                        Livewire.dispatch('add-asset-to-queue', { payload });
                                    });
            </script>
            @endif --}}

            <!-- Right Side Sticky Card -->
            <livewire:ams.asset.add-asset-summary>

        </div>

        <!-- Checkmark Icon -->
        {{-- <div x-show="showCheck" x-transition
            class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
            <!-- Checkmark SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="size-5 text-green-600">

                <!-- Solid Filled Circle -->
                <path
                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Z" />

                <!-- Animated Checkmark (stroke only) -->
                <path d="M9 12.75 11.25 15 15 9.75" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round" class="animate-drawCheck"
                    style="stroke-dasharray: 24; stroke-dashoffset: 24;" />
            </svg>
        </div> --}}
</x-app-layout>