<x-app-layout >
    {{-- <form action="{{ route('comic.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="comic_name" >comic name</label>
            <input  class="input input-bordered w-full max-w-xs" type="text" name="comic_name" id="comic_name"  placeholder="comic name">
        </div>
        <div>
            <label for="synopsis" >synopsis</label>
            <textarea  class="input input-bordered w-full max-w-xs" name="synopsis" id="synopsis" cols="30" rows="10"  placeholder="synopsis"></textarea>
        </div>
        <div>
            <label for="author" >author</label>
            <input  class="input input-bordered w-full max-w-xs" type="text" name="author" id="author"  placeholder="author">
        </div>
        <div>
            <label for="stock" >jumlah stock</label>
            <input  class="input input-bordered w-full max-w-xs" type="text" name="stock" id="stock"  placeholder="stock">
        </div>
        <div>
            <label for="category_id" >category</label>
            <input  class="input input-bordered w-full max-w-xs" type="text" name="category_id" id="category_id"  placeholder="category_id">
        </div>
        <button type="submit">Submit</button>
    </form>
</div> --}}

<div>
<form action="{{ route('comic.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg ">
    @csrf
    <div class="mb-6">
      <label for="comic_name" class="block mb-2 text-sm font-large text-gray-900 dark:text-white">comic_name</label>
      <input type="comic_name" name="comic_name" id="comic_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="comic-name" required>
    </div>
    <div class="mb-6">
      <label for="synopsis" class="block mb-2 text-sm font-large text-gray-900 dark:text-white">synopsis</label>
      <input type="synopsis" name="synopsis" id="synopsis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="synopsis" required>
    </div>
    <div class="mb-6">
      <label for="author" class="block mb-2 text-sm font-large text-gray-900 dark:text-white">author</label>
      <input type="author" name="author" id="author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="author" required>
    </div>
    <div class="mb-6">
      <label for="stock" class="block mb-2 text-sm font-large text-gray-900 dark:text-white">stock</label>
      <input type="stock" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="stock" required>
    </div>
    <div class="mb-6">
      <label for="category_id" class="block mb-2 text-sm font-large text-gray-900 dark:text-white">category_id</label>
      <input type="category_id" name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="category_id" required>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
</div>  
</x-app-layout>
