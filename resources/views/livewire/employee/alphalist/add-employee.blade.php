<form wire:submit="add" enctype="multipart/form-data">
    @csrf
    <div x-data="{step: 1}" class="p-10 bg-white rounded-xl h-full space-y-8 @lg/main:space-y-14 shadow-lg">
        <!-- Step Indicator -->
        <ul class="steps w-full justify-center bg-[#f1f5fb] p-4 rounded-lg shadow-sm border border-[#d0d7e2]">
            <template x-for="(label, index) in [
                'Basic Info',
                'Contact Info',
                'Education Details',
                'Job Details',
                'Government ID',
                'Dependents',
                'Emergency Contacts'
            ]" :key="index">
                <li
                    @click="step = index + 1"
                    :class="[
                        'step text-[#071d49]',
                        index + 1 <= step ? 'step-primary' : '',
                        index === 0 ? 'before:hidden' : ''
                    ]"
                    class="cursor-pointer"
                    x-text="label"
                ></li>
            </template>
        </ul>

        <!-- Step Forms -->
        <div x-show="step === 1" class="gap-y-7 flex flex-col">
            <div class="w-full flex flex-col items-start justify-start gap-x-5 ">
                <h2 class="text-lg font-bold mb-2 text-[#071d49]">Part 1: Employee's Basic Information</h2>
                <p class="text-sm text-gray-600 leading-tight"><em>Enter your real Full Name, Suffix and Maiden Name if youre a married Woman.</em></p>
            </div>
            <div class="w-full flex flex-row gap-x-14">
                <div class="w-[20%] flex flex-col gap-y-5 justify-center items-start">
                    <div class="flex flex-col w-full items-start justify-start">
                        <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Profile Image</h6>
                        <p class="text-xs text-gray-600 leading-tight"><em>Choose a new photo to display 
                            as your profile photo.</em></p>
                    </div>
                    <div
                        class="group/image  relative size-[200px] m-auto cursor-pointer *:transition-colors">
                        <img src="data:image/svg+xml;utf-8,<svg xmlns='http://www.w3.org/2000/svg' width='107' height='107' viewBox='0 0 107 107' fill='none'><path d='M88.75 89.25H89.25V88.75V82.875C89.25 79.7557 87.6871 77.0261 85.2382 74.7091C82.7917 72.3943 79.4274 70.4566 75.7249 68.9015C68.3218 65.7922 59.4436 64.1625 53.5 64.1625C47.5564 64.1625 38.6782 65.7922 31.2751 68.9015C27.5726 70.4566 24.2083 72.3943 21.7618 74.7091C19.3129 77.0261 17.75 79.7557 17.75 82.875V88.75V89.25H18.25H88.75ZM1.125 94.625V12.375C1.125 6.18701 6.13152 1.125 12.375 1.125H94.625C100.811 1.125 105.875 6.18864 105.875 12.375V94.625C105.875 100.811 100.811 105.875 94.625 105.875H12.375C6.13152 105.875 1.125 100.813 1.125 94.625ZM53.5 54C63.5286 54 71.625 45.9036 71.625 35.875C71.625 25.8464 63.5286 17.75 53.5 17.75C43.4714 17.75 35.375 25.8464 35.375 35.875C35.375 45.9036 43.4714 54 53.5 54Z' fill='%23CBD5E1' stroke='%239CA3AF'/></svg>"
                            alt="profile image" name="profile_image" class="size-full outline outline-2 outline-blue-100 rounded-xl">
                        <div class="relative right-1">
                            <input wire:model="employee_profile_picture" type="file" id="file1" accept=".jpg,.jpeg,.png" class="hidden">
                            <label for="file1" class="cursor-pointer absolute -right-1.5 -bottom-1.5 size-[24px] grid place-items-center rounded-full outline outline-2 outline-blue-100 bg-blue-600 group-hover/image:bg-blue-700 group-active/image:bg-blue-900">
                                <svg class="size-[45%]" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.236328 9.90787V12.4842H2.81266L10.4111 4.88573L7.8348 2.30939L0.236328 9.90787ZM12.4035 2.89336C12.6714 2.62542 12.6714 2.1926 12.4035 1.92466L10.7959 0.317028C10.5279 0.0490889 10.0951 0.0490889 9.82717 0.317028L8.56992 1.57428L11.1463 4.15062L12.4035 2.89336V2.89336Z" fill="white" />
                                </svg>
                            </label>
                        </div>
                    </div>
                </div>
                {{-- Basic Information --}}
                <div class="w-[80%] flex flex-col justify-between">
                    {{-- First Row --}}
                    <div class="flex flex-row w-full gap-x-5">
                        <div class="space-y-1 flex flex-col w-[33%]">
                            <label class="hidden text-aapblue @lg/main:block" for="lastName">Last Name</label>
                            <input class="profile_edit_input" type="text" name="employee_lastname"
                            wire:model="employee_lastname"
                            placeholder="Enter your last name" required>
                        </div>
                        <div class="space-y-1 flex flex-col w-[33%]">
                            <label class="hidden text-aapblue @lg/main:block" for="firstName">First Name</label>
                            <input class="profile_edit_input" type="text" name="employee_firstname"
                                wire:model="employee_firstname"
                                placeholder="Enter your first name" required>
                        </div>
                        <div class="space-y-1 flex flex-col w-[33%]">
                            <label class="hidden text-aapblue @lg/main:block" for="middleName">Middle Name</label>
                            <input class="profile_edit_input" type="text" name="employee_middlename"
                                wire:model="employee_middlename"
                                placeholder="Enter your middle name" required>
                        </div>
                    </div>
                    {{-- Second Row --}}
                    <div class="flex flex-row w-full gap-x-5">
                        {{-- <div class="space-y-1 flex flex-col w-[33%]">
                            <label class="hidden text-aapblue @lg/main:block" for="last">Employee ID</label>
                            <input class="profile_edit_input" type="number" name="employee_id"
                                placeholder="123123" required>
                        </div> --}}
                        
                        <div class="space-y-1 flex flex-col w-[33%]">
                            <div class="flex flex-row w-full gap-x-2">
                                <label class="hidden text-aapblue @lg/main:block " for="suffix">Suffix </label>
                                <label for="suffix" class="@lg/main:block hidden text-gray-400"> (n/a if not applicable) </label>
                            </div>
                            <select wire:model="employee_suffix" class="profile_edit_input" type="text" name="employee_suffix" required>
                                <option value="" disabled selected class="text-gray-400 italic">Select options</option>
                                <option value="Jr.">Jr. (Junior)</option>
                                <option value="Sr.">Sr. (Senior)</option>
                                <option value="II.">II. (The Second)</option>
                                <option value="III.">III. (The Third)</option>
                                <option value="IV.">IV. (The Fourth)</option>
                                <option value="V.">V. (The Fifth)</option>
                                <option value="N/A">N/A</option>
                            </select>
                        </div>
                        <div class="space-y-1 flex flex-col w-[33%]">
                            <label class="hidden text-aapblue @lg/main:block " for="maidenName">Mother's Maiden Name </label>
                            <input class="profile_edit_input" type="text" name="employee_maiden_name"
                                wire:model="employee_maiden_name" placeholder="Enter mother's maiden name" required>
                        </div>
                    </div>
                    {{-- Third Row --}}
                    <div class="flex flex-row w-full gap-x-5">
                        <div class="space-y-1 flex flex-col w-[33%]">
                            <label class="hidden text-aapblue @lg/main:block" for="gender">Gender</label>
                            <select wire:model="employee_gender" class="profile_edit_input" type="text" name="employee_gender" required>
                                <option value="" disabled selected class="text-gray-400 italic">Select your Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="space-y-1 flex flex-col w-[33%]">
                            <label class="hidden text-aapblue @lg/main:block" for="birthdate">Birthdate</label>
                            <input class="profile_edit_input" type="date" name="employee_birthdate"
                               wire:model="employee_birthdate" placeholder="Enter your birthdate" required>
                        </div>
                        <div class="space-y-1 flex flex-col w-[33%]">
                            <label class="hidden text-aapblue @lg/main:block" for="birthplace">Birthplace</label>
                            <input class="profile_edit_input" type="text" name="employee_birthplace"
                               wire:model="employee_birthplace" placeholder="Enter your birthplace" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full flex flex-col gap-y-6">
                <div class="flex flex-row w-full gap-x-5">
                    <div class="space-y-1 flex flex-col w-[33%]">
                        <label class="hidden text-aapblue @lg/main:block" for="religion">Religion</label>
                        <select wire:model="employee_religion" class="profile_edit_input hide-scrollbar" type="text" name="employee_religion" required>
                            <option value="" disabled selected class="text-gray-400 italic">Select your Religion</option>
                            <option value="Catholic">Catholic</option>
                            <option value="Christian">Christian</option>
                            <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                            <option value="Seventh Day Adventist Church">Seventh Day Adventist Church</option>
                            <option value="Islam">Islam</option>
                        </select>
                    </div>
                    
                    <div class="flex flex-row w-[33%] gap-x-5">
                        <div class="flex flex-col space-y-1 w-full">
                            <label class="hidden text-aapblue @lg/main:block " for="civilStatus">Civil Status</label>
                            <select wire:model="employee_civil_status" class="profile_edit_input" type="text" name="employee_civil_status" required>
                                <option value="" disabled selected class="text-gray-400 italic">Select options</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Annuled">Annuled</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-y-1 flex flex-col w-[33%]">
                        <div class="flex flex-row w-full gap-x-2">
                            <label class="hidden text-aapblue @lg/main:block " for="middle">Blood Type </label>
                        </div>
                        <select wire:model="employee_blood_type" class="profile_edit_input" type="text" name="employee_blood_type" id="bloodType" required>
                            <option value="" disabled selected class="text-gray-400 italic">Select options</option>
                            <option value="a-positive">A+</option>
                            <option value="a-negative">A-</option>
                            <option value="b-positive">B+</option>
                            <option value="b-negative">B-</option>
                            <option value="ab-positive">AB+</option>
                            <option value="ab-negative">AB-</option>
                            <option value="o-positive">O+</option>
                            <option value="o-negative">O-</option>
                            <option value="rare">Rare Blood Types</option>
                            <option value="rare">Unknown</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-row w-full gap-x-5">
                    {{-- Address --}}
                    
                    <div class="space-y-1 flex flex-col w-[50%]">
                        <div class="flex flex-row w-full gap-x-2">
                            <label class="hidden text-aapblue @lg/main:block " for="homeAddressPresent">Complete Home Address </label>
                            <label for="homeAddressPresent" class="@lg/main:block hidden text-gray-400"> (Present) </label>
                        </div>
                        <div class="flex flex-col w-full gap-y-8">
                            <div class="flex flex-row w-full gap-x-5">
                                <input class="profile_edit_input w-[24%]" type="text" name="present_house_no"
                                    wire:model="present_house_no" placeholder="House No." required>
                                <input class="profile_edit_input w-[38%]" type="text" name="present_street"
                                    wire:model="present_street" placeholder="Street" required>
                                <input class="profile_edit_input w-[38%]" type="text" name="present_brgy"
                                    wire:model="present_brgy" placeholder="Barangay" required>
                            </div>
                            <div class="flex flex-row w-full gap-x-5">
                                <input class="profile_edit_input" type="text" name="present_city"
                                    wire:model="present_city" placeholder="City/Municipality" required>
                                <input class="profile_edit_input" type="text" name="present_province"
                                    wire:model="present_province" placeholder="Province" required>
                                <input wire:model="present_zip_code" class="profile_edit_input" type="text" name="present_zip_code"
                                    placeholder="Zip Code" required>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-1 flex flex-col w-[50%]">
                        <div class="flex flex-row w-full gap-x-2">
                            <label class="hidden text-aapblue @lg/main:block " for="homeAddressPermanent">Complete Home Address </label>
                            <label for="homeAddressPermanent" class="@lg/main:block hidden text-gray-400"> (Permanent) </label>
                        </div>
                        <div class="flex flex-col w-full gap-y-8">
                            <div class="flex flex-row w-full gap-x-5">
                                <input class="profile_edit_input w-[24%]" type="text" name="permanent_house_no"
                                    wire:model="permanent_house_no" placeholder="House No." required>
                                <input class="profile_edit_input w-[38%]" type="text" name="permanent_street"
                                    wire:model="permanent_street" placeholder="Street" required>
                                <input class="profile_edit_input w-[38%]" type="text" name="permanent_brgy"
                                    wire:model="permanent_brgy" placeholder="Barangay" required>
                            </div>
                            <div class="flex flex-row w-full gap-x-5">
                                <input class="profile_edit_input" type="text" name="permanent_city"
                                    wire:model="permanent_city" placeholder="City/Municipality" required>
                                <input class="profile_edit_input" type="text" name="permanent_province"
                                    wire:model="permanent_province" placeholder="Province" required>
                                <input class="profile_edit_input" type="text" name="permanent_zip_code"
                                     wire:model="permanent_zip_code" placeholder="Zip Code" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Button --}}
            <div class="flex justify-end items-end">
                <button @click="step++" class="btn text-white border-blue-300  px-5 py-2 rounded-lg ring-0 ring-blue-500 hover:bg-blue-500 hover:ring-2 active:bg-blue-500 bg-blue-500">Next</button>
            </div>
        </div>

        {{-- Educ and Job Info's --}}
        <div x-show="step === 2">
            <div class="w-full flex flex-col gap-y-7 ">
                <div class="w-full flex flex-col justify-start items-start">
                    <h2 class="text-lg font-bold mb-2 text-[#071d49]">Part 2: Employee's Contact Information</h2>
                    <p class="text-sm text-gray-600 leading-tight"><em>Enter your Personal Email, Contact Number, etc.</em></p>
                </div>
                <div class="flex flex-row w-full justify-center items-center">
                    <div class="flex flex-col w-full gap-y-2">
                        <div class="flex flex-row gap-x-5">
                            <div class="space-y-1 flex flex-col w-[25%]">
                                <div class="flex flex-row w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block " for="homeAddressPresent">Personal Email</label>
                                    <label for="homeAddressPresent" class="@lg/main:block hidden text-gray-400">(Active)</label>
                                </div>
                                <input class="profile_edit_input w-full" type="email" name="employee_personal_email"
                                    wire:model="employee_personal_email" placeholder="e.g., john.doe@example.com" required>
                            </div>
                            <div class="flex flex-col space-y-1 w-[25%]">
                                <label class="hidden text-aapblue @lg/main:block " for="phoneNumber1">Personal Number </label>
                                <input class="profile_edit_input w-full flex" type="number" name="employee_contact_no1"
                                       wire:model="employee_contact_no1" placeholder="e.g., +63 912 345 6789" required>
                            </div>
                            <div class="flex flex-col space-y-1 w-[25%]">
                                <div class="flex flex-row w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block " for="phoneNumber2">Phone Number #2 </label>
                                    <label for="phoneNumber2" class="@lg/main:block hidden text-gray-400"> (Optional) </label>
                                </div>
                                <input class="profile_edit_input w-full flex" type="number" name="employee_contact_no2"
                                   wire:model="employee_contact_no2" placeholder="e.g., +63 912 345 6789">
                            </div>
                            <div class="flex flex-col space-y-1 w-[25%]">
                                <label class="hidden text-aapblue @lg/main:block " for="viberName">Viber Number</label>
                                <input class="profile_edit_input w-full flex" type="number" name="employee_viber_number"
                                   wire:model="employee_viber_number" placeholder="e.g., +63 912 345 6789" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-x-2 items-end">
                    <button @click="step--" class="btn text-white border-pink-300  px-5 py-2 rounded-lg ring-0 ring-pink-500 hover:bg-pink-500 hover:ring-2 active:bg-pink-500 bg-pink-500">Back</button>
                    <button @click="step++" class="btn text-white border-blue-300  px-5 py-2 rounded-lg ring-0 ring-blue-500 hover:bg-blue-500 hover:ring-2 active:bg-blue-500 bg-blue-500">Next</button>
                </div>
            </div>
        </div>

        {{-- Educ Info--}}
        <div x-show="step === 3">
            <div class="w-full flex flex-col gap-y-7 ">
                <div class="w-full flex flex-col justify-start items-start">
                    <h2 class="text-lg font-bold mb-2 text-[#071d49]">Part 3: Employee's Education</h2>
                    <p class="text-sm text-gray-600 leading-tight"><em>Enter Educational Attainment and School Attended.</em></p>
                </div>
                <div class="flex flex-row w-full gap-x-5">
                    <div class="flex flex-col w-full gap-y-3">
                        <div class="w-full flex flex-col justify-start items-start">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Employee's School Information</h6>
                        </div>
                        <div class="flex flex-row w-full gap-x-5">
                            <div class="flex flex-col space-y-1 w-[50%]">
                                <label class="hidden text-aapblue @lg/main:block " for="educationalAttainment">Educational Attainment </label>
                                <select wire:model="employee_educational_attainment" class="profile_edit_input" type="text" name="employee_educational_attainment" required>
                                    <option value="" disabled selected class="text-gray-400 italic">Select options</option>
                                    <option value="No Grade Completed">No Grade Completed</option>
                                    <option value="Early Childhood Education">Early Childhood Education</option>
                                    <option value="Elementary">Elementary</option>
                                    <option value="Junior High School">Junior High School</option>
                                    <option value="Junior High School Undergraduate">Junior High School Undergraduate</option>
                                    <option value="Senior High School">Senior High School</option>
                                    <option value="College">College</option>
                                    <option value="College Graduate">College Graduate</option>
                                    <option value="College Undergraduate">College Undergraduate</option>
                                </select>
                            </div>
                            <div class="flex flex-col space-y-1 w-[50%]">
                                <div class="flex flex-row w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block truncate" for="forCollege">For College/Vocational </label>
                                </div>
                                <select wire:model="employee_college_vocational_status" class="profile_edit_input" type="text" name="employee_college_vocational_status" required>
                                    <option value="" disabled selected class="text-gray-400 italic">Select options</option>
                                    <option value="test">test</option>
                                     <option value="test1">test1</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <div class="flex flex-row w-full gap-x-2">
                                <label class="hidden text-aapblue @lg/main:block " for="schoolAttended">School Attended </label>
                                <label for="middle" class="@lg/main:block hidden text-gray-400"> (Base on Educational Attainment) </label>
                            </div>
                            <input class="profile_edit_input w-full flex" type="text" name="employee_school_attended"
                                wire:model="employee_school_attended" placeholder="e.g., University of Caloocan City" required>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-x-2 items-end">
                    <button @click="step--" class="btn text-white border-pink-300  px-5 py-2 rounded-lg ring-0 ring-pink-500 hover:bg-pink-500 hover:ring-2 active:bg-pink-500 bg-pink-500">Back</button>
                    <button @click="step++" class="btn text-white border-blue-300  px-5 py-2 rounded-lg ring-0 ring-blue-500 hover:bg-blue-500 hover:ring-2 active:bg-blue-500 bg-blue-500">Next</button>
                </div>
            </div>
        </div>

        {{-- Job Info --}}
        <div x-show="step === 4">
            <div class="w-full flex flex-col gap-y-7 ">
                <div class="w-full flex flex-col justify-start items-start">
                    <h2 class="text-lg font-bold mb-2 text-[#071d49]">Part 4: Employee's Job Information</h2>
                    <p class="text-sm text-gray-600 leading-tight"><em>Enter Job Information.</em></p>
                </div>
                <div class="flex flex-row w-full gap-x-5">
                    {{-- Company Information --}}
                    <div class="flex flex-col w-full gap-y-2">
                        <div class="w-full flex flex-col justify-start items-start">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]"> Employee's Company Information</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Enter Job Position Title, Department, Company Email, etc.</em></p>
                        </div>
                        <div class="flex flex-col gap-y-4">
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="flex flex-col space-y-1 w-[50%]">
                                    <label class="hidden text-aapblue @lg/main:block " for="jobPosition">Job Position Title</label>
                                    <input class="profile_edit_input w-full flex" type="text" name="employee_job_position"
                                        wire:model="employee_job_position" placeholder="e.g., Accountant" required>
                                </div>
                                <div class="flex flex-col space-y-1 w-[50%]">
                                    <div class="flex flex-row w-full gap-x-2">
                                        <label class="hidden text-aapblue @lg/main:block truncate" for="department">Department</label>
                                    </div>
                                    <select wire:model="department_id" class="profile_edit_input" type="text" name="department_id" required>
                                        <option value="" disabled selected class="text-gray-400 italic">Select options</option>
                                        <option value="option1">test</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="flex flex-col space-y-1 w-[50%]">
                                    <div class="flex flex-row w-full gap-x-2">
                                        <label class="hidden text-aapblue @lg/main:block " for="companyEmail">Company Email </label>
                                    </div>
                                    <input class="profile_edit_input w-full flex" type="text" name="employee_company_email"
                                       wire:model="employee_company_email" placeholder="" required>
                                </div>
                                <div class="flex flex-col space-y-1 w-[50%]">
                                    <div class="flex flex-row w-full gap-x-2">
                                        <label class="hidden text-aapblue @lg/main:block truncate" for="typeOfEmployment">Type of Employment</label>
                                    </div>
                                    <select wire:model="employee_employment_type" class="profile_edit_input" type="text" name="employee_employment_type" required>
                                        <option value="" disabled selected class="text-gray-400 italic">Select options</option>
                                        <option value="option1">Regular</option>
                                        <option value="option2">Probitionary</option>
                                        <option value="option2">Consultant</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-x-2 items-end">
                    <button @click="step--" class="btn text-white border-pink-300  px-5 py-2 rounded-lg ring-0 ring-pink-500 hover:bg-pink-500 hover:ring-2 active:bg-pink-500 bg-pink-500">Back</button>
                    <button @click="step++" class="btn text-white border-blue-300  px-5 py-2 rounded-lg ring-0 ring-blue-500 hover:bg-blue-500 hover:ring-2 active:bg-blue-500 bg-blue-500">Next</button>
                </div>
            </div>
        </div>

        {{-- Government ID's --}}
        <div x-show="step === 5">
            <div class="w-full flex flex-col gap-y-7 ">
                <div class="w-full flex flex-col justify-start items-start">
                    <h2 class="text-lg font-bold mb-2 text-[#071d49]">Part 5: Employee's Government ID's</h2>
                    <p class="text-sm text-gray-600 leading-tight"><em>Enter active government IDs (e.g., SSS, PhilHealth, Pag-IBIG, TIN) with correct and complete details.</em></p>
                </div>
                <div class="w-full flex flex-row justify-between gap-x-5">
                    <div class="space-y-1 flex flex-col w-[25%]">
                        <label class="hidden text-aapblue @lg/main:block" for="sssNumber">SSS Number</label>
                        <input wire:model="employee_sss_number" class="profile_edit_input" type="number" name="employee_sss_number" 
                            placeholder="SSS Number" required>
                    </div>
                    <div class="space-y-1 flex flex-col w-[25%]">
                        <label class="hidden text-aapblue @lg/main:block" for="philHealthNumber">PhilHealth Number</label>
                        <input wire:model="employee_philhealth_number" class="profile_edit_input" type="number" name="employee_philhealth_number" 
                            placeholder="PhilHealth Number" required>
                    </div>
                    <div class="space-y-1 flex flex-col w-[25%]">
                        <label class="hidden text-aapblue @lg/main:block" for="pagibigNumber">Pag-Ibig Number</label>
                        <input wire:model="employee_pagibig_number" class="profile_edit_input" type="number" name="employee_pagibig_number"
                            placeholder="Pag-Ibig Number" required>
                    </div>
                    <div class="space-y-1 flex flex-col w-[25%]">
                        <label class="hidden text-aapblue @lg/main:block" for="tinNumber">Tax Identification Number</label>
                        <input wire:model="employee_tin_number" class="profile_edit_input" type="number" name="employee_tin_number"
                            placeholder="TIN Number" required>
                    </div>
                </div>
                <div class="flex justify-end gap-x-2 items-end">
                    <button @click="step--" class="btn text-white border-pink-300  px-5 py-2 rounded-lg ring-0 ring-pink-500 hover:bg-pink-500 hover:ring-2 active:bg-pink-500 bg-pink-500">Back</button>
                    <button @click="step++" class="btn text-white border-blue-300  px-5 py-2 rounded-lg ring-0 ring-blue-500 hover:bg-blue-500 hover:ring-2 active:bg-blue-500 bg-blue-500">Next</button>
                </div>
            </div>
        </div>

        {{-- Dependents --}}
        <div x-show="step === 6">
            <div class="w-full flex flex-col gap-y-7">
                <div class="w-full flex flex-col justify-start items-start">
                    <h2 class="text-lg font-bold mb-2 text-[#071d49]">Part 6: Employee's Other Information</h2>
                    <p class="text-sm text-gray-600 leading-tight"><em>Enter your Civil Status, SSS, PhilHealth, Pag-Ibig, TIN, upload Cerfiticates etc.</em></p>
                </div>
                <div class="flex flex-row w-full gap-x-5 justify-center items-center">
                    <div class="flex flex-col w-[50%] gap-y-3">
                        <div class="flex flex-col space-y-1 w-full">
                            <div class="flex flex-row w-full gap-x-2">
                                <label class="hidden text-aapblue @lg/main:block truncate" for="ifMarriedCertificate">If married</label>
                                <label for="middle" class="@lg/main:block hidden text-gray-500"> (Please attach your marriage certificate)</label>
                            </div>
                            <input wire:model="marriage_certificate_path" class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" accept=".pdf,.jpg,.jpeg,.png" id="file-upload" name="marriage_certificate_path" required>
                        </div>
                        <div class="flex flex-col space-y-1 w-full">
                            <div class="flex flex-row w-full gap-x-2">
                                <label class="hidden text-aapblue @lg/main:block truncate" for="ifSingleCertificate">If single </label>
                                <label for="middle" class="@lg/main:block hidden text-gray-400">(Please attach your parents birth certificate)</label>
                            </div>
                            <input wire:model="parents_birth_certificate_path" class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" accept=".pdf,.jpg,.jpeg,.png" id="file-upload" name="parents_birth_certificate_path[]" multiple required>
                        </div>
                        <div class="flex flex-col space-y-1 w-full">
                            <div class="flex flex-col w-full gap-x-2">
                                <label class="hidden text-aapblue @lg/main:block " for="forMarriedEmployees">For married employees</label>
                                <label for="forMarriedEmployees" class="@lg/main:block hidden text-gray-400">(If updated government details, please attach your Pag-ibig MDF.)</label>
                            </div>
                            <input wire:model="pagibig_mdf_path" class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" accept=".pdf,.jpg,.jpeg,.png" id="file-upload" name="pagibig_mdf_path[]" multiple required>
                        </div>
                    </div>
                    <div class="flex flex-col w-[50%]">
                        <div class="flex flex-col space-y-1 w-full">
                            <div class="flex flex-col w-full gap-x-2">
                                <label class="hidden text-aapblue @lg/main:block " for="forMarriedEmployees">For married Employees</label>
                                <label for="forMarriedEmployees" class="@lg/main:block hidden text-gray-400">(Have you updated your government details in regard to your name and/or marital status?)</label>
                            </div>
                            <table class="w-[80%] h-[200px] mx-auto text-aapblue">
                                <thead>
                                    <tr>
                                        <th class="text-left p-2"></th>
                                        <th class="text-center p-2">YES</th>
                                        <th class="text-center p-2">NO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        {{-- keep in mind --}}
                                        <td class="p-2">SSS</td>
                                        <td wire:model = "sss_updated" class="text-center"><input type="radio" name="sss_updated" value="yes" required></td>
                                        <td wire:model = "sss_updated" class="text-center"><input type="radio" name="sss_updated" value="no" required></td>
                                    </tr>
                                    <tr>
                                        <td class="p-2">PhilHealth</td>
                                        <td wire:model="philhealth_updated" class="text-center"><input type="radio" name="philhealth_updated" value="yes" required></td>
                                        <td wire:model="philhealth_updated" class="text-center"><input type="radio" name="philhealth_updated" value="no" required></td>
                                    </tr>
                                    <tr>
                                        <td class="p-2">Pag-Ibig</td>
                                        <td wire:model="pagibig_updated" class="text-center"><input type="radio" name="pagibig_updated" value="yes" required></td>
                                        <td wire:model="pagibig_updated" class="text-center"><input type="radio" name="pagibig_updated" value="no" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-full gap-y-3">
                    <div class="flex flex-row w-full justify-center items-center gap-x-5">
                        <div class="flex flex-col space-y-1 w-[50%]">
                            <div class="flex flex-col w-full gap-x-2">
                                <label class="hidden text-aapblue @lg/main:block " for="childrenNum">Please state how many children do you have?</label>
                                <label for="middle" class="@lg/main:block hidden text-gray-400">(Type n/a if not applicable)</label>
                            </div>
                            <input type="number" wire:model="employee_children_count" name="employee_children_count" placeholder="e.g., 2" class="profile_edit_input w-full flex" required>
                        </div>
                        <div class="flex flex-col space-y-1 w-[50%]">
                            <div class="flex flex-col w-full gap-x-2">
                                <label class="hidden text-aapblue @lg/main:block " for="middle">For employees who have children</label>
                                <label for="middle" class="@lg/main:block hidden text-gray-400">(Please attach their birth certificate/s)</label>
                            </div>
                            <input wire:model="children_birth_certificates_path" class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" accept=".pdf,.jpg,.jpeg,.png" id="file-upload" name="children_birth_certificates_path[]" multiple required>
                        </div>
                    </div>
                    <div id="children-container" class="w-full flex flex-col justify-between space-y-1">
                        <div class="flex flex-col w-full gap-x-2">
                            <label class="hidden text-aapblue @lg/main:block " for="middle">For employees who have children</label>
                            <label for="middle" class="@lg/main:block hidden text-gray-400">(Kindly state the name and birthdate.)</label>
                        </div>
                            @foreach ($employee_children_details as $index => $child)
                                <div class="flex flex-row w-full justify-center items-center gap-x-5">
                                    <div class="child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                        <label class="hidden text-aapblue @lg/main:block">Child #{{ $index + 1 }}</label>

                                        <div class="flex flex-row w-full gap-x-5">
                                            {{-- Child Full Name --}}
                                            <div class="space-y-1 flex flex-col w-[50%]">
                                                <label class="hidden text-aapblue @lg/main:block">Full Name</label>
                                                <input type="text"
                                                    wire:model="employee_children_details.{{ $index }}.name"
                                                    placeholder="e.g., Juan Dela Cruz"
                                                    class="profile_edit_input w-full flex"
                                                    required>
                                            </div>

                                            {{-- Child Birthdate --}}
                                            <div class="space-y-1 flex flex-col w-[50%]">
                                                <label class="hidden text-aapblue @lg/main:block">Birthdate</label>
                                                <input type="date"
                                                    wire:model="employee_children_details.{{ $index }}.birthdate"
                                                    class="profile_edit_input"
                                                    required>
                                            </div>
                                        </div>
                                        @if (count($employee_children_details) > 1)
                                            {{-- Optional Remove Button --}}
                                            <div class="text-right mt-2">
                                                <button type="button"
                                                        wire:click="removeChild({{ $index }})"
                                                        class="text-sm text-red-600 hover:underline">
                                                    Remove
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                    </div>
                    <div class="flex w-full justify-end items-center mt-4">
                        <button type="button"
                                wire:click="addChild"
                                class="bg-blue-600 text-white px-4 flex w-[20%] items-center justify-center py-2 rounded hover:bg-blue-700">
                            + Add Another Child
                        </button>
                    </div>
                    <div class="flex flex-row w-full justify-start items-center gap-x-5">
                        <div class="flex flex-col space-y-1 w-[49%]">
                            <div class="flex flex-row w-full gap-x-2">
                                <label class="hidden text-aapblue @lg/main:block " for="employeeDependents">Employee Dependents</label>
                                <label for="middle" class="@lg/main:block hidden text-gray-400">(Attached parent's Birth certificate)</label>
                            </div>
                            <input wire:model="parents_birth_certificate_dependents_path" class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" id="file-upload" accept=".pdf,.jpg,.jpeg,.png" name="parents_birth_certificate_dependents_path[]" multiple required>
                        </div>
                    </div>
                    <div class="w-full flex flex-col justify-between space-y-1">
                        <div class="flex flex-col w-full gap-x-2">
                            <label class="hidden text-aapblue @lg/main:block " for="middle">For employees Parents</label>
                            <label for="middle" class="@lg/main:block hidden text-gray-400">(Kindly state the name, birthdate, and age.)</label>
                        </div>
                        <div class="flex flex-col justify-center items-center gap-x-5 gap-y-5">
                            <div class="child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                <label class="hidden text-aapblue @lg/main:block" for="middle">Father's Info </label>
                                <div class="flex flex-row w-full gap-x-5">
                                    <div class="space-y-1 flex flex-col w-[50%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="father">Full Name </label>
                                        <input wire:model="employee_father_name" type="text" name="employee_father_name" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex" required>
                                    </div>
                                    {{-- <div class="space-y-1 flex flex-col w-[50%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="fatherAge">Age</label>
                                        <input type="text" name="employee_parents_1_age" placeholder="e.g., 19 years old" class="profile_edit_input w-full flex" required>
                                    </div> --}}
                                    <div class="space-y-1 flex flex-col w-[50%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="fatherBirthdate">Birthdate</label>
                                        <input wire:model="employee_father_birthdate" class="profile_edit_input" type="date" name="employee_father_birthdate" id="middle" placeholder="e.g., 01/05/2002" required>
                                    </div>
                                </div>
                            </div>

                            <div class="child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                <label class="hidden text-aapblue @lg/main:block" for="middle">Mother's Info </label>
                                <div class="flex flex-row w-full gap-x-5">
                                    <div class="space-y-1 flex flex-col w-[50%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="motherName">Full Name </label>
                                        <input wire:model="employee_mother_name" type="text" name="employee_mother_name" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex" required>
                                    </div>
                                    {{-- <div class="space-y-1 flex flex-col w-[50%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="motherAge">Age</label>
                                        <input type="text" name="employee_parents_2_age" placeholder="e.g., 19 years old" class="profile_edit_input w-full flex" required>
                                    </div> --}}
                                    <div class="space-y-1 flex flex-col w-[50%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="motherBirthdate">Birthdate</label>
                                        <input wire:model="employee_mother_birthdate" class="profile_edit_input" type="date" name="employee_mother_birthdate" id="middle" placeholder="e.g., 01/05/2002" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-x-2 items-end">
                    <button @click="step--" class="btn text-white border-pink-300  px-5 py-2 rounded-lg ring-0 ring-pink-500 hover:bg-pink-500 hover:ring-2 active:bg-pink-500 bg-pink-500">Back</button>
                    <button @click="step++" class="btn text-white border-blue-300  px-5 py-2 rounded-lg ring-0 ring-blue-500 hover:bg-blue-500 hover:ring-2 active:bg-blue-500 bg-blue-500">Next</button>
                </div>
            </div>
        </div>

        {{-- Emergency Contacts --}}
        <div x-show="step === 7" class="flex flex-col gap-y-5">
            <div class="w-full flex flex-col justify-start items-start h-auto">
                <h2 class="text-lg font-bold mb-2 text-[#071d49]">Part 7: Employee's Emergency Contacts</h2>
                <p class="text-sm text-gray-600 leading-tight"><em>Emergency Contact that we can call imediately when you have an emergency.</em></p>
            </div>
            <div id="contact-container" class="flex flex-col @lg/main:w-full justify-center">
                <div class="w-full flex flex-row justify-between gap-6">
                    <div class="contact-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                        <label class="hidden text-aapblue @lg/main:block" for="middle">Contact Person #1</label>
                        <div class="flex flex-row w-full gap-x-5">
                            <div class="space-y-1 flex flex-col w-[33%]">
                                <label class="hidden text-aapblue @lg/main:block" for="fullName">Full Name</label>
                                <input wire:model="emergency_contact_1_name" type="text" name="emergency_contact_1_name[0][name]" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex" required>
                            </div>
                            <div class="space-y-1 flex flex-col w-[33%]">
                                <label class="hidden text-aapblue @lg/main:block" for="relationship">Relationship</label>
                                <input wire:model="emergency_contact_1_relationship" type="text" name="emergency_contact_1_relationship[0][relationship]" placeholder="e.g., Brother" class="profile_edit_input w-full flex" required>
                            </div>
                            <div class="space-y-1 flex flex-col w-[33%]">
                                <label class="hidden text-aapblue @lg/main:block" for="contactNumber">Contact Number</label>
                                <input wire:model="emergency_contact_1_number" class="profile_edit_input" type="number" name="emergency_contact_1_number[0][number]" id="contactNumber" placeholder="e.g., 09123456789" required>
                            </div>
                        </div>
                        <div class="space-y-1 flex flex-col w-full">
                            <label class="hidden text-aapblue @lg/main:block" for="address">Contact Address</label>
                            <textarea wire:model="emergency_contact_1_address" class="profile_edit_input w-full resize-none" name="emergency_contact_1_address[0][address]" id="contactAddress" cols="20" rows="3" 
                                        placeholder="Contact's full address"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex w-full justify-end items-center -mt-5">
                <button
                    onclick="addContactFields()"
                    type="button"
                    class="mt-4 bg-blue-600 text-white px-4 flex w-[25%] items-center justify-center py-2 rounded hover:bg-blue-700"
                    >
                    + Add Contact Person
                </button>
            </div>
        </div>

        {{-- Emergency Contacts --}}
        <div x-show="step === 7" class="gap-y-2 flex flex-col">

            <div class="flex flex-row justify-end items-end gap-x-2">
                <button @click="step--" class="btn text-white border-pink-300  px-5 py-2 rounded-lg ring-0 ring-pink-500 hover:bg-pink-500 hover:ring-2 active:bg-pink-500 bg-pink-500">Back</button>
                <button type="submit" wire:click="add"
                    class="btn text-[#071d49] border-yellow-300 flex gap-1 justify-center items-center px-6 py-2 bg-amber-300 rounded-lg ring-0 ring-amber-500 transition-colors hover:ring-1 hover:bg-amber-400 hover:shadow-xl active:bg-amber-500">
                    <p>Submit</p>
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 256 512">
                        <path
                            d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</form>