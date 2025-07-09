<x-app-layout class='flex flex-row w-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='Employee Management'>
  
    <div x-data="{ selected : 'employees', open_add_employee : false, open_delete_employee : false, 
                   open_view_employee : false, open_edit_employee : false, open_add_intern : false, 
                   open_delete_intern : false, open_view_intern : false, open_edit_intern : false
                }" 
        class="flex flex-1 flex-col lg:ml-52 overflow-y-auto p-10 gap-7 mt-12 bg-[#f3f4f6]">
      
        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg overflow-x-auto hide-scrollbar flex-shrink-0">
            <div class="flex h-14">
                <x-employee.submodules selected="Alphalist" />
            </div>
        </div>

        <div class="@container/main rounded-md border-2 border-gray-100 bg-white justify-center items-center flex w-full flex-col shadow-lg -mt-4">
            <div class="flex flex-col justify-between w-full mt-3">
                 {{-- Breadcrumbs --}}
                <div class="flex justify-start w-full gap-x-1 text-[#071d49] text-sm px-7 pt-5">
                    <a href="/employee" class="hover:underline">Employee Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="/employee" class="hover:underline">Alphalist</a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    <a href="#" class="hover:underline font-semibold">Add Employee</a>
                </div>
            </div>


            <div class="mt-6 flex justify-center flex-col items-start w-[93%] border-b border-gray-200 pb-3">
                <h1 class="text-base text-[#071d49] font-bold uppercase">Add New Employee</h1>
                <p class="text-sm text-gray-600">Create new employee with their relevant information.</p>
            </div>

            <main class="space-y-6 w-full h-full">
                <section class="space-y-1.5">
                    <livewire:employee.alphalist.add-employee />
                </section>
            </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
          window.addEventListener('swal:result', (event) => {
                const data = event.detail;
                console.log(data);
                console.log('\n' + data[0].icon);
                if (data[0].icon === 'success') {
                    setTimeout(() => {
                        Swal.fire({
                            title: data[0].successTitle || data[0].title || 'Success',
                            text: data[0].successText || data[0].text || 'Employee added successfully!',
                            icon: data[0].icon || 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(() => {
                            window.location.href = '/employee';
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