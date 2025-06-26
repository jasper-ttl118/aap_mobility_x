
<form wire:submit="save" method="post" class="flex flex-col p-7 gap-7">
    @csrf
    @method('PUT')

    {{-- DELETING THIS SOON --}}
    <input type="hidden" value="{{ $employee->employee_id }}" name="employee_id" placeholder="Employee ID"
        class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 focus:outline-blue-500">


    {{-- Employee Name --}}
    <div class="grid grid-cols-10 items-center gap-10">
        <div class="col-span-4">
            <h1 class="font-medium text-blue-900">Employee Full Name</h1>
            <p class="text-sm italic text-gray-500">The information indicated here are from the employee
                database. If you want to change it, go to <a href="/employee"
                    class="font-semibold underline">Employee Management</a>.</p>
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
    <div class="grid grid-cols-10 items-center gap-10">
        <div class="col-span-4">
            <h1 class="font-medium text-blue-900">Update Username</h1>
            <p class="text-sm italic text-gray-600">Update username with unique alphanumeric
                combinations.</p>
        </div>
        <div class="col-span-6">
            <div class="grid grid-cols-3 justify-between gap-2">
                <div class="flex flex-col justify-center gap-2">
                    <label for="user_username" class="text-sm font-medium text-blue-900">Username</label>
                    <input type="text" value="{{ $user->user_name }}" name="user_name"
                        placeholder="e.g. username1213" wire:model="user_name";
                        class="h-10 rounded border border-gray-300 bg-gray-100 px-3 text-sm focus:outline-blue-500" />
                </div>
            </div>
        </div>
    </div>

    <hr class="border-gray-200">

    {{-- Organization and Role --}}
    <div class="grid grid-cols-10 items-center gap-10">
        <div class="col-span-4">
            <h1 class="font-medium text-blue-900">Reassign to Another Organization or Role</h1>
            <p class="text-sm italic text-gray-600">Change the user's assigned organization or role.</p>
        </div>
        <div class="col-span-6">
            <div class="grid grid-cols-3 justify-between gap-2">
                <div class="flex flex-col gap-2">
                    <label for="user_org" class="text-sm font-medium text-blue-900">Organization</label>
                    <select name="org_id" id="organization_dropdown" wire:model.change="organization"
                        class="h-10 rounded border border-gray-300 bg-gray-100 px-3 text-sm focus:outline-blue-50 pr-8">
                        @foreach ($org_with_roles as $orgs)
                            <option value="{{ $orgs->org_id }}"
                                {{ old('org_id', $orgs->org_id) == $user->org_id ? 'selected' : '' }}>
                                {{ $orgs->org_name }}</option>
                        @endforeach
                                <option value="2">TEST</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="user_role" class="text-sm font-medium text-blue-900">Role</label>
                    <select id="role_dropdown" name="role_id" wire:model="roles"
                        class="h-10 rounded border border-gray-300 bg-gray-100 px-3 text-sm focus:outline-blue-50 pr-8">
                        @forelse ($roles as $role)
                            <option value="{{ $role->org_id }}">{{ $role->role_name }}</option>
                        @empty
                            <option value="">No roles available for this organization</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
    </div>

    <hr class="border-gray-200">

    <div class="grid grid-cols-10 items-start gap-10">
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

    {{-- Password --}}
    <div class="grid grid-cols-10 items-center gap-10">
        <div class="col-span-4">
            <h1 class="font-medium text-blue-900">Change Password</h1>
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

    <hr class="border-gray-200">


    {{-- Set Status --}}

    <div class="grid grid-cols-10 items-center gap-10">
        <div class="col-span-4">
            <div class="flex gap-2 items-center">
                <h1 class="font-medium text-blue-900">Set Status</h1>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 text-blue-900">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd" />
                </svg> --}}
            </div>
            <p class="text-sm italic text-gray-600">
                Set the user as active or inactive.
            </p>
        </div>
        <div class="col-span-6">
            <div class="grid grid-cols-3 justify-between gap-2">
                <div class="flex flex-col justify-center gap-2">
                    <label for="user_status" class="text-sm font-medium text-blue-900">Status</label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="hidden" name="user_status" value="0">
                        <input type="checkbox" name="user_status" id="user_status"
                            class="sr-only peer toggle-checkbox"
                            {{ old('user_status', $user->user_status) == 1 ? 'checked' : '' }}
                            value="1" onchange="this.value = this.checked ? 1 : 0">
                        <div
                            class="relative w-14 h-8 bg-red-500 rounded-full 
                                    dark:bg-gray-700 
                                    peer 
                                    peer-checked:bg-green-600 
                                    dark:peer-checked:bg-green-600 
                                    peer-checked:after:translate-x-full 
                                    after:content-[''] 
                                    after:absolute 
                                    after:top-1 
                                    after:start-[4px] 
                                    after:w-6 
                                    after:h-6 
                                    after:bg-white 
                                    after:border 
                                    after:border-gray-100 
                                    after:rounded-full">
                        </div>
                        <span
                            class="toggle-label ms-3 font-medium text-sm text-gray-600 dark:text-gray-300">
                            {{ old('user_status', $user->user_status) == 1 ? 'Active' : 'Inactive' }}
                        </span>
                    </label>



                </div>
            </div>
        </div>
    </div>


    {{-- Button --}}
    <div class="grid grid-cols-10 items-center pt-8 gap-10">
        <div class="col-span-4">
        </div>
        <div class="col-span-6">
            <div class="grid grid-cols-3 justify-between gap-2">
                <div class="flex flex-col justify-center gap-2">
                    <Button type="submit"
                        class="w-36 bg-blue-900 text-white px-3 py-2 rounded-lg hover:bg-blue-800">Update</Button>
                </div>
            </div>
        </div>
    </div>




</form>