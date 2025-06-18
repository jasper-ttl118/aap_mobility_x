<div class="bg-white rounded-lg shadow-lg w-96 p-6 dark:bg-gray-800" @click.away="open_delete_employee = false">
    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Confirm Deletion</h2>
    <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
        Are you sure you want to delete this employee? This action cannot be undone.
    </p>

    <div class="mt-4 flex justify-end items-center space-x-3">
        <form id="delete-form" :action="deleteUrl" method="POST" class="inline-block m-0 p-0">
            @csrf
            @method('GET')
            <button type="submit"
                class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600">
                Delete
            </button>
        </form>

        <button @click="open_delete_employee = false"
            class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
            Cancel
        </button>
    </div>
    
</div>