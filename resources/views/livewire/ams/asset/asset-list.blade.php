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
                            <div class="flex justify-center items-center gap-2">
                                <a x-data="{ disabled: false }"
                                    x-bind:class="{ 'opacity-50 pointer-events-none': disabled }" @click="
                                                                            if (!disabled) {
                                                                                disabled = true;
                                                                                open_view_asset = true;
                                                                                Livewire.dispatch('viewAsset', { asset_id: {{ $asset->id }} });
                                                                                setTimeout(() => disabled = false, 1000);
                                                                            }
                                                                        "
                                    class="cursor-pointer text-gray-700 flex items-center gap-1">
                                    <svg class="size-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 15a3..." />
                                    </svg>
                                </a>

                                <a @click="open_edit_asset = true;
                                                                                Livewire.dispatch('editAsset', { asset_id: {{ $asset->id }} });"
                                    class="cursor-pointer text-blue-700 flex items-center gap-1">
                                    <svg class="size-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="..." />
                                    </svg>
                                </a>

                                <a @click="open_delete_asset = true;
                                                                                deleteUrl = '{{ url('asset/' . $asset->id . '/delete') }}'"
                                    class="cursor-pointer text-red-700 flex items-center gap-1">
                                    <svg class="size-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="..." />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $assets->links() }}
    </div>
</div>