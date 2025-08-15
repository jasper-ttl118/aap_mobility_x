<!-- Asset List Modal -->
<div x-data="{ open: @entangle('showAssetModal') }" x-show="open" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full mx-4 overflow-hidden" @click.away="open = false">
        <!-- Modal Header -->
        <div class="flex  justify-between px-6 pt-6 pb-2">

            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-[#071d49] mb-1">
                        Assets assigned to
                        <span class="text-xl font-bold text-[#071d49]">
                            {{ $assigneeName ?: '' }}
                        </span>
                    </h2>
                    <p class=" text-sm text-gray-600 leading-tight">
                        <em>Choose other assets to be transferred.</em>
                    </p>
                </div>
            </div>

        </div>

        <!-- Modal Body -->
        <div class="overflow-auto hide-scrollbar">
            <div class="min-w-auto w-full px-6 pb-2">
                <table class="w-full text-center text-sm text-gray-500">
                    <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                        <tr>
                            <th class="py-3">Asset Name</th>
                            <th class="py-3">Brand</th>
                            <th class="py-3">Model</th>
                            <th class="py-3">Status</th>
                            <th class="py-3">Select</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($availableAssets as $asset)
                        <tr class="border-b border-gray-200 {{ $loop->even ? 'bg-[#EDF0FF]' : 'bg-white' }}">
                            <td class="py-3 text-gray-900">{{ $asset->asset_name }}</td>
                            <td class="py-3 text-gray-900">
                                @if (in_array($asset->category_id, [1, 6]))
                                {{ $asset->brand->brand_name ?? 'NO DATA' }}
                                @else
                                {{ $asset->brand_name_custom ?? 'NO DATA' }}
                                @endif
                            </td>
                            <td class="py-3 text-gray-900">{{ $asset->model_name }}</td>

                            <td class="py-3 text-gray-900">
                                @php
                                $statusClass = match ($asset->status->status_name) {
                                'AVAILABLE' => 'bg-green-600',
                                'IN USE' => 'bg-blue-600',
                                'UNDER MAINTENANCE' => 'bg-yellow-500',
                                'DECOMMISSIONED' => 'bg-gray-700',
                                'ON HOLD' => 'bg-purple-600',
                                'LOST/STOLEN' => 'bg-red-600',
                                default => 'bg-gray-400',
                                };
                                @endphp
                                <span class="text-white text-xs font-medium px-2 py-1 rounded-full {{ $statusClass }}">
                                    {{ $asset->status->status_name }}
                                </span>
                            </td>
                            <td class="py-3">
                                <button type="button"
                                    class="px-3 py-1 text-xs text-white bg-blue-600 rounded hover:bg-blue-700">
                                    Select
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="flex justify-end px-5 py-3 border-t">
            <button @click="open = false" class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800">
                Close
            </button>
        </div>
    </div>
</div>