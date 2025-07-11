@props(['asset', 'section'])

<div x-data="{ open: @entangle('showModal') }" x-show="open"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60" x-transition>

    <div @click.away="$wire.closeModal()" class="w-[600px] max-w-full bg-white rounded-2xl  overflow-hidden">

        <!-- Blue Header Section -->
        <div
            class="w-full bg-blue-800 text-white px-6 pb-3 flex items-center gap-x-3 border-t-[16px] border-blue-800 rounded-t-2xl">

            @if ($section === 'info')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                        clip-rule="evenodd" />
                </svg>
                <h2 class="text-xl font-bold">Edit Asset Information</h2>

            @elseif ($section === 'maintenance')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z"
                        clip-rule="evenodd" />
                </svg>
                <h2 class="text-xl font-bold">Edit Maintenance Information</h2>

            @elseif ($section === 'assignment')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                        clip-rule="evenodd" />
                </svg>
                <h2 class="text-xl font-bold">Edit Assignment Information</h2>

            @elseif ($section === 'warranty')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                        clip-rule="evenodd" />
                </svg>
                <h2 class="text-xl font-bold">Edit Warranty Information</h2>

            @elseif ($section === 'description')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625ZM7.5 15a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 7.5 15Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H8.25Z"
                        clip-rule="evenodd" />
                    <path
                        d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                </svg>
                <h2 class="text-xl font-bold">Edit Description</h2>
            @endif
        </div>


        <!-- Modal Body -->
        <div class="px-6 py-6 space-y-6">

            @if ($asset)
                @if ($section === 'info')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Property Code</label>
                            <input type="text" class="form-input mt-1 w-full" value="{{ $asset->property_code }}" readonly>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Category</label>
                            <input type="text" class="form-input mt-1 w-full"
                                value="{{ $asset->category->category_name ?? 'N/A' }}" readonly>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <input type="text" class="form-input mt-1 w-full"
                                value="{{ $asset->status->status_name ?? 'N/A' }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Condition</label>
                            <input type="text" class="form-input mt-1 w-full"
                                value="{{ $asset->condition->condition_name ?? 'N/A' }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Device Serial Number</label>
                            <input type="text" class="form-input mt-1 w-full" value="{{ $asset->device_serial_number }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Charger Serial Number</label>
                            <input type="text" class="form-input mt-1 w-full" value="{{ $asset->charger_serial_number }}">
                        </div>
                    </div>

                @elseif ($section === 'maintenance')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Next Maintenance Schedule</label>
                            <input type="date" class="form-input mt-1 w-full"
                                value="{{ optional($asset->maint_sched)->format('Y-m-d') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Maintenance</label>
                            <input type="date" class="form-input mt-1 w-full"
                                value="{{ optional($asset->last_maint_sched)->format('Y-m-d') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Service Provider</label>
                            <input type="text" class="form-input mt-1 w-full" value="{{ $asset->service_provider }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Check-Out Status</label>
                            <input type="text" class="form-input mt-1 w-full" value="{{ $asset->check_out_status }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Check-Out Date</label>
                            <input type="date" class="form-input mt-1 w-full"
                                value="{{ optional($asset->check_out_date)->format('Y-m-d') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Check-In Date</label>
                            <input type="date" class="form-input mt-1 w-full"
                                value="{{ optional($asset->check_in_date)->format('Y-m-d') }}">
                        </div>
                    </div>

                @elseif ($section === 'assignment')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Assigned To</label>
                            <input type="text" class="form-input mt-1 w-full"
                                value="{{ $asset->asset_type === '2' ? strtoupper($asset->employee->employee_lastname ?? '') . ', ' . strtoupper($asset->employee->employee_firstname ?? '') : strtoupper($asset->department->department_name ?? 'N/A') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date Assigned</label>
                            <input type="date" class="form-input mt-1 w-full"
                                value="{{ optional($asset->date_accountable)->format('Y-m-d') }}">
                        </div>
                    </div>

                @elseif ($section === 'warranty')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Purchase Date</label>
                            <input type="date" class="form-input mt-1 w-full"
                                value="{{ optional($asset->purchase_date)->format('Y-m-d') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Warranty Expiration</label>
                            <input type="date" class="form-input mt-1 w-full"
                                value="{{ optional($asset->warranty_exp_date)->format('Y-m-d') }}">
                        </div>
                    </div>

                @elseif ($section === 'description')
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea rows="5" class="form-input mt-1 w-full">{{ $asset->description }}</textarea>
                    </div>
                @endif

            @else
                <p class="text-gray-500">Loading asset details...</p>
            @endif
        </div>
        <!-- Modal Footer (optional) -->
        <div class="px-6 py-3 border-t flex justify-end bg-gray-50">
            <button @click="open = false" class="bg-blue-700 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                Close
            </button>
        </div>
    </div>
</div>