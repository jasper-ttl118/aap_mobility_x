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
<body class="flex flex-row">
    @include('layouts.navbar')
    
    <div class="p-10">
        <div class="flex h-30 w-auto justify-start">
          <div class="flex flex-row items-center text-3xl py-10 uppercase font-bold bg-gradient-to-r from-sky-500  to-blue-900 bg-clip-text text-transparent">Welcome, {{$users->name}}!
            <img class="w-10 h-10 mx-2" src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExYTBlYnNqdnZmM3Jhcmk4eWRleDUyZ3I2Zm0yM3k4eDI5dHdyNGNkdiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/w1OBpBd7kJqHrJnJ13/giphy.gif" alt="">
          </div>
        </div>
    
        <div class="flex flex-wrap h-auto w-auto bg-white justify-center">
          
          @can("Dashboard: Sub-Module 1")
            <div class="p-5 w-80 flex m-5 h-40 w-100 items-center justify-center space-x-5 rounded-md border-2 border-r-4 border-gray-300 border-r-indigo-900 bg-gray-50 shadow shadow-stone-100">
                <div class="text-6xl font-medium text-indigo-900">125</div>
                <div class="flex flex-col">
                <div class="font-bold text-indigo-900">Number of Sales</div>
                <div class="text-xs text-wrap text-blue-600">10% increase</div>
                </div>
            </div>  
          @endcan
          @can("Dashboard: Sub-Module 2")
            <div class="p-5  w-80 flex m-5 h-40 w-100 items-center justify-center space-x-5 rounded-md border-2 border-r-4 border-gray-300 border-r-green-900 bg-gray-50 shadow shadow-stone-100">
                <div class="text-6xl font-medium text-green-900">10%</div>
                <div class="flex flex-col">
                <div class="font-bold text-green-900">Revenue</div>
                <div class="text-xs text-wrap text-green-600">Subtitle</div>
                </div>
            </div>
          @endcan
          @can("Dashboard: Sub-Module 3")
            <div class="p-5 w-80 flex m-5 h-40 w-100 items-center justify-center space-x-5 rounded-md border-2 border-r-4 border-gray-300 border-r-red-700 bg-gray-50 shadow shadow-stone-100">
                <div class="text-6xl font-medium text-red-600">12%</div>
                <div class="flex flex-col">
                <div class="font-bold text-red-600">Net Loss</div>
                <div class="text-xs text-wrap text-red-600">with 10% Neg Threashold</div>
                </div>
            </div> 
          @endcan
        </div>
      </div>
    </div>
</body>
</html>