<x-app-layout class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">

<div class="flex flex-1 flex-col ml-64 overflow-y-auto p-10 gap-7">
    
    <!-- Title and Subtitle -->
    {{-- <div class="">
        <h1 class="text-2xl font-semibold text-blue-900">Contacts</h1>
        <p class="text-gray-700 text-sm"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem aliquid, in minus voluptate optio illo suscipit possimus fuga explicabo necessitatibus aperiam vel at consequatur corrupti tempora sint veniam libero nisi.</p>
    </div> --}}

    <!-- Options Container -->
    <div class=" rounded-md border-2 border-gray-100 bg-gray-50 ">
        <div class="flex h-14 border-b border-gray-200">
            <div class="w-32 p-4 text-center">
                <a href="{{ route('customer.index') }}" class="text-gray-600 ">Dashboard</a>
            </div>
            <div class="w-32 p-4 text-center border-b-2 border-blue-900">
                <a href="{{ route('contacts') }}" class="font-semibold text-blue-900  hover:text-blue-800">Members</a>
            </div>
            <div class=" p-4 text-center">
                <a href="{{ route('email-marketing') }}" class="text-gray-600 hover:text-blue-800">Email Marketing</a>
            </div>
            <div class="w-32 p-4 text-center">
                <a href="{{ route('corporate') }}" class="text-gray-600 hover:text-blue-800">Corporate</a>
            </div>
            <div class="p-4 text-center">
                <a href="{{ route('sales-tracking') }}" class="text-gray-600 hover:text-blue-800">Sales Tracking</a>
            </div>
        </div>

         <!-- Breadcrumbs-->
        <div class="flex items-center gap-x-1 text-blue-900 text-sm px-7 pt-5">
            <a href="{{ route('customer.index') }}" class="hover:underline">Customer Relationship Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="{{ route('contacts') }}" class="hover:underline font-semibold">Members</a>
        </div>

        <div class="flex items-center justify-between p-7 pt-3">
            <div>
                <h2 class="font-semibold text-lg text-blue-900">List of all Members</h2>
                <p class="text-gray-900 text-sm">Placeholder Text</p>
            </div>
        </div>

        {{-- List of Customers --}}
        <div class="mx-7 mb-10 rounded-sm">
            <livewire:crm.customer.customer-table>
        </div>
    </div>

</div>
</x-app-layout>