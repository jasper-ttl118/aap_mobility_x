<x-app-layout class='flex flex-row min-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    @php
        $navbar_selected = 'None';
    @endphp
    @include('layouts.navbar')
    <div class="@container/main flex flex-1 flex-col lg:ml-52 overflow-y-auto p-5 lg:p-10 gap-3.5 bg-[#f3f4f6] mt-10">
        <header>
            <h2 class="text-2xl text-center lg:text-start font-medium text-[#151847]">User Profile Information</h2>
            <h4 class="text-lg text-center lg:text-start font-light text-[#151847]">View and edit your personal details, username, and password</h4>
        </header>
        <hr>
        <main class="space-y-6">
            <section class="space-y-1.5">
                <div class="flex flex-row justify-between items-center w-full">
                    <h5 class="text-lg font-medium text-[#071d49]">Edit User Details</h5>
                    <a href="{{ route('profile.view', $user->user_id) }}" class="text-[#071d49] text-lg font-medium hover:text-blue-900 hover:underline pr-1">View Profile</a>
                </div>
                <div x-data="{step: 1}" class="p-10 bg-white rounded-xl h-full space-y-8 @lg/main:space-y-14 shadow-lg">
                    <!-- Step Indicator -->
                    <ul class="steps steps-vertical lg:steps-horizontal w-full">
                        <li class="step text-[#071d49]" :class="{ 'step-primary': step >= 1 }">Basic Info's</li>
                        <li class="step text-[#071d49]" :class="{ 'step-primary': step >= 2 }">Contact Info's</li>
                        <li class="step text-[#071d49]" :class="{ 'step-primary': step >= 3 }">Education and Job Info's</li>
                        <li class="step text-[#071d49]" :class="{ 'step-primary': step >= 4 }">Government ID's</li>
                        <li class="step text-[#071d49]" :class="{ 'step-primary': step >= 5 }">Dependents</li>
                        <li class="step text-[#071d49]" :class="{ 'step-primary': step >= 6 }">Emergency Contacts</li>
                        <li class="step text-[#071d49]" :class="{ 'step-primary': step >= 7 }">Username & Password</li>
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
                                        <input type="file" id="file1" accept=".jpg,.jpeg,.png" class="hidden">
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
                                        <input class="profile_edit_input" type="text" name="employee_surname"
                                        placeholder="Enter your last name" required>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[33%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="firstName">First Name</label>
                                        <input class="profile_edit_input" type="text" name="employee_firstname"
                                            placeholder="Enter your first name" required>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[33%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="middleName">Middle Name</label>
                                        <input class="profile_edit_input" type="text" name="employee_middlename"
                                            placeholder="Enter your middle name" required>
                                    </div>
                                </div>
                                {{-- Second Row --}}
                                <div class="flex flex-row w-full gap-x-5">
                                    <div class="space-y-1 flex flex-col w-[33%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="last">Employee ID</label>
                                        <input class="profile_edit_input" type="number" name="employee_id"
                                            placeholder="123123" required>
                                    </div>
                                    
                                    <div class="space-y-1 flex flex-col w-[33%]">
                                        <div class="flex flex-row w-full gap-x-2">
                                            <label class="hidden text-aapblue @lg/main:block " for="suffix">Suffix </label>
                                            <label for="suffix" class="@lg/main:block hidden text-gray-400"> (n/a if not applicable) </label>
                                        </div>
                                        <select class="profile_edit_input" type="text" name="employee_suffix" required>
                                            <option value="" disabled selected class="text-gray-400 italic">Select options</option>
                                            <option value="option1">Jr. (Junior)</option>
                                            <option value="option2">Sr. (Senior)</option>
                                            <option value="option3">II. (The Second)</option>
                                            <option value="option4">III. (The Third)</option>
                                            <option value="option5">IV. (The Fourth)</option>
                                            <option value="option6">V. (The Fifth)</option>
                                            <option value="option6">N/A</option>
                                        </select>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[33%]">
                                        <label class="hidden text-aapblue @lg/main:block " for="maidenName">Mother's Maiden Name </label>
                                        <input class="profile_edit_input" type="text" name="employee_maiden_name"
                                            placeholder="Enter your maiden name" required>
                                    </div>
                                </div>
                                {{-- Third Row --}}
                                <div class="flex flex-row w-full gap-x-5">
                                    <div class="space-y-1 flex flex-col w-[33%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="gender">Gender</label>
                                        <select class="profile_edit_input" type="text" name="employee_gender" required>
                                            <option value="" disabled selected class="text-gray-400 italic">Select your Gender</option>
                                            <option value="option1">Male</option>
                                            <option value="option2">Female</option>
                                        </select>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[33%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="birthdate">Birthdate</label>
                                        <input class="profile_edit_input" type="date" name="employee_birthdate"
                                            placeholder="Enter your birthdate" required>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[33%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="birthplace">Birthplace</label>
                                        <input class="profile_edit_input" type="text" name="employee_birthplace"
                                            placeholder="Enter your birthplace" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-y-6">
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="space-y-1 flex flex-col w-[33%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="religion">Religion</label>
                                    <select class="profile_edit_input hide-scrollbar" type="text" name="employee_religion" required>
                                        <option value="" disabled selected class="text-gray-400 italic">Select your Religion</option>
                                        <option value="option1">Catholic</option>
                                        <option value="option2">Christian</option>
                                        <option value="option2">Iglesia ni Cristo</option>
                                        <option value="option2">Seventh Day Adventist Church</option>
                                        <option value="option2">Islam</option>
                                    </select>
                                </div>
                                
                                <div class="flex flex-row w-[33%] gap-x-5">
                                    <div class="flex flex-col space-y-1 w-full">
                                        <label class="hidden text-aapblue @lg/main:block " for="civilStatus">Civil Status</label>
                                        <select class="profile_edit_input" type="text" name="employee_civil_status" required>
                                            <option value="" disabled selected class="text-gray-400 italic">Select options</option>
                                            <option value="option1">Single</option>
                                            <option value="option2">Married</option>
                                            <option value="option2">Widowed</option>
                                            <option value="option2">Annuled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="space-y-1 flex flex-col w-[33%]">
                                    <div class="flex flex-row w-full gap-x-2">
                                        <label class="hidden text-aapblue @lg/main:block " for="middle">Blood Type </label>
                                    </div>
                                    <select class="profile_edit_input" type="text" name="employee_blood_type" id="bloodType" required>
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
                                                placeholder="House No." required>
                                            <input class="profile_edit_input w-[38%]" type="text" name="present_street"
                                                placeholder="Street" required>
                                            <input class="profile_edit_input w-[38%]" type="text" name="present_brgy"
                                                placeholder="Barangay" required>
                                        </div>
                                        <div class="flex flex-row w-full gap-x-5">
                                            <input class="profile_edit_input" type="text" name="present_city"
                                                placeholder="City/Municipality" required>
                                            <input class="profile_edit_input" type="text" name="present_province"
                                                placeholder="Province" required>
                                            <input class="profile_edit_input" type="text" name="present_zip_code"
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
                                                placeholder="House No." required>
                                            <input class="profile_edit_input w-[38%]" type="text" name="permanent_street"
                                                placeholder="Street" required>
                                            <input class="profile_edit_input w-[38%]" type="text" name="permanent_brgy"
                                                placeholder="Barangay" required>
                                        </div>
                                        <div class="flex flex-row w-full gap-x-5">
                                            <input class="profile_edit_input" type="text" name="permanent_city"
                                                placeholder="City/Municipality" required>
                                            <input class="profile_edit_input" type="text" name="permanent_province"
                                                placeholder="Province" required>
                                            <input class="profile_edit_input" type="text" name="permanent_zip_code"
                                                placeholder="Zip Code" required>
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
                                                placeholder="e.g., john.doe@example.com" required>
                                        </div>
                                        <div class="flex flex-col space-y-1 w-[25%]">
                                            <label class="hidden text-aapblue @lg/main:block " for="phoneNumber1">Personal Number </label>
                                            <input class="profile_edit_input w-full flex" type="number" name="employee_contact_no1"
                                                    placeholder="e.g., +63 912 345 6789" required>
                                        </div>
                                        <div class="flex flex-col space-y-1 w-[25%]">
                                            <div class="flex flex-row w-full gap-x-2">
                                                <label class="hidden text-aapblue @lg/main:block " for="phoneNumber2">Phone Number #2 </label>
                                                <label for="phoneNumber2" class="@lg/main:block hidden text-gray-400"> (Optional) </label>
                                            </div>
                                            <input class="profile_edit_input w-full flex" type="number" name="employee_contact_no2"
                                                placeholder="e.g., +63 912 345 6789">
                                        </div>
                                        <div class="flex flex-col space-y-1 w-[25%]">
                                            <label class="hidden text-aapblue @lg/main:block " for="viberName">Viber Number</label>
                                            <input class="profile_edit_input w-full flex" type="number" name="employee_viber_number"
                                                placeholder="e.g., +63 912 345 6789" required>
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

                    {{-- Educ and Job Info's --}}
                    <div x-show="step === 3">
                        <div class="w-full flex flex-col gap-y-7 ">
                            <div class="w-full flex flex-col justify-start items-start">
                                <h2 class="text-lg font-bold mb-2 text-[#071d49]">Part 3: Employee's Education and Job Information</h2>
                                <p class="text-sm text-gray-600 leading-tight"><em>Enter your Educational Attainment, School Attended and Job Information.</em></p>
                            </div>
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="flex flex-col w-[50%] gap-y-3">
                                    <div class="w-full flex flex-col justify-start items-start">
                                        <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Employee's School Information</h6>
                                        <p class="text-sm text-gray-600 leading-tight"><em>Enter your Educational Attainment and School Attended.</em></p>
                                    </div>
                                    <div class="flex flex-row w-full gap-x-5">
                                        <div class="flex flex-col space-y-1 w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block " for="educationalAttainment">Educational Attainment </label>
                                            <select class="profile_edit_input" type="text" name="employee_educational_attainment" required>
                                                <option value="" disabled selected class="text-gray-400 italic">Select options</option>
                                                <option value="option1">No Grade Completed</option>
                                                <option value="option2">Early Childhood Education</option>
                                                <option value="option2">Elementary</option>
                                                <option value="option2">Junior High School</option>
                                                <option value="option2">Junior High School Undergraduate</option>
                                                <option value="option2">Senior High School</option>
                                                <option value="option2">College</option>
                                                <option value="option2">College Graduate</option>
                                                <option value="option2">College Undergraduate</option>
                                            </select>
                                        </div>
                                        <div class="flex flex-col space-y-1 w-[50%]">
                                            <div class="flex flex-row w-full gap-x-2">
                                                <label class="hidden text-aapblue @lg/main:block truncate" for="forCollege">For College/Vocational </label>
                                            </div>
                                            <select class="profile_edit_input" type="text" name="employee_college_vocational_status" required>
                                                <option value="" disabled selected class="text-gray-400 italic">Select options</option>
                                                <option value="option1">No Grade Completed</option>
                                                <option value="option2">Early Childhood Education</option>
                                                <option value="option2">Elementary</option>
                                                <option value="option2">Junior High School</option>
                                                <option value="option2">Junior High School Undergraduate</option>
                                                <option value="option2">Senior High School</option>
                                                <option value="option2">College</option>
                                                <option value="option2">College Undergraduate</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex flex-col space-y-1">
                                        <div class="flex flex-row w-full gap-x-2">
                                            <label class="hidden text-aapblue @lg/main:block " for="schoolAttended">School Attended </label>
                                            <label for="middle" class="@lg/main:block hidden text-gray-400"> (Base on Educational Attainment) </label>
                                        </div>
                                        <input class="profile_edit_input w-full flex" type="text" name="employee_school_attended"
                                            placeholder="e.g., University of Caloocan City" required>
                                    </div>
                                </div>
                                {{-- Company Information --}}
                                <div class="flex flex-col w-[50%] gap-y-2">
                                    <div class="w-full flex flex-col justify-start items-start">
                                        <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]"> Employee's Company Information</h6>
                                        <p class="text-sm text-gray-600 leading-tight"><em>Enter your Job Position Title, Department, Company Email, etc.</em></p>
                                    </div>
                                    <div class="flex flex-col gap-y-4">
                                        <div class="flex flex-row w-full gap-x-5">
                                            <div class="flex flex-col space-y-1 w-[50%]">
                                                <label class="hidden text-aapblue @lg/main:block " for="jobPosition">Job Position Title</label>
                                                <input class="profile_edit_input w-full flex" type="text" name="employee_job_position"
                                                    placeholder="e.g., Accountant" required>
                                            </div>
                                            <div class="flex flex-col space-y-1 w-[50%]">
                                                <div class="flex flex-row w-full gap-x-2">
                                                    <label class="hidden text-aapblue @lg/main:block truncate" for="department">Department</label>
                                                </div>
                                                <select class="profile_edit_input" type="text" name="employee_department" required>
                                                    <option value="" disabled selected class="text-gray-400 italic">Select options</option>
                                                    <option value="option1">Regular</option>
                                                    <option value="option2">Probitionary</option>
                                                    <option value="option2">Consultant</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex flex-row w-full gap-x-5">
                                            <div class="flex flex-col space-y-1 w-[50%]">
                                                <div class="flex flex-row w-full gap-x-2">
                                                    <label class="hidden text-aapblue @lg/main:block " for="companyEmail">Company Email </label>
                                                </div>
                                                <input class="profile_edit_input w-full flex" type="text" name="employee_company_email"
                                                    placeholder="e.g., University of Caloocan City" required>
                                            </div>
                                            <div class="flex flex-col space-y-1 w-[50%]">
                                                <div class="flex flex-row w-full gap-x-2">
                                                    <label class="hidden text-aapblue @lg/main:block truncate" for="typeOfEmployment">Type of Employment</label>
                                                </div>
                                                <select class="profile_edit_input" type="text" name="employee_employment_type" required>
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
                    <div x-show="step === 4">
                        <div class="w-full flex flex-col gap-y-7 ">
                            <div class="w-full flex flex-col justify-start items-start">
                                <h2 class="text-lg font-bold mb-2 text-[#071d49]">Part 4: Employee's Government ID's</h2>
                                <p class="text-sm text-gray-600 leading-tight"><em>Enter active government IDs (e.g., SSS, PhilHealth, Pag-IBIG, TIN) with correct and complete details.</em></p>
                            </div>
                            <div class="w-full flex flex-row justify-between gap-x-5">
                                <div class="space-y-1 flex flex-col w-[25%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="sssNumber">SSS Number</label>
                                    <input class="profile_edit_input" type="number" name="employee_sss_number" 
                                        placeholder="SSS Number" required>
                                </div>
                                <div class="space-y-1 flex flex-col w-[25%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="philHealthNumber">PhilHealth Number</label>
                                    <input class="profile_edit_input" type="number" name="employee_philhealth_number" 
                                        placeholder="PhilHealth Number" required>
                                </div>
                                <div class="space-y-1 flex flex-col w-[25%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="pagibigNumber">Pag-Ibig Number</label>
                                    <input class="profile_edit_input" type="number" name="employee_pagibig_number"
                                        placeholder="Pag-Ibig Number" required>
                                </div>
                                <div class="space-y-1 flex flex-col w-[25%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="tinNumber">Tax Identification Number</label>
                                    <input class="profile_edit_input" type="number" name="employee_tin_number"
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
                    <div x-show="step === 5">
                        <div class="w-full flex flex-col gap-y-7">
                            <div class="w-full flex flex-col justify-start items-start">
                                <h2 class="text-lg font-bold mb-2 text-[#071d49]">Part 5: Employee's Other Information</h2>
                                <p class="text-sm text-gray-600 leading-tight"><em>Enter your Civil Status, SSS, PhilHealth, Pag-Ibig, TIN, upload Cerfiticates etc.</em></p>
                            </div>
                            <div class="flex flex-row w-full gap-x-5 justify-center items-center">
                                <div class="flex flex-col w-[50%] gap-y-3">
                                    <div class="flex flex-col space-y-1 w-full">
                                        <div class="flex flex-row w-full gap-x-2">
                                            <label class="hidden text-aapblue @lg/main:block truncate" for="ifMarriedCertificate">If married</label>
                                            <label for="middle" class="@lg/main:block hidden text-gray-500"> (Please attach your marriage certificate)</label>
                                        </div>
                                        <input class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" accept=".pdf,.jpg,.jpeg,.png" id="file-upload" name="marriage_certificate_path" required>
                                    </div>
                                    <div class="flex flex-col space-y-1 w-full">
                                        <div class="flex flex-row w-full gap-x-2">
                                            <label class="hidden text-aapblue @lg/main:block truncate" for="ifSingleCertificate">If single </label>
                                            <label for="middle" class="@lg/main:block hidden text-gray-400">(Please attach your parents birth certificate)</label>
                                        </div>
                                        <input class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" accept=".pdf,.jpg,.jpeg,.png" id="file-upload" name="parents_birth_certificate_path[]" multiple required>
                                    </div>
                                    <div class="flex flex-col space-y-1 w-full">
                                        <div class="flex flex-col w-full gap-x-2">
                                            <label class="hidden text-aapblue @lg/main:block " for="forMarriedEmployees">For married Employees</label>
                                            <label for="forMarriedEmployees" class="@lg/main:block hidden text-gray-400">(If updated government details, please attach your Pag-ibig MDF.)</label>
                                        </div>
                                        <input class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" accept=".pdf,.jpg,.jpeg,.png" id="file-upload" name="pagibig_mdf_path[]" multiple required>
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
                                                    <td class="p-2">SSS</td>
                                                    <td class="text-center"><input type="radio" name="sss_updated" value="yes" required></td>
                                                    <td class="text-center"><input type="radio" name="sss_updated" value="no" required></td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2">PhilHealth</td>
                                                    <td class="text-center"><input type="radio" name="philhealth_updated" value="yes" required></td>
                                                    <td class="text-center"><input type="radio" name="philhealth_updated" value="no" required></td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2">Pag-Ibig</td>
                                                    <td class="text-center"><input type="radio" name="pagibig_updated" value="yes" required></td>
                                                    <td class="text-center"><input type="radio" name="pagibig_updated" value="no" required></td>
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
                                        <input type="number" name="employee_children_count" placeholder="e.g., 2" class="profile_edit_input w-full flex" required>
                                    </div>
                                    <div class="flex flex-col space-y-1 w-[50%]">
                                        <div class="flex flex-col w-full gap-x-2">
                                            <label class="hidden text-aapblue @lg/main:block " for="middle">For employees who have children</label>
                                            <label for="middle" class="@lg/main:block hidden text-gray-400">(Please attach their birth certificate/s)</label>
                                        </div>
                                        <input class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" accept=".pdf,.jpg,.jpeg,.png" id="file-upload" name="children_birth_certificates_path[]" multiple required>
                                    </div>
                                </div>
                                <div id="children-container" class="w-full flex flex-col justify-between space-y-1">
                                    <div class="flex flex-col w-full gap-x-2">
                                        <label class="hidden text-aapblue @lg/main:block " for="middle">For employees who have children</label>
                                        <label for="middle" class="@lg/main:block hidden text-gray-400">(Kindly state theie name, birthdate, and age.)</label>
                                    </div>
                                    <div class="flex flex-row w-full justify-center items-center gap-x-5">
                                        <div class="child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                            <label class="hidden text-aapblue @lg/main:block" for="middle">Child #1 </label>
                                            <div class="flex flex-row w-full gap-x-5">
                                                <div class="space-y-1 flex flex-col w-[50%]">
                                                    <label class="hidden text-aapblue @lg/main:block" for="middle">Full Name </label>
                                                    <input type="text" name="employee_children_1_details[0][name]" id="childFullName" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex" required>
                                                </div>
                                                {{-- <div class="space-y-1 flex flex-col w-[33%]">
                                                    <label class="hidden text-aapblue @lg/main:block" for="middle">Age</label>
                                                    <input type="text" name="employee_children_1_age[0][age]" id="childAge" placeholder="e.g., 19 years old" class="profile_edit_input w-full flex" required>
                                                </div> --}}
                                                <div class="space-y-1 flex flex-col w-[50%]">
                                                    <label class="hidden text-aapblue @lg/main:block" for="middle">Birthdate</label>
                                                    <input class="profile_edit_input" type="date" id="childBirthdate" name="employee_children_1_birthdate[0][birthdate] id="middle" placeholder="e.g., 01/05/2002" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex w-full justify-end items-center -mt-5">
                                    <button
                                        onclick="addChildFields()"
                                        type="button"
                                        class="mt-4 bg-blue-600 text-white px-4 flex w-[20%] items-center justify-center py-2 rounded hover:bg-blue-700"
                                        >
                                        + Add Another Child
                                    </button>
                                </div>
                                <div class="flex flex-row w-full justify-start items-center gap-x-5">
                                    <div class="flex flex-col space-y-1 w-[49%]">
                                        <div class="flex flex-row w-full gap-x-2">
                                            <label class="hidden text-aapblue @lg/main:block " for="employeeDependents">Employee Dependents</label>
                                            <label for="middle" class="@lg/main:block hidden text-gray-400">(Attached parent's Birth certificate)</label>
                                        </div>
                                        <input class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" id="file-upload" accept=".pdf,.jpg,.jpeg,.png" name="parents_birth_certificate_dependents_path[]" multiple required>
                                    </div>
                                </div>
                                <div class="w-full flex flex-col justify-between space-y-1">
                                    <div class="flex flex-col w-full gap-x-2">
                                        <label class="hidden text-aapblue @lg/main:block " for="middle">For employees Parents</label>
                                        <label for="middle" class="@lg/main:block hidden text-gray-400">(Kindly state theie name, birthdate, and age.)</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-center gap-x-5 gap-y-5">
                                        <div class="child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                            <label class="hidden text-aapblue @lg/main:block" for="middle">Father's Info </label>
                                            <div class="flex flex-row w-full gap-x-5">
                                                <div class="space-y-1 flex flex-col w-[50%]">
                                                    <label class="hidden text-aapblue @lg/main:block" for="father">Full Name </label>
                                                    <input type="text" name="employee_parents_1_details" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex" required>
                                                </div>
                                                {{-- <div class="space-y-1 flex flex-col w-[50%]">
                                                    <label class="hidden text-aapblue @lg/main:block" for="fatherAge">Age</label>
                                                    <input type="text" name="employee_parents_1_age" placeholder="e.g., 19 years old" class="profile_edit_input w-full flex" required>
                                                </div> --}}
                                                <div class="space-y-1 flex flex-col w-[50%]">
                                                    <label class="hidden text-aapblue @lg/main:block" for="fatherBirthdate">Birthdate</label>
                                                    <input class="profile_edit_input" type="date" name="employee_parents_1_birthdate" id="middle" placeholder="e.g., 01/05/2002" required>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                            <label class="hidden text-aapblue @lg/main:block" for="middle">Mother's Info </label>
                                            <div class="flex flex-row w-full gap-x-5">
                                                <div class="space-y-1 flex flex-col w-[50%]">
                                                    <label class="hidden text-aapblue @lg/main:block" for="motherName">Full Name </label>
                                                    <input type="text" name="employee_parents_2_details" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex" required>
                                                </div>
                                                {{-- <div class="space-y-1 flex flex-col w-[50%]">
                                                    <label class="hidden text-aapblue @lg/main:block" for="motherAge">Age</label>
                                                    <input type="text" name="employee_parents_2_age" placeholder="e.g., 19 years old" class="profile_edit_input w-full flex" required>
                                                </div> --}}
                                                <div class="space-y-1 flex flex-col w-[50%]">
                                                    <label class="hidden text-aapblue @lg/main:block" for="motherBirthdate">Birthdate</label>
                                                    <input class="profile_edit_input" type="date" name="employee_parents_2_birthdate" id="middle" placeholder="e.g., 01/05/2002" required>
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
                    <div x-show="step === 6" class="flex flex-col gap-y-5">
                        <div class="w-full flex flex-col justify-start items-start h-auto">
                            <h2 class="text-lg font-bold mb-2 text-[#071d49]">Part 6: Employee's Emergency Contacts</h2>
                            <p class="text-sm text-gray-600 leading-tight"><em>Emergency Contact that we can call imediately when you have an emergency.</em></p>
                        </div>
                        <div id="contact-container" class="flex flex-col @lg/main:w-full justify-center">
                            <div class="w-full flex flex-row justify-between gap-6">
                                <div class="contact-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                    <label class="hidden text-aapblue @lg/main:block" for="middle">Contact Person #1</label>
                                    <div class="flex flex-row w-full gap-x-5">
                                        <div class="space-y-1 flex flex-col w-[33%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="fullName">Full Name</label>
                                            <input type="text" name="emergency_contact_1_name[0][name]" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex" required>
                                        </div>
                                        <div class="space-y-1 flex flex-col w-[33%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="relationship">Relationship</label>
                                            <input type="text" name="emergency_contact_1_relationship[0][relationship]" placeholder="e.g., Brother" class="profile_edit_input w-full flex" required>
                                        </div>
                                        <div class="space-y-1 flex flex-col w-[33%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="contactNumber">Contact Number</label>
                                            <input class="profile_edit_input" type="number" name="emergency_contact_1_number[0][number]" id="contactNumber" placeholder="e.g., 09123456789" required>
                                        </div>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-full">
                                        <label class="hidden text-aapblue @lg/main:block" for="address">Contact Address</label>
                                        <textarea class="profile_edit_input w-full resize-none" name="emergency_contact_1_address[0][address]" id="contactAddress" cols="20" rows="3" 
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
                        <div class="flex justify-end gap-x-2 items-end">
                            <button @click="step--" class="btn text-white border-pink-300  px-5 py-2 rounded-lg ring-0 ring-pink-500 hover:bg-pink-500 hover:ring-2 active:bg-pink-500 bg-pink-500">Back</button>
                            <button @click="step++" class="btn text-white border-blue-300  px-5 py-2 rounded-lg ring-0 ring-blue-500 hover:bg-blue-500 hover:ring-2 active:bg-blue-500 bg-blue-500">Next</button>
                        </div>
                    </div>

                    {{-- Username and Password --}}
                    <div x-show="step === 7" class="gap-y-2 flex flex-col">
                        <h2 class="text-lg font-bold mb-2 text-[#071d49]">Part 7: Username & Password</h2>
                        <div class="p-5 border rounded-xl space-y-8 @lg/main:space-y-14 border-blue-400 ">
                            <div
                                class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                                <div class="w-full place-content-center @lg/main:w-[35%]">
                                    <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Username</h6>
                                    <p class="text-sm text-gray-600 leading-tight"><em>Create the personal handle that you'll
                                            use to log in and access your account.</em></p>
                                </div>
                                <div class="w-full max-w-4xl @lg/main:w-[65%]">
                                    <input class="profile_edit_input w-full @lg/main:w-1/2" type="text" name="username"
                                        id="username" placeholder="Enter a unique username">
                                </div>
                            </div>
                            <div
                                class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                                <div class="w-full place-content-center @lg/main:w-[35%]">
                                    <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Password</h6>
                                    <p class="text-sm text-gray-600 leading-tight"><em>Set up your personal security phrase
                                            with at least 8 characters.</em></p>
                                </div>
                                <div class="w-full max-w-4xl @lg/main:w-[65%]">
                                    <div class="relative w-full @lg/main:w-1/2">
                                        <input class="profile_edit_input w-full pr-9" type="password" name="password"
                                            id="password" placeholder="Enter a strong password">
                                        <div
                                            class="group/seepwd absolute top-0 right-0 h-full grid place-items-center aspect-square rounded-r-lg bg-sky-100 cursor-pointer transition-colors hover:bg-sky-200">
                                            <svg class="size-5 fill-sky-700 group-hover/seepwd:fill-sky-800 group-active/seepwd:fill-sky-900"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                <path
                                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                            </svg>
                                            {{-- Eye slash icon --}}
                                            {{-- <svg class="size-5 fill-sky-700 group-hover/seepwd:fill-sky-800 group-active/seepwd:fill-sky-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                                <div class="w-full place-content-center @lg/main:w-[35%]">
                                    <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Confirm Password</h6>
                                    <p class="text-sm text-gray-600 leading-tight"><em>Re-enter your password exactly as above
                                            to confirm.</em></p>
                                </div>
                                <div class="w-full max-w-4xl @lg/main:w-[65%]">
                                    <div class="relative w-full @lg/main:w-1/2">
                                        <input class="profile_edit_input w-full pr-9" type="password" name="confpassword"
                                            id="confpassword" placeholder="Confirm your password">
                                        <div
                                            class="group/seepwd absolute top-0 right-0 h-full grid place-items-center aspect-square rounded-r-lg bg-sky-100 cursor-pointer transition-colors hover:bg-sky-200">
                                            <svg class="size-5 fill-sky-700 group-hover/seepwd:fill-sky-800 group-active/seepwd:fill-sky-900"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                <path
                                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                            </svg>
                                            {{-- Eye slash icon --}}
                                            {{-- <svg class="size-5 fill-sky-700 group-hover/seepwd:fill-sky-800 group-active/seepwd:fill-sky-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row justify-end items-end gap-x-2">
                            <button @click="step--" class="btn text-white border-pink-300  px-5 py-2 rounded-lg ring-0 ring-pink-500 hover:bg-pink-500 hover:ring-2 active:bg-pink-500 bg-pink-500">Back</button>
                            <button type="submit"
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
            </section>
        </main>
    </div>

    <script>
        let childIndex = 2; // Start from 2 since we already have 0 and 1

        function addChildFields() {
            const container = document.getElementById('children-container');
            
            // Check if we need to create a new row
            let currentRow = container.querySelector('.child-row:last-child');
            
            // If no row exists or current row already has 2 children, create a new row
            if (!currentRow || currentRow.children.length >= 2) {
                currentRow = document.createElement('div');
                currentRow.className = 'child-row flex flex-row w-full justify-between items-start gap-x-5 mb-5';
                container.appendChild(currentRow);
            }

            const div = document.createElement('div');
            div.className = 'child-input flex flex-col w-[49%] gap-4 border border-blue-400 rounded-lg p-6';
            div.innerHTML = `
                <div class="flex justify-between items-center">
                    <label class="hidden text-aapblue @lg/main:block" for="middle">Child #${childIndex + 1}</label>
                    <button type="button" onclick="deleteChildField(this)" class="text-red-500 hover:text-red-700 font-bold text-sm">Delete</button>
                </div>
                
                <div class="flex flex-row w-full gap-x-5">
                    <div class="space-y-1 flex flex-col w-[50%]">
                        <label class="hidden text-aapblue @lg/main:block" for="middle">Full Name </label>
                        <input type="text" name="children[${childIndex}][name]" id="childFullName_${childIndex}" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex">
                    </div>
                    <div class="space-y-1 flex flex-col w-[50%]">
                        <label class="hidden text-aapblue @lg/main:block" for="middle">Age</label>
                        <input type="text" name="children[${childIndex}][age]" id="childAge_${childIndex}" placeholder="e.g., 19 years old" class="profile_edit_input w-full flex">
                    </div>
                </div>
                <div class="space-y-1 flex flex-col w-[48.5%]">
                    <label class="hidden text-aapblue @lg/main:block" for="middle">Birthdate</label>
                    <input class="profile_edit_input" type="date" name="children[${childIndex}][birthdate]" id="childBirthdate_${childIndex}" placeholder="e.g., 01/05/2002">
                </div>
            `;

            currentRow.appendChild(div);
            childIndex++;
        }

        function deleteChildField(button) {
            const childInput = button.closest('.child-input');
            const row = childInput.closest('.child-row');
            
            // Remove the child input
            childInput.remove();
            
            // If the row is now empty, remove it
            if (row && row.children.length === 0) {
                row.remove();
            }
            
            // Renumber all children to maintain proper sequence
            renumberChildren();
        }

        function renumberChildren() {
            // Only renumber the dynamically added children (not the original 0 and 1)
            const dynamicChildInputs = document.querySelectorAll('.child-row .child-input');
            let currentIndex = 2; // Start from 2 since you already have 0 and 1
            
            dynamicChildInputs.forEach((input) => {
                // Update the label
                const label = input.querySelector('label');
                if (label) {
                    label.textContent = `Child #${currentIndex + 1}`;
                }
                
                // Update input names and IDs
                const nameInput = input.querySelector('input[name*="[name]"]');
                const ageInput = input.querySelector('input[name*="[age]"]');
                const birthdateInput = input.querySelector('input[name*="[birthdate]"]');
                
                if (nameInput) {
                    nameInput.name = `children[${currentIndex}][name]`;
                    nameInput.id = `childFullName_${currentIndex}`;
                }
                if (ageInput) {
                    ageInput.name = `children[${currentIndex}][age]`;
                    ageInput.id = `childAge_${currentIndex}`;
                }
                if (birthdateInput) {
                    birthdateInput.name = `children[${currentIndex}][birthdate]`;
                    birthdateInput.id = `childBirthdate_${currentIndex}`;
                }
                
                currentIndex++;
            });
            
            // Update the global childIndex to the next available index
            childIndex = currentIndex;
        }
    </script> 
</x-app-layout>

