@props(['delay' => 5000])

<div
    x-data="{ show: false, progress: 100 }"
    x-init="
        $js('showToast', (time = {{ $delay }}) => {
            progress = 100;
            show = true;

            setTimeout(() => {
                progress = 0;
            }, 50);

            setTimeout(() => {
                show = false;
            }, time);
        });

        $js('closeToast', () => {
            show = false;
            progress = 0;
        });
    "
    class="fixed bottom-4 right-8 z-50"
>
    <div
        x-show="show"
        x-transition
        class="shadow-md"
    >
        <div {{ $attributes->merge(['class' => 'min-w-32 px-2 py-1 bg-red-100 rounded-t text-sm']) }}>
            {{ $slot }}
            <div class="divider divider-horizontal mx-0"></div>
            <button @click="show = false" class="btn btn-ghost btn-sm p-0.5">
                <x-icon.x-mark class="size-[1rem]" />
            </button>
        </div>
        <div class="h-1 bg-red-400 rounded-b overflow-hidden">
            <div
                class="h-full bg-red-800"
                :style="{ width: progress + '%' }"
                style="transition: width {{ $delay }}ms linear;"
            ></div>
        </div>
    </div>
</div>
