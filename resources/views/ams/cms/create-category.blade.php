<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false]"
    navbar_selected='Asset Management'>

    <div class="flex flex-1 flex-col lg:ml-52 overflow-y-auto p-10 gap-7 mt-12 bg-[#f3f4f6]">
        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-col justify-between w-full">
                {{-- Breadcrumbs --}}
                <div class="flex justify-start w-full gap-x-1 text-[#071d49] text-sm px-7 pt-5">
                    <a href="/ams" class="hover:underline">Asset Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="/ams/cms/asset-categories" class="hover:underline">CMS</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="/ams/cms/asset-categories" class="hover:underline">Asset Categories</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="hover:underline font-semibold">Add Category</a>
                </div>
            </div>

            <header class="mt-5 flex justify-center flex-col items-start w-full px-10">
                <h2 class="text-2xl font-medium text-[#151847]">ADD NEW CATEGORY</h2>
            </header>

            <main class="space-y-6 w-full">
                <section class="space-y-1.5">
                    <div class="p-10 bg-white rounded-xl space-y-8 shadow-lg">
                        <!-- Form Section -->
                        <div class="gap-y-7 flex flex-col">
                            <!-- Title and Description -->
                            <div class="w-full flex flex-col items-start justify-start gap-y-1">
                                <h2 class="text-lg font-bold mb-2 text-[#071d49]">Category Details</h2>
                                <p class="text-sm text-gray-600 leading-tight"><em>Provide a name and description for the category.</em></p>
                            </div>

                            <!-- Category Name -->
                            <div class="w-full">
                                <label class="block text-sm font-medium text-gray-700">Category Name</label>
                                <input type="text" placeholder="e.g., IT Equipment"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                            </div>

                            <!-- Category Description -->
                            <div class="w-full">
                                <label class="block text-sm font-medium text-gray-700">Category Description</label>
                                <textarea rows="3" placeholder="Brief description of the category"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600"></textarea>
                            </div>

                            <!-- Save Button -->
                            <div class="flex justify-end items-end pt-4">
                                <button
                                    class="btn text-white px-5 py-2 rounded-lg ring-0 ring-blue-900 hover:bg-blue-900/80 hover:ring-2 active:bg-blue-900 bg-blue-900">
                                    Save Category
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</x-app-layout>
