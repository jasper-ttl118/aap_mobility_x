<x-app-layout class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    <div class="flex flex-1 flex-col lg:ml-52 hide-scrollbar lg:p-10 lg:gap-7 bg-[#f3f4f6] ">
        <!-- Title and Subtitle -->
        {{-- <div class="">
            <h1 class="text-2xl font-semibold text-blue-900">Dashboard</h1>
            <p class="text-gray-700 text-sm"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem aliquid, in minus voluptate optio illo suscipit possimus fuga explicabo necessitatibus aperiam vel at consequatur corrupti tempora sint veniam libero nisi.</p>
        </div> --}}

        <!-- Options Container -->
        <div class="mx-5 lg:mx-0 mt-16 lg:mt-5 lg:-mb-5 overflow-x-auto hide-scrollbar rounded-md border-2 h-[76px] border-gray-100 bg-white shadow-md w-[440px] lg:w-full">
            <div class="flex min-w-[600px] lg:min-w-0">
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
        <div class="flex h-10 items-start gap-x-1 text-blue-900 text-sm px-12 lg:px-7 pt-2 lg:pt-0 lg:-mb-8 overflow-x-auto hide-scrollbar w-[440px] lg:w-full">
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
            <a href="{{ route('agent') }}" class="hover:underline font-semibold">Agent</a>
        </div>

        <div x-data="{ corporate:'resellers' }" class="flex flex-col w-[440px] md:ml-0 md:w-[80%] lg:w-full h-full bg-white shadow-md border-gray-100 border-2 rounded-lg ml-5 lg:ml-0 lg:px-0 px-5 justify-center">
            <div class="flex flex-row w-full h-[20%] items-center ">
                <div class="flex items-center w-[50%] justify-center lg:justify-start p-7 pt-3 px-7">
                    <div>
                        <h2 class="font-semibold text-2xl pt-5 text-blue-900">List of Agents</h2>
                    </div>
                </div>
                <div class="flex justify-end w-[50%] h-[40%] items-center px-7">
                    {{-- Buttons --}}
                    <x-corporate.buttons/>
                </div>
            </div>
            {{-- List of Customers --}}
            <div class="lg:mx-7 mb-10 mr-15 justify-center overflow-x-auto hide-scrollbar -ml-2 lg:ml-7">
                <livewire:crm.corporate.agent-table>            
            </div>
        </div>
    </div>
</x-app-layout>