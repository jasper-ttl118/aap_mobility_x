<div 
    x-data="{ display: false, toastTitle: '', toastContent: ''}" 
    x-on:show-toast.window="
        toastTitle = $event.detail[0].title;
        toastContent = $event.detail[0].content;
        display = true;
        setTimeout(() => display = false, 3000);"

    x-show="display" 
    x-transition 
    class="p-3 h-fit rounded-lg flex flex-row gap-x-2"
    :class="toastTitle == 'Success' ? 'bg-[#039856] ' : 'bg-[#E54E4F]'"
>
    <template x-if="toastTitle == 'Success'">
        <div class="flex flex-row gap-x-2">
            <div class="flex justify-center items-center bg-[#D2FBDF] w-10 h-10 rounded-lg">
                <svg class="size-[22px] border-2 p-[2px] rounded-md border-[#039856]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#039856" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <div class="flex flex-col">
                <span class="font-semibold text-white" x-text="toastTitle"></span>
                <span class="text-white text-xs" x-text="toastContent"></span>
            </div>
        </div>
    </template>

    <template x-if="toastTitle == 'Error'">
        <div class="flex flex-row gap-x-2">
            <div class="flex justify-center items-center bg-white w-10 h-10 rounded-lg">
                <span class="text-xs font-semibold w-5 h-5 border-2 text-center text-[#E54E4F] rounded-md border-[#E54E4F]">X</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-white" x-text="toastTitle"></span>
                <span class="text-white text-xs" x-text="toastContent"></span>
            </div>
        </div>
    </template>
</div>
