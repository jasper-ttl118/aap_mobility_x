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
            <a href="#" class="hover:underline font-semibold">Edit Organization</a>
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
                <div class="w-32 border-b-2 border-blue-900 p-4 text-center">
                    <a href="/organization" class="font-semibold text-blue-900">Organizations</a>
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

            <div class="flex flex-col px-7 pt-7 pb-3">
                <h1 class="font-semibold text-lg text-blue-900">Edit Organization | <span
                        class="text-gray-500">{{ $organization->org_name }}</span></a></h1>
                <p class="text-gray-900 text-sm">Set up your organization.</p>

            </div>

            <form action="{{ url('organization/' . $organization->org_id) }}" method="post"
                enctype="multipart/form-data" class="flex flex-col p-7 gap-7">
                @csrf
                @method('PUT')

                {{-- Organization Name --}}
                <div class="grid grid-cols-10 gap-10 items-start">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Organization Details</h1>
                        <p class="text-sm italic text-gray-600">Create a unique organization name with description</p>
                    </div>
                    <div class="col-span-6">
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col justify-center gap-2">
                                <label for="org_name" class="text-sm font-medium text-blue-900">Organization
                                    Name</label>
                                <input type="text" name="org_name" placeholder=""
                                    value="{{ $organization->org_name }}"
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                            <div class="flex flex-col justify-center gap-2">
                                <label for="org_description"
                                    class="text-sm font-medium text-blue-900">Description</label>
                                <input type="text" name="org_description" placeholder=""
                                    value="{{ $organization->org_description }}"
                                    class="w-full bg-gray-100 h-10 rounded border border-gray-300 px-3 text-sm focus:outline-blue-500">
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="border-gray-200">

                <div class="grid grid-cols-10 items-start gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Customize with Color</h1>
                        <p class="text-sm italic text-gray-600">Select organization to customize its badges, container,
                            etc. across all the users</p>
                    </div>
                    <div class="col-span-6">
                        <div class="">
                            <div class="flex flex-col gap-2">
                                <label for="org_color" class="text-sm font-medium text-blue-900">Select Color</label>
                                <div class="flex gap-2">
                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            {{ old('org_color', $organization->org_color) == 'bg-red-500 text-red-50' ? 'checked' : '' }}
                                            value="bg-red-500 text-red-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-red-500 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            {{ old('org_color', $organization->org_color) == 'bg-orange-500 text-orange-50' ? 'checked' : '' }}
                                            value="bg-orange-500 text-orange-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-orange-500 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            {{ old('org_color', $organization->org_color) == 'bg-amber-500 text-amber-50' ? 'checked' : '' }}
                                            value="bg-amber-500 text-amber-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-amber-500 text-orange-900 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            {{ old('org_color', $organization->org_color) == 'bg-lime-500 text-lime-50' ? 'checked' : '' }}
                                            value="bg-lime-500 text-lime-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-lime-500 text-green-900 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            {{ old('org_color', $organization->org_color) == 'bg-teal-500 text-teal-50' ? 'checked' : '' }}
                                            value="bg-teal-500 text-teal-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-teal-500 text-teal-50 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            {{ old('org_color', $organization->org_color) == 'bg-aky-500 text-sky-50' ? 'checked' : '' }}
                                            value="bg-sky-500 text-sky-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-sky-500 text-sky-50 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            {{ old('org_color', $organization->org_color) == 'bg-indigo-500 text-indigo-50' ? 'checked' : '' }}
                                            value="bg-indigo-500 text-indigo-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-indigo-500 text-indigo-50 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            {{ old('org_color', $organization->org_color) == 'bg-fuchsia-500 text-fuchsia-50' ? 'checked' : '' }}
                                            value="bg-fuchsia-500 text-fuchsia-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-fuchsia-500 text-fuchsia-50 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            {{ old('org_color', $organization->org_color) == 'bg-rose-500 text-rose-50' ? 'checked' : '' }}
                                            value="bg-rose-500 text-rose-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-rose-500 text-rose-50 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>

                                    <label class="flex cursor-pointer items-center">
                                        <input type="radio" name="org_color" class="peer hidden"
                                            {{ old('org_color', $organization->org_color) == 'bg-slate-500 text-slate-50' ? 'checked' : '' }}
                                            value="bg-slate-500 text-slate-50" />
                                        <div
                                            class="h-10 w-10 rounded-full border-2 border-gray-100 bg-slate-500 text-slate-50 peer-checked:border-4 peer-checked:border-blue-500">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="border-gray-200">

                {{-- Org Logo --}}
                <div class="grid grid-cols-10 items-start gap-10">
                    <div class="col-span-4">
                        <h1 class="font-medium text-blue-900">Upload Organization Logo</h1>
                        <p class="text-sm italic text-gray-600">The file upload only allows image types like jpg, jpeg,
                            png, and gif </p>
                    </div>
                    <div class="col-span-6">
                        <div class="flex flex-col justify-between gap-4">
                            <div class="flex flex-col items start gap-2">
                                <label for="org_logo" class="text-sm font-medium text-blue-900">Upload Logo</label>
                                <input type="file" name="org_logo" onchange="loadFile(event)" placeholder="he"
                                    class="rounded border border-gray-300 bg-gray-100 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:bg-gray-200 file:text-gray-500 cursor-pointer file:cursor-pointer" />
                            </div>
                            <div class="flex flex-col items-start gap-2 shrink-0">
                                <label for="org_logo_preview" class="text-sm font-medium text-blue-900"
                                    accept="image/*">Preview</label>
                                <img id='preview_img' class="object-contain rounded w-full h-80 bg-gray-200"
                                    src="{{ asset('storage/' . $organization->org_logo) }}"
                                    alt="Current profile photo" />
                            </div>
                        </div>
                    </div>
                </div>

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
                            Set the organization as active or inactive.
                        </p>
                    </div>
                    <div class="col-span-6">
                        <div class="">
                            <div class="flex flex-col justify-center gap-2">
                                <label for="org_status" class="text-sm font-medium text-blue-900">Status</label>
                                <div class="flex items-center gap-1">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <!-- Hidden input to send '0' if checkbox is unchecked -->
                                        <input type="hidden" name="org_status" value="0">
                                        <input type="checkbox" name="org_status" id="org_status"
                                            class="sr-only peer toggle-checkbox"
                                            {{ old('org_status', $organization->org_status) == 1 ? 'checked' : '' }}
                                            value="1">
                                        <div
                                            class="relative w-16 h-8 bg-red-500 rounded-full 
                                                    dark:bg-gray-700 
                                                    peer 
                                                    peer-checked:bg-green-600 
                                                    dark:peer-checked:bg-green-600 
                                                    peer-checked:after:translate-x-8 
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
                                    </label>
                                    <span
                                        class="toggle-label ms-3 font-medium text-sm text-gray-600 dark:text-gray-300">
                                        {{ old('org_status', $organization->org_status) == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>

                            </div>
                        </div>

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
                                    class="w-48 px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800">
                                    Update</Button>
                            </div>
                        </div>
                    </div>
                </div>


            </form>


        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkbox = document.querySelector('.toggle-checkbox');
            const labelElement = document.querySelector('.toggle-label');

            // Set initial state for label text
            labelElement.textContent = checkbox.checked ? 'Active' : 'Inactive';

            checkbox.addEventListener('change', function() {
                this.value = this.checked ? '1' : '0'; // ✅ Ensure value updates correctly
                labelElement.textContent = this.checked ? 'Active' : 'Inactive';
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

        var loadFile = function(event) {

            var input = event.target;
            var file = input.files[0];
            var type = file.type;

            var output = document.getElementById('preview_img');


            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
</x-app-layout>