<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900"
     wire:poll.1s="updateTime">
    
    <div class="text-center p-8 bg-white/10 backdrop-blur-lg rounded-3xl shadow-2xl border border-white/20">
        <div class="mb-4">
            <h1 class="text-6xl md:text-8xl font-mono font-bold text-white tracking-wider">
                {{ $currentTime }}
            </h1>
        </div>
        
        <div class="text-xl md:text-2xl text-white/80 font-light">
            {{ $currentDate }}
        </div>
        
        <div class="mt-6 flex justify-center">
            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
        </div>
    </div>
</div>