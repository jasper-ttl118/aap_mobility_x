<x-app-layout class='flex flex-row min-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='RBAC Management'>

    <div class="flex flex-1 flex-col ml-64 overflow-y-auto p-10 gap-7">
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

        <div class="flex items-center gap-x-1 text-blue-900 text-sm">
            <a href="/user" class="hover:underline">RBAC Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="/organization" class="hover:underline">Organizations</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="#" class="hover:underline font-semibold">Add Role</a>
        </div>

        <!-- Title and Subtitle -->
        <div class="">
            <h1 class="text-2xl text-blue-900 font-semibold">RBAC Management</h1>
            <p class="text-gray-700 text-sm"> Manage user access and permissions within the
                organization.</p>
        </div>

        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 bg-gray-50">
            <div class="flex h-14 border-b border-gray-200">
                <div class="w-32 p-4 text-center">
                    <a href="/user" class="text-gray-600 hover:text-blue-800">Users</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/organization" class="text-gray-600 hover:text-blue-800">Organizations</a>
                </div>
                <div class="w-32 p-4 text-center border-b-2 border-blue-900">
                    <a href="/role" class="font-semibold text-blue-900">Roles</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/module" class="text-gray-600 hover:text-blue-800">Modules</a>
                </div>
                {{-- <div class="w-32 p-4 text-center">
                    <a href="/permission" class="text-gray-600 hover:text-blue-800">Permissions</a>
                </div> --}}
            </div>

            <div class="flex flex-col px-7 pt-7 pb-3">
                <h1 class="font-semibold text-lg text-blue-900">Add New Role</h1>
                <p class="text-gray-900 text-sm">Add new role within an organization.</p>

            </div>

            <form action="/role" method="post" class="flex flex-col p-7 gap-7">
                @csrf

                {{-- Select Organization --}}
                <div class="grid grid-cols-10 gap-10 items-start">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Organization</h1>
                        <p class="text-sm italic text-gray-600">Select the organization to assign the new role.</p>
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col justify-center gap-2">
                                <label for="org_name" class="text-sm font-medium text-blue-900">Select
                                    Organization</label>
                                <select name="org_id"
                                    class="bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                                    @foreach ($organizations as $org)
                                        <option value="{{ $org->org_id }}">{{ $org->org_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="border-gray-200">

                {{-- Role Details --}}
                <div class="grid grid-cols-10 gap-10 items-start">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Role Details</h1>
                        <p class="text-sm italic text-gray-600">Define the name and description of the role</p>
                    </div>
                    <div class="col-span-6">
                        <div class="flex flex-col gap-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex flex-col justify-center gap-2">
                                    <label for="role_name" class="text-sm font-medium text-blue-900">Role
                                        Name</label>
                                    <input type="text" name="role_name" placeholder=""
                                        class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                                </div>
                            </div>
                            <div class="flex flex-col justify-center gap-2">
                                <label for="role_description"
                                    class="text-sm font-medium text-blue-900">Description</label>
                                <input type="text" name="role_description" placeholder=""
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="border-gray-200">

                {{-- Username --}}
                <div class="grid grid-cols-10 items-start gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Assign Module Access and Permission</h1>
                        <p class="text-sm italic text-gray-600">Grant specific access and permissions to roles by assigning relevant modules and their associated submodules.</p>
                    </div>
                    <div class="col-span-6">
                        @if ($modules)
                            <div class="flex flex-col gap-4">
                                @foreach ($modules as $module)
                                    <div
                                        class="flex flex-col gap-4 rounded border border-gray-200 bg-gray-50 p-5 text-sm shadow-sm">
                                        <div class="flex space-x-2">
                                            <div>
                                                <input type="checkbox"
                                                    class="module-checkbox rounded border border-gray-400"
                                                    name="module_id[]" value="{{ $module->module_id }}"
                                                    data-module-id="{{ $module->module_id }}"
                                                    id="module_{{ $module->module_id }}">
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="module_{{ $module->module_id }}"
                                                    class="font-medium text-blue-900">
                                                    {{ $module->module_name }}
                                                </label>
                                                <p class="text-gray-500 italic">
                                                    {{ $module->module_description }}
                                                </p>
                                            </div>
                                        </div>

                                        @foreach ($module->submodules as $submodule)
                                            <div class="ml-5 flex justify-between rounded bg-gray-100 p-3">
                                                <div class="flex items-center gap-2">
                                                    <input type="checkbox"
                                                        class="submodule-checkbox rounded border border-gray-400"
                                                        name="submodule_id[]" value="{{ $submodule->submodule_id }}"
                                                        data-module-id="{{ $module->module_id }}"
                                                        data-submodule-id="{{ $submodule->submodule_id }}"
                                                        id="submodule_{{ $submodule->submodule_id }}">
                                                    <label class="text-gray-700"
                                                        for="submodule_{{ $submodule->submodule_id }}">
                                                        {{ $submodule->submodule_name }}
                                                    </label>
                                                </div>
                                                <div class="flex gap-4">
                                                    @foreach ($permissions as $permission)
                                                        <div class="flex items-center gap-2">
                                                            <input type="checkbox"
                                                                name="permission_id[{{ $submodule->submodule_id }}][]"
                                                                value="{{ $permission->permission_id }}"
                                                                class="permission-checkbox rounded border border-gray-400"
                                                                data-module-id="{{ $module->module_id }}"
                                                                data-submodule-id="{{ $submodule->submodule_id }}"
                                                                id="permission_{{ $permission->permission_id }}">
                                                            <label class="text-gray-700"
                                                                for="permission_{{ $permission->permission_id }}">
                                                                {{ $permission->permission_name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>


                {{-- Button --}}
                <div class="grid grid-cols-10 items-center pt-8 gap-10">
                    <div class="col-span-4">
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-2 justify-between gap-2">
                            <div class="flex flex-col justify-center gap-2">
                                <Button type="submit"
                                    class="w-48 px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800">Add
                                    role</Button>
                            </div>
                        </div>
                    </div>
                </div>


            </form>


        </div>

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


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Handle module checkbox change
            document.querySelectorAll('.module-checkbox').forEach(moduleCheckbox => {
                moduleCheckbox.addEventListener('change', function() {
                    const moduleId = this.dataset.moduleId;
                    const isChecked = this.checked;

                    // Select all submodules and permissions under this module
                    document.querySelectorAll(`.submodule-checkbox[data-module-id="${moduleId}"]`)
                        .forEach(submodule => {
                            submodule.checked = isChecked;
                        });
                    document.querySelectorAll(`.permission-checkbox[data-module-id="${moduleId}"]`)
                        .forEach(permission => {
                            permission.checked = isChecked;
                        });
                });
            });

            // Handle submodule checkbox change
            document.querySelectorAll('.submodule-checkbox').forEach(submoduleCheckbox => {
                submoduleCheckbox.addEventListener('change', function() {
                    const moduleId = this.dataset.moduleId;
                    const submoduleId = this.dataset.submoduleId;
                    const isChecked = this.checked;

                    // Select or deselect permissions under this submodule
                    document.querySelectorAll(
                        `.permission-checkbox[data-submodule-id="${submoduleId}"]`).forEach(
                        permission => {
                            permission.checked = isChecked;
                        });

                    // If a submodule is selected, ensure the parent module is selected
                    if (isChecked) {
                        document.getElementById(`module_${moduleId}`).checked = true;
                    } else {
                        // If no submodules are selected under this module, uncheck the parent module
                        const allChecked = [...document.querySelectorAll(
                                `.submodule-checkbox[data-module-id="${moduleId}"]`)]
                            .some(submodule => submodule.checked);

                        if (!allChecked) {
                            document.getElementById(`module_${moduleId}`).checked = false;
                        }
                    }
                });
            });

            // Handle permission checkbox change
            document.querySelectorAll('.permission-checkbox').forEach(permissionCheckbox => {
                permissionCheckbox.addEventListener('change', function() {
                    const moduleId = this.dataset.moduleId;
                    const submoduleId = this.dataset.submoduleId;
                    const isChecked = this.checked;

                    // If a permission is selected, ensure the parent submodule and module are selected
                    if (isChecked) {
                        document.getElementById(`submodule_${submoduleId}`).checked = true;
                        document.getElementById(`module_${moduleId}`).checked = true;
                    } else {
                        // If no permissions are selected under this submodule, uncheck the submodule
                        const allChecked = [...document.querySelectorAll(
                                `.permission-checkbox[data-submodule-id="${submoduleId}"]`)]
                            .some(permission => permission.checked);

                        if (!allChecked) {
                            document.getElementById(`submodule_${submoduleId}`).checked = false;
                        }

                        // If no submodules or permissions are checked under the module, uncheck the module
                        const anySubmoduleChecked = [...document.querySelectorAll(
                                `.submodule-checkbox[data-module-id="${moduleId}"]`)]
                            .some(submodule => submodule.checked);

                        const anyPermissionChecked = [...document.querySelectorAll(
                                `.permission-checkbox[data-module-id="${moduleId}"]`)]
                            .some(permission => permission.checked);

                        if (!anySubmoduleChecked && !anyPermissionChecked) {
                            document.getElementById(`module_${moduleId}`).checked = false;
                        }
                    }
                });
            });
        });
    </script>

</x-app-layout>