<x-app-layout class='flex flex-row w-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='Employee Management'>
    {{-- @include('layouts.navbar') --}}

    <div class="flex flex-1 flex-col ml-64 overflow-y-auto p-10 gap-7">

        @if (session('status'))
            <div id="toast-success"
                class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 text-gray-500 border-2 border-gray-200 bg-white rounded-lg shadow-md transition-opacity duration-500 ease-in-out opacity-100"
                role="alert">
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
                <button type="button" onclick="closeToast()"
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

        <!-- Breadcrumbs-->
        <div class="flex items-center gap-x-1 text-blue-900 text-sm">
            <a href="/employee" class="hover:underline">Employee Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="#" class="hover:underline font-semibold">Employee Alphalist</a>
        </div>

        <!-- Title and Subtitle -->
        <div class="">
            <h1 class="text-2xl font-semibold text-blue-900">Employee Alphalist</h1>
            <p class="text-gray-700 text-sm"> Manage employees of Automobile Association of the Philippines</p>
        </div>

        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 bg-gray-50">
            <div class="flex h-14 border-b border-gray-200">
                <div class="w-32 border-b-2 border-blue-900 p-4 text-center">
                    <a href="#" class="font-semibold text-blue-900 ">Alphalist</a>
                </div>
                {{-- <div class="w-32 p-4 text-center">
                    <a href="/organization" class="text-gray-600 hover:text-blue-800">Organizations</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/role" class="text-gray-600 hover:text-blue-800">Roles</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/module" class="text-gray-600 hover:text-blue-800">Modules</a>
                </div> --}}
                {{-- <div class="w-32 p-4 text-center">
                    <a href="/permission" class="text-gray-600 hover:text-blue-800">Permissions</a>
                </div> --}}
            </div>

            <div class="flex items-center justify-between p-7">
                <div>
                    <h2 class="font-semibold text-lg text-blue-900">Manage AAP Employees</h2>
                    <p class="text-gray-900 text-sm">Create, update, and delete employee details.</p>
                </div>

                {{-- Add Employee --}}
                <div>
                    <a href="employee/create"
                        class="flex items-center gap-2 rounded-md bg-blue-900 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add New Employee
                    </a>
                </div>

            </div>

            <div class="mx-7 mb-10 rounded-sm">
                <table class="w-full text-center text-sm text-gray-500">
                    <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                        <tr>    
                            <th scope="col" class="w-[6.25%] py-3">Employee ID</th>
                            <th scope="col" class="w-[19.0%] py-3">Name</th>
                            <th scope="col" class="w-[12.5%] py-3">Email</th>
                            <th scope="col" class="w-[12.5%] py-3">Contact Number</th>
                            <th scope="col" class="w-[12.5%] py-3">Department</th>
                            <th scope="col" class="w-[12.5%]o py-3">Position</th>
                            <th scope="col" class="w-[12.5%] py-3">Status</th>
                            <th scope="col" class="w-[12.5%] py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr class="border-b border-gray-200 bg-white">
                                <th scope="row" class="w-[12.5%] py-4 font-medium whitespace-nowrap text-gray-900">
                                    {{ $employee->employee_id }}</th>
                                <td class="w-[12.5%] py-4  text-gray-900">{{ $employee->employee_firstname }}
                                    {{ $employee->employee_lastname }}</td>
                                <td class="w-[12.5%] py-4  text-gray-900">{{ $employee->employee_email }}</td>
                                <td class="w-[12.5%] py-4  text-gray-900">{{ $employee->employee_contact_number }}</td>
                                <td class="w-[12.5%] py-4  text-gray-900">{{ $employee->employee_department }}</td>
                                <td class="w-[12.5%] py-4  text-gray-900">{{ $employee->employee_position }}</td>
                                <td class="w-[12.5%] py-4  text-gray-900">
                                    @if ($employee->employee_status == '1')
                                        <span
                                            class="bg-green-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">Active</span>
                                    @else
                                        <span
                                            class="bg-red-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">Inactive</span>
                                    @endif
                                </td>
                                <td class="w-[12.5%] py-4">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                        <a @click="viewOpen = true; employee = {{ json_encode($employee) }}"
                                            class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4">
                                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>

                                        <a href="{{ url('employee/' . $employee->employee_id . '/edit') }}"
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
                                            @click="open = true; deleteUrl = '{{ url('employee/' . $employee->employee_id . '/delete') }}'"
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

    <!-- View Employee Modal -->
    <div x-cloak x-data="{ open: false }">
        <!-- Overlay -->
        <div x-show="viewOpen" class="fixed inset-0 bg-black bg-opacity-50 z-40" @click="viewOpen = false"></div>

        <!-- Modal Content -->
        <div x-show="viewOpen" x-transition class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">
                <!-- Modal Header -->
                <div class="flex justify-between items-center border-b pb-3">
                    <h2 class="text-xl font-semibold">Employee Details</h2>
                    <button @click="viewOpen = false" class="text-gray-400 hover:text-gray-600">
                        &#10005;
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="text-gray-700 p-4 space-y-4">
                    <!-- Employee Name -->
                    <div>
                        <label class="font-medium">Employee Name</label>
                        <p class="mt-1"
                            x-text="employee.employee_firstname + ' ' + employee.employee_middlename + ' ' + employee.employee_lastname">
                        </p>
                    </div>

                    <!-- Contact Number -->
                    <div>
                        <label class="font-medium">Contact Number</label>
                        <p class="mt-1" x-text="employee.employee_contact_number"></p>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="font-medium">Email</label>
                        <p class="mt-1" x-text="employee.employee_email"></p>
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="font-medium">Address</label>
                        <p class="mt-1" x-text="employee.employee_address"></p>
                    </div>

                    <!-- Department & Position -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="font-medium">Department</label>
                            <p class="mt-1" x-text="employee.employee_department"></p>
                        </div>
                        <div>
                            <label class="font-medium">Position</label>
                            <p class="mt-1" x-text="employee.employee_position"></p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="font-medium">Status</label>
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-medium"
                            :class="employee.employee_status == '1' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'"
                            x-text="employee.employee_status == '1' ? 'Active' : 'Inactive'"></span>
                    </div>

                    <!-- Created At -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="font-medium">Created At</label>
                            <p class="mt-1" x-text="new Date(employee.employee_date_created).toLocaleString()"></p>
                        </div>
                        <div>
                            <label class="font-medium">Updated At</label>
                            <p class="mt-1" x-text="new Date(employee.employee_date_updated).toLocaleString()"></p>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-end gap-2 border-t pt-3">
                    <button @click="viewOpen = false" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-cloak id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50"
        x-show="open">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6 dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Confirm Deletion</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                Are you sure you want to delete this employee? This action cannot be undone.
            </p>
            <div class="mt-4 flex justify-end space-x-3">
                <button @click="open = false"
                    class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                    Cancel
                </button>
                <form id="delete-form" :action="deleteUrl" method="POST">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- toggle button status --}}
    <script>
        function closeToast() {
            const toast = document.getElementById('toast-success');
            toast.classList.add('opacity-0'); // Trigger fade-out animation
            setTimeout(() => {
                toast.classList.add('hidden'); // Hide after fade-out
            }, 500); // Wait for animation to complete (500ms)
        }

        // Auto-hide the toast after 5 seconds
        setTimeout(closeToast, 10000);

        function openModal(deleteUrl) {
        console.log("click delete");
            document.getElementById("delete-form").setAttribute("action", deleteUrl);
            document.getElementById("delete-modal").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("delete-modal").classList.add("hidden");
        }
    </script>
    
