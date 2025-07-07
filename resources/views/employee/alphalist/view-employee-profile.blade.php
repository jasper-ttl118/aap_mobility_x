
<x-app-layout class='flex flex-row w-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='Employee Management'>
  
    <div x-data="{ selected : 'employees', open_add_employee : false, open_delete_employee : false, 
                   open_view_employee : false, open_edit_employee : false, open_add_intern : false, 
                   open_delete_intern : false, open_view_intern : false, open_edit_intern : false
                }" 
        class="flex flex-1 flex-col lg:ml-52 overflow-y-auto p-10 gap-7 mt-12 bg-[#f3f4f6]">
      
        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg overflow-x-auto hide-scrollbar flex-shrink-0">
            <div class="flex h-14">
                <x-employee.submodules selected="Alphalist" />
            </div>
        </div>

        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-col justify-between mt-3">
                 {{-- Breadcrumbs --}}
                <div class="flex items-center gap-x-1 text-[#071d49] text-sm px-7 pt-5">
                    <a href="/employee" class="hover:underline">Employee Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="/employee" class="hover:underline">Alphalist</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="hover:underline font-semibold">Employee Profile</a>
                </div>
                {{-- Profile --}}
            
                <div x-data="{openSection:'basicInfo'}" class="p-5 ">
                    {{-- Basic Information --}}
                    <div @click="openSection = (openSection === 'basicInfo' ? null : 'basicInfo')" class="cursor-pointer border-blue-400 border rounded-lg p-5">
                        <div class="text-[#071d49] font-semibold flex flex-row justify-between items-center">
                            <div class="flex flex-row justify-center items-center gap-x-2">
                                <img src="{{ asset('basicInfo.png') }}" alt="basicInfo" class="size-4">
                                Employee's Basic Information
                            </div>
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5 transition-transform duration-300 text-blue-400"
                                :class="openSection === 'basicInfo' ? 'rotate-180' : ''"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25L12 15.75 4.5 8.25" />
                            </svg>
                        </div>
                        <div x-show="openSection === 'basicInfo'" x-transition x-cloak class="flex flex-row w-full h-full items-center justify-evenly gap-y-2 gap-x-3 pt-3">
                            <div class="flex flex-col w-[20%] justify-center items-center gap-y-5">
                                <img src="data:image/svg+xml;utf-8,<svg xmlns='http://www.w3.org/2000/svg' width='107' height='107' viewBox='0 0 107 107' fill='none'><path d='M88.75 89.25H89.25V88.75V82.875C89.25 79.7557 87.6871 77.0261 85.2382 74.7091C82.7917 72.3943 79.4274 70.4566 75.7249 68.9015C68.3218 65.7922 59.4436 64.1625 53.5 64.1625C47.5564 64.1625 38.6782 65.7922 31.2751 68.9015C27.5726 70.4566 24.2083 72.3943 21.7618 74.7091C19.3129 77.0261 17.75 79.7557 17.75 82.875V88.75V89.25H18.25H88.75ZM1.125 94.625V12.375C1.125 6.18701 6.13152 1.125 12.375 1.125H94.625C100.811 1.125 105.875 6.18864 105.875 12.375V94.625C105.875 100.811 100.811 105.875 94.625 105.875H12.375C6.13152 105.875 1.125 100.813 1.125 94.625ZM53.5 54C63.5286 54 71.625 45.9036 71.625 35.875C71.625 25.8464 63.5286 17.75 53.5 17.75C43.4714 17.75 35.375 25.8464 35.375 35.875C35.375 45.9036 43.4714 54 53.5 54Z' fill='%23CBD5E1' stroke='%239CA3AF'/></svg>"
                                    alt="profile image" class="size-[70%] rounded-xl">
                                <div class="flex flex-col w-auto justify-center items-center gap-x-1">
                                    <label class="text-sm font-medium leading-relaxed tracking-wide text-blue-400">Employee ID</label>
                                    <label class="text-[#071d49] text-sm"name="employeeID">{{ $employee->employee_id}}</label>
                                </div>
                            </div>
                            {{-- Left --}}
                    
                            <div class="flex flex-col w-[40%] h-full justify-center items-center gap-y-4">
                                {{-- First Row --}}
                                <div class="text-[#071d49] flex flex-row items-center gap-x-1 justify-between w-full">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Last Name</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_lastname }}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">First Name</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_firstname }}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">MIddle Name</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_middlename }}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Suffix</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_suffix ?? 'n/a'}}</label>
                                    </div>
                                </div>
                                {{-- Second Row --}}
                                <div class="text-[#071d49] flex flex-row items-center gap-x-1 justify-between w-full">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Gender</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_gender ?? 'n/a'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Religion</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_religion ?? 'n/a'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Mother's Maiden Name</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_maiden_name ?? 'n/a'}}</label>
                                    </div>
                                </div>
           
                                {{-- Third Row --}}
                                <div class="text-[#071d49] flex flex-row items-center gap-x-1 justify-between w-full">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Age</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_age ?? 'n/a'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Birthdate</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{\Carbon\Carbon::parse($employee->employee_birthdate)->format('m-d-Y') ?? 'n/a'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Birthplace</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_birthplace ?? 'n/a'}}</label>
                                    </div>
                                </div>
                                {{-- Fourth Row --}}
                                <div class="text-[#071d49] flex flex-row items-center gap-x-10 justify-start w-full">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Civil Status</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_civil_status ?? 'n/a'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Blood Type</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_blood_type ?? 'n/a'}}</label>
                                    </div>
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="flex border border-blue-400 h-[170px] rounded-xl"></div>
                            {{-- Right --}}
                            <div class="flex flex-col w-[40%] h-full gap-y-1">
                                
                                <div class="text-[#071d49] flex flex-col items-start gap-x-1 justify-start w-full">
                                    <label class="text-sm font-inter font-medium leading-relaxed tracking-wide text-blue-800">Complete Home Address (Present) </label>
                                    <div class="flex flex-row w-full justify-start gap-x-4">
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">House No.</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->present_house_no ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Street</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->present_street ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Brgy.</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->present_brgy ?? 'n/a'}}</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-row w-full justify-start gap-x-4">
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">City</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->present_city ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Province</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->present_province ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Zip Code</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->present_zip_code ?? 'n/a'}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-[#071d49] flex flex-col items-start gap-x-1 justify-start w-full">
                                    <label class="text-sm font-inter font-medium leading-relaxed tracking-wide text-blue-800">Complete Home Address (Permanent) </label>
                                    <div class="flex flex-row w-full justify-start gap-x-4">
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">House No.</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->permanent_house_no ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Street</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->permanent_street ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Brgy.</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->permanent_brgy ?? 'n/a'}}</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-row w-full justify-start gap-x-4">
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">City</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->permanent_city ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Province</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->permanent_province ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col items-center justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Zip Code</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->permanent_zip_code ?? 'n/a'}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Contacts Information --}}
                    <div @click="openSection = (openSection === 'contactInfo' ? null : 'contactInfo')" class="cursor-pointer border-blue-400 border rounded-lg p-5">
                        <div class="text-[#071d49] font-semibold flex flex-row justify-between items-center">
                            <div class="flex flex-row justify-center items-center gap-x-2">    
                                <img src="{{ asset('contacts-book.png') }}" alt="academic" class="size-4">
                                Employee's Contact Informations
                            </div>
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5 transition-transform duration-300 text-blue-400"
                                :class="openSection === 'contactInfo' ? 'rotate-180' : ''"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25L12 15.75 4.5 8.25" />
                            </svg>
                        </div>
                        <div x-show="openSection === 'contactInfo'" x-transition x-cloak class="flex flex-row w-full h-full items-center justify-between gap-y-2 gap-x-5 pt-3">
                            {{-- Left --}}
                            <div class="flex flex-col w-full h-full items-center gap-y-5">
                                {{-- First Column --}}
                                <div class="text-[#071d49] flex flex-row items-center gap-x-1 justify-between w-[80%] gap-y-5 ">
                                    <div class="text-[#071d49] flex flex-col items-center gap-x-1 justify-start">
                                        <label class="text-sm font-inter font-medium leading-relaxed tracking-wide text-blue-400">Personal Email: </label>
                                        <label class="text-[#071d49] text-sm font-inter" name="fullName">{{ $employee->employee_personal_email ?? 'n/a'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Personal Number</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_contact_no1 ?? 'n/a'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Phone No. 2</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_contact_no2 ?? 'n/a'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Viber Number</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_viber_number ?? 'n/a'}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Education and Job Information --}}
                    <div @click="openSection = (openSection === 'educjobInfo' ? null : 'educjobInfo')" class="cursor-pointer border-blue-400 border rounded-lg p-5">
                        <div class="text-[#071d49] font-semibold flex flex-row justify-between items-center">
                            <div class="flex flex-row justify-center items-center gap-x-2">
                                <img src="{{ asset('academic.png') }}" alt="academic" class="size-4">
                                Employee's Education and Job Information
                            </div>
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5 transition-transform duration-300 text-blue-400"
                                :class="openSection === 'educjobInfo' ? 'rotate-180' : ''"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25L12 15.75 4.5 8.25" />
                            </svg>
                        </div>
                        <div x-show="openSection === 'educjobInfo'" x-transition x-cloak class="flex flex-row w-full h-full items-center justify-evenly gap-x-5 gap-y-2 pt-3">
                            
                            <div class="flex flex-col w-[45%] h-full items-center gap-y-5 ">
                                {{-- first Column --}}
                                <div class="text-[#071d49] flex flex-row items-start gap-x-1 justify-between w-full gap-y-5">
                                    <div class="flex flex-col w-[60%] h-full justify-between items-start gap-y-5">
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">School Attended</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_school_attended ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Educational Attainment</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_educational_attainment ?? 'n/a'}}</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-[40%] h-full justify-between items-start gap-y-5">
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">For College/Vocational</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_college_vocational_status ?? 'n/a'}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="flex border border-blue-400 h-[90px] rounded-xl"></div>
                            <div class="flex flex-col w-[45%] h-full items-start gap-y-5 ">
                                {{-- Second Column --}}
                                <div class="text-[#071d49] flex flex-row items-start gap-x-1 justify-between w-full gap-y-5">
                                    <div class="flex flex-col w-[50%] h-full justify-between items-start gap-y-5">
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Job Position Title</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_job_position ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Company Email</label>
                                            <label class="text-[#071d49] text-sm font-inter" name="fullName">{{ $employee->employee_company_email ?? 'n/a'}}</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-[50%] h-full justify-start items-start gap-y-5">
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Type of Employment</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_employment_type ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Department</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_department ?? 'n/a'}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Government IDs --}}
                    <div @click="openSection = (openSection === 'govID' ? null : 'govID')" class="cursor-pointer border-blue-400 border rounded-lg p-5">
                        <div class="text-[#071d49] font-semibold flex flex-row justify-between items-center">
                            <div class="flex flex-row justify-center items-center gap-x-2">    
                                <img src="{{ asset('id-card.png') }}" alt="otherInfo" class="size-4">
                                Employee's Government IDs
                            </div>
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5 transition-transform duration-300 text-blue-400"
                                :class="openSection === 'govID' ? 'rotate-180' : ''"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25L12 15.75 4.5 8.25" />
                            </svg>
                        </div>
                        {{-- Left --}}
                        <div x-show="openSection === 'govID'" x-transition x-cloak class="flex flex-row w-full h-auto items-center justify-center pt-3">
                            {{-- First Column --}}
                            <div class="text-[#071d49] flex flex-row items-center gap-x-5 justify-between w-[80%]">
                                <div class="flex flex-col justify-center items-center">
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">SSS Number</label>
                                    <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_sss_number ?? 'n/a'}}</label>
                                </div>
                                <div class="flex flex-col justify-center items-center">
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">TIN Number</label>
                                    <label class="text-[#071d49] text-sm font-inter" name="fullName">{{ $employee->employee_tin_number ?? 'n/a'}}</label>
                                </div>
                                <div class="flex flex-col justify-center items-center">
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">PhilHealth Number</label>
                                    <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_philhealth_number ?? 'n/a'}}</label>
                                </div>
                                <div class="flex flex-col justify-center items-center">
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Pag-Ibig Number</label>
                                    <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_pagibig_number ?? 'n/a'}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Employee's Dependants --}}
                    <div @click="openSection = (openSection === 'dependantInfo' ? null : 'dependantInfo')" class="cursor-pointer border-blue-400 border rounded-lg p-5">
                        <div class="text-[#071d49] font-semibold flex flex-row justify-between items-center">
                            <div class="flex flex-row justify-center items-center gap-x-2">    
                                <img src="{{ asset('social-networks.png') }}" alt="otherInfo" class="size-4">
                                Employee's Dependents
                            </div>
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5 transition-transform duration-300 text-blue-400"
                                :class="openSection === 'dependantInfo' ? 'rotate-180' : ''"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25L12 15.75 4.5 8.25" />
                            </svg>
                        </div>
                        {{-- Left --}}
                        <div x-show="openSection === 'dependantInfo'" x-transition x-cloak class="flex flex-col w-full h-auto items-center justify-center pt-3">
                            <div class="flex flex-row w-[95%] justify-between items-center gap-x-5">
                                {{-- Left Side --}}
                                <div class="flex flex-col w-[50%] justify-center items-start gap-y-5">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-sm font-inter font-medium leading-relaxed tracking-wide text-blue-800 text-center">
                                            Father's Information
                                        </label>
                                        <div class="flex flex-row gap-x-10 items-start justify-center">
                                            <div class="flex flex-col justify-center items-start">
                                                <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Full Name</label>
                                                <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_parents_1_details ?? 'n/a'}}</label>
                                            </div>
                                            <div class="flex flex-col justify-center items-start">
                                                <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Age</label>
                                                <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_parents_1_age ?? 'n/a'}}</label>
                                            </div>
                                            <div class="flex flex-col justify-center items-start">
                                                <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Birthdate</label>
                                                <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_parents_1_birthdate ?? 'n/a'}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-sm font-inter font-medium leading-relaxed tracking-wide text-blue-800 text-center">
                                            Mother's Information
                                        </label>
                                        <div class="flex flex-row gap-x-10 items-start justify-center">
                                            <div class="flex flex-col justify-center items-start">
                                                <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Full Name</label>
                                                <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_parents_2_details ?? 'n/a'}}</label>
                                            </div>
                                            <div class="flex flex-col justify-center items-start">
                                                <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Age</label>
                                                <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_parents_2_age ?? 'n/a'}}</label>
                                            </div>
                                            <div class="flex flex-col justify-center items-start">
                                                <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Birthdate</label>
                                                <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_parents_2_birthdate ?? 'n/a'}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Line --}}
                                <div class="flex border border-blue-400 h-[110px] rounded-xl"></div>
                                {{-- Right Side --}}
                                <div class="flex flex-col w-[50%] h-full justify-start items-start bg-blue">
                                    <label class="text-sm font-inter font-medium leading-relaxed tracking-wide text-blue-800 text-center">
                                        Number of Children:
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_children_count ?? 'n/a'}}</label>
                                    </label>
                                    <div class="flex flex-row gap-x-10 items-start justify-center">
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Full Name</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_children_1_details ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Age</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_children_1_age ?? 'n/a'}}</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Birthdate</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_children_1_birthdate ?? 'n/a'}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Employee's Emergency Contact --}}
                    <div @click="openSection = (openSection === 'emergencyContact' ? null : 'emergencyContact')" class="cursor-pointer border-blue-400 border rounded-lg p-5">
                        <div class="text-[#071d49] font-semibold flex flex-row justify-between items-center">
                            <div class="flex flex-row justify-center items-center gap-x-2">   
                                <img src="{{ asset('emergency.png') }}" alt="emergency" class="size-4">
                                Employee's Emergency Contacts
                            </div>
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5 transition-transform duration-300 text-blue-400"
                                :class="openSection === 'emergencyContact' ? 'rotate-180' : ''"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25L12 15.75 4.5 8.25" />
                            </svg>
                        </div>
                        <div x-show="openSection === 'emergencyContact'" x-transition x-cloak class="flex flex-row w-full h-auto items-center gap-y-5 gap-x-7 px-8 pt-3">
                            {{-- First Column --}}
                            <div class="text-[#071d49] flex flex-row items-start gap-y-5 gap-x-1 justify-between w-[50%]">
                                <div class="flex flex-col w-full h-full justify-between items-start gap-y-5 ">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Full Name</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->emergency_contact_1_name ?? 'n/a'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Relationship</label>
                                        <label class="text-[#071d49] text-sm font-inter" name="fullName">{{ $employee->emergency_contact_1_relationship ?? 'n/a'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Contact Number</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->emergency_contact_1_number ?? 'n/a'}}</label>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full h-full justify-start items-start gap-y-5">
                                    <div class="text-[#071d49] flex flex-col items-start gap-x-1 justify-start w-full">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Address</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->emergency_contact_1_address ?? 'n/a'}}</label>
                                    </div>
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="flex border border-blue-400 h-[140px] rounded-xl"></div>
                            {{-- Second Column --}}
                            <div class="text-[#071d49] flex flex-row items-start gap-x-1 justify-between w-[50%] gap-y-5 ">
                                <div class="flex flex-col w-full h-full justify-between items-start gap-y-5 ">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Full Name</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->emergency_contact_2_name ?? 'n/a'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Relationship</label>
                                        <label class="text-[#071d49] text-sm font-inter" name="fullName">{{ $employee->emergency_contact_2_relationship ?? 'n/a'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Contact Number</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->emergency_contact_2_number ?? 'n/a'}}</label>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full h-full justify-start items-start gap-y-5">
                                    <div class="text-[#071d49] flex flex-col items-start gap-x-1 justify-start w-full">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Address</label>
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->emergency_contact_2_address ?? 'n/a'}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>