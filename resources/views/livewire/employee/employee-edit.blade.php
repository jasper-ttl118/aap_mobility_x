<form wire:submit="edit" class="mx-auto">
    @csrf
    @method('PUT')
    <div class="text-gray-700 p-6 space-y-6 bg-white shadow-lg mt-40">
        <!-- Heading -->
        <div class="border-b border-gray-200 pb-5">
            <h1 class="text-lg font-bold uppercase">Update Employee</h1>
            <p class="text-sm text-gray-600">
                Update employee's personal details, including contact information, position, and department.
            </p>
        </div>

        <!-- Employee Name -->
        <div>
            <label for="employee_fullname" class="font-medium">Employee Name</label>
            <div class="flex gap-2 mt-1">
                <input type="text" value="{{ $employee->employee_firstname }}" name="employee_firstname"
                    placeholder="First Name" wire:model="employee_firstname"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                    @error('employee_firstname') <em>{{ $message }}</em> @enderror

                <input type="text" value="{{ $employee->employee_middlename }}" name="employee_middlename"
                    placeholder="Middle Name" wire:model="employee_middlename"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                    @error('employee_middlename') <em>{{ $message }}</em> @enderror

                <input type="text" value="{{ $employee->employee_lastname }}" name="employee_lastname"
                    placeholder="Last Name" wire:model="employee_lastname"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                    @error('employee_lastname') <em>{{ $message }}</em> @enderror
            </div>
        </div>

    
        <!-- Contact Number -->
        <div>
            <label for="employee_contact_number" class="font-medium">Contact Number</label>
            <input type="text" value="{{ $employee->employee_contact_number }}"
                name="employee_contact_number" placeholder="Enter Contact Number" wire:model="employee_contact_number"
                class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                @error('employee_contact_number') <em>{{ $message }}</em> @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="employee_email" class="font-medium">Email</label>
            <input type="email" value="{{ $employee->employee_email }}" name="employee_email" wire:model="employee_email"
                placeholder="sample@email.com"
                class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                @error('employee_email') <em>{{ $message }}</em> @enderror
        </div>

        <!-- Address -->
        <div>
            <label for="employee_address" class="font-medium">Address</label>
            <input type="text" value="{{ $employee->employee_address }}" name="employee_address" wire:model="employee_address"
                placeholder="Enter Address"
                class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                @error('employee_address') <em>{{ $message }}</em> @enderror
        </div>

        <!-- Department & Position -->
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label for="employee_department" class="font-medium">Department</label>
                <select name="employee_department" wire:model="employee_department"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                    <option value="IT" @selected(old('employee_department', $employee->employee_department) === 'IT')>IT</option>
                    <option value="HR" @selected(old('employee_department', $employee->employee_department) === 'HR')>HR</option>
                    <option value="Finance" @selected(old('employee_department', $employee->employee_department) === 'Finance')>Finance</option>
                    <option value="Marketing" @selected(old('employee_department', $employee->employee_department) === 'Marketing')>Marketing</option>
                    <option value="Sales" @selected(old('employee_department', $employee->employee_department) === 'Sales')>Sales</option>
                </select>
                @error('employee_department') <em>{{ $message }}</em> @enderror
            </div>
            <div>
                <label for="employee_position" class="font-medium">Position</label>
                <select name="employee_position" wire:model="employee_position"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                    <option value="Manager" @selected(old('employee_position', $employee->employee_position) === 'Manager')>Manager</option>
                    <option value="Supervisor" @selected(old('employee_position', $employee->employee_position) === 'Supervisor')>Supervisor</option>
                    <option value="Staff" @selected(old('employee_position', $employee->employee_position) === 'Staff')>Staff</option>
                </select>
                @error('employee_position') <em>{{ $message }}</em> @enderror
            </div>
        </div>

        {{-- status --}}
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label for="status" class="font-medium">Set Status</label>
                <select name="employee_status" wire:model="employee_status"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                    <option value='1' @selected(intval(old('employee_status', $employee->employee_status)) === 1)>Active</option>
                    <option value='0' @selected(intval(old('employee_status', $employee->employee_status)) === 0)>Inactive</option>
                </select>
                @error('employee_status') <em>{{ $message }}</em> @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="mt-6 w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update
        </button>
    </div>
</form>