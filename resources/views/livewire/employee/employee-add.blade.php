<form wire:submit="add"
    class="max-w-lg mx-auto mt-40 bg-white shadow-md rounded-lg border border-gray-200">
    @csrf
    <div class="text-gray-700 p-6 space-y-6">
        <!-- Heading -->
        <div class="border-b border-gray-200 pb-5">
            <h1 class="text-lg font-bold uppercase">Add New Employee</h1>
            <p class="text-sm text-gray-600">
                Register a new employee's personal details, including contact information, position, and
                department.
            </p>
        </div>

        <!-- Employee Name -->
        <div>
            <label for="employee_fullname" class="font-medium">Employee Name</label>
            <div class="flex gap-2 mt-1">
                <input type="text" name="employee_firstname" placeholder="First Name" wire:model="employee_firstname"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                    @error('employee_firstname') <em>{{ $message }}</em> @enderror 

                <input type="text" name="employee_middlename" placeholder="Middle Name" wire:model="employee_middlename"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                    @error('employee_middlename') <em>{{ $message }}</em> @enderror 

                <input type="text" name="employee_lastname" placeholder="Last Name" wire:model="employee_lastname"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                    @error('employee_lastname') <em>{{ $message }}</em> @enderror 
            </div>
        </div>

        <!-- Contact Number -->
        <div>
            <label for="employee_contact_number" class="font-medium">Contact Number</label>
            <input type="text" name="employee_contact_number" placeholder="Enter Contact Number" wire:model="employee_contact_number"
                class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
            @error('employee_contact_number') <em>{{ $message }}</em> @enderror 
        </div>

        <!-- Email -->
        <div>
            <label for="employee_email" class="font-medium">Email</label>
            <input type="email" name="employee_email" placeholder="sample@email.com" wire:model="employee_email"
                class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
            @error('employee_email') <em>{{ $message }}</em> @enderror 
        </div>

        <!-- Address -->
        <div>
            <label for="employee_address" class="font-medium">Address</label>
            <input type="text" name="employee_address" placeholder="Enter Address" wire:model="employee_address"
                class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
            @error('employee_address') <em>{{ $message }}</em> @enderror
        </div>

        <!-- Department & Position -->
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label for="employee_department" class="font-medium">Department</label>
                <select name="employee_department" wire:model="employee_department"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                    <option value="IST">Information Systems and Technology</option>
                    <option value="Admin">Admin</option>
                    <option value="HR">Human Resources and Development</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Membership">Membership</option>
                    <option value="MarComm">Marketing and Corporate Communication</option>
                    <option value="CEO">CEO</option>
                    <option value="COO">COO</option>
                    <option value="EO">EO</option>
                </select>
                @error('employee_department') <em>{{ $message }}</em> @enderror
            </div>
            <div>
                <label for="employee_position" class="font-medium">Company Position</label>
                <select name="employee_position" wire:model="employee_position"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                    <option value="Manager">Manager</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="mt-6 w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Create
        </button>
    </div>
</form>