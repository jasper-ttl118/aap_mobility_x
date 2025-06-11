<div class="flex md:w-full md:justify-center">
    <div class="flex flex-col w-[440px] mt-2 lg:-mt-2 lg:w-full bg-white shadow-md border-gray-100 border-2 rounded-lg ml-5 lg:ml-0 lg:px-0 px-5 justify-center">
        <div class="flex flex-col lg:flex-row lg:items-start items-center p-7 pt-7 lg:justify-between">
            <div class="flex items-start">
                <h2 class="font-semibold text-2xl text-[#151848] font-inter">Birthday Celebrant List</h2>
            </div>

            {{-- Birthday Month Dropdown --}}
            <div class="flex items-center space-x-2">
                <label for="birthday_filter" class="text-[#151848] text-sm">Filter:</label>
                <select name="birthday_filter" id="birthday_filter"
                        class="text-[#151848] font-bold border-none bg-gray-100 text-sm cursor-pointer"
                        wire:model="birthday_filter"
                        wire:change="changeBirthdayFilter">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
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
                        <tr wire:key="customer-{{ $customer->id }}" class="border-b border-gray-200 bg-white gap-5 font-inter">
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
                                    <a @click="open_profile=true" class="cursor-pointer text-[#151847]">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                        </svg>
                                    </a>

                                    <a @click="open_email=true"
                                        class="flex items-center gap-1 font-normal text-[#5556AB] cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                            <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                        </svg>
                                    </a>
                                    
                                    <a @click="open_mobile=true"
                                        class="flex items-center gap-1 font-medium text-[#dfd436] cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.023 3.348-3.97V6.741c0-1.947-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                                        </svg>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex w-full justify-start lg:justify-center">
                {{ $customers->onEachSide(1)->links('vendor.pagination.tailwind') }}
            </div>

        </div>
    </div>

</div>