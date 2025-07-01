<div class="mx-7 mb-10 rounded-sm overflow-x-auto hide-scrollbar">
    <div class="min-w-[800px] w-full">
        <table class="w-full text-center text-sm text-gray-500">
            <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                <tr>
                    <th class="w-[20%] py-3">Status ID</th>
                    <th class="w-[30%] py-3">Status Name</th>
                    <th class="w-[30%] py-3">Description</th>
                    <th class="w-[20%] py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ([
                    ['id' => 1, 'name' => 'Available', 'desc' => 'Ready for deployment or use'],
                    ['id' => 2, 'name' => 'In Use', 'desc' => 'Currently being used'],
                    ['id' => 3, 'name' => 'Under Maintenance', 'desc' => 'Being serviced or repaired'],
                    ['id' => 4, 'name' => 'Lost', 'desc' => 'Reported missing'],
                    ['id' => 5, 'name' => 'For Disposal', 'desc' => 'To be discarded or sold']
                ] as $status)
                    <tr class="border-b border-gray-200 bg-white">
                        <td class="py-4 text-gray-900">{{ $status['id'] }}</td>
                        <td class="py-4 text-gray-900">{{ $status['name'] }}</td>
                        <td class="py-4 text-gray-900">{{ $status['desc'] }}</td>
                        <td class="py-4">
                            <div class="flex justify-center items-center gap-2 text-blue-800">
                                <!-- Icons Placeholder -->
                                <a href="#" class="hover:text-blue-600">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-800">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

