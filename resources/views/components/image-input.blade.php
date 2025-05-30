@props([
    'image' => '', // Path to image
])

<div class="relative w-[100%]">
    @if ($image)
        <div class="absolute inset-y-0 left-0 flex justify-center w-full h-full items-center pointer-events-none border-black">
            <img src="{{ $image }}" alt="" class="w-[50%] lg:w-[50%]" />
        </div>
    @endif
</div>
