{{-- INACTIVE --}}
<x-app-layout class='flex flex-row w-h-screen'
    :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'ams' => new stdClass()]"
    navbar_selected='Asset Management'>
    <livewire:ams.main />  
</x-app-layout>