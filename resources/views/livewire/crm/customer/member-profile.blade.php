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
                    <div class="text-xl lg:text-2xl font-bold text-[#151847] flex flex-row justify-center items-center w-full h-auto truncate">{{ $member->customer_firstname }} {{ $member->customer_middlename }} {{ $member->customer_surname}}</div>
                    <div class="text-xs text-[#151847] flex flex-row justify-evenly items-center w-[40%] h-auto mb-1">
                        <div class="font-bold">{{ $member->customer_organization }}</div> 
                        <div class="text-[#151847]">|</div> 
                        <div>{{ $member->customer_birthdate }}</div>
                    </div>
                    <div class="text-xs text-[#151847] flex flex-row justify-center items-center w-full h-auto">
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
                    <div class="text-xs text-[#151847] flex flex-row text-center w-[70%] h-[30%] mt-1 mb-2">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum iste, deleniti labore saepe minus ut?
                    </div>
                    <div class="flex border border-[#151847] w-[90%] rounded-lg hidden lg:flex"></div>
                    <div class="text-xs text-[#151847] flex flex-row justify-evenly items-center w-full h-auto mt-2 hidden lg:flex">
                        <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                        <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                        <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                    </div>
                </div>  
            </div>
            <div x-data="{profile: 'information'}" class="lg:w-[60%] w-full lg:h-full h-[50%] bg-white rounded-[36px] flex flex-col justify-start items-center p-5">
                {{-- Information --}}
                <div class="w-[110%] h-[15%] lg:h-[10%] text-[#151847] font-bold text-xl lg:text-2xl flex lg:justify-start justify-center items-center shadow-lg px-10 gap-10 lg:gap-3">
                    <button @click="profile='information'" :class="selected === 'reseller' ? 'underline text-blue-500' : 'text-[#151847] hover:text-blue-500' "
                            class="text-lg uppercase text-[#151847] font-semibold focus:underline focus:text-blue-500 h-full text-start hover:text-blue-500">
                        Information
                    </button>
                    <button @click="profile ='activityLog'" :class="selected === 'reseller' ? 'underline text-blue-500' : 'text-[#151847] hover:text-blue-500' "
                            class="text-lg uppercase text-[#151847] font-semibold focus:underline focus:text-blue-500 h-full text-start hover:text-blue-500">
                        Activity Log
                    </button>
                </div>
                <div class="w-full h-full mt-2 lg:mt-5 overflow-x-auto hide-scrollbar">
                    <div class="flex flex-col w-full h-[400px] lg:h-full items-center " x-show="profile === 'information'">
                        <div class="flex flex-col w-full h-full lg:h-[70%]">
                            <div class="flex flex-row items-center w-full h-[11.12%]">
                                <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                        <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                        <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                    </svg>
                                    Email
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] text-xs lg:text-sm h-full flex justify-start items-center px-5 text-[#605e5e]">{{ $member->customer_email}}</div>
                            </div>
                            <div class="flex flex-row items-center w-full h-[11.12%]">
                                <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base ">
                                    <svg class="size-4" fill="currentColor" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                        viewBox="0 0 512 512"  xml:space="preserve">
                                        <g>
                                            <path class="st0" d="M485.22,80.604H26.78C12.013,80.604,0,92.615,0,107.382v297.229c0,14.767,12.013,26.786,26.78,26.786h458.44
                                                c14.767,0,26.78-12.019,26.78-26.786V107.382C512,92.615,499.987,80.604,485.22,80.604z M132.17,283.787v-4.472
                                                c0-2.298-0.38-4.566-1.359-7.174c-0.188-0.248-18.793-25.357-18.793-48.059c0-27.05,16.988-46.685,40.394-46.685
                                                s40.394,19.635,40.394,46.685c0,22.702-18.604,47.811-19.022,48.494c-0.751,2.166-1.132,4.433-1.132,6.739v4.472
                                                c0,6.18,3.628,11.84,9.307,14.449l30.316,12.384c6.584,3.028,11.285,9.084,12.558,16.048l1.431,18.416H78.56l1.407-18.253
                                                c1.294-7.128,5.998-13.184,12.518-16.18l30.442-12.446C128.542,295.627,132.17,289.967,132.17,283.787z M429.318,306.396v29.557
                                                H266.745v-29.557H429.318z M429.318,242.793v29.558H266.745v-29.558H429.318z M231.481,208.748v-29.557h197.836v29.557H231.481z"/>
                                        </g>
                                    </svg>
                                    <span class="truncate">Membership Type</span>
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] text-xs lg:text-sm h-full flex justify-start items-center px-5 text-[#605e5e]">Regular Membership</div>
                            </div>
                            <div class="flex flex-row items-center w-full h-[11.12%]">
                                <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                                    <svg class="size-4" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M12.144 1.157a8 8 0 10-.709 14.068 1 1 0 00-.858-1.806 6 6 0 112.86-7.955 1 1 0 001.814-.845 8 8 0 00-3.107-3.462z"/>
                                            <path d="M7 5a1 1 0 112 0v4a1 1 0 01-.553.894l-2 1a1 1 0 11-.894-1.788L7 8.382V5zm9 10a1 1 0 11-2 0 1 1 0 012 0zm-1-7a1 1 0 00-1 1v3a1 1 0 102 0V9a1 1 0 00-1-1z"/>
                                        </g>
                                    </svg>
                                    <span class=" truncate">Expiration Date</span>
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] text-xs lg:text-sm h-full flex justify-start items-center px-5 text-[#605e5e]">December 21, 2025</div>
                            </div>
                            <div class="flex flex-row items-center w-full h-[11.12%]">
                                <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
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
                            <div class="flex flex-row items-center w-full h-[11.12%]">
                                <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base truncate">
                                    <svg class="size-4" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.7993 3C17.2899 3 18.5894 4.01393 18.9518 5.45974L19.337 7H20.25C20.6297 7 20.9435 7.28215 20.9932 7.64823L21 7.75C21 8.1297 20.7178 8.44349 20.3518 8.49315L20.25 8.5H19.714L19.922 9.3265C20.5708 9.72128 21.0041 10.435 21.0041 11.25V19.7468C21.0041 20.7133 20.2206 21.4968 19.2541 21.4968H17.75C16.7835 21.4968 16 20.7133 16 19.7468L15.999 18.5H8.004L8.00408 19.7468C8.00408 20.7133 7.22058 21.4968 6.25408 21.4968H4.75C3.7835 21.4968 3 20.7133 3 19.7468V11.25C3 10.4352 3.43316 9.72148 4.08177 9.32666L4.289 8.5H3.75C3.3703 8.5 3.05651 8.21785 3.00685 7.85177L3 7.75C3 7.3703 3.28215 7.05651 3.64823 7.00685L3.75 7H4.663L5.04898 5.46176C5.41068 4.01497 6.71062 3 8.20194 3H15.7993ZM6.504 18.5H4.499L4.5 19.7468C4.5 19.8848 4.61193 19.9968 4.75 19.9968H6.25408C6.39215 19.9968 6.50408 19.8848 6.50408 19.7468L6.504 18.5ZM19.504 18.5H17.499L17.5 19.7468C17.5 19.8848 17.6119 19.9968 17.75 19.9968H19.2541C19.3922 19.9968 19.5041 19.8848 19.5041 19.7468L19.504 18.5ZM13.7507 14H10.249L10.1472 14.0068C9.78115 14.0565 9.49899 14.3703 9.49899 14.75C9.49899 15.1297 9.78115 15.4435 10.1472 15.4932L10.249 15.5H13.7507L13.8525 15.4932C14.2186 15.4435 14.5007 15.1297 14.5007 14.75C14.5007 14.3358 14.165 14 13.7507 14ZM17 12C16.4477 12 16 12.4477 16 13C16 13.5522 16.4477 13.9999 17 13.9999C17.5522 13.9999 17.9999 13.5522 17.9999 13C17.9999 12.4477 17.5522 12 17 12ZM6.99997 12C6.4477 12 6 12.4477 6 13C6 13.5522 6.4477 13.9999 6.99997 13.9999C7.55225 13.9999 7.99995 13.5522 7.99995 13C7.99995 12.4477 7.55225 12 6.99997 12ZM15.7993 4.5H8.20194C7.39892 4.5 6.69895 5.04652 6.50419 5.82556L5.71058 9H18.2929L17.4968 5.82448C17.3017 5.04596 16.6019 4.5 15.7993 4.5Z"/>
                                    </svg>
                                    <span class=" truncate">Number of Vehicle(s)</span>
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] text-xs lg:text-sm h-full flex justify-start items-center px-5 text-[#605e5e]">3</div>
                            </div>
                            <div class="flex flex-row items-center w-full h-[11.12%]">
                                <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor"><title/>
                                    <g id="organization"><path d="M21,17.18V13a1,1,0,0,0-1-1H13V8.86a4,4,0,1,0-2,0V12H4a1,1,0,0,0-1,1v4.18a3,3,0,1,0,2,0V14h6v3.18a3,3,0,1,0,2,0V14h6v3.18a3,3,0,1,0,2,0ZM10,5a2,2,0,1,1,2,2A2,2,0,0,1,10,5ZM4,21a1,1,0,0,1,0-2A1,1,0,0,1,4,21Zm8,0a1,1,0,0,1,0-2A1,1,0,0,1,12,21Zm8,0a1,1,0,0,1,0-2A1,1,0,0,1,20,21Z"/></g></svg>
                                    Organization
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] text-xs lg:text-sm h-full flex justify-start items-center px-5 text-[#605e5e]">{{ $member->customer_organization}}</div>
                            </div>
                            <div class="flex flex-row items-center w-full h-[11.12%]">
                                <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                                    </svg>
                                    Phone
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] text-xs lg:text-sm h-full flex justify-start items-center px-5 text-[#605e5e]">{{ $member->customer_mobile_number}}</div>
                            </div>
                            <div class="flex flex-row items-center w-full h-[11.12%]">
                                <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                        <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                                    </svg>
                                    Birthdate
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] text-xs lg:text-sm h-full flex justify-start items-center px-5 text-[#605e5e]">{{ $member->customer_birthdate}}</div>
                            </div>
                            <div class="flex flex-row items-center w-full h-[11.12%]">
                                <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-5 gap-2 text-sm lg:text-base truncate">
                                    <svg fill="#ffffff" class="size-4" viewBox="0 0 24 24" id="contact-book" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><path id="secondary" d="M22,13v2a1,1,0,0,1-1,1H19a1,1,0,0,1-1-1V13a1,1,0,0,1,1-1h2A1,1,0,0,1,22,13ZM21,6H19a1,1,0,0,0-1,1V9a1,1,0,0,0,1,1h2a1,1,0,0,0,1-1V7A1,1,0,0,0,21,6Z"></path><rect id="primary" x="2" y="2" width="18" height="20" rx="2" style="fill: #605e5e;"></rect><path id="secondary-2" data-name="secondary" d="M13.4,11.8A3,3,0,0,0,14,10a3,3,0,0,0-6,0,3,3,0,0,0,.6,1.8A4,4,0,0,0,7,15v1a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V15A4,4,0,0,0,13.4,11.8Z"></path></svg>
                                    Last Contacted
                                </div>
                                <div class="h-[60%] text-[#151847] items-center flex">:</div>
                                <div class="w-[50%] text-xs lg:text-sm h-full flex justify-start items-center px-5 text-[#605e5e]">March 16, 2025 at 2:30 PM</div>
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