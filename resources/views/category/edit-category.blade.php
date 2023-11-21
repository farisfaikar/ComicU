<x-app-layout>
    <div class="flex flex-col items-center gap-5 w-full mt-10 p-5" >
        <h2 class="text-2xl font-bold">
            Edit Categories
        </h2>
        <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data" class="w-full sm:w max-w-2xl">
            @csrf
            @method('PATCH')
            <div class="mb-5">
                <label for="inputCategoryName" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Comic Name</label>
                <input type="text" name="category_name" id="inputCategoryName" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter category name here"  value="{{$category->category_name}}" required>
            </div>
            <div class="mb-6">
                <label for="inputcolor" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">color</label>
                <input id="inputcolor" name="color" rows="4" class="block p-2.5 w-full text-sm text-neutral-900 bg-neutral-50 rounded-lg border border-neutral-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter color here" value="{{$category->color}}" required></input>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
