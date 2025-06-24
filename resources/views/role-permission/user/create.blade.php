<x-app-layout class='flex flex-row h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='RBAC Management'>

    <div class="flex flex-1 flex-col lg:ml-52 overflow-y-auto p-10 gap-7 bg-[#f3f4f6] mt-10">
        @if ($errors->any())
            <div id="toast-error"
                class="fixed top-5 right-5 z-50 flex flex-col w-full max-w-xs p-4 text-red-500 bg-white border border-red-300 rounded-lg shadow-sm transition-opacity duration-500 ease-in-out opacity-100 dark:bg-red-900 dark:text-red-200"
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

       
            

        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg overflow-x-auto hide-scrollbar flex-shrink-0">
            <div class="flex h-14 ">
                <div class="w-32 border-b-2 border-blue-900 p-4 text-center">
                    <a href="#" class="font-semibold text-blue-900 ">Users</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/organization" class="text-gray-600 hover:text-blue-800">Organizations</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/role" class="text-gray-600 hover:text-blue-800">Roles</a>
                </div>
                <div class="w-32 p-4 text-center">
                    <a href="/module" class="text-gray-600 hover:text-blue-800">Modules</a>
                </div>
                {{-- <div class="w-32 p-4 text-center">
                    <a href="/permission" class="text-gray-600 hover:text-blue-800">Permissions</a>
                </div> --}}
            </div>
        </div>
        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg -mt-4">
            <div class="px-7 pt-7 flex items-center gap-x-1 text-blue-900 text-sm">
                <a href="/user" class="hover:underline truncate">RBAC Management</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                        clip-rule="evenodd" />
                </svg>
                <a href="/user" class="hover:underline truncate">Users</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                        clip-rule="evenodd" />
                </svg>
                <a href="/user/search/find" class="hover:underline truncate">Search Employee Record</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                        clip-rule="evenodd" />
                </svg>
                <a href="#" class="hover:underline font-semibold truncate">Add Users</a>
            </div>

            <div class="flex flex-col px-7 pt-7 pb-3">
                <h1 class="font-semibold text-lg text-blue-900">Create User Account for
                    <span class="text-blue-900">{{ $employee->employee_firstname }}
                        {{ $employee->employee_lastname }}
                    </span>
                </h1>

                <p class="text-gray-900 text-sm">Set up a unique username and password for this employee.</p>

            </div>

            <form action="/user" method="post" class="flex flex-col p-7 gap-7">
                @csrf

                {{-- Hidden Input for Employee ID --}}
                <input type="hidden" value="{{ $employee->employee_id }}" name="employee_id" placeholder="Employee ID"
                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">


                {{-- Employee Name --}}
                <div class="grid lg:grid-cols-10 items-center gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Employee Full Name</h1>
                        <p class="text-sm italic text-gray-600">The information indicated here are from the employee
                            database.</p>
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-3 justify-between gap-2">
                            <div class="flex flex-col justify-center gap-2">
                                <label for="employee_firstname" class="text-sm font-medium text-blue-900">First
                                    Name</label>
                                <input disabled type="text" value="{{ $employee->employee_firstname }}"
                                    name="employee_firstname" placeholder="First Name"
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                            <div class="flex flex-col justify-center gap-2">
                                <label for="employee_middlename" class="text-sm font-medium text-blue-900">Middle
                                    Name</label>
                                <input disabled type="text" value="{{ $employee->employee_middlename }}"
                                    name="employee_firstname" placeholder="First Name"
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                            <div class="flex flex-col justify-center gap-2">
                                <label for="employee_lastname" class="text-sm font-medium text-blue-900">Last
                                    Name</label>
                                <input disabled type="text" value="{{ $employee->employee_lastname }}"
                                    name="employee_firstname" placeholder="First Name"
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="border-gray-200">

                {{-- Username --}}
                <div class="grid lg:grid-cols-10 items-center gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Create Username</h1>
                        <p class="text-sm italic text-gray-600">Create a unique username with alphanumeric
                            combinations.</p>
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-3 justify-between gap-2">
                            <div class="flex flex-col justify-center gap-2">
                                <label for="user_username" class="text-sm font-medium text-blue-900">Username</label>
                                <input type="text" value="" name="user_name"
                                    placeholder="e.g. username1213"
                                    class="h-10 rounded border border-gray-300 bg-gray-100 px-3 text-sm focus:outline-blue-500" />
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-200">

                {{-- Organization and Role --}}
                <div class="grid lg:grid-cols-10 items-center gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Assign an Organization and Role</h1>
                        <p class="text-sm italic text-gray-600">Select an organization and assign a corresponding role
                            to the user. If role is not in the selection, add new in the <a href="/role/create"
                                class="font-semibold underline" target=_parent>Role Management</a>.</p>
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-3 justify-between gap-2">
                            <div class="flex flex-col gap-2">
                                <label for="user_org" class="text-sm font-medium text-blue-900">Organization</label>
                                <select name="org_id" id="organization_dropdown"
                                    class="h-10 rounded border border-gray-300 bg-gray-100 px-3 text-sm focus:outline-blue-50 pr-8">
                                    @foreach ($org_with_roles as $orgs)
                                        <option value="{{ $orgs->org_id }}">{{ $orgs->org_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="user_role" class="text-sm font-medium text-blue-900">Role</label>
                                <select id="role_dropdown" name="role_id"
                                    class="h-10 rounded border border-gray-300 bg-gray-100 px-3 text-sm focus:outline-blue-50 pr-8">
                                    <option disabled selected> -- select an option -- </option>
                                    <option value="">Select an organization first</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-200">

                <div class="grid lg:grid-cols-10 items-start gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Assign Module Access and Permission</h1>
                        <p class="text-sm italic text-gray-600">Grant specific access and permissions to roles by
                            assigning relevant modules and their associated submodules.</p>
                    </div>
                    <div class="col-span-6">
                        <div id="modulesContainer" class="">
                            <p class="text-sm italic text-gray-400">Select a role to see the available modules.</p>
                        </div>
                    </div>
                </div>


                <hr class="border-gray-200">


                {{-- Password --}}

                <div class="grid lg:grid-cols-10 items-center gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Create Password</h1>
                        <p class="text-sm italic text-gray-600">Must be 6 to 12 characters long, including letters,
                            numbers, and at least one special character.</p>
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-3 justify-between gap-2">
                            <div class="flex flex-col justify-center gap-2">
                                <label for="user_password" class="text-sm font-medium text-blue-900">Password</label>
                                <input type="password" value="" name="user_password"
                                    class="h-10 rounded border border-gray-300 bg-gray-100 px-3 text-sm focus:outline-blue-500" />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Button --}}
                <div class="grid lg:grid-cols-10 items-center pt-8 gap-10">
                    <div class="col-span-4">
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-3 justify-between gap-2">
                            <div class="flex flex-col justify-center gap-2">
                                <Button type="submit"
                                    class="w-36 bg-blue-900 text-white px-3 py-2 rounded-lg hover:bg-blue-800">Add
                                    User</Button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Store all organization roles
            const orgRoles = @json($org_with_roles);

            // Get the dropdowns
            const orgDropdown = document.getElementById('organization_dropdown');
            const roleDropdown = document.getElementById('role_dropdown');

            // Function to update roles based on selected organization
            function updateRoles() {
                // Clear current options
                roleDropdown.innerHTML = '';

                // Add default placeholder option
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Please select a role';
                roleDropdown.appendChild(defaultOption);

                // Get selected organization ID
                const selectedOrgId = orgDropdown.value;

                // Find the selected organization in our data
                const selectedOrg = orgRoles.find(org => org.org_id == selectedOrgId);

                // If organization found and has roles
                if (selectedOrg && selectedOrg.roles && selectedOrg.roles.length > 0) {
                    // Add each role as an option
                    selectedOrg.roles.forEach(role => {
                        const option = document.createElement('option');
                        option.value = role.role_id;
                        option.textContent = role.role_name;
                        roleDropdown.appendChild(option);
                    });
                } else {
                    // No roles available
                    const option = document.createElement('option');
                    option.value = "";
                    option.textContent = "No roles available for this organization";
                    roleDropdown.appendChild(option);
                }
            }

            // Update roles when page loads
            updateRoles();

            // Update roles when organization selection changes
            orgDropdown.addEventListener('change', updateRoles);
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectElement = document.getElementById("role_dropdown");
            const container = document.getElementById("modulesContainer");
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            let
                originalRoleSelections = {}; // Store the original role's selected modules, submodules, and permissions
            let currentRoleId = null;
            let newRoleFieldAdded = false;

            if (!selectElement || !container || !csrfTokenMeta) {
                console.error("Missing required elements: role dropdown, modules container, or CSRF token.");
                return;
            }

            const fetchRoleModules = (selectedValue) => {
                fetch('/user/get-role', {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfTokenMeta.content
                        },
                        body: JSON.stringify({
                            selectedValue: selectedValue
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Response:", data);
                        container.innerHTML = ""; // Clear previous content

                        // Reset tracking variables
                        originalRoleSelections = {
                            modules: new Set(),
                            submodules: new Set(),
                            permissions: new Set()
                        };
                        currentRoleId = selectedValue;
                        newRoleFieldAdded = false;
                        removeNewRoleField(); // Remove any existing new role field

                        if (data.selected_role && data.selected_role.prepared_modules) {
                            let html = '<div class="flex flex-col gap-4">';

                            // Loop through all modules
                            data.all_modules.forEach(module => {
                                // Check if this module is assigned to the role
                                let assignedModule = data.selected_role.prepared_modules.find(m =>
                                    m.module_id === module.module_id);

                                let isModuleChecked = assignedModule !== undefined;

                                // Store original selections
                                if (isModuleChecked) {
                                    originalRoleSelections.modules.add(module.module_id);
                                }

                                html += `
                        <div class="flex flex-col gap-4 rounded border border-gray-200 bg-gray-50 p-5 text-sm shadow-sm">
                            <div class="flex space-x-2">
                                <input type="checkbox" class="module-checkbox rounded border border-gray-400"
                                    name="module_id[]" value="${module.module_id}" data-module-id="${module.module_id}"
                                    id="module_${module.module_id}" ${isModuleChecked ? 'checked' : ''}>

                                <div class="flex flex-col text-start">
                                    <label for="module_${module.module_id}" class="font-medium text-blue-900">
                                        ${module.module_name}
                                    </label>
                                    <p class="text-gray-500 italic">
                                        ${module.module_description || 'No description available'}
                                    </p>
                                </div>
                            </div>

                            <div class="mt-3 space-y-2">`;

                                // Find submodules related to this module
                                const relatedSubmodules = data.submodules.filter(sub => sub
                                    .module_id === module.module_id);

                                relatedSubmodules.forEach(submodule => {
                                    // Check if this submodule is assigned to the role
                                    let isSubmoduleChecked = false;
                                    let assignedSubmodule = null;

                                    if (assignedModule) {
                                        assignedSubmodule = assignedModule.submodules.find(
                                            s => s.submodule_id === submodule
                                            .submodule_id);
                                        isSubmoduleChecked = Array.isArray(assignedSubmodule
                                                .permissions) &&
                                            assignedSubmodule.permissions.length > 0;
                                    }

                                    // Store original selections
                                    if (isSubmoduleChecked) {
                                        originalRoleSelections.submodules.add(submodule
                                            .submodule_id);
                                    }

                                    console.log(assignedSubmodule + isSubmoduleChecked);

                                    html += `
                            <div class="flex justify-between items-center bg-gray-100 rounded-lg p-3">
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" class="submodule-checkbox w-4 h-4 rounded border-gray-400"
                                        name="submodule_id[]" value="${submodule.submodule_id}"
                                        data-module-id="${module.module_id}" data-submodule-id="${submodule.submodule_id}"
                                        id="submodule_${submodule.submodule_id}" ${isSubmoduleChecked ? 'checked' : ''}>
                                    <label for="submodule_${submodule.submodule_id}" class="text-gray-700">
                                        ${submodule.submodule_name}
                                    </label>
                                </div>

                                <div class="flex gap-4">`;

                                    // Find permissions for this specific submodule
                                    const relevantPermissions = data.permissions.filter(
                                        permission => permission.submodule_id ===
                                        submodule.submodule_id
                                    );

                                    // If there are no permissions with direct submodule_id, 
                                    // we need to check the permission's structure
                                    let permissionsToDisplay = relevantPermissions.length >
                                        0 ?
                                        relevantPermissions : data.permissions;

                                    permissionsToDisplay.forEach(permission => {
                                        // Check if this permission is assigned to the role through the assigned submodule
                                        let isPermissionChecked = false;

                                        if (assignedSubmodule && assignedSubmodule
                                            .permissions) {
                                            isPermissionChecked = assignedSubmodule
                                                .permissions.some(p =>
                                                    p.permission_id === permission
                                                    .permission_id
                                                );
                                        }

                                        // Store original selections
                                        if (isPermissionChecked) {
                                            originalRoleSelections.permissions.add(
                                                submodule
                                                .submodule_id + '_' +
                                                permission.permission_id);
                                        }

                                        html += `
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" 
                                        name="permission_id[${submodule.submodule_id}][]" 
                                        value="${permission.permission_id}"
                                        class="permission-checkbox w-4 h-4 rounded border-gray-400"
                                        data-module-id="${module.module_id}"
                                        data-submodule-id="${submodule.submodule_id}"
                                        data-permission-id="${permission.permission_id}"
                                        id="permission_${submodule.submodule_id}_${permission.permission_id}"
                                        ${isPermissionChecked ? 'checked' : ''}>
                                    <label for="permission_${submodule.submodule_id}_${permission.permission_id}" class="text-gray-700">
                                        ${permission.permission_name}
                                    </label>
                                </div>`;
                                    });

                                    html += `</div></div>`;
                                });

                                html += `</div></div>`;
                            });

                            html += `</div>
                    <div id="newRoleContainer" class="mt-6" style="display: none;">
                        <div class="flex items-center gap-3 bg-blue-50 p-4 rounded-lg border border-blue-200">
                            <div class="text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-blue-900">You've selected options not in the current role.</p>
                                <p class="text-sm text-blue-700 mt-1">A new role will be created with your selections.</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="new_role_name" class="block text-sm font-medium text-gray-700 mb-1">New Role Name</label>
                            <input type="text" id="new_role_name" name="new_role_name" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500">
                            <input type="hidden" id="is_new_role" name="is_new_role" value="0">
                        </div>
                        <div class="mt-4">
                            <label for="new_role_description" class="block text-sm font-medium text-gray-700 mb-1">Description:</label>
                            <input type="text" id="new_role_description" name="new_role_description" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500">
                        </div>
                    </div>`;

                            container.innerHTML = html;

                            // Add event listeners for nested checkboxes behavior
                            addCheckboxListeners();

                        } else {
                            container.innerHTML =
                                `<p class="text-gray-500 italic">No modules available for this role.</p>`;
                        }
                    })
                    .catch(error => console.error("Error:", error));
            };

            // Check if selections match the original role exactly
            const checkSelectionsMatchOriginal = () => {
                // Get all currently checked modules, submodules and permissions
                const checkedModules = new Set();
                const checkedSubmodules = new Set();
                const checkedPermissions = new Set();

                console.log("Original Role Selections are" + Array.from(originalRoleSelections.modules) +
                    " and original submodules are" + Array.from(originalRoleSelections.submodules) +
                    " and original Permissions are" + Array.from(originalRoleSelections.permissions));

                console.log("Checked Modules " + Array.from(checkedModules) +
                    " and checked submodules are" + Array.from(checkedSubmodules) +
                    " and checked Permissions are" + Array.from(checkedPermissions));

                document.querySelectorAll('.module-checkbox:checked').forEach(checkbox => {
                    checkedModules.add(checkbox.value);
                });

                document.querySelectorAll('.submodule-checkbox:checked').forEach(checkbox => {
                    checkedSubmodules.add(checkbox.value);

                });

                document.querySelectorAll('.permission-checkbox:checked').forEach(checkbox => {
                    const permissionId = checkbox.getAttribute('data-permission-id');
                    const submoduleId = checkbox.getAttribute('data-submodule-id');

                    // Concatenate submoduleId and permissionId
                    const combinedId = `${submoduleId}_${permissionId}`;

                    checkedPermissions.add(combinedId);
                });

                // Check if sizes match first (quick check)
                if (checkedModules.size !== originalRoleSelections.modules.size ||
                    checkedSubmodules.size !== originalRoleSelections.submodules.size ||
                    checkedPermissions.size !== originalRoleSelections.permissions.size) {
                    console.log("Problem in size check.");

                    return false;;
                }

                // Check if all original modules are checked
                for (const moduleId of originalRoleSelections.modules) {
                    if (!checkedModules.has(moduleId)) {
                        console.log("Problem in Modules Checked Modules are" + Array.from(checkedModules) +
                            " and original modules are" + Array.from(originalRoleSelections.modules));
                        toggleNewRoleField(false);
                        return false;
                    }
                }

                // Check if all original submodules are checked
                for (const submoduleId of originalRoleSelections.submodules) {
                    if (!checkedSubmodules.has(submoduleId)) {
                        console.log("Problem in Modules Checked Submodules are" + Array.from(
                            checkedSubmodules) + " and original submodules are" + Array.from(
                            originalRoleSelections.submodules));
                        toggleNewRoleField(false);
                        return false;
                    }
                }

                // Check if all original permissions are checked
                for (const permissionId of originalRoleSelections.permissions) {
                    if (!checkedPermissions.has(permissionId)) {
                        console.log("Problem in Modules Checked Permissions are" + Array.from(
                            checkedPermissions) + " and original Permissions are" + Array.from(
                            originalRoleSelections.permissions));
                        toggleNewRoleField(false);
                        return false;
                    }
                }

                // Check if there are any additional modules checked
                for (const moduleId of checkedModules) {
                    if (!originalRoleSelections.modules.has(moduleId)) {
                        console.log("Problem in Modules Add");
                        return false;
                    }
                }

                // Check if there are any additional submodules checked
                for (const submoduleId of checkedSubmodules) {
                    if (!originalRoleSelections.submodules.has(submoduleId)) {
                        console.log("Problem in Submodules Add");
                        return false;
                    }
                }

                // Check if there are any additional permissions checked
                for (const permissionId of checkedPermissions) {
                    if (!originalRoleSelections.permissions.has(permissionId)) {
                        console.log("Problem in Permissions Add");
                        return false;


                    }
                }

                // If we get here, everything matches exactly
                return true;
                console.log("Selections match original role.");
            };


            // Check if selections have been modified from original role
            const checkForModifications = () => {
                return !checkSelectionsMatchOriginal();
            };

            // Toggle new role field visibility
            const toggleNewRoleField = (show) => {
                const newRoleContainer = document.getElementById('newRoleContainer');
                const isNewRoleInput = document.getElementById('is_new_role');

                if (newRoleContainer) {
                    if (show) {
                        // Show the container and set required
                        const nameField = document.getElementById('new_role_name');
                        const descField = document.getElementById('new_role_description');

                        if (nameField) {
                            nameField.setAttribute('required', ''); // Set required when shown
                        }

                        if (descField) {
                            descField.setAttribute('required', ''); // Set required when shown
                        }
                    } else {
                        // Clear fields and remove required attribute when hiding
                        const nameField = document.getElementById('new_role_name');
                        const descField = document.getElementById('new_role_description');

                        if (nameField) {
                            nameField.value = '';
                            nameField.removeAttribute('required'); // Remove required when hidden
                        }

                        if (descField) {
                            descField.value = '';
                            descField.removeAttribute('required'); // Remove required when hidden
                        }
                    }

                    // Toggle visibility
                    newRoleContainer.style.display = show ? 'block' : 'none';

                    if (isNewRoleInput) {
                        isNewRoleInput.value = show ? '1' : '0';
                    }
                }
            };

            // Remove the new role field
            const removeNewRoleField = () => {
                toggleNewRoleField(false);
            };


















            // Function to add checkbox relationship behavior
            const addCheckboxListeners = () => {
                // Module checkboxes control their submodules
                document.querySelectorAll('.module-checkbox').forEach(moduleCheckbox => {
                    moduleCheckbox.addEventListener('change', function() {
                        const moduleId = this.getAttribute('data-module-id');
                        const submoduleCheckboxes = document.querySelectorAll(
                            `.submodule-checkbox[data-module-id="${moduleId}"]`);

                        submoduleCheckboxes.forEach(checkbox => {
                            checkbox.checked = this.checked;
                            // Trigger change event to update permissions
                            const event = new Event('change');
                            checkbox.dispatchEvent(event);
                        });

                        // Check if we need to show the new role field
                        const isModified = checkForModifications();
                        toggleNewRoleField(isModified);
                    });
                });

                // Submodule checkboxes control their permissions
                document.querySelectorAll('.submodule-checkbox').forEach(submoduleCheckbox => {
                    submoduleCheckbox.addEventListener('change', function() {
                        const moduleId = this.getAttribute('data-module-id');
                        const submoduleId = this.getAttribute('data-submodule-id');
                        const permissionCheckboxes = document.querySelectorAll(
                            `.permission-checkbox[data-module-id="${moduleId}"][data-submodule-id="${submoduleId}"]`
                        );

                        permissionCheckboxes.forEach(checkbox => {
                            checkbox.checked = this.checked;
                        });

                        // Check parent modules when submodule is checked
                        if (this.checked) {
                            const moduleCheckbox = document.querySelector(
                                `.module-checkbox[data-module-id="${moduleId}"]`
                            );
                            if (moduleCheckbox) {
                                moduleCheckbox.checked = true;
                            }
                        } else {
                            // Check if all submodules are unchecked, then uncheck the module
                            checkModuleStatus(moduleId);
                        }

                        // Check if we need to show the new role field
                        const isModified = checkForModifications();
                        toggleNewRoleField(isModified);
                    });
                });

                // When permission is checked, ensure its parent submodule and module are checked
                document.querySelectorAll('.permission-checkbox').forEach(permissionCheckbox => {
                    permissionCheckbox.addEventListener('change', function() {
                        const moduleId = this.getAttribute('data-module-id');
                        const submoduleId = this.getAttribute('data-submodule-id');

                        if (this.checked) {
                            // Check the parent submodule
                            const submoduleCheckbox = document.querySelector(
                                `.submodule-checkbox[data-module-id="${moduleId}"][data-submodule-id="${submoduleId}"]`
                            );
                            if (submoduleCheckbox) {
                                submoduleCheckbox.checked = true;
                            }

                            // Check the parent module
                            const moduleCheckbox = document.querySelector(
                                `.module-checkbox[data-module-id="${moduleId}"]`
                            );
                            if (moduleCheckbox) {
                                moduleCheckbox.checked = true;
                            }
                        }

                        // Check if all permissions are unchecked, then uncheck submodule
                        const permissionCheckboxes = document.querySelectorAll(
                            `.permission-checkbox[data-module-id="${moduleId}"][data-submodule-id="${submoduleId}"]`
                        );

                        const allUnchecked = Array.from(permissionCheckboxes).every(checkbox =>
                            !checkbox.checked);
                        if (allUnchecked) {
                            const submoduleCheckbox = document.querySelector(
                                `.submodule-checkbox[data-module-id="${moduleId}"][data-submodule-id="${submoduleId}"]`
                            );
                            if (submoduleCheckbox) {
                                submoduleCheckbox.checked = false;

                                // Now check if we need to update the module status
                                checkModuleStatus(moduleId);
                            }
                        }

                        // Check if we need to show the new role field
                        const isModified = checkForModifications();
                        toggleNewRoleField(isModified);
                    });
                });

                // Helper function to check if all submodules are unchecked and update module accordingly
                function checkModuleStatus(moduleId) {
                    const submoduleCheckboxes = document.querySelectorAll(
                        `.submodule-checkbox[data-module-id="${moduleId}"]`
                    );

                    const allSubmodulesUnchecked = Array.from(submoduleCheckboxes).every(checkbox =>
                        !checkbox.checked);

                    if (allSubmodulesUnchecked) {
                        const moduleCheckbox = document.querySelector(
                            `.module-checkbox[data-module-id="${moduleId}"]`
                        );
                        if (moduleCheckbox) {
                            moduleCheckbox.checked = false;
                        }
                    }
                }
            };













            // Add restore original role button
            const addRestoreButton = () => {
                const newRoleContainer = document.getElementById('newRoleContainer');
                if (newRoleContainer) {
                    const restoreButton = document.createElement('button');
                    restoreButton.type = 'button';
                    restoreButton.className =
                        'mt-4 px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors';
                    restoreButton.textContent = 'Restore Original Role';
                    restoreButton.id = 'restoreOriginalRole';

                    restoreButton.addEventListener('click', function() {
                        restoreOriginalSelections();
                    });

                    newRoleContainer.appendChild(restoreButton);
                }
            };



            // Restore original selections
            const restoreOriginalSelections = () => {
                // Uncheck all checkboxes first
                document.querySelectorAll('.module-checkbox, .submodule-checkbox, .permission-checkbox')
                    .forEach(checkbox => {
                        checkbox.checked = false;
                    });

                // Check original modules
                originalRoleSelections.modules.forEach(moduleId => {
                    const moduleCheckbox = document.querySelector(
                        `.module-checkbox[data-module-id="${moduleId}"]`);
                    if (moduleCheckbox) {
                        moduleCheckbox.checked = true;
                    }
                });

                // Check original submodules
                originalRoleSelections.submodules.forEach(submoduleId => {
                    document.querySelectorAll(`.submodule-checkbox`).forEach(checkbox => {
                        if (checkbox.value === submoduleId) {
                            checkbox.checked = true;
                        }
                    });
                });

                // Check original permissions
                originalRoleSelections.permissions.forEach(permissionId => {
                    document.querySelectorAll(`.permission-checkbox`).forEach(checkbox => {
                        if (checkbox.getAttribute('data-permission-id') === permissionId) {
                            checkbox.checked = true;
                        }
                    });
                });

                // Hide new role field as we've restored to original
                removeNewRoleField();
            };




            // Form submission handling
            const formElement = selectElement.closest('form');
            if (formElement) {
                formElement.addEventListener('submit', function(e) {
                    // If new role field is shown but empty, prevent submission
                    if (newRoleFieldAdded) {
                        const newRoleName = document.getElementById('new_role_name').value.trim();
                        if (!newRoleName) {
                            e.preventDefault();
                            alert('Please enter a name for the new role.');
                            return false;
                        }
                    }
                    return true;
                });
            }

            // Fetch on page load if a role is preselected
            if (selectElement.value) {
                fetchRoleModules(selectElement.value);
            }

            // Fetch on dropdown change
            selectElement.addEventListener("change", function() {
                fetchRoleModules(this.value);
            });



            modulesContainer.addEventListener('change', function(event) {

                console.log("Clicked inside modulesContainer");
                console.log(checkSelectionsMatchOriginal());
            });

        });
    </script>

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
