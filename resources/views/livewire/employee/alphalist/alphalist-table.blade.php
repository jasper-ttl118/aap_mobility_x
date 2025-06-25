<div class="mx-7 mb-10 rounded-sm overflow-x-auto hide-scrollbar">
    <template x-if="selected === 'employees'">
        <table class="w-[800px] lg:w-full text-center text-sm text-gray-500">
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
                            {{ $employee->employee_middlename }}
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
                        {{-- {{$employee->employee_id}} --}}
                                <a
                                    x-data="{ disabled: false }"
                                    x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                    @click="
                                        if (!disabled) {
                                            disabled = true;
                                            open_view_employee = true;
                                            Livewire.dispatch('toggleModal', { employee_id: {{ $employee->employee_id }} });
                                            setTimeout(() => disabled = false, 1000); 
                                        }
                                    " class="flex items-center gap-1 font-medium text-gray-700 cursor-pointer"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor" class="size-4">
                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path fill-rule="evenodd"
                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <a @click="open_edit_employee = true; 
                                        window.Livewire.dispatch('loadEmployeeInfo', { employee_id: {{ $employee->employee_id }} });
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
                                    @click="open_delete_employee = true; Livewire.dispatch('getEmployeeId', { employee_id : {{ $employee->employee_id }} });"
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
                @endforeach
            </tbody>
        </table>
    </template>

    <template x-if="selected === 'ojt'">
        <table class="w-[800px] lg:w-full text-center text-sm text-gray-500">
            <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                <tr>    
                    <th scope="col" class="w-[6.25%] py-3">Intern ID</th>
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
                @foreach ($interns as $intern)
                    <tr class="border-b border-gray-200 bg-white">
                        <td scope="row" class="w-[12.5%] py-4 font-medium whitespace-nowrap text-gray-900">
                            {{ $intern->intern_id }}</td>
                        <td class="w-[12.5%] py-4  text-gray-900">{{ $intern->intern_firstname }}
                            {{ $intern->intern_lastname }}</td>
                        <td class="w-[12.5%] py-4  text-gray-900">{{ $intern->intern_email }}</td>
                        <td class="w-[12.5%] py-4  text-gray-900">{{ $intern->intern_contact_number }}</td>
                        <td class="w-[12.5%] py-4  text-gray-900">{{ $intern->intern_department }}</td>
                        <td class="w-[12.5%] py-4  text-gray-900">{{ $intern->intern_position }}</td>
                        <td class="w-[12.5%] py-4  text-gray-900">
                            @if ($intern->intern_status == '1')
                                <span
                                    class="bg-green-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">Active</span>
                            @else
                                <span
                                    class="bg-red-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full">Inactive</span>
                            @endif
                        </td>
                        <td class="w-[12.5%] py-4">
                            <div class="flex flex-row justify-center items-center gap-2">
                        {{-- {{$employee->employee_id}} --}}
                            <a
                                    x-data="{ disabled: false }"
                                    x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                    @click="
                                        if (!disabled) {
                                            disabled = true;
                                            open_view_intern = true;
                                            Livewire.dispatch('toggleInternModal', { intern_id: {{ $intern->intern_id }} });
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

                                <a @click="open_edit_intern = true; 
                                        window.Livewire.dispatch('loadInternInfo', { intern_id: {{ $intern->intern_id }} });
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
                                    @click="open_delete_intern = true; 
                                            Livewire.dispatch('getInternId', { intern_id: {{ $intern->intern_id }} });
                                            "
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
                @endforeach
            </tbody>
        </table>
    </template>
</div>