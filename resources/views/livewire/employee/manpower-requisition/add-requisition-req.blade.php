<div @close-modal.window="open_add=false" 
  
    x-data="{ selectedStep: 0, employment_type : '', selected : 'job information', selected_tabs : ['job information', 'hiring specifications']}"
    class="bg-white shadow-lg rounded-lg text-sm">
    <form wire:submit="confirmAdd" >
        @csrf
        <div class="text-gray-700 p-7 space-y-5 ">
            <!-- Heading -->
            <div class="border-b border-gray-200 pb-3">
                <h1 class="text-base font-bold uppercase">Create Manpower Requisition</h1>
                <p class="text-sm text-gray-600">Submit a manpower requisition form.</p>
            </div>

            {{-- Form Navigation  --}}
            <div>
                <ul class="steps w-full justify-center bg-[#f1f5fb] p-4 rounded-lg shadow-sm border border-[#d0d7e2]">
                    {{-- <template x-for="(step, index) in ['Job Information', 'Hiring Specification', 'Requestor Details', 'Endorser Details', 'Approver Details']" :key="index"> --}}
                    <template x-for="(step, index) in ['Job Information', 'Hiring Specification']" :key="index">
                        <li 
                            @click="selectedStep = index; selected = selected_tabs[index];"
                            :class="[
                                'step',
                                index <= selectedStep ? 'step-primary' : '',
                                index === 0 ? 'before:hidden' : ''
                            ]"
                            class="cursor-pointer"
                            x-text="step"
                        ></li>
                    </template>
                </ul>
            </div>
            
            {{-- Job Information Section --}}
            <div x-show="selected === 'job information'" class="flex flex-col gap-y-5">
                    <!-- Department And Requisition Type -->
                    <div class="grid grid-cols-2 gap-5">
                        <div> <!-- enough margin-bottom -->
                            <label class="font-medium text-sm text-[#071d49]">Department</label>
                            <select name="department_id" wire:model="department_id"
                                class="w-full bg-gray-100 h-fit rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                            @error('department_id') <em class="text-sm text-red-500">{{ $message }}</em> @enderror
                        </div>

                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Section</label>
                            <input type="text" name="requisition_section" wire:model="requisition_section" placeholder="e.g Development Team"
                                class="w-full bg-gray-100 h-fit rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
        
                            @error('requisition_section') <em class="text-sm text-red-500">{{ $message }}</em> @enderror
                        </div>
                    </div>

                    <!-- Job Position -->
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Initial Job Title/Class:</label>
                            <input type="text" name="requisition_initial_job_position" placeholder="e.g. Junior Mobile Developer"
                                wire:model="requisition_initial_job_position"
                                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                            @error('requisition_initial_job_position') <em class="text-sm text-red-500">{{ $message }}</em> @enderror
                        </div>

                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Eventual Job Title/Class:</label>
                            <input type="text" name="requisition_eventual_job_position" placeholder="e.g. Junior Mobile Developer"
                                wire:model="requisition_eventual_job_position"
                                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                            @error('requisition_eventual_job_position') <em class="text-sm text-red-500">{{ $message }}</em> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <!-- Requisition Type -->
                        <div class="flex flex-col">
                            <label class="font-medium text-sm mb-1 text-[#071d49]">Requisition Type</label>
                            <div class="flex items-center space-x-4">

                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" value="New Position" name="requisition_type" wire:model="requisition_type" class="accent-blue-500">
                                    <span>New Position</span>
                                </label>

                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" value="Replacement" name="requisition_type" wire:model="requisition_type" class="accent-blue-500">
                                    <span>Replacement</span>
                                </label>
                            </div>
                            @error('requisition_type')
                                <em class="text-sm text-red-500 mt-1">{{ $message }}</em>
                            @enderror
                        </div>

                        <!-- Employment Type + Contract Duration -->
                        <div class="flex flex-col">
                            <label class="font-medium text-sm mb-1 text-[#071d49]">Employment Type</label>

                            <div class="flex items-center space-x-9">
                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" wire:model="requisition_employment_type" value="Regular" x-model="employment_type" name="requisition_employment_type" class="accent-blue-500">
                                    <span class="text-start">Regular</span>
                                </label>

                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" wire:model="requisition_employment_type" value="Probationary" x-model="employment_type" name="requisition_employment_type" class="accent-blue-500">
                                    <span>Probationary</span>
                                </label>

                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" wire:model="requisition_employment_type" value="Contractual" x-model="employment_type" name="requisition_employment_type" class="accent-blue-500">
                                    <span>Contractual</span>
                                </label>
                            </div>

                            @error('requisition_employment_type')
                                <em class="text-sm text-red-500 mt-1">{{ $message }}</em>
                            @enderror

                            <div class="mt-3" x-show="employment_type === 'Contractual'">
                                <label for="contract-duration" class="text-sm font-medium mb-1 block text-[#071d49]">Duration of Contract</label>
                                <input
                                    type="text"
                                    id="contract-duration"
                                    name="requisition_contract_duration"
                                    placeholder="e.g. 6 months"
                                    wire:model="requisition_contract_duration"
                                    class="bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm w-full focus:outline-blue-500"
                                >
                            </div>

                            @error('requisition_contract_duration')
                                <em class="text-sm text-red-500 mt-1">{{ $message }}</em>
                            @enderror
                        </div>
                    </div>

                    {{-- Budget and Engagement Type --}}
                    <div class="grid grid-cols-2 gap-5">
                        <div class="flex flex-col">
                            <label class="font-medium text-sm mb-1 text-[#071d49]">Budget</label>

                            <div class="flex items-center space-x-8">
                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" wire:model="requisition_budget" value="On Budget" name="requisition_budget" class="accent-blue-500">
                                    <span>On Budget</span>
                                </label>

                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" wire:model="requisition_budget" value="Not On Budget" name="requisition_budget" class="accent-blue-500">
                                    <span>Not On Budget</span>
                                </label>
                            </div>
                 
                            @error('requisition_budget')
                                <em class="text-sm text-red-500 mt-1">{{ $message }}</em>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label class="font-medium text-sm mb-1 text-[#071d49]">Engagement Type</label>

                            <div class="flex items-center space-x-4">
                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" wire:model="requisition_engagement_type" value="Direct Hire" name="requisition_engagement_type" class="accent-blue-500">
                                    <span>Direct Hire</span>
                                </label>

                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" wire:model="requisition_engagement_type" value="Thru Agency" name="requisition_engagement_type" class="accent-blue-500">
                                    <span>Thru Agency</span>
                                </label>
                            </div>

                            @error('requisition_engagement_type')
                                <em class="text-sm text-red-500 mt-1">{{ $message }}</em>
                            @enderror
                        </div>
                    </div>

                    {{-- Number Required and Date Required --}}
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Number Required</label>
                            <input type="number" name="requisition_number_required" placeholder="e.g. 1"
                                wire:model="requisition_number_required"
                                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                            @error('requisition_number_required') <em class="text-sm text-red-500">{{ $message }}</em> @enderror
                        </div>

                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Date Required</label>
                            <input type="date" name="requisition_date_required"
                                wire:model="requisition_date_required"
                                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                            @error('requisition_date_required') <em class="text-sm text-red-500">{{ $message }}</em> @enderror
                        </div>
                    </div>

                    {{-- Justification --}}
                    <div>
                        <label class="font-medium text-sm text-[#071d49]">Justification For This Requisition</label>
                        <textarea wire:model="requisition_justification" class="w-full bg-gray-100 h-28 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500 resize-none">
                        
                        </textarea>
                        @error('requisition_justification') <em class="text-sm text-red-500">{{ $message }}</em> @enderror
                    </div>

                    <!-- Job Descriptions -->
                    <div class="space-y-2 mt-1">
                        <label class="font-medium text-sm text-[#071d49] block">Basic Function / Duties And Responsibilities</label> 
                        
                        <textarea wire:model="requisition_job_description" class="w-full bg-gray-100 h-28 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500 resize-none">
                        
                        </textarea>

                        @error('requisition_job_description') 
                            <em class="text-sm text-red-500">{{ $message }}</em> 
                        @enderror
                    </div>
            </div>
            
            {{-- Hiring Specifications --}}
            <div x-show="selected === 'hiring specifications'" class="flex flex-col ">
                    <!-- Education Attainment -->
                    <div class="space-y-2 mt-1">
                        <label class="font-medium text-sm text-[#071d49] block">Educational Attainment</label>

                        <textarea wire:model="requisition_education_level" class="w-full bg-gray-100 h-28 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500 resize-none">
                        
                        </textarea>

                        @error('requisition_education_level') 
                            <em class="text-sm text-red-500">{{ $message }}</em> 
                        @enderror
                    </div>

                    <!-- Work Experience -->
                    <div class="space-y-2 mt-6">
                        <label class="font-medium text-sm text-[#071d49] block">Work Experience</label>
                        
                        <textarea wire:model="requisition_work_experience" class="w-full bg-gray-100 h-28 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500 resize-none">
                        
                        </textarea>

                        @error('requisition_work_experience') 
                            <em class="text-sm text-red-500">{{ $message }}</em> 
                        @enderror
                    </div>

                    <!-- Special Skills -->
                    <div class="space-y-2 mt-6">
                        <label class="font-medium text-sm text-[#071d49] block">Special Skills</label>

                        <textarea wire:model="requisition_special_skill" class="w-full bg-gray-100 h-28 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500 resize-none">
                        
                        </textarea>

                        @error('requisition_special_skill') 
                            <em class="text-sm text-red-500">{{ $message }}</em> 
                        @enderror
                    </div>

                    <!-- Other (Specify) -->
                    <div class="space-y-2 mt-6">
                        <label class="font-medium text-sm text-[#071d49] block">Other (Specify)</label>

                        <textarea wire:model="requisition_other_description" class="w-full bg-gray-100 h-28 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500 resize-none">
                        
                        </textarea>

                        @error('requisition_other_description') 
                            <em class="text-sm text-red-500">{{ $message }}</em> 
                        @enderror
                    </div>

                    {{-- Possible Sources and Recommended Candidates --}}
                    <div class="grid grid-cols-2 gap-5 mt-6">
                        <!-- Left: Text Input -->
                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Possible Sources of Applicants</label>
                            <input type="text" name="requisition_applicants_sources"
                                placeholder="e.g. IAMS Accounting Developer"
                                wire:model="requisition_applicants_sources"
                                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                            @error('requisition_applicants_sources')
                                <em class="text-sm text-red-500">{{ $message }}</em>
                            @enderror
                        </div>

                        @php
                            $candidateList = collect($candidates)->values()->all(); 
                        @endphp

                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Recommended Candidates</label>

                            <div 
                                x-data="{
                                    selected: @entangle('requisition_candidates').live,
                                    allCandidates: @js($candidateList),

                                    addCandidate() {
                                        this.selected.push({ id: Date.now() + Math.random(), value: '' });
                                    },

                                    removeCandidate(index) {
                                        this.selected.splice(index, 1);
                                    },

                                availableOptions(index) {
                                    const selectedIds = this.selected.map(c => Number(c.value));
                                    const currentId = Number(this.selected[index].value);

                                    return this.allCandidates.filter(candidate =>
                                        !selectedIds.includes(candidate.id) || candidate.id === currentId
                                    );
                                }

                                }"
                                x-init="if (!Array.isArray(selected) || selected.length === 0) {
                                    selected = [{ id: Date.now(), value: '' }];
                                }"
                                class="space-y-1 mt-1"
                            >
                                <template x-for="(candidate, index) in selected" :key="candidate.id">
                                    <div class="flex gap-2 items-center">
                                        <select
                                            :name="`requisition_candidates[${index}]`"
                                            x-model="candidate.value"
                                            class="w-full bg-gray-100 rounded border border-gray-300 px-2 py-0 text-sm h-8 focus:outline-blue-500"
                                        >
                                            <option value="" disabled>Select Candidate</option>
                                            <template x-for="option in availableOptions(index)" :key="option.id">
                                                <option :value="option.id" x-text="option.name"></option>
                                            </template>
                                        </select>

                                        <template x-if="selected.length > 1">
                                            <button type="button" @click="removeCandidate(index)"
                                                class="text-red-600 text-xs hover:underline">
                                                Remove
                                            </button>
                                        </template>
                                    </div>
                                </template>

                                <!-- Add Button -->
                                <div class="flex items-center gap-2 justify-end pt-1">
                                    <button type="button" @click="addCandidate"
                                        :disabled="selected.length >= allCandidates.length"
                                        class="text-white bg-[#071d49] hover:bg-[#abcae9] hover:text-[#071d49] hover:font-medium flex items-center gap-1.5 rounded-md px-2.5 py-1.5 text-xs font-medium focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        Add More Candidate
                                    </button>
                                </div>

                                @error('requisition_candidates') 
                                    <em class="text-sm text-red-500">{{ $message }}</em> 
                                @enderror
                            </div>
                        </div>

                    </div>
            </div>
            
            <div class="flex gap-x-5">
                <!-- Previous Button -->
                <a 
                    @click="
                        if (selectedStep > 0) {
                            selectedStep--; 
                            selected = selected_tabs[selectedStep]; 
                            $nextTick(() => $refs.scrollContainer.scrollTo({ top: 0, behavior: 'smooth' }));
                        }
                    "
                    class="cursor-pointer mt-4 w-[50%] bg-gray-600 text-white px-3 py-1.5 rounded text-sm hover:bg-[#071d49] text-center">
                    Previous
                </a>

                <!-- Next Button -->
                <a 
                    @click="
                        if (selectedStep < selected_tabs.length - 1) {
                            selectedStep++; 
                            selected = selected_tabs[selectedStep]; 
                            $nextTick(() => $refs.scrollContainer.scrollTo({ top: 0, behavior: 'smooth' }));
                        }
                    "
                    class="cursor-pointer mt-4 w-[50%] bg-gray-600 text-white px-3 py-1.5 rounded text-sm hover:bg-[#071d49] text-center">
                    Next
                </a>
            </div>

            <!-- Submit Button -->
            <div class="flex gap-x-5" x-show="selected_tabs[selectedStep] === 'hiring specifications'">
                <button type="submit"
                    class="cursor-pointer mt-4 w-full bg-[#071d49] text-white px-3 py-1.5 rounded text-sm hover:bg-[#071d49]">
                    Create
                </button>
                {{-- <a href="{{ route('requisition.index') }}"
                    class="cursor-pointer mt-4 w-[50%] bg-gray-600 text-white px-3 py-1.5 rounded text-sm hover:bg-[#071d49] text-center">
                    Back
                </a> --}}
            </div>
        </div>
    </form>
</div>

