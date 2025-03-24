<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Roles</title>
    @include("layouts.icons")
    @vite('resources/css/app.css')
</head>

<body class="flex flex-row h-screen">
    @include('layouts.navbar')
    <div class="flex flex-col w-full ml-64 overflow-y-auto py-6">
        @if ($errors->any())
            <div id="toast-error" class="fixed top-5 right-5 z-50 flex flex-col max-w-xs p-4 text-red-500 bg-white border border-red-300 rounded-lg shadow-sm transition-opacity duration-500 ease-in-out opacity-100 dark:bg-red-900 dark:text-red-200" role="alert">
                <div class="flex items-center">
                    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm-1 5a1 1 0 0 1 2 0v4a1 1 0 0 1-2 0V5Zm1 7a1.25 1.25 0 1 1-1.25 1.25A1.25 1.25 0 0 1 10 12Z"/>
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <span class="ms-3 font-semibold">Error:</span>
                    <button type="button" onclick="closeErrorToast()" class="ms-auto -mx-1.5 -my-1.5 bg-white text-red-400 hover:text-red-900 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:text-red-500 dark:hover:text-white dark:bg-red-800 dark:hover:bg-red-700" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
        <form action="{{ url('role/'.$role->role_id) }}"  method="post" class="mx-auto max-w-7xl bg-white shadow-md rounded-lg border border-gray-200">
            @csrf
            @method('PUT')
            <div class="text-gray-700 p-8 space-y-6">
                <!-- Heading -->
                <div class="border-b border-gray-200 pb-5">
                    <h1 class="text-xl font-bold uppercase">Edit New Role</h1>
                    <p class="text-sm text-gray-600">
                        Update selected role and re-assign it with different organization and or give access to different system modules.
                    </p>
                </div>

                <!-- Select Organization for the Role -->
                <div>
                    <label for="role_org" class="font-medium">Select Organization</label>
                    <select name="org_id"
                        class="w-full bg-gray-100 h-12 rounded border border-gray-300 px-4 mt-1 focus:outline-blue-500">
                        @foreach ($organizations as $org)
                            <option value={{ $org->org_id }} 
                                {{ old('org_id', $role->org_id) == $org->org_id ? 'selected' : '' }}>
                                {{ $org->org_name }}</option>
                        @endforeach
                    </select>
                </div>
        
                <!-- Role Name -->
                <div>
                    <label for="role_name" class="font-medium">Role Name</label>
                    <input type="text" name="role_name" value="{{ $role->role_name }}" placeholder="Enter Role Name"
                        class="w-full bg-gray-100 h-12 rounded border border-gray-300 px-4 mt-1 focus:outline-blue-500">
                </div>

                <!-- Role Description -->
                <div>
                    <label for="role_description" class="font-medium">Description</label>
                    <input type="text" name="role_description" value="{{ $role->role_description }}" placeholder="Description"
                        class="w-full bg-gray-100 h-12 rounded border border-gray-300 px-4 mt-1 focus:outline-blue-500">
                </div>

                {{-- status --}}
                <div class="grid grid-cols-2 gap-2">
                    <div>
                    <label for="role_status" class="font-medium">Set Status</label>
                    <select name="role_status" class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 mt-1 focus:outline-blue-500">
                        <option value='1' @selected(intval(old('role_status', $role->role_status)) === 1)>Active</option>
                        <option value='0' @selected(intval(old('role_status', $role->role_status)) === 0)>Inactive</option>
                    </select>
                    </div>
                </div>
        
                <!-- Display Modules and Permissions -->
                @if ($selected_role->prepared_modules)
                <div>
                    <label for="role_modules" class="font-medium">Assign Modules and Permissions</label>
                    <table class="w-full mt-1 border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-6 py-3">Modules</th>
                                <th class="border border-gray-300 px-6 py-3">Sub-Modules</th>
                                <th class="border border-gray-300 px-6 py-3">Permissions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_modules as $module)
                            @php
                                $rowspan = count($module->submodules); // Corrected to count submodules for proper rowspan
                            @endphp
                            @foreach ($module->submodules as $index => $submodule)
                                <tr>
                                    @if ($index === 0)
                                        <td class="border border-gray-300 px-6 py-3 font-semibold" rowspan="{{ $rowspan }}">
                                            <input type="checkbox" 
                                                class="module-checkbox"
                                                name="module_id[]"
                                                value="{{ $module->module_id }}" 
                                                data-module-id="{{ $module->module_id }}" 
                                                id="module_{{ $module->module_id }}"
                                                {{ in_array($module['module_id'], array_column($selected_role->prepared_modules, 'module_id')) ? 'checked' : '' }}>
                                            {{ $module->module_name }}
                                        </td>
                                    @endif
                                    <td class="border border-gray-300 px-6 py-3">
                                        <input type="checkbox" 
                                            class="submodule-checkbox" 
                                            name="submodule_id[]" 
                                            value="{{ $submodule->submodule_id }}" 
                                            data-module-id="{{ $module->module_id }}" 
                                            data-submodule-id="{{ $submodule->submodule_id }}" 
                                            id="submodule_{{ $submodule->submodule_id }}"
                                            {{ collect($selected_role->prepared_modules)
                                                ->firstWhere('module_id', $module->module_id) 
                                                ? collect(collect($selected_role->prepared_modules)
                                                    ->firstWhere('module_id', $module->module_id)['submodules'])
                                                    ->firstWhere('submodule_id', $submodule->submodule_id)['permissions'] ?? [] 
                                                    ? 'checked' : ''
                                                : '' 
                                            }}
                                            >
                                        {{ $submodule->submodule_name }}
                                    </td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        <div class="flex gap-2">
                                            @foreach ($permissions as $permission)
                                                <label>
                                                    <input type="checkbox"
                                                        name="permission_id[{{ $submodule->submodule_id }}][]" 
                                                        value="{{ $permission->permission_id }}"  
                                                        class="permission-checkbox" 
                                                        data-module-id="{{ $module->module_id }}" 
                                                        data-submodule-id="{{ $submodule->submodule_id }}" 
                                                        id="permission_"
                                                        {{ collect($selected_role->prepared_modules)
                                                            ->flatMap->submodules
                                                            ->filter(fn ($s) => $s['submodule_id'] === $submodule->submodule_id) // Match specific submodule
                                                            ->flatMap->permissions // Flatten permissions directly
                                                            ->pluck('permission_id')
                                                            ->contains($permission->permission_id) ? 'checked' : '' }}>
                                                    {{ $permission->permission_name }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        
                <!-- Submit Button -->
                <button type="submit"
                    class="mt-6 w-full bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition duration-200">
                    Update
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


    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Handle module checkbox change
        document.querySelectorAll('.module-checkbox').forEach(moduleCheckbox => {
            moduleCheckbox.addEventListener('change', function () {
                const moduleId = this.dataset.moduleId;
                const isChecked = this.checked;

                // Select all submodules and permissions under this module
                document.querySelectorAll(`.submodule-checkbox[data-module-id="${moduleId}"]`).forEach(submodule => {
                    submodule.checked = isChecked;
                });
                document.querySelectorAll(`.permission-checkbox[data-module-id="${moduleId}"]`).forEach(permission => {
                    permission.checked = isChecked;
                });
            });
        });

        // Handle submodule checkbox change
        document.querySelectorAll('.submodule-checkbox').forEach(submoduleCheckbox => {
            submoduleCheckbox.addEventListener('change', function () {
                const moduleId = this.dataset.moduleId;
                const submoduleId = this.dataset.submoduleId;
                const isChecked = this.checked;

                // Select or deselect permissions under this submodule
                document.querySelectorAll(`.permission-checkbox[data-submodule-id="${submoduleId}"]`).forEach(permission => {
                    permission.checked = isChecked;
                });

                // If a submodule is selected, ensure the parent module is selected
                if (isChecked) {
                    document.getElementById(`module_${moduleId}`).checked = true;
                } else {
                    // If no submodules are selected under this module, uncheck the parent module
                    const allChecked = [...document.querySelectorAll(`.submodule-checkbox[data-module-id="${moduleId}"]`)]
                        .some(submodule => submodule.checked);

                    if (!allChecked) {
                        document.getElementById(`module_${moduleId}`).checked = false;
                    }
                }
            });
        });

        // Handle permission checkbox change
        document.querySelectorAll('.permission-checkbox').forEach(permissionCheckbox => {
            permissionCheckbox.addEventListener('change', function () {
                const moduleId = this.dataset.moduleId;
                const submoduleId = this.dataset.submoduleId;
                const isChecked = this.checked;

                // If a permission is selected, ensure the parent submodule and module are selected
                if (isChecked) {
                    document.getElementById(`submodule_${submoduleId}`).checked = true;
                    document.getElementById(`module_${moduleId}`).checked = true;
                } else {
                    // If no permissions are selected under this submodule, uncheck the submodule
                    const allChecked = [...document.querySelectorAll(`.permission-checkbox[data-submodule-id="${submoduleId}"]`)]
                        .some(permission => permission.checked);

                    if (!allChecked) {
                        document.getElementById(`submodule_${submoduleId}`).checked = false;
                    }

                    // If no submodules or permissions are checked under the module, uncheck the module
                    const anySubmoduleChecked = [...document.querySelectorAll(`.submodule-checkbox[data-module-id="${moduleId}"]`)]
                        .some(submodule => submodule.checked);

                    const anyPermissionChecked = [...document.querySelectorAll(`.permission-checkbox[data-module-id="${moduleId}"]`)]
                        .some(permission => permission.checked);

                    if (!anySubmoduleChecked && !anyPermissionChecked) {
                        document.getElementById(`module_${moduleId}`).checked = false;
                    }
                }
            });
        });
    });
</script>

</body>


</html>