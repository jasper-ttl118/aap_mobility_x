@props([ 'name' => 'Modal' ])

<div 
    x-data="{ show: false }"
    x-init="
        let modalName = '{{ $name }}';
        let showModal = 'show' + modalName;
        let closeModal = 'close' + modalName;

        $js(showModal, () => { show = true; });
        $js(closeModal, () => { show = false; });
    "
>
    <div x-cloak x-show="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-lg shadow-lg max-w-fit p-4 pb-0">
            <div class="flex justify-end">
                <button @click="show = false" class="btn btn-ghost btn-xs p-0.5">
                    <x-icon.x-mark class="size-[1rem]" />
                </button>
            </div>
            {{  $slot }}
        </div>
    </div>
</div>