<x-app-layout class='flex flex-row w-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false]" navbar_selected='Employee Management'>
    <div x-data="{ selected : 'pending', open_add : false, open_delete : false, open_view : false, open_edit : false,
                open_view : false
    }" x-ref="scrollContainer" 
    class="flex flex-1 flex-col lg:ml-52 overflow-y-auto p-5 lg:p-10 gap-7 mt-12 bg-[#f3f4f6] ">
        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg overflow-x-auto hide-scrollbar flex-shrink-0">
            <div class="flex h-14 ">
               <x-employee.submodules selected="Manpower Requisition" />
            </div>
        </div>

        <div class="rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="flex flex-col lg:flex-row justify-between">
                 {{-- Breadcrumbs --}}
                <div class="flex items-center gap-x-1 text-[#071d49] text-sm px-7 pt-5">
                    <a href="/employee" class="hover:underline truncate">Employee Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('requisition.index') }}" class="hover:underline truncate">Manpower Requisition</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('requisition.create') }}" class="hover:underline font-semibold truncate">Create Requisition Form</a>
                </div>
            </div>

            <div id="add-requisition-component">
                <livewire:employee.manpower-requisition.add-requisition-req />
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            window.addEventListener('swal:confirm', (event) => {
                const data = event.detail;

                Swal.fire({
                    title: data[0].title,
                    text: data[0].text,
                    icon: data[0].icon,
                    showCancelButton: true,
                    confirmButtonText: data[0].confirmButtonText || 'Yes',
                    cancelButtonText: 'Cancel',
                    customClass: {
                        confirmButton: 'bg-[#071d49] text-white px-4 mr-4 py-2 rounded hover:bg-blue-700',
                        cancelButton: 'bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {

                        const rootEl = document.querySelector('#add-requisition-component [wire\\:id]');
                        if (!rootEl) {
                            console.error("Livewire component not found");
                            return;
                        }

                        const componentId = rootEl.getAttribute('wire:id');
                        Livewire.find(componentId).call('add');
                    }
                });
            });

            window.addEventListener('swal:result', (event) => {
                const data = event.detail;

                if (data[0].icon === 'success') {
                    setTimeout(() => {
                        Swal.fire({
                            title: data.successTitle || data.title || 'Success',
                            text: data.successText || data.text || 'Requisition created successfully!',
                            icon: data.icon || 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(() => {
                            window.location.href = '/requisition';
                        }, 1600);

                    }, 300);
                } else if (data[0].icon === 'error') {
                    // Show a blocking alert for errors, user must acknowledge
                    Swal.fire({
                        title: data[0].title,
                        text: data[0].text,
                        icon: 'error',
                        confirmButtonText: 'OK',
                    });
                } else {
                    // Default fallback alert
                    Swal.fire({
                        title: data[0].title,
                        text: data[0].text,
                        icon: data[0].icon || 'info',
                        confirmButtonText: 'OK',
                    });
                }
            });


        </script>
</x-app-layout>
