@props(['id'])

<dialog id="{{ $id }}" 
    {{ $attributes->merge(['class' => 'h-96 w-1/2 rounded-lg fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent border-0 outline-none shadow-lg']) }} 
>
    <form class="m-0 p-0 w-full h-full" {{ $attributes->merge(['wire:submit' => 'save']) }}>
        <div class="bg-white text-black flex flex-col justify-between w-full h-full">
            {{-- Header --}}
            @isset($header)
                <div>
                    {{ $header }}
                </div>
            @endisset
            
            <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                {{ $slot }}
            </div>

            <div class="flex justify-end gap-2 bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="button" command="close" commandfor="{{ $id }}" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">
                    Cancel
                </button>
                @isset($footer)
                    {{ $footer }}
                @endisset
            </div>    
        </div>
    </form>
</dialog>

