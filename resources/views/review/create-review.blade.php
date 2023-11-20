<x-app-layout>
    <div class="flex flex-col items-center gap-5 w-full mt-10 p-5">
        <h2 class="text-2xl font-bold">
            Create Review
        </h2>
        <form method="post" action="{{ route('review.store') }}" enctype="multipart/form-data" class="w-full sm:w max-w-2xl">
            @csrf

            <div class="mb-6">
                <label for="inputUser" class="block mb-2 text-md font-large text-gray-900 dark:text-white">User</label>
                <textarea id="inputUser_id" name="user_id" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter user here" required></textarea>

            </div>
            <div class="mb-6">
                <label for="inputComic_id" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Comic</label>
                <textarea id="inputComic_id" name="comic_id" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter comic here" required></textarea>
            </div>
            <div class="mb-6">
                <label for="inputTitle" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="inputTitle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter title here" required>
            </div>
            <div class="mb-6">
                <label for="inputContent" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Content</label>
                <input type="text" name="content" min="0" id="inputContent" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter content here" required>
            </div>
            <div class="mb-6">
                <label for="inputStars" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Stars</label>
                <input type="text" name="stars" min="0" id="inputStars" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter stars here" required>
            </div>
      
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
