<x-app-layout>
    <div class="flex flex-col items-center gap-5 w-full mt-10 p-5">
        <h2 class="text-2xl font-bold">
            Edit Comic
        </h2>
        <form method="post" action="{{ route('comic.update', $comic) }}" enctype="multipart/form-data" class="w-full sm:w max-w-2xl">
            @method('put')
            @csrf

            <div class="mb-6">
                <label for="inputComicName" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Comic Name</label>
                <input type="text" name="comic_name" id="inputComicName" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $comic->comic_name }}" required>
            </div>
            <div class="mb-6">
                <label for="inputSynopsis" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Synopsis</label>
                <textarea id="inputSynopsis" name="synopsis" rows="4" class="block p-2.5 w-full text-sm text-neutral-900 bg-neutral-50 rounded-lg border border-neutral-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ $comic->synopsis }}</textarea>
            </div>
            <div class="mb-6">
                <label for="inputAuthor" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Author</label>
                <input type="text" name="author" id="inputAuthor" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $comic->author }}" required>
            </div>
            <div class="mb-6">
                <label for="inputStock" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">stock</label>
                <input type="number" name="stock" id="inputStock" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $comic->stock }}" required>
            </div>
            <div class="mb-6">
                <label for="selectCategoryId" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Category</label>
                <select id="selectCategoryId" name="category_id" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled selected>Choose a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id === $comic->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
