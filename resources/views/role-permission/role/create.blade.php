<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees</title>
    @include("layouts.icons")
    @vite('resources/css/app.css')
</head>

<body class="flex flex-row justify-center items-center h-screen">
    @include('layouts.navbar')
    <div class="flex flex-col w-full h-auto">
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
        <form action="/role" method="post" class="mx-auto max-w-7xl bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
            @csrf
            <div class="text-gray-700 p-8 space-y-6">
                <!-- Heading -->
                <div class="border-b border-gray-200 pb-5">
                    <h1 class="text-xl font-bold uppercase">Add New Role</h1>
                    <p class="text-sm text-gray-600">
                        Register a new role and assign it with organization and access to different system modules.
                    </p>
                </div>
        
                <!-- Role Name -->
                <div>
                    <label for="role_name" class="font-medium">Role Name</label>
                    <input type="text" name="org_name" placeholder="Enter ROle Name"
                        class="w-full bg-gray-100 h-12 rounded border border-gray-300 px-4 mt-1 focus:outline-blue-500">
                </div>
        
                <!-- Select Organization for the Role -->
                <div>
                    <label for="role_org" class="font-medium">Select Organization</label>
                    <select name="org_name"
                        class="w-full bg-gray-100 h-12 rounded border border-gray-300 px-4 mt-1 focus:outline-blue-500">
                        <option value="IT">IT</option>
                    </select>
                </div>
        
                <!-- Select Permission to the Role -->
                <div>
                    <label for="role_permissions" class="font-medium">Select Permission</label>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-6 py-3">Modules</th>
                                    <th class="border border-gray-300 px-6 py-3">Sub-Module</th>
                                    <th class="border border-gray-300 px-6 py-3">Privileges</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dashboard -->
                                <tr>
                                    <td class="border border-gray-300 px-6 py-3 font-semibold" rowspan="2">Dashboard</td>
                                    <td class="border border-gray-300 px-6 py-3">Sub-module 1</td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        <div class="flex gap-2">
                                            <label><input type="checkbox"> View</label>
                                            <label><input type="checkbox"> Edit</label>
                                            <label><input type="checkbox"> Delete</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-6 py-3">Sub-module 2</td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        <div class="flex gap-2">
                                            <label><input type="checkbox"> View</label>
                                            <label><input type="checkbox"> Edit</label>
                                            <label><input type="checkbox"> Delete</label>
                                        </div>
                                    </td>
                                </tr>
                                <!-- User Management -->
                                <tr>
                                    <td class="border border-gray-300 px-6 py-3 font-semibold" rowspan="2">User Management</td>
                                    <td class="border border-gray-300 px-6 py-3">Sub-module 1</td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        <div class="flex gap-2">
                                            <label><input type="checkbox"> View</label>
                                            <label><input type="checkbox"> Edit</label>
                                            <label><input type="checkbox"> Delete</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-300 px-6 py-3">Sub-module 2</td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        <div class="flex gap-2">
                                            <label><input type="checkbox"> View</label>
                                            <label><input type="checkbox"> Edit</label>
                                            <label><input type="checkbox"> Delete</label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        
                <!-- Submit Button -->
                <button type="submit"
                    class="mt-6 w-full bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition duration-200">
                    Create
                </button>
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
    </script>
</body>


</html>