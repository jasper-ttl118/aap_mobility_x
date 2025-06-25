@props(['selected' => 'Dashboard'])

@php
    $moduleId = 4; // Module id of Employee

    $submodules = auth()->user()->roles
        ->flatMap->submodules
        ->filter(fn($submodule) => $submodule->module_id == $moduleId)
        ->pluck('submodule_name')
        ->toArray();

    $links = [
        'Dashboard' => '/customer',
        'Members' => '/customer/contacts',
        'Email Marketing' => '/customer/email-marketing',
        'Corporate' => '/customer/corporate',
        'Sales Tracking' => '/customer/sale-tracking'
    ];

@endphp

@foreach ($submodules as $submodule)
    @if ($submodule === $selected)
        <div class="min-w-52 lg:min-w-[8rem] border-b-2 border-blue-900 p-4 text-center ">
            <a href="{{ $links[$submodule] }}" class="font-semibold text-blue-900">{{ $submodule }}</a>
        </div>
    @else
        <div class="min-w-52 lg:min-w-[8rem] flex-none w-auto p-4 text-center">
            <a href="{{ $links[$submodule] }}" class="text-gray-600 hover:text-blue-800 font-inter">{{ $submodule }}</a>
        </div>
    @endif
@endforeach
