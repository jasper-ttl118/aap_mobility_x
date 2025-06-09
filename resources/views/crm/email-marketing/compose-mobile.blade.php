<x-app-layout  class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
  <div x-data="{ open: false, view_edit: false }">

        <div class="flex flex-1 flex-col lg:ml-64 lg:p-10 lg:gap-7 hide-scrollbar bg-[#f3f4f6]"> 
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
                <a href="{{ route('email-marketing') }}" class="hover:underline text-[#151848] font-inter">Email Marketing</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                        clip-rule="evenodd" />
                </svg>
                <a href="{{ route('message-template') }}" class="hover:underline font-semibold text-[#151848] font-inter">Compose Message</a>
            </div>

            {{-- Tab Buttons (Celebrant List, Message Template, etc) --}}
            <x-email-marketing.tab-buttons />

            <div class="flex flex-col w-[440px] -mt-2 pt-4 lg:w-full lg:ml-0 lg:px-0 px-5 justify-center gap-y-4">
                <div class="flex items-start justify-between">
                    <div class="flex items-start">
                        <h2 class="font-semibold text-2xl text-[#151848] font-inter">Choose A Message Template</h2>
                    </div>

                    <button @click="open=true" class="flex items-center bg-[#151848] rounded-lg py-1 text-white gap-x-2 px-3 justify-center">
                        <span class="text-2xl leading-none mb-[2px] font-semibold">+</span>
                        <span class="font-semibold mr-1">Compose New Message</span>
                    </button>
                </div>

                <div class="flex flex-wrap gap-y-6 w-full justify-between">
                    <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[270px] w-[235px] flex-none p-5 gap-y-4">
                        <h1 class="text-white font-semibold">Message Template 1</h1>
                        <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                            We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                            Use code [Coupon Code] at ...
                        </p>
                        <button class="bg-white p-2 rounded-lg font-semibold" @click="view_edit=true">Use Template -></button>
                    </div>
                    <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[270px] w-[235px] flex-none p-5 gap-y-4">
                        <h1 class="text-white font-semibold">Message Template 1</h1>
                        <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                            We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                            Use code [Coupon Code] at ...
                        </p>
                        <button class="bg-white p-2 rounded-lg font-semibold" @click="view_edit=true">Use Template -></button>
                    </div>
                    <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[270px] w-[235px] flex-none p-5 gap-y-4">
                        <h1 class="text-white font-semibold">Message Template 1</h1>
                        <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                            We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                            Use code [Coupon Code] at ...
                        </p>
                        <button class="bg-white p-2 rounded-lg font-semibold" @click="view_edit=true">Use Template -></button>
                    </div>
                    <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[270px] w-[235px] flex-none p-5 gap-y-4">
                        <h1 class="text-white font-semibold">Message Template 1</h1>
                        <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                            We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                            Use code [Coupon Code] at ...
                        </p>
                        <button class="bg-white p-2 rounded-lg font-semibold" @click="view_edit=true">Use Template -></button>
                    </div>
                    <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[270px] w-[235px] flex-none p-5 gap-y-4">
                        <h1 class="text-white font-semibold">Message Template 1</h1>
                        <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                            We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                            Use code [Coupon Code] at ...
                        </p>
                        <button class="bg-white p-2 rounded-lg font-semibold" @click="view_edit=true">Use Template -></button>
                    </div>
                    <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[270px] w-[235px] flex-none p-5 gap-y-4">
                        <h1 class="text-white font-semibold">Message Template 1</h1>
                        <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                            We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                            Use code [Coupon Code] at ...
                        </p>
                        <button class="bg-white p-2 rounded-lg font-semibold" @click="view_edit=true">Use Template -></button>
                    </div>
                    <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[270px] w-[235px] flex-none p-5 gap-y-4">
                        <h1 class="text-white font-semibold">Message Template 1</h1>
                        <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                            We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                            Use code [Coupon Code] at ...
                        </p>
                        <button class="bg-white p-2 rounded-lg font-semibold" @click="view_edit=true">Use Template -></button>
                    </div>
                    <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[270px] w-[235px] flex-none p-5 gap-y-4">
                        <h1 class="text-white font-semibold">Message Template 1</h1>
                        <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                            We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                            Use code [Coupon Code] at ...
                        </p>
                        <button class="bg-white p-2 rounded-lg font-semibold" @click="view_edit=true">Use Template -></button>
                    </div>
                </div>
            </div>

        </div>

        <div x-show="open" x-cloak x-transition class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div @click.away="open = false" >
                <livewire:crm.email-marketing.compose-new-email />
            </div>
        </div> 

        <div x-show="view_edit" x-cloak x-transition class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div @click.away="view_edit = false" class="bg-white p-6 rounded-md shadow-lg max-w-4xl w-[90%]">
                <livewire:crm.email-marketing.use-template />
            </div>
        </div>
        
        <div class="fixed top-14 right-10 z-50 space-y-2 w-[300px]">
            <livewire:crm.email-marketing.success-toast />
        </div>
     </div>
</x-app-layout>