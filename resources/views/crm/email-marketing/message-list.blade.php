<x-app-layout class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    <div class="flex flex-1 flex-col lg:ml-64 lg:p-10 lg:gap-7 hide-scrollbar bg-[#f3f4f6]" x-data="{ selected : 'sent'}"> 
        <!-- Options Container -->
        <div class="mx-5 lg:mx-0 mt-16 lg:mt-5 lg:-mb-5 overflow-y-auto hide-scrollbar rounded-md border-2 h-fit border-gray-100 bg-white shadow-md w-[440px] lg:w-full">
                <div class="flex min-w-[600px] lg:min-w-0">
                    <div class="flex-none w-32 p-4 text-center">
                        <a href="{{ route('customer.index') }}" class=" text-gray-600 hover:text-blue-800 font-inter">Dashboard</a>
                    </div>
                    <div class="flex-none w-32 p-4 text-center">
                        <a href="{{ route('contacts') }}" class="text-gray-600 hover:text-blue-800 font-inter">Members</a>
                    </div>
                    <div class="flex-none w-auto p-4 text-center font-semibold border-b-2 border-[#151848]">
                        <a href="{{ route('email-marketing') }}" class="text-[#151848] hover:text-blue-800 font-inter">Email Marketing</a>
                    </div>
                    <div class="flex-none w-32 p-4 text-center">
                        <a href="{{ route('corporate') }}" class="text-gray-600 hover:text-blue-800 font-inter">Corporate</a>
                    </div>
                    <div class="flex-none w-auto p-4 text-center">
                        <a href="{{ route('sales-tracking') }}" class="text-gray-600 hover:text-blue-800 font-inter">Sales Tracking</a>
                    </div>
                </div>
        </div>

        <!-- Breadcrumbs-->
        <div class="flex h-7 items-start gap-x-1 text-blue-900 text-sm px-12 lg:px-7 pt-2 lg:pt-0 lg:-mb-8">
            <a href="{{ route('customer.index') }}" class="hover:underline text-[#151848] font-inter">Customer Relationship Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="{{ route('contacts') }}" class="hover:underline font-semibold text-[#151848] font-inter">Message List</a>
        </div>

        <x-email-marketing.tab-buttons />
        
        <div class="flex flex-col w-[440px] -mt-2 lg:w-full bg-white shadow-md border-gray-100 border-2 rounded-lg ml-5 lg:ml-0 lg:px-0 px-5 justify-center">
            <div class="flex items-start p-7 pt-7 justify-between">
                <div class="flex items-start">
                    <h2 
                        class="font-semibold text-2xl text-[#151848] font-inter"
                        x-text="selected === 'sent' 
                                ? 'Sent Messages List' 
                                : selected === 'scheduled' 
                                    ? 'Scheduled Messages List' 
                                    : 'Drafted Messages List'">
                    </h2>
                </div>

                {{-- Selection Tabs (Sent, Scheduled, Drafted) --}}
                <div class="flex justify-end w-[50%] h-full items-center">
                    <div class="flex flex-row w-full lg:w-[50%] h-full lg:h-[100%] border border-[#151847] rounded-md justify-between items-center px-0.5 py-0.5">
                        <button @click="selected = 'sent'" :class="selected === 'sent' ? 'text-white bg-[#151847]' : 'text-[#151847]'"
                            class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] focus:text-white w-[33.3%] h-full text-center rounded-l-md hover:bg-[#151847] hover:text-white">Sent</button>
                        <button @click="selected = 'scheduled'" :class="selected === 'scheduled' ? 'text-white bg-[#151847]' : 'text-[#151847]'"
                            class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] focus:text-white w-[33.3%] h-full text-center hover:bg-[#151847] hover:text-white">Scheduled</button>
                        <button @click="selected = 'drafted'" :class="selected === 'drafted' ? 'text-white bg-[#151847]' : 'text-[#151847]'"
                            class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] focus:text-white w-[33.3%] h-full text-center rounded-r-md hover:bg-[#151847] hover:text-white">Drafted</button>
                    </div>
                </div>
            </div>
            
            {{-- List of Sent Messages --}}
            <div class="lg:mx-7 mb-10 mr-15 justify-center overflow-x-auto hide-scrollbar -ml-2 lg:ml-7" >
                <template x-if="selected === 'sent'">
                    <table class="w-full text-sm md:justify-center text-gray-500">   
                        <thead class="gap-5 bg-gray-100 text-xs text-gray-700 uppercase w-[440px] lg:w-full">
                            <tr>    
                                <th scope="col" class="w-[12.25%] py-3 font-inter">Message ID</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Subject</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Content</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Delivery Type</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Sent Date</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Status</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 5; $i++)
                                <tr class="border-b border-gray-200">
                                    <td class="w-auto py-4 text-gray-900 text-center">{{ ($i + 1) }}</td>
                                    <td class="w-auto py-4 text-gray-900 pl-5">Message Title</td>
                                    <td class="w-auto py-4 text-gray-900 pl-5">Lorem Ipsum ...</td>
                                    <td class="w-auto py-4 text-gray-900 text-center">Email</td>
                                    <td class="w-auto py-4 text-gray-900 text-center">2025-04-02</td>
                                    <td class="w-auto py-4 text-gray-900 text-center">
                                        <span class="bg-green-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full text-center">Sent</span>
                                    </td>
                                    <td class="w-auto py-4 text-gray-900">
                                        <div class="flex justify-center items-center text-[#151847]">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </template>

                <template x-if="selected === 'scheduled'">
                    <table class="w-full text-sm md:justify-center text-gray-500">   
                        <thead class="gap-5 bg-gray-100 text-xs text-gray-700 uppercase w-[440px] lg:w-full">
                            <tr>    
                                <th scope="col" class="w-[12.25%] py-3 font-inter">Message ID</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Subject</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Content</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Delivery Type</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Scheduled Date</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Status</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 5; $i++)
                                <tr class="border-b border-gray-200">
                                    <td class="w-auto py-4 text-gray-900 text-center">{{ ($i + 1) }}</td>
                                    <td class="w-auto py-4 text-gray-900 pl-5">Message Title</td>
                                    <td class="w-auto py-4 text-gray-900 pl-5">Lorem Ipsum ...</td>
                                    <td class="w-auto py-4 text-gray-900 text-center">Email</td>
                                    <td class="w-auto py-4 text-gray-900 text-center">2025-04-02</td>
                                    <td class="w-auto py-4 text-gray-900 text-center">
                                        <span class="bg-[#C4D8F2] whitespace-nowrap text-[#151847] text-xs font-medium px-2 py-1 rounded-full text-center">Scheduled</span>
                                    </td>
                                    <td class="w-auto py-4 text-gray-900">
                                        <div class="flex justify-center items-center text-[#151847] gap-x-2">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a href="#" class="text-[#787D7F]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                                </svg>
                                            </a>

                                            <a href="#" class="text-[#E54E4F]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 ">
                                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </template>

                <template x-if="selected === 'drafted'">
                    <table class="w-full text-sm md:justify-center text-gray-500">   
                        <thead class="gap-5 bg-gray-100 text-xs text-gray-700 uppercase w-[440px] lg:w-full">
                            <tr>    
                                <th scope="col" class="w-[12.25%] py-3 font-inter">Message ID</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Subject</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Content</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Delivery Type</th>
                                {{-- <th scope="col" class="w-[12.5%] py-3 font-inter">Scheduled Date</th> --}}
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Status</th>
                                <th scope="col" class="w-[12.5%] py-3 font-inter">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 5; $i++)
                                <tr class="border-b border-gray-200">
                                    <td class="w-auto py-4 text-gray-900 text-center">{{ ($i + 1) }}</td>
                                    <td class="w-auto py-4 text-gray-900 pl-5">Message Title</td>
                                    <td class="w-auto py-4 text-gray-900 pl-5">Lorem Ipsum ...</td>
                                    <td class="w-auto py-4 text-gray-900 text-center">Email</td>
                                    {{-- <td class="w-auto py-4 text-gray-900 text-center">2025-04-02</td> --}}
                                    <td class="w-auto py-4 text-gray-900 text-center">
                                        <span class="bg-[#D17E0E] whitespace-nowrap text-[#FEF3C7] text-xs font-medium px-2 py-1 rounded-full text-center">Drafted</span>
                                    </td>
                                    <td class="w-auto py-4 text-gray-900">
                                        <div class="flex justify-center items-center text-[#151847] gap-x-2">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a href="#" class="text-[#787D7F]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                                </svg>
                                            </a>

                                            <a href="#" class="text-[#E54E4F]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 ">
                                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </template>
                {{-- <div class="flex w-full justify-start lg:justify-center">
                {{ $customers->onEachSide(1)->links('vendor.pagination.tailwind') }}
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>