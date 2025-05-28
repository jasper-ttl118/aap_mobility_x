<div>
    <a wire:click="display"
        class="flex items-center gap-2 rounded-md bg-[#5556AB] px-4 py-2 text-sm font-medium text-white transition-colors cursor-pointer hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
        Birthday Reminders
    </a>

    @if ($show)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-6 ">
                <!-- Modal Header -->
                {{-- <div class="flex justify-between items-center border-b pb-3">
                    <h2 class="text-xl font-semibold text-blue-900">Birthday Reminder</h2>
                    <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600" wire:click="close">
                        &#10005;
                    </button>
                </div> --}}

                <!-- Modal Body -->
                <div class="text-gray-700 p-4 space-y-4">
                    <div>
                        <h2 class="text-xl font-semibold text-blue-900 ">Birthday Reminder</h2>
                        <p class="mt-1">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                    </div>

                    {{-- bg-[#E3D400] --}}
                    <div class="flex justify-between mt-0 gap-x-2 border-4 border-gray-100 bg-gray-100 rounded-md {{ ($selected_tab === 'list') ? 'p-0' : 'py-3'}}">
                        <div class="flex justify-start items-center">
                             {{-- <button class="p-2 m-2 bg-[#5556AB] text-white font-semibold text-sm rounded-md cursor-pointer hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400" wire:click="showCustomerList" >Customer List</button> --}}
                            {{-- <button class="p-2 m-2 bg-[#5556AB] text-white font-semibold text-sm rounded-md cursor-pointer hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-400" wire:click="showBirthdayMessage">Customize Message</button> --}}
                            <a wire:click="showCustomerList"
                                class="flex items-center gap-1 text-[#5556AB] text-sm font-semibold ml-1 mr-1 {{ ($selected_tab === 'list') ? 'text-gray-500 pointer-events-none' : 'text-[#5556AB] cursor-pointer'}}">
                                Customer List 
                             </a>
                            <a wire:click="showBirthdayMessageList"
                                class="flex items-center gap-1 text-[#5556AB] text-sm font-semibold ml-1 mr-1 {{ ($selected_tab === 'message-list') ? 'text-gray-500 pointer-events-none' : 'text-[#5556AB] cursor-pointer'}}">
                                    | Message Templates
                             </a>
                             @if ($selected_tab === 'list')
                                <a href="#"
                                    class="flex items-center gap-1 text-[#5556AB] text-sm font-semibold mr-1 cursor-pointer ml-1">
                                    | Send to All Via Email 
                                </a>
                                <a href="#"
                                    class="flex items-center gap-1 text-[#5556AB] text-sm font-semibold mr-1 cursor-pointer ml-1">
                                    | Send to All Via Mobile No.
                                </a>
                             @endif
                        </div>
                        @if ($selected_tab === 'list')
                           {{-- Filter dropdown --}}
                            <div class="flex justify-end">
                                <livewire:crm.email-marketing.birthday-filter>  
                            </div>
                        @endif
  
                    </div>

                    @if ($selected_tab === 'list')
                        {{-- Customer Records --}}
                        <livewire:crm.email-marketing.birthday-table>
                    @elseif ($selected_tab === 'message-list')
                        <livewire:crm.email-marketing.birthday-message-list>
                        {{-- Customization of Birthday Message --}}
                        {{-- <livewire:customer.birthday-message> --}}
                    @endif

                </div>

                <div class="flex justify-end gap-2 border-t pt-3">       
                    <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300" wire:click="close">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
