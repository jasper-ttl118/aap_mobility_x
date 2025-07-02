<x-app-layout class='flex flex-row w-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='Employee Management'>
    {{-- @include('layouts.navbar') --}}

    <div x-data="{ selected : 'pending', open_add : false, open_delete : false, open_view : false, open_edit : false,
                  open_view : false
        }" 
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
            <div class="flex h-14 ">
               <x-employee.submodules selected="Manpower Requisition" />
            </div>
        </div>

        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-col lg:flex-row justify-between">
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
                
                {{-- Temporary restriction of access. Change this so it will fetch the allowed roles from database --}}
                @php
                    $role = auth()->user()->roles;
                    $allowedRoles = ['CEO', 'COO', 'CFO', 'Super Admin'];
                @endphp

                 {{-- Top-right: Toggle + Add Buttons --}}
                <div class="flex justify-start lg:justify-end px-7 pt-6 gap-x-5">
                    @if ($role[0]->role_name === 'Super Admin' || $role[0]->role_name === 'HR Manager')
                        <div class="flex items-center gap-4">
                            <a href="{{ route('pending-list') }}" 
                            class="{{ request() -> routeIs('requisition') ? 'text-[#071d49] bg-[#abcae9] hover:bg-[#071d49] hover:text-white' :'text-white bg-[#071d49] hover:bg-[#abcae9] hover:text-[#071d49] hover:font-medium'  }} flex cursor-pointer items-center gap-2 rounded-md  px-4 py-2 text-sm font-medium focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                    <path fill-rule="evenodd" d="M9 1.5H5.625c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5Zm6.61 10.936a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 14.47a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    <path d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                                </svg>
                                Check Requisition Requests
                            </a>
                        </div>
                    @endif                   

                    @if (in_array($role[0]->role_name,$allowedRoles))
                        <div class="flex items-center gap-4">
                            <a href="{{ route('wait-approval-list') }}" 
                            class="{{ request() -> routeIs('requisition') ? 'text-[#071d49] bg-[#abcae9] hover:bg-[#071d49] hover:text-white' :'text-white bg-[#071d49] hover:bg-[#abcae9] hover:text-[#071d49] hover:font-medium'  }} flex cursor-pointer items-center gap-2 rounded-md  px-4 py-2 text-sm font-medium focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                    <path fill-rule="evenodd" d="M9 1.5H5.625c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5Zm6.61 10.936a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 14.47a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    <path d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                                </svg>
                                Approve Requisition Requests
                            </a>
                        </div>
                    @endif
                    
                    <div class="flex items-center gap-4">
                        <a href="{{ route('requisition.create') }}" 
                        class="{{ request() -> routeIs('requisition') ? 'text-[#071d49] bg-[#abcae9] hover:bg-[#071d49] hover:text-white' :'text-white bg-[#071d49] hover:bg-[#abcae9] hover:text-[#071d49] hover:font-medium'  }} flex cursor-pointer items-center gap-2 rounded-md  px-4 py-2 text-sm font-medium focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Create Requisition Request
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between px-7 py-6">
                <div>
                    <h2 class="font-semibold text-lg text-blue-900">Manage Requisition Requests</h2>
                    <p class="text-gray-900 text-sm">Create, update, and delete requisition request details.</p>
                </div>
                    <div class="flex items-center gap-4">
                         {{-- Toggle  --}}
                        <div class="flex border border-[#151847] rounded-md overflow-hidden h-[30px]">
                            <!-- Pending -->
                            <a @click="selected='pending'"
                            class="w-[150px] text-xs uppercase font-semibold flex items-center justify-center transition duration-150 cursor-pointer"
                            :class="selected === 'pending' ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white'">
                                To Be Reviewed
                            </a>

                            <!-- Waiting Approval -->
                            <a @click="selected='waiting'"
                            class="w-[150px] text-xs uppercase font-semibold flex items-center justify-center transition duration-150 cursor-pointer"
                            :class="selected === 'waiting' ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white'">
                                Waiting Approval
                            </a>

                            <!-- Approved -->
                            <a @click="selected='approved'"
                            class="w-[150px] text-xs uppercase font-semibold flex items-center justify-center transition duration-150 cursor-pointer"
                            :class="selected === 'approved' ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white'">
                                Approved
                            </a>
                        </div>

                    </div>
            </div>

            {{-- List of Requisition Tickets --}}
            <livewire:employee.manpower-requisition.requisition-table />
        </div>

        {{-- <div x-show="open_view" x-cloak @click="open_view=false" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="rounded shadow-lg max-w-lg w-full mt-3" @click.stop>
                <livewire:employee.manpower-requisition.view-requisition-ticket />
            </div>
        </div> --}}

        <template x-if="open_add">
            <div @click="open_add=false" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                <div class="rounded shadow-lg max-w-sm w-full" @click.stop>
                    <livewire:employee.manpower-requisition.add-requisition-req />
                </div>
            </div>
        </template>
        
        {{-- <div x-show="open_edit" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="rounded shadow-lg max-w-lg w-full mt-3" @click.away="open_edit=false; window.Livewire.dispatch('resetEmployeeProfile')">
                <livewire:employee.manpower-requisition.edit-requisition-ticket />
            </div>
        </div> --}}

        <div x-show="open_delete" x-cloak id="delete-modal" 
            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                <livewire:employee.manpower-requisition.delete-requisition-ticket />
        </div>
    </div>

    <div class="fixed top-14 right-10 z-50 space-y-2 w-[300px]">
        <livewire:toast.toast />
    </div>
 
    {{-- Employee Modals (VIEW, DELETE) --}}
    {{-- <livewire:employee.employee-modals lazy> --}}

</x-app-layout>
