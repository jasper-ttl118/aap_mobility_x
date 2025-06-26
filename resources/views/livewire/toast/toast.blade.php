<div 
    x-data="{
        toasts: [],
        toastId: 0,
        addToast(toast) {
            toast.id = this.toastId++;
            this.toasts.push(toast);
            console.log(toast.id);
            setTimeout(() => {
                this.toasts = this.toasts.filter(t => t.id !== toast.id);
            }, 3500);
        }
    }" 
    x-on:show-toast.window="addToast({ title: $event.detail[0].title, content: $event.detail[0].content })"
    class="fixed top-4 right-4 flex flex-col gap-2 z-50"
>
    <template x-for="(toast, index) in toasts" :key="toast.id">
        <div 
            x-show="true"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-4"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform translate-x-4"
            class="p-3 w-72 rounded-lg flex flex-row gap-x-2 shadow-md"
            :class="toast.title == 'Success' ? 'bg-[#039856]' : 'bg-[#E54E4F]'"
        >
            <template x-if="toast.title == 'Success'">
                <div class="flex flex-row gap-x-2">
                    <div class="flex justify-center items-center bg-[#D2FBDF] w-10 h-10 rounded-lg">
                        <svg class="size-[22px] border-2 p-[2px] rounded-md border-[#039856]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#039856" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-semibold text-white" x-text="toast.title"></span>
                        <span class="text-white text-xs" x-text="toast.content"></span>
                    </div>
                </div>
            </template>

            <template x-if="toast.title == 'Error'">
                <div class="flex flex-row gap-x-2">
                    <div class="flex justify-center items-center bg-white w-10 h-10 rounded-lg">
                        <span class="text-xs font-semibold w-5 h-5 border-2 text-center text-[#E54E4F] rounded-md border-[#E54E4F]">X</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-semibold text-white" x-text="toast.title"></span>
                        <span class="text-white text-xs" x-text="toast.content"></span>
                    </div>
                </div>
            </template>
        </div>
    </template>
</div>
