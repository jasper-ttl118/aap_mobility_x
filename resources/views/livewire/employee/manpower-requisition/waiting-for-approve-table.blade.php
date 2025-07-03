<div class="mx-7 mb-10 rounded-sm overflow-x-auto hide-scrollbar">
  
    {{-- Pending Table --}}
    <div>
        <table class="w-[1000px] lg:w-full text-center text-sm text-gray-500">
            <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                <tr>    
                    <th scope="col" class=" py-3">Request ID</th>
                    <th scope="col" class=" py-3">Job Position</th>
                    <th scope="col" class=" py-3">Requisition Type</th>
                    <th scope="col" class=" py-3">Department</th>
                    {{-- <th scope="col" class=" py-3">Requestor Name</th> --}}
                    <th scope="col" class=" py-3">Status</th>
                    <th scope="col" class=" py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($waitingApprovalRequisitions as $waitingApprovalRequisition)
                    <tr>
                        <td class="p-2">{{ $waitingApprovalRequisition->requisition_id }}</td>
                        <td class="p-2">{{ $waitingApprovalRequisition->requisition_initial_job_position }}</td>
                        <td>{{ $waitingApprovalRequisition->requisition_type }}</td>
                        <td class="p-2">{{ $waitingApprovalRequisition->department->department_name }}</td>
                        {{-- <td class="p-2">{{ $waitingApprovalRequisition->requisition_requestor_name }}</td> --}}
                        <td class="p-2">
                            <span class="{{ $status_class }}">{{ $status_text }}</span>
                        </td>
                        <td class="p-2">
                            <div class="flex flex-row justify-center items-center gap-2">
                            {{-- {{$employee->employee_id}} --}}
                                    <a
                                        x-data="{ disabled: false }"
                                        x-bind:class="{ 'opacity-50 pointer-events-none': disabled }"
                                        href="{{ route('view-waiting-approval-request', $waitingApprovalRequisition->requisition_id ) }}"
                                        class="group relative text-center gap-1 font-medium text-gray-700 cursor-pointer"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="size-4">
                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path fill-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="pointer-events-none absolute bottom-full mb-2 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition z-10">
                                            View Request
                                        </div>
                                    </a>
                                    
                                    <a href="javascript:void(0)"
                                        @click="open_delete = true; Livewire.dispatch('getRequisitionId', { requisition_id: {{ $waitingApprovalRequisition->requisition_id }}, status: 'pending' });"
                                        class="cursor-pointer group relative text-center gap-1 font-medium text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="size-4">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="pointer-events-none absolute bottom-full mb-2 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition z-10">
                                            Delete
                                        </div>
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
        {{ $waitingApprovalRequisitions->onEachSide(1)->links() }}
    </div>
</div>