<x-app-layout class='flex flex-row min-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    @php
        $navbar_selected = 'None';
    @endphp
    @include('layouts.navbar')
    <div class="@container/main flex flex-1 flex-col ml-52 overflow-y-auto p-10 gap-3.5 bg-[#f3f4f6] mt-10">
        <header>
            <h2 class="text-2xl font-medium text-[#151847]">Profile Information</h2>
            <h4 class="text-lg font-light text-[#151847]">View and edit your personal details, username, and password</h4>
        </header>
        <hr>
        <main class="space-y-6">
            <section class="space-y-1.5">
                <h5 class="text-lg font-medium text-[#151847]">Personal Details</h5>
                <div class="p-5 bg-blue-100 rounded-xl space-y-8 @lg/main:space-y-14">
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full place-content-center @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Profile Image</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Choose a new image to display as your
                                    profile photo.</em></p>
                        </div>
                        <div class="w-full max-w-4xl @lg/main:w-[65%]">
                            <div
                                class="group/image  relative size-[104px] m-auto cursor-pointer *:transition-colors @lg:m-0">
                                <img src="data:image/svg+xml;utf-8,<svg xmlns='http://www.w3.org/2000/svg' width='107' height='107' viewBox='0 0 107 107' fill='none'><path d='M88.75 89.25H89.25V88.75V82.875C89.25 79.7557 87.6871 77.0261 85.2382 74.7091C82.7917 72.3943 79.4274 70.4566 75.7249 68.9015C68.3218 65.7922 59.4436 64.1625 53.5 64.1625C47.5564 64.1625 38.6782 65.7922 31.2751 68.9015C27.5726 70.4566 24.2083 72.3943 21.7618 74.7091C19.3129 77.0261 17.75 79.7557 17.75 82.875V88.75V89.25H18.25H88.75ZM1.125 94.625V12.375C1.125 6.18701 6.13152 1.125 12.375 1.125H94.625C100.811 1.125 105.875 6.18864 105.875 12.375V94.625C105.875 100.811 100.811 105.875 94.625 105.875H12.375C6.13152 105.875 1.125 100.813 1.125 94.625ZM53.5 54C63.5286 54 71.625 45.9036 71.625 35.875C71.625 25.8464 63.5286 17.75 53.5 17.75C43.4714 17.75 35.375 25.8464 35.375 35.875C35.375 45.9036 43.4714 54 53.5 54Z' fill='%23CBD5E1' stroke='%239CA3AF'/></svg>"
                                    alt="profile image" class="size-full outline outline-2 outline-blue-100 rounded-xl">
                                <div
                                    class="absolute -right-1.5 -bottom-1.5 size-[24px] grid place-items-center rounded-full outline outline-2 outline-blue-100 bg-blue-600 group-hover/image:bg-blue-700 group-active/image:bg-blue-900">
                                    <svg class="size-[45%]" viewBox="0 0 13 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.236328 9.90787V12.4842H2.81266L10.4111 4.88573L7.8348 2.30939L0.236328 9.90787ZM12.4035 2.89336C12.6714 2.62542 12.6714 2.1926 12.4035 1.92466L10.7959 0.317028C10.5279 0.0490889 10.0951 0.0490889 9.82717 0.317028L8.56992 1.57428L11.1463 4.15062L12.4035 2.89336V2.89336Z"
                                            fill="white" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full place-content-center @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Full Name</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Update your complete name if needed to
                                    ensure accurate account details.</em></p>
                        </div>
                        <div
                            class="w-full max-w-4xl flex flex-col justify-between gap-6 @lg/main:w-[65%] @2xl/main:flex-row">
                            <div class="space-y-1 flex-1">
                                <label class="hidden text-aapblue @lg/main:block" for="first">First Name</label>
                                <input class="profile_edit_input" type="text" name="first" id="first"
                                    placeholder="Enter your first name">
                            </div>
                            <div class="space-y-1 flex-1">
                                <label class="hidden text-aapblue @lg/main:block" for="middle">Middle Name</label>
                                <input class="profile_edit_input" type="text" name="middle" id="middle"
                                    placeholder="Enter your middle name">
                            </div>
                            <div class="space-y-1 flex-1">
                                <label class="hidden text-aapblue @lg/main:block" for="last">Last Name</label>
                                <input class="profile_edit_input" type="text" name="last" id="last"
                                    placeholder="Enter your last name">
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full place-content-center @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Email</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Enter an active address for important
                                    communications.</em></p>
                        </div>
                        <div class="w-full max-w-4xl @lg/main:w-[65%]">
                            <input class="profile_edit_input w-full @lg/main:w-1/2" type="email" name="email"
                                id="email" placeholder="e.g., john.doe@example.com">
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full place-content-center @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Contact Number</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Enter your current phone number.</em></p>
                        </div>
                        <div class="w-full max-w-4xl @lg/main:w-[65%]">
                            <input class="profile_edit_input w-full @lg/main:w-1/2" type="tel" name="contactnum"
                                id="contactnum" placeholder="e.g., +63 912 345 6789">
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full place-content-center @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Address</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Provide your complete physical location
                                    including building number, street name, and unit/apartment information.</em></p>
                        </div>
                        <div class="w-full max-w-4xl @lg/main:w-[65%]">
                            <textarea class="profile_edit_input w-full resize-none" name="address" id="address" cols="20" rows="3"
                                placeholder="Type your full address"></textarea>
                        </div>
                    </div>
                </div>
            </section>
            <section class="space-y-1.5">
                <h5 class="text-lg font-medium">User Authentication</h5>
                <div class="p-5 bg-blue-100 rounded-xl space-y-8 @lg/main:space-y-14">
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full place-content-center @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Username</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Create the personal handle that you'll
                                    use to log in and access your account.</em></p>
                        </div>
                        <div class="w-full max-w-4xl @lg/main:w-[65%]">
                            <input class="profile_edit_input w-full @lg/main:w-1/2" type="text" name="username"
                                id="username" placeholder="Enter a unique username">
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full place-content-center @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Password</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Set up your personal security phrase
                                    with at least 8 characters.</em></p>
                        </div>
                        <div class="w-full max-w-4xl @lg/main:w-[65%]">
                            <div class="relative w-full @lg/main:w-1/2">
                                <input class="profile_edit_input w-full pr-9" type="password" name="password"
                                    id="password" placeholder="Enter a strong password">
                                <div
                                    class="group/seepwd absolute top-0 right-0 h-full grid place-items-center aspect-square rounded-r-lg bg-sky-100 cursor-pointer transition-colors hover:bg-sky-200">
                                    <svg class="size-5 fill-sky-700 group-hover/seepwd:fill-sky-800 group-active/seepwd:fill-sky-900"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                    </svg>
                                    {{-- Eye slash icon --}}
                                    {{-- <svg class="size-5 fill-sky-700 group-hover/seepwd:fill-sky-800 group-active/seepwd:fill-sky-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-center justify-between gap-3 @lg/main:flex-row @lg/main:gap-[4.5rem]">
                        <div class="w-full place-content-center @lg/main:w-[35%]">
                            <h6 class="text-base font-medium leading-relaxed tracking-wide text-[#151847]">Confirm Password</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Re-enter your password exactly as above
                                    to confirm.</em></p>
                        </div>
                        <div class="w-full max-w-4xl @lg/main:w-[65%]">
                            <div class="relative w-full @lg/main:w-1/2">
                                <input class="profile_edit_input w-full pr-9" type="password" name="confpassword"
                                    id="confpassword" placeholder="Confirm your password">
                                <div
                                    class="group/seepwd absolute top-0 right-0 h-full grid place-items-center aspect-square rounded-r-lg bg-sky-100 cursor-pointer transition-colors hover:bg-sky-200">
                                    <svg class="size-5 fill-sky-700 group-hover/seepwd:fill-sky-800 group-active/seepwd:fill-sky-900"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                    </svg>
                                    {{-- Eye slash icon --}}
                                    {{-- <svg class="size-5 fill-sky-700 group-hover/seepwd:fill-sky-800 group-active/seepwd:fill-sky-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="flex justify-end gap-4">
                <button
                    class="px-5 py-2 rounded-lg ring-0 ring-gray-300 hover:bg-gray-200 hover:ring-2 active:bg-gray-300 bg-gray-300">Cancel</button>
                <button type="submit"
                    class="flex gap-1 justify-center items-center px-6 py-2 bg-amber-300 rounded-lg ring-0 ring-amber-500 transition-colors hover:ring-1 hover:bg-amber-400 hover:shadow-xl active:bg-amber-500">
                    <p>Save changes</p>
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 256 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path
                            d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z" />
                    </svg>
                </button>
            </div>
        </main>
    </div>
</x-app-layout>

