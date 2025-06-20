@props(['class' => '', 'x_data' => '', 'navbar_selected' => ''])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AAP X</title>
    @include('layouts.icons')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="{{ $class }}" x-data='@json($x_data)'>
    <x-navbar :$navbar_selected />
    <div class="flex flex-col w-full gap-5 bg-[#f3f4f6]">
        <x-layouts.header />
        {{ $slot }}
    </div>

    <x-layouts.chat />
    
    @livewireScripts
</body>

</html>