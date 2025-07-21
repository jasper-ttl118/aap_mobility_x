<form wire:submit.prevent="addToQueue">
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
                    // shared state
                    openCategory: false,
                    openBrand: false,
                    openCondition: false,
                    openStatus: false,

                    selectedCategoryId: '',
                    selectedCategoryName: '',

                    selectedBrandId: @entangle('brand_id').defer,
                    selectedBrandName: @entangle('brand_name').defer,
                    brandName: @entangle('brand_name_custom').defer,

                    selectedConditionId: '',
                    selectedConditionName: '',

                    selectedStatusId: '',
                    selectedStatusName: '',

                    assetName: @entangle('asset_name').defer,
                    modelName: @entangle('model_name').defer,

                    deviceSerial: @entangle('device_serial_number').defer,
                    chargerSerial: @entangle('charger_serial_number').defer,

                    showCheck(field) {
                        return field && field.trim().length > 0;
                    },

                    showBrandDropdown() {
                        return this.selectedCategoryId === '1' || this.selectedCategoryId === '6';
                    },

                    resetFields() {
                        this.openCategory = false;
                        this.openBrand = false;
                        this.openCondition = false;
                        this.openStatus = false;

                        this.selectedCategoryId = '';
                        this.selectedCategoryName = '';

                        this.selectedBrandId = '';
                        this.selectedBrandName = '';
                        this.brandName = '';

                        this.selectedConditionId = '';
                        this.selectedConditionName = '';

                        this.selectedStatusId = '';
                        this.selectedStatusName = '';

                        this.assetName = '';
                        this.modelName = '';

                        this.deviceSerial = '';
                        this.chargerSerial = '';
                    }
                }" x-on:form-cleared.window="resetFields()" class="w-full grid grid-cols-1 md:grid-cols-3 gap-x-3 gap-y-6">


                <!-- CATEGORY DROPDOWN -->
                <div class="relative w-full">
                    <!-- Label and Tooltip -->
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-medium text-gray-700">
                            Category
                            <span class="text-red-600" x-show="!selectedCategoryId" x-transition>*</span>
                        </label>

                        <div class="relative group flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="size-5 hover:bg-orange-400 hover:text-white rounded-full text-orange-500 cursor-pointer transition">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                            <div
                                class="absolute left-full top-1/2 -translate-y-1/2 ml-2 w-64 z-10 p-3 border-l-4 border-orange-400 bg-orange-50 rounded-md shadow text-xs text-justify text-orange-800 opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-300">
                                <p>
                                    Select the <strong>Category</strong> first. For <strong>IT Equipments</strong> or
                                    <strong>Mobile Devices</strong>, choose a brand from the dropdown list. For other
                                    asset types, manually enter the brand name.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Toggle Button -->
                    <button type="button" @click="openCategory = !openCategory" :class="[
                            'mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none',
                            selectedCategoryId 
                                ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600' 
                                : 'border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                        ]">
                        <span x-text="selectedCategoryName || 'SELECT CATEGORY'"
                            class="block truncate uppercase"></span>
                        <svg class="absolute right-3 mt-6 top-3 w-4 h-4 text-gray-500 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Error Message -->
                    @error('category_id')
                    <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                    @enderror

                    <!-- Dropdown Items -->
                    <ul x-show="openCategory" @click.outside="openCategory = false" x-transition
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">

                        <!-- Clear Option -->
                        <li @click="
                                selectedCategoryId = '';
                                selectedCategoryName = '';
                                $refs.categoryInput.value = '';
                                $refs.categoryInput.dispatchEvent(new Event('input'));
                                openCategory = false
                            " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                            SELECT CATEGORY
                        </li>

                        <!-- Actual Category Options -->
                        @foreach ($categories as $category)
                        <li @click="
                            selectedCategoryId = '{{ $category->category_id }}';
                            selectedCategoryName = '{{ strtoupper($category->category_name) }}';
                            $refs.categoryInput.value = selectedCategoryId;
                            $refs.categoryInput.dispatchEvent(new Event('input'));
                            openCategory = false
                        " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                            {{ strtoupper($category->category_name) }}
                        </li>
                        @endforeach
                    </ul>

                    <input type="hidden" x-ref="categoryInput" wire:model.defer="category_id"
                        :value="selectedCategoryId">

                </div>


                <!-- CONDITION DROPDOWN -->
                <div class="relative w-full">
                    <!-- Label -->
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-medium text-gray-700">
                            Condition
                            <span class="text-red-600" x-show="!selectedConditionId" x-transition>*</span>
                        </label>
                    </div>

                    <!-- Dropdown Toggle -->
                    <button type="button" @click="openCondition = !openCondition" :class="[
                        'mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none',
                        selectedConditionId 
                            ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600' 
                            : 'border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                    ]">
                        <span x-text="selectedConditionName || 'SELECT CONDITION'"
                            class="block truncate uppercase"></span>
                        <svg class="absolute right-3 mt-6 top-3 w-4 h-4 text-gray-500 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Error -->
                    @error('condition_id')
                    <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                    @enderror

                    <!-- Dropdown Items -->
                    <ul x-show="openCondition" @click.outside="openCondition = false" x-transition
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">

                        <!-- Clear Option -->
                        <li @click="
                                selectedConditionId = '';
                                selectedConditionName = '';
                                $refs.conditionInput.value = '';
                                $refs.conditionInput.dispatchEvent(new Event('input'));
                                openCondition = false
                            " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                            SELECT CONDITION
                        </li>

                        <!-- List of Conditions -->
                        @foreach ($conditions as $condition)
                        <li @click="
                                selectedConditionId = '{{ $condition->condition_id }}';
                                selectedConditionName = '{{ strtoupper($condition->condition_name) }}';
                                $refs.conditionInput.value = selectedConditionId;
                                $refs.conditionInput.dispatchEvent(new Event('input'));
                                openCondition = false"
                            class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                            {{ strtoupper($condition->condition_name) }}
                        </li>
                        @endforeach
                    </ul>

                    <input type="hidden" x-ref="conditionInput" wire:model.defer="condition_id"
                        :value="selectedConditionId">

                </div>


                <!-- STATUS DROPDOWN -->
                <div class="relative w-full">
                    <!-- Label -->
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-medium text-gray-700">
                            Status
                            <span class="text-red-600" x-show="!selectedStatusId" x-transition>*</span>
                        </label>
                    </div>

                    <!-- Dropdown Toggle -->
                    <button type="button" @click="openStatus = !openStatus" :class="[
                        'mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none',
                        selectedStatusId 
                            ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600' 
                            : 'border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                    ]">
                        <span x-text="selectedStatusName || 'SELECT STATUS'" class="block truncate uppercase"></span>
                        <svg class="absolute right-3 mt-6 top-3 w-4 h-4 text-gray-500 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Error Display -->
                    @error('status_id')
                    <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                    @enderror

                    <!-- Dropdown List -->
                    <ul x-show="openStatus" @click.outside="openStatus = false" x-transition
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">

                        <!-- Reset Option -->
                        <li @click="
                                selectedStatusId = '';
                                selectedStatusName = '';
                                $refs.statusInput.value = '';
                                $refs.statusInput.dispatchEvent(new Event('input'));
                                openStatus = false
                            " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                            SELECT STATUS
                        </li>

                        <!-- Status Options -->
                        @foreach ($statuses as $status)
                        <li @click="
                            selectedStatusId = '{{ $status->status_id }}';
                            selectedStatusName = '{{ strtoupper($status->status_name) }}';
                            $refs.statusInput.value = selectedStatusId;
                            $refs.statusInput.dispatchEvent(new Event('input'));
                            openStatus = false"
                            class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                            {{ strtoupper($status->status_name) }}
                        </li>
                        @endforeach
                    </ul>
                    <input type="hidden" x-ref="statusInput" wire:model.defer="status_id" :value="selectedStatusId">

                </div>

                <!-- ASSET NAME -->
                <div class="relative w-full">
                    <!-- Label -->
                    <label class="block text-sm font-medium text-gray-700">
                        Asset Name
                        <span class="text-red-600" x-show="!showCheck(assetName)" x-transition>*</span>
                    </label>

                    <!-- Input -->
                    <input type="text" name="asset_name" x-model="assetName" wire:model.defer="asset_name"
                        placeholder="ASSET NAME" autocomplete="off"
                        class="uppercase mt-1 w-full bg-white rounded-md shadow-sm px-4 py-2 text-left text-sm focus:outline-none"
                        :class="{
                            'border-green-600 border-2 focus:ring-green-600 focus:border-green-600': showCheck(assetName),
                            'border-gray-300 focus:ring-blue-600 focus:border-blue-600': !showCheck(assetName)
                        }">

                    <!-- Error Message -->
                    @error('asset_name')
                    <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- BRAND FIELD -->
                <div class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700">
                        Brand Name
                        <span class="text-red-600"
                            x-show="showBrandDropdown() ? !showCheck(selectedBrandName) : !showCheck(brandName)"
                            x-transition>*</span>
                    </label>

                    <!-- Dropdown for IT Equipment / Mobile Device -->
                    <div x-show="showBrandDropdown()" x-cloak class="relative w-full">
                        <!-- Dropdown Button -->
                        <button type="button" @click="openBrand = !openBrand"
                            class="mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none"
                            :class="{
                                'border-green-600 border-2 focus:ring-green-600 focus:border-green-600': showCheck(selectedBrandName),
                                'border-gray-300 focus:ring-blue-600 focus:border-blue-600': !showCheck(selectedBrandName)
                            }">
                            <span x-text="selectedBrandName || 'SELECT BRAND'" class="block truncate uppercase"></span>
                            <svg class="absolute right-3 mt-1 top-3 w-4 h-4 text-gray-500 pointer-events-none"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown Options -->
                        <ul x-show="openBrand" @click.outside="openBrand = false" x-transition
                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                            <li @click="
                                    selectedBrandName = '';
                                    selectedBrandId = '';
                                    $refs.brandInput.value = '';
                                    $refs.brandInput.dispatchEvent(new Event('input'));
                                    openBrand = false
                                " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                SELECT BRAND
                            </li>

                            @foreach ($brands as $brand)
                            <li @click="
                                    selectedBrandName = '{{ strtoupper(addslashes($brand->brand_name)) }}';
                                    selectedBrandId = '{{ $brand->brand_id }}';
                                    $refs.brandInput.value = selectedBrandId;
                                    $refs.brandInput.dispatchEvent(new Event('input'));
                                    openBrand = false
                                " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                {{ strtoupper($brand->brand_name) }}
                            </li>
                            @endforeach
                        </ul>

                        <!-- Hidden Inputs for Livewire -->
                        <input type="hidden" x-ref="brandInput" name="brand_id" wire:model.defer="brand_id"
                            :value="selectedBrandId">


                        <!-- Validation Error -->
                        @error('brand_id')
                        <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Text Input for Other Categories -->
                    <div x-show="!showBrandDropdown()" x-cloak class="relative w-full">
                        <input type="text" name="brand_name_custom" x-model="brandName"
                            wire:model.defer="brand_name_custom" placeholder="BRAND NAME" autocomplete="off"
                            class="uppercase mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm focus:outline-none"
                            :class="{
                                'border-green-600 border-2 focus:ring-green-600 focus:border-green-600': showCheck(brandName),
                                'border-gray-300 focus:ring-blue-600 focus:border-blue-600': !showCheck(brandName)
                            }">


                        <!-- Validation Error -->
                        @error('brand_name_custom')
                        <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- MODEL FIELD -->
                <div class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700">
                        Model <span class="text-red-600" x-show="!showCheck(modelName)" x-transition>*</span>
                    </label>

                    <input type="text" name="model_name" x-model="modelName" wire:model.defer="model_name"
                        placeholder="MODEL" autocomplete="off"
                        class="uppercase mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm focus:outline-none"
                        :class="{
                            'border-green-600 border-2 focus:ring-green-600 focus:border-green-600': showCheck(modelName),
                            'border-gray-300 focus:ring-blue-600 focus:border-blue-600': !showCheck(modelName)
                        }">

                    <!-- Validation Error -->
                    @error('model_name')
                    <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- TECHNICAL SPECS -->
                <div x-show="showBrandDropdown()" x-transition class="md:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-3">

                        <!-- DEVICE SERIAL NUMBER -->
                        <div class="relative w-full">
                            <label class="block text-sm font-medium text-gray-700">
                                Device Serial Number
                            </label>
                            <input type="text" name="device_serial_number" x-model="deviceSerial"
                                wire:model.defer="device_serial_number" placeholder="SERIAL NUMBER" autocomplete="off"
                                class="uppercase mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm focus:outline-none"
                                :class="{
                                    'border-green-600 border-2 focus:ring-green-600 focus:border-green-600': showCheck(deviceSerial),
                                    'border-gray-300 focus:ring-blue-600 focus:border-blue-600': !showCheck(deviceSerial)
                                }">

                            @error('device_serial_number')
                            <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- CHARGER SERIAL NUMBER -->
                        <div class="relative w-full">
                            <label class="block text-sm font-medium text-gray-700">
                                Charger Serial Number
                            </label>
                            <input type="text" name="charger_serial_number" x-model="chargerSerial"
                                wire:model.defer="charger_serial_number" placeholder="SERIAL NUMBER" autocomplete="off"
                                class="uppercase mt-1 w-full bg-white border rounded-md shadow-sm px-4 py-2 text-left text-sm focus:outline-none"
                                :class="{
                                    'border-green-600 border-2 focus:ring-green-600 focus:border-green-600': showCheck(chargerSerial),
                                    'border-gray-300 focus:ring-blue-600 focus:border-blue-600': !showCheck(chargerSerial)
                                }">

                            @error('charger_serial_number')
                            <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            <!-- Assignment -->
            <div x-data="{
                    // Dropdown State
                    openType: false,
                    openAssignee: false,

                    // Input Bindings (Livewire)
                    type: '',
                    selectedAssigneeId:'',
                    selectedAssigneeLabel: '',
                    dateAssigned: @entangle('date_accountable').defer,


                    // Visual State
                    selectedType: '',
                    today: new Date().toISOString().split('T')[0],
                    showTypeWarning: false,

                    // Utility Functions
                    showCheck(field) {
                        return field && field.trim().length > 0;
                    },

                    handleAssigneeClick() {
                        if (!this.type) {
                            this.showTypeWarning = true;
                            setTimeout(() => this.showTypeWarning = false, 3000);
                            return;
                        }
                        this.openAssignee = !this.openAssignee;
                    }
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

                    <!-- ASSET TYPE DROPDOWN -->
                    <div class="relative w-full">
                        <!-- Label and Tooltip -->
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-medium text-gray-700">
                                Asset Type
                                <span class="text-red-600" x-show="!type" x-transition>*</span>
                            </label>

                            <!-- Tooltip -->
                            <div class="relative group flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-5 hover:bg-orange-400 hover:text-white rounded-full text-orange-500 cursor-pointer transition">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021
                                    M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                </svg>
                                <div
                                    class="absolute left-full top-1/2 -translate-y-1/2 ml-2 w-64 z-10 p-3 border-l-4 border-orange-400 bg-orange-50 rounded-md shadow text-xs text-justify text-orange-800 opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity duration-300">
                                    <p>
                                        Select <strong>Asset Type</strong>. Assign <strong>Common Assets</strong> to
                                        Departments,
                                        and <strong>Non-Common Assets</strong> to Employees.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Dropdown Toggle -->
                        <button type="button" @click="openType = !openType" :class="[
                                    'mt-1 w-full bg-white rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none relative',
                                    type 
                                        ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600' 
                                        : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                                ]">
                            <span x-text="selectedType || 'SELECT TYPE'" class="block truncate uppercase"></span>
                            <svg class="absolute right-3 top-[10px] w-4 h-4 text-gray-500 pointer-events-none"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Validation Error -->
                        @error('asset_type')
                        <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                        @enderror

                        <!-- Dropdown Options -->
                        <ul x-show="openType" @click.outside="openType = false" x-transition
                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                            <li @click="
                                    selectedType = '';
                                    type = '';
                                    selectedAssigneeLabel = '';
                                    selectedAssigneeId = '';
                                    $refs.typeInput.value = '';
                                    $refs.typeInput.dispatchEvent(new Event('input'));

                                    openType = false;
                                " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                SELECT TYPE
                            </li>
                            <li @click="
                                    selectedType = 'COMMON ASSET';
                                    type = '1';
                                    selectedAssigneeLabel = 'SELECT DEPARTMENT';
                                    selectedAssigneeId = '';
                                    $refs.typeInput.value = type;
                                    $refs.typeInput.dispatchEvent(new Event('input'));

                                    openType = false;
                                " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                COMMON ASSET
                            </li>
                            <li @click="
                                    selectedType = 'NON-COMMON ASSET';
                                    type = '2';
                                    selectedAssigneeLabel = 'SELECT EMPLOYEE';
                                    selectedAssigneeId = '';
                                    $refs.typeInput.value = type;
                                    $refs.typeInput.dispatchEvent(new Event('input'));
                                    openType = false;
                                " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                NON-COMMON ASSET
                            </li>
                        </ul>

                        <input type="hidden" x-ref="typeInput" name="asset_type" :value="type"
                            wire:model.defer="asset_type">


                    </div>


                    <!-- ASSIGNED TO DROPDOWN -->
                    <div class="relative w-full">
                        <!-- Label with dynamic text and required asterisk -->
                        <label class="block text-sm font-medium text-gray-700"
                            x-html="type === '1' 
                            ? ('Department Assigned' + (selectedAssigneeId === '' ? ' <span class=\'text-red-600\'>*</span>' : '')) 
                            : ('Employee Assigned' + (selectedAssigneeId === '' ? ' <span class=\'text-red-600\'>*</span>' : ''))">
                        </label>

                        <!-- Dropdown Toggle -->
                        <button type="button" @click="handleAssigneeClick" :class="[
                                'mt-1 w-full bg-white rounded-md shadow-sm px-4 py-2 text-left text-sm cursor-pointer focus:outline-none relative',
                                selectedAssigneeId 
                                    ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600'
                                    : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'
                            ]">
                            <span
                                x-text="selectedAssigneeLabel || 'SELECT ' + (type === '1' ? 'DEPARTMENT' : 'EMPLOYEE')"
                                class="block truncate uppercase"></span>
                            <svg class="absolute right-3 top-[10px] w-4 h-4 text-gray-500 pointer-events-none"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Type Warning -->
                        <div x-show="showTypeWarning" x-transition class="mt-1 text-xs italic text-orange-600 ">
                            Select asset type first.
                        </div>

                        <!-- Department Options -->
                        <ul x-show="openAssignee && type === '1'" @click.outside="openAssignee = false" x-transition
                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                            <!-- Clear -->
                            <li @click="
                                    openAssignee = false;
                                    selectedAssigneeLabel = 'SELECT DEPARTMENT';
                                    selectedAssigneeId = '';
                                    $refs.departmentInput.value = '';
                                    $refs.departmentInput.dispatchEvent(new Event('input'));
                                    $refs.assignedToNameInput.value = selectedAssigneeLabel;
                                    $refs.assignedToNameInput.dispatchEvent(new Event('input'));
                                
                                " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                SELECT DEPARTMENT
                            </li>

                            <!-- Department List -->
                            @foreach ($departments as $department)
                            <li @click="
                                    openAssignee = false;
                                    selectedAssigneeLabel = '{{ strtoupper(addslashes($department->department_name)) }}';
                                    selectedAssigneeId = '{{ $department->department_id }}';
                                    $refs.departmentInput.value = selectedAssigneeId;
                                    $refs.departmentInput.dispatchEvent(new Event('input'));
                                    $refs.assignedToNameInput.value = selectedAssigneeLabel;
                                    $refs.assignedToNameInput.dispatchEvent(new Event('input'));
                                " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                {{ strtoupper($department->department_name) }}
                            </li>
                            @endforeach
                        </ul>

                        <!-- Employee Options -->
                        <ul x-show="openAssignee && type === '2'" @click.outside="openAssignee = false" x-transition
                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl py-1 text-sm text-gray-800 ring-1 ring-black ring-opacity-5 overflow-auto">
                            <!-- Clear -->
                            <li @click="
                                    openAssignee = false;
                                    selectedAssigneeLabel = 'SELECT EMPLOYEE';
                                    selectedAssigneeId = '';
                                    $refs.employeeInput.value = '';
                                    $refs.employeeInput.dispatchEvent(new Event('input'));
                                    $refs.assignedToNameInput.value = selectedAssigneeLabel;
                                    $refs.assignedToNameInput.dispatchEvent(new Event('input'));
                                    
                                " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                SELECT EMPLOYEE
                            </li>

                            <!-- Employee List -->
                            @foreach ($employees as $employee)
                            <li @click="
                                    openAssignee = false;
                                    selectedAssigneeLabel = '{{ strtoupper(addslashes($employee->employee_lastname)) }}, {{ strtoupper(addslashes($employee->employee_firstname)) }}';
                                    selectedAssigneeId = '{{ $employee->employee_id }}';
                                    $refs.employeeInput.value = selectedAssigneeId;
                                    $refs.employeeInput.dispatchEvent(new Event('input'));
                                    $refs.assignedToNameInput.value = selectedAssigneeLabel;
                                    $refs.assignedToNameInput.dispatchEvent(new Event('input'));
                                " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                {{ strtoupper($employee->employee_lastname) }},
                                {{ strtoupper($employee->employee_firstname) }}
                            </li>
                            @endforeach
                        </ul>

                        <input type="hidden" x-ref="departmentInput" name="department_id" :value="selectedAssigneeId"
                            wire:model.defer="department_id" x-show="type == 1">
                        <input type="hidden" x-ref="employeeInput" name="employee_id" :value="selectedAssigneeId"
                            wire:model.defer="employee_id" x-show="type == 2">



                        <!-- Validation Error -->
                        @error('department_id')
                        <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                        @enderror
                        @error('employee_id')
                        <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- DATE ASSIGNED -->
                    <div class="relative w-full">
                        <!-- Label -->
                        <label class="block text-sm font-medium text-gray-700">
                            Date Assigned
                            <span class="text-red-600" x-show="!dateAssigned" x-transition>*</span>
                        </label>

                        <!-- Date Picker -->
                        <input type="date" x-model="dateAssigned" @input="$wire.set('date_accountable', dateAssigned)"
                            :max="today"
                            class="mt-1 block w-full rounded-md shadow-sm text-sm uppercase focus:outline-none" :class="[
                                dateAssigned 
                                    ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600'
                                    : 'border border-gray-300 focus:ring-blue-600 focus:border-blue-600'
                            ]" />

                        <!-- Validation Error -->
                        @error('date_accountable')
                        <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                        @enderror
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

                <div x-data="{
                        purchaseDate: '',
                        expirationDate: '',
                        warrantyYears: '',
                        replacementValue: '',
                        replacementUnit: '',
                        freeReplacementDate: '',
                        openUnit: false,
                        today: new Date().toISOString().split('T')[0],

                        computeExpiration() {
                            if (this.purchaseDate && this.warrantyYears !== '') {
                                let purchase = new Date(this.purchaseDate);
                                purchase.setFullYear(purchase.getFullYear() + parseInt(this.warrantyYears));
                                this.expirationDate = purchase.toISOString().split('T')[0];
                                $wire.set('warranty_exp_date', this.expirationDate);
                            }
                        },

                        computeYears() {
                            if (this.purchaseDate && this.expirationDate) {
                                const start = new Date(this.purchaseDate);
                                const end = new Date(this.expirationDate);
                                const diff = end.getFullYear() - start.getFullYear();
                                this.warrantyYears = diff;
                            }
                        },
                        clearUnitIfEmpty() {
                            if (!this.replacementValue) {
                                this.replacementUnit = '';
                                $wire.set('free_replacement_unit', '');
                            }
                        },

                        computeFreeReplacementDate() {
                            if (this.purchaseDate && this.replacementValue && this.replacementUnit) {
                                let baseDate = new Date(this.purchaseDate);
                                switch (this.replacementUnit) {
                                    case 'DAYS':
                                        baseDate.setDate(baseDate.getDate() + parseInt(this.replacementValue));
                                        break;
                                    case 'WEEKS':
                                        baseDate.setDate(baseDate.getDate() + parseInt(this.replacementValue) * 7);
                                        break;
                                }
                                this.freeReplacementDate = baseDate.toISOString().split('T')[0];
                                $wire.set('free_replacement_date', this.freeReplacementDate);
                                
                            }
                        }
                    }" x-init="
                        $watch('warrantyYears', value => computeExpiration());
                        $watch('expirationDate', value => computeYears());
                        $watch('purchaseDate', () => {
                            if (warrantyYears !== '') computeExpiration();
                            else if (expirationDate) computeYears();
                            computeFreeReplacementDate(); // ✅ Recompute
                        });
                        $watch('replacementValue', () => computeFreeReplacementDate());
                        $watch('replacementUnit', () => computeFreeReplacementDate());
                    " class="grid grid-cols-1 md:grid-cols-5 gap-6">


                    <!-- Warranty Fields (spans 3/5 = 60%) -->
                    <div class="col-span-5 md:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Purchase Date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Purchase Date <span class="text-red-600" x-show="!purchaseDate" x-transition>*</span>
                            </label>

                            <!-- Visible Date Picker -->
                            <input type="date" x-model="purchaseDate" @input="$wire.set('purchase_date', purchaseDate)"
                                :max="today"
                                class="mt-1 block w-full rounded-md shadow-sm text-sm uppercase focus:outline-none"
                                :class="purchaseDate 
                                ? 'border-green-600 border-2 focus:ring-green-600 focus:border-green-600'
                                : 'border border-gray-300 focus:ring-blue-600 focus:border-blue-600'" />

                            @error('purchase_date')
                            <p class="mt-1 text-xs italic text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- FREE REPLACEMENT PERIOD -->
                        <div x-effect="clearUnitIfEmpty()" class="relative w-full">
                            <label class="block text-sm font-medium text-gray-700">
                                Free Replacement Period
                            </label>

                            <div class="flex gap-2 mt-1 items-start">
                                <!-- VALUE -->
                                <input type="number" x-model="replacementValue" @input="
                                        $wire.set('free_replacement_value', replacementValue);
                                        
                                    " min="0"
                                    class="uppercase w-5/12 rounded-md shadow-sm text-sm px-2 py-2 bg-white focus:outline-none"
                                    :class="replacementValue 
                                    ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600' 
                                    : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'"
                                    placeholder="E.G., 30">

                                <!-- UNIT -->
                                <div class="relative w-7/12">
                                    <button type="button" @click="openUnit = !openUnit"
                                        class="w-full rounded-md shadow-sm text-sm px-3 py-2 text-left bg-white uppercase focus:outline-none"
                                        :class="replacementUnit 
                                        ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600' 
                                        : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'">
                                        <span x-text="replacementUnit || 'SELECT'" class="block truncate"></span>
                                        <svg class="absolute right-2 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-500 pointer-events-none"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>

                                    <ul x-show="openUnit" @click.outside="openUnit = false" x-transition
                                        class="absolute z-10 mt-1 w-full bg-white shadow-lg rounded-xl py-1 text-sm ring-1 ring-black ring-opacity-5 overflow-auto text-gray-800">
                                        <li @click="
                                            openUnit = false
                                            replacementUnit = 'DAYS';
                                            $wire.set('free_replacement_unit', replacementUnit);
                                            " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                            DAYS
                                        </li>
                                        <li @click="
                                            openUnit = false
                                            replacementUnit = 'WEEKS';
                                            $wire.set('free_replacement_unit', replacementUnit);
                                            " class="cursor-pointer select-none px-4 py-2 hover:bg-blue-200 uppercase">
                                            WEEKS
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- HIDDEN INPUTS -->
                            <input type="hidden" name="free_replacement_value" :value="replacementValue">
                            <input type="hidden" name="free_replacement_unit" :value="replacementUnit">
                            <input type="hidden" name="free_replacement_date" :value="freeReplacementDate">
                        </div>

                        <!-- Warranty Expiration Date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Warranty Expiration Date
                            </label>
                            <input type="date" x-model="expirationDate"
                                @input="$wire.set('warranty_exp_date', expirationDate)"
                                class="uppercase mt-1 block w-full rounded-md shadow-sm text-sm" :class="expirationDate 
                                ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600' 
                                : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'">
                        </div>

                        <!-- Warranty Duration -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Warranty Duration (Years)
                            </label>
                            <input type="number" min="0" placeholder="E.G., 2" x-model="warrantyYears"
                                @input="$wire.set('warranty_years', warrantyYears)"
                                class="uppercase mt-1 block w-full rounded-md shadow-sm text-sm" :class="warrantyYears 
                                    ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600' 
                                    : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'">
                        </div>
                    </div>

                    <!-- Description (spans 2/5 = 40%) -->
                    <div class="col-span-5 md:col-span-2 flex flex-col" x-data="{ description: '' }">
                        <label class="block text-sm font-medium text-gray-700">
                            Description
                        </label>
                        <textarea x-model="description" @input="$wire.set('description', description)"
                            placeholder="DESCRIPTION"
                            class="uppercase mt-1 block flex-grow resize-none w-full rounded-md shadow-sm text-sm"
                            :class="description 
                                ? 'border-2 border-green-600 focus:ring-2 focus:ring-green-600 focus:border-green-600'
                                : 'border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-blue-600'"></textarea>
                    </div>
                </div>
            </div>

            <!-- Add to List Button -->
            <div class="flex justify-end mt-6">
                <button type="submit" wire:loading.attr="disabled" wire:target="addAsset" {{-- Optional: target specific
                    method --}}
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-lg text-sm font-medium text-white bg-[#F59E0B]/80 hover:bg-[#F59E0B] transition disabled:opacity-50 disabled:cursor-wait">
                    <!-- Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 16h6" />
                        <path d="M19 13v6" />
                        <path
                            d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
                        <path d="m7.5 4.27 9 5.15" />
                        <polyline points="3.29 7 12 12 20.71 7" />
                        <line x1="12" y1="22" x2="12" y2="12" />
                    </svg>
                    Add Asset
                </button>

            </div>

        </div>
    </div>
</form>