<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'asset' => new stdClass()]"
    navbar_selected='Asset Management'>

    <div class="flex flex-1 flex-col lg:ml-52 mt-12 overflow-y-auto py-10 px-5 lg:p-10 gap-7 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-7 overflow-visible hide-scrollbar w-full flex-shrink-0">
            <div class="flex min-w-[350px] lg:min-w-0" x-data="{ openCMS: false, openAssets: false }">

                <!-- Dashboard -->
                <div class="relative group  lg:mx-0 w-auto py-4 px-2 lg:p-4 text-center border-b-2 border-blue-900 cursor-pointer">
                    <a href="/ams" class="block text-blue-800 font-semibold hover:text-blue-800 font-inter">Dashboard</a>
                </div>

                <!-- CMS -->
                <div class="relative lg:mx-0 py-4 px-2 lg:p-4 text-center border-b">
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
                        class="absolute left-1/2 -translate-x-1/2 mt-5 w-40 rounded-md border border-gray-200 bg-white shadow-lg z-50 min-w-fit text-left">
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
                <div class="relative w-auto py-4 px-2 lg:p-4 lg:mx-0 text-center border-b">
                    <button @click="openAssets = !openAssets; openCMS = false"
                        class="flex justify-center items-center gap-x-1 w-full font-inter transition-colors duration-150"
                        :class="openAssets ? 'text-blue-800 font-semibold' : 'text-gray-600 hover:text-blue-800'">
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
                <div
                    class="relative group  lg:mx-0  w-auto py-4 px-2 lg:p-4 text-center border-b cursor-pointer">
                    <a href="/ams/scan-qr" class="block  text-gray-600">Scan QR</a>
                </div>
            </div>
        </div>

        <!-- Breadcrumbs -->
        <div class="flex flex-wrap items-center gap-x-1 text-blue-900 text-sm px-7 -mt-3">
            <a href="/ams" class="hover:underline">Asset Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="/ams" class="hover:underline font-semibold">Dashboard</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
        </div>  

        <!-- Header Section -->
        <div class="flex rounded-md border-2 border-gray-100 bg-gray-50 shadow-lg -mt-4 h-auto w-full px-2 py-2">
            <div class="flex flex-col justify-between w-full gap-y-3">
                
                {{-- First Row --}}
                <div class="flex flex-col w-full justify-center items-center gap-x-4 gap-y-4">
                    {{-- Tally 1st row --}}
                    <div class="flex flex-col lg:flex-row h-auto w-full items-center justify-between rounded-xl gap-x-4 gap-y-4">
                        <div class="flex flex-col items-center justify-center border-2 border-green-500 bg-white rounded-xl h-[120px] w-full gap-y-2 shadow-md">
                            <label for="totalAssets" class="text-green-500 uppercase font-bold text-2xl">1500</label>
                            <label for="totalAssets" class="text-[#071d49] uppercase font-bold text-xs">Total Assets</label>
                        </div>
                        <div class="flex flex-col items-center justify-center border-2 border-red-500 bg-white rounded-xl h-[120px] w-full gap-y-2 shadow-md">
                            <label for="totalAssets" class="text-red-500 uppercase font-bold text-2xl">5</label>
                            <div class="flex flex-col items-center justify-center">
                                <label for="totalAssets" class="text-[#071d49] uppercase font-bold text-xs">Borrowed</label>
                                <label for="totalAssets" class="text-[#071d49] uppercase text-[10px]">(Daily)</label>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center border-2 border-yellow-500 bg-white rounded-xl h-[120px] w-full gap-y-2 shadow-md">
                            <label for="totalAssets" class="text-yellow-500 uppercase font-bold text-2xl">27</label>
                            <div class="flex flex-col items-center justify-center">
                                <label for="totalAssets" class="text-[#071d49] uppercase font-bold text-xs">Borrowed </label>
                                <label for="totalAssets" class="text-[#071d49] uppercase text-[10px]">(Weekly) </label>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center border-2 border-blue-500 bg-white rounded-xl h-[120px] w-full gap-y-2 shadow-md">
                            <label for="totalAssets" class="text-blue-500 uppercase font-bold text-2xl">419</label>
                            <div class="flex flex-col items-center justify-center">
                                <label for="totalAssets" class="text-[#071d49] uppercase font-bold text-xs">Borrowed </label>
                                <label for="totalAssets" class="text-[#071d49] uppercase text-[10px]">(Monthly) </label>
                            </div>
                        </div>
                        {{-- <div class="flex flex-col items-center justify-center border-2 border-purple-500 bg-white rounded-xl h-[120px] w-full gap-y-2 shadow-md">
                            <label for="totalAssets" class="text-purple-500 uppercase font-bold text-4xl">273</label>
                            <label for="totalAssets" class="text-[#071d49] uppercase font-bold text-sm text-center">Assets Overdue</label>
                        </div> --}}
                        <div class="flex flex-col items-center justify-center border-2 border-orange-500 bg-white rounded-xl h-[120px] w-full gap-y-2 shadow-md">
                            <label for="totalAssets" class="text-orange-500 uppercase font-bold text-2xl">661</label>
                            <div class="flex flex-col items-center justify-center">
                                <label for="totalAssets" class="text-[#071d49] uppercase font-bold text-xs text-center">Deployed Assets</label>
                                <label for="totalAssets" class="text-[#071d49] uppercase text-[10px] text-center">(Monthly)</label>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center border-2 border-gray-500 bg-white rounded-xl h-[120px] w-full gap-y-2 shadow-md">
                            <label for="totalAssets" class="text-gray-500 uppercase font-bold text-2xl">133</label>
                            <div class="flex flex-col items-center justify-center">
                                <label for="totalAssets" class="text-[#071d49] uppercase font-bold text-xs text-center">Pull-Out assets </label>
                                <label for="totalAssets" class="text-[#071d49] uppercase text-[10px] text-center">(Monthly) </label>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Second Row --}}
                <div class="flex flex-col lg:flex-row w-full items-center justify-center gap-x-4 gap-y-4">
                    {{-- Forms for Approval --}}
                    <div class="flex flex-col w-full lg:w-[50%] h-[450px] bg-white shadow-md items-center justify-center rounded-xl px-5 lg:px-0">
                        {{-- Header --}}
                        <div class="flex flex-col lg:flex-row h-[10%] w-[90%] justify-center lg:justify-start items-center px-5 gap-y-0 gap-x-2">
                            <div class="flex flex-row w-auto items-center justify-center gap-x-2">
                                <img src="request.png" alt="assetlogo" class="size-3">
                                <span class="text-md font-extrabold text-[#0035dd] uppercase tracking-widest">Request Form</span>
                            </div>
                            <div class="flex text-xs justify-center items-center lg:justify-start font-light text-gray-400 italic w-auto">(Borrow, Transfer, Pull-Out)</div>
                        </div>
                        {{-- Border Line --}}
                        <span class="border-b-2 border-[#071d49] w-full lg:w-[85%] flex h-[5px]"></span>
                        <div class="flex flex-row h-[10%] w-full lg:w-[90%] justify-between items-center px-5 gap-2">
                            <span class="text-md font-extrabold text-[#0035dd] uppercase tracking-widest">List</span>
                            <div class="flex flex-row items-center justify-end gap-x-1">
                                <label for="searchBar" class="text-gray-400 text-sm">Search:</label>
                                <input type="text" name="searchBar" placeholder="Requestor or item..." class="text-xs rounded-md h-7 w-[60%] border-[#0035dd]">
                            </div>
                        </div>
                        {{-- Request List --}}
                        <div class="flex h-[70%] flex-col overflow-y-auto hide-scrollbar items-center w-[90%] lg:w-[80%]">
                            <table class="h-[20%] w-full items-center justify-start gap-1">
                                {{-- 1 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16">  
                                    <td class="flex items-center ">
                                        <div class="flex flex-col justify-center items-center bg-yellow-500 w-12 h-[80%] rounded-md">
                                            <span class="uppercase text-white text-2xl font-extrabold">B</span>
                                            <span class="uppercase text-white text-[8px] -mt-1">BORROW</span>
                                        </div>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full px-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full uppercase">Laptop (HP 840 G5)</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Requested By: Juan Dela Cruz</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Date Requested: July 3, 2025</span>
                                    </td>
                                    <td class="flex flex-row items-center w-auto gap-x-1">
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-[#071d49] text-white hover:bg-white hover:text-[#071d49] border hover:border-[#071d49] duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-red-500 text-white hover:bg-white hover:text-[#071d49] border hover:border-red-500 duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                                {{-- 2 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16">  
                                    <td class="flex items-center ">
                                        <div class="flex flex-col justify-center items-center bg-black w-12 h-[80%] rounded-md">
                                            <span class="uppercase  text-white text-2xl font-extrabold">T</span>
                                            <span class="uppercase text-white text-[8px] -mt-1">TRANSFER</span>
                                        </div>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full px-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full uppercase">Printer to Branch B</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Requested By: Maria Santos</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Date Requested: July 2, 2025</span>
                                    </td>
                                    <td class="flex flex-row items-center w-auto gap-x-1">
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-[#071d49] text-white hover:bg-white hover:text-[#071d49] border hover:border-[#071d49] duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-red-500 text-white hover:bg-white hover:text-[#071d49] border hover:border-red-500 duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                                {{-- 3 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16">  
                                    <td class="flex items-center ">
                                        <div class="flex flex-col justify-center items-center bg-lime-500 w-12 h-[80%] rounded-md">
                                            <span class="uppercase  text-white text-2xl font-extrabold">P</span>
                                            <span class="uppercase text-white text-[8px] -mt-1">PULL-OUT</span>
                                        </div>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full px-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full uppercase">Projector - Room 301</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Requested By: Admin Office</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Date Requested: July 1, 2025</span>
                                    </td>
                                    <td class="flex flex-row items-center w-auto gap-x-1">
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-[#071d49] text-white hover:bg-white hover:text-[#071d49] border hover:border-[#071d49] duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-red-500 text-white hover:bg-white hover:text-[#071d49] border hover:border-red-500 duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                                {{-- 4 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16">  
                                    <td class="flex items-center ">
                                        <div class="flex flex-col justify-center items-center bg-black w-12 h-[80%] rounded-md">
                                            <span class="uppercase  text-white text-2xl font-extrabold">T</span>
                                            <span class="uppercase text-white text-[8px] -mt-1">TRANSFER</span>
                                        </div>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full px-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full uppercase">Printer to Branch B</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Requested By: Maria Santos</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Date Requested: July 2, 2025</span>
                                    </td>
                                    <td class="flex flex-row items-center w-auto gap-x-1">
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-[#071d49] text-white hover:bg-white hover:text-[#071d49] border hover:border-[#071d49] duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-red-500 text-white hover:bg-white hover:text-[#071d49] border hover:border-red-500 duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                                {{-- 5 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16">  
                                    <td class="flex items-center ">
                                        <div class="flex flex-col justify-center items-center bg-yellow-500 w-12 h-[80%] rounded-md">
                                            <span class="uppercase  text-white text-2xl font-extrabold">B</span>
                                            <span class="uppercase text-white text-[8px] -mt-1">BORROW</span>
                                        </div>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full px-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full uppercase">Laptop (HP 840 G5)</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Requested By: Juan Dela Cruz</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Date Requested: July 3, 2025</span>
                                    </td>
                                    <td class="flex flex-row items-center w-auto gap-x-1">
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-[#071d49] text-white hover:bg-white hover:text-[#071d49] border hover:border-[#071d49] duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-red-500 text-white hover:bg-white hover:text-[#071d49] border hover:border-red-500 duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                                {{-- 6 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16">  
                                    <td class="flex items-center ">
                                        <div class="flex flex-col justify-center items-center bg-lime-500 w-12 h-[80%] rounded-md">
                                            <span class="uppercase  text-white text-2xl font-extrabold">P</span>
                                            <span class="uppercase text-white text-[8px] -mt-1">PULL-OUT</span>
                                        </div>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full px-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full uppercase">Projector - Room 301</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Requested By: Admin Office</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Date Requested: July 1, 2025</span>
                                    </td>
                                    <td class="flex flex-row items-center w-auto gap-x-1">
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-[#071d49] text-white hover:bg-white hover:text-[#071d49] border hover:border-[#071d49] duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-red-500 text-white hover:bg-white hover:text-[#071d49] border hover:border-red-500 duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                                {{-- 7 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16">  
                                    <td class="flex items-center ">
                                        <div class="flex flex-col justify-center items-center bg-lime-500 w-12 h-[80%] rounded-md">
                                            <span class="uppercase  text-white text-2xl font-extrabold">P</span>
                                            <span class="uppercase text-white text-[8px] -mt-1">PULL-OUT</span>
                                        </div>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full px-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full uppercase">Projector - Room 301</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Requested By: Admin Office</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Date Requested: July 1, 2025</span>
                                    </td>
                                    <td class="flex flex-row items-center w-auto gap-x-1">
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-[#071d49] text-white hover:bg-white hover:text-[#071d49] border hover:border-[#071d49] duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-red-500 text-white hover:bg-white hover:text-[#071d49] border hover:border-red-500 duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                                {{-- 8 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16">  
                                    <td class="flex items-center ">
                                        <div class="flex flex-col justify-center items-center bg-lime-500 w-12 h-[80%] rounded-md">
                                            <span class="uppercase  text-white text-2xl font-extrabold">P</span>
                                            <span class="uppercase text-white text-[8px] -mt-1">PULL-OUT</span>
                                        </div>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full px-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full uppercase">Projector - Room 301</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Requested By: Admin Office</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">Date Requested: July 1, 2025</span>
                                    </td>
                                    <td class="flex flex-row items-center w-auto gap-x-1">
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-[#071d49] text-white hover:bg-white hover:text-[#071d49] border hover:border-[#071d49] duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="flex w-auto h-8 text-xs uppercase px-2 rounded-lg items-center justify-center bg-red-500 text-white hover:bg-white hover:text-[#071d49] border hover:border-red-500 duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    {{-- Assets --}}
                    <div class="flex flex-col w-full lg:w-[50%] h-[450px] bg-white shadow-md items-center justify-center rounded-xl px-5 lg:px-0">
                       {{-- Header --}}
                        <div class="flex flex-row h-[10%] w-[90%] justify-center lg:justify-start items-center px-5 gap-2">
                            <img src="asset-management.png" alt="assetlogo" class="size-4">
                            <span class="text-md font-extrabold text-[#0035dd] uppercase tracking-widest">Recent Assets</span>
                        </div>
                        {{-- Border Line --}}
                        <span class="border-b-2 border-[#071d49] w-full lg:w-[85%] flex h-[5px]"></span>
                        {{-- Assets List --}}
                        <div class="flex h-[80%] flex-col overflow-y-auto hide-scrollbar items-center w-[90%] lg:w-[80%]">
                            <table class="h-[20%] w-full items-center justify-start gap-1">
                                {{-- 1 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16 cursor-pointer hover:bg-blue-100 duration-150">  
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-[#b100dd] text-2xl font-extrabold border-2 border-[#b100dd] w-12 h-[80%] rounded-md">PC</span>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full mx-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full">Dell OptiPlex 7090</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex">ID: AST-2024-001 • Department: Office Floor 3</span>
                                    </td>
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-black text-xs bg-yellow-200/80 rounded-2xl w-20 h-[40%] uppercase">Repair</span>
                                    </td>
                                </tr>
                                {{-- 2 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16 cursor-pointer hover:bg-blue-100 duration-150">
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-[#0072dd] text-2xl font-extrabold border-2 border-[#0072dd] w-12 h-[80%] rounded-md">PR</span>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full mx-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full">HP LaserJet Pro 4301</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex ">ID: AST-2024-002 • Department: Admin Office</span>
                                    </td>
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-black text-xs bg-green-200/80 rounded-2xl w-20 h-[40%] uppercase">active</span>
                                    </td>
                                </tr>
                                {{-- 3 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16 cursor-pointer hover:bg-blue-100 duration-150">
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-[#21dd00] text-2xl font-extrabold border-2 border-[#21dd00] w-12 h-[80%] rounded-md">SR</span>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full mx-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full">Cisco Catalyst 9300</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex ">ID: AST-2024-003 • Department: Server Room</span>
                                    </td>
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-black text-xs bg-red-200/80 rounded-2xl w-20 h-[40%] uppercase">Disposed</span>
                                    </td>
                                </tr>
                                {{-- 4 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16 cursor-pointer hover:bg-blue-100 duration-150">
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-[#dd6300] text-2xl font-extrabold border-2 border-[#dd6300] w-12 h-[80%] rounded-md">VH</span>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full mx-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full">Ford Transit Van</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex ">ID: AST-2024-004 • Department: Garage A</span>
                                    </td>
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-black text-xs bg-gray-200/80 rounded-2xl w-20 h-[40%] uppercase truncate">Inactive</span>
                                    </td>
                                </tr>
                                {{-- 5 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16 cursor-pointer hover:bg-blue-100 duration-150">
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-[#b100dd] text-2xl font-extrabold border-2 border-[#b100dd] w-12 h-[80%] rounded-md">PC</span>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full mx-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full">Dell OptiPlex 7090</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex ">ID: AST-2024-001 • Department: Office Floor 3</span>
                                    </td>
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-black text-xs bg-yellow-200/80 rounded-2xl w-20 h-[40%] uppercase">Repair</span>
                                    </td>
                                </tr>
                                {{-- 6 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16 cursor-pointer hover:bg-blue-100 duration-150">
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-[#0072dd] text-2xl font-extrabold border-2 border-[#0072dd] w-12 h-[80%] rounded-md p-2">PR</span>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full mx-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full">HP LaserJet Pro 4301</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex ">ID: AST-2024-002 • Department: Admin Office</span>
                                    </td>
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-black text-xs bg-green-200/80 rounded-2xl w-20 h-[40%] uppercase">active</span>
                                    </td>
                                </tr>
                                {{-- 7 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16 cursor-pointer hover:bg-blue-100 duration-150">
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-[#21dd00] text-2xl font-extrabold border-2 border-[#21dd00] w-12 h-[80%] rounded-md">SR</span>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full mx-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full">Cisco Catalyst 9300</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex ">ID: AST-2024-003 • Department: Server Room</span>
                                    </td>
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-black text-xs bg-red-200/80 rounded-2xl w-20 h-[40%] uppercase">Disposed</span>
                                    </td>
                                </tr>
                                {{-- 8 --}}
                                <tr class="flex flex-row border-b border-[#071d49] w-full h-16 cursor-pointer hover:bg-blue-100 duration-150">
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-[#dd6300] text-2xl font-extrabold border-2 border-[#dd6300] w-12 h-[80%] rounded-md">VH</span>
                                    </td>         
                                    <td class="flex flex-col justify-center items-center w-full mx-2">
                                        <span class="text-xs font-semibold text-[#071d49] w-full">Ford Transit Van</span>
                                        <span class="text-[10px] font-semibold text-[#071d49] w-full hidden lg:flex ">ID: AST-2024-004 • Department: Garage A</span>
                                    </td>
                                    <td class="flex items-center">
                                        <span class="flex justify-center items-center text-black text-xs bg-gray-200/80 rounded-2xl w-20 h-[40%] uppercase">Inactive</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- Third Row --}}
                <div class="flex flex-col lg:flex-row w-full items-start justify-center gap-x-4 gap-y-6">
                    <!-- Borrow Asset -->
                    <div x-data="{openAsset:''}" class="w-full lg:w-[33%]">
                        <div @click="openAsset = (openAsset === 'borrow' ? null : 'borrow')" class="group cursor-pointer relative overflow-visible bg-white border-2 border-[#071d49] rounded-xl shadow-md w-full p-4">
                            <div class="text-[#071d49]  w-full uppercase tracking-widest text-lg font-extrabold whitespace-normal text-center px-5">
                                How to Borrow <br>Asset
                            </div>
                            <div x-show="openAsset === 'borrow'" x-transition class="overflow-hidden text-[#071d49] px-1">
                                <div class="flex flex-col gap-y-3 pt-3">
                                    <div class="flex flex-col w-full justify-center items-start gap-y-1">
                                        <div class="flex flex-row w-full gap-x-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#ffdd00]">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-[#071d49] font-bold">First Step:</span>
                                        </div>
                                        <span class="text-gray-500 text-sm">Employee will fill out a Borrow Request Form.</span>
                                    </div>
                                    <div class="flex flex-col w-full justify-center items-start gap-y-1">
                                        <div class="flex flex-row w-full gap-x-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#ffdd00]">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-[#071d49] font-bold">Second Step:</span>
                                        </div>
                                        <span class="text-gray-500 text-sm">Asset will approve the request or not, depending on the availability of assets.</span>
                                    </div>
                                    <div class="flex flex-col w-full justify-center items-start gap-y-1">
                                        <div class="flex flex-row w-full gap-x-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#ffdd00]">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-[#071d49] font-bold">Third Step:</span>
                                        </div>
                                        <span class="text-gray-500 text-sm">Status of Asset is set to status "<span class="italic text-[#0035dd] text-sm">BORROWED</span>".</span>
                                    </div>
                                    <div class="flex flex-col w-full justify-center items-start gap-y-1">
                                        <div class="flex flex-row w-full gap-x-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#ffdd00]">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-[#071d49] font-bold">Fourth Step:</span>
                                        </div>
                                        <span class="text-gray-500 text-sm">Once returned, Asset saff will be set to status "<span class="italic text-[#0035dd] text-sm">AVAILABLE</span>".</span>
                                    </div>
                                    <div class="flex w-full h-10 mb-3 justify-center items-center">
                                        <button @click.stop="window.location='{{ route('allAssets') }}'" class="flex flex-row gap-x-2 justify-center items-center border-2 border-[#071d49] bg-[#ffdd00] hover:bg-yellow-200 hover:underline text-black font-bold uppercase rounded-md px-2 w-[80%] h-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                            </svg>
                                            Fill out form?
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute flex -bottom-5 left-1/2 transform -translate-x-1/2 justify-center items-end group-hover:bg-yellow-200 bg-[#ffdd00] border-2 rounded-full border-[#071d49] z-10 p-1">
                                <span class="text-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]" :class="openAsset === 'borrow' ? 'rotate-180' : ''">
                                        <path fill-rule="evenodd" d="M11.47 13.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 0 0-1.06-1.06L12 11.69 5.03 4.72a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M11.47 19.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 1 0-1.06-1.06L12 17.69l-6.97-6.97a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Transfer Asset -->
                    <div x-data="{openTransfer:''}" class="w-full lg:w-[33%]">
                        <div @click="openTransfer = (openTransfer === 'transfer' ? null : 'transfer')" class="group cursor-pointer relative overflow-visible bg-white border-2 border-[#071d49] rounded-xl shadow-md w-full gap-y-2 p-4">
                            <div class=" text-[#071d49] w-full uppercase tracking-widest text-lg font-extrabold whitespace-normal text-center px-5">
                                How to Transfer Asset
                            </div>
                            <div x-show="openTransfer === 'transfer'" x-transition class=" overflow-hidden text-[#071d49] px-1">
                                <div class="flex flex-col gap-y-3 pt-3">
                                    <div class="flex flex-col w-full justify-center items-start gap-y-1">
                                        <div class="flex flex-row w-full gap-x-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#ffdd00]">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-[#071d49] font-bold">First Step:</span>
                                        </div>
                                        <span class="text-gray-500 text-sm">Employee will fill out a Transfer Request Form.</span>
                                    </div>
                                    <div class="flex flex-col w-full justify-center items-start gap-y-1">
                                        <div class="flex flex-row w-full gap-x-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#ffdd00]">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-[#071d49] font-bold">Second Step:</span>
                                        </div>
                                        <span class="text-gray-500 text-sm">Asset will transfer the asset to designated employee/branch/department and set to status "<span class="italic text-[#0035dd] text-sm">TRANSFERED</span>" and set the condition.</span>
                                    </div>
                                    <div class="flex flex-col w-full justify-center items-start gap-y-1">
                                        <div class="flex flex-row w-full gap-x-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#ffdd00]">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-[#071d49] font-bold">Third Step:</span>
                                        </div>
                                        <span class="text-gray-500 text-sm">Apply the Deployment Process.</span>
                                    </div>
                                    <div class="flex w-full h-10 mb-3 justify-center items-center">
                                        <button @click.stop="window.location='{{ route('allAssets') }}'" class="flex flex-row gap-x-2 justify-center items-center border-2 border-[#071d49] bg-[#ffdd00] hover:bg-yellow-200 hover:underline text-black font-bold uppercase rounded-md px-2 w-[80%] h-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                            </svg>
                                            Fill out form?
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute flex -bottom-5 left-1/2 transform -translate-x-1/2 justify-center items-end group-hover:bg-yellow-200 bg-[#ffdd00] border-2 rounded-full border-[#071d49] z-10 p-1">
                                <span class="text-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]" :class="openTransfer === 'transfer' ? 'rotate-180' : ''">
                                        <path fill-rule="evenodd" d="M11.47 13.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 0 0-1.06-1.06L12 11.69 5.03 4.72a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M11.47 19.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 1 0-1.06-1.06L12 17.69l-6.97-6.97a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Transfer Pull-out/Disposal -->
                    <div x-data="{openPullout:''}" class="w-full lg:w-[33%]">
                        <div @click="openPullout = (openPullout === 'pullout' ? null : 'pullout')" class="group cursor-pointer relative overflow-visible bg-white border-2 border-[#071d49] rounded-xl shadow-md w-full p-4">
                            <div class="text-[#071d49] w-full uppercase tracking-widest text-lg font-extrabold whitespace-normal text-center">
                                How to Transfer <br> Pull-out/Disposal
                            </div>
                            <div x-show="openPullout === 'pullout'" x-transition class="overflow-hidden text-[#071d49] px-1">
                                <div class="flex flex-col gap-y-3 pt-3">
                                    <div class="flex flex-col w-full justify-center items-start gap-y-1">
                                        <div class="flex flex-row w-full gap-x-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#ffdd00]">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-[#071d49] font-bold">First Step:</span>
                                        </div>
                                        <span class="text-gray-500 text-sm">Employee will fill out a Pull-out /Disposal Form.</span>
                                    </div>
                                    <div class="flex flex-col w-full justify-center items-start gap-y-1">
                                        <div class="flex flex-row w-full gap-x-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#ffdd00]">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-[#071d49] font-bold">Second Step:</span>
                                        </div>
                                        <span class="text-gray-500 text-sm">The Asset Department will transfer the asset to the designated employee/branch/department and set it to status "<span class="italic text-[#0035dd] text-sm">PULL-OUT</span>" and set the condition (repair, dispose, resigned employee, old laptop).</span>
                                    </div>
                                    <div class="flex flex-col w-full justify-center items-start gap-y-1">
                                        <div class="flex flex-row w-full gap-x-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#ffdd00]">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-[#071d49] font-bold">Third Step:</span>
                                        </div>
                                        <span class="text-gray-500 text-sm">Coordinate with IST Dept to check the condition of Laptop/Desktop.</span>
                                    </div>
                                    <div class="flex flex-col w-full justify-center items-start gap-y-1">
                                        <div class="flex flex-row w-full gap-x-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#ffdd00]">
                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-[#071d49] font-bold">Fourth Step:</span>
                                        </div>
                                        <span class="text-gray-500 text-sm">The asset will transfer to branch/department "<span class="italic text-[#0035dd] text-sm">ASSET DEPARTMENT</span>".</span>
                                    </div>
                                    <div class="flex w-full h-10 mb-3 justify-center items-center">
                                        <button @click.stop="window.location='{{ route('allAssets') }}'" class="flex flex-row gap-x-2 justify-center items-center border-2 border-[#071d49] bg-[#ffdd00] hover:bg-yellow-200 hover:underline text-black font-bold uppercase rounded-md px-2 w-[80%] h-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                            </svg>
                                            Fill out form?
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute flex -bottom-5 left-1/2 transform -translate-x-1/2 justify-center items-end group-hover:bg-yellow-200 bg-[#ffdd00] border-2 rounded-full border-[#071d49] z-10 p-1">
                                <span class="text-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]" :class="openPullout === 'pullout' ? 'rotate-180' : ''">
                                        <path fill-rule="evenodd" d="M11.47 13.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 0 0-1.06-1.06L12 11.69 5.03 4.72a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M11.47 19.28a.75.75 0 0 0 1.06 0l7.5-7.5a.75.75 0 1 0-1.06-1.06L12 17.69l-6.97-6.97a.75.75 0 0 0-1.06 1.06l7.5 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Fourth Row--}}
                <div class="flex flex-col w-full justify-center items-center gap-x-4 gap-y-4">
                    <div class="flex flex-col lg:flex-row h-[600px] lg:h-[300px] w-full items-center justify-center rounded-xl gap-x-4 pt-4 gap-y-4">
                        {{-- Assets Contribution --}}
                        <div class="flex flex-col w-full lg:w-[50%] items-center justify-center bg-white h-[50%] lg:h-full rounded-xl shadow-md">
                            <div class="flex justify-center w-[90%]">
                                <label for="contribution" class="text-[#071d49] uppercase font-bold text-lg">Assets by Category</label>
                            </div>
                            <div class="flex flex-row w-[90%] h-[70%] lg:h-[80%] justify-center items-center">
                                <x-analytics-display
                                    title="Contributions"
                                    :labels="['IT', 'Vehicles', 'Machinery', 'Office Supply', 'Furniture']"
                                    :data="[200, 100, 50, 90, 20]"
                                    chartType="doughnut"
                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                />
                            </div>
                        </div>
                        {{-- Assets Status --}}
                        <div class="flex flex-col w-full lg:w-[50%] items-center justify-center bg-white h-[50%] lg:h-full rounded-xl shadow-md">
                            <div class="flex justify-center w-[90%]">
                                <label for="assetStatus" class="text-[#071d49] uppercase font-bold text-lg">Assets Status Overview</label>
                            </div>
                            <div class="flex flex-row w-[90%] h-[80%] justify-center items-center">
                                <x-analytics-display
                                    title="Assets Status"
                                    :labels="['Available', 'Repair', 'Dispose', 'Resigned', 'Old Laptop']"
                                    :data="[200, 100, 50, 90, 20]"
                                    chartType="bar"
                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>