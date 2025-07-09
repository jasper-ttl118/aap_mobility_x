@php
    use Illuminate\Pagination\LengthAwarePaginator;

    // Only Available assets
    $availableAssets = collect([
        ['code' => 'BR001-C1-001', 'name' => 'Laptop Dell XPS', 'assigned_to' => 'Reyes, Miguel', 'category' => 'Electronics'],
        ['code' => 'BR001-C1-002', 'name' => 'Printer Canon G3000', 'assigned_to' => 'Garcia, Ana', 'category' => 'Electronics'],
        ['code' => 'BR004-C1-006', 'name' => 'Monitor Samsung 27"', 'assigned_to' => 'Tan, Lisa', 'category' => 'Electronics'],
        ['code' => 'BR005-C2-007', 'name' => 'Filing Cabinet', 'assigned_to' => 'Castro, Noel', 'category' => 'Furniture'],
        ['code' => 'BR006-C3-008', 'name' => 'Wi-Fi Extender', 'assigned_to' => 'Diaz, Bryan', 'category' => 'Networking'],
        ['code' => 'BR007-C4-009', 'name' => 'iPad Air', 'assigned_to' => 'Mendoza, Kara', 'category' => 'Electronics'],
        ['code' => 'BR008-C5-010', 'name' => 'Projector Epson', 'assigned_to' => 'Santiago, Eliza', 'category' => 'Electronics'],
    ]);

    // Paginate Available assets (5 per page)
    $currentPage = request()->get('page', 1);
    $perPage = 5;
    $pagedAvailable = new LengthAwarePaginator(
        $availableAssets->forPage($currentPage, $perPage),
        $availableAssets->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );
@endphp

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
            <tbody class="bg-white text-gray-900">
                @foreach ($pagedAvailable as $asset)
                    <tr class="border-b border-gray-200">
                        <td class="py-4">{{ $asset['code'] }}</td>
                        <td class="py-4">{{ $asset['name'] }}</td>
                        <td class="py-4">{{ $asset['assigned_to'] }}</td>
                        <td class="py-4">{{ $asset['category'] }}</td>
                        <td class="py-4">
                            <span class="text-white text-xs font-medium px-2 py-1 rounded-full bg-green-600">
                                Available
                            </span>
                        </td>
                        <td class="py-4">
                            <div class="flex justify-center items-center gap-3">

                                <!-- Borrow Asset -->
                                <div class="relative group">
                                    <a href="assets/borrow" class="text-green-700 hover:text-green-900 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4">
                                            <path fill-rule="evenodd"
                                                d="M12 5.25c1.213 0 2.415.046 3.605.135a3.256 3.256 0 0 1 3.01 3.01c.044.583.077 1.17.1 1.759L17.03 8.47a.75.75 0 1 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l3-3a.75.75 0 0 0-1.06-1.06l-1.752 1.751c-.023-.65-.06-1.296-.108-1.939a4.756 4.756 0 0 0-4.392-4.392 49.422 49.422 0 0 0-7.436 0A4.756 4.756 0 0 0 3.89 8.282c-.017.224-.033.447-.046.672a.75.75 0 1 0 1.497.092c.013-.217.028-.434.044-.651a3.256 3.256 0 0 1 3.01-3.01c1.19-.09 2.392-.135 3.605-.135Zm-6.97 6.22a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.752-1.751c.023.65.06 1.296.108 1.939a4.756 4.756 0 0 0 4.392 4.392 49.413 49.413 0 0 0 7.436 0 4.756 4.756 0 0 0 4.392-4.392c.017-.223.032-.447.046-.672a.75.75 0 0 0-1.497-.092c-.013.217-.028.434-.044.651a3.256 3.256 0 0 1-3.01 3.01 47.953 47.953 0 0 1-7.21 0 3.256 3.256 0 0 1-3.01-3.01 47.759 47.759 0 0 1-.1-1.759L6.97 15.53a.75.75 0 0 0 1.06-1.06l-3-3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <div
                                        class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition z-10">
                                        Borrow Asset
                                    </div>
                                </div>

                                <!-- Transfer Asset -->
                                <div class="relative group">
                                    <a href="assets/transfer" class="text-blue-700 hover:text-blue-900 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4">
                                            <path fill-rule="evenodd"
                                                d="M15.97 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H7.5a.75.75 0 0 1 0-1.5h11.69l-3.22-3.22a.75.75 0 0 1 0-1.06Zm-7.94 9a.75.75 0 0 1 0 1.06l-3.22 3.22H16.5a.75.75 0 0 1 0 1.5H4.81l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 0Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <div
                                        class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition z-10">
                                        Transfer Asset
                                    </div>
                                </div>

                                <!-- View History -->
                                <div class="relative group">
                                    <button @click="Livewire.dispatch('viewHistory', { code: '{{ $asset['code'] }}' })"
                                        class="text-amber-600 hover:text-amber-800 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                                                clip-rule="evenodd" />
                                        </svg> </button>
                                    <div
                                        class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition z-10">
                                        View History
                                    </div>
                                </div>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Controls -->
        <div class="mt-4">
            {{ $pagedAvailable->links() }}
        </div>
    </div>
</div>