<div class="search-navbar w-11/12">
    <form action="{{ $action }}" method="get" class="mr-4">
        <div class="flex">
            <label for="search-dropdown" class="blockmb-2 text-sm font-medium text-neutral-900 sr-only dark:text-white">Your Email</label>
            <div class="relative w-full">
                <input type="search" name="search" id="search" class="block p-2.5 w-full z-20 text-sm text-neutral-900 bg-neutral-50 rounded-lg border-s-neutral-50 border-s-2 border border-neutral-300 focus:ring-amber-700 focus:border-amber-700 dark:bg-neutral-700 dark:border-s-neutral-700  dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:border-amber-500" placeholder="Search..." required>
                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-amber-700 rounded-e-lg border border-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </div>
    </form>
</div>
