<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'branch' => new stdClass()]"
    navbar_selected='Asset Management'>

    <div x-data="{ selected : 'branch'}"
        class="flex flex-1 flex-col lg:ml-52 mt-12 overflow-y-auto py-10 px-5 lg:p-10 gap-7 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class="bg-white border-2 border-gray-100 rounded-md shadow-lg -mt-7">
            <div class="relative flex border-b border-gray-200 h-14 lg:flex-row"
                x-data="{ openCMS: false, openAssets: false }">

                <x-ams.submodules selected="CMS" />
            </div>
        </div>

        <div class="-mt-4 bg-white border-2 border-gray-100 rounded-md shadow-lg">
            <div class="flex flex-col justify-between">

                <!-- Breadcrumbs -->
                <div
                    class="flex flex-wrap items-center px-2 pt-3 pb-2 text-sm text-blue-900 gap-x-1 lg:pt-5 lg:pb-2 lg:px-5">
                    <a href="/ams" class="hover:underline">Asset Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="/ams/cms/branch-department" class="hover:underline">CMS</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a x-show="selected === 'branch'" x-transition href="/ams/cms/branch-department"
                        class="font-semibold hover:underline">Branch</a>
                    <a x-show="selected === 'department'" x-transition href="/ams/cms/branch-department"
                        class="font-semibold hover:underline">Department</a>
                </div>

            </div>

            <div class="flex flex-col items-start justify-between gap-4 px-5 py-2 sm:flex-row sm:items-center">
                <div>
                    <h2 class="text-lg font-semibold text-blue-900"
                        x-text="selected === 'branch' ? 'Manage AAP Branches' : 'Manage AAP Departments' "></h2>
                    <p class="text-sm text-gray-900"
                        x-text="selected === 'branch' ? 'Create, update, and delete branch details.' : 'Create, update, and delete department details.' ">
                    </p>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-4 px-0 lg:px-5">
                    <!-- Add Button -->
                    <div class="flex justify-start gap-4 lg:items-center">
                        <a x-show="selected == 'branch'" href="create-branch"
                            class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-900 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add New Branch
                        </a>

                        <a x-show="selected == 'department'" href="create-department"
                            class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-900 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add New Department
                        </a>
                    </div>

                    <!-- Toggle -->
                    <div class="flex px-12 lg:px-0 sm:justify-end">
                        <div class="flex border border-[#151847] rounded-md overflow-hidden w-[210px] h-[36px]">
                            <a @click="selected='branch'"
                                class="flex items-center justify-center w-1/2 text-xs font-semibold uppercase transition duration-150 cursor-pointer"
                                :class="selected === 'branch' ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white'">
                                Branches
                            </a>
                            <a @click="selected='department'"
                                class="flex items-center justify-center w-1/2 text-xs font-semibold uppercase transition duration-150 cursor-pointer"
                                :class="selected === 'department' ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white'">
                                Departments
                            </a>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Branches Table -->
            <div x-show="selected === 'branch'" x-transition>
                <livewire:ams.cms.branch-list wire:key="branch-list" />
            </div>

            <!-- Departments Table -->
            <div x-show="selected === 'department'" x-transition>
                <livewire:ams.cms.department-list wire:key="department-list" />
            </div>
        </div>


    </div>
</x-app-layout>