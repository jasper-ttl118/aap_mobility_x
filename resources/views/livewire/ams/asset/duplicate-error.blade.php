<div x-data="{ open: @entangle('showDuplicateWarning') }" x-cloak>
    <div x-show="open" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
        <div @click.outside="open=false" class="relative w-full max-w-sm bg-white rounded-2xl shadow-2xl border border-gray-200 p-6">

            <!-- Close Button (absolute top right) -->
            <button @click="open=false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-x-icon lucide-x">
                    <path d="M18 6 6 18"/>
                    <path d="m6 6 12 12"/>
                </svg>
            </button>

            <!-- Header -->
            @php
            $variants = [
                'duplicate-mismatch-db' => [
                    'bg'=>'bg-red-200', 'icon'=>'text-red-700', 'title'=>'text-red-700',
                    'label'=>'Conflict with Existing Asset!', 'icon_type'=>'x'
                ],
                'duplicate-mismatch-batch' => [
                    'bg'=>'bg-red-200', 'icon'=>'text-red-700', 'title'=>'text-red-700',
                    'label'=>'Conflict Within This Batch!', 'icon_type'=>'x'
                ],
                'merged-db' => [
                    'bg'=>'bg-orange-200', 'icon'=>'text-orange-600', 'title'=>'text-orange-600',
                    'label'=>'Asset Already Exists!', 'icon_type'=>'check'
                ],
                'merged-batch' => [
                    'bg'=>'bg-orange-200', 'icon'=>'text-orange-600', 'title'=>'text-orange-600',
                    'label'=>'Duplicate Entry!', 'icon_type'=>'check'
                ],
            ];
            $v = $variants[$type ?? ''] ?? [
                'bg'=>'bg-gray-200','icon'=>'text-gray-600','title'=>'text-gray-700',
                'label'=>'Duplicate Asset Detected!','icon_type'=>'x'
            ];
            @endphp

            <div class="px-1 pt-3 pb-4">
                <div class="flex flex-row items-center gap-x-2 gap-y-4 text-center">
                    <div class="w-12 h-12 rounded-full p-2 {{ $v['bg'] }} flex items-center justify-center">
                        @if($v['icon_type'] === 'check')
                            <!-- package-check icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="size-8 {{ $v['icon'] }} lucide lucide-package-check-icon lucide-package-check">
                                <path d="m16 16 2 2 4-4"/>
                                <path d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"/>
                                <path d="m7.5 4.27 9 5.15"/>
                                <polyline points="3.29 7 12 12 20.71 7"/>
                                <line x1="12" x2="12" y1="22" y2="12"/>
                            </svg>
                        @else
                            <!-- package-x icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="size-8 {{ $v['icon'] }} lucide lucide-package-x-icon lucide-package-x">
                                <path d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"/>
                                <path d="m7.5 4.27 9 5.15"/>
                                <polyline points="3.29 7 12 12 20.71 7"/>
                                <line x1="12" x2="12" y1="22" y2="12"/>
                                <path d="m17 13 5 5m-5 0 5-5"/>
                            </svg>
                        @endif
                    </div>
                    <h3 class="text-xl font-semibold {{ $v['title'] }}">
                        {{ $v['label'] }}
                    </h3>
                </div>
            </div>

            <!-- Body -->
            <div class="px-6 py-4 text-sm text-gray-800 space-y-0 border border-gray-200 rounded-xl bg-gray-50 shadow-xl">
                @switch($type)
                    @case('duplicate-mismatch-db')
                        <p class="text-gray-700 text-justify">
                            An asset named <span class="font-medium">{{ $error['asset_name'] ?? '' }}</span> already exists for <span class="font-medium">{{ $error['assignee'] ?? 'this assignee' }}</span> in the asset records. Please review the asset details.
                        </p>
                        @break

                    @case('duplicate-mismatch-batch')
                        <p class="text-gray-700 text-justify">
                            There are multiple entries of <span class="font-medium">{{ $error['asset_name'] ?? '' }}</span> for <span class="font-medium">{{ $error['assignee'] ?? 'this assignee' }}</span>. Please review the asset details.
                        </p>
                        @break

                    @case('merged-db')
                        <p class="text-gray-700 text-justify">
                            Existing asset <span class="font-medium">{{ $error['asset_name'] ?? '' }}</span> already assigned to {{ $error['assignee'] ?? 'this assignee' }}. Entry merged into the existing record.
                        </p>
                        @break

                    @case('merged-batch')
                        <p class="text-gray-700 text-justify">
                            Duplicate entries of <span class="font-medium">{{ $error['asset_name'] ?? '' }}</span> found in this batch for <span class="font-medium">{{ $error['assignee'] ?? 'this assignee' }}</span>. The duplicate entries were merged to a single entry.
                        </p>
                        @break

                    @default
                        <p class="text-red-600">Duplicate detected. Review the asset details before submitting.</p>
                @endswitch
            </div>
        </div>
    </div>
</div>
