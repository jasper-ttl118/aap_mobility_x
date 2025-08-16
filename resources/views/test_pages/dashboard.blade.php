<x-app-layout class='flex flex-row w-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='Dashboard'>

    {{-- @php
        $navbar_selected = 'Dashboard';
    @endphp
    @include('layouts.navbar') --}}

    {{-- <!-- Main Container -->
    <div class="flex flex-col flex-1 ml-64 overflow-y-auto">
        <!-- Title and Subtitle -->
        <div class="space-y-2 p-7">
            <h1 class="text-xl font-bold uppercase">RBAC Management</h1>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
        </div>

        <!-- Options Container -->
        <div class="bg-gray-100 rounded-sm mx-7">
            <div class="flex border-b border-gray-200 h-14">
                <div class="w-32 p-4 text-center border-b-2 border-blue-500">
                    <a href="#" class="font-medium text-blue-700">Users</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="#" class="text-gray-600 hover:text-blue-500">Organizations</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="#" class="text-gray-600 hover:text-blue-500">Roles</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="#" class="text-gray-600 hover:text-blue-500">Modules</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="#" class="text-gray-600 hover:text-blue-500">Permissions</a>
                </div>
            </div>

            <div class="flex items-center justify-between p-7">
                <div>
                    <h2 class="font-bold">Manage Users</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div>
                    <button class="p-2 text-white bg-blue-900 rounded-sm">Add new user</button>
                </div>
            </div>

            <div class="mb-10 bg-gray-200 rounded-sm mx-7 h-96"></div>
        </div>
    </div>
    </div> --}}

    <div
        class="flex flex-col w-full lg:ml-52 overflow-y-auto bg-[url('/public/build/assets/bgdiv.jpg')] bg-cover bg-[#f3f4f6] mt-10 bg-center p-10">
        <div class="flex justify-center w-auto h-30 lg:justify-start">
            <div
                class="flex flex-row items-center text-3xl font-bold text-transparent bg-gradient-to-r from-sky-500 to-blue-900 bg-clip-text">
                Welcome, {{ $users->employee->employee_firstname }} {{ $users->employee->employee_lastname }}!
                <img class="w-10 h-10 mx-2"
                    src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExb2I3ZmR2aXY5eW41MDR5djB4MGd6ZjBiN21rYTEzdmh0emtwMXk4YyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/IpM4kYGnxqmE02P9rr/giphy.gif"
                    alt="">
            </div>
        </div>

        <div class="flex flex-col items-center justify-center w-auto h-auto lg:flex-row">

            <div
                class="flex items-center justify-center w-full h-40 p-5 m-5 space-x-5 border-2 border-r-4 border-gray-300 rounded-md shadow border-r-indigo-900 bg-gray-50 shadow-stone-100">
                <div class="text-6xl font-medium text-indigo-900">125</div>
                <div class="flex flex-col">
                    <div class="font-bold text-indigo-900">Number of Sales</div>
                    <div class="text-xs text-blue-600 text-wrap">10% increase</div>
                </div>
            </div>

            <div
                class="flex items-center justify-center w-full h-40 p-5 m-5 space-x-5 border-2 border-r-4 border-gray-300 rounded-md shadow border-r-green-900 bg-gray-50 shadow-stone-100">
                <div class="text-6xl font-medium text-green-900">10%</div>
                <div class="flex flex-col">
                    <div class="font-bold text-green-900">Revenue</div>
                    <div class="text-xs text-green-600 text-wrap">Subtitle</div>
                </div>
            </div>

            <div
                class="flex items-center justify-center w-full h-40 p-5 m-5 space-x-5 border-2 border-r-4 border-gray-300 rounded-md shadow border-r-red-700 bg-gray-50 shadow-stone-100">
                <div class="text-6xl font-medium text-red-600">12%</div>
                <div class="flex flex-col">
                    <div class="font-bold text-red-600">Net Loss</div>
                    <div class="text-xs text-red-600 text-wrap">with 10% Neg Threashold</div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-center gap-2 p-2 mt-10">
            <div class="h-auto rounded-lg shadow w-96 bg-gray-50 shadow-gray-400">
                <div class="h-22 w-96">
                    <img src="https://images.pexels.com/photos/161251/senso-ji-temple-japan-kyoto-landmark-161251.jpeg"
                        alt="" class="object-cover object-bottom rounded-t-lg h-72 w-96" />
                </div>
                <div class="p-7">
                    <h1 class="py-3 text-2xl font-bold text-red-600">TOKYO</h1>
                    <p class="h-32">Japan’s busy capital, mixes the ultramodern and the traditional, from neon-lit
                        skyscrapers to historic temples. The opulent Meiji Shinto Shrine is known for its towering gate
                        and surrounding woods.</p>
                    <div class="my-8">
                        <a href="https://www.gotokyo.org/en/index.html"
                            class="p-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-950">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="h-auto rounded-lg shadow w-96 bg-gray-50 shadow-gray-400">
                <div class="h-72 w-96">
                    <img src="https://images.pexels.com/photos/12061667/pexels-photo-12061667.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        alt="" class="object-cover object-bottom rounded-t-lg h-72 w-96" />
                </div>
                <div class="p-7">
                    <h1 class="py-3 text-2xl font-bold text-blue-600">SEOUL</h1>
                    <p class="h-32">The capital of South Korea, is a huge metropolis where modern skyscrapers,
                        high-tech subways and pop culture meet Buddhist temples, palaces and street markets..</p>
                    <div class="my-8">
                        <a href="https://www.britannica.com/place/Seoul"
                            class="p-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-950">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="h-auto rounded-lg shadow w-96 bg-gray-50 shadow-gray-400">
                <div class="h-72 w-96">
                    <img src="https://images.pexels.com/photos/7039842/pexels-photo-7039842.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        alt="" class="object-cover object-center rounded-t-lg h-72 w-96" />
                </div>
                <div class="p-7">
                    <h1 class="py-3 text-2xl font-bold text-green-600">MANILA</h1>
                    <p class="h-32">the capital of the Philippines, is a densely populated bayside city on the island
                        of Luzon, which mixes Spanish colonial architecture with modern skyscrapers.</p>
                    <div class="my-8">
                        <a href="https://www.britannica.com/place/Manila"
                            class="p-2 font-medium text-white bg-green-600 rounded-md hover:bg-blue-950">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

    </div>



    </div>
    </div>
</x-app-layout>
