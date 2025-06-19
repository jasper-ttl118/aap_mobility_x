<div>
    <div wire:loading>
        <x-loading-modal />
    </div>

    @if ($viewOpen)
        <!-- View Employee Modal -->
        <div wire:loading.remove class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6" @click.stop @click.away="open_view_employee=false">
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
    @endif
</div>
