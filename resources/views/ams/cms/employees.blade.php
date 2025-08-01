{{-- BRANDS CMS --}}

<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'branch' => new stdClass()]"
    navbar_selected='Asset Management'>
    {{-- @include('layouts.navbar') --}}

    <div class="flex flex-1 flex-col lg:ml-52 mt-12 overflow-y-auto py-10 px-5 lg:p-10 gap-7 bg-[#f3f4f6]">
        <!-- Options Container -->
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-7">
            <div class="flex h-14 lg:flex-row border-b border-gray-200 relative"
                x-data="{ openCMS: false, openAssets: false }">

                <x-ams.submodules selected="Employees" />
            </div>
        </div>

        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-col justify-between">

                <!-- Breadcrumbs -->
                <div class="flex flex-wrap items-center gap-x-1 text-blue-900 text-sm px-2 pt-3 lg:p-5">
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
                    <a x-transition href="/ams/cms/employees" class="hover:underline font-semibold">Employees</a>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between px-5 py-6 gap-4">
                <div>
                    <h2 class="font-semibold text-lg text-blue-900">
                        Manage Employee Assets
                    </h2>
                    <p class="text-gray-900 text-sm">
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