<div class="mx-7 mb-10 rounded-sm overflow-x-auto hide-scrollbar">

    {{-- Pending Table --}}
    <div x-show="selected === 'pending'">
        <table class="w-[1000px] lg:w-full text-center text-sm text-gray-500">
            <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                <tr>    
                    <th scope="col" class=" py-3">Request ID</th>
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
                @forelse ($pendingRequisitions as $pendingRequisition)
                    <tr>
                        <td class="p-2">{{ $pendingRequisition->requisition_id }}</td>
                        <td class="p-2">{{ $pendingRequisition->requisition_initial_job_position }}</td>
                        <td>{{ $pendingRequisition->requisition_type }}</td>
                        <td class="p-2">{{ $pendingRequisition->requisition_department }}</td>
                        <td class="p-2">{{ $pendingRequisition->requisition_requestor_name }}</td>
                        <td class="p-2">₱{{ $pendingRequisition->requisition_salary_min }} - ₱{{ $pendingRequisition->requisition_salary_max }}</td>
                        <td class="p-2">
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-gray-300">Pending</span>
                        </td>
                        <td class="p-2">
                            <div class="flex flex-row justify-center items-center gap-2">
                            {{-- {{$employee->employee_id}} --}}
                                    <a
                                        x-data="{ disabled: false }"
                                        x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                        href="{{ route('requisition.show', $pendingRequisition->requisition_id ) }}"
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

                                    <a  href="{{ route('requisition.edit', $pendingRequisition->requisition_id) }}"
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
                                        @click="open_delete = true; Livewire.dispatch('getRequisitionId', { requisition_id: {{ $pendingRequisition->requisition_id }}, status: 'pending' });"
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
                @empty
                    <tr>
                        <td colspan="8" class="py-3">No Pending Requisition Request Yet...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div x-show="selected === 'pending'" class="flex w-full justify-start lg:justify-center">
        {{ $pendingRequisitions->onEachSide(1)->links() }}
    </div>

    {{-- Approved Table --}}
    <div x-show="selected === 'approved'">
        <table class="w-[1000px] lg:w-full text-center text-sm text-gray-500">
            <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                <tr>    
                    <th scope="col" class=" py-3">Request ID</th>
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
                @forelse ($approvedRequisitions as $approvedRequisition)
                    <tr>
                        <td class="p-2">{{ $approvedRequisition->requisition_id }}</td>
                        <td class="p-2">{{ $approvedRequisition->requisition_initial_job_position }}</td>
                        <td>{{ $approvedRequisition->requisition_type }}</td>
                        <td class="p-2">{{ $approvedRequisition->requisition_department }}</td>
                        <td class="p-2">{{ $approvedRequisition->requisition_requestor_name }}</td>
                        <td class="p-2">₱{{ $approvedRequisition->requisition_salary_min }} - ₱{{ $approvedRequisition->requisition_salary_max}}</td>
                        <td class="p-2">
                            <span class="bg-green-600 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg ">Approved</span>
                        </td>
                        <td class="p-2">
                            <div class="flex flex-row justify-center items-center gap-2">
                            {{-- {{$employee->employee_id}} --}}
                                    <a
                                        href="{{ route('requisition.show', $approvedRequisition->requisition_id ) }}"
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

                                    <a  href="{{ route('requisition.edit', $approvedRequisition->requisition_id) }}"
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
                                        @click="open_delete = true; Livewire.dispatch('getRequisitionId', { requisition_id: {{ $approvedRequisition->requisition_id }}, status: 'approved' });"
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
                @empty
                    <tr>
                        <td colspan="8" class="py-3">No Approved Requisition Request Yet...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div x-show="selected === 'approved'" class="flex w-full justify-start lg:justify-center">
        {{ $approvedRequisitions->onEachSide(1)->links() }}
    </div>

    {{-- Waiting Approval Table --}}
    <div x-show="selected === 'waiting'">
        <table class="w-[1000px] lg:w-full text-center text-sm text-gray-500">
            <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                <tr>    
                    <th scope="col" class=" py-3">Request ID</th>
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

                @forelse ($waitingRequisitions as $waitingRequisition)
                    <tr>
                        <td class="p-2">{{ $waitingRequisition->requisition_id }}</td>
                        <td class="p-2">{{ $waitingRequisition->requisition_initial_job_position }}</td>
                        <td>{{ $waitingRequisition->requisition_type }}</td>
                        <td class="p-2">{{ $waitingRequisition->requisition_department }}</td>
                        <td class="p-2">{{ $waitingRequisition->requisition_requestor_name }}</td>
                        <td class="p-2">₱{{ $waitingRequisition->requisition_salary_min }} - ₱{{ $waitingRequisition->requisition_salary_max }}</td>
                        <td class="p-2">
                            <span class="bg-[#F6D400] text-[#071d49] text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg ">Waiting Approval</span>
                        </td>
                        <td class="p-2">
                            <div class="flex flex-row justify-center items-center gap-2">
                            {{-- {{$employee->employee_id}} --}}
                                    <a
                                        href="{{ route('requisition.show', $waitingRequisition->requisition_id ) }}"
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

                                    <a  href="{{ route('requisition.edit', $waitingRequisition->requisition_id) }}"
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
                                        @click="open_delete = true; Livewire.dispatch('getRequisitionId', { requisition_id: {{ $waitingRequisition->requisition_id }}, status: 'waiting' });"
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
                @empty
                    <tr>
                        <td colspan="8" class="py-3">No Waiting for Approval Request Yet...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div x-show="selected === 'rejected'" class="flex w-full justify-start lg:justify-center">
        {{ $waitingRequisitions->onEachSide(1)->links() }}
    </div>
    
</div>