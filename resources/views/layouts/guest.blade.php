<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col w-screen h-screen font-sans antialiased text-gray-900 landscape:flex-row md:flex-row lg:flex-row">
    <div class="bg-gradient-to-b from-[#071d49] to-[#333AAD] h-[30%] md:h-full md:w-[50%] w-full landscape:h-full lg:w-[50%] lg:h-full flex justify-center items-center">
        <img class="flex w-[30%] md:w-[40%] lg:w-[60%] animate-fadeInUp duration-1000" src="aap-logo.png" alt="aaplogo">
    </div>
    {{-- <div class="h-[30%] md:h-full md:w-[50%] w-full landscape:h-full lg:w-[50%] lg:h-full flex  justify-center items-center">
        <img class="flex absolute w-[20%] md:w-[30%] lg:w-[30%] animate-spin duration-1000" src="aap-logo.png" alt="aaplogo">
        <video autoplay loop class="object-cover w-full h-full ">
            <source src="wala.mp4" type="video/mp4" />
        </video>
    </div> --}}
    <div class="w-full h-[70%] md:w-[50%] md:h-full lg:w-[50%] lg:h-full flex flex-col justify-center landscape:h-full items-center bg-[#f3f4f6]">
        <div class="flex flex-col items-center justify-center w-full h-full">
            {{ $slot }}
        </div>
    </div>
    {{-- <div class="w-full h-[70%] md:w-[50%] md:h-full lg:w-[50%] lg:h-full flex flex-col justify-center landscape:h-full items-center bg-[#f3f4f6] gap-0">

        <div class="w-full h-full lg:h-[50%] flex flex-col justify-center items-center">
            {{ $slot }}
        </div>
    </div> --}}
</body>

</html>
