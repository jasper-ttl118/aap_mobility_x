<div wire:poll.1s="updateTime" 
    class="flex items-center justify-center h-14 ">
    
    <div class="text-center p-8">
        <div class="mb-1">
            <h1 class="text-base lg:text-xl font-mono font-bold text-white tracking-wider">
                {{ $currentTime }}
            </h1>
        </div>
        
        <div class="text-sm text-white/80 font-light">
            {{ $currentDate }}
        </div>
        
        {{-- <div class="mt-6 flex justify-center">
            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
        </div> --}}
    </div>
</div>