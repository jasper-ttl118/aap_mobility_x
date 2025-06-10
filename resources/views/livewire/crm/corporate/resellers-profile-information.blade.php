<div>
     @foreach ($corporates ?? [] as $customer)
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
    @endforeach
</div>