<div>
    <div wire:loading >
        <x-loading-modal />
    </div>

    <!-- Modal overlay -->
    <div wire:loading.remove class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">

    @if ($reseller)
        <!-- Modal content -->
        <div @click.outside="
            open = false;
            setTimeout(() => window.Livewire.dispatch('resetResellerProfile'), 400);"

            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="relative flex flex-row bg-[#151847] rounded-[36px] justify-center shadow-lg w-[80%] h-[80%] max-w-4xl items-center gap-3">
        
            <div class="w-[40%] h-full bg-white rounded-[36px] flex flex-col justify-center items-center ">
                <div class="w-full h-[30%] bg-gradient-to-t from-[#262c7d] via-[#151847] to-[#090d40] rounded-b-2xl rounded-t-[36px]">
                    <div class="flex relative justify-center mt-16 h-full w-full">
                        <img src="{{ asset('aaplogo1.png') }}" alt="aaplogo" class="size-40 bg-[#f3f4f6] rounded-full p-3 border">
                    </div>
                </div>
                <div class="w-full h-[70%] flex flex-col items-center justify-start gap-1 pt-[75px]">
                    <div class="text-xs text-[#939393] lowercase flex justify-center items-end  w-full h-auto">{{ $reseller->customer_email }}</div>
                    <div class="text-2xl font-bold text-[#151847] flex flex-row justify-center items-center w-full h-auto">{{ $reseller->customer_firstname }} {{ $reseller->customer_middlename }} {{ $reseller->customer_surname}}</div>
                    <div class="text-xs text-[#151847] lowercase flex flex-row justify-evenly items-center w-[40%] h-auto mb-1">
                        <div class="font-bold">{{ $reseller->customer_organization }}</div> 
                        <div class="text-[#151847]">|</div> 
                        <div>{{ $reseller->customer_birthdate }}</div>
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
                    <div class="flex border border-[#151847] w-[90%] rounded-lg md:block"></div>
                    <div class="text-xs text-[#151847] lowercase flex flex-row justify-evenly items-center w-full h-auto mt-2">
                        <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                        <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                        <span class="flex w-[25%] truncate uppercase p-1 h-6 text-[10px] border border-[#151847] text-center justify-center items-center font-semibold rounded-md">Fast Learner</span>
                    </div>
                </div>  
            </div>
            <div class="w-[60%] h-full bg-white rounded-[36px] flex flex-col justify-start items-center p-5">
                <div class="w-full h-[10%] text-[#151847] font-bold text-2xl flex items-center">Information</div>
                <div class="flex flex-col  w-full h-[50%]">
                    <div class="flex flex-row items-center w-full h-[20%]">
                        <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-10">Status</div>
                        <div class="h-[60%] border border-[#605e5e] flex"></div>
                        <div class="w-[50%] h-full flex justify-end items-center px-10">
                            @if ($reseller->customer_status == '1')
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
                        <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-10">Email</div>
                        <div class="h-[60%] border border-[#605e5e] flex"></div>
                        <div class="w-[50%] h-full flex justify-end items-center px-10 text-black">{{ $reseller->customer_email}}</div>
                    </div>
                    <div class="flex flex-row items-center w-full h-[20%]">
                        <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-10">Organization</div>
                        <div class="h-[60%] border border-[#605e5e] flex"></div>
                        <div class="w-[50%] h-full flex justify-end items-center px-10 text-black">{{ $reseller->customer_organization}}</div>
                    </div>
                    <div class="flex flex-row items-center w-full h-[20%]">
                        <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-10">Phone</div>
                        <div class="h-[60%] border border-[#605e5e] flex"></div>
                        <div class="w-[50%] h-full flex justify-end items-center px-10 text-black">{{ $reseller->customer_mobile_number}}</div>
                    </div>
                    <div class="flex flex-row items-center w-full h-[20%]">
                        <div class="w-[50%] text-[#605e5e] h-full flex flex-row justify-start items-center px-10">Birthdate</div>
                        <div class="h-[60%] border border-[#605e5e] flex"></div>
                        <div class="w-[50%] h-full flex justify-end items-center px-10 text-black">{{ $reseller->customer_birthdate}}</div>
                    </div>
                </div>
            </div>

        </div>
    @endif

    </div>

</div>