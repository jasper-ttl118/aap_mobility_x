<div x-data="{ progress: 0 }" x-init="
    let duration = 5; // seconds
    let interval = setInterval(() => {
        progress += 1;
        if (progress >= 100) clearInterval(interval);
    }, duration * 10)  // 500ms total: 5s * 100 steps
">
    {{ $slot }}
    <progress class="progress progress-accent w-full" :value="progress" max="100"></progress>
</div>