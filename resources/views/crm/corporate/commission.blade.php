<x-app-layout class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    <div class="flex flex-1 flex-col lg:ml-52 hide-scrollbar lg:p-10 lg:gap-7 bg-[#f3f4f6] ">
        <!-- Title and Subtitle -->
        {{-- <div class="">
            <h1 class="text-2xl font-semibold text-blue-900">Dashboard</h1>
            <p class="text-gray-700 text-sm"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem aliquid, in minus voluptate optio illo suscipit possimus fuga explicabo necessitatibus aperiam vel at consequatur corrupti tempora sint veniam libero nisi.</p>
        </div> --}}

        <!-- Options Container -->
        <div class="flex md:justify-center w-full">
            <div class="mx-5 lg:mx-0 mt-16 lg:mt-5 lg:-mb-5 overflow-y-auto hide-scrollbar rounded-md border-2 h-[62px] border-gray-100 bg-white shadow-md w-[440px] md:w-[80%] lg:w-full">
                <div class="flex min-w-[600px] lg:min-w-0">
                    <div class="group flex-none hover:border-b-2 border-gray-300 w-32 p-4 text-center">
                        <a href="{{ route('customer.index') }}" class=" text-gray-600 hover:text-gray-800">Dashboard</a>
                    </div>
                    <div class="group flex-none hover:border-b-2 border-gray-300 w-32 p-4 text-center">
                        <a href="{{ route('contacts') }}" class="text-gray-600 hover:text-gray-800">Members</a>
                    </div>
                    <div class="group flex-none hover:border-b-2 border-gray-300 w-auto p-4 text-center">
                        <a href="{{ route('email-marketing') }}" class="text-gray-600 hover:text-gray-800">Email Marketing</a>
                    </div>
                    <div class="flex-none w-32 font-semibold border-b-2 border-blue-900 p-4 text-center">
                        <a href="{{ route('corporate') }}" class="text-gray-600 hover:text-blue-800">Corporate</a>
                    </div>
                    <div class="group flex-none hover:border-b-2 border-gray-300 w-auto p-4 text-center">
                        <a href="{{ route('sales-tracking') }}" class="text-gray-600 hover:text-gray-800">Sales Tracking</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumbs-->
        <div class="flex h-10 items-start gap-x-1 text-blue-900 text-sm px-12 lg:px-7 pt-2 lg:pt-0 lg:-mb-8 md:ml-20 lg:ml-0">
            <a href="{{ route('customer.index') }}" class="hover:underline truncate">Customer Relationship Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="{{ route('corporate') }}" class="hover:underline truncate">Corporate</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="{{ route('commission') }}" class="hover:underline font-semibold truncate">Commission Tracking</a>

        </div>

        <div class="flex md:w-full md:justify-center ">
            <div class="flex flex-row w-[440px] lg:w-full h-[70px] md:ml-0 md:w-[80%]  bg-white shadow-md border-gray-100 border-2 rounded-lg ml-5 lg:ml-0 px-5 justify-start items-center gap-2">
                <img src="{{ asset('comms.png') }}" alt="commission" class="size-6">
                <span class="text-xl uppercase font-extrabold text-[#071d49] tracking-widest">COMMISSION TRACKING</span>
            </div>
        </div>

        <div class="flex md:w-full md:justify-center">
            <div class="flex flex-col w-[440px] lg:w-full h-[450px] lg:h-[400px] md:ml-0 md:w-[80%]  bg-white shadow-md rounded-xl ml-5 mt-2 lg:-mt-3 lg:ml-0 justify-start items-center gap-2">
                <div class="bg-[#bec1d8] w-full h-[15%] rounded-t-xl flex justify-start items-center px-5 text-white gap-2">
                    <img src="{{ asset('recent.png') }}" alt="recent" class="size-5">
                    <span class="text-center text-[#071d49] uppercase text-base font-extrabold font-inter tracking-widest">
                        Recent Commissions
                    </span>
                </div>
                <div class="w-full h-[15%] uppercase font-bold text-[#071d49] flex items-center justify-start -mt-3 px-5 gap-3 cursor-pointer group hover:text-[#424ec2]"> 
                    <span class="flex items-center gap-2 border-b-2 border-current group-hover:border-indigo-600 group-hover:no-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm">Last 30 Days</span>
                    </span>
                </div>
                <div class="w-full h-full overflow-y-auto hide-scrollbar">
                    <table class="table-fixed w-full h-[15%] border-[#071d49]">
                        {{-- Table Header --}}
                        <thead class="gap-5 text-xs text-gray-700 uppercase w-[440px] md:w-[80%] lg:w-full">
                             <tr>
                                <th class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-[#071d49] text-sm font-bold truncate">Commission Id</th>
                                <th class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-[#071d49] text-sm font-bold">Date</th>
                                <th class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-[#071d49] text-sm font-bold truncate">Customer Name</th>
                                <th class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-[#071d49] text-sm font-bold truncate">Revenue</th>
                                <th class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-[#071d49] text-sm font-bold">Cost</th>
                                <th class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-[#071d49] text-sm font-bold">Profit</th>
                                <th class="w-[14.3%] border-b border-[#d0d0d0] px-3 py-2 text-left text-[#071d49] text-sm font-bold">Agents</th>
                            </tr>
                        </thead>
                    </table>
                    {{-- Data --}}
                    <div class="h-[70%] w-full overflow-x-auto hide-scrollbar">
                        <table class="table-fixed w-full h-[40%]e">
                            <tbody class="w-[440px] md:w-[80%] lg:w-full">
                                {{-- 1 --}}
                                <tr>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">1</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">2020-08-02</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Rose Mary JJ</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱920.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱700.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱220.00</td>
                                    <td class="w-[14.3%] border-b border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Coco Martin</td>
                                </tr>
                                {{-- 2 --}}
                                <tr>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">2</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">2020-08-02</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Rose Mary JJ</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱920.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱700.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱220.00</td>
                                    <td class="w-[14.3%] border-b border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Coco Martin</td>
                                </tr>
                                {{-- 3 --}}
                                <tr>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">3</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">2020-08-02</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Rose Mary JJ</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱920.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱700.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱220.00</td>
                                    <td class="w-[14.3%] border-b border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Coco Martin</td>
                                </tr>
                                {{-- 4 --}}
                                <tr>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">4</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">2020-08-02</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Rose Mary JJ</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱920.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱700.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱220.00</td>
                                    <td class="w-[14.3%] border-b border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Coco Martin</td>
                                </tr>
                                {{-- 5 --}}
                                <tr>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">5</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">2020-08-02</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Rose Mary JJ</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱920.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱700.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱220.00</td>
                                    <td class="w-[14.3%] border-b border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Coco Martin</td>
                                </tr>
                                {{-- 6 --}}
                                <tr>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">6</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">2020-08-02</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Rose Mary JJ</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱920.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱700.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱220.00</td>
                                    <td class="w-[14.3%] border-b border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Coco Martin</td>
                                </tr>
                                {{-- 7 --}}
                                <tr>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">7</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">2020-08-02</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Rose Mary JJ</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱920.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱700.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱220.00</td>
                                    <td class="w-[14.3%] border-b border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Coco Martin</td>
                                </tr>
                                {{-- 8 --}}
                                <tr>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">8</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">2020-08-02</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Rose Mary JJ</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱920.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱700.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱220.00</td>
                                    <td class="w-[14.3%] border-b border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Coco Martin</td>
                                </tr>
                                {{-- 9 --}}
                                <tr>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">9</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">2020-08-02</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Rose Mary JJ</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱920.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱700.00</td>
                                    <td class="w-[14.3%] border-b border-r border-[#d0d0d0] px-3 py-2 text-right text-xs text-[#071d49]">₱220.00</td>
                                    <td class="w-[14.3%] border-b border-[#d0d0d0] px-3 py-2 text-left text-xs text-[#071d49]">Coco Martin</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- Table Footer --}}
                    <table class="table-fixed w-full h-[15%] rounded-b-xl border-[#071d49]">
                        <tfoot class="w-[440px] md:w-[80%] lg:w-full">
                            <tr>
                                <td class="w-[14.3%] border-t border-[#d0d0d0]"></td>
                                <td class="w-[14.3%] border-t border-[#d0d0d0]"></td>
                                <td class="w-[14.3%] border-t border-r border-[#d0d0d0]"></td>
                                <td class="w-[14.3%] border-t border-r border-[#d0d0d0] px-3 py-2 text-right font-bold text-sm text-[#071d49]">₱68,640.00</td>
                                <td class="w-[14.3%] border-t border-r border-[#d0d0d0] px-3 py-2 text-right font-bold text-sm text-[#071d49]">₱50,640.00</td>
                                <td class="w-[14.3%] border-t border-r border-[#d0d0d0] px-3 py-2 text-right font-bold text-sm text-[#071d49]">₱18,640.00</td>
                                <td class="w-[14.3%] border-t border-[#d0d0d0]"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div x-data="{card:''}" class="flex md:w-full md:justify-center">
            <div class="w-[440px] lg:w-full h-[400px] lg:h-[200px] md:ml-0 md:w-[80%]  flex flex-col lg:flex-row mt-3 lg:-mt-3 gap-4 ml-5 lg:ml-0">
                {{-- Unpaid Commission --}}
                <div class="flex flex-col items-center justify-center w-full lg:w-[70%] h-full bg-white rounded-xl shadow-md">
                    <div class="bg-[#bec1d8] w-full h-[25%] rounded-t-xl flex justify-start items-center text-[#3584e3] px-5 gap-2">
                        <img src="{{ asset('warning.png') }}" alt="warning" class="size-6">
                        <span class="text-center text-[#071d49] uppercase text-base font-extrabold tracking-w font-inter">
                            Unpaid Commissions
                        </span>
                    </div>
                    {{-- Card Animation with Modal --}}
                    <div class="group h-[75%] grid  items-center">
                        {{-- Yellow --}}
                        <div @click="card='yellow'" class="absolute ease-in-out transition duration-300 cursor-pointer shadow-md w-20 h-24 transform group-hover:translate-x-[40px] group-hover:rotate-[40deg] hover:!translate-x-[60px] hover:!rotate-[0deg] bg-yellow-300"></div>
                        <!-- Modal overlay -->
                        <div x-cloak x-show="card == 'yellow'" x-transition class="fixed  bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center">
                            <!-- Modal content -->
                            <div @click.outside="card=''" 
                                    class="relative flex flex-row w-[30%] h-[80%] bg-yellow-300 shadow-lg justify-center">
                                <span class="items-center flex uppercase text-black text-2xl font-extrabold tracking-widest">yellow</span>
                            </div>
                        </div>
                        {{-- Blue --}}
                        <div @click="card='blue'" class="absolute ease-in-out transition duration-300 cursor-pointer shadow-md w-20 h-24 transform group-hover:translate-x-[20px] group-hover:rotate-[30deg] hover:!translate-x-[40px] hover:!rotate-[0deg] bg-blue-500"></div>
                        <!-- Modal overlay -->
                        <div x-cloak x-show="card == 'blue'" x-transition class="fixed  bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center">
                            <!-- Modal content -->
                            <div @click.outside="card=''" 
                                    class="relative flex flex-row w-[30%] h-[80%] bg-blue-500 shadow-lg justify-center">
                                <span class="items-center flex uppercase text-white text-2xl font-extrabold tracking-widest">blue</span>
                            </div>
                        </div>
                        {{-- Green --}}
                        <div @click="card='green'" class="absolute ease-in-out transition duration-300 cursor-pointer shadow-md w-20 h-24 transform group-hover:translate-x-[0px] group-hover:rotate-[20deg] hover:!translate-x-[20px] hover:!rotate-[0deg] bg-green-500"></div>
                        <!-- Modal overlay -->
                        <div x-cloak x-show="card == 'green'" x-transition class="fixed  bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center">
                            <!-- Modal content -->
                            <div @click.outside="card=''" 
                                    class="relative flex flex-row w-[30%] h-[80%] bg-green-500 shadow-lg justify-center">
                                <span class="items-center flex uppercase text-black text-2xl font-extrabold tracking-widest">green</span>
                            </div>
                        </div>
                        {{-- Red --}}
                        <div @click="card='red'" class="absolute ease-in-out transition duration-300 cursor-pointer shadow-md w-20 h-24 transform group-hover:-translate-x-[20px] group-hover:rotate-[10deg] hover:!-translate-x-[20px] hover:!rotate-[0deg] bg-red-500"></div>
                        <!-- Modal overlay -->
                        <div x-cloak x-show="card == 'red'" x-transition class="fixed  bg-black bg-opacity-50 inset-0 z-50 flex items-center justify-center">
                            <!-- Modal content -->
                            <div @click.outside="card=''" 
                                    class="relative flex flex-row w-[30%] h-[80%] bg-red-500 shadow-lg justify-center">
                                <span class="items-center flex uppercase text-white text-2xl font-extrabold tracking-widest">red</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Quick Actions --}}
                <div class="flex w-full lg:w-[30%] h-full flex-col bg-white rounded-xl shadow-md">
                    <div class="bg-[#bec1d8] w-full h-[25%] rounded-t-xl flex justify-start items-center px-5 text-[#3584e3] gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-center text-[#071d49] uppercase text-base font-extrabold tracking-widest font-inter">
                            Quick Actions
                        </span>
                    </div>
                    <div class="flex justify-center items-center w-full h-[75%]">
                        <button class="hover:scale-105 active:scale-95 transform duration-300 active:rotate-[10deg] w-[40%] lg:w-[60%] h-[30%] border-2 border-[#071d49] rounded-lg shadow-sm mb-5 font-bold text-[#071d49] hover:bg-[#071d49] hover:text-white flex gap-3 justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z" clip-rule="evenodd" />
                            </svg>
                            Print Record
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
</x-app-layout>