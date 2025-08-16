{{-- BRANDS CMS --}}

<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'branch' => new stdClass()]"
    navbar_selected='Asset Management'>

    <div class="flex flex-1 flex-col lg:ml-52 mt-12 overflow-y-auto py-10 px-5 lg:p-10 gap-7 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class="bg-white border-2 border-gray-100 rounded-md shadow-lg -mt-7">
            <div class="relative flex border-b border-gray-200 h-14 lg:flex-row"
                x-data="{ openCMS: false, openAssets: false }">

                <x-ams.submodules selected="Employees" />
            </div>
        </div>

        <div class="-mt-4 bg-white border-2 border-gray-100 rounded-md shadow-lg">
            <div class="flex flex-col justify-between">

                <!-- Breadcrumbs -->
                <div class="flex flex-wrap items-center px-2 pt-3 text-sm text-blue-900 gap-x-1 lg:p-5">
                    <a href="/ams" class="hover:underline">Asset Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="/ams/cms/employees" class="hover:underline">CMS</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a x-transition href="/ams/cms/employees" class="font-semibold hover:underline">Employees</a>
                </div>
            </div>

            <div class="flex flex-col items-start justify-between gap-4 px-5 py-6 sm:flex-row sm:items-center">
                <div>
                    <h2 class="text-lg font-semibold text-blue-900">
                        Manage Employee Assets
                    </h2>
                    <p class="text-sm text-gray-900">
                        Add, Edit and Remove Assets from Employees
                    </p>
                </div>

                <div class="flex items-center gap-4">
                </div>
            </div>
            <livewire:ams.cms.employees-list />
        </div>
    </div>
</x-app-layout>