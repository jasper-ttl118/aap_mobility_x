<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'asset' => new stdClass()]"
    navbar_selected='Asset Management'>

    <div class="flex flex-1 flex-col lg:ml-52 mt-12 overflow-y-auto p-10 gap-7 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg">
            <div class="flex h-14 border-b border-gray-200">
                <div class="flex-none w-auto p-4 text-center">
                    <a href="#" class="text-gray-600 hover:text-blue-800 font-inter">Dashboard</a>
                </div>
                <div class="flex-none w-auto p-4 text-center">
                    <a href="#" class="text-gray-600 hover:text-blue-800 font-inter">CMS</a>
                </div>
                <div class="w-32 border-b-2 border-blue-900 p-4 text-center">
                    <a href="#" class="font-semibold text-blue-900 ">Assets</a>
                </div>
                <div class="flex-none w-auto p-4 text-center">
                    <a href="#" class="text-gray-600 hover:text-blue-800 font-inter">Scan QR</a>
                </div>
            </div>
        </div>
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-col justify-between">
                {{-- Breadcrumbs --}}
                <div class="flex items-center gap-x-1 text-blue-900 text-sm px-7 pt-5">
                    <a href="/employee" class="hover:underline">Asset Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="hover:underline font-semibold">Assets</a>
                </div>

                <div class="flex items-center justify-between px-7 py-6">
                    <div>
                        <h2 class="font-semibold text-lg text-[#071d49]">Manage AAP Assets </h2>
                        <p class="text-gray-900 text-sm">Add, Edit, Transfer, See History and Delete Assets</p>
                    </div>

                    {{-- Add New Button --}}
                    <div class="flex items-center gap-4">
                        <button 
                            class="flex items-center gap-2 rounded-md bg-blue-900 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <a href="ams/assets/create">
                            Add New Asset</a>
                        </button>
                    </div>
                </div>
            </div>
            <livewire:ams.asset.asset-list />
        </div>
    </div>
</x-app-layout>