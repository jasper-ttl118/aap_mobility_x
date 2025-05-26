<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sub-module</title>
    @include('layouts.icons')
    @vite('resources/css/app.css')
</head>


{{-- <body class="flex flex-row h-screen">
    @include('layouts.navbar')
    <div class="flex flex-col w-full ml-64 overflow-y-auto p-10 h-screen justify-center items-center">
        @if ($errors->any())
            <div id="toast-error" class="fixed top-5 right-5 z-50 flex flex-col max-w-xs p-4 text-red-500 bg-white border border-red-300 rounded-lg shadow-sm transition-opacity duration-500 ease-in-out opacity-100 dark:bg-red-900 dark:text-red-200" role="alert">
                <div class="flex items-center">
                    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm-1 5a1 1 0 0 1 2 0v4a1 1 0 0 1-2 0V5Zm1 7a1.25 1.25 0 1 1-1.25 1.25A1.25 1.25 0 0 1 10 12Z"/>
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <span class="ms-3 font-semibold">Error:</span>
                    <button type="button" onclick="closeErrorToast()" class="ms-auto -mx-1.5 -my-1.5 bg-white text-red-400 hover:text-red-900 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:text-red-500 dark:hover:text-white dark:bg-red-800 dark:hover:bg-red-700" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <ul class="mt-2 text-sm list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/submodule" method="post" enctype="multipart/form-data" class="mx-auto max-w-md bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
            @csrf
            <div class="p-6 space-y-6">
                <!-- Heading -->
                <div class="border-b border-gray-200 pb-5">
                    <h1 class="text-xl font-semibold text-gray-800">Add New Sub-Module</h1>
                    <p class="text-sm text-gray-500">
                        Add new sub-module and assign it with available modules.
                    </p>
                </div>
        
                <!-- Sub-module Name -->
                <div>
                    <label for="module_name" class="block font-medium text-gray-700">Sub-module Name</label>
                    <input type="text" name="submodule_name" placeholder="Module Name"
                        class="w-full bg-gray-50 border border-gray-300 rounded-md px-4 py-2 mt-1 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
        
                <!-- Sub-Module Description -->
                <div>
                    <label for="module_description" class="block font-medium text-gray-700">Description</label>
                    <input type="text" name="submodule_description" placeholder="Description"
                        class="w-full bg-gray-50 border border-gray-300 rounded-md px-4 py-2 mt-1 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
        
                <!-- Assign it to a Module -->
                <div>
                    <label for="submodule_module" class="block font-medium text-gray-700">Select Modules</label>
                    <select type="text" name="module_id" placeholder="Select Module"class="bg-gray-100 w-full mt-1 h-10 rounded-lg border-1 border-gray-200 px-3 focus:outline-blue-900">
                        @foreach ($modules as $module)
                            <option value="{{ $module->module_id }}">{{ $module->module_name }}</option>
                        @endforeach
                        </select>
                </div>
        
                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function closeErrorToast() {
            const toast = document.getElementById('toast-error');
            toast.classList.add('opacity-0'); // Start fade-out
            setTimeout(() => {
                toast.classList.add('hidden'); // Hide after fade-out
            }, 500); // Matches the transition duration
        }
    
        // Auto-hide the error toast after 7 seconds
        setTimeout(closeErrorToast, 7000);

        var loadFile = function(event) {
            
            var input = event.target;
            var file = input.files[0];
            var type = file.type;

           var output = document.getElementById('preview_img');


            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

    </script>
</body> --}}

<body class="flex flex-row  w-h-screen">
    @php
        $navbar_selected = 'RBAC Management';
    @endphp
    @include('layouts.navbar')

    <div class="flex flex-1 flex-col ml-64 overflow-y-auto p-10 gap-7">
        @if ($errors->any())
            <div id="toast-error"
                class="fixed top-5 right-5 z-50 flex flex-col max-w-xs p-4 text-red-500 bg-white border border-red-300 rounded-lg shadow-sm transition-opacity duration-500 ease-in-out opacity-100 dark:bg-red-900 dark:text-red-200"
                role="alert">
                <div class="flex items-center">
                    <div
                        class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm-1 5a1 1 0 0 1 2 0v4a1 1 0 0 1-2 0V5Zm1 7a1.25 1.25 0 1 1-1.25 1.25A1.25 1.25 0 0 1 10 12Z" />
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <span class="ms-3 font-semibold">Error:</span>
                    <button type="button" onclick="closeErrorToast()"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-red-400 hover:text-red-900 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:text-red-500 dark:hover:text-white dark:bg-red-800 dark:hover:bg-red-700"
                        aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <ul class="mt-2 text-sm list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Breadcrumbs-->
        <div class="flex items-center gap-x-1 text-blue-900 text-sm">
            <a href="/module" class="hover:underline">RBAC Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="/module" class="hover:underline">Modules</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="/submodule" class="hover:underline">Manage Submodules</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="#" class="hover:underline font-semibold">Add Submodules</a>
        </div>

        <!-- Title and Subtitle -->
        <div class="">
            <h1 class="text-2xl font-semibold text-blue-900">RBAC Management</h1>
            <p class="text-gray-700 text-sm"> Manage user access and permissions within the
                organization.</p>
        </div>

        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 bg-gray-50">
            <div class="flex h-14 border-b border-gray-200">
                <div class="w-32 p-4 text-center">
                    <a href="#" class="text-gray-600 hover:text-blue-800">Users</a>
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

            <div class="flex items-center justify-between p-7">
                <div>
                    <h2 class="font-semibold text-lg text-blue-900">Add New Submodule</h2>
                    <p class="text-gray-900 text-sm">
                        Create a new submodule and assign it to a main module.</p>
                </div>

            </div>

            <form action="/module" method="post" class="flex flex-col p-7 gap-7">
                @csrf

                {{-- Role Details --}}
                <div class="grid grid-cols-10 gap-10 items-start">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Submodule Details</h1>
                        <p class="text-sm italic text-gray-600">Define submodule name with description.</p>
                        <span class="flex items-center gap-1 text-xs text-gray-500">
                            <p class="italic">The system uses predefined submodule names. Please contact the system
                                administrator for the naming conventions.
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-4 text-red-500 inline-block">
                                    <path fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </p>
                        </span>
                    </div>
                    <div class="col-span-6">
                        <div class="flex flex-col gap-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex flex-col justify-center gap-2">
                                    <label for="submodule_name" class="text-sm font-medium text-blue-900">Submodule
                                        Name</label>
                                    <input type="text" name="submodule_name" placeholder=""
                                        class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                                </div>
                            </div>
                            <div class="flex flex-col justify-center gap-2">
                                <label for="submodule_description"
                                    class="text-sm font-medium text-blue-900">Description</label>
                                <input type="text" name="submodule_description" placeholder=""
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="border-gray-200">

                {{-- Assign to a module --}}
                <div class="grid grid-cols-10 gap-8 items-start">
                    <!-- Module Details Section -->
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Select a Module</h1>
                        <p class="text-sm italic text-gray-600">Assign the submodule to a primary module.</p>
                    </div>

                    <!-- Submodule Selection Section -->
                    <div class="col-span-6">
                        <div class="space-y-2">
                            <label for="module_name" class="block text-sm font-medium text-blue-900">Available
                                Module
                            </label>

                            <select type="text" name="module_id" placeholder="Select Module"
                                class="w-96 bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                                @foreach ($modules as $module)
                                    <option value="{{ $module->module_id }}">{{ $module->module_name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>


                {{-- Button --}}
                <div class="grid grid-cols-10 items-center pt-8 gap-10">
                    <div class="col-span-4">
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-2 justify-between gap-2">
                            <div class="flex flex-col justify-center gap-2">
                                <Button type="submit"
                                    class="w-48 px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800">Add
                                    Submodule</Button>
                            </div>
                        </div>
                    </div>
                </div>


            </form>


        </div>

    </div>

    <script>
        function closeErrorToast() {
            const toast = document.getElementById('toast-error');
            toast.classList.add('opacity-0'); // Start fade-out
            setTimeout(() => {
                toast.classList.add('hidden'); // Hide after fade-out
            }, 500); // Matches the transition duration
        }

        // Auto-hide the error toast after 7 seconds
        setTimeout(closeErrorToast, 7000);
    </script>
</body>

</html>
