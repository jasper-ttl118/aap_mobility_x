<div>
    <div wire:loading >
        <x-loading-modal />
    </div>

    <!-- Modal overlay -->
    <div wire:loading.remove class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">

    @if ($member)
        <!-- Modal content -->
        <div @click.outside="
            open_profile = false;
            setTimeout(() => window.Livewire.dispatch('resetMemberProfile'), 400);"

            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="relative flex flex-col lg:flex-row bg-[#151847] rounded-[36px] justify-center shadow-lg w-[80%] h-[600px] lg:h-[80%] max-w-4xl items-center gap-3">
        
            <div class="lg:w-[40%] w-full lg:h-full h-[50%] bg-white rounded-[36px] flex flex-col justify-center items-center ">
                <div class="w-full h-[30%] bg-gradient-to-t from-[#262c7d] via-[#151847] to-[#090d40] rounded-b-2xl rounded-t-[36px]">
                    <div class="flex relative justify-center mt-8 lg:mt-16 h-full w-full">
                        <img src="{{ asset('aaplogo1.png') }}" alt="aaplogo" class="size-28 lg:size-40 bg-[#f3f4f6] rounded-full p-3 border">
                    </div>
                </div>
                <div class="w-full h-[70%] flex flex-col items-center justify-start -gap-1 lg:gap-1 pt-[60px] lg:pt-[75px]">
                    <div class="text-xs text-[#939393] lowercase flex justify-center items-end  w-full h-auto">{{ $member->customer_email }}</div>
                    <div class="text-xl lg:text-2xl font-bold text-[#151847] flex flex-row justify-center items-center w-full h-auto ">{{ $member->customer_firstname }} {{ $member->customer_middlename }} {{ $member->customer_surname}}</div>
                    <div class="text-xs text-[#151847] lowercase flex flex-row justify-evenly items-center w-[40%] h-auto mb-1">
                        <div class="font-bold">{{ $member->customer_organization }}</div> 
                        <div class="text-[#151847]">|</div> 
                        <div>{{ $member->customer_birthdate }}</div>
                    </div>
                    <div class="text-xs text-[#151847] lowercase flex flex-row justify-center items-center w-full h-auto">
                        <div class="flex w-full h-full gap-2 justify-center items-center">
                            <button class="flex justify-center items-center gap-1 h-6 w-[30%] text-[#151847] border-2 border-[#151847] rounded-md font-bold hover:bg-[#151847] hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>
                                Message</button>
                            <button class="flex justify-center items-center gap-1 h-6 w-[30%] text-[#151847] border-2 border-[#151847] rounded-md font-bold hover:bg-[#151847] hover:text-white">
                                <svg  class="size-4" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect fill="none"/><path d="M159.4,40A80.1,80.1,0,0,1,216,96.6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><path d="M151.1,70.9a47.9,47.9,0,0,1,34,34" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><path d="M92.5,124.8a83.6,83.6,0,0,0,39,38.9,8,8,0,0,0,7.9-.6l25-16.7a7.9,7.9,0,0,1,7.6-.7l46.8,20.1a7.9,7.9,0,0,1,4.8,8.3A48,48,0,0,1,176,216,136,136,0,0,1,40,80,48,48,0,0,1,81.9,32.4a7.9,7.9,0,0,1,8.3,4.8l20.1,46.9a8,8,0,0,1-.6,7.5L93,117A8,8,0,0,0,92.5,124.8Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
                                Call</button>
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
            <div x-data="{profile: 'information'}" class="lg:w-[60%] w-full lg:h-full h-[50%] bg-white rounded-[36px] flex flex-col justify-start items-center p-5">
                {{-- Information --}}
                <div class="w-[110%] h-[15%] lg:h-[10%] text-[#151847] font-bold text-xl lg:text-2xl flex lg:justify-start justify-center items-center shadow-lg px-10 gap-10 lg:gap-3">
                    <button @click="profile='information'" 
                            class="text-lg uppercase text-[#151847] font-semibold focus:underline focus:text-blue-500 h-full text-start hover:text-blue-500">
                        Information
                    </button>
                    <button @click="profile ='activityLog'"
                            class="text-lg uppercase text-[#151847] font-semibold focus:underline focus:text-blue-500 h-full text-start hover:text-blue-500">
                        Activity Log
                    </button>
                </div>
                <div class="w-full h-full mt-5">
                    <div class="flex flex-col w-full h-full items-center " x-show="profile === 'information'">
                        <div class="flex flex-col w-full h-[70%] lg:h-[40%]">
                            <div class="flex flex-row items-center w-full h-[20%]">
                                <div class="w-[35%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                        <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    Status
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] h-full flex justify-start items-center px-5">
                                    @if ($member->customer_status == '1')
                                        <span 
                                            class="bg-green-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full text-center">Active</span>
                                    @else
                                        <span
                                            class="bg-red-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full text-center">Inactive</span>
                                    @endif
                                </td>
                                </div>  
                            </div>
                            <div class="flex flex-row items-center w-full h-[20%]">
                                <div class="w-[35%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                        <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                        <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                    </svg>
                                    Email
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] text-xs lg:text-sm h-full flex justify-start items-center px-5 text-[#605e5e]">{{ $member->customer_email}}</div>
                            </div>
                            <div class="flex flex-row items-center w-full h-[20%]">
                                <div class="w-[35%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor"><title/>
                                    <g id="organization"><path d="M21,17.18V13a1,1,0,0,0-1-1H13V8.86a4,4,0,1,0-2,0V12H4a1,1,0,0,0-1,1v4.18a3,3,0,1,0,2,0V14h6v3.18a3,3,0,1,0,2,0V14h6v3.18a3,3,0,1,0,2,0ZM10,5a2,2,0,1,1,2,2A2,2,0,0,1,10,5ZM4,21a1,1,0,0,1,0-2A1,1,0,0,1,4,21Zm8,0a1,1,0,0,1,0-2A1,1,0,0,1,12,21Zm8,0a1,1,0,0,1,0-2A1,1,0,0,1,20,21Z"/></g></svg>
                                    Organization
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] text-xs lg:text-sm h-full flex justify-start items-center px-5 text-[#605e5e]">{{ $member->customer_organization}}</div>
                            </div>
                            <div class="flex flex-row items-center w-full h-[20%]">
                                <div class="w-[35%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                                    </svg>
                                    Phone
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] text-xs lg:text-sm h-full flex justify-start items-center px-5 text-[#605e5e]">{{ $member->customer_mobile_number}}</div>
                            </div>
                            <div class="flex flex-row items-center w-full h-[20%]">
                                <div class="w-[35%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                        <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                                    </svg>
                                    Birthdate
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] text-xs lg:text-sm h-full flex justify-start items-center px-5 text-[#605e5e]">{{ $member->customer_birthdate}}</div>
                            </div>
                        </div>
                        <div class="flex border border-[#151847] w-[90%] rounded-lg lg:hidden items-center mt-3"></div>
                        <div class="text-xs text-[#151847] lowercase flex flex-row justify-evenly items-center w-full h-auto mt-2 lg:hidden">
                            <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                            <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                            <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                        </div>
                    </div>
                    <div x-show="profile === 'activityLog'" class="w-full h-full">
                        <livewire:crm.customer.member-activity-log />
                    </div>
                </div>
            </div>

        </div>
    @endif

    </div>
</div>