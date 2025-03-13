<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modules</title>
    @include("layouts.icons")
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="flex flex-row" x-data="{ open: false, deleteUrl: '', viewOpen: false, employee: {} }">
    @include('layouts.navbar')
    <div class="flex flex-col justify-center items-center w-full bg-gray-50 p-10">
        @if (session('status'))
            <div id="toast-success" class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-sm transition-opacity duration-500 ease-in-out opacity-100" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)">
                <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{session('status')}}</div>
                <button type="button" @click="show = false" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif


        {{-- List of Modules --}}
        <div class="w-full m-10 rounded-md border bg-white border-gray-100 p-5 shadow shadow-gray-300">
            <div class="flex justify-between items-center p-5">
                <h1 class="text-2xl font-bold">List of Available Modules</h1>
                <a href="module/create" class="flex uppercase rounded-lg items-center bg-blue-900 p-3 text-xs font-bold text-white hover:bg-indigo-800">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                    </svg>                      
                    Add New Module
                </a>
            </div>
            <table class="w-full text-center text-sm text-gray-500">
                <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                <tr>
                    <th scope="col" class="px-auto py-3">ID</th>
                    <th scope="col" class="px-auto py-3">Module Name</th>
                    <th scope="col" class="px-auto py-3">Description</th>
                    <th scope="col" class="px-auto py-3">Sub-modules</th>
                    <th scope="col" class="px-auto py-3">Status</th>
                    <th scope="col" class="px-auto py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($modules as $module )
                <tr class="border-b border-gray-200 bg-white">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-900">{{ $module->module_id }}</th>
                    <td class="px-auto py-4  text-gray-900">{{ $module->module_name }}</td>
                    <td class="px-auto py-4  text-gray-900">{{ $module->module_description }}</td>
                    <td class="px-auto py-4 flex flex-wrap gap-2 justify-center text-gray-900">
                        @if($module->submodules->isNotEmpty())
                            @foreach($module->submodules as $submodule)
                                <span class="bg-blue-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">
                                    {{ $submodule->submodule_name }}
                                </span>
                            @endforeach
                        @else
                            <span class="bg-gray-500 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">
                                No Sub-Module Assigned
                            </span>
                        @endif
                    </td>
                    <td class="px-auto py-4  text-gray-900">
                        @if ($module->module_status == '1')
                            <span class="bg-green-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">Active</span>
                        @else
                            <span class="bg-red-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">Inactive</span>
                        @endif
                    </td>
                    <td class="px-auto py-4">
                        <div class="flex flex-row justify-center items-center gap-2">
                            <a href="{{ url('module/'.$module->module_id.'/edit') }}" class="flex items-center gap-1 font-medium text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712Z"/>
                                    <path d="M19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z"/>
                                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z"/>
                                </svg>
                            </a>
                            <a href="javascript:void(0)" @click="open = true; deleteUrl = '{{ url('module/'.$module->module_id.'/delete') }}'" class="flex items-center gap-1 font-medium text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd"/>
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

    <!-- Delete Confirmation Modal -->
    <div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" x-show="open">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6 dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Confirm Deletion</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                Are you sure you want to delete this role? This action cannot be undone.
            </p>
            <div class="mt-4 flex justify-end space-x-3">
                <button @click="open = false" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                    Cancel
                </button>
                <form id="delete-form" :action="deleteUrl" method="POST">
                    @csrf
                    @method('GET')
                    <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>