<div>
    <div wire:loading>
        <x-loading-modal />
    </div>

    @if ($employee)
        <form wire:loading.remove wire:submit="edit" class="max-w-md mx-auto text-sm">
            @csrf
            @method('PUT')

            <div class="text-gray-700 py-6 px-4 space-y-3 bg-white shadow-md mt-1 rounded-xl border border-gray-200">
                <!-- Heading -->
                <div class="border-b border-gray-200 pb-3">
                    <h1 class="text-base font-semibold uppercase">Update Employee</h1>
                    <p class="text-xs text-gray-600">Edit personal and job details.</p>
                </div>

                <!-- Employee Name -->
                <div>
                    <label class="font-medium text-xs">Name</label>
                    <div class="flex gap-1 mt-1">
                        <input type="text" wire:model="employee_firstname" placeholder="First"
                            class="w-full h-8 bg-gray-100 rounded border border-gray-300 px-2 focus:outline-blue-500 text-sm">
                        <input type="text" wire:model="employee_middlename" placeholder="Middle"
                            class="w-full h-8 bg-gray-100 rounded border border-gray-300 px-2 focus:outline-blue-500 text-sm">
                        <input type="text" wire:model="employee_lastname" placeholder="Last"
                            class="w-full h-8 bg-gray-100 rounded border border-gray-300 px-2 focus:outline-blue-500 text-sm">
                    </div>
                    @error('employee_firstname') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
                </div>

                <!-- Contact Number -->
                <div>
                    <label class="font-medium text-xs">Contact Number</label>
                    <input type="text" wire:model="employee_contact_number" placeholder="e.g. 09123456789"
                        class="w-full h-8 bg-gray-100 rounded border border-gray-300 px-2 mt-1 focus:outline-blue-500 text-sm">
                    @error('employee_contact_number') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="font-medium text-xs">Email</label>
                    <input type="email" wire:model="employee_email" placeholder="sample@email.com"
                        class="w-full h-8 bg-gray-100 rounded border border-gray-300 px-2 mt-1 focus:outline-blue-500 text-sm">
                    @error('employee_email') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
                </div>

                <!-- Address -->
                <div>
                    <label class="font-medium text-xs">Address</label>
                    <input type="text" wire:model="employee_address" placeholder="Enter Address"
                        class="w-full h-8 bg-gray-100 rounded border border-gray-300 px-2 mt-1 focus:outline-blue-500 text-sm">
                    @error('employee_address') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
                </div>

                <!-- Department, Position & Status -->
                <div class="grid grid-cols-3 gap-2">
                    <div>
                        <label class="font-medium text-xs">Department</label>
                        <select wire:model="employee_department"
                            class="w-full h-8 bg-gray-100 rounded border border-gray-300 px-2 mt-1 focus:outline-blue-500 text-xs">
                            <option value="">Select</option>
                            <option value="IT">IT</option>
                            <option value="HR">HR</option>
                            <option value="Finance">Finance</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Sales">Sales</option>
                        </select>
                        @error('employee_department') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
                    </div>

                    <div>
                        <label class="font-medium text-xs">Position</label>
                        <select wire:model="employee_position"
                            class="w-full h-8 bg-gray-100 rounded border border-gray-300 px-2 mt-1 focus:outline-blue-500 text-xs">
                            <option value="">Select</option>
                            <option value="Manager">Manager</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Staff">Staff</option>
                        </select>
                        @error('employee_position') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
                    </div>

                    <div>
                        <label class="font-medium text-xs">Status</label>
                        <select wire:model="employee_status"
                            class="w-full h-8 bg-gray-100 rounded border border-gray-300 px-2 mt-1 focus:outline-blue-500 text-xs">
                            <option value="">Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('employee_status') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="mt-4 w-full bg-blue-600 text-white px-3 py-1.5 rounded text-sm hover:bg-blue-700 transition-all duration-150">
                    Update
                </button>
            </div>
        </form>
    @endif
</div>
