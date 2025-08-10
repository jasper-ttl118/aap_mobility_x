import './bootstrap';

let toastBox = document.getElementById('toastBox');

document.addEventListener('livewire:init', () => {
    Livewire.on('show-toast', ({ id }) => {
        const container = document.getElementById(id);
        container.classList.remove('hidden');

        // setTimeout(() => {
        //     container.classList.add('hidden');
        // }, 5000);
    });
});

