<x-app-layout class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    <div x-data="{ selected : 'reseller' }" class="flex flex-1 flex-col lg:ml-52 hide-scrollbar lg:p-10 lg:gap-7 bg-[#f3f4f6] ">
        <!-- Title and Subtitle -->
        {{-- <div class="">
            <h1 class="text-2xl font-semibold text-blue-900">Dashboard</h1>
            <p class="text-gray-700 text-sm"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem aliquid, in minus voluptate optio illo suscipit possimus fuga explicabo necessitatibus aperiam vel at consequatur corrupti tempora sint veniam libero nisi.</p>
        </div> --}}

        <!-- Options Container -->
        <div class="flex md:justify-center w-full">
            <div class="mx-5 lg:mx-0 mt-16 lg:mt-5 lg:-mb-5 overflow-x-auto hide-scrollbar rounded-md border-2  border-gray-100 bg-white shadow-md w-[440px] md:w-[80%] lg:w-full">
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
        <div class="flex h-10 items-start gap-x-1 text-[#071d49] text-sm px-12 lg:px-7 pt-2 lg:pt-0 lg:-mb-8 md:ml-20 lg:ml-0">
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
            <a href="{{ route('corporate') }}" class="hover:underline font-semibold truncate">Reseller</a>
        </div>

        <div class="flex md:w-full md:justify-center">
            <div x-data="{ corporate:'reseller' }" class="flex flex-col w-[440px] md:ml-0 md:w-[80%] lg:w-full h-full bg-white shadow-md border-gray-100 border-2 rounded-lg ml-5 lg:ml-0 lg:px-0 px-5 justify-center">
                <div class="flex flex-row w-full h-[20%] items-center ">
                    <div class="flex items-center w-[50%] justify-center lg:justify-start p-7 pt-3 px-7">
                        <div>
                            <h2 class="font-extrabold text-xl uppercase tracking-widest font-inter pt-5 text-[#071d49]" x-text="selected === 'reseller' ? 'List of Resellers' : 'List of Agents'"></h2>
                        </div>
                    </div>
                    <div class="flex justify-end w-[50%] h-[40%] items-center px-7">
                        {{-- Buttons --}}
                        {{-- <x-corporate.buttons/> --}}
                        <div class="flex flex-row w-full lg:w-[50%] h-full lg:h-[80%] border border-[#071d49] rounded-md justify-between items-center px-0.5 py-0.5">
                            <a @click="selected='reseller'"

                                class="text-xs uppercase text-[#071d49] font-semibold focus:bg-[#071d49] flex items-center justify-center focus:text-white w-[50%] h-full rounded-l-md hover:bg-[#071d49] hover:text-white"
                                :class="selected === 'reseller' ? 'bg-[#071d49] text-[#FFFFFF]' : 'text-[#071d49] hover:bg-[#071d49] hover:text-white' ">
                                    Resellers
                            </a>

                            <a @click="selected='agent'"
                                class="text-xs uppercase text-[#071d49] font-semibold focus:bg-[#071d49] flex items-center justify-center focus:text-white w-[50%] h-full rounded-r-md hover:bg-[#071d49] hover:text-white"
                                :class="selected === 'agent' ? 'bg-[#071d49] text-[#FFFFFF]' : 'text-[#071d49] hover:bg-[#071d49] hover:text-white' ">
                                    Agents
                            </a>
                        </div>
                    </div>
                </div>

                {{-- List of Resellers --}}
                <template x-if="selected === 'reseller'">
                    <div class="lg:mx-7 mb-10 mr-15 justify-center overflow-x-auto hide-scrollbar -ml-2 lg:ml-7">
                        <livewire:crm.corporate.reseller-table>            
                    </div>
                </template>

                {{-- List of Agents --}}
                <template x-if="selected === 'agent'">
                    <div class="lg:mx-7 mb-10 mr-15 justify-center overflow-x-auto hide-scrollbar -ml-2 lg:ml-7">
                        <livewire:crm.corporate.agent-table>            
                    </div>
                </template>
            </div>
        </div>
    </div>

    <div x-show="open" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div >
            <livewire:crm.corporate.resellers-profile wire:key="resellers-profile"/>
        </div>
    </div>
</x-app-layout>