<x-app-layout class='flex flex-row w-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='Employee Management'>

    <div x-data="{ selected : 'pending', open_add : false, open_delete : false, open_view : false, open_edit : false,
                open_view : false
    }" x-ref="scrollContainer" 
    class="flex flex-1 flex-col lg:ml-52 overflow-y-auto p-10 gap-7 mt-12 bg-[#f3f4f6] ">
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
                    <a href="{{ route('requisition.create') }}" class="hover:underline font-semibold truncate">Check/Endorse Requisition Form</a>
                </div>
            </div>

            <livewire:employee.manpower-requisition.edit-requisition :requisition="$requisition"/>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.addEventListener('swal:confirm', (event) => {
            const data = event.detail;
            console.log(data);

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
                    // 1. Call Livewire backend delete method
                    Livewire.dispatch('delete');

                    // 2. Show success alert after a slight delay (optional)
                    setTimeout(() => {
                        Swal.fire({
                            title: data[0].successTitle || 'Updated!',
                            text: data[0].successText || 'The requisition was successfully updated!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // 3. Redirect after success alert delay
                        setTimeout(() => {
                            window.location.href = data[0].redirectUrl || '/requisition';
                        }, 1600); // slightly longer than Swal timer
                    }, 200); // slight delay between delete and showing success
                }
            });
        });

    </script>
</x-app-layout>