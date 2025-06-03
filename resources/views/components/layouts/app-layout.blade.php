@props(['class' => '', 'x_data' => '', 'navbar_selected' => ''])
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-layouts.base-layout :$class :$x_data :$navbar_selected>

    {{ $slot }}

</x-layouts.base-layout>