<x-app-layout class='flex flex-row w-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='Employee Management'>
  
    <div x-data="{ selected : 'employees', open_add_employee : false, open_delete_employee : false, 
                   open_view_employee : false, open_edit_employee : false, open_add_intern : false, 
                   open_delete_intern : false, open_view_intern : false, open_edit_intern : false
                }" 
        class="flex flex-1 flex-col lg:ml-52 overflow-y-auto px-5 lg:px-10 py-3 gap-7 mt-12 bg-[#f3f4f6]">
      
        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg overflow-x-auto hide-scrollbar flex-shrink-0">
            <div class="flex h-14">
                <x-employee.submodules selected="Alphalist" />
            </div>
        </div>

        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-col lg:flex-row justify-between">
                 {{-- Breadcrumbs --}}
                <div class="flex items-center gap-x-1 text-[#071d49] text-sm px-7 pt-5">
                    <a href="/employee" class="hover:underline">Employee Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="hover:underline font-semibold">Alphalist</a>
                </div>
                 {{-- Top-right: Toggle + Add Buttons --}}
                <div class="flex flex-start justify-center lg:justify-end px-7 pt-6">
                    <a x-show="selected == 'employees'" href="{{ route('addEmployee') }}"
                        :class="selected == 'employees' ? 'text-white bg-[#071d49] hover:bg-[#abcae9] hover:text-[#071d49] hover:font-medium' : 'text-[#071d49] bg-[#abcae9] hover:bg-[#071d49] hover:text-white'"
                        class="flex cursor-pointer items-center gap-2 rounded-md  px-4 py-2 text-sm font-medium focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add New Employee
                    </a>

                    <a x-show="selected == 'ojt'" @click="open_add_intern=true" 
                        :class="selected == 'ojt' ? 'text-white bg-[#071d49] hover:bg-[#abcae9] hover:text-[#071d49] hover:font-medium' : 'text-[#071d49] bg-[#abcae9] hover:bg-[#071d49] hover:text-white'"
                        class="flex cursor-pointer items-center gap-2 rounded-md  px-4 py-2 text-sm font-medium focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add New OJT Intern
                    </a>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-between px-7 py-6 gap-y-2">
                <div class="text-center lg:text-start">
                    <h2 class="font-semibold text-lg text-[#071d49]" x-text="selected === 'employees' ? 'Manage AAP Employees' : 'Manage OJT Interns' "></h2>
                    <p class="text-gray-900 text-sm" x-text="selected === 'employees' ? 'Create, update, and delete employee details.' : 'Create, update, and delete OJT intern details.' "></p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-4">
                         {{-- Toggle  --}}
                        <div class="flex border border-[#151847] rounded-md overflow-hidden w-[220px] h-[30px]">
                            <a @click="selected='employees'"
                            class="w-1/2 text-xs uppercase font-semibold flex items-center justify-center transition duration-150 cursor-pointer"
                            :class="selected === 'employees' ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white'">
                                Employees
                            </a>
                            <a @click="selected='ojt'"
                            class="w-1/2 text-xs uppercase font-semibold flex items-center justify-center transition duration-150 cursor-pointer"
                            :class="selected === 'ojt' ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white'">
                                OJT Interns
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- List of Employees --}}
            <livewire:employee.alphalist.alphalist-table />
        </div>
        
        {{-- Add Employee Modal --}}
        <template x-if="open_add_employee">
            <div @click="open_add_employee=false" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                <div @click.stop>
                    <livewire:employee.alphalist.add-employe-modal />
                </div>
            </div>
        </template>
        
        {{-- Edit Employee Modal --}}
        <div x-show="open_edit_employee" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div @click.away="open_edit_employee=false; window.Livewire.dispatch('resetEmployeeProfile')">
                <livewire:employee.alphalist.edit-employee-modal />
            </div>
        </div>
        
        {{-- Delete Employee Alert --}}
        <div x-cloak id="delete-modal" 
            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50"
            x-show="open_delete_employee">
                <livewire:employee.alphalist.delete-employee-alert />
        </div>

        {{-- Currently toggling with livewire, will transfer the modal visibility with alpinejs next time :> --}}
        <div x-cloak x-show="open_view_employee" id="viewEmployeeModal" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50" >
            <livewire:employee.alphalist.view-employee-modal />
        </div>

        <template x-if="open_add_intern">
            <div @click="open_add_intern=false" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                <livewire:employee.alphalist.add-intern-modal />
            </div>
        </template>

        <div x-show="open_edit_intern" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div @click.away="open_edit_intern=false; window.Livewire.dispatch('resetInternProfile')">
                <livewire:employee.alphalist.edit-intern-modal />
            </div>
        </div>

        <div x-cloak id="delete-modal" 
            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50"
            x-show="open_delete_intern">
                <livewire:employee.alphalist.delete-intern-modal />
        </div>

        <div class="fixed top-14 right-10 z-50 space-y-2 w-[300px]">
            <livewire:toast.toast />
        </div>

        <livewire:employee.alphalist.view-intern-modal />
        
    {{-- Employee Modals (VIEW, DELETE) --}}
    {{-- <livewire:employee.employee-modals lazy> --}}

</x-app-layout>

