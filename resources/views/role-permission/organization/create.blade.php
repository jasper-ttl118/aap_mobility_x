<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organizations</title>
    @include("layouts.icons")
    @vite('resources/css/app.css')
</head>


<body class="flex flex-row h-screen">
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
        <form action="/organization" method="post" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
            @csrf
            <div class="p-6 space-y-6">
                <!-- Heading -->
                <div class="border-b border-gray-200 pb-5">
                    <h1 class="text-xl font-semibold text-gray-800">Add New Organization</h1>
                    <p class="text-sm text-gray-500">
                        Register a new company organization for managing user access and roles.
                    </p>
                </div>
        
                <!-- Organization Name -->
                <div>
                    <label for="org_name" class="block font-medium text-gray-700">Organization Name</label>
                    <input type="text" name="org_name" placeholder="Organization Name"
                        class="w-full bg-gray-50 border border-gray-300 rounded-md px-4 py-2 mt-1 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
        
                <!-- Organization Description -->
                <div>
                    <label for="org_description" class="block font-medium text-gray-700">Description</label>
                    <input type="text" name="org_description" placeholder="Description"
                        class="w-full bg-gray-50 border border-gray-300 rounded-md px-4 py-2 mt-1 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
        
                <!-- Upload Logo -->
                <div class="flex items-center gap-4">
                    <div class="shrink-0">
                        <img id='preview_img' class="h-40 w-40 object-cover rounded-md" src="{{ asset('build/assets/img_placeholder.png') }}" alt="Current profile photo" />
                    </div>
                    <div class="flex flex-col w-full">
                        <label for="org_Logo" class="block font-medium text-gray-700">Upload Organization Logo</label>
                        <input type="file" name="org_logo" onchange="loadFile(event)" class="h-10 w-full font-normal bg-gray-50 border border-gray-300 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:bg-gray-200 file:text-gray-500 mt-1 cursor-pointer file:cursor-pointer"/>
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