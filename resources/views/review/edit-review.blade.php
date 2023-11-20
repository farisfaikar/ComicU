<x-app-layout>
    <div class="flex flex-col items-center gap-5 w-full mt-10 p-5">
        <h2 class="text-2xl font-bold">
            Edit Review
        </h2>
        <form method="post" action="{{ route('review.update', ['review' => $review->id]) }}" enctype="multipart/form-data" class="w-full sm:w max-w-2xl">
            @method('PUT')
            @csrf

            <div class="mb-6">
                <label for="inputUserId" class="block mb-2 text-md font-large text-gray-900 dark:text-white">User</label>
                <input type="text" name="user_id" id="inputUserId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter user ID here" value="{{ $review->user_id }}" required>
            </div>
            <div class="mb-6">
                <label for="inputComicId" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Comic ID</label>
                <input type="text" name="comic_id" id="inputComicId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter comic ID here" value="{{ $review->comic_id }}" required>
            </div>
            <div class="mb-6">
                <label for="inputTitle" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="inputTitle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter title here" value="{{ $review->title }}" required>
            </div>
            <div class="mb-6">
                <label for="inputContent" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Content</label>
                <input type="text" name="content" id="inputContent" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter content here" value="{{ $review->content }}" required>
            </div>
            <div class="mb-6">
                <label for="inputStars" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Stars</label>
                <input type="text" name="stars" id="inputStars" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter stars here" value="{{ $review->stars }}" required>
            </div>
            

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
