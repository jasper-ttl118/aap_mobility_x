@props(['class' => '', 'x_data' => '', 'navbar_selected' => ''])

<x-layouts.base-layout :$class :$x_data :$navbar_selected>

    {{ $slot }}

</x-layouts.base-layout>