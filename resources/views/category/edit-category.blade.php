<x-app-layout>
    <div class="flex flex-col items-center gap-5 w-full mt-10 p-5">
        <h2 class="text-2xl font-bold">
            Edit Category
        </h2>
        <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data" class="w-full sm:w max-w-2xl">
            @method('put')
            @csrf

            <div class="mb-6">
                <label for="inputcategoryName" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">category Name</label>
                <input type="text" name="category_name" id="inputcategoryName" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $category->category_name }}" required>
            </div>
            <div class="mb-6">
                <label for="inputcolor" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">category Name</label>
                <input type="text" name="color" id="inputcolor" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $category->color }}" required>
            </div>
            <button type="submit" class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
