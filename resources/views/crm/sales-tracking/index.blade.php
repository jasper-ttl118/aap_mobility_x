<x-app-layout class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    <div class="flex flex-1 flex-col lg:ml-52 hide-scrollbar lg:p-10 lg:gap-7 bg-[#f3f4f6]">
        <!-- Title and Subtitle -->
        {{-- <div class="">
            <h1 class="text-2xl font-semibold text-blue-900">Dashboard</h1>
            <p class="text-gray-700 text-sm"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem aliquid, in minus voluptate optio illo suscipit possimus fuga explicabo necessitatibus aperiam vel at consequatur corrupti tempora sint veniam libero nisi.</p>
        </div> --}}

        <!-- Options Container -->
        <div class="flex md:justify-center w-full">
            <div class="mx-5 lg:mx-0 mt-16 lg:mt-5 lg:-mb-5 overflow-x-auto hide-scrollbar rounded-md border-2 border-gray-100 bg-white shadow-md w-[440px] md:w-[80%] lg:w-full">
                <div class="flex min-w-[600px] lg:min-w-0">
                    <div class="group flex-none hover:border-b-2 border-gray-300 w-32 p-4 text-center">
                        <a href="{{ route('customer.index') }}" class="text-gray-600 hover:text-gray-800">Dashboard</a>
                    </div>
                    <div class="group flex-none hover:border-b-2 border-gray-300 w-32 p-4 text-center">
                        <a href="{{ route('contacts') }}" class="text-gray-600 hover:text-gray-800">Members</a>
                    </div>
                    <div class="group flex-none hover:border-b-2 border-gray-300 w-auto p-4 text-center">
                        <a href="{{ route('email-marketing') }}" class="text-gray-600 hover:text-gray-800">Email Marketing</a>
                    </div>
                    <div class="group flex-none hover:border-b-2 border-gray-300 w-32 p-4 text-center">
                        <a href="{{ route('corporate') }}" class="text-gray-600 hover:text-gray-800">Corporate</a>
                    </div>
                    <div class="flex-none w-auto p-4 font-semibold border-b-2 border-blue-900 text-center">
                        <a href="{{ route('sales-tracking') }}" class="text-gray-600 hover:text-blue-800">Sales Tracking</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs-->
        <div class="flex h-10 items-center gap-x-1 text-blue-900 text-sm px-12 lg:px-7 pt-2 lg:pt-0 pb-3 lg:pb-5 md:ml-20 lg:ml-0">
            <a href="{{ route('customer.index') }}" class="hover:underline">Customer Relationship Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="{{ route('sales-tracking') }}" class="hover:underline font-semibold">Sales Tracking</a>
        </div>

        {{-- First Row --}}
        <div x-data="{ open : ''}" class="flex md:w-full md:justify-center">
            <div class="flex flex-col lg:flex-row h-[600px] lg:h-[300px] md:ml-0 md:w-[80%] ml-5 lg:ml-0 w-[440px] lg:w-full border border-white lg:-mt-10 bg-[#f3f3f3] shadow-md rounded-md py-4 lg:py-0 px-4 gap-3 items-center justify-center ">
                {{-- Four Boxes --}}
                <div class="h-[50%] lg:h-[90%] lg:w-[50%] w-full flex flex-row justify-center items-center gap-x-3 ">
                    <div class="flex flex-col w-full lg:w-[50%] h-full lg:h-[90%] items-center justify-evenly gap-y-5">
                        {{-- First Box --}}
                        <div @click="open='open1'" class="cursor-pointer hover:scale-105 duration-300 transform flex flex-row w-full h-full lg:h-[48%] bg-white shadow-md rounded-md items-center px-2 gap-3">
                            <div class="bg-[#dedede] rounded-2xl h-20 items-center justify-center flex p-1">
                                <svg fill="#000000" width="30px" height="30px" viewBox="0 0 24 24" id="phillippine-peso" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><path id="primary" d="M11,15H8V3h3a6,6,0,0,1,6,6h0A6,6,0,0,1,11,15ZM8,3V21" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </path><path id="primary-2" data-name="primary" d="M4,7H20M4,11H20" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></svg>
                            </div>
                            <div class="flex flex-col w-full h-[70%] justify-center items-start py-2">
                                <div class="flex flex-row w-full gap-2">
                                    <span class="text-[#071d49] font-extrabold text-xs lg:text-sm uppercase tracking-wide lg:tracking-wider">Total Sales</span>
                                    <span class="text-green-400 font-bold text-xs lg:text-sm  bg-green-400 bg-opacity-20  rounded-md"> +22%</span>
                                </div>
                                <span class="text-[#071d49] font-bold text-lg lg:text-xl truncate">₱22,533,970.40</span>
                            </div>
                        </div>
                        
                        <!-- Modal overlay -->
                        <div x-cloak x-show="open == 'open1'" x-transition class="fixed  bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center">
                            <!-- Modal content -->
                            <div @click.outside="open=''" 
                                    class="relative flex flex-row w-[90%] lg:w-[70%] h-[90%] lg:h-[60%] bg-white rounded-b-lg rounded-t-xl shadow-lg overflow-x-auto hide-scrollbar">
                                <div class="flex flex-col lg:flex-row w-full h-[730px] lg:h-full justify-start items-start py-6 lg:py-4 px-6 lg:px-4 rounded-xl gap-y-2 lg:gap-y-0 gap-x-2">
                                    <div class="flex flex-col w-full lg:w-[50%] h-[50%] lg:h-full gap-y-2 lg:gap-y-0 border-2 border-[#071d49] p-4 rounded-lg overflow-x-auto hide-scrollbar bg-pink-200">
                                        <div class="flex flex-row w-full h-full lg:h-[60%]">
                                            <div class="flex flex-col justify-center w-[50%] h-full gap-y-4">
                                                {{-- Total Sales --}}
                                                <div class="flex flex-col w-full">
                                                    <div class="flex flex-row w-full gap-x-2">
                                                        <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider whitespace-normal">
                                                            <img src="{{ asset('deal.png') }}" class="inline-block align-text-top size-4" alt="deals">
                                                            Total Sales</span>
                                                        <span class="text-green-400 font-regular text-sm bg-opacity-20  rounded-md"> +22%</span>
                                                    </div>
                                                    <span class="text-[#071d49] font-regular text-sm">₱22,533,970.40</span>
                                                </div>
                                                {{-- Percentage --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Year-to-date:</span>
                                                    <span class="text-[#071d49] font-regular text-sm">₱1,970,050.00</span>
                                                </div>
                                                {{-- Target --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Target/Year:</span>
                                                    <span class="text-green-400 font-regular text-sm bg-opacity-20 rounded-md">(40% Achieved)</span>
                                                    <span class="text-[#071d49] font-regular text-sm"> ₱5,000,000.00</span>
                                                </div>
                                            </div>
                                            <div class="flex flex-col w-[50%] justify-start h-full gap-y-4">
                                                {{-- Highest Sales --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Largest Sales</span>
                                                    <span class="text-[#071d49] font-regular text-sm">March: ₱890,650.00</span>
                                                </div>
                                                {{-- Lowest Sales --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Smallest Sales</span>
                                                    <span class="text-[#071d49] font-regular text-sm">January: ₱355,120.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col w-full justify-center h-[50%]">
                                            <span class="text-[#071d49] font-extra text-sm truncate whitespace-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, unde? Nesciunt voluptatem laborum facere aliquam necessitatibus earum cupiditate. Laborum sit minus dolor nobis pariatur ipsa molestias in molestiae repellendus ratione?</span>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-col w-full lg:w-[50%] h-[60%] overflow-x-auto hide-scrollbar lg:h-full justify-center items-center rounded-md">
                                        <div class="text-base font-bold text-[#071d49] w-full h-[15%] uppercase flex items-center gap-x-2">
                                            Sales Summary</div>
                                        <div class="border-[#151847] border w-full h-[70%]">
                                            <table class="table-fixed w-full h-[15%] bg-[#f3f4f6] rounded-t-md">
                                                <thead class="gap-5 w-full h-full">
                                                    <tr>
                                                        <th class="w-[40%] border-b border-r border-[#d0d0d0] px-3 py-2 text-center text-[#071d49] text-sm font-medium">Last Year</th>
                                                        <th class="w-[30%] border-b border-r border-[#d0d0d0] px-3 py-2 text-center text-[#071d49] text-sm font-medium">Month</th>
                                                        <th class="w-[30%] border-b border-[#d0d0d0] px-3 py-2 text-center text-[#071d49] text-sm font-medium">Total Sales</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <div class="h-[70%] w-full overflow-x-auto hide-scrollbar">
                                                <table class="table-fixed w-full h-full">
                                                    <tbody class="w-[440px] md:w-[80%] lg:w-full">
                                                        <tr>
                                                            <td class="w-[40%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Jan 2024 - [₱300,120.00]</td>
                                                            <td class="w-[30%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">January 2025</td>
                                                            <td class="w-[30%] border-b border-[#d0d0d0] bg-red-500/60 px-3 py-2 text-right text-xs text-[#071d49]">₱355,120.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-[40%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Feb 2024 - [₱370,100.00]</td>
                                                            <td class="w-[30%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">February 2025</td>
                                                            <td class="w-[30%] border-b border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱490,100.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-[40%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Mar 2024 - [₱520,100.00]</td>
                                                            <td class="w-[30%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">March 2025</td>
                                                            <td class="w-[30%] border-b border-[#d0d0d0] bg-green-500/60 px-3 py-2 text-right text-xs text-[#071d49]">₱890,650.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-[40%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Apr 2024 - [₱520,100.00]</td>
                                                            <td class="w-[30%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">April 2025</td>
                                                            <td class="w-[30%] border-b border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱555,120.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-[40%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">May 2024 - [₱220,100.00]</td>
                                                            <td class="w-[30%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">May 2025</td>
                                                            <td class="w-[30%] border-b border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱375,720.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-[40%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Jun 2024 - [₱580,100.00]</td>
                                                            <td class="w-[30%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">June 2025</td>
                                                            <td class="w-[30%] border-b border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱661,200.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-[40%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Jul 2024 - [₱410,100.00]</td>
                                                            <td class="w-[30%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">July 2025</td>
                                                            <td class="w-[30%] border-b border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱455,120.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table class="table-fixed w-full h-[15%] rounded-b-md">
                                                <thead class="gap-5 w-full h-full border-t border-[#d0d0d0]">
                                                    <tr>
                                                        <th class="w-[40%] border-r border-[#d0d0d0] px-3 py-2 text-center text-[#071d49] text-sm font-medium"></th>
                                                        <th class="w-[30%] border-r border-[#d0d0d0] px-3 py-2 text-center text-[#071d49] text-sm font-medium"></th>
                                                        <th class="w-[30%] border-[#d0d0d0] bg-blue-500/60 px-3 py-2 text-right text-[#071d49] text-xs font-medium">₱1,970,050.00</th>
                                                    </tr>
                                                </thead>
                                            </table>

                                        </div>
                                        <div class="w-full h-[15%] flex flex-row justify-center items-center gap-x-2">
                                            <span class="flex items-center h-[40%] text-sm text-[#071d49]">Label:</span>
                                            <div class="flex flex-row w-[80%] h-[60%] items-center text-sm text-[#071d49]">
                                                <div class="gap-x-2 flex flex-row w-[34%] lg:w-[35%] h-full items-center">
                                                    <div class="w-[12%] h-[40%] bg-red-500/60 border border-black"></div>
                                                    <span class="truncate">
                                                        Smallest Sales
                                                    </span>
                                                </div>
                                                <div class="gap-x-2 flex flex-row w-[34%] h-full items-center">
                                                    <div class="w-[12%] h-[40%] bg-green-500/60 border border-black"></div>
                                                    <span class="truncate">
                                                        Largest Sales
                                                    </span>
                                                </div>
                                                <div class="gap-x-2 flex flex-row w-[34%] h-full items-center">
                                                    <div class="w-[12%] h-[40%] bg-blue-500/60 border border-black"></div>
                                                    <span class="truncate">
                                                        Year-to-date
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Second Box --}}
                        <div @click="open='open2'" class="cursor-pointer hover:-translate-y-2 hover:scale-105 duration-300 transform flex flex-row w-full h-full lg:h-[48%] bg-white shadow-md rounded-md items-center px-2 gap-3">
                           <div class="bg-[#dedede] rounded-2xl h-20 items-center justify-center flex p-1">
                                <svg fill="#000000" width="30px" height="30px" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg"><path d="M 13.7851 49.5742 L 42.2382 49.5742 C 47.1366 49.5742 49.5743 47.1367 49.5743 42.3086 L 49.5743 13.6914 C 49.5743 8.8633 47.1366 6.4258 42.2382 6.4258 L 13.7851 6.4258 C 8.9101 6.4258 6.4257 8.8398 6.4257 13.6914 L 6.4257 42.3086 C 6.4257 47.1602 8.9101 49.5742 13.7851 49.5742 Z M 13.8554 45.8008 C 11.5117 45.8008 10.1992 44.5586 10.1992 42.1211 L 10.1992 13.8789 C 10.1992 11.4414 11.5117 10.1992 13.8554 10.1992 L 42.1679 10.1992 C 44.4882 10.1992 45.8007 11.4414 45.8007 13.8789 L 45.8007 42.1211 C 45.8007 44.5586 44.4882 45.8008 42.1679 45.8008 Z M 27.9648 22.1289 C 29.6523 22.1289 30.8476 21.0039 30.8476 19.5508 C 30.8476 17.8867 29.6757 16.7383 27.9648 16.7383 C 26.3944 16.7383 25.1757 17.9102 25.1757 19.5508 C 25.1757 21.0039 26.3944 22.1289 27.9648 22.1289 Z M 18.8944 29.9571 L 37.1523 29.9571 C 38.4648 29.9571 39.3554 29.2539 39.3554 28.0118 C 39.3554 26.7461 38.5117 26.0430 37.1523 26.0430 L 18.8944 26.0430 C 17.5351 26.0430 16.6679 26.7461 16.6679 28.0118 C 16.6679 29.2539 17.5820 29.9571 18.8944 29.9571 Z M 27.9648 39.2383 C 29.6523 39.2383 30.8476 38.0898 30.8476 36.6367 C 30.8476 34.9961 29.6757 33.8477 27.9648 33.8477 C 26.3944 33.8477 25.1757 34.9961 25.1757 36.6367 C 25.1757 38.0898 26.3944 39.2383 27.9648 39.2383 Z"/></svg>
                            </div>
                            <div class="flex flex-col w-full h-[70%] justify-center items-start py-2">
                                <span class="text-[#071d49] font-extrabold text-xs lg:text-sm uppercase tracking-wider lg:tracking-wider">Average Deals Sized</span>                             
                                <span class="text-[#071d49] font-bold text-lg lg:text-xl">₱10,000</span>
                            </div>
                        </div>
                        <!-- Modal overlay -->
                        <div x-cloak x-show="open == 'open2'" x-transition class="fixed  bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center">
                            <!-- Modal content -->
                            <div @click.outside="open=''" 
                                     class="relative flex flex-row w-[90%] lg:w-[70%] h-[90%] lg:h-[60%] bg-white rounded-b-lg rounded-t-xl shadow-lg overflow-x-auto hide-scrollbar">
                                <div class="flex flex-col lg:flex-row w-full lg:h-full justify-start items-start py-6 lg:py-4 px-6 lg:px-4 rounded-xl gap-y-2 lg:gap-y-0 gap-x-2">
                                    <div class="flex flex-col w-full lg:w-[50%] h-[1000px] lg:h-full gap-y-2 lg:gap-y-0 border-2 border-[#071d49] p-4 rounded-lg overflow-x-auto hide-scrollbar bg-yellow-200">
                                        <div class="flex flex-row w-full h-[50%]">
                                            <div class="flex flex-col justify-center w-[50%] h-full gap-y-4">
                                                {{-- Overall --}}
                                                <div class="flex flex-col w-full">
                                                    <div class="flex flex-row w-full gap-x-2">
                                                        <img src="{{ asset('forecasting.png') }}" class="size-4" alt="sales">
                                                        <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Overall Average:</span>
                                                    </div>
                                                    <span class="text-[#071d49] font-regular text-sm">₱10,000.00</span>
                                                </div>
                                                {{-- Target --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Target Average:</span>
                                                    <span class="text-[#071d49] font-regular text-sm"> ₱12,000.00</span>
                                                </div>
                                                {{-- Target --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Gap to Target:</span>
                                                    <span class="text-[#071d49] font-regular text-sm"> ₱2,000.00 <span class="text-green-500">(2.6%)</span></span>
                                                </div>
                                                
                                            </div>
                                            <div class="flex flex-col w-[50%] justify-center h-full gap-y-4">
                                                {{-- Highest Sales --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Highest Deal</span>
                                                    <span class="text-[#071d49] font-regular text-sm">₱25,000.00</span>
                                                </div>
                                                 {{-- Median Sales --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Median Deal</span>
                                                    <span class="text-[#071d49] font-regular text-sm">₱15,000.00</span>
                                                </div>
                                                {{-- Lowest Sales --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Lowest Deal</span>
                                                    <span class="text-[#071d49] font-regular text-sm">₱5,000.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col w-full justify-center h-[50%]">
                                            <span class="text-[#071d49] font-extra text-md truncate whitespace-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, unde? Nesciunt voluptatem laborum facere aliquam necessitatibus earum cupiditate. Laborum sit minus dolor nobis pariatur ipsa molestias in molestiae repellendus ratione?</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-full lg:w-[50%] h-[800px] lg:h-full justify-center items-center border-2 border-[#071d49] p-4 rounded-lg overflow-x-auto hide-scrollbar bg-green-200">
                                        <div class="text-base font-bold text-[#071d49] w-full h-full lg:h-[15%] uppercase flex items-center gap-x-2">
                                            <img src="{{ asset('distribution.png') }}" class="size-4" alt="sales">
                                            Disitribution Analysis</div>
                                        <div class="flex flex-col w-full h-full lg:h-[85%] ">
                                            <li class="text-[#071d49] font-regular text-sm px-2">5 deals > ₱20,000 (13.9% of deals, 45.2% of revenue)</li>
                                            <li class="text-[#071d49] font-regular text-sm px-2">20 deals ₱5,000 - ₱20,000 (55.6% of deals, 48.3% of revenue)</li>
                                            <li class="text-[#071d49] font-regular text-sm px-2">11 deals < ₱5,000 (30.6% of deals, 6.5% of revenue)</li>
                                            <div class="flex w-full h-[300px] mt-4">
                                                <x-analytics-display
                                                    title="Deals"
                                                    :labels="['Deal 1', 'Deal 2', 'Deal 3', 'Deal 4', 'Deal 5']"
                                                    :data="[120, 150, 180, 90, 150]"
                                                    chartType="line"
                                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                                    axis="x"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full lg:w-[50%] h-full lg:h-[90%] items-center justify-evenly gap-y-5">
                        {{-- Third Box --}}
                        <div @click="open='open3'" class="cursor-pointer hover:-translate-y-2 hover:scale-105 duration-300 transform flex flex-row w-full h-full lg:h-[48%] bg-white shadow-md rounded-md items-center px-2 gap-3">
                           <div class="bg-[#dedede] rounded-2xl h-20 items-center justify-center flex p-1">
                                <svg height="30px" width="30px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                    viewBox="0 0 512 512"  xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:#000000;}
                                </style>
                                <g>
                                    <path class="st0" d="M255.366,141.046c-7.4,3.583-14.732,8.548-21.533,15.357c-34.091,34.098-65.081,65.088-65.081,65.088
                                        l0.013,0.02c-0.185,0.186-0.371,0.338-0.557,0.53c-8.824,8.831-9.174,22.909-1.025,32.146c0.323,0.371,0.668,0.736,1.025,1.086
                                        c9.161,9.174,24.036,9.196,33.232,0l35.797-35.797c6.176,2.263,12.248,3.583,18.074,4.243c7.937,0.88,15.392,0.55,22.022-0.385
                                        c16.162-2.29,14.47-1.623,23.844-4.704c9.353-3.068,19.862-9.354,19.862-9.354l6.362,6.355
                                        c0.701,0.681,16.919,16.925,25.192,25.185c1.465,1.471,2.709,2.682,3.542,3.549c0.956,0.997,2.022,1.719,2.682,2.682l41.278,41.279
                                        c11.898-13.35,25.488-33.232,23.81-56.058L320.763,129.14C320.763,129.14,285.062,126.589,255.366,141.046z"/>
                                    <path class="st0" d="M261.115,394.362c-9.134-9.147-23.961-9.147-33.101,0l-6.794,6.794c9.119-9.132,9.112-23.926-0.021-33.066
                                        c-9.14-9.126-23.947-9.126-33.087,0.007c9.14-9.133,9.14-23.94,0-33.087c-9.133-9.148-23.947-9.133-33.087,0
                                        c9.14-9.133,9.14-23.947,0-33.095c-9.134-9.132-23.947-9.132-33.088,0.014l-20.46,20.453c-9.14,9.147-9.14,23.947,0,33.094
                                        c9.133,9.134,23.941,9.134,33.08,0c-9.14,9.134-9.14,23.947,0,33.087c9.147,9.133,23.954,9.133,33.094,0
                                        c-9.14,9.133-9.14,23.941,0,33.088c9.14,9.133,23.947,9.133,33.088,0l6.802-6.809c-9.119,9.147-9.113,23.94,0.02,33.081
                                        c9.14,9.132,23.947,9.132,33.088,0l20.467-20.468C270.248,418.302,270.248,403.495,261.115,394.362z"/>
                                    <path class="st0" d="M507.987,178.28L387.543,57.822c-5.351-5.337-14.002-5.337-19.339,0l-38.631,38.63
                                        c-5.337,5.337-5.337,13.989,0,19.333l120.458,120.451c5.33,5.35,13.996,5.35,19.326,0l38.63-38.638
                                        C513.338,192.276,513.338,183.624,507.987,178.28z M473.655,204.992c-5.75,5.736-15.048,5.736-20.777,0
                                        c-5.735-5.743-5.735-15.041,0-20.777c5.729-5.736,15.027-5.736,20.777,0C479.391,189.951,479.384,199.249,473.655,204.992z"/>
                                    <path class="st0" d="M182.417,99.864l-38.624-38.63c-5.336-5.337-13.995-5.337-19.332,0L4.003,181.691
                                        c-5.337,5.323-5.337,13.989,0,19.319l38.631,38.644c5.33,5.331,14.002,5.331,19.325,0l120.458-120.458
                                        C187.761,113.859,187.761,105.207,182.417,99.864z M59.118,208.403c-5.736,5.729-15.04,5.729-20.777,0
                                        c-5.735-5.742-5.735-15.041,0-20.777c5.736-5.735,15.041-5.735,20.777,0C64.854,193.362,64.854,202.66,59.118,208.403z"/>
                                    <path class="st0" d="M397.528,312.809l-7.468-7.482l-72.509-72.509l-4.883,2.166l-5.316,1.919l-0.384,0.117
                                        c-0.936,0.296-9.684,2.971-26.932,5.412c-9.12,1.273-18.156,1.431-26.904,0.434c-3.459-0.385-6.898-0.95-10.296-1.692
                                        l-27.757,27.744c-16.678,16.678-43.836,16.678-60.514,0c-0.585-0.591-1.149-1.19-1.671-1.781l-0.179-0.2
                                        c-10.529-11.939-13.204-28.28-8.252-42.461l10.673-16.609l-0.02-0.02l65.081-65.074c2.647-2.641,5.426-5.103,8.314-7.428
                                        c-20.281-3.982-37.296-2.806-37.296-2.806L88.093,235.679c-1.389,18.988,11.651,39.799,20.928,51.952
                                        c16.692-15.963,43.239-15.756,59.641,0.654c6.107,6.1,9.952,13.617,11.574,21.498c7.895,1.637,15.406,5.475,21.513,11.582
                                        c6.107,6.114,9.952,13.631,11.575,21.519c7.888,1.623,15.412,5.46,21.513,11.568c4.078,4.078,7.152,8.783,9.222,13.817
                                        c11.1-0.137,22.242,4.016,30.688,12.455c16.65,16.636,16.643,43.733,0,60.363l-6.809,6.822l3.411,3.412
                                        c9.148,9.147,23.954,9.147,33.095,0c9.14-9.134,9.14-23.947,0-33.088l6.808,6.83c9.147,9.133,23.947,9.133,33.087,0
                                        c9.14-9.147,9.147-23.954,0-33.101c9.147,9.147,23.947,9.147,33.087,0c9.134-9.126,9.154-23.94,0-33.088
                                        c9.154,9.148,23.954,9.148,33.088,0c9.147-9.132,9.147-23.947,0-33.08L397.528,312.809z"/>
                                </g>
                                </svg>
                            </div>
                            <div class="flex flex-col w-full h-[70%] justify-center items-start py-2">
                                <span class="text-[#071d49] font-extrabold text-xs lg:text-sm uppercase tracking-wider lg:tracking-wider">Deals Closed</span>                             
                                <span class="text-[#071d49] font-bold text-lg lg:text-xl">109,073</span>
                            </div>
                        </div>
                        <!-- Modal overlay -->
                        <div x-cloak x-show="open == 'open3'" x-transition class="fixed  bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center">
                            <!-- Modal content -->
                            <div @click.outside="open=''" 
                                    class="relative flex flex-row w-[90%] lg:w-[70%] h-[90%] lg:h-[60%] bg-white rounded-b-lg rounded-t-xl shadow-lg overflow-x-auto hide-scrollbar">
                                <div class="flex flex-col lg:flex-row w-full h-[730px] lg:h-full justify-start items-start py-8 lg:py-6 px-6 lg:px-4 rounded-xl gap-y-2 lg:gap-y-0 gap-x-2">
                                    <div class="flex flex-col w-full lg:w-[50%] h-[800px] lg:h-full gap-y-2 lg:gap-y-0 border-2 border-[#071d49] rounded-lg p-4 overflow-x-auto hide-scrollbar bg-green-200">
                                        <div class="flex flex-row w-full h-full lg:h-[60%] gap-y-10">
                                            <div class="flex flex-col justify-center w-[50%] h-full gap-y-2">
                                                {{-- Overall --}}
                                                <div class="flex flex-col w-full">
                                                    <div class="flex flex-row w-full">
                                                        <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider whitespace-normal">
                                                            <img src="{{ asset('deal.png') }}" class="inline-block align-text-top size-4 mr-2" alt="deals">
                                                            Overall Deal Closed:</span>
                                                    </div>
                                                    <span class="text-[#071d49] font-regular text-sm">109,073</span>
                                                </div>
                                                {{-- Target --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Period:</span>
                                                    <span class="text-[#071d49] font-regular text-sm"> Q1 2025</span>
                                                </div>
                                                {{-- Deals --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Period Deal Closed:</span>
                                                    <span class="text-[#071d49] font-regular text-sm"> 21,423 <span class="text-green-500">(+2.6%)</span></span>
                                                </div>
                                                {{-- Target --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Target:</span>
                                                    <span class="text-[#071d49] font-regular text-sm"> 20,000</span>
                                                </div>
                                                
                                            </div>
                                            <div class="flex flex-col w-[50%] justify-center h-full gap-y-4">
                                                {{-- Deals --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Previous Period:</span>
                                                    <span class="text-[#071d49] font-regular text-sm"> 18,300 <span class="text-green-500"> (+18% growth)</span></span>
                                                </div>
                                                {{-- Monthly Ave --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Monthly Average</span>
                                                    <span class="text-[#071d49] font-regular text-sm">2500</span>
                                                </div>
                                                 {{-- Weekly Ave --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Weekly Average</span>
                                                    <span class="text-[#071d49] font-regular text-sm">500</span>
                                                </div>
                                                {{-- Daily Ave --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Daily Average</span>
                                                    <span class="text-[#071d49] font-regular text-sm">80-100</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col w-full justify-center h-[50%]">
                                            <span class="text-[#071d49] font-extra text-sm truncate whitespace-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, unde? Nesciunt voluptatem laborum facere aliquam necessitatibus earum cupiditate. Laborum sit minus dolor nobis pariatur ipsa molestias in molestiae repellendus ratione?</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-full lg:w-[50%] h-[360px] lg:h-full justify-center items-center rounded-md gap-2">
                                        <div class="flex flex-col w-full h-[50%] border-2 border-[#071d49] py-2 px-4 rounded-lg overflow-x-auto hide-scrollbar bg-yellow-200">
                                            <span class="text-[#071d49] font-bold font-regular text-base uppercase mb-2 flex items-center gap-x-2">
                                                <img src="{{ asset('trophy.png') }}" class="size-4" alt="deals">
                                                Team Performance</span>
                                            <div class="flex flex-row w-full items-start gap-x-2">
                                                <span class="text-[#071d49] font-semibold text-sm uppercase">Top Closer:</span>
                                                <span class=" text-[#071d49] text-sm">Alex Smith (417 deals - 41.7% of total)</span>
                                            </div>
                                            <span class="text-[#071d49] font-bold text-sm">Team Contribution:</span>
                                            <div class="flex flex-col">
                                                <div class="flex flex-row w-full items-start gap-x-2">
                                                    <li class="text-[#071d49] font-semibold text-sm uppercase px-2">Alex Smith </li>
                                                    <span class=" text-[#071d49] text-sm">(417 deals - 41.7% of total)</span>
                                                </div>
                                                <div class="flex flex-row w-full items-start gap-x-2">
                                                    <li class="text-[#071d49] font-semibold text-sm uppercase px-2">Lebron James </li>
                                                    <span class=" text-[#071d49] text-sm">(320 deals - 32.0% of total)</span>
                                                </div>
                                                <div class="flex flex-row w-full items-start gap-x-2">
                                                    <li class="text-[#071d49] font-semibold text-sm uppercase px-2">Carlos Yulo</li>
                                                    <span class=" text-[#071d49] text-sm">(183 deals - 18.3% of total)</span>
                                                </div>
                                                <div class="flex flex-row w-full items-start gap-x-2">
                                                    <li class="text-[#071d49] font-semibold text-sm uppercase px-2">Kathryn Bernardo</li>
                                                    <span class=" text-[#071d49] text-sm">(80 deals - 8% of total)</span>
                                                </div>
                                            </div>
                                            <div class="flex flex-row w-full items-start gap-x-2">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Deals per Rep Average:</span>
                                                    <span class=" text-[#071d49] text-sm">80 deals</span>
                                            </div>
                                            <div class="flex flex-row w-full items-start gap-x-2">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Top Performer Impact:</span>
                                                    <span class=" text-[#071d49] text-sm">Alex closes 2.1x the team average</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-row w-full h-[50%] gap-x-2">
                                            <div class="flex flex-col w-[50%] border-2 border-[#071d49] py-2 px-4 rounded-lg overflow-x-auto hide-scrollbar bg-blue-200">
                                                <span class="text-[#071d49] font-bold font-regular text-sm uppercase mb-2 flex gap-x-2 items-center">
                                                    <img src="{{ asset('stopwatch.png') }}" class="size-4" alt="deals">
                                                    Efficiency Metrics</span>
                                                <div class="flex flex-col w-full items-start">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Average Closing Time:</span>
                                                    <span class=" text-[#071d49] text-sm">14 days</span>
                                                </div>
                                                <div class="flex flex-row w-full items-start gap-x-2">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Fastest Close: </span><span class="text-sm text-[#071d49]">3 days</span>
                                                </div>
                                                <div class="flex flex-row w-full items-start gap-x-2">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Longest Close: </span><span class="text-sm text-[#071d49]">45 days</span>
                                                </div>
                                                <div class="flex flex-col w-full items-start">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Median Closing Time:</span>
                                                    <span class=" text-[#071d49] text-sm">12 days</span>
                                                </div>
                                            </div>
                                            <div class="flex flex-col w-[50%] border-2 border-[#071d49] py-2 px-4 rounded-lg overflow-x-auto hide-scrollbar bg-orange-200">
                                                <span class="text-[#071d49] font-bold font-regular text-sm uppercase mb-2 gap-x-2 flex items-center">
                                                    <img src="{{ asset('target.png') }}" class="size-4" alt="deals">
                                                    Deals Composition</span>
                                                <div class="flex flex-row w-full items-start gap-x-2">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Growth Rate:</span><span class="text-green-500 text-sm"> (+20%)</span>
                                                </div>
                                                <div class="flex flex-col w-full items-start">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Retention Rate: 83.3%</span>
                                                    <span class=" text-[#071d49] text-sm">(based on renewals)</span>
                                                </div>
                                                <div class="flex flex-col w-full items-start gap-x-2">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Expansion Rate: 37.5%</span>
                                                    <span class="text-[#071d49] text-sm">(6 upsells from existing base)</span>
                                                </div>
                                                <div class="flex flex-col w-full items-start gap-x-2">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">New Client Acquisition: 20</span>
                                                    <span class="text-[#071d49] text-sm">(new relationships)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Fourth Box --}}
                        <div @click="open='open4'" class="cursor-pointer hover:-translate-y-2 hover:scale-105 duration-300 transform flex flex-row w-full h-full lg:h-[48%] bg-white shadow-md rounded-md items-center px-2 gap-3">
                           <div class="bg-[#dedede] rounded-2xl h-20 items-center justify-center flex p-1">
                                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.25 10.5a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5zm-1.543 9.207a1 1 0 0 1-1.414-1.414l14-14a1 1 0 1 1 1.414 1.414l-14 14zM13 17.25a3.75 3.75 0 1 0 7.5 0 3.75 3.75 0 0 0-7.5 0zM7.25 8.5a1.75 1.75 0 1 0 0-3.5 1.75 1.75 0 0 0 0 3.5zm11.25 8.75a1.75 1.75 0 1 1-3.5 0 1.75 1.75 0 0 1 3.5 0z" fill="#000000"/></svg>
                            </div>
                            <div class="flex flex-col w-full h-[70%] justify-center items-start py-2">
                                <span class="text-[#071d49] font-extrabold text-xs lg:text-sm uppercase tracking-wider lg:tracking-wider">Success Rate</span>                             
                                <span class="text-[#071d49] font-bold text-lg lg:text-xl">64%</span>
                            </div>
                        </div>
                        <!-- Modal overlay -->
                        <div x-cloak x-show="open == 'open4'" x-transition class="fixed  bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center">
                            <!-- Modal content -->
                            <div @click.outside="open=''" 
                                    class="relative flex flex-row w-[90%] lg:w-[70%] h-[90%] lg:h-[60%] bg-white rounded-b-lg rounded-t-xl shadow-lg overflow-x-auto hide-scrollbar">
                                <div class="flex flex-col lg:flex-row w-full h-[730px] lg:h-full justify-start items-start py-6 lg:py-4 px-6 lg:px-4 rounded-xl gap-y-2 lg:gap-y-0 gap-x-2">
                                    <div class="flex flex-col w-full lg:w-[50%] h-[1200px] lg:h-full gap-y-2 lg:gap-y-0 border-2 border-[#071d49] rounded-lg p-4 overflow-x-auto hide-scrollbar bg-blue-200">
                                        <div class="flex flex-row w-full h-full lg:h-[60%]">
                                            <div class="flex flex-col justify-center w-[50%] h-full gap-y-2">
                                                {{-- Overall --}}
                                                <div class="flex flex-col w-full">
                                                    <div class="flex flex-row w-full gap-2">
                                                        <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider whitespace-normal">
                                                            <img src="{{ asset('success.png') }}" class="inline-block align-text-top size-4" alt="deals">
                                                            Overall Success Rate:</span>
                                                    </div>
                                                    <span class="text-[#071d49] font-regular text-sm">64%</span>
                                                </div>
                                                {{-- Target --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Target Success Rate:</span>
                                                    <span class="text-[#071d49] font-regular text-sm">75%</span>
                                                </div>
                                                {{-- Gap --}}
                                                <div class="flex w-full flex-col items-start ">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Gap to Target:</span>
                                                    <div class=" flex flex-row w-full justify-start gap-x-2">
                                                        <span class="text-red-500 font-regular text-sm"> -11% </span>
                                                        <span class="text-[#071d49] text-sm">(Far from target)</span>   
                                                    </div>
                                                </div>
                                                {{-- Opportunities --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Total Opportunities:</span>
                                                    <span class="text-[#071d49] font-regular text-sm">1,275</span>
                                                </div>
                                                
                                            </div>
                                            <div class="flex flex-col w-[50%] justify-center h-full gap-y-4">
                                                {{-- Deals --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Deals Won:</span>
                                                    <span class="text-[#071d49] font-regular text-sm"> 816</span>
                                                </div>
                                                {{-- Monthly Ave --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Deals Lost:</span>
                                                    <span class="text-[#071d49] font-regular text-sm">459</span>
                                                </div>
                                                 {{-- Weekly Ave --}}
                                                <div class="flex w-full flex-col">
                                                    <span class="text-[#071d49] font-bold text-sm uppercase tracking-wide lg:tracking-wider">Win-Lost Ratio:</span>
                                                    <span class="text-[#071d49] font-regular text-sm">1.71:1</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col w-full justify-center h-[50%]">
                                            <span class="text-[#071d49] font-extra text-sm truncate whitespace-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, unde? Nesciunt voluptatem laborum facere aliquam necessitatibus earum cupiditate. Laborum sit minus dolor nobis pariatur ipsa molestias in molestiae repellendus ratione?</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-full lg:w-[50%] h-[360px] lg:h-full justify-center items-center rounded-md gap-2">
                                        <div class="flex flex-col w-full h-[50%] border-2 border-[#071d49] py-2 px-4 rounded-lg overflow-x-auto hide-scrollbar bg-orange-200">
                                            <span class="text-[#071d49] font-bold font-regular text-base uppercase mb-2 flex gap-x-2 items-center">
                                                <img src="{{ asset('famous.png') }}" class="size-4" alt="deals">
                                                Individual Performance</span>
                                            <div class="flex flex-row w-full items-start gap-x-2">
                                                <span class="text-[#071d49] font-semibold text-sm uppercase">Top Performer:</span>
                                                <span class=" text-[#071d49] text-sm">Alex Smith: 75% (15/20)</span>
                                            </div>
                                            <div class="flex flex-col w-full items-start px-2">
                                                <li class=" text-[#071d49] text-sm">Above target by +5%</li>
                                                <li class=" text-[#071d49] text-sm">25% of total opportunities, 41.7% of wins</li>
                                            </div>
                                            <div class="flex flex-row w-full items-start gap-x-2">
                                                <span class="text-[#071d49] font-semibold text-sm uppercase">Solid Performer:</span>
                                                <span class=" text-[#071d49] text-sm">Maria Lopez: 67% (12/18)</span>
                                            </div>
                                            <div class="flex flex-col w-full items-start px-2">
                                                <li class=" text-[#071d49] text-sm">Just 3% below target</li>
                                                <li class=" text-[#071d49] text-sm">34% of total opportunities, 33.3% of wins</li>
                                            </div>
                                            <div class="flex flex-row w-full items-start gap-x-2">
                                                <span class="text-[#071d49] font-semibold text-sm uppercase">Needs Support:</span>
                                                <span class=" text-[#071d49] text-sm">John Doe: 60% (9/15)</span>
                                            </div>
                                            <div class="flex flex-col w-full items-start px-2">
                                                <li class=" text-[#071d49] text-sm">10% below target</li>
                                                <li class=" text-[#071d49] text-sm">28% of total opportunities, 25% of wins</li>
                                            </div>
                                        </div>
                                        <div class="flex flex-row w-full h-[50%] gap-x-2">
                                            <div class="flex flex-col w-[50%] border-2 border-[#071d49] py-2 px-4 rounded-lg overflow-x-auto hide-scrollbar bg-green-200">
                                                <span class="text-[#071d49] font-bold text-base uppercase mb-2  gap-x-2 whitespace-normal">
                                                    <img src="{{ asset('report1.png') }}" class="inline-block align-text-top size-4 " alt="deals"> 
                                                    Pipeline Analysis & Drop-off Points</span>
                                                <div class="flex flex-col w-full items-start">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Proposal Stage:</span>
                                                    <li class=" text-[#071d49] text-sm px-2">Most common drop-off point</li>
                                                </div>
                                                <span class="text-[#071d49] font-semibold text-sm uppercase">Stage-by-Stage Conversion:</span>
                                                <div class="flex flex-col w-full items-start px-2">
                                                    <li class=" text-[#071d49] text-sm">Initial Contact → Qualified: 85%</li>
                                                    <li class=" text-[#071d49] text-sm">Qualified → Proposal: 78%</li>
                                                    <li class=" text-[#071d49] text-sm">Proposal → Negotiation: 62% ⚠️ Critical bottleneck</li>
                                                    <li class=" text-[#071d49] text-sm">Negotiation → Close: 89%</li>
                                                </div>
                                                <div class="flex flex-col w-full items-start">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Average Sales Cycle: </span>
                                                    <li class=" text-[#071d49] text-sm px-2">14 days (efficient!)</li>
                                                </div>
                                            </div>
                                            <div class="flex flex-col w-[50%] border-2 border-[#071d49] py-2 px-4 rounded-lg overflow-x-auto hide-scrollbar bg-yellow-200">
                                                <span class="text-[#071d49] font-bold font-regular text-base uppercase mb-2 whitespace-normal gap-x-2">
                                                    <img src="{{ asset('target.png') }}" class="inline-block align-text-top size-4" alt="deals">
                                                    Performance Insights</span>
                                                <div class="flex flex-col w-full items-start">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Team Consistency: </span>
                                                    <li class=" text-[#071d49] text-sm px-2">15% spread between top and bottom performer</li>
                                                </div>
                                                <div class="flex flex-col w-full items-start gap-x-2">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Proposal Challenge: </span>
                                                    <li class="text-[#071d49] text-sm px-2">38% of deals lost at proposal stage</li>
                                                </div>
                                                <div class="flex flex-col w-full items-start gap-x-2">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Negotiation Strength: </span>
                                                    <li class="text-[#071d49] text-sm px-2">High close rate once deals reach negotiation</li>
                                                </div>
                                                <div class="flex flex-col w-full items-start gap-x-2">
                                                    <span class="text-[#071d49] font-semibold text-sm uppercase">Volume vs Quality: </span>
                                                    <li class="text-[#071d49] text-sm px-2">Alex balances both effectively</li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Filter Sales --}}
                <div x-data="{activeFilter: 'Today'}" class="flex flex-col h-[60%] lg:h-[90%] w-full lg:w-[50%]">
                    <div class="group hover:scale-105 duration-300 transform flex flex-col h-full w-full items-center justify-center shadow-md rounded-md bg-white p-2">
                        <div class="flex w-full h-[15%] items-center">
                            <div class="w-full h-full justify-center flex items-center flex-row px-4 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                        <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                </svg>
                                <span class="w-[65%] h-full justify-between flex items-center text-[#071d49] font-extrabold text-base tracking-widest" >SALES</span>         
                            
                                <div x-data="{ open: false }" class="h-7 w-[50%] relative inline-block ">
                                    <button x-text="activeFilter" @click="open = !open"  id="filter" class="flex justify-between items-center w-full h-full rounded-md border border-[#071d49] shadow-sm px-2 py-2 uppercase bg-white text-xs font-bold text-[#071d49] hover:text-white  hover:bg-[#071d49]">
                                        Today
                                        <svg class="size-4 text-[#071d49]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </button>
                                        
                                    <div x-show="open" @click.away="open = false" x-transition 
                                        id="filterContent"  class=" absolute z-10 h-50 w-full  rounded-md bg-white ">
                                        <div x-data="{ isFirst: true }" class="border-x shadow-xs rounded-b-md border-[#071d49] bg-white w-full h-full border-b">
                                            <button @click="activeFilter = 'Today', open = false" 
                                                class="block w-full h-8 px-4 py-2 text-[#071d49] hover:bg-[#071d49] text-xs hover:text-white rounded-md text-start uppercase">Today</button>
                                            <button @click="activeFilter = 'Yesterday', open = false" 
                                                class="block w-full h-8 px-4 py-2 text-[#071d49] hover:bg-[#071d49] text-xs hover:text-white rounded-md text-start uppercase">Yesterday</button>
                                            <button @click="activeFilter = 'This Week', open = false" 
                                                class="block w-full h-8 px-4 py-2 text-[#071d49] hover:bg-[#071d49] text-xs hover:text-white rounded-md text-start uppercase">This Week</button>
                                            <button @click="activeFilter = 'Last 7 Days', open = false" 
                                                class="block w-full h-8 px-4 py-2 text-[#071d49] hover:bg-[#071d49] text-xs hover:text-white rounded-md text-start uppercase">Last 7 Days</button>
                                            <button @click="activeFilter = 'This Month', open = false" 
                                                class="block w-full h-8 px-4 py-2 text-[#071d49] hover:bg-[#071d49] text-xs hover:text-white rounded-md text-start uppercase">This Month</button>
                                            <button @click="activeFilter = 'Last Month', open = false" 
                                                class="block w-full h-8 px-4 py-2 text-[#071d49] hover:bg-[#071d49] text-xs hover:text-white rounded-md text-start uppercase">Last Month</button>
                                            <template x-if="isFirst">
                                                <button @click="isFirst=false" 
                                                    class="block w-full h-8 px-4 py-2 text-[#071d49] hover:bg-[#071d49] text-xs hover:text-white rounded-md text-start uppercase truncate">Custom Range</button>
                                            </template>
                                            <template x-if="!isFirst">
                                                <input @click="isFirst=true" 
                                                    x-data x-init="flatpickr($el, { mode: 'range' })" type="text" 
                                                    placeholder="Select date range"
                                                    class=" rounded-md p-2 w-full h-7 text-xs text-[#071d49]" />
                                            </template>
                                        </div>
                                    </div>
                                </div> 
                                <img src="{{ asset('full.png') }}" @click="open='openFilter'" alt="full" class="size-5 items-center hidden cursor-pointer group-hover:block flex-justify-end duration-399 transform">
                            </div>
                        </div>
                        <div class="relative justify-center w-full h-[80%] mt-2">
                            <div x-show="activeFilter === 'Today'" x-cloak class="h-full w-full absolute">
                                <x-analytics-display
                                    title="Today"
                                    :labels="['8AM', '9AM', '10AM', '11AM', '12PM', '1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM', '8PM']"
                                    :data="[120, 150, 180, 90, 140, 120, 150, 180, 90, 140, 180, 90, 140]"
                                    chartType="line"
                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                />
                            </div>
                            <div x-show="activeFilter === 'Yesterday'" x-cloak class="h-full w-full absolute">
                                <x-analytics-display
                                    title="Yesterday"
                                    :labels="['8AM', '9AM', '10AM', '11AM', '12PM', '1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM', '8PM']"
                                    :data="[120, 150, 180, 90, 140, 120, 150, 180, 90, 140, 180, 90, 140]"
                                    chartType="line"
                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                />
                            </div>
                            <div x-show="activeFilter === 'This Week'" x-cloak class="h-full w-full absolute">
                                <x-analytics-display
                                    title="This Week"
                                    :labels="['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT']"
                                    :data="[120, 150, 180, 90, 140, 150, 180]"
                                    chartType="line"
                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                />
                            </div>
                            <div x-show="activeFilter === 'Last 7 Days'" x-cloak class="h-full w-full absolute">
                                <x-analytics-display
                                    title="Last 7 Days"
                                    :labels="['DATE 1', 'DATE 2', 'DATE 3', 'DATE 4', 'DATE 5', 'DATE 6', 'DATE 7']"
                                    :data="[120, 150, 180, 90, 140, 150, 180]"
                                    chartType="line"
                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                />
                            </div>
                            <div x-show="activeFilter === 'This Month'" x-cloak class="h-full w-full absolute">
                                <x-analytics-display
                                    title="This Month"
                                    :labels="['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30']"
                                    :data="[120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140]"
                                    chartType="line"
                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                />
                            </div>
                            <div x-show="activeFilter === 'Last Month'" x-cloak class="h-full w-full absolute">
                                <x-analytics-display
                                    title="Last Month"
                                    :labels="['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30']"
                                    :data="[120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140]"
                                    chartType="line"
                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                />
                            </div>
                            <div x-show="activeFilter === 'Custom Range'" x-cloak class="h-full w-full absolute">
                                <x-analytics-display
                                    title="Custom Range"
                                    :labels="['January', 'February', 'March', 'April', 'May']"
                                    :data="[120, 150, 180, 90, 140]"
                                    chartType="line"
                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                />
                            </div>
                        </div>
                    </div>
                    <!-- Modal overlay -->
                    <div x-cloak x-show="open == 'openFilter'" x-transition class="fixed bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center w-full h-full">
                        <!-- Modal content -->
                        <div @click.outside="open=''" 
                                class="relative flex flex-row shadow-lg w-[90%] lg:w-[70%] h-[80%] lg:h-[70%]">
                            <div class="flex flex-col lg:w-[90%] lg:h-full bg-white shadow-md rounded-3xl items-center justify-center overflow-x-auto hide-scrollbar w-full h-full">
                                <div class="flex flex-row w-[90%] h-[10%] justify-start items-center">
                                    <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                            <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm lg:text-2xl text-[#0f1019] font-extrabold uppercase">Sales</span>
                                    </div>
                                    
                                </div>
                                <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                    <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full">
                                        <div x-show="activeFilter === 'Today'" x-cloak class="w-full h-full p-2">
                                            <x-analytics-display
                                                title="Today"
                                                :labels="[120, 150, 180, 90, 140, 120, 150, 180, 90, 140, 180, 90, 140]"
                                                :data="[120, 150, 180, 90, 140, 120, 150, 180, 90, 140, 180, 90, 140]"
                                                chartType="line"
                                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                            />
                                        </div>
                                        <div x-show="activeFilter === 'Yesterday'" x-cloak class="w-full h-full p-2">
                                            <x-analytics-display
                                                title="Yesterday"
                                                :labels="[120, 150, 180, 90, 140, 120, 150, 180, 90, 140, 180, 90, 140]"
                                                :data="[120, 150, 180, 90, 140, 120, 150, 180, 90, 140, 180, 90, 140]"
                                                chartType="line"
                                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                            />
                                        </div>
                                        <div x-show="activeFilter === 'This Week'" x-cloak class="w-full h-full p-2">
                                            <x-analytics-display
                                                title="This Week"
                                                :labels="['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT']"
                                                :data="[120, 150, 180, 90, 140, 150, 180]"
                                                chartType="line"
                                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                            />
                                        </div>
                                        <div x-show="activeFilter === 'Last 7 Days'" x-cloak class="w-full h-full p-2">
                                            <x-analytics-display
                                                title="Last 7 Days"
                                                :labels="['DATE 1', 'DATE 2', 'DATE 3', 'DATE 4', 'DATE 5', 'DATE 6', 'DATE 7']"
                                                :data="[120, 150, 180, 90, 140, 150, 180]"
                                                chartType="line"
                                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                            />
                                        </div>
                                        <div x-show="activeFilter === 'This Month'" x-cloak class="w-full h-full p-2">
                                            <x-analytics-display
                                                title="This Month"
                                                :labels="['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30']"
                                                :data="[120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140]"
                                                chartType="line"
                                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                            />
                                        </div>
                                        <div x-show="activeFilter === 'Last Month'" x-cloak class="w-full h-full p-2">
                                            <x-analytics-display
                                                title="Last Month"
                                                :labels="['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30']"
                                                :data="[120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140,120, 150, 180, 90, 140]"
                                                chartType="line"
                                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                            />
                                        </div>
                                        <div x-show="activeFilter === 'Custom Range'" x-cloak class="w-full h-full p-2">
                                            <x-analytics-display
                                                title="Custom Range"
                                                :labels="['January', 'February', 'March', 'April', 'May']"
                                                :data="[120, 150, 180, 90, 140]"
                                                chartType="line"
                                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                            />
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-[80%] lg:w-[30%] h-[50%] lg:h-[90%] justify-start items-start py-3 pr-3">
                                        <span class="text-base lg:text-xl text-[#071d49] font-bold">Title</span>
                                        <span class="text-sm lg:text-base text-[#071d49]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Second Row --}}
        <div class="flex md:w-full md:justify-center">
            <div class="flex flex-col lg:flex-row h-[600px] lg:h-[300px] md:ml-0 md:w-[80%] ml-5 lg:ml-0 w-[440px] lg:w-full mt-3 lg:-mt-3 gap-3 items-center justify-center">
                {{-- Top Performer Sale Reps --}}
                <div @click="open='openPerformer'" class="group cursor-pointer hover:scale-105  duration-300 transform flex flex-col w-full lg:w-[50%] h-[50%] lg:h-full bg-white shadow-md rounded-md">
                    <div class="flex flex-col w-full h-full bg-white shadow-md rounded-md items-center justify-center">
                        <div class="flex flex-row w-[90%] h-[10%] justify-start items-center">
                            <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm lg:text-base text-[#071d49] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-base ">Top Performing Sales Representatives</span>
                            </div>
                        </div>
                        <div class="flex flex-row w-[90%] h-[75%] justify-center items-center text-sm lg:rounded-md">
                            <x-analytics-display
                                title="Sales Reps Performance"
                                :labels="['Anne', 'Vhong', 'Jhong', 'Vice Ganda', 'Ryan']"
                                :data="[120, 150, 180, 90, 150]"
                                chartType="bar"
                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                axis="y"
                            />
                        </div>
                    </div>   
                </div>
                <!-- Modal overlay -->
                <div x-cloak x-show="open == 'openPerformer'" x-transition class="fixed bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center w-full h-full">
                    <!-- Modal content -->
                    <div @click.outside="open=''" 
                            class="relative flex flex-row shadow-lg w-[90%] lg:w-[70%] h-[80%] lg:h-[70%]">
                        <div class="flex flex-col lg:w-[90%] lg:h-full bg-white shadow-md rounded-3xl items-center justify-center overflow-x-auto hide-scrollbar w-full h-full">
                            <div class="flex flex-row w-[90%] h-[10%] justify-start items-center">
                                <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                        <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm lg:text-lg text-[#071d49] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-[17px]">Top Performing Sales Representatives</span>
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full p-2">
                                    <x-analytics-display
                                        title="Sales Representatives Performance"
                                        :labels="['Anne', 'Vhong', 'Jhong', 'Vice Ganda', 'Ryan']"
                                        :data="[120, 150, 180, 90, 150]"
                                        chartType="bar"
                                        :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                        axis="y"
                                    />
                                </div>
                                <div class="flex flex-col w-[80%] lg:w-[30%] h-[50%] lg:h-[90%] justify-start items-start py-3 pr-3">
                                    <span class="text-base lg:text-xl text-[#071d49] font-bold">Title</span>
                                    <span class="text-sm lg:text-base text-[#071d49]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
                {{-- Target vs. Actual --}}
                <div x-data="{activeChart: 'chart1'}" class="flex flex-col w-full lg:w-[50%] h-[50%] lg:h-full">
                    <div class="group cursor-pointer hover:scale-105 duration-300 transform flex flex-col w-full h-full bg-white shadow-md rounded-md">
                        <div class="flex flex-col bg-white shadow-lg h-full w-full rounded-lg shadow-xs justify-center items-center gap-3">
                            <div class="flex flex-row h-[10%] w-[90%] items-center justify-between gap-2">
                                <div class="flex flex-row w-full h-full justify-start items-center gap-2">
                                    <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                            <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm lg:text-base text-[#071d49] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-base">Target vs. Actual</span>
                                    </div>
                                    <div class="flex hover:scale-105 duration-300 transform justify-end w-[40%] lg:w-[50%] h-full items-center">
                                        {{-- Buttons --}}
                                        <div class="flex flex-row w-full lg:w-[90%] h-full lg:h-[80%] border border-[#071d49] rounded-md justify-between items-center">
                                            <button @click="activeChart = 'chart1'" :class="activeChart === 'chart1' ? 'bg-[#071d49] text-[#FFFFF1]' : 'text-[#071d49]'" 
                                                class="text-xs uppercase text-[#071d49] font-semibold focus:bg-[#071d49] focus:text-white w-[34%] h-full text-center rounded-l-md hover:bg-[#071d49] hover:text-white truncate">Revenue</button>
                                            <button @click="activeChart = 'chart2'" :class="activeChart === 'chart2' ? 'bg-[#071d49] text-[#FFFFF1]' : 'text-[#071d49]'"
                                                class="text-xs uppercase text-[#071d49] font-semibold focus:bg-[#071d49] focus:text-white w-[34%] h-full text-center hover:bg-[#071d49] hover:text-white">Deals</button>
                                            <button @click="activeChart = 'chart3'" :class="activeChart === 'chart3' ? 'bg-[#071d49] text-[#FFFFF1]' : 'text-[#071d49]'"
                                                class="text-xs uppercase text-[#071d49] font-semibold focus:bg-[#071d49] focus:text-white w-[34%] h-full text-center rounded-r-md hover:bg-[#071d49] hover:text-white truncate">New Customer</button>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ asset('full.png') }}" @click="open='openTarget'" alt="full" class="size-5 hidden cursor-pointer group-hover:block flex-justify-end duration-399 transform">
                            </div>
                            <div class="flex h-[75%] w-[90%] relative">
                                <div x-show="activeChart === 'chart1'" x-cloak class="h-full w-full absolute">
                                    <x-analytics-display
                                            title="Revenue"
                                            :labels="['Week 1', 'Week 2', 'Week 3', 'Week 4']"
                                            :data="[120, 150, 180, 90]"
                                            chartType="bar"
                                            :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                    />
                                </div>
                                <div x-show="activeChart === 'chart2'" x-cloak class="h-full w-full absolute">
                                    <x-analytics-display
                                            title="Deals"
                                            :labels="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August']"
                                            :data="[120, 150, 180, 90, 150, 180, 90, 130]"
                                            chartType="bar"
                                            :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                    />
                                </div>
                                <div x-show="activeChart === 'chart3'" x-cloak class="h-full w-full absolute">
                                    <x-analytics-display
                                            title="New Customer"
                                            :labels="['2020', '2021', '2022', '2023' , '2024' , '2025']"
                                            :data="[120, 150, 180, 90, 150, 140]"
                                            chartType="bar"
                                            :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal overlay -->
                    <div x-cloak x-show="open == 'openTarget'" x-transition class="fixed bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center w-full h-full">
                        <!-- Modal content -->
                        <div @click.outside="open=''" 
                                class="relative flex flex-row shadow-lg w-[90%] lg:w-[70%] h-[80%] lg:h-[70%]">
                            <div class="flex flex-col lg:w-[90%] lg:h-full bg-white shadow-md rounded-3xl items-center justify-center overflow-x-auto hide-scrollbar w-full h-full">
                                <div class="flex flex-row w-[90%] h-[10%] justify-start items-center">
                                    <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                            <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm lg:text-2xl text-[#071d49] font-extrabold uppercase">Target vs. Actual</span>
                                    </div>
                                    {{-- Button --}}
                                    <div class="flex hover:scale-105 duration-300 transform justify-end w-[40%] lg:w-[50%] h-full items-center">
                                        <div class="flex flex-row w-full lg:w-[90%] h-full lg:h-[80%] border border-[#071d49] rounded-md justify-between items-center px-0.5 py-0.5">
                                            <button @click="activeChart = 'chart1'" :class="activeChart === 'chart1' ? 'bg-[#071d49] text-[#FFFFF1]' : 'text-[#071d49]'" 
                                                class="text-xs uppercase text-[#071d49] font-semibold focus:bg-[#071d49] focus:text-white w-[33.3%] h-full text-center rounded-l-md hover:bg-[#071d49] hover:text-white truncate">Revenue</button>
                                            <button @click="activeChart = 'chart2'" :class="activeChart === 'chart2' ? 'bg-[#071d49] text-[#FFFFF1]' : 'text-[#071d49]'"
                                                class="text-xs uppercase text-[#071d49] font-semibold focus:bg-[#071d49] focus:text-white w-[33.3%] h-full text-center hover:bg-[#071d49] hover:text-white">Deals</button>
                                            <button @click="activeChart = 'chart3'" :class="activeChart === 'chart3' ? 'bg-[#071d49] text-[#FFFFF1]' : 'text-[#071d49]'"
                                                class="text-xs uppercase text-[#071d49] font-semibold focus:bg-[#071d49] focus:text-white w-[33.3%] h-full text-center rounded-r-md hover:bg-[#071d49] hover:text-white truncate">New Customer</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                    <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full">
                                        <div x-show="activeChart === 'chart1'" x-cloak class="w-full h-full p-2">
                                            <x-analytics-display
                                                    title="Revenue"
                                                    :labels="['Week 1', 'Week 2', 'Week 3', 'Week 4']"
                                                    :data="[120, 150, 180, 90]"
                                                    chartType="bar"
                                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                            />
                                        </div>
                                        <div x-show="activeChart === 'chart2'" x-cloak class="w-full h-full p-2">
                                            <x-analytics-display
                                                    title="Deals"
                                                    :labels="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August']"
                                                    :data="[120, 150, 180, 90, 150, 180, 90, 130]"
                                                    chartType="bar"
                                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                            />
                                        </div>
                                        <div x-show="activeChart === 'chart3'" x-cloak class="w-full h-full p-2">
                                            <x-analytics-display
                                                    title="New Customer"
                                                    :labels="['2020', '2021', '2022', '2023' , '2024' , '2025']"
                                                    :data="[120, 150, 180, 90, 150, 140]"
                                                    chartType="bar"
                                                    :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                            />
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-[80%] lg:w-[30%] h-[50%] lg:h-[90%] justify-start items-start py-3 pr-3">
                                        <span class="text-base lg:text-xl text-[#071d49] font-bold">Title</span>
                                        <span class="text-sm lg:text-base text-[#071d49]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Third Row --}}
        <div class="flex md:w-full md:justify-center">
            <div class="flex flex-col lg:flex-row h-[900px] lg:h-[300px] md:ml-0 md:w-[80%] ml-5 lg:ml-0 w-[440px] lg:w-full mt-3 lg:-mt-3 gap-3 items-center justify-center">
                {{-- Sales by Region --}}
                <div @click="open='openRegion'" class="cursor-pointer hover:scale-105 duration-300 transform flex flex-col w-full lg:w-[33.3%] h-[33.3%] lg:h-full bg-white shadow-md rounded-md">
                    <div class="flex flex-col w-full h-full bg-white shadow-md rounded-md items-center justify-center">
                        <div class="flex flex-row w-[90%] h-[10%] justify-start items-center gap-2">
                            <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm lg:text-base text-[#071d49] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-base">Sales by Region</span>
                            </div>
                        </div>
                        <div class="flex flex-row w-[90%] h-[75%] justify-center items-center text-sm lg:rounded-md">
                            <x-analytics-display
                                title="Sales by Region"
                                :labels="['NCR', 'CAR', 'Region I', 'Region II', 'Region III', 'Region IV-A', 'MIMAROPA', 'Region V', 'Region VI', 'Region VII', 'Region VIII', 'Region IX', 'Region X', 'Region XI', 'Region XII', 'CARAGA', 'BARMM']"
                                :data="[120, 150, 180, 90, 150,120, 150, 180, 90, 150,120, 150, 180, 90, 150,90,80]"
                                chartType="bar"
                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                axis="y"
                            />
                        </div>
                    </div>   
                </div>
                <!-- Modal overlay -->
                <div x-cloak x-show="open == 'openRegion'" x-transition class="fixed bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center w-full h-full">
                    <!-- Modal content -->
                    <div @click.outside="open=''" 
                            class="relative flex flex-row shadow-lg w-[90%] lg:w-[70%] h-[80%] lg:h-[70%]">
                        <div class="flex flex-col lg:w-[90%] lg:h-full bg-white shadow-md rounded-3xl items-center justify-center overflow-x-auto hide-scrollbar w-full h-full">
                            <div class="flex flex-row w-[90%] h-[10%] justify-start items-center">
                                <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                        <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm lg:text-2xl text-[#071d49] font-extrabold uppercase">Sales by Region</span>
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full p-2">
                                    <x-analytics-display
                                        title="Sales By Region  "
                                        :labels="['NCR', 'CAR', 'Region I', 'Region II', 'Region III', 'Region IV-A', 'MIMAROPA', 'Region V', 'Region VI', 'Region VII', 'Region VIII', 'Region IX', 'Region X', 'Region XI', 'Region XII', 'CARAGA', 'BARMM']"
                                        :data="[120, 150, 180, 90, 150,120, 150, 180, 90, 150,120, 150, 180, 90, 150,90,80]"
                                        chartType="bar"
                                        :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                        axis="y"
                                    />
                                </div>
                                <div class="flex flex-col w-[80%] lg:w-[30%] h-[50%] lg:h-[90%] justify-start items-start py-3 pr-3">
                                    <span class="text-base lg:text-xl text-[#071d49] font-bold">Title</span>
                                    <span class="text-sm lg:text-base text-[#071d49]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
                {{-- Customer Segments   --}}
                <div @click="open='openCustomer'" class="cursor-pointer hover:scale-105 duration-300 transform flex flex-col w-full lg:w-[33.3%] h-[33.3%] lg:h-full bg-white shadow-md rounded-md">
                    <div class="flex flex-col w-full h-full bg-white shadow-md rounded-md items-center justify-center">
                        <div class="flex flex-row w-[90%] h-[10%] justify-start items-center gap-2">
                            <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm lg:text-base text-[#071d49] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-base">Customer Segment</span>
                            </div>
                        </div>
                        <div class="flex flex-row w-[90%] h-[75%] justify-center items-center text-sm lg:rounded-md">
                            <x-analytics-display
                                title="Customers Segment"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 150]"
                                chartType="pie"
                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                            />
                        </div>
                    </div>   
                </div>
                <!-- Modal overlay -->
                <div x-cloak x-show="open == 'openCustomer'" x-transition class="fixed bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center w-full h-full">
                    <!-- Modal content -->
                    <div @click.outside="open=''" 
                            class="relative flex flex-row shadow-lg w-[90%] lg:w-[70%] h-[80%] lg:h-[70%]">
                        <div class="flex flex-col lg:w-[90%] lg:h-full bg-white shadow-md rounded-3xl items-center justify-center overflow-x-auto hide-scrollbar w-full h-full">
                            <div class="flex flex-row w-[90%] h-[10%] justify-start items-center">
                                <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                        <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm lg:text-2xl text-[#071d49] font-extrabold uppercase">Customer Segment</span>
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full p-2">
                                    <x-analytics-display
                                        title="Customers Segment"
                                        :labels="['January', 'February', 'March', 'April', 'May']"
                                        :data="[120, 150, 180, 90, 150]"
                                        chartType="pie"
                                        :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                    />
                                </div>
                                <div class="flex flex-col w-[80%] lg:w-[30%] h-[50%] lg:h-[90%] justify-start items-start py-3 pr-3">
                                    <span class="text-base lg:text-xl text-[#071d49] font-bold">Title</span>
                                    <span class="text-sm lg:text-base text-[#071d49]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
                {{-- Sales by Stage --}}
                <div @click="open='openStage'" class="cursor-pointer hover:scale-105 duration-300 transform flex flex-col w-full lg:w-[33.3%] h-[33.3%] lg:h-full bg-white shadow-md rounded-md">
                    <div class="flex flex-col w-full h-full bg-white shadow-md rounded-md items-center justify-center">
                        <div class="flex flex-row w-[90%] h-[10%] justify-start items-center gap-2">
                            <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm lg:text-base text-[#071d49] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-base">Sales by Stage</span>
                            </div>
                        </div>
                        <div class="flex flex-row w-[90%] h-[75%] justify-center items-center text-sm lg:rounded-md">
                            <x-analytics-display
                                title="Sales by Stage"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 150]"
                                chartType="radar"
                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                            />
                        </div>
                    </div>   
                </div>
                <!-- Modal overlay -->
                <div x-cloak x-show="open == 'openStage'" x-transition class="fixed bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center w-full h-full">
                    <!-- Modal content -->
                    <div @click.outside="open=''" 
                            class="relative flex flex-row shadow-lg w-[90%] lg:w-[70%] h-[80%] lg:h-[70%]">
                        <div class="flex flex-col lg:w-[90%] lg:h-full bg-white shadow-md rounded-3xl items-center justify-center overflow-x-auto hide-scrollbar w-full h-full">
                            <div class="flex flex-row w-[90%] h-[10%] justify-start items-center">
                                <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                        <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm lg:text-2xl text-[#071d49] font-extrabold uppercase">Sales by Stage</span>
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full p-2">
                                    <x-analytics-display
                                        title="Sales by Stage"
                                        :labels="['January', 'February', 'March', 'April', 'May']"
                                        :data="[120, 150, 180, 90, 150]"
                                        chartType="radar"
                                        :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                    />
                                </div>
                                <div class="flex flex-col w-[80%] lg:w-[30%] h-[50%] lg:h-[90%] justify-start items-start py-3 pr-3">
                                    <span class="text-base lg:text-xl text-[#071d49] font-bold">Title</span>
                                    <span class="text-sm lg:text-base text-[#071d49]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
        {{-- Fourth Row --}}
        <div class="flex md:w-full md:justify-center">
            <div class="flex flex-col lg:flex-row h-[600px] lg:h-[300px] md:ml-0 md:w-[80%] ml-5 lg:ml-0 w-[440px] lg:w-full mt-3 lg:-mt-3 gap-3 items-center justify-center">
                {{-- Deals Status Breakdown --}}
                <div @click="open='openDeals'" class="cursor-pointer hover:scale-105 duration-300 transform flex flex-col w-full lg:w-[40%] h-[50%] lg:h-full bg-white shadow-md rounded-md">
                    <div class="flex flex-col w-full h-full bg-white shadow-md rounded-md items-center justify-center">
                        <div class="flex flex-row w-[90%] h-[10%] justify-start items-center gap-2">
                            <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm lg:text-base text-[#071d49] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-base">Deals Status Breakdown</span>
                            </div>
                        </div>
                        <div class="flex flex-row w-[90%] h-[75%] justify-center items-center text-sm lg:rounded-md">
                            <x-analytics-display
                                title="Deals Status Breakdown"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 150]"
                                chartType="doughnut"
                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                axis="y"
                            />
                        </div>
                    </div>   
                </div>
                <!-- Modal overlay -->
                <div x-cloak x-show="open == 'openDeals'" x-transition class="fixed bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center w-full h-full">
                    <!-- Modal content -->
                    <div @click.outside="open=''" 
                            class="relative flex flex-row shadow-lg w-[90%] lg:w-[70%] h-[80%] lg:h-[70%]">
                        <div class="flex flex-col lg:w-[90%] lg:h-full bg-white shadow-md rounded-3xl items-center justify-center overflow-x-auto hide-scrollbar w-full h-full">
                            <div class="flex flex-row w-[90%] h-[10%] justify-start items-center">
                                <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                        <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm lg:text-2xl text-[#071d49] font-extrabold uppercase">Deals Status Breakdown</span>
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full p-2">
                                    <x-analytics-display
                                        title="Deals Status Breakdown"
                                        :labels="['January', 'February', 'March', 'April', 'May']"
                                        :data="[120, 150, 180, 90, 150]"
                                        chartType="doughnut"
                                        :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                        axis="y"
                                    />
                                </div>
                                <div class="flex flex-col w-[80%] lg:w-[30%] h-[50%] lg:h-[90%] justify-start items-start py-3 pr-3">
                                    <span class="text-base lg:text-xl text-[#071d49] font-bold">Title</span>
                                    <span class="text-sm lg:text-base text-[#071d49]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
                {{-- Sales by Product/Service --}}
                <div x-data="{activeChart: 'products'}" class="flex flex-col w-full lg:w-[60%] h-[50%] lg:h-full">
                    <div class="group cursor-pointer hover:scale-105 duration-300 transform flex flex-col w-full h-full bg-white shadow-md rounded-md">
                        <div class="flex flex-col w-full h-full bg-white shadow-md rounded-md items-center justify-center">
                            <div class="flex flex-row w-[90%] h-[10%] justify-start items-center gap-2">
                                <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                        <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm lg:text-base text-[#071d49] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-base">Sales by Product/Service</span>
                                </div>
                                <div class="flex hover:scale-105 duration-300 transform justify-end w-[40%] lg:w-[50%] h-full items-center">
                                    {{-- Buttons --}}
                                    <div class="flex flex-row w-full lg:w-[90%] h-full lg:h-[80%] border border-[#071d49] rounded-md justify-between items-center">
                                        <button @click="activeChart = 'products'" :class="activeChart === 'products' ? 'bg-[#071d49] text-[#FFFFF1]' : 'text-[#071d49]'" 
                                            class="text-xs uppercase text-[#071d49] font-semibold focus:bg-[#071d49] focus:text-white w-[50%] h-full text-center rounded-l-md hover:bg-[#071d49] hover:text-white truncate">Products</button>
                                        <button @click="activeChart = 'services'" :class="activeChart === 'services' ? 'bg-[#071d49] text-[#FFFFF1]' : 'text-[#071d49]'"
                                            class="text-xs uppercase text-[#071d49] font-semibold focus:bg-[#071d49] focus:text-white w-[50%] h-full text-center rounded-r-md hover:bg-[#071d49] hover:text-white">Services</button>
                                    </div>
                                </div>
                                <img src="{{ asset('full.png') }}" @click="open='openProducts'" alt="full" class="size-5 hidden cursor-pointer group-hover:block flex-justify-end duration-399 transform">
                            </div>
                            <div class="flex h-[75%] w-[90%] relative">
                                <div x-show="activeChart === 'products'" x-cloak class="h-full w-full absolute">
                                    <x-analytics-display
                                        title="Sales by Product"
                                        :labels="['January', 'February', 'March', 'April', 'May']"
                                        :data="[120, 150, 180, 90, 150]"
                                        chartType="bar"
                                        :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                        axis="x"
                                    />
                                </div>
                                <div x-show="activeChart === 'services'" x-cloak class="h-full w-full absolute">
                                    <x-analytics-display
                                        title="Sales by Services"
                                        :labels="['January', 'February', 'March', 'April', 'May']"
                                        :data="[120, 150, 180, 90, 150]"
                                        chartType="bar"
                                        :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                        axis="x"
                                    />
                                </div>
                            </div>
                        </div>   
                    </div>
                    <!-- Modal overlay -->
                    <div x-cloak x-show="open == 'openProducts'" x-transition class="fixed bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center w-full h-full">
                        <!-- Modal content -->
                        <div @click.outside="open=''" 
                                class="relative flex flex-row shadow-lg w-[90%] lg:w-[70%] h-[80%] lg:h-[70%]">
                            <div class="flex flex-col lg:w-[90%] lg:h-full bg-white shadow-md rounded-3xl items-center justify-center overflow-x-auto hide-scrollbar w-full h-full">
                                <div class="flex flex-row w-[90%] h-[10%] justify-start items-center">
                                    <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#071d49]">
                                            <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm lg:text-2xl text-[#071d49] font-extrabold uppercase">Sales by Product/Service</span>
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                    <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full p-2">
                                        <div x-show="activeChart === 'products'" x-cloak class="h-full w-full p-2">
                                            <x-analytics-display
                                                title="Sales by Product"
                                                :labels="['January', 'February', 'March', 'April', 'May']"
                                                :data="[120, 150, 180, 90, 150]"
                                                chartType="bar"
                                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                                axis="x"
                                            />
                                        </div>
                                        <div x-show="activeChart === 'services'" x-cloak class="h-full w-full p-2">
                                            <x-analytics-display
                                                title="Sales by Services"
                                                :labels="['January', 'February', 'March', 'April', 'May']"
                                                :data="[120, 150, 180, 90, 150]"
                                                chartType="bar"
                                                :color="['#071d49', '#D9CD91', '#330000', '#6600cc', '#00ff00', '#660000', '#666600', '#cc3366', '#cc6600', '#ccff00' ,'#ff0000']"
                                                axis="x"
                                            />
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-[80%] lg:w-[30%] h-[50%] lg:h-[90%] justify-start items-start py-3 pr-3">
                                        <span class="text-base lg:text-xl text-[#071d49] font-bold">Title</span>
                                        <span class="text-sm lg:text-base text-[#071d49]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
        {{-- <script>
            document.addEventListener('DOMContentLoaded', function () {
                const toggle = document.getElementById('filter');
                const content = document.getElementById('filterContent');
                const icon = document.getElementById('filterArrow')

                toggle.addEventListener('click', (e) => {
                    e.preventDefault(); // prevent navigation
                    content.classList.toggle('hidden');

                    rotated = !rotated;
                    icon.classList.toggle('rotate-180', rotated);
                    icon.classList.toggle('rotate-0', !rotated);
                });

                document.addEventListener('click', (e) => {
                    if (!toggle.contains(e.target) && !content.contains(e.target)) {
                    content.classList.add('hidden');

                    rotated = false;
                    icon.classList.toggle('rotate-180', rotated);
                    icon.classList.toggle('rotate-0', !rotated);
                    }
                });
            });

            
        </script> --}}
</x-app-layout>