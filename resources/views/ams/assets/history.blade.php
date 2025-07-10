<x-app-layout class="flex flex-row w-h-screen"
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'asset' => new stdClass()]"
    navbar_selected="Asset Management">
    <div class="flex flex-1 flex-col lg:ml-52 overflow-y-auto p-10 gap-7 mt-12 bg-[#f3f4f6]">

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

        <!-- Asset Info Header -->
        <div class="rounded-md bg-white border-2 border-gray-100 shadow p-6 ">
            {{-- Breadcrumbs --}}
            <div class="flex flex-wrap items-center gap-x-1 text-blue-900 text-sm ">
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
                <a href="#" class="hover:underline font-semibold">Asset History</a>
            </div>

            <div class="my-2">
                <h2 class="text-lg font-semibold text-blue-900 mb-1">Asset History: DELL LATITUDE 5430</h2>
                <p class="text-sm text-gray-700">Property Code: IT-001 | Assigned to: DOE, JOHN | Status: In Use</p>
            </div>
            <div x-data="{ showModal: false, selectedRow: null }" class="relative">

                <!-- History Table -->
                <div class="rounded-md overflow-hidden border border-gray-200">
                    <table class="w-full text-sm text-gray-500 table-fixed">
                        <!-- Table Header -->
                        <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                            <tr class="flex w-full">
                                <th class="py-3 px-4 w-1/5">Date & Time</th>
                                <th class="py-3 px-4 w-2/5">Action</th>
                                <th class="py-3 px-4 w-1/5">Created By</th>
                                <th class="py-3 px-4 w-1/5">Approved By</th>
                                <th class="py-3 px-4 w-[80px] text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody class="block max-h-[270px] overflow-y-scroll divide-y divide-gray-200">

                            <!-- Row Template -->
                            <template x-for="(entry, index) in [
                    { time: '12/02/2025 08:45 AM', action: 'Created and assigned to DOE, JOHN', by: 'Admin', approved: 'IT Supervisor' },
                    { time: '15/03/2025 01:10 PM', action: 'Transferred from DOE, JOHN to FERNANDEZ, MIGUEL', by: 'HR Officer', approved: 'IT Supervisor' },
                    { time: '28/03/2025 10:30 AM', action: 'Marked as Available in Storage', by: 'Admin', approved: 'Inventory Manager' },
                    { time: '30/03/2025 09:15 AM', action: 'Borrowed from Storage by SANTOS, MARIA', by: 'Admin Assistant', approved: 'Inventory Manager' },
                    { time: '10/04/2025 05:25 PM', action: 'Returned from SANTOS, MARIA to Storage', by: 'Admin Assistant', approved: 'Inventory Manager' },
                    { time: '17/04/2025 11:00 AM', action: 'Marked as Under Maintenance', by: 'Maintenance Scheduler', approved: 'IT Supervisor' },
                    { time: '19/04/2025 02:40 PM', action: 'Received by IT Department', by: 'IT Staff', approved: 'IT Supervisor' },
                    { time: '24/04/2025 04:10 PM', action: 'Maintenance completed, moved to Available', by: 'IT Staff', approved: 'IT Supervisor' }
                ]" :key="index">
                                <tr class="flex w-full " :class="index % 2 === 0 ? 'bg-white' : 'bg-gray-50'">
                                    <td class="py-4 px-4 w-1/5 text-gray-900" x-text="entry.time"></td>
                                    <td class="py-4 px-4 w-2/5 font-semibold text-blue-800" x-text="entry.action"></td>
                                    <td class="py-4 px-4 w-1/5 text-gray-700" x-text="entry.by"></td>
                                    <td class="py-4 px-4 w-1/5 text-gray-700" x-text="entry.approved"></td>
                                    <td class="py-4 px-4 w-[80px]  text-center">
                                        <div class="relative group ">
                                            <button @click="selectedRow = entry; showModal = true" 
                                                class="text-gray-800 hover:text-gray-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-4">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <div
                                                class="absolute top-full mb-2 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition z-50">
                                                View Details
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <!-- Modal -->
                <div x-show="showModal" x-transition
                    class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
                    <div @click.away="showModal = false" class="bg-white w-full max-w-md rounded-md shadow-lg p-6">
                        <h2 class="text-lg font-semibold text-blue-900 mb-4">Asset History Details</h2>
                        <div class="space-y-2 text-sm text-gray-700">
                            <div><span class="font-medium">Date & Time:</span> <span x-text="selectedRow?.time"></span>
                            </div>
                            <div><span class="font-medium">Action:</span> <span x-text="selectedRow?.action"></span>
                            </div>
                            <div><span class="font-medium">Created By:</span> <span x-text="selectedRow?.by"></span>
                            </div>
                            <div><span class="font-medium">Approved By:</span> <span
                                    x-text="selectedRow?.approved"></span></div>
                        </div>
                        <div class="mt-6 text-right">
                            <button @click="showModal = false"
                                class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-900 text-sm">Close</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>