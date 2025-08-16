<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AAP Mobility X</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="flex flex-col h-auto font-inter">
        <header class="fixed top-0 z-50 flex-row items-start justify-between w-screen h-16 text-black bg-white shadow-lg">
            <div class="flex items-center justify-between h-full">
        
                <a href="#" class="flex items-center">
                    <img src="{{ asset('aap-logo.png') }}" alt="logo" class="ml-12 h-[65px] object-contain">
                </a>
            
                <button id="menu-toggle" class="mx-10 text-black sm:hidden focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            
                <nav class="items-center hidden gap-10 sm:flex justify-evenly">
                    <a href="#" class="font-semibold hover:text-yellow-500 after:block after:h-[2px] after:bg-yellow-500 after:scale-x-0 after:transition-transform after:duration-300 after:origin-left hover:after:scale-x-100 ">Home</a>
                    <a href="#" class="font-semibold hover:text-yellow-500 after:block after:h-[2px] after:bg-yellow-500 after:scale-x-0 after:transition-transform after:duration-300 after:origin-left hover:after:scale-x-100 ">About Us</a>
                    <a href="#" class="font-semibold hover:text-yellow-500 after:block after:h-[2px] after:bg-yellow-500 after:scale-x-0 after:transition-transform after:duration-300 after:origin-left hover:after:scale-x-100 ">Contact Us</a>
                    <form action="#">
                    <button class=" bg-[#071d49] text-white hover:text-[#071d49] hover:bg-white hover:border-[#071d49] border px-4 py-2 font-semibold rounded-xl flex items-center gap-x-2 hover:scale-105 transition mr-10">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                        </svg>

                        Search
                    </button>
                    </form>
                </nav>
            </div>
        
            <div id="mobile-menu" class="flex flex-col hidden px-4 py-4 space-y-3 bg-white sm:hidden base:hidden lg:hidden xl:hidden">
            <a href="#" class="font-semibold transition duration-300 hover:text-yellow-500 hover:translate-x-2">Home</a>
            <a href="#" class="font-semibold transition duration-300 hover:text-yellow-500 hover:translate-x-2">About Us</a>
            <a href="#" class="font-semibold transition duration-300 hover:text-yellow-500 hover:translate-x-2">Contact Us</a>
            <form action="#">
                <button class="w-full px-4 py-2 font-semibold text-black transition bg-yellow-500 rounded-md hover:scale-105">
                <i class="mr-2 fas fa-search"></i>Search Car
                </button>
            </form>
            </div>
        </header>
        <div class="bg-[#dedede] text-black w-screen h-[400px] lg:h-[800px] pt-16 flex flex-row justify-center">
            <div class="flex flex-col items-center justify-center w-full h-full">
                <img src="{{ asset('landscape2.jfif') }}" class="flex flex-col size-full">
                        
                </img>
                <div class="flex flex-col absolute w-[80%] lg:w-[70%] h-[30%] lg:h-[70%] items-end gap-y-4">
                    <div class="flex flex-col gap-2 text-white">
                        <h1 class="text-3xl font-bold lg:text-6xl">AAP Mobility X</h1>
                    </div>

                    <div class="flex flex-col gap-2">
                        @if (Route::has('login'))
                            <nav class="flex justify-end flex-1 gap-5 ">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-xl text-base font-extrabold tracking-wide hover:bg-[#ffffff] hover:text-[#071d49] hover:scale-110 duration-300 bg-[#dfd436] px-3 py-2 text-[#071d49]"
                                    >
                                        Go back to Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-xl text-xs lg:text-base font-extrabold tracking-wide hover:bg-[#ffffff] hover:text-[#071d49] hover:scale-110 duration-300 bg-[#dfd436] px-3 py-2 text-[#071d49]">
                                        Get started
                                    </a>
                                @endauth
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <footer class="flex flex-col items-center justify-center w-screen bg-[#071d49] h-[1000px] lg:h-[500px] border-t-4 border-t-yellow-500">
            <div class="flex flex-col items-center justify-center gap-5 pt-5 lg:justify-evenly lg:w-full lg:flex-row lg:items-start">
                <div class="flex flex-col items-center justify-start text-xl text-white bg-[#071d49] min-w-[150px] max-w-[200px] rounded-md">
                    <p class="relative font-bold inline-block after:absolute after:bottom-0 after:left-0 after:w-1/2 after:border-b-2 after:border-yellow-500 after:content-['']">
                    Quick Links
                    </p>
                
                    <div class="top-full lg:items-start items-center mt-2 flex flex-col bg-[#071d49] w-full rounded-md p-4 mr-5 space-y-2">
                    <a href="#" class="text-base text-white hover:text-yellow-500 before:content-['•'] before:text-yellow-500 before:mr-2 ">Home</a> 
                    <a href="#" class="text-base text-white hover:text-yellow-500 before:content-['•'] before:text-yellow-500 before:mr-2 ">About Us</a> 
                    <a href="#" class="text-base text-white hover:text-yellow-500 before:content-['•'] before:text-yellow-500 before:mr-2 ">Contact Us</a> 
                    </div>
                </div>
                
                <div class="flex flex-col items-center justify-start text-xl text-white bg-[#071d49] min-w-[150px] max-w-[200px] rounded-md">
                    <p class="relative font-bold inline-block after:absolute after:bottom-0 after:left-0 after:w-1/2 after:border-b-2 after:border-yellow-500 after:content-['']">
                        NPC Seal
                    </p>  
                    <img src="{{ asset('npc-seal.png') }}" alt="logo" class="h-48 w-[200px] mt-5 hover:scale-105 transition-transform duration-300 hover:transition">            
                </div>
                <div class="flex flex-col items-center justify-start text-xl text-white bg-[#071d49] min-w-[150px] max-w-[200px] rounded-md">
                    <p class="relative font-bold mb-5 inline-block after:absolute after:bottom-0 after:left-0 after:w-1/2 after:border-b-2 after:border-yellow-500 after:content-['']">
                        Follow Us
                    </p>  
                <div class="flex flex-row">
                    <a href="https://facebook.com/yourpage" target="_blank" class="text-blue-600 hover:text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-5 text-gray-500 transition-transform duration-300 fill-current hover:text-yellow-500 hover:scale-125" viewBox="0 0 24 24">
                            <path d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V12h2.2l-.3 3H14v7A10 10 0 0 0 22 12z"/>
                        </svg>
                    </a>
                    <a href="https://instagram.com/yourpage" target="_blank" class="text-pink-600 hover:text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500 transition-transform duration-300 fill-current hover:text-yellow-500 hover:scale-125" viewBox="0 0 24 24">
                        <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 2A3.75 3.75 0 0 0 4 7.75v8.5A3.75 3.75 0 0 0 7.75 20h8.5a3.75 3.75 0 0 0 3.75-3.75v-8.5A3.75 3.75 0 0 0 16.25 4h-8.5zm8.25 1.75a1 1 0 1 1 0 2 1 1 0 0 1 0-2zM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 2a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
                        </svg>
                    </a>
                </div>
                </div>
                <div class="flex flex-col items-center justify-start text-xl bg-[#071d49] h-[350px] min-w-[250px] max-w-[400px] rounded-md">
                    <p class="relative text-white font-bold inline-block after:absolute after:bottom-0 after:left-0 after:w-1/2 after:border-b-2 after:border-yellow-500 after:content-[''] mb-5">
                        AAP Pre-owned Prestige
                    </p>  
                    <p class="mb-10 text-base text-center text-gray-400">A member-exclusive benefit offering <br>a secure and transparent platform for purchasing Autocare-certified pre-<br>owned vehicles at a special rate.</p>
                    <p class="text-sm italic text-white">Powered by</p>
                    <div class="h-[50px]">
                        <img src="{{ asset('aap-logo.png') }}" alt="logo" class="h-36 w-[150px]">            
                    </div>
                </div>
            </div>
        
            <div class="relative flex-row items-center justify-end">
                <hr class="w-[1250px] mb-8 border-gray-800 my-4 transition-transform duration-300 hover:scale-105" />
                <p class="mb-2 text-sm text-center text-gray-400 sm:text-base">&copy; 2025 AAP Pre-Owned Prestige. All rights reserved.</p>
            </div>
        </footer>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
          const toggleBtn = document.getElementById('menu-toggle');
          const mobileMenu = document.getElementById('mobile-menu');

          toggleBtn.addEventListener('click', (e) => {
              e.stopPropagation(); // Prevent click from bubbling
              mobileMenu.classList.toggle('hidden');
          });

          // Hide menu when clicking outside
          document.addEventListener('click', (e) => {
              if (!mobileMenu.classList.contains('hidden') &&
                  !mobileMenu.contains(e.target) &&
                  !toggleBtn.contains(e.target)) {
                  mobileMenu.classList.add('hidden');
              }
          });
      });
    </script>
    </body>
</html>
