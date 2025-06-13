@props(['customers' => ''])

<x-app-layout class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    <div class="flex flex-1 flex-col lg:ml-52 lg:p-10 lg:gap-7 hide-scrollbar bg-[#f3f4f6]">
        <!-- Title and Subtitle -->
        {{-- <div class="">
            <h1 class="text-2xl font-semibold text-blue-900">Dashboard</h1>
            <p class="text-gray-700 text-sm"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem aliquid, in minus voluptate optio illo suscipit possimus fuga explicabo necessitatibus aperiam vel at consequatur corrupti tempora sint veniam libero nisi.</p>
        </div> --}}
        
        <!-- Options Container -->
        <div class="mx-5 lg:mx-0 mt-16 lg:mt-5 lg:-mb-5 overflow-x-auto hide-scrollbar rounded-md border-2 border-gray-100 shadow-md w-[440px] lg:w-full">
            <div class="flex min-w-[680px] lg:min-w-0">
                <div class="flex-none w-32 font-semibold border-b-2 border-blue-900 p-4 text-center">
                    <a href="{{ route('customer.index') }}" class=" text-gray-600 hover:text-blue-800">Dashboard</a>
                </div>
                <div class="flex-none w-32 p-4 text-center">
                    <a href="{{ route('contacts') }}" class= " text-gray-600 hover:text-blue-800">Members</a>
                </div>
                <div class="flex-none w-auto p-4 text-center">
                    <a href="{{ route('email-marketing') }}" class="text-gray-600 hover:text-blue-800">Email Marketing</a>
                </div>
                <div class="flex-none w-32 p-4 text-center">
                    <a href="{{ route('corporate') }}" class="text-gray-600 hover:text-blue-800">Corporate</a>
                </div>
                <div class="flex-none w-auto p-4 text-center">
                    <a href="{{ route('sales-tracking') }}" class="text-gray-600 hover:text-blue-800">Sales Tracking</a>
                </div>
            </div>
        </div>

        <!-- Breadcrumbs-->
        <div class="flex h-10 items-start gap-x-1 text-blue-900 text-sm px-12 lg:px-7 pt-2 lg:pt-0">
            <a href="{{ route('customer.index') }}" class="hover:underline">Customer Relationship Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="{{ route('customer.index') }}" class="hover:underline font-semibold">Dashboard</a>
        </div>
        
        {{-- body --}}
        <div class="bg-[#f3f4f6] flex flex-col lg:flex-row w-full h-[1210px] lg:h-[400px] gap-5 lg:-mt-10">
            <div class="flex flex-col lg:flex-row justify-evenly h-[1200px] lg:h-full w-[440px] lg:w-full gap-5 lg:ml-0 ml-5">
                <div class="flex flex-col justify-evenly lg:justify-between w-full lg:w-[70%] h-[1000px] lg:h-full gap-3">
                        {{-- Sales Div --}}
                        <div class="flex flex-col lg:flex-row lg:w-full h-[50%] lg:h-[25%] gap-2">
                            {{-- Daily Sales --}}
                            <div class="flex flex-col gap-y-2 items-start justify-center bg-gradient-to-r from-[#151847] via-[#191d56] to-[#0c0c21] shadow-lg h-[33.3%] lg:h-full w-full lg:w-[33%] rounded-lg shadow-xs">
                                <div class="flex flex-row justify-start items-center gap-2 px-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 lg:size-4 text-white">
                                        <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                                        <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z" clip-rule="evenodd" />
                                        <path d="M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z" />
                                    </svg>
                                    <span class="text-white font-extrabold text-xl lg:text-xs uppercase tracking-widest truncate">Daily Sales</span>
                                </div>
                                <div class="flex flex-row justify-start items-center gap-5 lg:gap-2 px-4">
                                    <span class="text-white font-bold text-3xl lg:text-lg">₱153.04</span>
                                    <span class="text-white font-bold text-md lg:text-xs bg-white bg-opacity-20 rounded-md">+25%</span>
                                </div>
                            </div>
                            {{-- Weekly Sales --}}
                            <div class="flex flex-col gap-y-2 items-start justify-center bg-white shadow-lg h-[33.3%] lg:h-full w-full lg:w-[33%] rounded-lg shadow-xs">
                                <div class="flex flex-row justify-start items-center gap-2 px-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 lg:size-4 text-green-400">
                                        <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                                        <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z" clip-rule="evenodd" />
                                        <path d="M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z" />
                                    </svg>
                                    <span class="text-[#151847] font-extrabold text-xl lg:text-xs uppercase tracking-widest truncate">Weekly Sales</span>
                                </div>
                                <div class="flex flex-row justify-start items-center gap-5 lg:gap-2 px-4">
                                    <span class="text-[#151847] font-bold text-3xl lg:text-lg">₱1,240.40</span>
                                    <span class="text-green-400 font-bold text-md lg:text-xs bg-green-400 bg-opacity-20 rounded-md">+17%</span>
                                </div>
                            </div>
                            {{-- Monthly Sales --}}
                            <div class="flex flex-col gap-y-2 items-start justify-center bg-white shadow-lg h-[33.3%] lg:h-full w-full lg:w-[33%] rounded-lg shadow-xs">
                                <div class="flex flex-row justify-start items-center gap-2 px-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 lg:size-4 text-green-400">
                                        <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                                        <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z" clip-rule="evenodd" />
                                        <path d="M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z" />
                                    </svg>
                                    <span class="text-[#151847] font-extrabold text-xl lg:text-xs uppercase tracking-widest truncate">Monthly Sales</span>
                                </div>
                                <div class="flex flex-row justify-start items-center gap-5 lg:gap-2 px-4">
                                    <span class="text-[#151847] font-bold text-3xl lg:text-lg">₱5,192.75</span>
                                    <span class="text-red-600 font-bold text-md lg:text-xs bg-red-600 bg-opacity-20 rounded-md">-10%</span>
                                </div>
                            </div>
                        
                        </div>
                        {{-- Members & Email Div --}}
                        <div class="flex flex-col lg:flex-row bg-white shadow-lg w-full lg:h-[75%] h-[70%] rounded-lg shadow-xs justify-evenly items-center">
                            {{-- Members --}}
                            <div class="flex flex-col w-full lg:w-[50%] h-full justify-center items-center gap-3">
                                <div class="flex flex-row w-[90%] h-[10%] justify-center items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 text-[#151847]">
                                    <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75ZM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 0 1-1.875-1.875V8.625ZM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 0 1 3 19.875v-6.75Z" />
                                    </svg>
                                    <span class="text-xl text-[#151847] font-extrabold uppercase tracking-widest">Members Tally</span>
                                </div>
                                <div class="flex flex-row w-[90%] h-[75%] justify-center items-center">
                                    <x-analytics-display
                                        title="Number of Members"
                                        :labels="['January', 'February', 'March', 'April', 'May']"
                                        :data="[120, 150, 180, 90, 150]"
                                        chartType="line"
                                        :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                    />
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="flex border-2 border-[#c6c7c8] h-[90%] rounded-lg hidden lg:block"></div>
                            {{-- Email --}}
                            <div class="flex flex-col w-full lg:w-[50%] h-full justify-center items-center gap-3 ">
                                <div class="flex flex-row w-[90%] h-[10%] justify-center items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 text-[#151847]">
                                        <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                        <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                    </svg>
                                    <span class="text-xl text-[#151847] font-extrabold uppercase tracking-widest">Email</span>
                                </div>
                                <div class="flex flex-row w-[90%] h-[75%] justify-center items-center">
                                    <x-analytics-display
                                        title="Emails"
                                        :labels="['January', 'February', 'March', 'April', 'May']"
                                        :data="[120, 150, 180, 90, 140]"
                                        chartType="doughnut"
                                        :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                    />
                                </div>
                            </div>
                        </div>
                </div>        
                 {{-- New Members Div --}}
                <div class="flex justify-between h-[20%] lg:h-full w-full lg:w-[30%] gap-5">
                    <div class="flex flex-col bg-white shadow-lg h-full w-full rounded-lg shadow-xs items-center">
                        {{-- Header --}}
                        <div class="flex flex-row h-[15%] w-full justify-start items-center px-5 gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#151847]">
                                <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0A.75.75 0 0 1 8.25 6h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75ZM2.625 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 12a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12A.75.75 0 0 1 7.5 12Zm-4.875 5.25a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-xl font-extrabold text-[#151847] uppercase tracking-widest">New Members</span>
                        </div>
                        {{-- Border Line --}}
                        <span class="border-b-2 border-[#151847] w-[90%] flex h-[5px]"></span>
                        {{-- Members List --}}
                        <div class="flex h-[75%] flex-col overflow-y-auto hide-scrollbar items-center">
                            @foreach ($customers as $customer)
                                <table class="h-[20%] w-[80%] border-b-2 border-[#151847] items-center justify-start gap-1">
                                    <tr class="flex flex-row w-full h-16">
                                        <td class="flex items-center w-[20%]">
                                            <img src="aaplogo1.png" alt="UserImage" class="w-full flex">
                                        </td>         
                                        <td class="flex items-center w-[60%] mx-1">
                                            <span class="text-sm font-semibold text-[#151847]    ">
                                                {{ $customer -> customer_firstname }} 
                                                {{ $customer -> customer_middlename }} 
                                                {{ $customer -> customer_surname }} 
                                            </span>
                                        </td>
                                        <td class="flex items-center w-[10%]">              
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 text-[#151847]">
                                                <path fill-rule="evenodd" d="M4.5 3.75a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-15Zm4.125 3a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Zm-3.873 8.703a4.126 4.126 0 0 1 7.746 0 .75.75 0 0 1-.351.92 7.47 7.47 0 0 1-3.522.877 7.47 7.47 0 0 1-3.522-.877.75.75 0 0 1-.351-.92ZM15 8.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15ZM14.25 12a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H15a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15Z" clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                        <td class="flex items-center w-[10%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-[#151847]">
                                                <path fill-rule="evenodd" d="M15 3.75a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0V5.56l-4.72 4.72a.75.75 0 1 1-1.06-1.06l4.72-4.72h-2.69a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                                                <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col ml-5 lg:ml-0 lg:flex-row w-[440px] lg:w-full h-[600px] lg:h-[300px] gap-5 mt-3 lg:-mt-2">
            {{-- CALENDAR --}}
            <div class="flex pt-2 bg-white shadow-lg h-full lg:w-[50%] rounded-lg shadow-xs justify-center overflow-y-auto hide-scrollbar">
                <div x-data="calendar()" x-init="init()" class="w-[90%] flex flex-col items-center justify-between">
                    <div class="flex flex-row justify-between items-center w-full">
                        <div class="flex justify-start w-[50%] items-center h-full">
                            <span class="text-[#151847] text-xl tracking-widest font-extrabold">CALENDAR</span>
                        </div>
                        <div class="flex justify-between w-[50%] h-[70%] px-3 bg-[#151847] rounded-md">
                            <div class="flex justify-between items-center mb-4 w-full h-full ">
                                <button @click="prevMonth()" class="text-white font-bold">&lt;</button>
                                <h2 class="text-lg uppercase font-semibold text-white" x-text="monthName + ' ' + year"></h2>
                                <button @click="nextMonth()" class="text-white font-bold">&gt;</button>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-7 gap-2 text-center text-[#151847] mb-2 font-semibold w-full ">
                        <template x-for="day in ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']">
                            <div x-text="day"></div>
                        </template>
                    </div>

                    <div class="grid grid-cols-7 gap-2 w-full pb-5">
                        <template x-for="blank in startDay" :key="blank">
                            <div></div>
                        </template>

                        <template x-for="day in daysInMonth" :key="day">
                            <div @click="openNote(day)"
                                class="relative border border-[#151847] rounded-md h-16 p-1 group hover:bg-[#151847] cursor-pointer z-auto">
                                <div class="text-sm font-bold group-hover:text-white text-[#151847]" x-text="day"></div>
                                <div class="text-xs text-[#151847] mt-1 truncate group-hover:text-white" x-text="notes[day]"></div>
                            </div>
                        </template>
                    </div>

                    <!-- Note modal -->
                    <div x-show="showModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-10">
                        <div class="bg-white rounded-lg shadow-lg p-6 w-96 border-2 border-[#151847]">
                            <h3 class="text-lg font-semibold mb-2 uppercase text-[#151847]">Note for <span x-text="monthName + ' ' + activeDay + ', ' + year"></span></h3>
                            <textarea x-model="notes[activeDay]" class="w-full border-2 border-[#151847] rounded-md p-2 h-24 resize-none"></textarea>
                            <div class="flex justify-end mt-4 gap-2">
                                <button @click="showModal = false" class="px-4 py-1 bg-gray-300 rounded hover:bg-gray-400">Close</button>
                                <button @click="saveNote()" class="px-4 py-1 border bg-[#151847] text-white rounded hover:bg-white hover:text-[#151847] hover:border-[#151847] font-bold">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- REVENUE --}}
            <div x-data="{activeChart: 'chart1'}" class="flex flex-col bg-white shadow-lg h-full w-full lg:w-[50%] rounded-lg shadow-xs justify-center items-center gap-3">
                <div class="flex flex-row h-[10%] w-[90%] items-center gap-2">
                    <div class="flex flex-row w-[50%] h-full justify-start items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                            <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-[#151847] font-extrabold text-xl uppercase tracking-widest">Revenue</span>
                    </div>
                    <div class="flex justify-end w-[50%] h-full items-center">
                        {{-- Buttons --}}
                        <div class="flex flex-row w-full lg:w-[90%] h-full lg:h-[80%] border border-[#151847] rounded-md justify-between items-center px-0.5 py-0.5">
                            <button @click="activeChart = 'chart1'" :class="activeChart === 'chart1' ? 'bg-[#151847] text-white' : 'text-[#151847]'" 
                                class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] focus:text-white w-[33.3%] h-full text-center rounded-l-md hover:bg-[#151847] hover:text-white">Weekly</button>
                            <button @click="activeChart = 'chart2'" :class="activeChart === 'chart2' ? 'bg-[#151847] text-white' : 'text-[#151847]'"
                                class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] focus:text-white w-[33.3%] h-full text-center hover:bg-[#151847] hover:text-white">Monthly</button>
                            <button @click="activeChart = 'chart3'" :class="activeChart === 'chart3' ? 'bg-[#151847] text-white' : 'text-[#151847]'"
                                class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] focus:text-white w-[33.3%] h-full text-center rounded-r-md hover:bg-[#151847] hover:text-white">Annual</button>
                        </div>
                    </div>
                </div>
                <div class="flex h-[75%] w-[90%] relative">
                    <div x-show="activeChart === 'chart1'" x-cloak class="h-full w-full absolute">
                        <x-analytics-display
                                title="Weekly"
                                :labels="['Week 1', 'Week 2', 'Week 3', 'Week 4']"
                                :data="[120, 150, 180, 90]"
                                chartType="bar"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                        />
                    </div>
                    <div x-show="activeChart === 'chart2'" x-cloak class="h-full w-full absolute">
                        <x-analytics-display
                                title="Monthly"
                                :labels="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August']"
                                :data="[120, 150, 180, 90, 150, 180, 90, 130]"
                                chartType="bar"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                        />
                    </div>
                    <div x-show="activeChart === 'chart3'" x-cloak class="h-full w-full absolute">
                        <x-analytics-display
                                title="Annual"
                                :labels="['2020', '2021', '2022', '2023' , '2024' , '2025']"
                                :data="[120, 150, 180, 90, 150, 140]"
                                chartType="bar"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function calendar() {
            return {
                year: new Date().getFullYear(),
                month: new Date().getMonth(),
                daysInMonth: 0,
                startDay: 0,
                showModal: false,
                activeDay: null,
                notes: {},
                get monthName() {
                    return new Date(this.year, this.month).toLocaleString('default', { month: 'long' });
                },
                init() {
                    this.updateCalendar();
                },
                updateCalendar() {
                    const firstDay = new Date(this.year, this.month, 1);
                    this.startDay = firstDay.getDay();
                    this.daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
                },
                prevMonth() {
                    this.month--;
                    if (this.month < 0) {
                        this.month = 11;
                        this.year--;
                    }
                    this.updateCalendar();
                },
                nextMonth() {
                    this.month++;
                    if (this.month > 11) {
                        this.month = 0;
                        this.year++;
                    }
                    this.updateCalendar();
                },
                openNote(day) {
                    this.activeDay = day;
                    this.showModal = true;
                },
                saveNote() {
                    this.showModal = false;
                }
            };
        }
    </script>

</x-app-layout>