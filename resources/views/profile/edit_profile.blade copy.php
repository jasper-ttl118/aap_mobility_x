<x-app-layout class='flex flex-row min-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    @php
        $navbar_selected = 'None';
    @endphp
    @include('layouts.navbar')
    <div class="@container/main flex flex-1 flex-col ml-52 overflow-y-auto p-10 gap-3.5 bg-[#f3f4f6] mt-10">
        <header>
            <h2 class="text-2xl font-medium text-[#151847]">Profile Information</h2>
            <h4 class="text-lg font-light text-[#151847]">View and edit your personal details, username, and password</h4>
        </header>
        <hr>
        <main class="space-y-6">
            <section class="space-y-1.5">
                <h5 class="text-lg font-medium text-[#151847]">Personal Details</h5>
                <div class="p-10 bg-white rounded-xl space-y-8 @lg/main:space-y-14 shadow-lg">
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full place-content-center @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Profile Image</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Choose a new image to display as your
                                    profile photo.</em></p>
                        </div>
                        <div class="w-full max-w-4xl @lg/main:w-[65%]">
                            <div
                                class="group/image  relative size-[104px] m-auto cursor-pointer *:transition-colors @lg:m-0">
                                <img src="data:image/svg+xml;utf-8,<svg xmlns='http://www.w3.org/2000/svg' width='107' height='107' viewBox='0 0 107 107' fill='none'><path d='M88.75 89.25H89.25V88.75V82.875C89.25 79.7557 87.6871 77.0261 85.2382 74.7091C82.7917 72.3943 79.4274 70.4566 75.7249 68.9015C68.3218 65.7922 59.4436 64.1625 53.5 64.1625C47.5564 64.1625 38.6782 65.7922 31.2751 68.9015C27.5726 70.4566 24.2083 72.3943 21.7618 74.7091C19.3129 77.0261 17.75 79.7557 17.75 82.875V88.75V89.25H18.25H88.75ZM1.125 94.625V12.375C1.125 6.18701 6.13152 1.125 12.375 1.125H94.625C100.811 1.125 105.875 6.18864 105.875 12.375V94.625C105.875 100.811 100.811 105.875 94.625 105.875H12.375C6.13152 105.875 1.125 100.813 1.125 94.625ZM53.5 54C63.5286 54 71.625 45.9036 71.625 35.875C71.625 25.8464 63.5286 17.75 53.5 17.75C43.4714 17.75 35.375 25.8464 35.375 35.875C35.375 45.9036 43.4714 54 53.5 54Z' fill='%23CBD5E1' stroke='%239CA3AF'/></svg>"
                                    alt="profile image" class="size-full outline outline-2 outline-blue-100 rounded-xl">
                                <div
                                    class="absolute -right-1.5 -bottom-1.5 size-[24px] grid place-items-center rounded-full outline outline-2 outline-blue-100 bg-blue-600 group-hover/image:bg-blue-700 group-active/image:bg-blue-900">
                                    <svg class="size-[45%]" viewBox="0 0 13 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.236328 9.90787V12.4842H2.81266L10.4111 4.88573L7.8348 2.30939L0.236328 9.90787ZM12.4035 2.89336C12.6714 2.62542 12.6714 2.1926 12.4035 1.92466L10.7959 0.317028C10.5279 0.0490889 10.0951 0.0490889 9.82717 0.317028L8.56992 1.57428L11.1463 4.15062L12.4035 2.89336V2.89336Z"
                                            fill="white" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Employee ID --}}
                    
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full flex flex-col items-start justify-start gap-x-5 @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Employee ID</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Enter your Employee ID</em></p>
                        </div>
                        <div
                            class="w-full  flex flex-col justify-between gap-6 @lg/main:w-[65%] @2xl/main:flex-row">
                            <div class="space-y-1 flex-1 w-full">
                                {{-- <label class="hidden text-aapblue @lg/main:block" for="last">Employee ID</label> --}}
                                <input class="profile_edit_input w-[48%]" type="number" name="employeeID"
                                    placeholder="123123" required>
                            </div>
                        </div>
                    </div>
                    {{-- Basic Information --}}
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem] h-60">
                        <div class="w-full flex flex-col items-start justify-start gap-x-5 @lg/main:w-[35%] h-full">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Employee's Basic Information</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Enter your real Full Name, Suffix and Maiden Name if your a married Woman.</em></p>
                        </div>
                        <div
                            class="w-full flex flex-col justify-between gap-6 @lg/main:w-[65%]">
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="space-y-1 flex flex-col w-[50%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="lastName">Last Name</label>
                                    <input class="profile_edit_input" type="text" name="lastName" id="lastName"
                                        placeholder="Enter your last name" required>
                                </div>
                                <div class="space-y-1 flex flex-col w-[50%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="firstName">First Name</label>
                                    <input class="profile_edit_input" type="text" name="firstName" id="firstName"
                                        placeholder="Enter your first name" required>
                                </div>
                            </div>
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="space-y-1 flex flex-col w-[50%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="middleName">Middle Name</label>
                                    <input class="profile_edit_input" type="text" name="middleName" id="middleName"
                                        placeholder="Enter your middle name" required>
                                </div>
                                <div class="space-y-1 flex flex-col w-[50%]">
                                    <div class="flex flex-row w-full gap-x-2">
                                        <label class="hidden text-aapblue @lg/main:block " for="suffix">Suffix </label>
                                        <label for="suffix" class="@lg/main:block hidden text-[#dedede]"> (n/a if not applicable) </label>
                                    </div>
                                    <select class="profile_edit_input" type="text" name="suffix" id="suffix" required>
                                        <option value="" disabled selected class="text-[#dedede] italic">Select options</option>
                                        <option value="option1">Jr. (Junior)</option>
                                        <option value="option2">Sr. (Senior)</option>
                                        <option value="option3">II. (The Second)</option>
                                        <option value="option4">III. (The Third)</option>
                                        <option value="option5">IV. (The Fourth)</option>
                                        <option value="option6">V. (The Fifth)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="space-y-1 flex flex-col w-[48.5%]">
                                    <div class="flex flex-row w-full gap-x-2">
                                        <label class="hidden text-aapblue @lg/main:block " for="maidenName">Maiden Name </label>
                                        <label for="maidenName" class="@lg/main:block hidden text-[#dedede]"> (n/a if not applicable) </label>
                                    </div>
                                    <input class="profile_edit_input" type="text" name="maidenName" id="maidenName"
                                        placeholder="Enter your maiden name" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Other Information --}}
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem] h-60">
                        <div class="w-full flex flex-col items-start justify-start gap-x-5 @lg/main:w-[35%] h-full">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Employee's Other Information</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Enter your real Gender, Age, Birthdate, Birthplace and Religion</em></p>
                        </div>
                        <div
                            class="w-full flex flex-col justify-between gap-6 @lg/main:w-[65%]">
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="space-y-1 flex flex-col w-[50%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="gender">Gender</label>
                                    <select class="profile_edit_input" type="text" name="gender" id="gender" required>
                                        <option value="" disabled selected class="text-[#dedede] italic">Select your Gender</option>
                                        <option value="option1">Male</option>
                                        <option value="option2">Female</option>
                                    </select>
                                </div>
                                <div class="space-y-1 flex flex-col w-[50%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="age">Age</label>
                                    <input class="profile_edit_input" type="number" name="age" id="age"
                                        placeholder="Enter your Age" required>
                                </div>
                            </div>
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="space-y-1 flex flex-col w-[50%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="birthdate">Birthdate</label>
                                    <input class="profile_edit_input" type="date" name="birthdate" id="birthdate"
                                        placeholder="Enter your birthdate" required>
                                </div>
                                <div class="space-y-1 flex flex-col w-[50%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="birthplace">Birthplace</label>
                                    <select class="profile_edit_input hide-scrollbar" type="text" name="birthplace" id="birthplace" required>
                                        <option value="" disabled selected class="text-[#dedede] italic">Select your Birthplace</option>
                                        <option value="option1">Alaminos (Pangasinan)</option>
                                        <option value="option2">Angeles City (Pampanga)</option>
                                        <option value="option3">Antipolo (Rizal)</option>
                                        <option value="option4">Bacolod (Negros Occidental)</option>
                                        <option value="option5">Bacoor (Cavite)</option>
                                        <option value="option6">Bago (Negros Occidental)</option>
                                        <option value="option7">Baguio (Benguet)</option>
                                        <option value="option8">Bais (Negros Oriental)</option>
                                        <option value="option9">Balanga (Bataan)</option>
                                        <option value="option10">Baliwag (Bulacan)</option>
                                        <option value="option11">Batac City (Ilocos Norte)</option>
                                        <option value="option12">Batangas City (Batangas)</option>
                                        <option value="option13">Bayawan (Negros Oriental)</option>
                                        <option value="option14">Baybay (Leyte)</option>
                                        <option value="option16">Bayugan (Agusan Del Sur)</option>
                                        <option value="option17">Biñan (Laguna)</option>
                                        <option value="option18">Bislig (Surigao Del Sur)</option>
                                        <option value="option19">Bogo (Cebu)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="space-y-1 flex flex-col w-[48.5%]">
                                    <label class="hidden text-aapblue @lg/main:block" for="religion">Religion</label>
                                    <select class="profile_edit_input hide-scrollbar" type="text" name="religion" id="religion" required>
                                        <option value="" disabled selected class="text-[#dedede] italic">Select your Religion</option>
                                        <option value="option1">Catholic</option>
                                        <option value="option2">Christianity</option>
                                        <option value="option2">Iglesia ni Cristo</option>
                                        <option value="option2">Seventh Day Adventist Church</option>
                                        <option value="option2">Islam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Address --}}
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full flex justify-start items-start flex-col @lg/main:w-[35%] h-60 ">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Employee's Address</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Provide your complete physical location
                                    including building number, street name, and unit/apartment information.</em></p>
                        </div>
                        <div class="w-full flex flex-col max-w-4xl @lg/main:w-[65%] gap-6">
                            <div class="space-y-1 flex flex-col w-full">
                                <div class="flex flex-row w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block " for="homeAddressPresent">Complete Home Address </label>
                                    <label for="homeAddressPresent" class="@lg/main:block hidden text-[#dedede]"> (Present) </label>
                                </div>
                                <textarea class="profile_edit_input w-full resize-none" name="homeAddressPresent" id="homeAddressPresent" cols="20" rows="3"
                                    placeholder="Type your full address" required></textarea>
                            </div>
                            <div class="space-y-1 flex flex-col w-full">
                                <div class="flex flex-row w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block " for="homeAddressPermanent">Complete Home Address </label>
                                    <label for="homeAddressPermanent" class="@lg/main:block hidden text-[#dedede]"> (Permanent) </label>
                                </div>
                                <textarea class="profile_edit_input w-full resize-none" name="homeAddressPermanent" id="homeAddressPermanent" cols="20" rows="3"
                                    placeholder="Type your full address" required></textarea>
                            </div>
                        </div>
                    </div>
                    {{-- Email --}}
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full place-content-center @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Employee's Email</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Enter an active address for important
                                    communications.</em></p>
                        </div>
                        <div class="w-full max-w-4xl @lg/main:w-[65%]">
                            <input class="profile_edit_input w-[48.5%]" type="email" name="email"
                                id="email" placeholder="e.g., john.doe@example.com" required>
                        </div>
                    </div>
                    {{-- Phone Number --}}
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full flex flex-col justify-start items-start h-36 @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Employee's Contact Number</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Enter your current phone and viber number.</em></p>
                        </div>
                        <div class="flex flex-col max-w-4xl @lg/main:w-[65%] gap-6">
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="flex flex-col space-y-1 w-[50%]">
                                    <label class="hidden text-aapblue @lg/main:block " for="phoneNumber1">Phone Number #1 </label>
                                    <input class="profile_edit_input w-full flex" type="number" name="phoneNumber1"
                                        id="phoneNumber1" placeholder="e.g., +63 912 345 6789" required>
                                </div>
                                <div class="flex flex-col space-y-1 w-[50%]">
                                    <div class="flex flex-row w-full gap-x-2">
                                        <label class="hidden text-aapblue @lg/main:block " for="phoneNumber2">Phone Number #2 </label>
                                        <label for="phoneNumber2" class="@lg/main:block hidden text-[#dedede]"> (Optional) </label>
                                    </div>
                                    <input class="profile_edit_input w-full flex" type="number" name="phoneNumber2"
                                        id="phoneNumber2" placeholder="e.g., +63 912 345 6789">
                                </div>
                            </div>
                            <div class="flex flex-col space-y-1">
                                <label class="hidden text-aapblue @lg/main:block " for="viberName">Viber Number</label>
                                <input class="profile_edit_input w-[48.5%] flex" type="number" name="viberName"
                                    id="viberName" placeholder="e.g., +63 912 345 6789" required>
                            </div>
                        </div>
                    </div>
                    {{-- School Information --}}
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full flex flex-col justify-start items-start h-36 @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Employee's School Information</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Enter your Educational Attainment and School Attended.</em></p>
                        </div>
                        <div class="flex flex-col max-w-4xl @lg/main:w-[65%] gap-6">
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="flex flex-col space-y-1 w-[50%]">
                                    <label class="hidden text-aapblue @lg/main:block " for="educationalAttainment">Educational Attainment </label>
                                    <select class="profile_edit_input" type="text" name="educationalAttainment" id="educationalAttainment" required>
                                        <option value="" disabled selected class="text-[#dedede] italic">Select options</option>
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
                                    <select class="profile_edit_input" type="text" name="forCollege" id="forCollege" required>
                                        <option value="" disabled selected class="text-[#dedede] italic">Select options</option>
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
                                    <label for="middle" class="@lg/main:block hidden text-[#dedede]"> (Base on Educational Attainment) </label>
                                </div>
                                <input class="profile_edit_input w-full flex" type="text" name="schoolattended"
                                    id="schoolattended" placeholder="e.g., University of Caloocan City" required>
                            </div>
                        </div>
                    </div>
                    {{-- Company Information --}}
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full flex flex-col justify-start items-start h-36 @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]"> Employee's Company Information</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Enter your Job Position Title, Department, Company Email, and Type of Employment.</em></p>
                        </div>
                        <div class="flex flex-col max-w-4xl @lg/main:w-[65%] gap-6">
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="flex flex-col space-y-1 w-[50%]">
                                    <label class="hidden text-aapblue @lg/main:block " for="jobPosition">Job Position Title</label>
                                    <input class="profile_edit_input w-full flex" type="text" name="jobPosition"
                                        id="jobPosition" placeholder="e.g., Accountant" required>
                                </div>
                                <div class="flex flex-col space-y-1 w-[50%]">
                                    <div class="flex flex-row w-full gap-x-2">
                                        <label class="hidden text-aapblue @lg/main:block truncate" for="department">Department</label>
                                    </div>
                                    <select class="profile_edit_input" type="text" name="department" id="department" required>
                                        <option value="" disabled selected class="text-[#dedede] italic">Select options</option>
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
                                    <input class="profile_edit_input w-full flex" type="text" name="companyEmail"
                                        id="companyEmail" placeholder="e.g., University of Caloocan City" required>
                                </div>
                                <div class="flex flex-col space-y-1 w-[50%]">
                                    <div class="flex flex-row w-full gap-x-2">
                                        <label class="hidden text-aapblue @lg/main:block truncate" for="typeOfEmployment">Type of Employment</label>
                                    </div>
                                    <select class="profile_edit_input" type="text" name="typeOfEmployment" id="typeOfEmployment" required>
                                        <option value="" disabled selected class="text-[#dedede] italic">Select options</option>
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
                        </div>
                    </div>
                    {{-- Employee Status --}}
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full flex flex-col justify-start items-start h-[2440px] @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Employee's Status</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Enter your Civil Status, SSS, PhilHealth, Pag-Ibig, TIN, upload Cerfiticates etc.</em></p>
                        </div>
                        <div class="flex flex-col max-w-4xl @lg/main:w-[65%] gap-6">
                            <div class="flex flex-row w-full gap-x-5">
                                <div class="flex flex-col space-y-1 w-[48.5%]">
                                    <label class="hidden text-aapblue @lg/main:block " for="civilStatus">Civil Status</label>
                                    <select class="profile_edit_input" type="text" name="civilStatus" id="civilStatus" required>
                                        <option value="" disabled selected class="text-[#dedede] italic">Select options</option>
                                        <option value="option1">Single</option>
                                        <option value="option2">Married</option>
                                        <option value="option2">Widowed</option>
                                        <option value="option2">Annuled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col space-y-1 w-full">
                                <div class="flex flex-row w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block truncate" for="ifMarriedCertificate">If married</label>
                                    <label for="middle" class="@lg/main:block hidden text-[#dedede]"> (Please attach your marriage certificate)</label>
                                </div>
                                <input class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" id="file-upload" name="ifMarriedCertificate" required>
                            </div>
                            <div class="flex flex-col space-y-1 w-full">
                                <div class="flex flex-row w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block truncate" for="ifSingleCertificate">If single </label>
                                    <label for="middle" class="@lg/main:block hidden text-[#dedede]">(Please attach your parents birth certificate)</label>
                                </div>
                                <input class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" id="file-upload" name="ifSingleCertificate[]" multiple required>
                            </div>
                            <div class="flex flex-col space-y-1 w-full">
                                <div class="flex flex-col w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block " for="forMarriedEmployees">For married Employees</label>
                                    <label for="forMarriedEmployees" class="@lg/main:block hidden text-[#dedede]">(Have you updated your government details in regard to your name and/or marital status?)</label>
                                </div>
                                <table class="w-[40%] mx-auto text-aapblue">
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
                                            <td class="text-center"><input type="radio" name="sss" value="yes" required></td>
                                            <td class="text-center"><input type="radio" name="sss" value="no" required></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2">PhilHealth</td>
                                            <td class="text-center"><input type="radio" name="philhealth" value="yes" required></td>
                                            <td class="text-center"><input type="radio" name="philhealth" value="no" required></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2">Pag-Ibig</td>
                                            <td class="text-center"><input type="radio" name="pagibig" value="yes" required></td>
                                            <td class="text-center"><input type="radio" name="pagibig" value="no" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex flex-col space-y-1 w-full">
                                <div class="flex flex-col w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block " for="forMarriedEmployees">For married Employees</label>
                                    <label for="forMarriedEmployees" class="@lg/main:block hidden text-[#dedede]">(If updated government details, please attach your Pag-ibig MDF.)</label>
                                </div>
                                <input class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" id="file-upload" name="forMarriedEmployeesUpdated[]" required>
                            </div>
                            <div
                                class="w-full flex flex-col justify-between gap-6">
                                <div class="flex flex-row w-full gap-x-5">
                                    <div class="space-y-1 flex flex-col w-[50%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="sssNumber">SSS Number</label>
                                        <input class="profile_edit_input" type="number" name="sssNumber" id="sssNumber"
                                            placeholder="SSS Number" required>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[50%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="philHealthNumber">PhilHealth Number</label>
                                        <input class="profile_edit_input" type="number" name="philHealthNumber" id="philHealthNumber"
                                            placeholder="PhilHealth Number" required>
                                    </div>
                                </div>
                                <div class="flex flex-row w-full gap-x-5">
                                    <div class="space-y-1 flex flex-col w-[50%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="pagibigNumber">Pag-Ibig Number</label>
                                        <input class="profile_edit_input" type="number" name="pagibigNumber" id="pagibigNumber"
                                            placeholder="Pag-Ibig Number" required>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[50%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="tinNumber">Tax Identification Number (TIN)</label>
                                        <input class="profile_edit_input" type="number" name="tinNumber" id="tinNumber"
                                            placeholder="TIN Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col space-y-1 w-[48.5%]">
                                <div class="flex flex-col w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block " for="childrenNum">Please state how many children do you have?</label>
                                    <label for="middle" class="@lg/main:block hidden text-[#dedede]">(Type n/a if not applicable)</label>
                                </div>
                                <input type="number" name="childrenNum" placeholder="e.g., 2" class="profile_edit_input w-full flex" required>
                            </div>
                            <div class="flex flex-col space-y-1 w-full">
                                <div class="flex flex-col w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block " for="middle">For employees who have children</label>
                                    <label for="middle" class="@lg/main:block hidden text-[#dedede]">(Please attach their birth certificate/s)</label>
                                </div>
                                <input class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" id="file-upload" name="chiledBirthCertificates[]" mulitple required>
                            </div>
                            <div id="children-container" class="w-full flex flex-col justify-between space-y-1">
                                <div class="flex flex-col w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block " for="middle">For employees who have children</label>
                                    <label for="middle" class="@lg/main:block hidden text-[#dedede]">(Kindly state theie name, birthdate, and age.)</label>
                                </div>
                                <div class="child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                    <label class="hidden text-aapblue @lg/main:block" for="middle">Child #1 </label>
                                    <div class="flex flex-row w-full gap-x-5">
                                        <div class="space-y-1 flex flex-col w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="middle">Full Name </label>
                                            <input type="text" name="children[0][name]" id="childFullName" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex" required>
                                        </div>
                                        <div class="space-y-1 flex flex-col w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="middle">Age</label>
                                            <input type="text" name="children[0][age]" id="childAge" placeholder="e.g., 19 years old" class="profile_edit_input w-full flex" required>
                                        </div>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[48.5%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="middle">Birthdate</label>
                                        <input class="profile_edit_input" type="date" id="childBirthdate" name="children[0][birthdate] id="middle" placeholder="e.g., 01/05/2002" required>
                                    </div>
                                </div>

                                <div class="child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                    <label class="hidden text-aapblue @lg/main:block" for="middle">Child #2 (Optional)</label>
                                    <div class="flex flex-row w-full gap-x-5">
                                        <div class="space-y-1 flex flex-col w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="middle">Full Name </label>
                                            <input type="text" name="children[1][name]" id="childFullName" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex">
                                        </div>
                                        <div class="space-y-1 flex flex-col w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="middle">Age</label>
                                            <input type="text" name="children[1][age]" id="childAge" placeholder="e.g., 19 years old" class="profile_edit_input w-full flex">
                                        </div>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[48.5%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="middle">Birthdate</label>
                                        <input class="profile_edit_input" type="date" id="childBirthdate" name="children[1][birthdate] id="middle" placeholder="e.g., 01/05/2002">
                                    </div>
                                </div>
                            </div>
                            <div class="flex w-full justify-end items-center -mt-5">
                                <button
                                    onclick="addChildFields()"
                                    type="button"
                                    class="mt-4 bg-blue-600 text-white px-4 flex w-[35%] items-center justify-center py-2 rounded hover:bg-blue-700"
                                    >
                                    + Add Another Child
                                </button>
                            </div>
                            <div class="flex flex-col space-y-1 w-full">
                                <div class="flex flex-col w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block " for="employeeDependents">Employee Dependents (Parents)</label>
                                    <label for="middle" class="@lg/main:block hidden text-[#dedede]">(Please attached parent's birth certificate)</label>
                                </div>
                                <input class="border border-blue-400 rounded-lg h-10 file:h-10 file:w-32" type="file" id="file-upload" name="employeeDependents[]" mulitple required>
                            </div>
                            <div id="children-container" class="w-full flex flex-col justify-between space-y-1">
                                <div class="flex flex-col w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block " for="middle">For employees Parents</label>
                                    <label for="middle" class="@lg/main:block hidden text-[#dedede]">(Kindly state theie name, birthdate, and age.)</label>
                                </div>
                                <div class="child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                    <label class="hidden text-aapblue @lg/main:block" for="middle">Father's Info </label>
                                    <div class="flex flex-row w-full gap-x-5">
                                        <div class="space-y-1 flex flex-col w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="father">Full Name </label>
                                            <input type="text" name="fatherName" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex" required>
                                        </div>
                                        <div class="space-y-1 flex flex-col w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="fatherAge">Age</label>
                                            <input type="text" name="fatherAge" placeholder="e.g., 19 years old" class="profile_edit_input w-full flex" required>
                                        </div>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[48.5%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="fatherBirthdate">Birthdate</label>
                                        <input class="profile_edit_input" type="date" name="fatherBirthdate" id="middle" placeholder="e.g., 01/05/2002" required>
                                    </div>
                                </div>

                                <div class="child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                    <label class="hidden text-aapblue @lg/main:block" for="middle">Mother's Info </label>
                                    <div class="flex flex-row w-full gap-x-5">
                                        <div class="space-y-1 flex flex-col w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="motherName">Full Name </label>
                                            <input type="text" name="fatherName" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex" required>
                                        </div>
                                        <div class="space-y-1 flex flex-col w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="motherAge">Age</label>
                                            <input type="text" name="motherAge" placeholder="e.g., 19 years old" class="profile_edit_input w-full flex" required>
                                        </div>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[48.5%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="motherBirthdate">Birthdate</label>
                                        <input class="profile_edit_input" type="date" name="motherBirthdate" id="middle" placeholder="e.g., 01/05/2002" required>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-1 flex flex-col w-[48.5%]">
                                <div class="flex flex-row w-full gap-x-2">
                                    <label class="hidden text-aapblue @lg/main:block " for="middle">Blood Type </label>
                                </div>
                                <select class="profile_edit_input" type="text" name="bloodType" id="bloodType" required>
                                    <option value="" disabled selected class="text-[#dedede] italic">Select options</option>
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
                    </div>
                    {{-- Emergency Contact --}}
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full flex flex-col justify-start items-start h-[760px] @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Employee's Emergency Contacts</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Emergency Contact that we can call imediately when you have an emergency.</em></p>
                        </div>
                        <div class="flex flex-col max-w-4xl @lg/main:w-[65%] gap-6">
                            <div id="children-container" class="w-full flex flex-col justify-between gap-6">
                                <div class="child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                    <label class="hidden text-aapblue @lg/main:block" for="middle">Contact Person #1</label>
                                    <div class="flex flex-row w-full gap-x-5">
                                        <div class="space-y-1 flex flex-col w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="fullName">Full Name</label>
                                            <input type="text" name="contactFullName" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex" required>
                                        </div>
                                        <div class="space-y-1 flex flex-col w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="relationship">Relationship</label>
                                            <input type="text" name="contactRelationship" placeholder="e.g., Mother" class="profile_edit_input w-full flex" required>
                                        </div>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[48.5%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="contactNumber">Contact Number</label>
                                        <input class="profile_edit_input" type="number" name="contactNumber" id="contactNumber" placeholder="e.g., 09123456789" required>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-full">
                                        <label class="hidden text-aapblue @lg/main:block" for="address">Contact Address</label>
                                        <textarea class="profile_edit_input w-full resize-none" name="contactAddress" id="contactAddress" cols="20" rows="3" 
                                                    placeholder="Contact's full address"></textarea>
                                    </div>
                                </div>

                                <div class="child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6">
                                    <label class="hidden text-aapblue @lg/main:block" for="middle">Contact Person #2</label>
                                    <div class="flex flex-row w-full gap-x-5">
                                        <div class="space-y-1 flex flex-col w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="fullName">Full Name</label>
                                            <input type="text" name="contactFullName" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex">
                                        </div>
                                        <div class="space-y-1 flex flex-col w-[50%]">
                                            <label class="hidden text-aapblue @lg/main:block" for="relationship">Relationship</label>
                                            <input type="text" name="contactRelationship" placeholder="e.g., Mother" class="profile_edit_input w-full flex">
                                        </div>
                                    </div>
                                    <div class="space-y-1 flex flex-col w-[48.5%]">
                                        <label class="hidden text-aapblue @lg/main:block" for="contactNumber">Contact Number</label>
                                        <input class="profile_edit_input" type="number" name="contactNumber" id="contactNumber" placeholder="e.g., 09123456789">
                                    </div>
                                    <div class="space-y-1 flex flex-col w-full">
                                        <label class="hidden text-aapblue @lg/main:block" for="address">Contact Address</label>
                                        <textarea class="profile_edit_input w-full resize-none" name="contactAddress" id="contactAddress" cols="20" rows="3" 
                                                    placeholder="Contact's full address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="space-y-1.5">
                <h5 class="text-lg font-medium text-black">User Authentication</h5>
                <div class="p-5 bg-white rounded-xl space-y-8 @lg/main:space-y-14 shadow-lg">
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
            </section>
            <div class="flex justify-end gap-4">
                <button
                    class="px-5 py-2 rounded-lg ring-0 ring-gray-300 hover:bg-gray-200 hover:ring-2 active:bg-gray-300 bg-gray-300">Cancel</button>
                <button type="submit"
                    class="flex gap-1 justify-center items-center px-6 py-2 bg-amber-300 rounded-lg ring-0 ring-amber-500 transition-colors hover:ring-1 hover:bg-amber-400 hover:shadow-xl active:bg-amber-500">
                    <p>Save changes</p>
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 256 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path
                            d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z" />
                    </svg>
                </button>
            </div>
        </main>
    </div>

    <script>
        let childIndex = 2; // Start from 2 since we already have 0 and 1

        function addChildFields() {
            const container = document.getElementById('children-container');

            const div = document.createElement('div');
            div.className = 'child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6';
            div.innerHTML = `
            <div class="flex justify-between items-center">
                <label class="hidden text-aapblue @lg/main:block" for="middle">Child #${childIndex + 1} (Optional)</label>
                <button type="button" onclick="deleteChildField(this)" class="text-red-500 hover:text-red-700 font-bold text-sm">Delete</button>
            </div>
            <div class="flex flex-row w-full gap-x-5">
                <div class="space-y-1 flex flex-col w-[50%]">
                    <label class="hidden text-aapblue @lg/main:block" for="middle">Full Name </label>
                    <input type="text" name="children[${childIndex}][name]" id="childFullName" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex">
                </div>
                <div class="space-y-1 flex flex-col w-[50%]">
                    <label class="hidden text-aapblue @lg/main:block" for="middle">Age</label>
                    <input type="text" name="children[${childIndex}][age]" id="childAge" placeholder="e.g., 19 years old" class="profile_edit_input w-full flex">
                </div>
            </div>
            <div class="space-y-1 flex flex-col w-[48.5%]">
                <label class="hidden text-aapblue @lg/main:block" for="middle">Birthdate</label>
                <input class="profile_edit_input" type="date" name="children[${childIndex}][birthdate]" id="childBirthdate" id="middle" placeholder="e.g., 01/05/2002">
            </div>
            `;

            container.appendChild(div);
            childIndex++;
        }

        function deleteChildField(button) {
            const childDiv = button.closest('.child-input');
            childIndex--;
            childDiv.remove();
        }
    </script> 
</x-app-layout>

