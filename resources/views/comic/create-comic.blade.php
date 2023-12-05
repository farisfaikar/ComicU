<x-app-layout>
    <div class="flex flex-col items-center gap-5 w-full mt-10 p-5" style="background-image: url('img/background-comicu.jpg'); background-size: contain;"  >
        <div class="bg-neutral-900 p-8 rounded-lg">
            <h2 class="text-2xl font-bold text-center mb-2">
                Create Comic
            </h2>
        <form method="post" action="{{ route('comic.store') }}" enctype="multipart/form-data"
            class="w-full sm:w max-w-2xl ">
            @csrf
            
            <div class="mb-6">
                <label for="inputComicName" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Comic
                    Name</label>
                    <input type="text" name="comic_name" id="inputComicName"
                    class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter comic name here" required>
            </div>
            <div class="mb-6">
                <label for="inputSynopsis"
                    class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Synopsis</label>
                <textarea id="inputSynopsis" name="synopsis" rows="4"
                class="block p-2.5 w-full text-sm text-neutral-900 bg-neutral-50 rounded-lg border border-neutral-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Enter synopsis here" required></textarea>
            </div>
            <div class="mb-6">
                <label for="inputAuthor"
                class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Author</label>
                <input type="text" name="author" id="inputAuthor"
                class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Enter author here" required>
            </div>
            <div class="mb-6">
                <label class="bblock mb-2 text-md font-large text-neutral-900 dark:text-white" for="file_input">Upload image</label>
                <input
                class="block w-full text-sm text-neutral-900 border border-gray-300 rounded-lg cursor-pointer bg-neutral-900 dark:text-gray-400 focus:outline-none dark:bg-neutral-900 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file" id="inputComicPhoto" name="comic_photo">
            </div>
            <div class="mb-6">
                <label for="inputStock"
                    class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Stock</label>
                    <input type="number" name="stock" min="0" id="inputStock"
                    class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter stock here" required>
                </div>
                <div class="mb-6">
                    <label for="categoryId"
                    class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Category</label>
                    <select id="categoryId" name="category_id"
                    class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled selected>Choose a category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Submit
        </button>
     </form>
    </div>
</div>
</x-app-layout>
