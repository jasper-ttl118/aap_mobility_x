<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'asset' => new stdClass()]"
    navbar_selected='Asset Management'>


    {{-- bg --}}
    <div class="flex flex-1 flex-col lg:ml-52 overflow-y-auto py-10 px-5 lg:py-10 lg:pl-5 lg:pr-2 gap-7 mt-12 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class="bg-white border-2 border-gray-100 rounded-md shadow-lg -mt-7 ">
            <div class="relative flex border-b border-gray-200 h-14" x-data="{ openCMS: false, openAssets: false }">

                <x-ams.submodules selected="Assets" />
            </div>
        </div>

        {{-- Content --}}
        <div class="flex flex-col lg:flex-row">
            <div 
                class="@container/main rounded-xl border-2 border-gray-100 bg-white justify-center items-center flex w-full lg:w-8/12 flex-col shadow-xl -mt-4">
                <div class="flex flex-col justify-between w-full mt-3">
                    {{-- Breadcrumbs --}}
                    <div class="flex flex-wrap items-center px-2 pt-3 text-sm text-blue-900 gap-x-1 lg:p-5">
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
                        <a href="#" class="font-semibold hover:underline">Add Asset</a>
                    </div>
                </div>

                {{-- Form --}}
                <livewire:ams.asset.add-asset-form>
                <livewire:ams.asset.confirm>
                <livewire:ams.asset.clear> 
                <livewire:ams.asset.success> 
                <livewire:ams.asset.duplicate-error>   
            </div>
            <!-- Right Side Sticky Card -->
            <livewire:ams.asset.add-asset-summary>
        </div>
    </div>
</x-app-layout>