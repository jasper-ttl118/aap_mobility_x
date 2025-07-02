<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'asset' => new stdClass()]"
    navbar_selected='Asset Management'>

    <div class="flex flex-1 flex-col lg:ml-52 mt-12 overflow-y-auto p-10 gap-7 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg">
            <div class="flex flex-col lg:flex-row border-b border-gray-200 relative">

                <!-- Dashboard -->
                <div class="relative group w-full lg:w-32 p-4 text-center border-b-2 lg:border-b-2 border-blue-900 cursor-pointer">
                    <a href="/ams" class="block font-semibold text-blue-900">Dashboard</a>
                </div>

                <!-- CMS with Dropdown -->
                <div class="relative group w-full lg:w-32 p-4 text-center border-b lg:border-b-0 cursor-pointer">
                    <a href="/ams/cms/branch-department" class="flex flex-row justify-center items-center gap-x-2 text-gray-600 hover:text-blue-800 font-inter">
                        CMS
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                        </svg>
                    </a>

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
                    class="relative group w-full lg:w-32 p-4 text-center border-b lg:border-b-0 cursor-pointer">
                    <a href="/ams/all-assets" class="flex flex-row justify-center items-center gap-x-2 text-gray-600 hover:text-blue-800 font-inter">
                        Assets
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                        </svg>
                    </a>

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

        <!-- Header Section -->
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-col justify-between">

                <!-- Breadcrumbs -->
                <div class="flex flex-wrap items-center gap-x-1 text-blue-900 text-sm px-7 pt-5">
                    <a href="/ams" class="hover:underline">Dashboard</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>

                <!-- Header Title and Button -->
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between px-7 py-6 gap-y-4">
                    <div>
                        <h2 class="font-semibold text-lg text-[#071d49]">Dashboard</h2>
                    </div>

                    <div class="flex items-center gap-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>