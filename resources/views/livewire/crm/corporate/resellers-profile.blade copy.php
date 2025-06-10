<!-- Modal overlay -->
<div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <!-- Modal content -->
    <div @click.outside="open=false" 
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="relative flex flex-col lg:flex-row bg-[#151847] rounded-[36px] justify-center shadow-lg w-[80%] h-[600px] lg:h-[80%] max-w-4xl items-center gap-3">

        @foreach ($corporates ?? [] as $customer)
            
        <div class="lg:w-[40%] w-full lg:h-full h-[50%] bg-white rounded-[36px] flex flex-col justify-center items-center ">
            <div class="w-full h-[30%] bg-gradient-to-t from-[#262c7d] via-[#151847] to-[#090d40] rounded-b-2xl rounded-t-[36px]">
                <div class="flex relative justify-center mt-8 lg:mt-16 h-full w-full">
                    <img src="{{ asset('aaplogo1.png') }}" alt="aaplogo" class="size-28 lg:size-40 bg-[#f3f4f6] rounded-full p-3 border">
                </div>
            </div>
            <div class="w-full h-[70%] flex flex-col items-center justify-start -gap-1 lg:gap-1 pt-[60px] lg:pt-[75px]">
                <div class="text-xs text-[#939393] lowercase flex justify-center items-end  w-full h-auto">{{ $customer->customer_email }}</div>
                <div class="text-xl lg:text-2xl font-bold text-[#151847] lowercase flex flex-row justify-center items-center w-full h-auto">{{ $customer->customer_firstname }} {{ $customer->customer_middlename }} {{ $customer->customer_surname}}</div>
                <div class="text-xs text-[#151847] lowercase flex flex-row justify-evenly items-center w-[40%] h-auto mb-1">
                    <div class="font-bold">{{ $customer->customer_organization }}</div> 
                    <div class="text-[#151847]">|</div> 
                    <div>{{ $customer->customer_birthdate }}</div>
                </div>
                <div class="text-xs text-[#151847] lowercase flex flex-row justify-center items-center w-full h-auto">
                    <div class="flex w-full h-full gap-2 justify-center items-center">
                        <button class="h-6 w-[30%] text-[#151847] border border-[#151847] rounded-md ">Message</button>
                        <button class="h-6 w-[30%] text-[#151847] border border-[#151847] rounded-md ">Call</button>
                    </div>
                </div>
                <div class="text-xs text-[#151847] lowercase flex flex-row text-center w-[70%] h-[30%] mt-1 mb-2">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum iste, deleniti labore saepe minus ut?
                </div>
                <div class="flex border border-[#151847] w-[90%] rounded-lg hidden lg:flex"></div>
                <div class="text-xs text-[#151847] lowercase flex flex-row justify-evenly items-center w-full h-auto mt-2 hidden lg:flex">
                    <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                    <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                    <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                </div>
            </div>  
        </div>
        <div class="lg:w-[60%] w-full lg:h-full h-[50%] bg-white rounded-[36px] flex flex-col justify-start items-center p-5">
            {{-- Information --}}
            <div class="w-full h-[10%] text-[#151847] font-bold text-xl lg:text-2xl flex items-center">Information</div>
            <div class="flex flex-col w-full h-[70%] lg:h-[40%]">
                <div class="flex flex-row items-center w-full h-[20%]">
                    <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                        </svg>
                        Status
                    </div>
                    <div class="h-[60%] border border-[#605e5e] flex"></div>
                    <div class="w-[50%] h-full flex justify-end items-center px-5">
                        @if ($customer->customer_status == '1')
                            <span onclick="profile.showModal()"
                                class="bg-green-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full text-center">Active</span>
                        @else
                            <span
                                class="bg-red-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full text-center">Inactive</span>
                        @endif
                    </td>
                    </div>  
                </div>
                <div class="flex flex-row items-center w-full h-[20%]">
                    <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                            <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                        </svg>
                        Email
                    </div>
                    <div class="h-[60%] border border-[#605e5e] flex"></div>
                    <div class="w-[50%] text-xs lg:text-sm h-full flex justify-end items-center px-5">{{ $customer->customer_email}}</div>
                </div>
                <div class="flex flex-row items-center w-full h-[20%]">
                    <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor"><title/>
                        <g id="organization"><path d="M21,17.18V13a1,1,0,0,0-1-1H13V8.86a4,4,0,1,0-2,0V12H4a1,1,0,0,0-1,1v4.18a3,3,0,1,0,2,0V14h6v3.18a3,3,0,1,0,2,0V14h6v3.18a3,3,0,1,0,2,0ZM10,5a2,2,0,1,1,2,2A2,2,0,0,1,10,5ZM4,21a1,1,0,0,1,0-2A1,1,0,0,1,4,21Zm8,0a1,1,0,0,1,0-2A1,1,0,0,1,12,21Zm8,0a1,1,0,0,1,0-2A1,1,0,0,1,20,21Z"/></g></svg>
                        Organization
                    </div>
                    <div class="h-[60%] border border-[#605e5e] flex"></div>
                    <div class="w-[50%] text-xs lg:text-sm h-full flex justify-end items-center px-5">{{ $customer->customer_organization}}</div>
                </div>
                <div class="flex flex-row items-center w-full h-[20%]">
                    <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                        </svg>
                        Phone
                    </div>
                    <div class="h-[60%] border border-[#605e5e] flex"></div>
                    <div class="w-[50%] text-xs lg:text-sm h-full flex justify-end items-center px-5">{{ $customer->customer_mobile_number}}</div>
                </div>
                <div class="flex flex-row items-center w-full h-[20%]">
                    <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                        </svg>
                        Birthdate
                    </div>
                    <div class="h-[60%] border border-[#605e5e] flex"></div>
                    <div class="w-[50%] text-xs lg:text-sm h-full flex justify-end items-center px-5">{{ $customer->customer_birthdate}}</div>
                </div>
            </div>
            <div class="flex border border-[#151847] w-[90%] rounded-lg lg:hidden items-center mt-3"></div>
            <div class="text-xs text-[#151847] lowercase flex flex-row justify-evenly items-center w-full h-auto mt-2 lg:hidden">
                <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
            </div>
            {{-- Activity Log --}}
            <div class="bg-[#151847] w-full h-[10%] rounded-t-xl mt-2 flex justify-start items-center px-5 text-white gap-2 hidden lg:flex">
                <svg fill="currentColor" class="size-5" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M0 1.5C0 1.22386 0.223858 1 0.5 1H2.5C2.77614 1 3 1.22386 3 1.5C3 1.77614 2.77614 2 2.5 2H0.5C0.223858 2 0 1.77614 0 1.5ZM4 1.5C4 1.22386 4.22386 1 4.5 1H14.5C14.7761 1 15 1.22386 15 1.5C15 1.77614 14.7761 2 14.5 2H4.5C4.22386 2 4 1.77614 4 1.5ZM4 4.5C4 4.22386 4.22386 4 4.5 4H11.5C11.7761 4 12 4.22386 12 4.5C12 4.77614 11.7761 5 11.5 5H4.5C4.22386 5 4 4.77614 4 4.5ZM0 7.5C0 7.22386 0.223858 7 0.5 7H2.5C2.77614 7 3 7.22386 3 7.5C3 7.77614 2.77614 8 2.5 8H0.5C0.223858 8 0 7.77614 0 7.5ZM4 7.5C4 7.22386 4.22386 7 4.5 7H14.5C14.7761 7 15 7.22386 15 7.5C15 7.77614 14.7761 8 14.5 8H4.5C4.22386 8 4 7.77614 4 7.5ZM4 10.5C4 10.2239 4.22386 10 4.5 10H11.5C11.7761 10 12 10.2239 12 10.5C12 10.7761 11.7761 11 11.5 11H4.5C4.22386 11 4 10.7761 4 10.5ZM0 13.5C0 13.2239 0.223858 13 0.5 13H2.5C2.77614 13 3 13.2239 3 13.5C3 13.7761 2.77614 14 2.5 14H0.5C0.223858 14 0 13.7761 0 13.5ZM4 13.5C4 13.2239 4.22386 13 4.5 13H14.5C14.7761 13 15 13.2239 15 13.5C15 13.7761 14.7761 14 14.5 14H4.5C4.22386 14 4 13.7761 4 13.5Z" fill="currentColor" fill-rule="evenodd"/></svg>
                <span class="text-center text-white uppercase text-xl font-inter">Activity Log</span>
            </div>
            <div class="w-full h-[35%] relative min-h-0 overflow-hidden mt-0.5 border-[#151847] hidden lg:block">
                {{-- Table Header --}}
                <div class="w-full h-[20%] border border-[#151847] flex flex-row items-center">
                    <div class="w-[20%] h-full flex items-center border-r border-[#151847]">
                        <span class="text-[#151847] text-xs font-bold px-3">Id</span>
                    </div>
                    <div class="w-[20%] h-full flex items-center border-r border-[#151847]">
                        <span class="text-[#151847] text-xs font-bold px-3">Date</span>
                    </div>
                    <div class="w-[20%] h-full flex items-center border-r border-[#151847]">
                        <span class="text-[#151847] text-xs font-bold px-3">Activity</span>
                    </div>
                    <div class="w-[20%] h-full flex items-center border-r border-[#151847]">
                        <span class="text-[#151847] text-xs font-bold px-3">Remark</span>
                    </div>
                    <div class="w-[20%] h-full flex items-center">
                        <span class="text-[#151847] text-xs font-bold px-3">Status</span>
                    </div>
                </div>
                {{-- Data --}}
                <div class="w-full h-[80%] overflow-x-auto hide-scrollbar rounded-b-xl border border-[#151847]">
                    <div class="w-full flex flex-col ">
                        <div class="w-full h-8 flex border-b border-[#151847]">
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">1</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">2020-08-02</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Nothing</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Good</span>
                            </div>
                            <div class="w-[20%] h-full border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Done</span>
                            </div>
                        </div>
                        <div class="w-full h-10 flex border-b border-[#151847]">
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">2</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">2020-08-02</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Nothing</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Good</span>
                            </div>
                            <div class="w-[20%] h-full border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Done</span>
                            </div>
                        </div>
                        <div class="w-full h-10 flex border-b border-[#151847]">
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">3</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">2020-08-02</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Nothing</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Good</span>
                            </div>
                            <div class="w-[20%] h-full border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Done</span>
                            </div>
                        </div>
                        <div class="w-full h-10 flex border-b border-[#151847]">
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">4</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">2020-08-02</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Nothing</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Good</span>
                            </div>
                            <div class="w-[20%] h-full border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Done</span>
                            </div>
                        </div>
                        <div class="w-full h-10 flex border-b border-[#151847]">
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">5</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">2020-08-02</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Nothing</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Good</span>
                            </div>
                            <div class="w-[20%] h-full border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Done</span>
                            </div>
                        </div>
                        <div class="w-full h-10 flex border-b border-[#151847]">
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">6</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">2020-08-02</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Nothing</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Good</span>
                            </div>
                            <div class="w-[20%] h-full border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Done</span>
                            </div>
                        </div>
                        <div class="w-full h-10 flex border-b border-[#151847]">
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">7</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">2020-08-02</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Nothing</span>
                            </div>
                            <div class="w-[20%] h-full border-r border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Good</span>
                            </div>
                            <div class="w-[20%] h-full border-[#151847] flex items-center justify-start">
                                <span class="px-3 text-[#151847] text-xs">Done</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>