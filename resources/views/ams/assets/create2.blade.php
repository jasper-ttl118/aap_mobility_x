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
            <div 
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

                {{-- Form --}}
                <livewire:ams.asset.add-asset-form>
                <livewire:ams.asset.confirm>
                <livewire:ams.asset.clear>     
            </div>
            <!-- Right Side Sticky Card -->
            <livewire:ams.asset.add-asset-summary>
            
            
                @if(session('validatedAsset'))
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                            const checkLivewireReady = () => {
                                if (window.Livewire && typeof window.Livewire.dispatch === 'function') {
                                    const payload = @json(session('validatedAsset'));
                                    console.log('Dispatching asset to Livewire:', payload);

                                    $dispatch('add-asset-to-queue', {payload});
                                } else {
                                    console.warn('Livewire not ready, retrying...');
                                    setTimeout(checkLivewireReady, 100); // Retry until Livewire is available
                                }
                            };
                            checkLivewireReady();
                        });
                </script>
                @endif
        </div>
    </div>
</x-app-layout>