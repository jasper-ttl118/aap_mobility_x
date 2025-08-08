@props([ ])

<div {{ $attributes->merge(['wire:show' => '' ]) }}>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg mx-4 p-4">
            {{  $slot }}
        </div>
    </div>
</div>


