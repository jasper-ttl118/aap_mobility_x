<div class="flex md:w-full md:justify-center">
    <div class="flex flex-col lg:flex-row w-[440px] lg:w-full lg:justify-between lg:h-10 gap-x-5 ml-5 lg:ml-0 mt-2 lg:mt-0">
        <div class="flex flex-row w-full lg:w-[60%]">
            <a href=" {{route('email-marketing')}} " class="focus:bg-white focus:text-[#151847] transition-colors duration-200 w-[33.3%] border-2 p-1.5 px-4 py-2 bg-[#151848] text-white text-sm items-center flex justify-center rounded-lg font-inter font-medium truncate">Celebrant List</a>
            <a href="{{ route('message-template') }}" class="focus:bg-white focus:text-[#151847] transition-colors duration-200 w-[33.3%] border-2 p-1.5 px-4 py-2 bg-[#151848] text-white text-sm items-center flex justify-center text-center rounded-lg font-inter font-medium truncate">Message Templates</a>
            <a href="{{ route('message-list') }}" class="focus:bg-white focus:text-[#151847] transition-colors duration-200 w-[33.3%] border-2 p-1.5 px-4 py-2 bg-[#151848] text-white text-sm items-center flex justify-center rounded-lg font-inter font-medium truncate">Message List</a>
        </div>

        <div class="flex flex-row w-full lg:w-[40%]">
            <a href="{{ route('compose-email') }}" class="w-[50%] lg:w-[45%] border-2 p-1.5 px-4 py-2 bg-[#F6D400] text-[#151848] text-sm text-center rounded-lg font-inter font-medium truncate">Send To All Via Email</a>
            <a href="{{ route('compose-mobile') }}" class="w-[50%] lg:w-[55%] border-2 p-1.5 px-4 py-2 bg-[#F6D400] text-[#151848] text-sm text-center rounded-lg font-inter font-medium truncate">Send To All Via Mobile No.</a>
        </div>
    </div>  

</div>