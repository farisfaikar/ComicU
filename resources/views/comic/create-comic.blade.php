<x-app-layout>
    <div class="flex flex-col items-center gap-5 w-full mt-10 p-5">
        <h2 class="text-2xl font-bold">
            Create Comic
        </h2>
        <form method="post" action="{{ route('comic.create') }}" enctype="multipart/form-data" class="w-full sm:w-full max-w-2xl">
            @csrf

            <div class="mb-6">
                <label for="inputComicName" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Comic Name</label>
                <input type="text" name="comic_name" id="inputComicName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter comic name here" required>
            </div>
            <div class="mb-6">
                <label for="inputSynopsis" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Synopsis</label>
                <textarea id="inputSynopsis" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter synopsis here" required></textarea>
            </div>
            <div class="mb-6">
                <label for="inputAuthor" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Author</label>
                <input type="text" name="author" id="inputAuthor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter author here" required>
            </div>
            <div class="mb-6">
                <label for="inputStock" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Stock</label>
                <input type="number" name="stock" min="0" id="inputStock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter stock here" required>
            </div>
            <div class="mb-6">
                <label for="categoryId" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Category</label>
                <select id="categoryId" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled selected>Choose a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
