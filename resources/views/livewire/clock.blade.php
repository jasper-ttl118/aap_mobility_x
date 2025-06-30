<div 
    id="clock-container"
    class="flex items-center justify-center h-32 w-full"
>
    <div class="text-center p-8 flex justify-center items-center flex-col w-full">
        <div class="mb-1 flex flex-row justify-center items-center w-44 h-14 gap-x-1 bg-white/10 backdrop-blur border border-white rounded-xl">
            <h1 id="clock-hour" class="text-4xl font-mono font-bold text-[#F6D400] tracking-wider">
            </h1>
            <h1 class="text-4xl font-mono font-bold text-white tracking-wider">
                :   
            </h1>
            <h1 id="clock-minute" class="text-4xl items-center flex font-mono font-bold text-white tracking-wider">
            </h1>
            <div class="flex flex-col items-center justify-center">
                <h1 id="clock-second" class="text-sm items-center flex font-mono font-bold text-white tracking-wider ml-1">
                </h1>
                <h6 id="clock-meridiem" class="text-xs flex items-center font-mono font-bold text-white tracking-wider ml-1">
                </h6>
            </div>
        </div>
        <div class="flex flex-col text-sm text-white font-light">
            <div id="clock-date" class="flex justify-center items-center">
            </div>
            <div id="clock-day" class="flex justify-center items-center">
            </div>
        </div>
    </div>
</div>
<script>
     function updateClock() {
        // Get current Manila time
        const now = new Date();
        const manilaTime = new Date(now.toLocaleString("en-US", {timeZone: "Asia/Manila"}));
        
        let hours = manilaTime.getHours();
        let minutes = manilaTime.getMinutes();
        let seconds = manilaTime.getSeconds();
        let meridiem = hours >= 12 ? 'PM' : 'AM';

        // Convert to 12-hour format
        hours = hours % 12;
        hours = hours ? hours : 12; // 0 -> 12

        // Update display
        document.getElementById('clock-hour').textContent = String(hours).padStart(2, '0');
        document.getElementById('clock-minute').textContent = String(minutes).padStart(2, '0');
        document.getElementById('clock-second').textContent = String(seconds).padStart(2, '0');
        document.getElementById('clock-meridiem').textContent = meridiem;

        document.getElementById('clock-date').textContent = manilaTime.toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            timeZone: 'Asia/Manila'
        });
        document.getElementById('clock-day').textContent = manilaTime.toLocaleDateString('en-US', { 
            weekday: 'long',
            timeZone: 'Asia/Manila'
        });
    }

    // Initial update
    updateClock();

    // Update every second
    setInterval(updateClock, 1000);
</script>
