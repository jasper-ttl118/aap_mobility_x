<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'branch' => new stdClass()]"
    navbar_selected='Asset Management'>

    <div class="flex flex-1 flex-col lg:ml-52 overflow-y-auto p-10 gap-7 mt-12 bg-[#f3f4f6]">
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4 px-10 py-8 space-y-6">
            <!-- Breadcrumbs -->
            <div class="flex gap-x-1 text-[#071d49] text-sm">
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
                <a href="/ams/cms/branch-department" class="hover:underline">Branch</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                <a href="/ams/cms/branch-department" class="hover:underline font-semibold">Add Branch</a>
            </div>

            <!-- Form Header -->
            <h2 class="text-2xl font-medium text-[#151847]">ADD NEW BRANCH</h2>

            <form class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Branch Code</label>
                    <input type="text" placeholder="e.g., NCR-01"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Branch Name</label>
                    <input type="text" placeholder="e.g., AAP Makati Branch"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600"
                        placeholder="Complete address"></textarea>
                </div>

                <div class="flex justify-end pt-2">
                    <button type="submit"
                        class="px-5 py-2 rounded-md bg-blue-900 text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Save Branch
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
