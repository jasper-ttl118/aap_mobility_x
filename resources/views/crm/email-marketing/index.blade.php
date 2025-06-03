<x-app-layout class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    <div class="flex flex-1 flex-col lg:ml-64 lg:p-10 lg:gap-7 hide-scrollbar bg-[#f3f4f6]">
    
    <!-- Title and Subtitle -->
    {{-- <div class="">
        <h1 class="text-2xl font-semibold text-blue-900">Contacts</h1>
        <p class="text-gray-700 text-sm"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem aliquid, in minus voluptate optio illo suscipit possimus fuga explicabo necessitatibus aperiam vel at consequatur corrupti tempora sint veniam libero nisi.</p>
    </div> --}}

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
       <a href="{{ route('contacts') }}" class="hover:underline font-semibold text-[#151848] font-inter">Celebrant List</a>
   </div>

   {{-- Tab Buttons (Celebrant List, Message Template, etc) --}}
   <x-email-marketing.tab-buttons />

   <div class="flex flex-col w-[440px] -mt-2 lg:w-full bg-white shadow-md border-gray-100 border-2 rounded-lg ml-5 lg:ml-0 lg:px-0 px-5 justify-center">
        <div class="flex items-start p-7 pt-7 justify-between">
            <div class="flex items-start">
                <h2 class="font-semibold text-2xl text-[#151848] font-inter">Birthday Celebrant List</h2>
            </div>

            {{-- Birthday Month Dropdown --}}
            <livewire:crm.email-marketing.birthday-filter>
        </div>

        {{-- List of Customers --}}
        <div class="lg:mx-7 mb-10 mr-15 justify-center overflow-x-auto hide-scrollbar -ml-2 lg:ml-7">
            <table class="w-full text-sm md:justify-center text-gray-500">   
                <thead class="gap-5 bg-gray-100 text-xs text-gray-700 uppercase w-[440px] lg:w-full">
                    <tr>    
                        <th scope="col" class="w-[12.25%] py-3 font-inter">Member ID</th>
                        <th scope="col" class="w-[19.0%] py-3 font-inter">Name</th>
                        <th scope="col" class="w-[12.5%] py-3 font-inter">Email</th>
                        <th scope="col" class="w-[12.5%] py-3 font-inter">Mobile Number</th>
                        <th scope="col" class="w-[12.5%] py-3 font-inter">Birthdate</th>
                        <th scope="col" class="w-[12.5%] py-3 font-inter">Status</th>
                        <th scope="col" class="w-[12.5%] py-3 font-inter">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr class="border-b border-gray-200 bg-white gap-5 font-inter">
                            <th scope="row" class="w-auto py-4 font-medium whitespace-nowrap text-gray-900">
                                {{ $customer->customer_id }}</th>
                            <td class="w-auto py-4  text-gray-900 pl-5">{{ $customer->customer_firstname }}
                                {{ $customer->customer_surname }}</td>
                            <td class="w-auto py-4 text-gray-900">{{ $customer->customer_email }}</td>
                            <td class="w-auto py-4 text-gray-900 px-1 text-center">{{ $customer->customer_mobile_number }}</td>
                            <td class="w-auto py-4 text-gray-900 px-1 text-center">{{ $customer->customer_birthdate}}</td>
                            <td class="w-auto py-4  text-gray-900 text-center">
                                @if ($customer->customer_status == '1')
                                    <span
                                        class="bg-green-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full text-center">Active</span>
                                @else
                                    <span
                                        class="bg-red-600 whitespace-nowrap text-white text-xs font-medium px-2 py-1 rounded-full text-center">Inactive</span>
                                @endif
                                </td>
                            <td class="w-auto py-4">
                                <div class="flex flex-row justify-center items-center lg:gap-2">
                            {{-- {{$customer->customer_id}} --}}
                                    <a href="#"
                                        class="flex items-center gap-1 font-normal text-[#5556AB] cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                            <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                            <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                        </svg>
                                    </a>

                                    <a href="#"
                                        class="flex items-center gap-1 font-medium text-[#dfd436]">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                            <path fill-rule="evenodd" d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.023 3.348-3.97V6.741c0-1.947-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                                        </svg>
                                    </a>

                                    <a href="#"
                                        class="flex items-center gap-1 font-medium text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                            <path fill-rule="evenodd" d="M11.828 2.25c-.916 0-1.699.663-1.85 1.567l-.091.549a.798.798 0 0 1-.517.608 7.45 7.45 0 0 0-.478.198.798.798 0 0 1-.796-.064l-.453-.324a1.875 1.875 0 0 0-2.416.2l-.243.243a1.875 1.875 0 0 0-.2 2.416l.324.453a.798.798 0 0 1 .064.796 7.448 7.448 0 0 0-.198.478.798.798 0 0 1-.608.517l-.55.092a1.875 1.875 0 0 0-1.566 1.849v.344c0 .916.663 1.699 1.567 1.85l.549.091c.281.047.508.25.608.517.06.162.127.321.198.478a.798.798 0 0 1-.064.796l-.324.453a1.875 1.875 0 0 0 .2 2.416l.243.243c.648.648 1.67.733 2.416.2l.453-.324a.798.798 0 0 1 .796-.064c.157.071.316.137.478.198.267.1.47.327.517.608l.092.55c.15.903.932 1.566 1.849 1.566h.344c.916 0 1.699-.663 1.85-1.567l.091-.549a.798.798 0 0 1 .517-.608 7.52 7.52 0 0 0 .478-.198.798.798 0 0 1 .796.064l.453.324a1.875 1.875 0 0 0 2.416-.2l.243-.243c.648-.648.733-1.67.2-2.416l-.324-.453a.798.798 0 0 1-.064-.796c.071-.157.137-.316.198-.478.1-.267.327-.47.608-.517l.55-.091a1.875 1.875 0 0 0 1.566-1.85v-.344c0-.916-.663-1.699-1.567-1.85l-.549-.091a.798.798 0 0 1-.608-.517 7.507 7.507 0 0 0-.198-.478.798.798 0 0 1 .064-.796l.324-.453a1.875 1.875 0 0 0-.2-2.416l-.243-.243a1.875 1.875 0 0 0-2.416-.2l-.453.324a.798.798 0 0 1-.796.064 7.462 7.462 0 0 0-.478-.198.798.798 0 0 1-.517-.608l-.091-.55a1.875 1.875 0 0 0-1.85-1.566h-.344ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                        
                        </tr>
                </tbody>

            </table>

            <div class="flex w-full justify-start lg:justify-center">
            {{ $customers->onEachSide(1)->links('vendor.pagination.tailwind') }}
            </div>
        </div>
   </div>
</div>
</x-app-layout>