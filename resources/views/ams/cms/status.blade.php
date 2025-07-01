<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'branch' => new stdClass()]"
    navbar_selected='Asset Management'>
    {{-- @include('layouts.navbar') --}}

    <div class="flex flex-1 flex-col lg:ml-52 mt-12 overflow-y-auto p-10 gap-7 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg">
            <div class="flex flex-col lg:flex-row border-b border-gray-200 relative">

                <!-- Dashboard -->
                <div class="w-full lg:w-32 p-4 text-center border-b lg:border-b-0">
                    <a href="/ams" class="block text-gray-600 hover:text-blue-800 font-inter">Dashboard</a>
                </div>

                <!-- CMS with Dropdown -->
                <div
                    class="relative group w-full lg:w-32 p-4 text-center border-b-2 lg:border-b-2 border-blue-900 cursor-pointer">
                    <a href="/ams/cms/branch-department" class="block font-semibold text-blue-900">CMS</a>

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
                <div class="relative group w-full lg:w-32 p-4 text-center border-b lg:border-b-0 cursor-pointer">
                    <a href="/ams/all-assets" class="block text-gray-600 hover:text-blue-800 font-inter">Assets</a>

                    <div
                        class="absolute top-full left-0 mt-1 w-32 rounded-md border border-gray-200 bg-white shadow-lg z-10 opacity-0 group-hover:opacity-100 group-hover:visible invisible transition-opacity duration-200">
                        <a href="/ams"
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

        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-col justify-between">

                <!-- Breadcrumbs -->
                <div class="flex flex-wrap items-center gap-x-1 text-blue-900 text-sm px-7 pt-5">
                    <a href="/ams" class="hover:underline">Asset Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="/ams/cms/asset-status" class="hover:underline">CMS</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a x-transition href="/ams/cms/asset-categories" class="hover:underline font-semibold">Asset Status</a>
                </div>
            </div>

            <div class="flex items-center justify-between px-7 py-6 pt-2">
                <div>
                    <h2 class="font-semibold text-lg text-blue-900">
                        Manage Asset Status
                    </h2>
                    <p class="text-gray-900 text-sm">
                        Add and Edit Asset Status
                    </p>
                </div>

                <div class="flex items-center gap-4">
                    <a href="create-status"
                            class="flex items-center gap-2 rounded-md bg-blue-900 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add New Status
                        </a>
                </div>
            </div>
            <livewire:ams.cms.status-list />
        </div>
    </div>
</x-app-layout>