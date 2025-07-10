@php

$user = auth()->user()->load('organization', 'employee', 'roles');
$modules_access = auth()->user()->roles->flatMap->modules->pluck('module_name')->toArray();
// dd($modules_access);
@endphp
<div class="fixed flex flex-row w-full h-12 bg-white shadow-lg mb-6 z-10 items-center justify-between px-4">
    
    <div class="flex items-center">
        <button class="text-[#151847] lg:hidden" onclick="menuToggle()">☰</button>
    </div>

    <div class="flex flex-row items-center space-x-4">
        <a href="#" onmouseenter="playHoverSound()" onclick="playNotificationSound()" class="text-[#151847] border-r-2 border-[#151847] ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mx-3 hover:animate-wiggle hover:text-yellow-400 duration-150">
                <path d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z" />
                <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z" clip-rule="evenodd" />
            </svg>
            {{-- <audio id="hoverSound" preload="auto">
                <source src="{{ asset('minion.mp3') }}" type="audio/wav">
            </audio> --}}
        </a>

        <div class="relative inline-block text-left">
            <a href="#" class="text-[#151847] group transform duration-300 hover:text-white inline-flex" id="dropdownProfile">
                <div class="flex flex-row gap-2 group-hover:bg-[#151847] p-1 group-focus:border rounded-md group-focus:border-[#151847] group-focus:mx-0">
                    <div class="flex justify-center items-center">  
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center items-start mt-1">
                        <span class="text-md -my-2 font-bold uppercase">{{ $user->employee->employee_firstname }} {{ $user->employee->employee_lastname }}</span>
                        <span class="text-[10px]">{{ $user->roles->first()->role_name ?? 'No Role Assigned' }}</span>
                    </div>
                    <div class="flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" id="drop">
                            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </a>
            <div id="dropdownContent" class="hidden absolute w-full right-0 rounded-md z-50">
                <div class="border-x shadow-xs rounded-b-md border-[#151847] bg-white">
                    <a href="{{ route('profile.view', $user->user_id) }}" class="flex flex-row block items-center justify-start gap-2 px-4 py-2 text-[#151847] hover:bg-[#151847] hover:text-white text-center font-bold text-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="">
                        @csrf
                        <button class="flex flex-row justify-start items-center gap-2 w-full h-full px-4 py-2 text-[#151847] hover:bg-[#151847] hover:text-white text-center font-bold text-md rounded-md border-b border-[#151847]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const toggle = document.getElementById('dropdownProfile');
    const content = document.getElementById('dropdownContent');
    const icon = document.getElementById('drop');
    let rotated = false;

    let isSoundOn = true;

    toggle.addEventListener('click', (e) => {
        e.preventDefault(); // prevent navigation
        content.classList.toggle('hidden');

        rotated = !rotated;
        icon.classList.toggle('rotate-180', rotated);
        icon.classList.toggle('rotate-0', !rotated);
    });

    document.addEventListener('click', (e) => {
        if (!toggle.contains(e.target) && !content.contains(e.target)) {
        content.classList.add('hidden');

        rotated = false;
        icon.classList.toggle('rotate-180', rotated);
        icon.classList.toggle('rotate-0', !rotated);
        }
    });

    function playHoverSound() {
        const audio = document.getElementById('hoverSound');
        audio.currentTime = 0;
        audio.play().catch(e => console.log('Audio play failed:', e));
    }

</script>
