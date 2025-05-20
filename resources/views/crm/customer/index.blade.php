
<x-app-layout class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">

<div class="flex flex-1 flex-col ml-64 overflow-y-auto p-10 gap-7">

    <!-- Breadcrumbs-->
    <div class="flex items-center gap-x-1 text-blue-900 text-sm">
        <a href="/member" class="hover:underline">Customer Relationship Management</a>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
            <path fill-rule="evenodd"
                d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                clip-rule="evenodd" />
        </svg>
        <a href="#" class="hover:underline font-semibold">Contacts</a>
    </div>

    <!-- Title and Subtitle -->
    <div class="">
        <h1 class="text-2xl font-semibold text-blue-900">Customers</h1>
        <p class="text-gray-700 text-sm"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem aliquid, in minus voluptate optio illo suscipit possimus fuga explicabo necessitatibus aperiam vel at consequatur corrupti tempora sint veniam libero nisi.</p>
    </div>

    <!-- Options Container -->
    <div class=" rounded-md border-2 border-gray-100 bg-gray-50">
        <div class="flex h-14 border-b border-gray-200">
            <div class="w-32 border-b-2 border-blue-900 p-4 text-center">
                <a href="#" class="font-semibold text-blue-900 ">Contacts</a>
            </div>
            <div class="w-32 p-4 text-center">
                <a href="#" class="text-gray-600 hover:text-blue-800">Sub A</a>
            </div>
            <div class="w-32 p-4 text-center">
                <a href="#" class="text-gray-600 hover:text-blue-800">Sub B</a>
            </div>
            <div class="w-32 p-4 text-center">
                <a href="#" class="text-gray-600 hover:text-blue-800">Sub C</a>
            </div>
            <div class="w-32 p-4 text-center">
                <a href="#" class="text-gray-600 hover:text-blue-800">Sub D</a>
            </div>
            {{-- <div class="w-32 p-4 text-center">
                <a href="/organization" class="text-gray-600 hover:text-blue-800">Organizations</a>
            </div>
            <div class="w-32 p-4 text-center">
                <a href="/role" class="text-gray-600 hover:text-blue-800">Roles</a>
            </div>
            <div class="w-32 p-4 text-center">
                <a href="/module" class="text-gray-600 hover:text-blue-800">Modules</a>
            </div> --}}
            {{-- <div class="w-32 p-4 text-center">
                <a href="/permission" class="text-gray-600 hover:text-blue-800">Permissions</a>
            </div> --}}
        </div>

        <div class="flex items-center justify-between p-7">
            <div>
                <h2 class="font-semibold text-lg text-blue-900">List of all Customers</h2>
                <p class="text-gray-900 text-sm">Placeholder Text</p>
            </div>

            @php
              $selected_tab = "list";
            @endphp
            {{-- Birthday Reminder --}}
            <livewire:customer.birthday-reminder-modal :$selected_tab>
           
        </div>

        {{-- List of Customers --}}
        <div class="mx-7 mb-10 rounded-sm">
            <livewire:customer.customer-table>
        </div>
        
    </div>

</div>
</x-app-layout>