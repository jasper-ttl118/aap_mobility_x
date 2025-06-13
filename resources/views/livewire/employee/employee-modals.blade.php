<div wire:ignore.self>

    @if ($viewOpen)
        <!-- View Employee Modal -->
        <div wire:ignore.self id="viewEmployeeModal" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50" wire:click="close">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">
                <!-- Modal Header -->
                <div class="flex justify-between items-center border-b pb-3">
                    <h2 class="text-xl font-semibold text-[#151847]">Employee Details</h2>
                    <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600" wire:click="close">
                        &#10005;
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="text-gray-700 p-4 space-y-4">
                    <!-- Employee Name -->
                    <div>
                        <label class="font-medium text-[#151847]">Employee Name</label>
                        <p class="mt-1">
                            {{ $employee->employee_firstname . ' ' . $employee->employee_middlename . ' ' . $employee->employee_lastname }}
                        </p>
                    </div>

                    <!-- Contact Number -->
                    <div>
                        <label class="font-medium text-[#151847]">Contact Number</label>
                        <p class="mt-1" >{{ $employee->employee_contact_number }}</p>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="font-medium text-[#151847]">Email</label>
                        <p class="mt-1">{{ $employee->employee_email }}</p>
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="font-medium text-[#151847]">Address</label>
                        <p class="mt-1">{{ $employee->employee_address }}</p>
                    </div>

                    <!-- Department & Position -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="font-medium text-[#151847]">Department</label>
                            <p class="mt-1">{{ $employee->employee_department }}</p>
                        </div>
                        <div>
                            <label class="font-medium text-[#151847]">Position</label>
                            <p class="mt-1">{{ $employee->employee_position }}</p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="font-medium text-[#151847]">Status</label>
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-medium {{ ($employee->employee_status == '1') ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}"
                        >{{ ($employee->employee_status == '1') ? 'Active' : 'Inactive'}}</span>
                    </div>

                    <!-- Created At -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="font-medium text-[#151847]">Created At</label>
                            <p class="mt-1">{{ date('F j, Y - g:i A',strtotime($employee->employee_date_created)) }}</p>
                        </div>
                        <div>
                            <label class="font-medium text-[#151847]">Updated At</label>
                            <p class="mt-1">{{ date('F j, Y - g:i A',strtotime($employee->employee_date_updated)) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-end gap-2 border-t pt-3">       
                    <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 text-[#151847]" wire:click="close">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif
    
    <!-- Delete Confirmation Modal -->
    <div x-cloak id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50"
        x-show="open">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6 dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Confirm Deletion</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                Are you sure you want to delete this employee? This action cannot be undone.
            </p>

            <div class="mt-4 flex justify-end items-center space-x-3">
                <button @click="open = false"
                    class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                    Cancel
                </button>

                <form id="delete-form" :action="deleteUrl" method="POST" class="inline-block m-0 p-0">
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

</div>
