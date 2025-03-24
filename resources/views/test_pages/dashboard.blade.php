<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include("layouts.icons")
    @vite('resources/css/app.css')
    <title>Dashboard</title>
</head>
<body class="flex flex-row h-screen">
    @include('layouts.navbar')
    
    <div class="flex flex-col w-full ml-64 overflow-y-auto bg-[url('/public/build/assets/bgdiv.jpg')] bg-cover bg-center p-10">
        <div class="flex h-30 w-auto justify-start">
          <div class="flex flex-row items-center text-3xl py-10 font-bold bg-gradient-to-r from-sky-500  to-blue-900 bg-clip-text text-transparent">Welcome, {{ $users->employee->employee_firstname}} {{ $users->employee->employee_lastname}}!
            <img class="w-10 h-10 mx-2" src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExb2I3ZmR2aXY5eW41MDR5djB4MGd6ZjBiN21rYTEzdmh0emtwMXk4YyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/IpM4kYGnxqmE02P9rr/giphy.gif" alt="">
          </div>
        </div>
    
        {{-- <div class="flex flex-wrap h-auto w-auto bg-white justify-center">
          
            <div class="p-5 w-80 flex m-5 h-40 w-100 items-center justify-center space-x-5 rounded-md border-2 border-r-4 border-gray-300 border-r-indigo-900 bg-gray-50 shadow shadow-stone-100">
                <div class="text-6xl font-medium text-indigo-900">125</div>
                <div class="flex flex-col">
                <div class="font-bold text-indigo-900">Number of Sales</div>
                <div class="text-xs text-wrap text-blue-600">10% increase</div>
                </div>
            </div>  

            <div class="p-5  w-80 flex m-5 h-40 w-100 items-center justify-center space-x-5 rounded-md border-2 border-r-4 border-gray-300 border-r-green-900 bg-gray-50 shadow shadow-stone-100">
                <div class="text-6xl font-medium text-green-900">10%</div>
                <div class="flex flex-col">
                <div class="font-bold text-green-900">Revenue</div>
                <div class="text-xs text-wrap text-green-600">Subtitle</div>
                </div>
            </div>

            <div class="p-5 w-80 flex m-5 h-40 w-100 items-center justify-center space-x-5 rounded-md border-2 border-r-4 border-gray-300 border-r-red-700 bg-gray-50 shadow shadow-stone-100">
                <div class="text-6xl font-medium text-red-600">12%</div>
                <div class="flex flex-col">
                <div class="font-bold text-red-600">Net Loss</div>
                <div class="text-xs text-wrap text-red-600">with 10% Neg Threashold</div>
                </div>
            </div> 
        </div>

        <div class="flex flex-wrap gap-2 justify-center p-2 mt-10">
            <div class="h-auto w-96 rounded-lg bg-gray-50 shadow shadow-gray-400">
              <div class="h-22 w-96">
                <img src="https://images.pexels.com/photos/161251/senso-ji-temple-japan-kyoto-landmark-161251.jpeg" alt="" class="h-72 w-96 rounded-t-lg object-cover object-bottom" />
              </div>
              <div class="p-7">
                <h1 class="py-3 text-2xl font-bold text-red-600">TOKYO</h1>
                <p class="h-32">Japan’s busy capital, mixes the ultramodern and the traditional, from neon-lit skyscrapers to historic temples. The opulent Meiji Shinto Shrine is known for its towering gate and surrounding woods.</p>
                <div class="my-8">
                  <a href="https://www.gotokyo.org/en/index.html" class="rounded-md bg-red-600 p-2 font-medium text-white hover:bg-red-950">Learn More</a>
                </div>
              </div>
            </div>
          
            <div class="h-auto w-96 rounded-lg bg-gray-50 shadow shadow-gray-400">
              <div class="h-72 w-96">
                <img src="https://images.pexels.com/photos/12061667/pexels-photo-12061667.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" class="h-72 w-96 rounded-t-lg object-cover object-bottom" />
              </div>
              <div class="p-7">
                <h1 class="py-3 text-2xl font-bold text-blue-600">SEOUL</h1>
                <p class="h-32">The capital of South Korea, is a huge metropolis where modern skyscrapers, high-tech subways and pop culture meet Buddhist temples, palaces and street markets..</p>
                <div class="my-8">
                  <a href="https://www.britannica.com/place/Seoul" class="rounded-md bg-blue-600 p-2 font-medium text-white hover:bg-blue-950">Learn More</a>
                </div>
              </div>
            </div>

            <div class="h-auto w-96 rounded-lg bg-gray-50 shadow shadow-gray-400">
                <div class="h-72 w-96">
                  <img src="https://images.pexels.com/photos/7039842/pexels-photo-7039842.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" class="h-72 w-96 rounded-t-lg object-cover object-center" />
                </div>
                <div class="p-7">
                  <h1 class="py-3 text-2xl font-bold text-green-600">MANILA</h1>
                  <p class="h-32">the capital of the Philippines, is a densely populated bayside city on the island of Luzon, which mixes Spanish colonial architecture with modern skyscrapers.</p>
                  <div class="my-8">
                    <a href="https://www.britannica.com/place/Manila" class="rounded-md bg-green-600 p-2 font-medium text-white hover:bg-blue-950">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
        
        </div> --}}

          

      </div>
    </div>
</body>
</html>