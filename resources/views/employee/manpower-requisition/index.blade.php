<x-app-layout class='flex flex-row w-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='Employee Management'>
    {{-- @include('layouts.navbar') --}}

    <div x-data="{ selected : 'pending', open_add : false, open_delete : false, open_view : false, open_edit : false}" 
        class="flex flex-1 flex-col lg:ml-52 overflow-y-auto p-10 gap-7 mt-12 bg-[#f3f4f6]">
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

        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg overflow-x-auto hide-scrollbar flex-shrink-0">
            <div class="flex h-14">
                <div class="group hover:border-b-2 w-32 p-4 text-center">
                    <a href="/employee" class="text-gray-600 hover:text-gray-600 font-inter">Alphalist</a>
                </div>
                <div class="flex-none w-auto border-b-2 border-blue-900 p-4 text-center">
                    <a href="{{ route('manpower-requisition') }}" class="font-semibold text-[#071d49]">Manpower Requisition</a>
                </div>
                <div class="group hover:border-b-2 flex-none w-auto p-4 text-center">
                    <a href="{{ route('vacancy-list') }}" class="text-gray-600 hover:text-gray-600 font-inter">Vacancy List</a>
                </div>
            </div>
        </div>

        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-row justify-between">
                 {{-- Breadcrumbs --}}
                <div class="flex items-center gap-x-1 text-[#071d49] text-sm px-7 pt-5">
                    <a href="/employee" class="hover:underline truncate">Employee Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="hover:underline font-semibold truncate">Manpower Requisition</a>
                </div>
                 {{-- Top-right: Toggle + Add Buttons --}}
                <div class="flex justify-end px-7 pt-6">
                    <div class="flex items-center gap-4">
                         {{-- Toggle  --}}
                        <div class="flex border border-[#151847] rounded-md overflow-hidden w-[220px] h-[30px]">
                            <a @click="selected='pending'"
                            class="w-1/2 text-xs uppercase font-semibold flex items-center justify-center transition duration-150 cursor-pointer"
                            :class="selected === 'pending' ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white'">
                                Pending
                            </a>
                            <a @click="selected='approved'"
                            class="w-1/2 text-xs uppercase font-semibold flex items-center justify-center transition duration-150 cursor-pointer"
                            :class="selected === 'approved' ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white'">
                                Approved
                            </a>
                            <a @click="selected='rejected'"
                            class="w-1/2 text-xs uppercase font-semibold flex items-center justify-center transition duration-150 cursor-pointer"
                            :class="selected === 'rejected' ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white'">
                                Rejected
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        
            <div class="flex items-center justify-between px-7 py-6">
                <div>
                    <h2 class="font-semibold text-lg text-[#071d49]" x-text="selected === 'employees' ? 'Manage AAP Employees' : 'Manage OJT Interns' "></h2>
                    <p class="text-gray-900 text-sm" x-text="selected === 'employees' ? 'Create, update, and delete employee details.' : 'Create, update, and delete OJT intern details.' "></p>
                </div>

                <div class="flex items-center gap-4">

                    <a x-show="selected == 'employees'" @click="open_add=true" 
                    :class="selected == 'employees' ? 'text-white bg-[#071d49] hover:bg-[#abcae9] hover:text-[#071d49] hover:font-medium' : 'text-[#071d49] bg-[#abcae9] hover:bg-[#071d49] hover:text-white'"
                    class="flex cursor-pointer items-center gap-2 rounded-md  px-4 py-2 text-sm font-medium focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Create Requisition Request
                    </a>

                </div>
            </div>

            {{-- List of Employees --}}
            <div class="mx-7 mb-10 rounded-sm overflow-x-auto hide-scrollbar">
                 {{-- <livewire:employee.employee-table :$employees> --}}
                <table class="w-[800px] lg:w-full text-center text-sm text-gray-500">
                    <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                        <tr>    
                            <th scope="col" class=" py-3">Ticket ID</th>
                            <th scope="col" class=" py-3">Job Position</th>
                            <th scope="col" class=" py-3">Requisition Type</th>
                            <th scope="col" class=" py-3">Department</th>
                            <th scope="col" class=" py-3">Requestor Name</th>
                            <th scope="col" class=" py-3">Salary Range</th>
                            <th scope="col" class=" py-3">Status</th>
                            <th scope="col" class=" py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2">1</td>
                            <td class="p-2">Junior Fullstack Developer</td>
                            <td>Replacement</td>
                            <td class="p-2">IST</td>
                            <td class="p-2">John Doe</td>
                            <td class="p-2">₱20,000 - ₱25,000</td>
                            <td class="p-2">Waiting For Approval</td>
                            <td class="p-2">
                                <div class="flex flex-row justify-center items-center gap-2">
                                {{-- {{$employee->employee_id}} --}}
                                        <a
                                            x-data="{ disabled: false }"
                                            x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                            @click="
                                                if (!disabled) {
                                                    disabled = true;
                                                    setTimeout(() => disabled = false, 1000); 
                                                }
                                            "class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4">
                                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>

                                            <a @click="open_edit = true; 
                                                "
                                                class="cursor-pointer flex items-center gap-1 font-medium text-blue-800">
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
                                                @click="open_delete = true"
                                                class="cursor-pointer flex items-center gap-1 font-medium text-red-700">
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
                            <tr>
                                <td class="p-2">2</td>
                                <td class="p-2">Junior Fullstack Developer</td>
                                <td>New Position</td>
                                <td class="p-2">IST</td>
                                <td class="p-2">John Doe</td>
                                <td class="p-2">₱20,000 - ₱25,000</td>
                                <td class="p-2">                               
                                    <span class="bg-green-600 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg ">Approved</span>
                                </td>
                                <td class="p-2">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                    {{-- {{$employee->employee_id}} --}}
                                            <a
                                                x-data="{ disabled: false }"
                                                x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                                @click="open_view=true"
                                                class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-4">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a @click="open_edit = true; 
                                                "
                                                class="cursor-pointer flex items-center gap-1 font-medium text-blue-800">
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
                                                @click="open_delete = true"
                                                class="cursor-pointer flex items-center gap-1 font-medium text-red-700">
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
                            <tr>
                                <td class="p-2">3</td>
                                <td class="p-2">Junior Fullstack Developer</td>
                                <td>Temporary Position</td>
                                <td class="p-2">IST</td>
                                <td class="p-2">John Doe</td>
                                <td class="p-2">₱20,000 - ₱25,000</td>
                                <td class="p-2">                               
                                    <span class="bg-green-600 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg ">Approved</span>               
                                </td>
                                <td class="p-2">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                    {{-- {{$employee->employee_id}} --}}
                                            <a
                                                x-data="{ disabled: false }"
                                                x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                                @click="open_view=true" 
                                                class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-4">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a @click="open_edit = true; 
                                                "
                                                class="cursor-pointer flex items-center gap-1 font-medium text-blue-800">
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
                                                @click="open_delete = true"
                                                class="cursor-pointer flex items-center gap-1 font-medium text-red-700">
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
                            <tr>
                                <td class="p-2">4</td>
                                <td class="p-2">Junior Fullstack Developer</td>
                                <td>Internship</td>
                                <td class="p-2">IST</td>
                                <td class="p-2">John Doe</td>
                                <td class="p-2">₱20,000 - ₱25,000</td>
                                <td class="p-2">                              
                                    <span class="bg-green-600 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg ">Approved</span>                                </td>
                                <td class="p-2">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                    {{-- {{$employee->employee_id}} --}}
                                            <a
                                                x-data="{ disabled: false }"
                                                x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                                @click="open_view=true" 
                                                class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-4">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a @click="open_edit = true; 
                                                "
                                                class="cursor-pointer flex items-center gap-1 font-medium text-blue-800">
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
                                                @click="open_delete = true"
                                                class="cursor-pointer flex items-center gap-1 font-medium text-red-700">
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
                            <tr>
                                <td class="p-2">5</td>
                                <td class="p-2">Junior Fullstack Developer</td>
                                <td>Part-Time</td>
                                <td class="p-2">IST</td>
                                <td class="p-2">John Doe</td>
                                <td class="p-2">₱20,000 - ₱25,000</td>
                                <td class="p-2">                               
                                    <span class="bg-green-600 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg ">Approved</span>
                                </td>
                                <td class="p-2">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                    {{-- {{$employee->employee_id}} --}}
                                            <a
                                                x-data="{ disabled: false }"
                                                x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                                @click="open_view=true" 
                                                class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-4">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a @click="open_edit = true;"
                                                class="cursor-pointer flex items-center gap-1 font-medium text-blue-800">
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
                                                @click="open_delete = true"
                                                class="cursor-pointer flex items-center gap-1 font-medium text-red-700">
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
                        </tbody>
                    </table>
                </template>

                {{-- Rejected Table --}}
                <template x-if="selected === 'rejected'">
                    <table class="w-full text-center text-sm text-gray-500">
                        <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                            <tr>    
                                <th scope="col" class=" py-3">Ticket ID</th>
                                <th scope="col" class=" py-3">Job Position</th>
                                <th scope="col" class=" py-3">Requisition Type</th>
                                <th scope="col" class=" py-3">Department</th>
                                <th scope="col" class=" py-3">Requestor Name</th>
                                <th scope="col" class=" py-3">Salary Range</th>
                                <th scope="col" class=" py-3">Status</th>
                                <th scope="col" class=" py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2">1</td>
                                <td class="p-2">Junior Fullstack Developer</td>
                                <td>Replacement</td>
                                <td class="p-2">IST</td>
                                <td class="p-2">John Doe</td>
                                <td class="p-2">₱20,000 - ₱25,000</td>
                                <td class="p-2">
                                    <span class="bg-red-600 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg ">Rejected</span>
                                </td>
                                <td class="p-2">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                    {{-- {{$employee->employee_id}} --}}
                                            <a
                                                x-data="{ disabled: false }"
                                                x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                                @click="open_view=true" class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-4">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a @click="open_edit = true; 
                                                "
                                                class="cursor-pointer flex items-center gap-1 font-medium text-blue-800">
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
                                                @click="open_delete = true"
                                                class="cursor-pointer flex items-center gap-1 font-medium text-red-700">
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
                            <tr>
                                <td class="p-2">2</td>
                                <td class="p-2">Junior Fullstack Developer</td>
                                <td>New Position</td>
                                <td class="p-2">IST</td>
                                <td class="p-2">John Doe</td>
                                <td class="p-2">₱20,000 - ₱25,000</td>
                                <td class="p-2">                               
                                    <span class="bg-red-600 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg ">Rejected</span>
                                </td>
                                <td class="p-2">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                    {{-- {{$employee->employee_id}} --}}
                                            <a
                                                x-data="{ disabled: false }"
                                                x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                                @click="open_view=true"
                                                class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-4">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a @click="open_edit = true; 
                                                "
                                                class="cursor-pointer flex items-center gap-1 font-medium text-blue-800">
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
                                                @click="open_delete = true"
                                                class="cursor-pointer flex items-center gap-1 font-medium text-red-700">
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
                            <tr>
                                <td class="p-2">3</td>
                                <td class="p-2">Junior Fullstack Developer</td>
                                <td>Temporary Position</td>
                                <td class="p-2">IST</td>
                                <td class="p-2">John Doe</td>
                                <td class="p-2">₱20,000 - ₱25,000</td>
                                <td class="p-2">                               
                                    <span class="bg-red-600 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg ">Rejected</span>               
                                </td>
                                <td class="p-2">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                    {{-- {{$employee->employee_id}} --}}
                                            <a
                                                x-data="{ disabled: false }"
                                                x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                                @click="open_view=true" 
                                                class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-4">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a @click="open_edit = true; 
                                                "
                                                class="cursor-pointer flex items-center gap-1 font-medium text-blue-800">
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
                                                @click="open_delete = true"
                                                class="cursor-pointer flex items-center gap-1 font-medium text-red-700">
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
                            <tr>
                                <td class="p-2">4</td>
                                <td class="p-2">Junior Fullstack Developer</td>
                                <td>Internship</td>
                                <td class="p-2">IST</td>
                                <td class="p-2">John Doe</td>
                                <td class="p-2">₱20,000 - ₱25,000</td>
                                <td class="p-2">                              
                                    <span class="bg-red-600 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg ">Rejected</span>                                </td>
                                <td class="p-2">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                    {{-- {{$employee->employee_id}} --}}
                                            <a
                                                x-data="{ disabled: false }"
                                                x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                                @click="open_view=true" 
                                                class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-4">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a @click="open_edit = true; 
                                                "
                                                class="cursor-pointer flex items-center gap-1 font-medium text-blue-800">
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
                                                @click="open_delete = true"
                                                class="cursor-pointer flex items-center gap-1 font-medium text-red-700">
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
                            <tr>
                                <td class="p-2">5</td>
                                <td class="p-2">Junior Fullstack Developer</td>
                                <td>Part-Time</td>
                                <td class="p-2">IST</td>
                                <td class="p-2">John Doe</td>
                                <td class="p-2">₱20,000 - ₱25,000</td>
                                <td class="p-2">                               
                                    <span class="bg-red-600 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg ">Rejected</span>
                                </td>
                                <td class="p-2">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                    {{-- {{$employee->employee_id}} --}}
                                            <a
                                                x-data="{ disabled: false }"
                                                x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                                @click="open_view=true" 
                                                class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-4">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a @click="open_edit = true;"
                                                class="cursor-pointer flex items-center gap-1 font-medium text-blue-800">
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
                                                @click="open_delete = true"
                                                class="cursor-pointer flex items-center gap-1 font-medium text-red-700">
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
                        </tbody>
                    </table>
                </template>
            </div>
        </div>

        <div x-show="open_view" x-cloak @click="open_view=false" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="rounded shadow-lg max-w-lg w-full mt-3" @click.stop>
                <livewire:employee.manpower-requisition.view-requisition-ticket />
            </div>
        </div>

        <template x-if="open_add">
            <div @click="open_add=false" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                <div class="rounded shadow-lg max-w-lg w-full mt-3" @click.stop>
                    <livewire:employee.manpower-requisition.add-requisition-req />
                </div>
            </div>
        </template>
        
        <div x-show="open_edit" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="rounded shadow-lg max-w-lg w-full mt-3" @click.away="open_edit=false; window.Livewire.dispatch('resetEmployeeProfile')">
                <livewire:employee.manpower-requisition.edit-requisition-ticket />
            </div>
        </div>

        <div x-show="open_delete" x-cloak id="delete-modal" 
            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                <livewire:employee.manpower-requisition.delete-requisition-ticket />
        </div>
    </div>
 
    {{-- Employee Modals (VIEW, DELETE) --}}
    {{-- <livewire:employee.employee-modals lazy> --}}

</x-app-layout>

