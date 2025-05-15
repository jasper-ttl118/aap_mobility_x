<x-app-layout class='flex flex-row w-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='Employee Management'>
    <div class="flex flex-col w-full ml-64 overflow-y-auto p-10 h-screen justify-center items-center">
        @if ($errors->any())
            <div id="toast-error"
                class="fixed top-5 right-5 z-50 flex flex-col max-w-xs p-4 text-red-500 bg-white border border-red-300 rounded-lg shadow-sm transition-opacity duration-500 ease-in-out opacity-100 dark:bg-red-900 dark:text-red-200"
                role="alert">
                <div class="flex items-center">
                    <div
                        class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm-1 5a1 1 0 0 1 2 0v4a1 1 0 0 1-2 0V5Zm1 7a1.25 1.25 0 1 1-1.25 1.25A1.25 1.25 0 0 1 10 12Z" />
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <span class="ms-3 font-semibold">Error:</span>
                    <button type="button" onclick="closeErrorToast()"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-red-400 hover:text-red-900 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:text-red-500 dark:hover:text-white dark:bg-red-800 dark:hover:bg-red-700"
                        aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <ul class="mt-2 text-sm list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/employee" method="post"
            class="max-w-lg mx-auto bg-white shadow-md rounded-lg border border-gray-200">
            @csrf
            <div class="text-gray-700 p-6 space-y-6">
                <!-- Heading -->
                <div class="border-b border-gray-200 pb-5">
                    <h1 class="text-lg font-bold uppercase">Add New Employee</h1>
                    <p class="text-sm text-gray-600">
                        Register a new employee's personal details, including contact information, position, and
                        department.
                    </p>
                </div>

                <!-- Employee Name -->
                <div>
                    <label for="employee_fullname" class="font-medium">Employee Name</label>
                    <div class="flex gap-2 mt-1">
                        <input type="text" name="employee_firstname" placeholder="First Name"
                            class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                        <input type="text" name="employee_middlename" placeholder="Middle Name"
                            class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                        <input type="text" name="employee_lastname" placeholder="Last Name"
                            class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">
                    </div>
                </div>

                <!-- Contact Number -->
                <div>
                    <label for="employee_contact_number" class="font-medium">Contact Number</label>
                    <input type="text" name="employee_contact_number" placeholder="Enter Contact Number"
                        class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                </div>

                <!-- Email -->
                <div>
                    <label for="employee_email" class="font-medium">Email</label>
                    <input type="email" name="employee_email" placeholder="sample@email.com"
                        class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                </div>

                <!-- Address -->
                <div>
                    <label for="employee_address" class="font-medium">Address</label>
                    <input type="text" name="employee_address" placeholder="Enter Address"
                        class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                </div>

                <!-- Department & Position -->
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label for="employee_department" class="font-medium">Department</label>
                        <select name="employee_department"
                            class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                            <option value="IST">Information Systems and Technology</option>
                            <option value="Admin">Admin</option>
                            <option value="HR">Human Resources and Development</option>
                            <option value="Accounting">Accounting</option>
                            <option value="Membership">Membership</option>
                            <option value="MarComm">Marketing and Corporate Communication</option>
                            <option value="CEO">CEO</option>
                            <option value="COO">COO</option>
                            <option value="EO">EO</option>
                        </select>
                    </div>
                    <div>
                        <label for="employee_position" class="font-medium">Company Position</label>
                        <select name="employee_position"
                            class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                            <option value="Manager">Manager</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="mt-6 w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Create
                </button>
            </div>
        </form>

    </div>

    <script>
        function closeErrorToast() {
            const toast = document.getElementById('toast-error');
            toast.classList.add('opacity-0'); // Start fade-out
            setTimeout(() => {
                toast.classList.add('hidden'); // Hide after fade-out
            }, 500); // Matches the transition duration
        }

        // Auto-hide the error toast after 7 seconds
        setTimeout(closeErrorToast, 7000);
    </script>
</x-app-layout>
