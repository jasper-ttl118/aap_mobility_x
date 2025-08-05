<x-app-layout  class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
  <div x-data="{ open_email: false, view_edit: false }">

        <div class="flex flex-1 flex-col lg:ml-52 lg:p-10 lg:gap-7 hide-scrollbar bg-[#f3f4f6]"> 
            <!-- Options Container -->
            <div class="flex justify-center w-full">
                <div class="mx-5 lg:mx-0 mt-16 lg:mt-5 lg:-mb-5 overflow-y-auto hide-scrollbar rounded-md border-2 border-gray-100 bg-white shadow-md w-[90%] lg:w-full">
                    <div class="flex min-w-[600px] lg:min-w-0">
                        <x-crm.submodules selected='Email Marketing'/>
                    </div>
                </div>
            </div>

            <!-- Breadcrumbs-->
            <div class="flex h-10 items-center gap-x-1 text-blue-900 text-sm px-12 lg:px-7 pt-5 lg:pt-0 pb-3 w-full lg:-mb-8 md:ml-20 lg:ml-0">
                <a href="{{ route('customer.index') }}" class="hover:underline text-[#071d49] font-inter truncate">Customer Relationship Management</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                        clip-rule="evenodd" />
                </svg>
                <a href="{{ route('email-marketing') }}" class="hover:underline text-[#071d49] font-inter truncate">Email Marketing</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                        clip-rule="evenodd" />
                </svg>
                <a href="{{ route('message-template') }}" class="hover:underline font-semibold text-[#071d49] font-inter truncate">Compose Email</a>
            </div>

            {{-- Tab Buttons (Celebrant List, Message Template, etc) --}}
            <x-email-marketing.tab-buttons />

            <div class="flex w-full justify-center items-center mt-4 lg:mt-0">
                <div class="flex flex-col w-full justify-center gap-y-4 items-center">
                    <div class="flex items-start justify-between px-1 w-[90%] lg:w-full">
                        <div class="flex items-start">
                            <h2 class="font-extrabold text-xl uppercase tracking-widest text-[#071d49] font-inter">Choose A Message Template</h2>
                        </div>

                        <button @click="open_email=true" class="flex items-center bg-[#071d49] rounded-lg py-1 text-white gap-x-2 px-3 justify-center hover:bg-white hover:text-[#071d49] hover:border hover:scale-105 duration-300 transform border-[#071d49]">
                            <span class="text-2xl leading-none mb-[2px] font-semibold">+</span>
                            <span class="font-semibold mr-1">Compose New Email</span>
                        </button>
                    </div>

                    <div class="gap-y-10 w-[90%] lg:w-full flex flex-col justify-center items-center">
                        {{-- Carousel template --}}
                        <div class="carousel carousel-center bg-[#abcae9] w-full rounded-box space-x-4 p-2 border-2 border-[#071d49]">
                            <div class="carousel-item">
                                <div class="flex flex-col border-2 rounded-lg bg-[#071d49] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#071d49] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#071d49]" @click="view_edit=true">Use Template -></button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="flex flex-col border-2 rounded-lg bg-[#071d49] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#071d49] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#071d49]" @click="view_edit=true">Use Template -></button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="flex flex-col border-2 rounded-lg bg-[#071d49] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#071d49] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#071d49]" @click="view_edit=true">Use Template -></button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="flex flex-col border-2 rounded-lg bg-[#071d49] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#071d49] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#071d49]" @click="view_edit=true">Use Template -></button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="flex flex-col border-2 rounded-lg bg-[#071d49] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#071d49] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#071d49]" @click="view_edit=true">Use Template -></button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="flex flex-col border-2 rounded-lg bg-[#071d49] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#071d49] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#071d49]" @click="view_edit=true">Use Template -></button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="flex flex-col border-2 rounded-lg bg-[#071d49] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#071d49] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#071d49]" @click="view_edit=true">Use Template -></button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="flex flex-col border-2 rounded-lg bg-[#071d49] h-[320px] lg:h-[270px] w-[210px] lg:w-[235px] flex-none p-5 gap-y-4">
                                    <h1 class="text-white font-semibold">Message Template 1</h1>
                                    <p class="text-white whitespace-pre-line text-xs">💥 A Special Surprise Just for You, [Customer Name]! 💥

                                        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
                                        Use code [Coupon Code] at ...
                                    </p>
                                    <button class="hover:bg-[#F6D400] hover:text-[#071d49] hover:border border-white hover:scale-105 duration-300 transform bg-white p-2 rounded-lg font-semibold text-[#071d49]" @click="view_edit=true">Use Template -></button>
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
            <livewire:toast.toast />
        </div>
     </div>
</x-app-layout>