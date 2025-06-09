<x-app-layout class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    <div class="flex flex-1 flex-col lg:ml-64 hide-scrollbar lg:p-10 lg:gap-7 bg-[#f3f4f6] ">
        <!-- Title and Subtitle -->
        {{-- <div class="">
            <h1 class="text-2xl font-semibold text-blue-900">Dashboard</h1>
            <p class="text-gray-700 text-sm"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem aliquid, in minus voluptate optio illo suscipit possimus fuga explicabo necessitatibus aperiam vel at consequatur corrupti tempora sint veniam libero nisi.</p>
        </div> --}}

        <!-- Options Container -->
        <div class="mx-5 lg:mx-0 mt-16 lg:mt-5 lg:-mb-5 overflow-x-auto hide-scrollbar rounded-md border-2 h-[76px] border-gray-100 bg-white shadow-md w-[440px] lg:w-full">
            <div class="flex min-w-[600px] lg:min-w-0">
                <div class="flex-none w-32 p-4 text-center">
                    <a href="{{ route('customer.index') }}" class=" text-gray-600 hover:text-blue-800">Dashboard</a>
                </div>
                <div class="flex-none w-32 p-4 text-center">
                    <a href="{{ route('contacts') }}" class="text-gray-600 hover:text-blue-800">Members</a>
                </div>
                <div class="flex-none w-auto p-4 text-center">
                    <a href="{{ route('email-marketing') }}" class="text-gray-600 hover:text-blue-800">Email Marketing</a>
                </div>
                <div class="flex-none w-32 font-semibold border-b-2 border-blue-900 p-4 text-center">
                    <a href="{{ route('corporate') }}" class="text-gray-600 hover:text-blue-800">Corporate</a>
                </div>
                <div class="flex-none w-auto p-4 text-center">
                    <a href="{{ route('sales-tracking') }}" class="text-gray-600 hover:text-blue-800">Sales Tracking</a>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs-->
        <div class="flex h-10 items-start gap-x-1 text-blue-900 text-sm px-12 lg:px-7 pt-2 lg:pt-0 lg:-mb-8">
            <a href="{{ route('customer.index') }}" class="hover:underline">Customer Relationship Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="{{ route('corporate') }}" class="hover:underline">Corporate</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="{{ route('commission') }}" class="hover:underline font-semibold">Commission Tracking</a>

        </div>

        <div class="flex flex-row w-full h-[100px] bg-white shadow-md border-gray-100 border-2 rounded-lg ml-5 lg:ml-0 px-5 justify-start items-center gap-2">
            <img src="{{ asset('comms.png') }}" alt="commission" class="size-7">
            <span class="text-2xl uppercase font-bold text-[#151847] tracking-widest">COMMISSION TRACKING</span>
        </div>

        <div class="flex flex-col w-full h-[400px] bg-white shadow-md border-gray-100 border-2 rounded-lg ml-5 -mt-3 lg:ml-0 px-5 justify-start items-center gap-2">
            <div class="bg-[#6f74ad] w-[104%] h-[20%] rounded-t-xl flex justify-start items-center px-5 text-white gap-2">
                <img src="{{ asset('recent.png') }}" alt="recent" class="size-7">
                <span class="text-center text-white uppercase text-xl font-inter">
                    Recent Commissions
                </span>
            </div>
            <div class="w-[104%] h-[15%] uppercase font-bold text-[#151847] flex items-center justify-start -mt-3 px-5 gap-3"> 
                <img src="{{ asset('arrows.png') }}" alt="recent" class="size-5">
                Last 30 Days </div>
            <div class="w-[104%] h-[80%] flex relative min-h-0 overflow-hidden rounded-b-xl border-[#151847] -mt-2">
                {{-- Table Header --}}
                <div class="w-full h-[10%] flex flex-row items-center">
                    <div class="w-[14.3%] h-full flex items-center border-b border-r border-[#d0d0d0]">
                        <span class="text-[#151847] text-base font-bold px-3">Commission Id</span>
                    </div>
                    <div class="w-[14.3%] h-full flex items-center border-b border-r border-[#d0d0d0]">
                        <span class="text-[#151847] text-base font-bold px-3">Date</span>
                    </div>
                    <div class="w-[14.3%] h-full flex items-center border-b border-r border-[#d0d0d0]">
                        <span class="text-[#151847] text-base font-bold px-3 truncate">Customer Name</span>
                    </div>
                    <div class="w-[14.3%] h-full flex items-center border-b border-r border-[#d0d0d0]">
                        <span class="text-[#151847] text-base font-bold px-3">Revenue</span>
                    </div>
                    <div class="w-[14.3%] h-full flex items-center border-b border-r border-[#d0d0d0]">
                        <span class="text-[#151847] text-base font-bold px-3">Cost</span>
                    </div>
                    <div class="w-[14.3%] h-full flex items-center border-b border-r border-[#d0d0d0]">
                        <span class="text-[#151847] text-base font-bold px-3">Profit</span>
                    </div>
                    <div class="w-[14.3%] h-full flex items-center border-b border-[#d0d0d0]">
                        <span class="text-[#151847] text-base font-bold px-3">Agents</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full h-[200px] flex flex-row -mt-3 gap-4">
            <div class="flex w-[70%] h-full bg-white rounded-lg shadow-md"></div>
            <div class="flex w-[30%] h-full bg-white rounded-lg shadow-md"></div>
        </div>
    </div>
</x-app-layout>