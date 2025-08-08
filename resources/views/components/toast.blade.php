@props([ 'delay' => 5000, ])

@session('toast')
    <div x-data="{ showToast: false }" x-init="setTimeout(() => showToast = true, 1000 })">
        <div 
            x-show="showToast"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-x-10"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-10"
            x-data="{ showToast: true }"
            x-init="setTimeout(() => showToast = false, {{ $delay }})"
        >
                {{ $slot }}
        </div>
    </div>
@endsession