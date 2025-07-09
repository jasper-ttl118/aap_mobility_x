
<x-app-layout class='flex flex-row w-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='Employee Management'>
  
    <div x-data="{ selected : 'employees', open_add_employee : false, open_delete_employee : false, 
                   open_view_employee : false, open_edit_employee : false, open_add_intern : false, 
                   open_delete_intern : false, open_view_intern : false, open_edit_intern : false
                }" 
        class="flex flex-1 flex-col lg:ml-52 overflow-y-auto px-5 py-3 lg:px-10 gap-7 mt-12 bg-[#f3f4f6]">
      
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
                    <a href="/employee" class="hover:underline truncate">Employee Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="/employee" class="hover:underline truncate">Alphalist</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="hover:underline font-semibold truncate">Employee Profile</a>
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
                        <div x-show="openSection === 'basicInfo'" x-transition x-cloak class="flex flex-col lg:flex-row w-full h-full items-center justify-evenly gap-y-2 gap-x-3 pt-3">
                            <div class="flex flex-row lg:flex-col w-full lg:w-[15%] justify-center items-center gap-y-5 gap-x-3">
                                <img src="data:image/svg+xml;utf-8,<svg xmlns='http://www.w3.org/2000/svg' width='107' height='107' viewBox='0 0 107 107' fill='none'><path d='M88.75 89.25H89.25V88.75V82.875C89.25 79.7557 87.6871 77.0261 85.2382 74.7091C82.7917 72.3943 79.4274 70.4566 75.7249 68.9015C68.3218 65.7922 59.4436 64.1625 53.5 64.1625C47.5564 64.1625 38.6782 65.7922 31.2751 68.9015C27.5726 70.4566 24.2083 72.3943 21.7618 74.7091C19.3129 77.0261 17.75 79.7557 17.75 82.875V88.75V89.25H18.25H88.75ZM1.125 94.625V12.375C1.125 6.18701 6.13152 1.125 12.375 1.125H94.625C100.811 1.125 105.875 6.18864 105.875 12.375V94.625C105.875 100.811 100.811 105.875 94.625 105.875H12.375C6.13152 105.875 1.125 100.813 1.125 94.625ZM53.5 54C63.5286 54 71.625 45.9036 71.625 35.875C71.625 25.8464 63.5286 17.75 53.5 17.75C43.4714 17.75 35.375 25.8464 35.375 35.875C35.375 45.9036 43.4714 54 53.5 54Z' fill='%23CBD5E1' stroke='%239CA3AF'/></svg>"
                                    alt="profile image" class="size-[30%] lg:size-[70%] rounded-xl">
                                <div class="flex flex-col w-auto justify-center items-center gap-x-2">
                                    <label class="text-sm text-center font-medium leading-relaxed tracking-wide text-blue-400">Employee ID</label>
                                    <label class="text-[#071d49] text-sm"name="employeeID">{{ $employee->employee_id}}</label>
                                </div>
                            </div>
                            {{-- Left --}}
                    
                            <div class="flex flex-col w-[45%] h-full justify-center items-center gap-y-4">
                                <table class="w-full border-collapse px-0">
                                    <tr class="">
                                        <td class="pb-2 px-2 align-top w-[30%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Last Name</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_lastname ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-2 px-2 align-top w-[30%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">First Name</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_firstname ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-2 px-2 align-top w-[35%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Middle Name</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_middlename ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-2 px-2 align-top w-[5%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Suffix</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_suffix ?? 'N/A'}}</div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="pb-2 px-2 align-top w-[25%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Gender</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_gender ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-2 px-2 align-top w-[25%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Religion</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_religion ?? 'N/A'}}</div>
                                        </td>
                                        <td colspan="2" class="pb-2 px-2 align-top w-full">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Mother's Maiden Name</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_mother_maiden_name ?? 'N/A'}}</div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="pb-2 px-2 align-top w-[25%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Age</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee_age ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-2 px-2 align-top w-[25%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Birthdate</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{\Carbon\Carbon::parse($employee->employee_birthdate)->format('m-d-Y') ?? 'N/A'}}</div>
                                        </td>
                                        <td colspan="2" class="pb-2 px-2 align-top w-full">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Birthplace</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_birthplace ?? 'N/A'}}</div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="pb-2 px-2 align-top w-[25%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Civil Status</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_civil_status ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-2 px-2 align-top w-[25%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Blood Type</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{($employee->employee_blood_type) ?? 'N/A'}}</div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            {{-- Line --}}
                            <div class="flex border border-blue-400 w-[220px] rounded-xl lg:hidden"></div>
                            <div class="flex border border-blue-400 h-[170px] rounded-xl hidden lg:flex"></div>
                            {{-- Right --}}
                            <div class="flex flex-col w-full lg:w-[40%] h-full gap-y-1">
                                
                                <div class="text-[#071d49] flex flex-col items-start gap-x-1 justify-start w-full">
                                    <label class="text-sm font-inter font-medium leading-relaxed tracking-wide text-blue-800 bg-blue-50 w-full px-2">Complete Home Address (Present) </label>
                                    <div class="flex flex-row w-full justify-start gap-x-4">
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">House No.</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_present_house_no ?? 'N/A'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Street</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_present_street ?? 'N/A'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Brgy.</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_present_brgy ?? 'N/A'}}</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-row w-full justify-start gap-x-4">
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">City</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_present_city ?? 'N/A'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Province</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_present_province ?? 'N/A'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Zip Code</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_present_zip_code ?? 'N/A'}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-[#071d49] flex flex-col items-start gap-x-1 justify-start w-full">
                                    <label class="text-sm font-inter font-medium leading-relaxed tracking-wide text-blue-800 bg-blue-50 w-full px-2">Complete Home Address (Permanent) </label>
                                    <div class="flex flex-row w-full justify-start gap-x-4">
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">House No.</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_permanent_house_no ?? 'N/A'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Street</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_permanent_street ?? 'N/A'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Brgy.</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_permanent_brgy ?? 'N/A'}}</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-row w-full justify-start gap-x-4">
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">City</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_permanent_city ?? 'N/A'}}</label>
                                        </div>
                                        <div class="flex flex-col items-start justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Province</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_permanent_province ?? 'N/A'}}</label>
                                        </div>
                                        <div class="flex flex-col items-center justify-center">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Zip Code</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_permanent_zip_code ?? 'N/A'}}</label>
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

                        <div x-show="openSection === 'contactInfo'" x-transition x-cloak class="flex flex-col w-full h-full items-center gap-y-5 pt-3">
                            
                            {{-- First Row --}}
                            <div class="flex flex-col lg:flex-row w-full lg:w-[80%] justify-between gap-y-5 lg:gap-x-10">
                                <div class="flex flex-col w-full lg:w-1/3 gap-y-1 items-start">
                                    <label class="text-sm font-inter font-medium leading-relaxed tracking-wide text-blue-400">Personal Email:</label>
                                    <label class="text-[#071d49] text-xs lg:text-sm font-inter">{{ $employee->employee_personal_email ?? 'N/A' }}</label>
                                </div>

                                <div class="flex flex-col w-full lg:w-1/3 gap-y-1 items-start">
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Personal Number</label>
                                    <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_contact_no1 ?? 'N/A' }}</label>
                                </div>

                                <div class="flex flex-col w-full lg:w-1/3 gap-y-1 items-start">
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Phone No. 2</label>
                                    <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_contact_no2 ?? 'N/A' }}</label>
                                </div>
                            </div>

                            {{-- Second Row --}}
                            <div class="flex flex-col lg:flex-row w-full lg:w-[80%] justify-between gap-y-5 lg:gap-x-10">
                                <div class="flex flex-col w-full lg:w-1/3 gap-y-1 items-start">
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Viber Number</label>
                                    <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_viber_number ?? 'N/A' }}</label>
                                </div>

                                <div class="flex flex-col w-full lg:w-1/3 gap-y-1 items-start">
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Company Number</label>
                                    <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_company_number ?? 'N/A' }}</label>
                                </div>

                                <div class="flex flex-col w-full lg:w-1/3 gap-y-1 items-start">
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Company Email</label>
                                    <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_company_email ?? 'N/A' }}</label>
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
                        <div x-show="openSection === 'educjobInfo'" x-transition x-cloak class="flex flex-col lg:flex-row w-full h-full items-center justify-evenly gap-x-5 gap-y-2 pt-3">
                            
                            <div class="flex flex-col w-full lg:w-[45%] h-full items-center gap-y-5 ">
                                {{-- first Column --}}
                                <div class="text-[#071d49] flex flex-col lg:flex-row items-start gap-x-1 justify-between w-full gap-y-2">
                                    <div class="flex flex-col w-full lg:w-[60%] h-full justify-between items-start gap-y-2 lg:gap-y-5">
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">School Attended</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_school_attended ?? 'N/A'}}</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Educational Attainment</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_educational_attainment ?? 'N/A'}}</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-full lg:w-[40%] h-full justify-between items-start gap-y-2 lg:gap-y-5">
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">College Course</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_college_course ?? 'N/A'}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="flex border border-blue-400 w-[220px] rounded-xl lg:hidden"></div>
                            <div class="flex border border-blue-400 h-[90px] rounded-xl hidden lg:flex"></div>
                            <div class="flex flex-col w-full lg:w-[45%] h-full items-start gap-y-5 ">
                                {{-- Second Column --}}
                                <div class="text-[#071d49] flex flex-col lg:flex-row items-start gap-x-1 justify-between w-full gap-y-2">
                                    <div class="flex flex-col w-full lg:w-[50%] h-full justify-between items-start gap-y-2 lg:gap-y-5">
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Job Position Title</label>
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">{{ $employee->employee_job_position ?? 'N/A'}}</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Company Email</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter" name="fullName">{{ $employee->employee_company_email ?? 'N/A'}}</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-full lg:w-[50%] h-full justify-start items-start gap-y-2 lg:gap-y-5">
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Type of Employment</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_employment_type ?? 'N/A'}}</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Department</label>
                                            <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->department->department_name ?? 'N/A'}}</label>
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
                        <div x-show="openSection === 'govID'" x-transition x-cloak class="flex flex-col lg:flex-row w-full h-auto items-center justify-center pt-3">
                            {{-- First Column --}}
                            <div class="text-[#071d49] flex flex-row items-center lg:gap-x-28 justify-center w-full lg:w-[80%]">
                                <div class="flex flex-col lg:flex-row w-[50%] lg:w-[35%] justify-between gap-y-2">
                                    <div class="flex flex-col justify-center items-center">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">SSS Number</label>
                                        <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_sss_number ?? 'N/A'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">TIN Number</label>
                                        <label class="text-[#071d49] text-xs lg:text-sm font-inter" name="fullName">{{ $employee->employee_tin_number ?? 'N/A'}}</label>
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row w-[50%] lg:w-[35%] justify-between gap-y-2">
                                    <div class="flex flex-col justify-center items-center">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">PhilHealth No.</label>
                                        <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_philhealth_number ?? 'N/A'}}</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Pag-Ibig Number</label>
                                        <label class="text-[#071d49] text-xs lg:text-sm font-inter uppercase" name="fullName">{{ $employee->employee_pagibig_number ?? 'N/A'}}</label>
                                    </div>
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
                            <div class="flex flex-col w-[95%] justify-between items-center gap-y-5">
                                <table class="w-full border-collapse">
                                    <!-- Father's Information -->
                                    <tr>
                                        <td colspan="3" class="text-sm text-left px-2 font-inter font-medium leading-relaxed tracking-wide text-blue-800 bg-blue-50">
                                            Father's Information
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="pb-3 px-2 align-top w-[50%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Full Name</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_father_name ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-3 px-2 align-top w-[20%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Age</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $father_age ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-3 px-2 align-top w-[30%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Birthdate</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_father_birthdate ?? 'N/A'}}</div>
                                        </td>
                                    </tr>
                                    
                                    <!-- Mother's Information -->
                                    <tr>
                                        <td colspan="3" class="text-sm text-left px-2 font-inter font-medium leading-relaxed tracking-wide text-blue-800 bg-blue-50">
                                            Mother's Information
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="pb-3 px-2 align-top w-[50%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Full Name</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_mother_name ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-3 px-2 align-top w-[20%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Age</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $mother_age ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-3 px-2 align-top w-[30%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Birthdate</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $employee->employee_mother_birthdate ?? 'N/A'}}</div>
                                        </td>
                                    </tr>
                                    
                                    <!-- Children Information -->
                                    <tr>
                                        <td colspan="3" class="text-sm text-left px-2 font-inter font-medium leading-relaxed tracking-wide text-blue-800 bg-blue-50">
                                            Number of Children: 
                                            <span class="text-[#071d49] text-sm font-inter uppercase">{{ $employee->employeeChildren()->count() ?? 'N/A'}}</span>
                                        </td>
                                    </tr>
                                    @foreach ($employee->employeeChildren as $children)
                                        <tr class="">
                                            <td class="pb-3 px-2 align-top w-[50%]">
                                                <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Full Name</div>
                                                <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{  $children->employee_child_name ?? 'N/A'}}</div>
                                            </td>
                                            <td class="pb-3 px-2 align-top w-[20%]">
                                                <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Age</div>
                                                <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">
                                                    {{ $children->employee_child_birthdate ? \Carbon\Carbon::parse($children->employee_child_birthdate)->age : 'N/A' }}
                                                </div>                                        
                                            </td>
                                            <td class="pb-3 px-2 align-top w-[30%]">
                                                <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Birthdate</div>
                                                <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $children->employee_child_birthdate ?? 'N/A'}}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
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
                        <div x-show="openSection === 'emergencyContact'" x-transition x-cloak class="flex flex-row w-full h-auto justify-center items-center pt-3">
                            <div class="hidden lg:block flex flex-col w-[95%] justify-between items-center gap-y-5">
                                <table class="w-[90%] lg:w-full border-collapse">
                                @foreach ($employee->employeeEmergencyContacts as $contact)
                                    <tr>
                                        <td colspan="4" class="text-sm text-left px-2 font-inter font-medium leading-relaxed tracking-wide text-blue-800 bg-blue-50">
                                            Emergency Contact #1
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="pb-3 px-2 align-top w-[25%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Full Name</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $contact->employee_emergency_contact_name ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-3 px-2 align-top w-[15%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Relationship</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $contact->employee_emergency_contact_relationship ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-3 px-2 align-top w-[20%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Contact Number</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $contact->employee_emergency_contact_number ?? 'N/A'}}</div>
                                        </td>
                                        <td class="pb-3 px-2 align-top w-[40%]">
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Address</div>
                                            <div class="text-[#071d49] text-xs lg:text-sm font-inter uppercase">{{ $contact->employee_emergency_contact_address ?? 'N/A'}}</div>
                                        </td>
                                    </tr>
                                @endforeach

                               
                                </table>
                            </div>
                            <div class="block lg:hidden flex flex-col w-[95%] justify-between items-center gap-y-5">
                                <div class="bg-white overflow-hidden">
                                    <div class="text-sm text-left px-4 py-1 font-inter font-medium leading-relaxed tracking-wide text-blue-800 bg-blue-50">
                                        Emergency Contact #1
                                    </div>
                                    <div class="px-4 space-y-1">
                                        <div >
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Full Name</div>
                                            <div class="text-[#071d49] text-sm font-inter uppercase">{{ $employee->emergency_contact_1_name ?? 'N/A'}}</div>
                                        </div>
                                        <div >
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Relationship</div>
                                            <div class="text-[#071d49] text-sm font-inter uppercase">{{ $employee->emergency_contact_1_relationship ?? 'N/A'}}</div>
                                        </div>
                                        <div>
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Contact Number</div>
                                            <div class="text-[#071d49] text-sm font-inter uppercase">{{ $employee->emergency_contact_1_number ?? 'N/A'}}</div>
                                        </div>
                                        <div>
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Address</div>
                                            <div class="text-[#071d49] text-sm font-inter uppercase">{{ $employee->emergency_contact_1_address ?? 'N/A'}}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Emergency Contact #2 -->
                                <div class="bg-white overflow-hidden">
                                    <div class="text-sm text-left px-4 py-1 font-inter font-medium leading-relaxed tracking-wide text-blue-800 bg-blue-50">
                                        Emergency Contact #2
                                    </div>
                                    <div class="px-4 space-y-1">
                                        <div>
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Full Name</div>
                                            <div class="text-[#071d49] text-sm font-inter uppercase">{{ $employee->emergency_contact_2_name ?? 'N/A'}}</div>
                                        </div>
                                        <div>
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Relationship</div>
                                            <div class="text-[#071d49] text-sm font-inter uppercase">{{ $employee->emergency_contact_2_relationship ?? 'N/A'}}</div>
                                        </div>
                                        <div>
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Contact Number</div>
                                            <div class="text-[#071d49] text-sm font-inter uppercase">{{ $employee->emergency_contact_2_number ?? 'N/A'}}</div>
                                        </div>
                                        <div>
                                            <div class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400 mb-1">Address</div>
                                            <div class="text-[#071d49] text-sm font-inter uppercase">{{ $employee->emergency_contact_2_address ?? 'N/A'}}</div>
                                        </div>
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