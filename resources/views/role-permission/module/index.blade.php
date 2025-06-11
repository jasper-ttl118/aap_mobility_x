<x-app-layout class='flex flex-row min-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='RBAC Management'>
    <div class="flex flex-1 flex-col ml-52 bg-[#F3F4F6] overflow-y-auto p-10 gap-7">
        @if (session('status'))
            <div id="toast-success"
                class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-sm transition-opacity duration-500 ease-in-out opacity-100"
                role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ session('status') }}</div>
                <button type="button" @click="show = false"
                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        <!-- Title and Subtitle -->
        {{-- <div class="">
            <h1 class="text-2xl font-semibold text-blue-900">RBAC Management</h1>
            <p class="text-gray-700 text-sm"> Manage user access and permissions within the
                organization.</p>
        </div> --}}

        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 mt-10 bg-white shadow-lg">
            <div class="flex h-14 border-b border-gray-200">
                <div class="w-32 p-4 text-center">
                    <a href="/user" class="text-gray-600 hover:text-blue-800">Users</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/organization" class="text-gray-600 hover:text-blue-800">Organizations</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/role" class="text-gray-600 hover:text-blue-800">Roles</a>
                </div>
                <div class="w-32 border-b-2 border-blue-900 p-4 text-center">
                    <a href="/module" class="font-semibold text-blue-900">Modules</a>
                </div>
                {{-- <div class="w-32 p-4 text-center">
                    <a href="/permission" class="text-gray-600 hover:text-blue-800">Permissions</a>
                </div> --}}
            </div>

            {{-- Breadcrumbs --}}
            <div class="flex items-center gap-x-1 text-blue-900 text-sm px-7 pt-5">
                <a href="/user" class="hover:underline">RBAC Management</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                        clip-rule="evenodd" />
                </svg>
                <a href="#" class="hover:underline font-semibold">Modules</a>
            </div>

            <div class="flex items-center justify-between p-7">
                <div>
                    <h2 class="font-semibold text-lg text-blue-900">Manage system modules</h2>
                    <p class="text-gray-900 text-sm">Administer, assign, and oversee system modules and their
                        configurations.</p>
                </div>

                <div class="flex gap-2">

                    {{-- Add Module Button --}}
                    <div>
                        <a href="module/create"
                            class="flex items-center gap-2 rounded-md bg-blue-900 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add New Module
                        </a>
                    </div>

                    {{-- Submodule Settings --}}
                    <div>
                        <a href="submodule"
                            class="flex items-center gap-2 rounded-md bg-gray-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Submodule Settings
                        </a>
                    </div>

                </div>

            </div>

            <div class="mx-7 mb-10 rounded-sm">
                <table class="w-full text-center text-sm text-gray-500">
                    <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                        <tr>
                            <th scope="col" class="w-1/12 py-3">ID</th>
                            <th scope="col" class="w-2/12 py-3">Module Name</th>
                            <th scope="col" class="w-3/12 py-3">Description</th>
                            <th scope="col" class="w-4/12 py-3">Sub-modules</th>
                            <th scope="col" class="w-1/12 py-3">Status</th>
                            <th scope="col" class="w-1/12 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($modules as $module)
                            <tr class="border-b border-gray-200 bg-white">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-900">
                                    {{ $module->module_id }}</th>
                                <td class="px-auto py-4  text-gray-900">{{ $module->module_name }}</td>
                                <td class="px-auto py-4  text-gray-500 break-words">{{ $module->module_description }}
                                </td>
                                <td class="px-7 py-4 align-middle text-gray-900">
                                    <div class="flex flex-wrap gap-2 justify-start items-center">
                                        @if ($module->submodules->isNotEmpty())
                                            @foreach ($module->submodules as $submodule)
                                                <span
                                                    class="bg-blue-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">
                                                    {{ $submodule->submodule_name }}
                                                </span>
                                            @endforeach
                                        @else
                                            <span
                                                class="bg-gray-500 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">
                                                No Sub-Module Assigned
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-auto py-4  text-gray-900">
                                    @if ($module->module_status == '1')
                                        <span
                                            class="bg-green-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">Active</span>
                                    @else
                                        <span
                                            class="bg-red-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-auto py-4">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                        <a href="{{ url('module/' . $module->module_id . '/edit') }}"
                                            class="flex items-center gap-1 font-medium text-blue-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4">
                                                <path
                                                    d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712Z" />
                                                <path
                                                    d="M19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                <path
                                                    d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0)"
                                            @click="open = true; deleteUrl = '{{ url('module/' . $module->module_id . '/delete') }}'"
                                            class="flex items-center gap-1 font-medium text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-cloak id="delete-modal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" x-show="open">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6 dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Confirm Deletion</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                Are you sure you want to delete this module? All sub-module on this module will be unassigned.
            </p>
            <div class="mt-4 flex justify-end items-center space-x-3">
                <button @click="open = false"
                    class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                    Cancel
                </button>

                <form id="delete-form" :action="deleteUrl" method="POST" class="inline-block m-0 p-0">
                    @csrf
                    @method('GET')
                    <button type="submit"
                        class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
