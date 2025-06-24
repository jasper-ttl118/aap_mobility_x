<div wire:poll.1s="updateTime" 
    class="flex items-center justify-center h-32 ">
    
    <div class="text-center p-8 flex justify-center items-center flex-col">
        <div class="mb-1 flex flex-row justify-center items-center w-full h-20 gap-x-1">
            <div class="w-[50%] flex justify-center items-center bg-white/10 h-full border-2 border-white rounded-xl">
                <h1 class="text-base lg:text-3xl font-mono font-bold text-white tracking-wider">
                    {{ $currentHour }}
                </h1>
            </div>
            <div class="flex flex-row justify-center items-center w-[50%] bg-white/10 h-full border-2 border-white rounded-xl">
                <h1 class="text-base lg:text-3xl font-mono font-bold text-white tracking-wider">
                    {{ $currentMinute }}
                </h1>
                <h6 class="text-xs flex items-end font-mono font-bold text-white tracking-wider">
                    {{ $currentMeridiem}}
                </h6>
            </div>
        </div>
        
        <div class="text-sm text-white/80 font-light">
            {{ $currentDate }}
        </div>
        
        {{-- <div class="mt-6 flex justify-center">
            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
        </div> --}}
    </div>
</div>