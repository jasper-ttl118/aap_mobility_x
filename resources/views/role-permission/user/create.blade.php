<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create User</title>
    @include("layouts.icons")
    @vite('resources/css/app.css')
</head>
    <body class="flex flex-row h-screen">
        @include('layouts.navbar')
        <div class="flex flex-col w-full ml-64 overflow-y-auto p-10 h-screen justify-center items-center">
            @if ($errors->any())
                <div id="toast-error" class="fixed top-5 right-5 z-50 flex flex-col w-full max-w-xs p-4 text-red-500 bg-white border border-red-300 rounded-lg shadow-sm transition-opacity duration-500 ease-in-out opacity-100 dark:bg-red-900 dark:text-red-200" role="alert">
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
            <form form action="/user" method="post" class="w-full">
                @csrf
                <div class="text-gray-700 m-20 flex flex-col gap-2">
                    <div class="flex flex-col pb-5 mb-5 border-b-2 border-gray-200">
                        <h1 class="text-lg font-bold uppercase">add user as <span class="text-blue-800">{{$employee->employee_firstname}} {{$employee->employee_lastname}}</span></h1>
                        <p class="text-sm">Register company employee as a system user.</p>
                    </div>

                    <!-- Employee Name -->
                    <div class="mt-4">
                        <label for="employee_fullname" class="font-medium">Employee Name</label>
                        <div class="flex gap-2 mt-1">
                            <input type="hidden" value="{{ $employee->employee_id }}" name="employee_id" placeholder="Employee ID" class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                            <input disabled type="text" value="{{ $employee->employee_firstname }}" name="employee_firstname" placeholder="First Name" class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                            <input disabled type="text" value="{{ $employee->employee_middlename }}" name="employee_middlename" placeholder="Middle Name" class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                            <input disabled type="text" value="{{ $employee->employee_lastname }}" name="employee_lastname" placeholder="Last Name" class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                        </div>
                    </div>
            
                    <!-- Username -->
                    <div class="mt-4">
                        <label for="user_name" class="font-medium">Username</label>
                        <input type="text" name="user_name" placeholder="Enter unique username" class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                    </div>
            
                    <!-- Organization -->
                    <div class="mt-4">
                        <label for="role_org" class="font-medium">Assign to an Organization</label>
                        <select name="org_id" id="organization_dropdown"
                            class="w-full bg-gray-100 h-12 rounded border border-gray-300 px-4 mt-1 focus:outline-blue-500">
                            @foreach ($org_with_roles as $orgs)
                                <option value="{{ $orgs->org_id }}">{{ $orgs->org_name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <!-- Role Dropdown (will be populated based on organization selection) -->
                    <div class="mt-4">
                        <label for="role_id" class="font-medium">Assign a Role</label>
                        <select id="role_dropdown" name="role_id" class="w-full bg-gray-100 h-12 rounded border border-gray-300 px-4 mt-1 focus:outline-blue-500">
                            <option value="">Select an organization first</option>
                        </select>
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="font-medium">Password</label>
                        <input type="password" name="user_password" placeholder="Enter password" class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                    </div>

                    <Button type="submit" class="mt-10 bg-blue-800 text-white px-3 py-2 rounded-lg hover:bg-blue-900">Add User</Button>
                </div>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Store all organization roles
                const orgRoles = @json($org_with_roles);
                
                // Get the dropdowns
                const orgDropdown = document.getElementById('organization_dropdown');
                const roleDropdown = document.getElementById('role_dropdown');
                
                // Function to update roles based on selected organization
                function updateRoles() {
                    // Clear current options
                    roleDropdown.innerHTML = '';
                    
                    // Get selected organization ID
                    const selectedOrgId = orgDropdown.value;
                    
                    // Find the selected organization in our data
                    const selectedOrg = orgRoles.find(org => org.org_id == selectedOrgId);
                    
                    // If organization found and has roles
                    if (selectedOrg && selectedOrg.roles && selectedOrg.roles.length > 0) {
                        // Add each role as an option
                        selectedOrg.roles.forEach(role => {
                            const option = document.createElement('option');
                            option.value = role.role_id;
                            option.textContent = role.role_name;
                            roleDropdown.appendChild(option);
                        });
                    } else {
                        // No roles available
                        const option = document.createElement('option');
                        option.value = "";
                        option.textContent = "No roles available for this organization";
                        roleDropdown.appendChild(option);
                    }
                }
                
                // Update roles when page loads
                updateRoles();
                
                // Update roles when organization selection changes
                orgDropdown.addEventListener('change', updateRoles);
            });
        </script>

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