<div x-data="{ selectedStep: 0, employment_type : '', selected : 'job information', selected_tabs : ['job information', 'hiring specifications', 'requested', 'endorsed', 'approved']}"
    class="bg-white shadow-lg rounded-lg text-sm">
    <div>
        <div class="text-gray-700 p-7 space-y-5 ">
            <!-- Heading -->
            <div class="border-b border-gray-200 pb-3">
                <h1 class="text-base font-bold uppercase">Create Manpower Requisition</h1>
                <p class="text-sm text-gray-600">Submit a manpower requisition form.</p>
            </div>

            {{-- Form Navigation  --}}
            <div>
                <ul class="steps w-full justify-center bg-[#f1f5fb] p-4 rounded-lg shadow-sm border border-[#d0d7e2]">
                    <template x-for="(step, index) in ['Job Information', 'Hiring Specification', 'Requestor Details', 'Verifier Details', 'Approval Information']" :key="index">
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
                            <input type="text" disabled wire:model="requisition_department" class="w-full bg-gray-100 h-fit rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                        </div>

                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Section</label>
                            <input type="text" disabled name="requisition_section" wire:model="requisition_section" class="w-full bg-gray-100 h-fit rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
   
                        </div>
                    </div>

                    <!-- Job Position -->
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Initial Job Title/Class:</label>
                            <input type="text" name="requisition_initial_job_position" placeholder="e.g. Junior Mobile Developer"
                                wire:model="requisition_initial_job_position" disabled
                                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                        </div>

                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Eventual Job Title/Class:</label>
                            <input type="text" name="requisition_eventual_job_position" placeholder="e.g. Junior Mobile Developer"
                                wire:model="requisition_eventual_job_position" disabled
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
                                    <input type="radio" disabled value="New Position" name="requisition_type" wire:model="requisition_type" class="accent-blue-500">
                                    <span>New Position</span>
                                </label>

                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" disabled value="Replacement" name="requisition_type" wire:model="requisition_type" class="accent-blue-500">
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
                                    <input type="radio" disabled wire:model="requisition_employment_type" value="Regular" name="requisition_employment_type" class="accent-blue-500">
                                    <span class="text-start">Regular</span>
                                </label>

                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" disabled wire:model="requisition_employment_type" value="Probationary" name="requisition_employment_type" class="accent-blue-500">
                                    <span>Probationary</span>
                                </label>

                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" disabled wire:model="requisition_employment_type" value="Contractual" name="requisition_employment_type" class="accent-blue-500">
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
                                    disabled
                                    wire:model="requisition_contract_duration"
                                    class="bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm w-full focus:outline-blue-500"
                                >
                            </div>
                        </div>
                    </div>

                    {{-- Budget and Engagement Type --}}
                    <div class="grid grid-cols-2 gap-5">
                        <div class="flex flex-col">
                            <label class="font-medium text-sm mb-1 text-[#071d49]">Budget</label>

                            <div class="flex items-center space-x-8">
                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" disabled wire:model="requisition_budget" value="On Budget" name="requisition_budget" class="accent-blue-500">
                                    <span>On Budget</span>
                                </label>

                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" disabled wire:model="requisition_budget" value="Not On Budget" name="requisition_budget" class="accent-blue-500">
                                    <span>Not On Budget</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="font-medium text-sm mb-1 text-[#071d49]">Engagement Type</label>

                            <div class="flex items-center space-x-4">
                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" disabled wire:model="requisition_engagement_type" value="Direct Hire" name="requisition_engagement_type" class="accent-blue-500">
                                    <span>Direct Hire</span>
                                </label>

                                <label class="flex items-center space-x-1 text-sm">
                                    <input type="radio" disabled wire:model="requisition_engagement_type" value="Thru Agency" name="requisition_engagement_type" class="accent-blue-500">
                                    <span>Thru Agency</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Number Required and Date Required --}}
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Number Required</label>
                            <input type="number" name="requisition_number_required" placeholder="e.g. 1"
                                wire:model="requisition_number_required"
                                disabled
                                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                        </div>

                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Date Required</label>
                            <input type="date" name="requisition_date_required" 
                                wire:model="requisition_date_required" disabled
                                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                        </div>
                    </div>

                    {{-- Justification --}}
                    <div>
                        <label class="font-medium text-sm text-[#071d49]">Justification For This Requisition</label>
                        <input type="text" name="requisition_justification" placeholder="e.g. IAMS Accounting Developer"
                            wire:model="requisition_justification" disabled
                            class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                    </div>

                    <!-- Job Descriptions -->
                    <div  class="space-y-2 mt-1">
                        <label class="font-medium text-sm text-[#071d49] block">Basic Function / Duties And Responsibilities</label>

                        <div class="space-y-2">
                            @foreach ($requisition_job_descriptions as $description)
                                <input 
                                    type="text" 
                                    value="{{ $description->requisition_duty_description }}"
                                    disabled
                                    class="w-full bg-gray-100 rounded border border-gray-300 px-2 py-1 text-sm focus:outline-blue-500"
                                    placeholder="e.g. Design, develop, test, and maintain applications"
                                />
                            @endforeach
                        </div>
                    </div>
            </div>
            
            {{-- Hiring Specifications --}}
            <div x-show="selected === 'hiring specifications'" class="flex flex-col ">
                    <!-- Education Attainment -->
                    <div class="space-y-2 mt-1 mb-4">
                        <label class="font-medium text-sm text-[#071d49] block">Educational Attainment</label>
                        <div class="space-y-2">
                            @foreach ($requisition_education_levels as $description)
                                <input 
                                    type="text" 
                                    value="{{ $description->requisition_education_level_description }}"
                                    disabled
                                    class="w-full bg-gray-100 rounded border border-gray-300 px-2 py-1 text-sm focus:outline-blue-500"
                                    placeholder="e.g. Design, develop, test, and maintain applications"
                                />
                            @endforeach
                        </div>
                    </div>

                    <!-- Work Experience -->
                    <div class="space-y-2 mt-1 mb-4">
                        <label class="font-medium text-sm text-[#071d49] block">Work Experience</label>
                        <div class="space-y-2">
                            @foreach ($requisition_work_experiences as $description)
                                <input 
                                    type="text" 
                                    value="{{ $description->requisition_work_experience_description }}"
                                    disabled
                                    class="w-full bg-gray-100 rounded border border-gray-300 px-2 py-1 text-sm focus:outline-blue-500"
                                    placeholder="e.g. Design, develop, test, and maintain applications"
                                />
                            @endforeach
                        </div>
                    </div>

                    <!-- Special Skills -->
                    <div class="space-y-2 mt-1 mb-4">
                        <label class="font-medium text-sm text-[#071d49] block">Special Skills</label>

                        <div class="space-y-2">
                            @foreach ($requisition_special_skills as $description)
                                <input 
                                    type="text" 
                                    value="{{ $description->requisition_special_skill_description }}"
                                    disabled
                                    class="w-full bg-gray-100 rounded border border-gray-300 px-2 py-1 text-sm focus:outline-blue-500"
                                    placeholder="e.g. Design, develop, test, and maintain applications"
                                />
                            @endforeach
                        </div>
                    </div>

                    <!-- Other (Specify) -->
                    <div class="space-y-2 mt-1 mb-4">
                        <label class="font-medium text-sm text-[#071d49] block">Other (Specify)</label>

                        <div class="space-y-2">
                            @foreach ($requisition_other_descriptions as $description)
                                <input 
                                    type="text" 
                                    value="{{ $description->requisition_other_description }}"
                                    disabled
                                    class="w-full bg-gray-100 rounded border border-gray-300 px-2 py-1 text-sm focus:outline-blue-500"
                                    placeholder="e.g. Design, develop, test, and maintain applications"
                                />
                            @endforeach
                        </div>
                    </div>

                    {{-- Possible Sources and Recommended Candidates --}}
                    <div class="grid grid-cols-2 gap-5 ">
                        <!-- Left: Text Input -->
                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Possible Sources of Applicants</label>
                            <input type="text" name="requisition_applicants_sources"
                                placeholder="e.g. IAMS Accounting Developer"
                                wire:model="requisition_applicants_sources" disabled
                                class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm mt-1 focus:outline-blue-500">
                        </div>

                        <div>
                            <label class="font-medium text-sm text-[#071d49]">Recommended Candidates</label>

                        <div class="space-y-1 mt-1">
                            @foreach ($candidates as $candidate)
                                <input 
                                    type="text" 
                                    value="{{ $candidate->candidate_firstname . ' ' . $candidate->candidate_middlename . ' ' . $candidate->candidate_lastname }}" 
                                    class="w-full bg-gray-100 rounded border border-gray-300 px-2 py-0 text-sm h-8 focus:outline-blue-500"
                                    disabled
                                >
                            @endforeach
                        </div>

                        </div>

                    </div>
            </div>
                
            {{-- Requested By Field --}}
            <div x-show="selected === 'requested'" class="grid grid-cols-3 gap-5">
                <!-- Requestor Name -->
                <div class="flex flex-col justify-start">
                    <!-- Grouped label block to avoid pushing input down -->
                    <div class="mb-1">
                        <div class="text-sm font-bold text-[#071d49] uppercase tracking-wide">Requested By:</div>
                        <label class="text-sm font-medium">Name</label>
                    </div>

                    <input type="text" name="requisition_requestor_name" placeholder="e.g. John Doe"
                        wire:model="requisition_requestor_name" disabled
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                </div>

                <!-- Position -->
                <div class="flex flex-col justify-end">
                    <label class="font-medium text-sm mb-1">Position</label>
                    <input type="text" name="requisition_requestor_position" placeholder="e.g. IST - Department Head"
                        wire:model="requisition_requestor_position" disabled
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                </div>

                <!-- Signature -->
                <div class="flex flex-col relative space-y-2 mt-4">
                    <label class="font-semibold text-sm text-[#071d49]">Requestor Signature</label>

                    @if ($requisition_requestor_signature ?? false)
                        <div class="flex items-center h-8 justify-between bg-blue-50 border border-blue-200 px-3 py-2 rounded-md shadow-sm">
                            <span class="text-sm text-blue-700 truncate">
                                {{ basename($requisition_requestor_signature) }}
                            </span>

                            <a href="{{ asset('storage/' . $requisition_requestor_signature) }}"
                                class="text-xs text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-md transition"
                                target="_blank">
                                View
                            </a>
                        </div>
                    @else
                        <p class="text-sm text-gray-400 italic">No signature uploaded.</p>
                    @endif
                </div>


            </div>

            {{-- Endorsed and Checked --}}
            <div x-show="selected === 'endorsed'" class="grid grid-cols-3 gap-5">
                <!-- Requestor Name -->
                <div class="flex flex-col justify-start">
                    <!-- Grouped label block to avoid pushing input down -->
                    <div class="mb-1">
                        <div class="text-sm font-bold text-[#071d49] uppercase tracking-wide">Checked and Endorsed By:</div>
                        <label class="text-sm font-medium">Name</label>
                    </div>

                    <input type="text" name="requisition_endorser_name" placeholder="N/A"
                        wire:model="requisition_endorser_name" disabled
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                    @error('requisition_endorser_name') 
                        <em class="text-sm text-red-500 mt-1">{{ $message }}</em> 
                    @enderror
                </div>

                <!-- Position -->
                <div class="flex flex-col justify-end">
                    <label class="font-medium text-sm mb-1">Position</label>
                    <input type="text" name="requisition_endorser_position" placeholder="N/A"
                        wire:model="requisition_endorser_position" disabled
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                    @error('requisition_endorser_position') 
                        <em class="text-sm text-red-500 mt-1">{{ $message }}</em> 
                    @enderror
                </div>

                <!-- Signature -->
                <div class="flex flex-col relative space-y-2 mt-4">
                    <label class="font-medium text-sm mb-1">Signature</label>
                    @if ($requisition_endorser_signature ?? false)
                        <div class="flex items-center h-8 justify-between bg-blue-50 border border-blue-200 px-3 py-2 rounded-md shadow-sm">
                            <span class="text-sm text-blue-700 truncate">
                                {{ basename($requisition_endorser_signature) }}
                            </span>

                            <a href="{{ asset('storage/' . $requisition_endorser_signature) }}"
                                class="text-xs text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-md transition"
                                target="_blank">
                                View
                            </a>
                        </div>
                    @else
                        <span class="text-sm text-blue-700 truncate">
                            <p class="text-sm text-gray-400 italic">No signature uploaded.</p>
                        </span>
                    @endif
                </div>
            </div>

            {{-- Approved By --}}
            <div x-show="selected === 'approved'" class="grid grid-cols-3 gap-5">
                <!-- Requestor Name -->
                <div class="flex flex-col justify-start">
                    <!-- Grouped label block to avoid pushing input down -->
                    <div class="mb-1">
                        <div class="text-sm font-bold text-[#071d49] uppercase tracking-wide">Approved By:</div>
                        <label class="text-sm font-medium">Name</label>
                    </div>

                    <input type="text" name="requisition_approver_name" placeholder="N/A"
                        wire:model="requisition_approver_name" disabled
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                </div>

                <!-- Position -->
                <div class="flex flex-col justify-end">
                    <label class="font-medium text-sm mb-1">Position</label>
                    <input type="text" name="requisition_approver_position" placeholder="N/A"
                        wire:model="requisition_approver_position" disabled
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                </div>

                <!-- Signature -->
                <div class="flex flex-col relative space-y-2 mt-4">
                    <label class="font-medium text-sm mb-1">Signature</label>
                    @if ($requisition_approver_signature ?? false)
                        <div class="flex items-center h-8 justify-between bg-blue-50 border border-blue-200 px-3 py-2 rounded-md shadow-sm">
                            <span class="text-sm text-blue-700 truncate">
                                {{ basename($requisition_approver_signature) }}
                            </span>

                            <a href="{{ asset('storage/' . $requisition_approver_signature) }}"
                                class="text-xs text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-md transition"
                                target="_blank">
                                View
                            </a>
                        </div>
                    @else
                        <span class="text-sm text-blue-700 truncate">
                            <p class="text-sm text-gray-400 italic">No signature uploaded.</p>
                        </span>
                    @endif
                </div>

                {{-- Name --}}
                <div class="flex flex-col justify-start">
                    <div class="mb-1">
                        <label class="text-sm font-medium">Name</label>
                    </div>
                    <input type="text" name="requisition_approver_name_1" placeholder="N/A"
                        wire:model="requisition_approver_name_1"
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                </div>

                <!-- Position -->
                <div class="flex flex-col">
                    <label class="font-medium text-sm mb-1">Position</label>
                    <input type="text" name="requisition_approver_position_1" placeholder="N/A"
                        wire:model="requisition_approver_position_1" disabled
                        class="w-full bg-gray-100 h-8 rounded border border-gray-300 px-2 text-sm focus:outline-blue-500">
                </div>

                <!-- Signature -->
                <div class="flex flex-col relative space-y-2">
                    <label class="font-medium text-sm mb-1">Signature</label>
                    @if ($requisition_approver_signature_1 ?? false)
                        <div class="flex items-center h-8 justify-between bg-blue-50 border border-blue-200 px-3 py-2 rounded-md shadow-sm">
                            <span class="text-sm text-blue-700 truncate">
                                {{ basename($requisition_approver_signature_1) }}
                            </span>

                            <a href="{{ asset('storage/' . $requisition_approver_signature_1) }}"
                                class="text-xs text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-md transition"
                                target="_blank">
                                View
                            </a>
                        </div>
                    @else
                        <span class="text-sm text-blue-700 truncate">
                            <p class="text-sm text-gray-400 italic">No signature uploaded.</p>
                        </span>
                    @endif
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

        </div>
    </div>
</div>

