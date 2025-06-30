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
            <div class="flex flex-col justify-between">
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
                <div class="join join-vertical bg-white-100 p-5">
                    {{-- Basic Information --}}
                    <div class="collapse collapse-arrow join-item border-blue-400 border">
                        <input type="radio" name="my-accordion-4" checked="checked" />
                        <div class="collapse-title text-[#071d49] font-semibold flex flex-row items-center gap-x-2">
                            <img src="{{ asset('basicInfo.png') }}" alt="basicInfo" class="size-4">
                            Employee's Basic Information
                        </div>
                        <div class="collapse-content flex flex-row w-full h-full items-center justify-between gap-y-2 gap-x-5">
                            <div class="flex flex-col w-[20%] justify-center items-center gap-y-2">
                                <img src="data:image/svg+xml;utf-8,<svg xmlns='http://www.w3.org/2000/svg' width='107' height='107' viewBox='0 0 107 107' fill='none'><path d='M88.75 89.25H89.25V88.75V82.875C89.25 79.7557 87.6871 77.0261 85.2382 74.7091C82.7917 72.3943 79.4274 70.4566 75.7249 68.9015C68.3218 65.7922 59.4436 64.1625 53.5 64.1625C47.5564 64.1625 38.6782 65.7922 31.2751 68.9015C27.5726 70.4566 24.2083 72.3943 21.7618 74.7091C19.3129 77.0261 17.75 79.7557 17.75 82.875V88.75V89.25H18.25H88.75ZM1.125 94.625V12.375C1.125 6.18701 6.13152 1.125 12.375 1.125H94.625C100.811 1.125 105.875 6.18864 105.875 12.375V94.625C105.875 100.811 100.811 105.875 94.625 105.875H12.375C6.13152 105.875 1.125 100.813 1.125 94.625ZM53.5 54C63.5286 54 71.625 45.9036 71.625 35.875C71.625 25.8464 63.5286 17.75 53.5 17.75C43.4714 17.75 35.375 25.8464 35.375 35.875C35.375 45.9036 43.4714 54 53.5 54Z' fill='%23CBD5E1' stroke='%239CA3AF'/></svg>"
                                    alt="profile image" class="size-[70%] rounded-xl">
                                <div class="flex flex-row w-auto justify-center items-center gap-x-1">
                                    <label class="text-sm font-medium leading-relaxed tracking-wide text-blue-400">Employee ID: </label>
                                    <label class="text-[#071d49] text-sm"name="employeeID">1203293</label>
                                </div>
                            </div>
                            {{-- Left --}}
                            <div class="flex flex-col w-[40%] h-full justify-center items-center gap-y-5">
                                {{-- First Row --}}
                                <div class="text-[#071d49] flex flex-row items-center gap-x-1 justify-between w-full">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">John Maverick Clemente</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Full Name</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-end">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">III</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Suffix</label>
                                    </div>
                                </div>
                                {{-- Second Row --}}
                                <div class="text-[#071d49] flex flex-row items-center gap-x-1 justify-between w-full">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">Male</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Gender</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">23 years old</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Age</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-end">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">n/a</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Maiden Name</label>
                                    </div>
                                </div>
                                {{-- Third Row --}}
                                <div class="text-[#071d49] flex flex-row items-center gap-x-1 justify-between w-full">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">June 5, 2002</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Birthdate</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">Caloocan City</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Birthplace</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-end">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">Catholic</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Religion</label>
                                    </div>
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="flex border border-blue-400 h-[170px] rounded-xl"></div>
                            {{-- Right --}}
                            <div class="flex flex-col w-[40%] h-full gap-y-3">
                                <div class="text-[#071d49] flex flex-row items-center gap-x-1 justify-start w-full">
                                    <label class="text-sm font-inter font-medium leading-relaxed tracking-wide text-blue-400">Email: </label>
                                    <label class="text-[#071d49] text-sm font-inter" name="fullName">maestromavs@gmail.com</label>
                                </div>
                                <div class="text-[#071d49] flex flex-col items-start gap-x-1 justify-start w-full">
                                    <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">111 Marcela Street Brgy. 27, Maypajo Caloocan City, Metro Manila</label>
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Complete Home Address (Present) </label>
                                </div>
                                <div class="text-[#071d49] flex flex-col items-start gap-x-1 justify-start w-full">
                                    <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">111 Marcela Street Brgy. 27, Maypajo Caloocan City, Metro Manila</label>
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Complete Home Address (Permanent) </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Education and Job Information --}}
                    <div class="collapse collapse-arrow join-item border-blue-400 border">
                        <input type="radio" name="my-accordion-4" />
                        <div class="collapse-title text-[#071d49] font-semibold flex flex-row items-center gap-x-2">
                            <img src="{{ asset('academic.png') }}" alt="academic" class="size-4">
                            Employee's Education and Job Information
                        </div>
                        <div class="collapse-content flex flex-row w-full h-full items-center justify-between gap-y-2 gap-x-5">
                            {{-- Left --}}
                            <div class="flex flex-col w-[30%] h-full items-center gap-y-5">
                                {{-- First Column --}}
                                <div class="text-[#071d49] flex flex-col items-center gap-x-1 justify-between w-full gap-y-5 ">
                                    <div class="flex flex-col justify-center items-center">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">+63 912 345 6789</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Phone No. 1</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">+63 912 345 6789</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Phone No. 2</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">+63 912 345 6789</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Viber Number</label>
                                    </div>
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="flex border border-blue-400 h-[170px] rounded-xl"></div>
                            <div class="flex flex-col w-[30%] h-full items-start gap-y-5 ">
                                {{-- Second Column --}}
                                <div class="text-[#071d49] flex flex-col items-start gap-x-1 justify-between w-full gap-y-5">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">University of Caloocan City</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">School Attended</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">College Graduate</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Educational Attainment</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">n/a</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">For College/Vocational</label>
                                    </div>
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="flex border border-blue-400 h-[170px] rounded-xl"></div>
                            <div class="flex flex-col w-[40%] h-full items-start gap-y-5 ">
                                {{-- Third Column --}}
                                <div class="text-[#071d49] flex flex-row items-start gap-x-1 justify-between w-full gap-y-5">
                                    <div class="flex flex-col w-full h-full justify-between items-start gap-y-5">
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">Single</label>
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Status</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">IT Developer</label>
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Job Position Title</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-[#071d49] text-sm font-inter" name="fullName">aap.mavsclemente@gmail.com</label>
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Company Email</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-full h-full justify-start items-start gap-y-5">
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">Full Time Job</label>
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Type of Employment</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-start">
                                            <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">IST</label>
                                            <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Department</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Other Information --}}
                    <div class="collapse collapse-arrow join-item border-blue-400 border">
                        <input type="radio" name="my-accordion-4" />
                        <div class="collapse-title text-[#071d49] font-semibold flex flex-row items-center gap-x-2">
                            <img src="{{ asset('otherInfo.png') }}" alt="otherInfo" class="size-4">
                            Employee's Other Information
                        </div>
                        {{-- Left --}}
                        <div class="collapse-content flex flex-row w-full h-auto items-center gap-y-5 gap-x-7 px-8">
                            {{-- First Column --}}
                            <div class="text-[#071d49] flex flex-row items-start gap-x-5 justify-between w-[30%]">
                                <div class="flex flex-col w-full h-full justify-between items-start gap-y-5 ">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">34-1234567-9</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">SSS Number</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter" name="fullName">123-456-789-000</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">TIN Number</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">12-345678901-2</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">PhilHealth Number</label>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full h-full justify-start items-start gap-y-5">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">1234-5678-9123</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Pag-Ibig Number</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">n/a</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Number of Children</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">AB+</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Blood Type</label>
                                    </div>
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="flex border border-blue-400 h-[170px] rounded-xl"></div>
                            {{-- Second Column --}}
                            <div class="text-[#071d49] flex flex-col items-start gap-x-1 justify-between w-[19%] gap-y-5 ">
                                <div class="flex flex-col justify-center items-start">
                                    <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">n/a</label>
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Child's Full Name</label>
                                </div>
                                <div class="flex flex-col justify-center items-start">
                                    <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">n/a</label>
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Child's Age</label>
                                </div>
                                <div class="flex flex-col justify-center items-start">
                                    <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">n/a</label>
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Child's Birthdate</label>
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="flex border border-blue-400 h-[170px] rounded-xl"></div>
                            {{-- Third Column --}}
                            <div class="text-[#071d49] flex flex-row items-start gap-x-5 justify-between w-[36%]">
                                <div class="flex flex-col w-full h-full justify-between items-start gap-y-5 ">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">Lolito M. Clemente</label>
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Father's Full Name</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">52</label>
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Father's Age</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">03/08/1973</label>
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Father's Birthdate</label>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full h-full justify-start items-start gap-y-5">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">Alma M. Clemente</label>
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Mother's Full Name</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">50</label>
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Mother's Age</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">24/02/1975</label>
                                    <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Mother's Birthdate</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border-blue-400 border">
                        <input type="radio" name="my-accordion-4" />
                        <div class="collapse-title text-[#071d49] font-semibold flex flex-row items-center gap-x-2">
                            <img src="{{ asset('emergency.png') }}" alt="emergency" class="size-4">
                            Employee's Emergency Contacts
                        </div>
                        <div class="collapse-content flex flex-row w-full h-auto items-center gap-y-5 gap-x-7 px-8">
                            {{-- First Column --}}
                            <div class="text-[#071d49] flex flex-row items-start gap-x-5 justify-between w-[50%]">
                                <div class="flex flex-col w-full h-full justify-between items-start gap-y-5 ">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">Lolito M. Clemente</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Full Name</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter" name="fullName">Father</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Relationship</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">+63 912 345 6789</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Contact Number</label>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full h-full justify-start items-start gap-y-5">
                                    <div class="text-[#071d49] flex flex-col items-start gap-x-1 justify-start w-full">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">111 Marcela Street Brgy. 27, Maypajo Caloocan City, Metro Manila</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Address</label>
                                    </div>
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="flex border border-blue-400 h-[170px] rounded-xl"></div>
                            {{-- Second Column --}}
                            <div class="text-[#071d49] flex flex-row items-start gap-x-1 justify-between w-[50%] gap-y-5 ">
                                <div class="flex flex-col w-full h-full justify-between items-start gap-y-5 ">
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">Alma M. Clemente</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Full Name</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter" name="fullName">Mother</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Relationship</label>
                                    </div>
                                    <div class="flex flex-col justify-center items-start">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">+63 912 345 6789</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Contact Number</label>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full h-full justify-start items-start gap-y-5">
                                    <div class="text-[#071d49] flex flex-col items-start gap-x-1 justify-start w-full">
                                        <label class="text-[#071d49] text-sm font-inter uppercase" name="fullName">111 Marcela Street Brgy. 27, Maypajo Caloocan City, Metro Manila</label>
                                        <label class="text-xs font-inter font-medium leading-relaxed tracking-wide text-blue-400">Address</label>
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