</x-app-layout>

{{-- <body class="flex flex-row h-screen" x-data="{ open: false, deleteUrl: '', viewOpen: false, employee: {} }">
    @php

        $navbar_selected = 'Employee Management';
        $user = auth()->user()->load('roles.submodules');

        $submodules = $user->roles
            ->flatMap(function ($role) {
                return $role->submodules->map(function ($submodule) use ($role) {
                    return [
                        'submodule_name' => $submodule->submodule_name,
                        'permissions' => $submodule
                            ->permissionsForRole($role->role_id)
                            ->pluck('permission_name')
                            ->toArray(),
                    ];
                });
            })
            ->unique('submodule_name')
            ->values();

    @endphp
    @include('layouts.navbar')
    <div
        class="flex flex-col w-full ml-64 overflow-y-auto p-10 h-screen justify-center items-center bg-[url('/public/build/assets/bgdiv.jpg')] bg-cover bg-center">
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
        @if ($submodules->contains(fn($submodule) => $submodule['submodule_name'] === 'List of Employees Table' && in_array('View', $submodule['permissions'])))
            <div class="w-full m-10 rounded-md border bg-white border-gray-100 p-5 shadow shadow-gray-300">
                <div class="flex justify-between items-center p-5">
                    <h1 class="text-2xl font-bold">List of Employees</h1>
                    @if ($submodules->contains(fn($submodule) => $submodule['submodule_name'] === 'List of Employees Table' && in_array('Add', $submodule['permissions'])))
                        <a href="employee/create"
                            class="flex uppercase rounded-lg items-center bg-blue-900 p-3 text-xs font-bold text-white hover:bg-indigo-800">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="size-6">
                                <path fill-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Add New Employee
                        </a>
                    @endif
                </div>
                <table class="w-full text-center text-sm text-gray-500">
                    <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                        <tr>
                            <th scope="col" class="px-auto py-3">Employee ID</th>
                            <th scope="col" class="px-auto py-3">Name</th>
                            <th scope="col" class="px-auto py-3">Email</th>
                            <th scope="col" class="px-auto py-3">Contact Number</th>
                            <th scope="col" class="px-auto py-3">Department</th>
                            <th scope="col" class="px-auto py-3">Position</th>
                            <th scope="col" class="px-auto py-3">Status</th>
                            <th scope="col" class="px-auto py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr class="border-b border-gray-200 bg-white">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-gray-900">
                                    {{ $employee->employee_id }}</th>
                                <td class="px-auto py-4  text-gray-900">{{ $employee->employee_firstname }}
                                    {{ $employee->employee_lastname }}</td>
                                <td class="px-auto py-4  text-gray-900">{{ $employee->employee_email }}</td>
                                <td class="px-auto py-4  text-gray-900">{{ $employee->employee_contact_number }}</td>
                                <td class="px-auto py-4  text-gray-900">{{ $employee->employee_department }}</td>
                                <td class="px-auto py-4  text-gray-900">{{ $employee->employee_position }}</td>
                                <td class="px-auto py-4  text-gray-900">
                                    @if ($employee->employee_status == '1')
                                        <span
                                            class="bg-green-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">Active</span>
                                    @else
                                        <span
                                            class="bg-red-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-auto py-4">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                        <a @click="viewOpen = true; employee = {{ json_encode($employee) }}"
                                            class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4">
                                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        @if ($submodules->contains(fn($submodule) => $submodule['submodule_name'] === 'List of Employees Table' && in_array('Edit', $submodule['permissions'])))
                                            <a href="{{ url('employee/' . $employee->employee_id . '/edit') }}"
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
                                        @endif
                                        @if ($submodules->contains(fn($submodule) => $submodule['submodule_name'] === 'List of Employees Table' && in_array('Delete', $submodule['permissions'])))
                                            <a href="javascript:void(0)"
                                                @click="open = true; deleteUrl = '{{ url('employee/' . $employee->employee_id . '/delete') }}'"
                                                class="flex items-center gap-1 font-medium text-red-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-4">
                                                    <path fill-rule="evenodd"
                                                        d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- View Employee Modal -->
    <div x-data="{ open: false }">
        <!-- Overlay -->
        <div x-show="viewOpen" class="fixed inset-0 bg-black bg-opacity-50 z-40" @click="viewOpen = false"></div>

        <!-- Modal Content -->
        <div x-show="viewOpen" x-transition class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">
                <!-- Modal Header -->
                <div class="flex justify-between items-center border-b pb-3">
                    <h2 class="text-xl font-semibold">Employee Details</h2>
                    <button @click="viewOpen = false" class="text-gray-400 hover:text-gray-600">
                        &#10005;
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="text-gray-700 p-4 space-y-4">
                    <!-- Employee Name -->
                    <div>
                        <label class="font-medium">Employee Name</label>
                        <p class="mt-1"
                            x-text="employee.employee_firstname + ' ' + employee.employee_middlename + ' ' + employee.employee_lastname">
                        </p>
                    </div>

                    <!-- Contact Number -->
                    <div>
                        <label class="font-medium">Contact Number</label>
                        <p class="mt-1" x-text="employee.employee_contact_number"></p>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="font-medium">Email</label>
                        <p class="mt-1" x-text="employee.employee_email"></p>
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="font-medium">Address</label>
                        <p class="mt-1" x-text="employee.employee_address"></p>
                    </div>

                    <!-- Department & Position -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="font-medium">Department</label>
                            <p class="mt-1" x-text="employee.employee_department"></p>
                        </div>
                        <div>
                            <label class="font-medium">Position</label>
                            <p class="mt-1" x-text="employee.employee_position"></p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="font-medium">Status</label>
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-medium"
                            :class="employee.employee_status == '1' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'"
                            x-text="employee.employee_status == '1' ? 'Active' : 'Inactive'"></span>
                    </div>

                    <!-- Created At -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="font-medium">Created At</label>
                            <p class="mt-1" x-text="new Date(employee.employee_date_created).toLocaleString()"></p>
                        </div>
                        <div>
                            <label class="font-medium">Updated At</label>
                            <p class="mt-1" x-text="new Date(employee.employee_date_updated).toLocaleString()"></p>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-end gap-2 border-t pt-3">
                    <button @click="viewOpen = false" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50"
        x-show="open">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6 dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Confirm Deletion</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                Are you sure you want to delete this role? This action cannot be undone.
            </p>
            <div class="mt-4 flex justify-end space-x-3">
                <button @click="open = false"
                    class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                    Cancel
                </button>
                <form id="delete-form" :action="deleteUrl" method="POST">
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
</body> --}}
