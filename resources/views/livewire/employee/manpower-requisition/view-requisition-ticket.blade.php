<div>
    <div wire:loading>
        <x-loading-modal />
    </div>
    @if ($requisition)
        <div @close-modal.window="open_view=false" wire:loading.remove class="max-w-sm mx-auto bg-white shadow rounded border border-gray-200 text-sm">
            <div class="text-gray-700 p-4 space-y-3">
                <!-- Heading -->
                <div class="border-b border-gray-200 pb-3">
                    <h1 class="text-base font-semibold uppercase">View Pending Requisition</h1>
                    <p class="text-xs text-gray-600">Manpower Requisition Form Details.</p>
                </div>

                <!-- Job Position -->
                <div>
                    <label class="font-medium text-xs">Job Position</label>
                    <input type="text" name="requisition_job_position" placeholder="e.g. Junior Mobile Developer"
                        value="{{ $requisition->requisition_job_position }}" readonly
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                </div>

                <!-- Job Description -->
                <div>
                    <label class="font-medium text-xs">Job Description</label>
                    <textarea name="requisition_job_description" placeholder="e.g. Proficient in Laravel"
                        readonly
                        class="w-full bg-gray-100 rounded border border-gray-300 px-2 py-1 text-sm mt-1 focus:outline-blue-500 resize-none"
                        rows="3">{{ $requisition->requisition_job_description }}</textarea>
                </div>

                <!-- Department  -->
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="font-medium text-xs">Department</label>
                        <select name="requisition_department" disabled
                            class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-xs mt-1 focus:outline-blue-500">
                            <option value="{{ $requisition->requisition_department }}">{{ $requisition->requisition_department }}</option>
                        </select>
                    </div>
                    <div>
                        <label class="font-medium text-xs">Requisition Type</label>
                        <select name="requisition_type" disabled
                            class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-xs mt-1 focus:outline-blue-500">
                            <option value="{{ $requisition->requisition_type }}">{{ $requisition->requisition_type }}</option>
                        </select>
                    </div>
                </div>

                <!-- Requestor Name -->
                <div>
                    <label class="font-medium text-xs">Requestor Name</label>
                    <input type="text" name="requisition_requestor_name" placeholder="e.g. John Doe"
                        value="{{ $requisition->requisition_requestor_name }}" readonly
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                </div>

                <!-- Salary Range (Min & Max) -->
                <div>
                    <label class="font-medium text-xs">Salary Range (₱)</label>
                    <div class="flex justify-between gap-2 mt-1">
                        <div class="flex flex-col">
                        <input type="number" name="requisition_salary_min" placeholder="Min"
                            value="{{ $requisition->requisition_salary_min }}" readonly
                            class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                        </div>
                        <div class="flex text-center">
                            <span class="text-lg">To</span> 
                        </div>
                        <div class="flex flex-col">
                            <input type="number" name="requisition_salary_max" placeholder="Max"
                            value="{{ $requisition->requisition_salary_max }}" readonly
                            class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex gap-x-4">
                    <button type="button" wire:click="approve" @disabled($requisition->requisition_status === 2)
                        class="mt-4 w-full bg-green-600 text-white px-3 py-1.5 rounded text-sm {{ $requisition->requisition_status !== 2 ? 'hover:bg-[#071d49]' : 'cursor-not-allowed opacity-50' }}">
                        Approve
                    </button>
                    <button type="button" wire:click="reject" @disabled($requisition->requisition_status === 3)
                        class="mt-4 w-full bg-red-600 text-white px-3 py-1.5 rounded text-sm {{ $requisition->requisition_status !== 3 ? 'hover:bg-[#071d49]' : 'cursor-not-allowed opacity-50' }}">
                        Reject
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

