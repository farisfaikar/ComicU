<form action="{{ $action }}" method="get" class="mr-4">
    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="flex">
        <input type="search" name="search" id="search" class="bg-black input input-bordered mr-1" placeholder="Search" required>
        <button type="submit" class="text-red-700 hover:text-white border border-blue-700 hover:bg-black-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-b-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900">Search</button>
    </div>
</form>