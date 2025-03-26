<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create User</title>
    @include('layouts.icons')
    @vite('resources/css/app.css')
</head>

<body class="flex flex-row min-h-screen">
    @include('layouts.navbar')
    <div class="flex flex-1 flex-col ml-64 overflow-y-auto p-10 gap-7">
        @if ($errors->any())
            <div id="toast-error"
                class="fixed top-5 right-5 z-50 flex flex-col w-full max-w-xs p-4 text-red-500 bg-white border border-red-300 rounded-lg shadow-sm transition-opacity duration-500 ease-in-out opacity-100 dark:bg-red-900 dark:text-red-200"
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
            <a href="/user" class="hover:underline">Users</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="#" class="hover:underline font-semibold">Edit User</a>
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
                <div class="w-32 border-b-2 border-blue-900 p-4 text-center">
                    <a href="#" class="font-semibold text-blue-900 ">Users</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/organization" class="text-gray-600 hover:text-blue-800">Organizations</a>
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

            <div class="flex flex-col px-7 pt-7 pb-4">
                <h1 class="font-semibold text-blue-900">Update User Information for <span
                        class="text-blue-900">{{ $employee->employee_firstname }}
                        {{ $employee->employee_lastname }}</span></h1>

                <p class="text-gray-900 text-sm">Change user's information or re-assigned it to different organization
                    or roles.</p>

            </div>

            <form action="{{ url('user/' . $user->user_id) }}" method="post" class="flex flex-col p-7 gap-7">
                @csrf
                @method('PUT')

                {{-- Hidden Input for Employee ID --}}
                <input type="hidden" value="{{ $employee->employee_id }}" name="employee_id" placeholder="Employee ID"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">


                {{-- Employee Name --}}
                <div class="grid grid-cols-10 items-center gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Employee Full Name</h1>
                        <p class="text-sm italic text-gray-500">The information indicated here are from the employee
                            database. If you want to change it, go to <a href="/employee"
                                class="font-semibold underline">Employee Management</a>.</p>
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-3 justify-between gap-2">
                            <div class="flex flex-col justify-center gap-2">
                                <label for="employee_firstname" class="text-sm font-medium text-blue-900">First
                                    Name</label>
                                <input disabled type="text" value="{{ $employee->employee_firstname }}"
                                    name="employee_firstname" placeholder="First Name"
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                            <div class="flex flex-col justify-center gap-2">
                                <label for="employee_middlename" class="text-sm font-medium text-blue-900">Middle
                                    Name</label>
                                <input disabled type="text" value="{{ $employee->employee_middlename }}"
                                    name="employee_firstname" placeholder="First Name"
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                            <div class="flex flex-col justify-center gap-2">
                                <label for="employee_lastname" class="text-sm font-medium text-blue-900">Last
                                    Name</label>
                                <input disabled type="text" value="{{ $employee->employee_lastname }}"
                                    name="employee_firstname" placeholder="First Name"
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="border-gray-200">

                {{-- Username --}}
                <div class="grid grid-cols-10 items-center gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Update Username</h1>
                        <p class="text-sm italic text-gray-600">Update username with unique alphanumeric
                            combinations.</p>
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-3 justify-between gap-2">
                            <div class="flex flex-col justify-center gap-2">
                                <label for="user_username" class="text-sm font-medium text-blue-900">Username</label>
                                <input type="text" value="{{ $user->user_name }}" name="user_name"
                                    placeholder="e.g. username1213"
                                    class="h-10 rounded border border-gray-300 bg-gray-100 px-3 text-sm focus:outline-blue-500" />
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-200">

                {{-- Organization and Role --}}
                <div class="grid grid-cols-10 items-center gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Reassign to Another Organization or Role</h1>
                        <p class="text-sm italic text-gray-600">Change the user's assigned organization or role.</p>
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-3 justify-between gap-2">
                            <div class="flex flex-col gap-2">
                                <label for="user_org" class="text-sm font-medium text-blue-900">Organization</label>
                                <select name="org_id" id="organization_dropdown"
                                    class="h-10 rounded border border-gray-300 bg-gray-100 px-3 text-sm focus:outline-blue-50 pr-8">
                                    @foreach ($org_with_roles as $orgs)
                                        <option value="{{ $orgs->org_id }}"
                                            {{ old('org_id', $orgs->org_id) == $user->org_id ? 'selected' : '' }}>
                                            {{ $orgs->org_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="user_role" class="text-sm font-medium text-blue-900">Role</label>
                                <select id="role_dropdown" name="role_id"
                                    class="h-10 rounded border border-gray-300 bg-gray-100 px-3 text-sm focus:outline-blue-50 pr-8">
                                    <option value="">Select an organization first</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-200">


                {{-- Password --}}

                <div class="grid grid-cols-10 items-center gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Change Password</h1>
                        <p class="text-sm italic text-gray-600">Must be 6 to 12 characters long, including letters,
                            numbers, and at least one special character.</p>
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-3 justify-between gap-2">
                            <div class="flex flex-col justify-center gap-2">
                                <label for="user_password" class="text-sm font-medium text-blue-900">Password</label>
                                <input type="password" value="" name="user_password"
                                    class="h-10 rounded border border-gray-300 bg-gray-100 px-3 text-sm focus:outline-blue-500" />
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-200">


                {{-- Set Status --}}

                <div class="grid grid-cols-10 items-center gap-10">
                    <div class="col-span-4">
                        <div class="flex gap-2 items-center">
                            <h1 class="font-medium text-blue-900">Set Status</h1>
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 text-blue-900">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd" />
                            </svg> --}}                
                        </div>
                        <p class="text-sm italic text-gray-600">
                            Set the user as active or inactive. 
                        </p>
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-3 justify-between gap-2">
                            <div class="flex flex-col justify-center gap-2">
                                <label for="user_status" class="text-sm font-medium text-blue-900">Status</label>
                                <label class="inline-flex items-center cursor-pointer"> 
                                    <input type="hidden" name="user_status" value="0"> 
                                    <input type="checkbox" name="user_status" id="user_status" class="sr-only peer toggle-checkbox"
                                    {{ old('user_status', $user->user_status) == 1 ? 'checked' : '' }}
                                    value="1" onchange="this.value = this.checked ? 1 : 0">
                                    <div
                                        class="relative w-14 h-8 bg-gray-200 rounded-full 
                                                dark:bg-gray-700 
                                                peer 
                                                peer-checked:bg-green-600 
                                                dark:peer-checked:bg-green-600 
                                                peer-checked:after:translate-x-full 
                                                after:content-[''] 
                                                after:absolute 
                                                after:top-1 
                                                after:start-[4px] 
                                                after:w-6 
                                                after:h-6 
                                                after:bg-white 
                                                after:border 
                                                after:border-gray-300 
                                                after:rounded-full">
                                    </div>
                                    <span
                                        class="toggle-label ms-3 font-medium text-sm text-gray-600 dark:text-gray-300">
                                        {{ old('user_status', $user->user_status) == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </label>



                            </div>
                        </div>
                    </div>
                </div>


                {{-- Button --}}
                <div class="grid grid-cols-10 items-center pt-8 gap-10">
                    <div class="col-span-4">
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-3 justify-between gap-2">
                            <div class="flex flex-col justify-center gap-2">
                                <Button type="submit"
                                    class="w-36 bg-blue-900 text-white px-3 py-2 rounded-lg hover:bg-blue-800">Update</Button>
                            </div>
                        </div>
                    </div>
                </div>




            </form>


        </div>
    </div>

    <script>
        document.querySelector('.toggle-checkbox').addEventListener('change', function() {
            const labelElement = this.closest('label').querySelector('.toggle-label');
            labelElement.textContent = this.checked ? 'Active' : 'Inactive';
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Store all organization roles
            const orgRoles = @json($org_with_roles);
            const userRoleId = @json($user->role_id); // Get user's assigned role ID

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

                if (selectedOrg && selectedOrg.roles && selectedOrg.roles.length > 0) {
                    // Add each role as an option
                    selectedOrg.roles.forEach(role => {
                        const option = document.createElement('option');
                        option.value = role.role_id;
                        option.textContent = role.role_name;

                        // ✅ Pre-select the option if it matches the user's role
                        if (role.role_id == userRoleId) {
                            option.selected = true;
                        }

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
