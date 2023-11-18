<x-app-layout>
    <h1 class="text-2xl text-white">Create Transaction Page</h1>

    @error
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Error</span>
            <div>
                <span class="font-medium">Ensure that these requirements are met:</span>
                <ul class="mt-1.5 list-disc list-inside">
                    <li>At least 10 characters (and up to 100 characters)</li>
                    <li>At least one lowercase character</li>
                    <li>Inclusion of at least one special character, e.g., ! @ # ?</li>
                </ul>
            </div>
        </div>
    @enderror

    <form method="get" href="{{ route('transaction.store') }}">
        @csrf
        
        <div class="mb-6">
            <label for="userSelect" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select User</label>
            <select id="userSelect" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="" selected disabled>Select User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="comicSelect" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Comic</label>
            <select id="comicSelect" name="comic_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="" selected disabled>Select Comic</option>
                @foreach ($comics as $comic)
                    <option value="{{ $comic->id }}">{{ $comic->comic_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Create
        </button>
    </form>
</x-app-layout>
