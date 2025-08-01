<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'branch' => new stdClass()]"
    navbar_selected='Asset Management'>
    {{-- @include('layouts.navbar') --}}

    <div x-data="{ selected : 'branch'}"
        class="flex flex-1 flex-col lg:ml-52 mt-12 overflow-y-auto py-10 px-5 lg:p-10 gap-7 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-7">
            <div class="flex h-14 lg:flex-row border-b border-gray-200 relative"
                x-data="{ openCMS: false, openAssets: false }">

                <x-ams.submodules selected="CMS" />
            </div>
        </div>

        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-col justify-between">

                <!-- Breadcrumbs -->
                <div
                    class="flex flex-wrap items-center gap-x-1 text-blue-900 text-sm px-2 pt-3 pb-2 lg:pt-5 lg:pb-2 lg:px-5">
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
                        class="hover:underline font-semibold">Branch</a>
                    <a x-show="selected === 'department'" x-transition href="/ams/cms/branch-department"
                        class="hover:underline font-semibold">Department</a>
                </div>

            </div>

            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between px-5 py-2 gap-4">
                <div>
                    <h2 class="font-semibold text-lg text-blue-900"
                        x-text="selected === 'branch' ? 'Manage AAP Branches' : 'Manage AAP Departments' "></h2>
                    <p class="text-gray-900 text-sm"
                        x-text="selected === 'branch' ? 'Create, update, and delete branch details.' : 'Create, update, and delete department details.' ">
                    </p>
                </div>

                <div class="flex flex-wrap justify-between items-center gap-4 px-0 lg:px-5">
                    <!-- Add Button -->
                    <div class="flex justify-start lg:items-center gap-4">
                        <a x-show="selected == 'branch'" href="create-branch"
                            class="flex items-center gap-2 rounded-md bg-blue-900 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add New Branch
                        </a>

                        <a x-show="selected == 'department'" href="create-department"
                            class="flex items-center gap-2 rounded-md bg-blue-900 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
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
                                class="w-1/2 text-xs uppercase font-semibold flex items-center justify-center transition duration-150 cursor-pointer"
                                :class="selected === 'branch' ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white'">
                                Branches
                            </a>
                            <a @click="selected='department'"
                                class="w-1/2 text-xs uppercase font-semibold flex items-center justify-center transition duration-150 cursor-pointer"
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