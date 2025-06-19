<form wire:submit="add"
    class="max-w-sm mx-auto bg-white shadow rounded border border-gray-200 text-sm">
    @csrf
    <div class="text-gray-700 p-4 space-y-3">
        <!-- Heading -->
        <div class="border-b border-gray-200 pb-3">
            <h1 class="text-base font-semibold uppercase">View Requisition Ticket</h1>
            <p class="text-xs text-gray-600">Manpower Requisition Form Details.</p>
        </div>

        <!-- Job Position -->
        <div>
            <label class="font-medium text-xs">Job Position</label>
            <input type="text" name="job_position" placeholder="e.g. Junior Mobile Developer"
                wire:model="job_position" readonly
                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
            @error('job_position') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
        </div>

        <!-- Job Description -->
        <div>
            <label class="font-medium text-xs">Job Description</label>
            <textarea name="job_description" placeholder="e.g. Proficient in Laravel"
                wire:model="job_description" readonly
                class="w-full bg-gray-100 rounded border border-gray-300 px-2 py-1 text-sm mt-1 focus:outline-blue-500 resize-none"
                rows="3"></textarea>
            @error('job_description') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
        </div>

        <!-- Department  -->
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label class="font-medium text-xs">Department</label>
                <select name="department" wire:model="department" disabled
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-xs mt-1 focus:outline-blue-500">
                    <option value="IST">IST</option>
                </select>
                @error('department') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
            </div>
            <div>
                <label class="font-medium text-xs">Requisition Type</label>
                <select name="requisition_type" wire:model="requisition_type" disabled
                    class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-xs mt-1 focus:outline-blue-500">
                    <option value="Replacement">Replacement</option>
                    <option value="New Position">New Position</option>
                    <option value="Temporary Position">Temporary Position</option>
                    <option value="Internship">Internship</option>
                    <option value="Part-Time">Part-Time</option>
                </select>
            </div>
        </div>

        <!-- Requestor Name -->
        <div>
            <label class="font-medium text-xs">Requestor Name</label>
            <input type="text" name="requestor_name" placeholder="e.g. John Doe"
                wire:model="requestor_name" readonly
                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
            @error('requestor_name') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
        </div>

        <!-- Salary Range (Min & Max) -->
        <div>
            <label class="font-medium text-xs">Salary Range</label>
            <div class="flex gap-2 mt-1">
                <input type="number" name="salary_min" placeholder="Min"
                    wire:model="salary_min" readonly
                    class="w-1/2 bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                <input type="number" name="salary_max" placeholder="Max"
                    wire:model="salary_max" readonly
                    class="w-1/2 bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
            </div>
            @error('salary_min') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
            @error('salary_max') <em class="text-xs text-red-500">{{ $message }}</em> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="mt-4 w-full bg-blue-600 text-white px-3 py-1.5 rounded text-sm hover:bg-blue-700">
            Approve
        </button>
    </div>
</form>
