<x-app-layout  class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
  <div x-data="{ open_email: false, view_edit: false }">

        <div class="flex flex-1 flex-col lg:ml-52 lg:p-10 lg:gap-7 hide-scrollbar bg-[#f3f4f6]"> 
            <!-- Options Container -->
            <div class="flex md:justify-center w-full">
                <div class="mx-5 lg:mx-0 mt-16 lg:mt-5 lg:-mb-5 overflow-y-auto hide-scrollbar rounded-md border-2 border-gray-100 bg-white shadow-md w-[440px] md:w-[80%] lg:w-full">
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
            </div>

            <!-- Breadcrumbs-->
            <div class="flex h-7 items-start gap-x-1 text-blue-900 text-sm px-12 lg:px-7 pt-2 lg:pt-0 lg:-mb-8 md:ml-20 lg:ml-0">
                <a href="{{ route('customer.index') }}" class="hover:underline text-[#151848] font-inter truncate">Customer Relationship Management</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                        clip-rule="evenodd" />
                </svg>
                <a href="{{ route('email-marketing') }}" class="hover:underline text-[#151848] font-inter truncate">Email Marketing</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                        clip-rule="evenodd" />
                </svg>
                <a href="{{ route('message-template') }}" class="hover:underline font-semibold text-[#151848] font-inter truncate">Compose Email</a>
            </div>

            {{-- Tab Buttons (Celebrant List, Message Template, etc) --}}
            <x-email-marketing.tab-buttons />

            <div class="flex md:w-full md:justify-center md:-ml-2.5 lg:ml-0">
                <div class="flex flex-col w-[440px]  lg:-mt-8 pt-4 lg:w-full lg:ml-0 lg:px-0 px-5 justify-center gap-y-4">
                    <div class="flex items-start justify-between px-1 w-[440px] lg:w-full">
                        <div class="flex items-start ml-1">
                            <h2 class="font-semibold text-2xl text-[#151848] font-inter">Choose A Message Template</h2>
                        </div>

                        <button @click="open_email=true" class="flex items-center bg-[#151848] rounded-lg py-1 text-white gap-x-2 px-3 justify-center hover:bg-white hover:text-[#151847] hover:border hover:scale-105 duration-300 transform border-[#151847]">
                            <span class="text-2xl leading-none mb-[2px] font-semibold">+</span>
                            <span class="font-semibold mr-1">Compose New Email</span>
                        </button>
                    </div>

                    <div class="gap-y-10 w-[440px] lg:w-full flex flex-col justify-center items-center">
                        {{-- First Half --}}
                        <div class="flex flex-col lg:flex-row w-[440px] lg:w-full gap-x-10 gap-y-5 justify-center items-center">
                            <div class="flex flex-row w-full justify-between">
                                <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#151847] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#151848]" @click="view_edit=true">Use Template -></button>
                                </div>
                                <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#151847] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#151848]" @click="view_edit=true">Use Template -></button>
                                </div>
                            </div>
                            <div class="flex flex-row w-full justify-between">
                                <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#151847] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#151848]" @click="view_edit=true">Use Template -></button>
                                </div>
                                <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#151847] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#151848]" @click="view_edit=true">Use Template -></button>
                                </div>
                            </div>
                        </div>
                        {{-- Second Half --}}
                        <div class="flex flex-col lg:flex-row w-[440px] lg:w-full gap-x-10 gap-y-5 justify-center items-center">
                            <div class="flex flex-row w-full justify-between">
                                <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#151847] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#151848]" @click="view_edit=true">Use Template -></button>
                                </div>
                                <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#151847] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#151848]" @click="view_edit=true">Use Template -></button>
                                </div>
                            </div>
                            <div class="flex flex-row w-full justify-between">
                                <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#151847] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#151848]" @click="view_edit=true">Use Template -></button>
                                </div>
                                <div class="flex flex-col border-2 rounded-lg bg-[#151848] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#151847] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#151848]" @click="view_edit=true">Use Template -></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div x-show="open_email" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                <livewire:crm.email-marketing.compose-new-email />
        </div> 

        <div x-show="view_edit" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <livewire:crm.email-marketing.use-template />
        </div>

        <div class="fixed top-14 right-10 z-50 space-y-2 w-[300px]">
            <livewire:crm.email-marketing.success-toast />
        </div>
     </div>
</x-app-layout>