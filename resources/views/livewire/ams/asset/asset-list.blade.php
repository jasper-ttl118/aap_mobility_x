<div class="mx-7 mb-10 rounded-sm overflow-x-auto hide-scrollbar">
    <div class="min-w-[1000px] w-full">
        <table class="w-full text-center text-sm text-gray-500">
            <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                <tr>
                    <th class="w-[16.6%] py-3">Property Code</th>
                    <th class="w-[16.6%] py-3">Asset Name</th>
                    <th class="w-[16.6%] py-3">Assigned To</th>
                    <th class="w-[16.6%] py-3">Category</th>
                    <th class="w-[16.6%] py-3">Status</th>
                    <th class="w-[16.6%] py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $asset)
                    <tr class="border-b border-gray-200 bg-white">
                        <td class="py-4 text-gray-900">{{ $asset->property_code }}</td>
                        <td class="py-4 text-gray-900">{{ $asset->asset_name }}</td>
                        <td class="py-4 text-gray-900">
                            {{ optional($asset->employee)->employee_lastname }},
                            {{ optional($asset->employee)->employee_firstname }}
                        </td>
                        <td class="py-4 text-gray-900">{{ $asset->category->category_name }}</td>
                        <td class="py-4 text-gray-900">
                            <span class="text-white text-xs font-medium px-2 py-1 rounded-full
                                @if ($asset->status->status_name === 'Available') bg-green-600
                                @elseif ($asset->status->status_name === 'In Use') bg-blue-600
                                @elseif ($asset->status->status_name === 'Under Maintenance') bg-yellow-500
                                @elseif ($asset->status->status_name === 'Lost') bg-red-600
                                @else bg-gray-500 @endif">
                                {{ $asset->status->status_name }}
                            </span>
                        </td>
                        <td class="py-4">
                            <div class="flex justify-center items-center gap-3">

                                <!-- View Details -->
                                <div class="relative group">
                                    <button @click="open_view_asset = true; Livewire.dispatch('viewAsset', { asset_id: {{ $asset->id }} });"
                                            class="text-gray-700 hover:text-black transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="size-4">
                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path fill-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition z-10">
                                        View Details
                                    </div>
                                </div>

                                <!-- Edit Details -->
                                <div class="relative group">
                                    <button @click="open_edit_asset = true; Livewire.dispatch('editAsset', { asset_id: {{ $asset->id }} });"
                                            class="text-blue-700 hover:text-blue-900 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="size-4">
                                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712Z" />
                                            <path d="M19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                        </svg>
                                    </button>
                                    <div class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition z-10">
                                        Edit Details
                                    </div>
                                </div>

                                <!-- View History -->
                                <div class="relative group">
                                    <button @click="open_view_history = true; Livewire.dispatch('viewHistory', { asset_id: {{ $asset->id }} });"
                                            class="text-amber-600 hover:text-amber-800 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="size-4">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition z-10">
                                        View History
                                    </div>
                                </div>

                                <!-- Pull Out -->
                                <div class="relative group">
                                    <button @click="open_pull_out = true; Livewire.dispatch('pullOutAsset', { asset_id: {{ $asset->id }} });"
                                            class="text-red-700 hover:text-red-900 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="size-4">
                                            <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                                            <path fill-rule="evenodd"
                                                d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition z-10">
                                        Pull Out
                                    </div>
                                </div>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $assets->links() }}
    </div>
</div>
