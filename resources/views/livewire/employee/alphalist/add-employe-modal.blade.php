<form wire:submit="add"
    class="max-w-sm mx-auto bg-white shadow rounded border border-gray-200 text-sm">
    @csrf
    <div class="text-gray-700 p-4 space-y-3">
        <!-- Heading -->
        <div class="border-b border-gray-200 pb-3">
            <h1 class="text-base font-semibold uppercase">Add Employee</h1>
            <p class="text-xs text-gray-600">Enter contact details, position, and department.</p>
        </div>

        <!-- Employee Name -->
        <div>
            <label for="employee_fullname" class="font-medium text-xs">Employee Name</label>
            <div class="flex gap-1 mt-1">
                <input type="text" name="employee_firstname" placeholder="First" wire:model="employee_firstname"
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                <input type="text" name="employee_middlename" placeholder="Middle" wire:model="employee_middlename"
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                <input type="text" name="employee_lastname" placeholder="Last" wire:model="employee_lastname"
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
            </div>
            @error('employee_firstname') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
        </div>

        <!-- Contact Number -->
        <div>
            <label for="employee_contact_number" class="font-medium text-xs">Contact Number</label>
            <input type="text" name="employee_contact_number" placeholder="e.g. 09123456789" wire:model="employee_contact_number"
                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
            @error('employee_contact_number') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="employee_email" class="font-medium text-xs">Email</label>
            <input type="email" name="employee_email" placeholder="email@example.com" wire:model="employee_email"
                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
            @error('employee_email') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
        </div>

        <!-- Address -->
        <div>
            <label for="employee_address" class="font-medium text-xs">Address</label>
            <input type="text" name="employee_address" placeholder="Enter address" wire:model="employee_address"
                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
            @error('employee_address') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
        </div>

        <!-- Department & Position -->
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label for="employee_department" class="font-medium text-xs">Department</label>
                <select name="employee_department" wire:model="employee_department"
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-xs mt-1 focus:outline-blue-500">
                    <option value="IST">IST</option>
                    <option value="Admin">Admin</option>
                    <option value="HR">HR</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Membership">Membership</option>
                    <option value="MarComm">MarComm</option>
                    <option value="CEO">CEO</option>
                    <option value="COO">COO</option>
                    <option value="EO">EO</option>
                </select>
                @error('employee_department') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
            </div>
            <div>
                <label for="employee_position" class="font-medium text-xs">Position</label>
                <select name="employee_position" wire:model="employee_position"
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-xs mt-1 focus:outline-blue-500">
                    <option value="Manager">Manager</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="mt-4 w-full bg-blue-600 text-white px-3 py-1.5 rounded text-sm hover:bg-blue-700">
            Create
        </button>
    </div>
</form>
