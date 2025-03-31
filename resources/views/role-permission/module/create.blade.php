<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Module</title>
    @include('layouts.icons')
    @vite('resources/css/app.css')
</head>


<body class="flex flex-row  h-screen">
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
            <a href="/user" class="hover:underline">RBAC Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="#" class="hover:underline font-semibold">Modules</a>
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
                <div class="w-32 p-4 text-center">
                    <a href="/permission" class="text-gray-600 hover:text-blue-800">Permissions</a>
                </div>
            </div>

            <div class="flex items-center justify-between p-7">
                <div>
                    <h2 class="font-semibold text-lg text-blue-900">Add New Module</h2>
                    <p class="text-gray-900 text-sm">
                        Administer, assign, and oversee system modules and their
                        configurations.</p>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-red-500">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                          </svg>
                          <p>Alert Modules</p>
                    </span>
                </div>

            </div>

            <form action="/module" method="post" class="flex flex-col p-7 gap-7">
                @csrf

                {{-- Role Details --}}
                <div class="grid grid-cols-10 gap-10 items-start">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Module Details</h1>
                        <p class="text-sm italic text-gray-600">Define module name with description</p>
                    </div>
                    <div class="col-span-6">
                        <div class="flex flex-col gap-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex flex-col justify-center gap-2">
                                    <label for="module_name" class="text-sm font-medium text-blue-900">Module
                                        Name</label>
                                    <input type="text" name="module_name" placeholder=""
                                        class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                                </div>
                            </div>
                            <div class="flex flex-col justify-center gap-2">
                                <label for="module_description"
                                    class="text-sm font-medium text-blue-900">Description</label>
                                <input type="text" name="module_description" placeholder=""
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="border-gray-200">

                {{-- Assign Sub-modules --}}
                <div class="grid grid-cols-10 gap-8 items-start">
                    <!-- Module Details Section -->
                    <div class="col-span-4 space-y-1">
                        <h1 class="text-lg font-semibold text-blue-900">Assign submodule</h1>
                        <p class="text-sm italic text-gray-600">Select sub-modules to define specific functionalities for this module.</p>
                    </div>

                    <!-- Submodule Selection Section -->
                    <div class="col-span-6">
                        <div class="space-y-4">
                            <label for="module_name" class="block text-sm font-medium text-blue-900">Module
                                Name</label>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($submodules as $submodule)
                                    <div
                                        class="flex items-center gap-2 bg-gray-100 border border-gray-300 rounded px-4 py-2">
                                        <input type="checkbox" id="submodule-{{ $submodule->submodule_id }}"
                                            name="submodules[]" value="{{ $submodule->submodule_id }}"
                                            class="rounded border-gray-300 focus:ring-blue-600" />
                                        <label for="submodule-{{ $submodule->submodule_id }}"
                                            class="text-gray-700 text-sm">
                                            {{ $submodule->submodule_name }}
                                        </label>
                                    </div>

                                    {{ $submodules }}
                                @endforeach
                            </div>
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
                                    role</Button>
                            </div>
                        </div>
                    </div>
                </div>


            </form>


        </div>

    </div>

    {{-- <div class="flex flex-col w-full ml-64 overflow-y-auto p-10 h-screen justify-center items-center">
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
        <form action="/module" method="post" enctype="multipart/form-data" class="mx-auto max-w-4xl bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
            @csrf
            <div class="p-6 space-y-6">
                <!-- Heading -->
                <div class="border-b border-gray-200 pb-5">
                    <h1 class="text-xl font-semibold text-gray-800">Add New Module</h1>
                    <p class="text-sm text-gray-500">
                        Register a new system module and assign it with available sub-modules.
                    </p>
                </div>
        
                <!-- Module Name -->
                <div>
                    <label for="module_name" class="block font-medium text-gray-700">Module Name</label>
                    <input type="text" name="module_name" placeholder="Module Name"
                        class="w-full bg-gray-50 border border-gray-300 rounded-md px-4 py-2 mt-1 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
        
                <!-- Module Description -->
                <div>
                    <label for="module_description" class="block font-medium text-gray-700">Description</label>
                    <input type="text" name="module_description" placeholder="Description"
                        class="w-full bg-gray-50 border border-gray-300 rounded-md px-4 py-2 mt-1 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
        
                <!-- Assign a Sub-Module -->
                <div>
                    <label for="module_submodule" class="block font-medium text-gray-700">Select Sub-Modules</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-2">
                        @foreach ($submodules as $submodule)
                        <div class="flex items-center gap-2 bg-gray-50 border border-gray-300 rounded-md px-3 py-2">
                            <input 
                                type="checkbox" 
                                class="rounded border-gray-300 focus:ring-blue-600"
                                name="submodules[]"    
                                value="{{ $submodule->submodule_id }}"
                            />
                            <label for="submodule-{{ $submodule->submodule_id }}" class="text-gray-700">
                                {{ $submodule->submodule_name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
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
    </div> --}}

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
</body>

</html>
