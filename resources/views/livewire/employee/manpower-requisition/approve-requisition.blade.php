<div @close-modal.window="open_add=false" 
  
    x-data="{ selectedStep: 0, employment_type : @entangle('requisition_employment_type').live, 
              status: @entangle('requisition_status').live, 
              selected : 'Job Information',
              get selected_tabs() {
                    if (this.status === 1) {
                        return ['Job Information', 'Hiring Specifications', 'Requestor Details'];
                    } 
                    else if (this.status === 2) {
                        return ['Job Information', 'Hiring Specifications', 'Requestor Details', 'HR Details'];
                    }
                    else if (this.status === 3){
                        return ['Job Information', 'Hiring Specifications', 'Requestor Details', 'HR Details', 'CFO Information'];
                    }
                    else if (this.status === 4){
                        return ['Job Information', 'Hiring Specifications', 'Requestor Details', 'HR Details', 'CFO Information', 'CEO Information'];
                    }
                },

                async validateAndSwitchTab(index) {
                    if (index > this.selectedStep) {
                        try {
                            let res = await $wire.validateStep(this.selectedStep); // validate current step before going forward
                            if(res){
                                this.selectedStep = index;
                                this.selected = this.selected_tabs[index];
                            }
                        } catch (error) {
                            console.error('Validation failed', error);
                            // Optionally show SweetAlert or toast here
                        }
                    } else {
                        this.selectedStep = index;
                        this.selected = this.selected_tabs[index];
                    }
                },

                async validateAndSwitch(direction) {
                    if (direction === 'next' && this.selectedStep < this.selected_tabs.length - 1) {
                        try {
                            let res = await $wire.validateStep(this.selectedStep);
                            if(res){
                                this.selectedStep++;
                                this.selected = this.selected_tabs[this.selectedStep];
                            }

                            $nextTick(() => this.$refs.scrollContainer.scrollTo({ top: 0, behavior: 'smooth' }));
                        } catch (error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Please complete all required fields',
                                text: 'You must fill out all fields in this step before proceeding.',
                            });
                        }
                    } else if (direction === 'previous' && this.selectedStep > 0) {
                        this.selectedStep--;
                        this.selected = this.selected_tabs[this.selectedStep];
                        $nextTick(() => this.$refs.scrollContainer.scrollTo({ top: 0, behavior: 'smooth' }));
                    }
                }
            }"
    class="bg-white shadow-lg rounded-lg text-sm">
    
    <form wire:submit="confirmApprove" >
        @csrf
        <div class="text-gray-700 p-7 space-y-5 ">
            <!-- Heading -->
            <div class="border-b border-gray-200 pb-3">
                <h1 class="text-base font-bold uppercase">Approve Manpower Requisition</h1>
                <p class="text-sm text-gray-600">Approve a manpower requisition form.</p>
            </div>

            {{-- Form Navigation  --}}
            <div>
                <ul class="steps w-full justify-center bg-[#f1f5fb] p-4 rounded-lg shadow-sm border border-[#d0d7e2]">
                    {{-- <template x-for="(step, index) in ['Job Information', 'Hiring Specification', 'Requestor Details', 'Verifier Details', 'Approval Information']" :key="index"> --}}
                    <template x-for="(step, index) in selected_tabs" :key="index">
                        <li 
                            @click="validateAndSwitchTab(index)"
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
            <div x-show="selected === 'Job Information'" class="flex flex-col gap-y-5">
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

                    {{-- Job Description --}}
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
            <div x-show="selected === 'Hiring Specifications'" class="flex flex-col ">
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
                    <div class="grid grid-cols-2 gap-5">
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
                            // dump($requisition_candidates);
                        @endphp
                                            
                        <div 
                           x-data="{
                                candidate: @entangle('requisition_candidates').live,
                                allCandidates: @js($candidateList),

                                addCandidate() {
                                    this.candidate.push({ id: Date.now() + Math.random(), value: '' });
                                },

                                removeCandidate(index) {
                                    this.candidate.splice(index, 1);
                                },

                                findCandidate(id) {
                                    return this.allCandidates.find(c => c.id === Number(id)) || { id: id, name: 'Unknown' };
                                },
                                  availableOptions(index) {
                                        const currentId = Number(this.candidate[index].value);

                                        const selectedIds = this.candidate
                                            .map((c, i) => i !== index ? Number(c.value) : null)
                                            .filter(id => id !== null && !isNaN(id));

                                        return this.allCandidates.map(option => ({
                                            ...option,
                                            disabled: selectedIds.includes(option.id) && option.id !== currentId
                                        }));
                                    }
                            }"

                            x-init="if (!Array.isArray(candidate) || candidate.length === 0) {
                                candidate = [{ id: Date.now(), value: '' }];
                            }"
                            class="space-y-1 mt-1"
                        >

                        <label class="font-medium text-sm text-[#071d49]">Recommended Candidates</label>

                        {{-- <pre x-text="JSON.stringify(candidate, null, 2)"></pre> --}}

                            <template x-for="(item, index) in candidate" :key="item.id">
                                <div class="flex gap-2 items-center">
                                   <select
                                        :name="`requisition_candidates[${index}].value`"
                                        x-model="item.value"
                                        class="w-full bg-gray-100 rounded border border-gray-300 px-2 py-0 text-sm h-8 focus:outline-blue-500"
                                    >
                                        <option value="" disabled>Select Candidate</option>
                                            <!-- Selected Candidate (always shown on top) -->
                                            <template x-if="item.value">
                                                <option 
                                                    :value="item.value" 
                                                    x-text="findCandidate(item.value).name">
                                                </option>
                                            </template>

                                            <!-- All other options (with duplicate prevention) -->
                                            <template x-for="option in availableOptions(index)" :key="option.id">
                                                <option 
                                                    :value="option.id" 
                                                    :disabled="option.disabled"
                                                    x-text="option.name">
                                                </option>
                                            </template>

                                    </select>

                                    <template x-if="candidate.length > 1">
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
                                    :disabled="candidate.length >= allCandidates.length"
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
                
            {{-- Requested By Field --}}
            <div x-show="selected === 'Requestor Details'" class="grid grid-cols-2 gap-5">
                <!-- Requestor Name -->
                <div class="flex flex-col justify-start">
                    <!-- Grouped label block to avoid pushing input down -->
                    <div class="mb-1">
                        <div class="text-sm font-bold text-[#071d49] uppercase tracking-wide">Requested By:</div>
                        <label class="text-sm font-medium">Name</label>
                    </div>

                    <input type="text" name="requisition_requestor_name" placeholder="e.g. John Doe"
                        wire:model="requisition_requestor_name"
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                    @error('requisition_requestor_name') 
                        <em class="text-sm text-red-500 mt-1">{{ $message }}</em> 
                    @enderror
                </div>

                <!-- Position -->
                <div class="flex flex-col justify-end">
                    <label class="font-medium text-sm mb-1">Position</label>
                    <input type="text" name="requisition_requestor_position" placeholder="e.g. IST - Department Head"
                        wire:model="requisition_requestor_position"
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                    @error('requisition_requestor_position') 
                        <em class="text-sm text-red-500 mt-1">{{ $message }}</em> 
                    @enderror
                </div>

            </div>

            {{-- Endorsed and Checked --}}
            <div x-show="selected === 'HR Details'" class="grid grid-cols-2 gap-5">
                <!-- Endorser Name -->
                <div class="flex flex-col justify-start">
                    <label class="text-sm font-bold text-[#071d49] uppercase tracking-wide">Checked and Endorsed By:</label>
                    <label class="text-sm font-medium mt-1 mb-1">Name</label>
                    <input type="text" name="requisition_endorser_name" placeholder="e.g. John Doe"
                        wire:model="requisition_endorser_name"
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                    @error('requisition_endorser_name') 
                        <em class="text-sm text-red-500 mt-1">{{ $message }}</em> 
                    @enderror
                </div>

                <!-- Position -->
                <div class="flex flex-col justify-start">
                    <label class="text-sm font-medium mb-1 mt-[22px]">Position</label>
                    <input type="text" name="requisition_endorser_position" placeholder="e.g. IST - Department Head"
                        wire:model="requisition_endorser_position"
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                    @error('requisition_endorser_position') 
                        <em class="text-sm text-red-500 mt-1">{{ $message }}</em> 
                    @enderror
                </div>


            </div>

            {{-- Approved By --}}
            <div x-show="selected === 'CFO Information'" class="grid grid-cols-2 gap-5">
                <!-- CFO Name -->
                <div class="flex flex-col justify-start">
                    <label class="text-sm font-bold text-[#071d49] uppercase tracking-wide">Approved By:</label>
                    <label class="text-sm font-medium mt-1 mb-1">Name</label>
                    <input type="text" name="requisition_approver_name" placeholder="e.g. John Doe"
                        wire:model="requisition_approver_name"
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                    @error('requisition_approver_name') 
                        <em class="text-sm text-red-500 mt-1">{{ $message }}</em> 
                    @enderror
                </div>

                <!-- CFO Position -->
                <div class="flex flex-col justify-end">
                    <label class="font-medium text-sm mb-1">Position</label>
                    <input type="text" name="requisition_approver_position" placeholder="e.g. IST - Department Head"
                        wire:model="requisition_approver_position"
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                    @error('requisition_approver_position') 
                        <em class="text-sm text-red-500 mt-1">{{ $message }}</em> 
                    @enderror
                </div>

            </div>

            <div x-show="selected === 'CEO Information'" class="grid grid-cols-2 gap-5">
                <!-- CEO Name -->
                <div class="flex flex-col justify-start">
                    <label class="text-sm font-bold text-[#071d49] uppercase tracking-wide">Approved By:</label>
                    <label class="text-sm font-medium mb-1 mt-1">Name</label>
                    <input type="text" name="requisition_approver_name_1" placeholder="e.g. John Doe"
                        wire:model="requisition_approver_name_1"
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                    @error('requisition_approver_name_1') 
                        <em class="text-sm text-red-500 mt-1">{{ $message }}</em> 
                    @enderror
                </div>

                <!-- CEO Position -->
                <div class="flex flex-col justify-end mt-[22px]">
                    <label class="font-medium text-sm mb-1">Position</label>
                    <input type="text" name="requisition_approver_position_1" placeholder="e.g. IST - Department Head"
                        wire:model="requisition_approver_position_1"
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                    @error('requisition_approver_position_1') 
                        <em class="text-sm text-red-500 mt-1">{{ $message }}</em> 
                    @enderror
                </div>
            </div>

            <div class="flex gap-x-5">
                <!-- Previous Button -->
                <a 
                    @click="validateAndSwitch('previous')"
                    class="cursor-pointer mt-4 w-[50%] bg-gray-600 text-white px-3 py-1.5 rounded text-sm hover:bg-[#071d49] text-center">
                    Previous
                </a>

                <!-- Next Button -->
                <a 
                    @click="validateAndSwitch('next')"
                    class="cursor-pointer mt-4 w-[50%] bg-gray-600 text-white px-3 py-1.5 rounded text-sm hover:bg-[#071d49] text-center">
                    Next
                </a>
            </div>

            <!-- Submit Button -->
            <div class="flex gap-x-5" x-show="selected_tabs[selectedStep] === selected_tabs[selected_tabs.length - 1]">
                <button type="submit"
                    class="cursor-pointer mt-4 w-full bg-[#071d49] text-white px-3 py-1.5 rounded text-sm hover:bg-[#071d49]">
                    Approve
                </button>
                {{-- <a href="{{ route('requisition.index') }}"
                    class="cursor-pointer mt-4 w-[50%] bg-gray-600 text-white px-3 py-1.5 rounded text-sm hover:bg-[#071d49] text-center">
                    Back
                </a> --}}
            </div>
        </div>
    </form>
</div>


