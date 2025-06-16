<style>
    .loader {
    width: 48px;
    height: 48px;
    margin: auto;
    position: relative;
    }

    .loader:before {
    content: '';
    width: 48px;
    height: 5px;
    background: #f0808050;
    position: absolute;
    top: 60px;
    left: 0;
    border-radius: 50%;
    animation: shadow324 0.5s linear infinite;
    }

    .loader:after {
    content: '';
    width: 100%;
    height: 100%;
    background: #f08080;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 4px;
    animation: jump7456 0.5s linear infinite;
    }

    @keyframes jump7456 {
    15% {
        border-bottom-right-radius: 3px;
    }

    25% {
        transform: translateY(9px) rotate(22.5deg);
    }

    50% {
        transform: translateY(18px) scale(1, .9) rotate(45deg);
        border-bottom-right-radius: 40px;
    }

    75% {
        transform: translateY(9px) rotate(67.5deg);
    }

    100% {
        transform: translateY(0) rotate(90deg);
    }
    }

    @keyframes shadow324 {

    0%,
        100% {
        transform: scale(1, 1);
    }

    50% {
        transform: scale(1.2, 1);
    }
    }
</style>

<div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="flex flex-col items-center justify-center gap-y-6 w-[30%] h-[40%] bg-white p-6 rounded-lg">
            {{-- <span class="loading loading-spinner loading-2xl w-20 h-20 text-[#071d49]"></span> --}}
            {{-- <p class="text-[#071d49] text-lg font-medium">Retrieving Profile Information...</p> --}}
            <div class="loader"></div>
    </div>
</div>