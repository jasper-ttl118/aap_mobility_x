<form wire:submit="add" class="w-full max-w-md mx-auto bg-white shadow rounded-xl border border-gray-200 text-sm" @click.stop>
    @csrf
    <div class="text-gray-700 py-6 px-4 space-y-3">
        <!-- Heading -->
        <div class="border-b border-gray-200 pb-3">
            <h1 class="text-base font-semibold uppercase">Add Intern</h1>
            <p class="text-xs text-gray-600">Register intern details including contact, role & department.</p>
        </div>

        <!-- Intern Name -->
        <div>
            <label class="font-medium text-xs">Intern Name</label>
            <div class="grid grid-cols-3 gap-2 mt-1">
                <input type="text" name="intern_firstname" placeholder="First" wire:model="intern_firstname"
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                <input type="text" name="intern_middlename" placeholder="Middle" wire:model="intern_middlename"
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                <input type="text" name="intern_lastname" placeholder="Last" wire:model="intern_lastname"
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
            </div>
            @error('intern_firstname') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
        </div>

        <!-- Internship Type & Required Hours -->
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label class="text-xs font-medium">Type</label>
                <select name="internship_type" wire:model="internship_type"
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-xs mt-1 focus:outline-blue-500">
                    <option value="">Select</option>
                    <option value="Voluntary">Voluntary</option>
                    <option value="School Required">School Required</option>
                </select>
                @error('internship_type') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
            </div>
            <div>
                <label class="text-xs font-medium">Required Hours</label>
                <input type="number" name="required_hours" wire:model="required_hours"
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500"
                    placeholder="e.g. 300">
                @error('required_hours') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
            </div>
        </div>

        <!-- Contact -->
        <div>
            <label class="text-xs font-medium">Contact Number</label>
            <input type="text" name="intern_contact_number" wire:model="intern_contact_number"
                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500"
                placeholder="e.g. 09123456789">
            @error('intern_contact_number') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="text-xs font-medium">Email</label>
            <input type="email" name="intern_email" wire:model="intern_email"
                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500"
                placeholder="email@example.com">
            @error('intern_email') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
        </div>

        <!-- Address -->
        <div>
            <label class="text-xs font-medium">Address</label>
            <input type="text" name="intern_address" wire:model="intern_address"
                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500"
                placeholder="Enter address">
            @error('intern_address') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
        </div>

        <!-- Department & Position -->
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label class="text-xs font-medium">Department</label>
                <select name="intern_department" wire:model="intern_department"
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
                @error('intern_department') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
            </div>
            <div>
                <label class="text-xs font-medium">Position</label>
                <select name="intern_position" wire:model="intern_position"
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-xs mt-1 focus:outline-blue-500">
                    <option value="Manager">Manager</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
        </div>

        <!-- Submit -->
        <button type="submit" @click=""
            class="mt-4 w-full bg-blue-600 text-white px-3 py-1.5 rounded text-sm hover:bg-blue-700">
            Create
        </button>
    </div>
</form>
