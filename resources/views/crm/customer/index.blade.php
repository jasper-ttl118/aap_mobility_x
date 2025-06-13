<x-app-layout class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    <div x-data="{open_profile : false, open_email : false, open_mobile : false }" class="flex flex-1 flex-col lg:ml-52 lg:p-10 lg:gap-7 hide-scrollbar bg-[#f3f4f6]">
        
        <!-- Title and Subtitle -->
        {{-- <div class="">
            <h1 class="text-2xl font-semibold text-blue-900">Contacts</h1>
            <p class="text-gray-700 text-sm"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem aliquid, in minus voluptate optio illo suscipit possimus fuga explicabo necessitatibus aperiam vel at consequatur corrupti tempora sint veniam libero nisi.</p>
        </div> --}}

        <!-- Options Container -->
        <div class="mx-5 lg:mx-0 mt-16 lg:mt-5 lg:-mb-5 overflow-y-auto hide-scrollbar rounded-md border-2 h-[78px] lg:h-[76px] border-gray-100 bg-white shadow-md w-[440px] lg:w-full">
                <div class="flex min-w-[600px] lg:min-w-0">
                    <div class="flex-none w-32 p-4 text-center">
                        <a href="{{ route('customer.index') }}" class=" text-gray-600 hover:text-blue-800">Dashboard</a>
                    </div>
                    <div class="flex-none w-32 font-semibold border-b-2 border-blue-900 p-4 text-center">
                        <a href="{{ route('contacts') }}" class="text-[#151848] hover:text-blue-800">Members</a>
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
        <div class="flex h-10 items-start gap-x-1 text-blue-900 text-sm px-12 lg:px-7 pt-2 lg:pt-0 lg:-mb-8">
            <a href="{{ route('customer.index') }}" class="hover:underline text-[#151848]">Customer Relationship Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="{{ route('contacts') }}" class="hover:underline text-[#151848] font-semibold">Members</a>
        </div>

        {{-- Members list table --}}
        <livewire:crm.customer.customer-table>

        <div x-show="open_profile" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <livewire:crm.customer.member-profile />
        </div>

        <div x-show="open_email" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <livewire:crm.email-marketing.compose-new-email />
        </div> 

        <div x-show="open_mobile" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <livewire:crm.email-marketing.compose-new-mobile-message />
        </div> 

        <div class="fixed top-14 right-10 z-50 space-y-2 w-[300px]">
            <livewire:toast.toast />
        </div>
    </div>
</x-app-layout>