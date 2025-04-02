<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organizations</title>
    @include('layouts.icons')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body class="flex flex-row min-h-screen" x-data="{ open: false, deleteUrl: '', viewOpen: false, employee: {} }">
   
    @include('layouts.navbar')
    <div class="flex flex-1 flex-col ml-64 overflow-y-auto p-10 gap-7">
        <header>
            <h2 class="text-2xl font-medium">Profile Information</h2>
            <h4 class="text-lg font-light">View and edit your personal details, username, and password</h4>
        </header>
        <main>
            <section class="space-y-1.5">
                <h5 class="text-base font-semibold">Personal Details</h5>
                <div class="@container p-5 bg-blue-100 rounded-xl space-y-8">
                    <div class="flex gap-[4.5rem] justify-between">
                        <div class="w-[35%] place-content-center">
                            <h6 class="text-base font-medium leading-relaxed">Profile Image</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Choose a new image to display as your profile photo.</em></p>
                        </div>
                        <div class="w-[65%] max-w-4xl">
                            <div class="group/image relative size-[98px] cursor-pointer *:transition-colors">
                                <img src="data:image/svg+xml;utf-8,<svg xmlns='http://www.w3.org/2000/svg' width='107' height='107' viewBox='0 0 107 107' fill='none'><path d='M88.75 89.25H89.25V88.75V82.875C89.25 79.7557 87.6871 77.0261 85.2382 74.7091C82.7917 72.3943 79.4274 70.4566 75.7249 68.9015C68.3218 65.7922 59.4436 64.1625 53.5 64.1625C47.5564 64.1625 38.6782 65.7922 31.2751 68.9015C27.5726 70.4566 24.2083 72.3943 21.7618 74.7091C19.3129 77.0261 17.75 79.7557 17.75 82.875V88.75V89.25H18.25H88.75ZM1.125 94.625V12.375C1.125 6.18701 6.13152 1.125 12.375 1.125H94.625C100.811 1.125 105.875 6.18864 105.875 12.375V94.625C105.875 100.811 100.811 105.875 94.625 105.875H12.375C6.13152 105.875 1.125 100.813 1.125 94.625ZM53.5 54C63.5286 54 71.625 45.9036 71.625 35.875C71.625 25.8464 63.5286 17.75 53.5 17.75C43.4714 17.75 35.375 25.8464 35.375 35.875C35.375 45.9036 43.4714 54 53.5 54Z' fill='%23CBD5E1' stroke='%239CA3AF'/></svg>" alt="profile image" class="size-full">
                                <div class="absolute -right-1.5 -bottom-1.5 size-[24px] grid place-items-center rounded-full outline outline-2 outline-blue-100 bg-blue-600 group-hover/image:bg-blue-700 group-active/image:bg-blue-900">
                                    <svg class="size-[45%]" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.236328 9.90787V12.4842H2.81266L10.4111 4.88573L7.8348 2.30939L0.236328 9.90787ZM12.4035 2.89336C12.6714 2.62542 12.6714 2.1926 12.4035 1.92466L10.7959 0.317028C10.5279 0.0490889 10.0951 0.0490889 9.82717 0.317028L8.56992 1.57428L11.1463 4.15062L12.4035 2.89336V2.89336Z" fill="white"/>
                                    </svg>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-[4.5rem] justify-between">
                        <div class="w-[35%] place-content-center">
                            <h6 class="text-base font-medium leading-relaxed">Full Name</h6>
                            <p class="text-sm text-gray-600 leading-tight"><em>Update your complete name if needed to ensure accurate account details.</em></p>
                        </div>
                        <div class="flex justify-between w-[65%] max-w-4xl gap-6">
                            <div class="space-y-0.5 flex-1">
                                <label for="first">First Name</label>
                                <input class="profile_edit_input" type="text" name="first" id="first" placeholder="Enter your first name">
                            </div>
                            <div class="space-y-0.5 flex-1">
                                <label for="middle">Middle Name</label>
                                <input class="profile_edit_input" type="text" name="middle" id="middle" placeholder="Enter your middle name">
                            </div>
                            <div class="space-y-0.5 flex-1">
                                <label for="last">Last Name</label>
                                <input class="profile_edit_input" type="text" name="last" id="last" placeholder="Enter your last name">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="flex gap-4">
                        <div class="w-auto"></div>
                        <div class="w-[70%]"></div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-auto"></div>
                        <div class="w-[70%]"></div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-auto"></div>
                        <div class="w-[70%]"></div>
                    </div> --}}
                </div>
            </section>
        </main>
    </div>
</body>

</html>
