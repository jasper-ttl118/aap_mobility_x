<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organizations</title>
    @include('layouts.icons')
    @vite('resources/css/app.css')
</head>


<body class="flex flex-row min-h-screen">
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

        <div class="flex items-center gap-x-1 text-blue-900 text-sm">
            <a href="/user" class="hover:underline">RBAC Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="/organization" class="hover:underline">Organizations</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="#" class="hover:underline font-semibold">Add Organization</a>
        </div>

        <!-- Title and Subtitle -->
        <div class="">
            <h1 class="text-2xl text-blue-900 font-semibold">RBAC Management</h1>
            <p class="text-gray-700 text-sm"> Manage user access and permissions within the
                organization.</p>
        </div>

        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 bg-gray-50">
            <div class="flex h-14 border-b border-gray-200">
                <div class="w-32 p-4 text-center">
                    <a href="/user" class="text-gray-600 hover:text-blue-800">Users</a>
                </div>
                <div class="w-32 border-b-2 border-blue-900 p-4 text-center">
                    <a href="/organization" class="font-semibold text-blue-900">Organizations</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/role" class="text-gray-600 hover:text-blue-800">Roles</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/module" class="text-gray-600 hover:text-blue-800">Modules</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/permission" class="text-gray-600 hover:text-blue-800">Permissions</a>
                </div>
            </div>

            <div class="flex flex-col px-7 pt-7 pb-3">
                <h1 class="font-semibold text-lg text-blue-900">Add New Organization</h1>
                <p class="text-gray-900 text-sm">Set up your organization.</p>

            </div>

            <form action="/organization" method="post" enctype="multipart/form-data" class="flex flex-col p-7 gap-7">
                @csrf


                {{-- Organization Name --}}
                <div class="grid grid-cols-10 gap-10 items-start">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Organization Details</h1>
                        <p class="text-sm italic text-gray-600">Create a unique organization name with description</p>
                    </div>
                    <div class="col-span-6">
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col justify-center gap-2">
                                <label for="org_name" class="text-sm font-medium text-blue-900">Organization
                                    Name</label>
                                <input type="text" name="org_name" placeholder=""
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                            <div class="flex flex-col justify-center gap-2">
                                <label for="org_description"
                                    class="text-sm font-medium text-blue-900">Description</label>
                                <input type="text" name="org_description" placeholder=""
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="border-gray-200">

                <div class="grid grid-cols-10 items-start gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Customize with Color</h1>
                        <p class="text-sm italic text-gray-600">Select a color to customize its badges, container,
                            etc. across all the users</p>
                    </div>
                    <div class="col-span-6">
                        <div class="">
                            <div class="flex flex-col gap-2">
                                <label for="user_org" class="text-sm font-medium text-blue-900">Select Color</label>
                                <div class="flex gap-2">
                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            value="bg-red-500 text-red-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-red-500 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            value="bg-orange-500 text-orange-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-orange-500 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            value="bg-amber-500 text-amber-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-amber-500 text-orange-900 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            value="bg-lime-500 text-lime-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-lime-500 text-green-900 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            value="bg-teal-500 text-teal-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-teal-500 text-teal-50 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            value="bg-sky-500 text-sky-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-sky-500 text-sky-50 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            value="bg-indigo-500 text-indigo-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-indigo-500 text-indigo-50 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            value="bg-fuchsia-500 text-fuchsia-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-fuchsia-500 text-fuchsia-50 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            value="bg-rose-500 text-rose-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-rose-500 text-rose-50 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            value="bg-slate-500 text-slate-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-slate-500 text-slate-50 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="border-gray-200">

                {{-- Username --}}
                <div class="grid grid-cols-10 items-start gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Upload Organization Logo</h1>
                        <p class="text-sm italic text-gray-600">The file upload only allows image types like jpg, jpeg,
                            png, and gif </p>
                    </div>
                    <div class="col-span-6">
                        <div class="flex flex-col justify-between gap-4">
                            <div class="flex flex-col items start gap-2">
                                <label for="org_logo" class="text-sm font-medium text-blue-900">Upload Logo</label>
                                <input type="file" name="org_logo" onchange="loadFile(event)"
                                    class="rounded border border-gray-300 bg-gray-100 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:bg-gray-200 file:text-gray-500 cursor-pointer file:cursor-pointer" />
                            </div>
                            <div class="flex flex-col items-start gap-2 shrink-0">
                                <label for="org_logo_preview" class="text-sm font-medium text-blue-900"
                                    accept="image/*">Preview</label>
                                <img id='preview_img' class="object-contain rounded w-full h-80 bg-gray-200"
                                    src="{{ asset('build/assets/img_placeholder.png') }}"
                                    alt="Current profile photo" />
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
                                    Organization</Button>
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
