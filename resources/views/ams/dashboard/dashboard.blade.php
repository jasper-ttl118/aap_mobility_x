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

        <!-- Breadcrumbs -->
        <div class="flex flex-wrap items-center gap-x-1 text-blue-900 text-sm px-7 -mt-3">
            <a href="/ams" class="hover:underline">Dashboard</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
        </div>  

        <!-- Header Section -->
        <div class="flex rounded-md border-2 border-gray-100 bg-[#3d71da] shadow-lg -mt-4 h-auto w-full p-5">
            <div class="flex flex-col justify-between w-full gap-y-3">
                {{-- Header --}}
                <div class="bg-white flex flex-col h-[150px] w-full items-center justify-center rounded-xl gap-y-2">
                    <div class="flex flex-row w-full items-end justify-start px-5">
                        <label for="Title" class="text-4xl uppercase tracking-wide font-bold text-[#3d71da]">Asset Management System</label>
                    </div>
                    <div class="flex flex-row w-full justify-between px-5">
                        <div class="h-full flex flex-col justify-center">
                            <label for="text" class="text-[#071d49] text-sm">Welcome back to Asset Dashboard</label>
                            <label for="text" class="text-[#071d49] text-sm">Last updated: July 03, 2025 10:43 AM</label>
                        </div>
                        <div class="h-full flex flex-row items-center justify-center gap-x-2">
                            <img src="aaplogo1.png" alt="profilePhoto" class="size-12 rounded-full border-gray-200 border">
                            <div class="flex flex-col items-start justify-center gap-x-1">
                                <label for="name" class="text-[#071d49] text-base font-bold">John Doe</label>
                                <label for="name" class="text-[#071d49] text-sm font-light">Admin</label>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Tally 1st row --}}
                <div class="flex flex-row h-[150px] w-full items-center justify-center rounded-xl gap-x-4">
                    <div class="flex flex-col items-center justify-center bg-white rounded-xl h-full w-[25%] gap-y-2">
                        <label for="totalAssets" class="text-green-500 uppercase font-bold text-6xl">1500</label>
                        <label for="totalAssets" class="text-[#071d49] uppercase font-bold">Total Assets</label>
                    </div>
                    <div class="flex flex-col items-center justify-center bg-white rounded-xl h-full w-[25%] gap-y-2">
                        <label for="totalAssets" class="text-red-500 uppercase font-bold text-6xl">5</label>
                        <div class="flex flex-col items-center justify-center">
                            <label for="totalAssets" class="text-[#071d49] uppercase font-bold">Borrowed</label>
                            <label for="totalAssets" class="text-[#071d49] uppercase text-xs">(Daily)</label>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center bg-white rounded-xl h-full w-[25%] gap-y-2">
                        <label for="totalAssets" class="text-yellow-500 uppercase font-bold text-6xl">27</label>
                        <div class="flex flex-col items-center justify-center">
                            <label for="totalAssets" class="text-[#071d49] uppercase font-bold">Borrowed </label>
                            <label for="totalAssets" class="text-[#071d49] uppercase text-xs">(Weekly) </label>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center bg-white rounded-xl h-full w-[25%] gap-y-2">
                        <label for="totalAssets" class="text-blue-500 uppercase font-bold text-6xl">419</label>
                        <div class="flex flex-col items-center justify-center">
                            <label for="totalAssets" class="text-[#071d49] uppercase font-bold">Borrowed </label>
                            <label for="totalAssets" class="text-[#071d49] uppercase text-xs">(Monthly) </label>
                        </div>
                    </div>
                </div>
                {{-- Tally 2nd row --}}
                <div class="flex flex-row h-[150px] w-full items-center justify-center rounded-xl gap-x-4">
                    <div class="flex flex-col items-center justify-center bg-white rounded-xl h-full w-[25%] gap-y-2">
                        <label for="totalAssets" class="text-purple-500 uppercase font-bold text-6xl">273</label>
                        <label for="totalAssets" class="text-[#071d49] uppercase font-bold">Assets Overdue</label>
                    </div>
                    <div class="flex flex-col items-center justify-center bg-white rounded-xl h-full w-[25%] gap-y-2">
                        <label for="totalAssets" class="text-orange-500 uppercase font-bold text-6xl">661</label>
                        <div class="flex flex-col items-center justify-center">
                            <label for="totalAssets" class="text-[#071d49] uppercase font-bold">Deployed Assets</label>
                            <label for="totalAssets" class="text-[#071d49] uppercase text-xs">(Monthly)</label>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center bg-white rounded-xl h-full w-[25%] gap-y-2">
                        <label for="totalAssets" class="text-gray-500 uppercase font-bold text-6xl">133</label>
                        <div class="flex flex-col items-center justify-center">
                            <label for="totalAssets" class="text-[#071d49] uppercase font-bold">Pull-Out assets </label>
                            <label for="totalAssets" class="text-[#071d49] uppercase text-xs">(Monthly) </label>
                        </div>
                    </div>
                </div>
                {{-- Distribution and Status--}}
                <div class="flex flex-row h-[400px] w-full items-center justify-center rounded-xl gap-x-4">
                    <div class="flex flex-col w-[50%] items-center justify-center bg-white h-full rounded-xl">
                        <label for="contribution" class="text-[#071d49] uppercase font-bold text-xl">Assets Contribution by Category</label>
                        <div class="flex flex-row w-[90%] h-[75%] justify-center items-center">
                            <x-analytics-display
                                title="Contributions"
                                :labels="['IT', 'Vehicles', 'Machinery', 'Office Supply', 'Furniture']"
                                :data="[200, 100, 50, 90, 20]"
                                chartType="pie"
                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col w-[50%] items-center justify-center bg-white h-full rounded-xl"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>