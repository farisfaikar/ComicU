<x-app-layout>
    <div class="flex flex-col items-center gap-5 w-full mt-10 p-5"  >
        <div class="bg-neutral-900 p-8 rounded-lg">

         <h2 class="text-2xl font-bold  mb-5">
                Create Categories
        </h2>
        <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data" class="w-full sm:w max-w-2xl">
            @csrf
            <div class="mb-5">
                <label for="inputCategoryName" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Category Name</label>
                <input type="text" name="category_name" id="inputCategoryName" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter category name here" required>
            </div>
            <div class="mb-6">
                <label for="inputcolor" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Color</label>
                <select type="text" name="color" id="inputcolor" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Select Color</option>
                    <option value="red">Red</option>
                    <option value="yellow">Yellow</option>
                    <option value="green">Green</option>
                    <option value="purple">Purple</option>
                    <option value="blue">Blue</option>
                    <option value="orange">Orange</option>
                    <option value="cyan">Cyan</option>
                    <option value="pink">Pink</option>
                    <option value="indigo">Indigo</option>
                    <option value="white">White</option>
                </select>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
    </div>
</x-app-layout>
