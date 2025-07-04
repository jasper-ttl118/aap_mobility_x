<div class="min-h-screen bg-gray-50 py-10 px-6 lg:px-20">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-blue-900 mb-6">Add New Asset</h2>

        <form class="space-y-6">
            <!-- Asset Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Asset Name</label>
                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
            </div>

            <!-- Category Dropdown -->
            <div x-data="{ selectedCategory: '' }" x-init="$watch('selectedCategory', val => showExtras = ['1', '6'].includes(val))">
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select x-model="selectedCategory"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                    <option value="">Select Category</option>
                    <option value="1">IT Equipment</option>
                    <option value="2">Office Furniture and Fixtures</option>
                    <option value="3">Machinery and Equipment</option>
                    <option value="4">Vehicles</option>
                    <option value="5">Facilities and Infrastructure</option>
                    <option value="6">Mobile Devices</option>
                    <option value="7">High Value Assets</option>
                    <option value="8">Laboratory Equipments</option>
                    <option value="9">Company Owned Tools</option>
                    <option value="10">Preventive and Safety Equipment</option>
                </select>
            </div>

            <!-- Purchase Date -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Purchase Date</label>
                <input type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
            </div>

            <!-- Warranty Expiration Date -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Warranty Expiration</label>
                <input type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600"></textarea>
            </div>

            <!-- Employee Assigned -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Employee Assigned</label>
                <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                    <option value="">Select Employee</option>
                    <option value="1">Doe, John</option>
                    <option value="3">Kang, Haerin</option>
                </select>
            </div>

            <!-- Date Assigned -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Date Assigned</label>
                <input type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
            </div>

            <!-- Conditionally Shown for IT Equipment or Mobile Devices -->
            <div x-show="['1', '6'].includes(selectedCategory)" class="border-t pt-6">
                <h3 class="text-sm font-semibold text-gray-800 mb-2">Technical Specifications</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Serial Number</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Processor</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">RAM</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue  -600">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Storage</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-600 focus:border-blue-600">
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-6">
                <button type="submit"
                    class="w-full bg-blue-700 hover:bg-blue-800 text-white font-medium py-2 px-4 rounded-md transition duration-150">
                    Save Asset
                </button>
            </div>
        </form>
    </div>
</div>
