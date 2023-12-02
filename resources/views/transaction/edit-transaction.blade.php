<x-app-layout>
    <div class="flex flex-col items-center gap-5 w-full mt-10 p-5">
        <h2 class="text-2xl font-bold">
            Edit Transaction
        </h2>
        <form method="post" action="{{ route('transaction.update', ['transaction' => $transaction->id]) }}"
            class="w-full sm:w max-w-2xl">
            @method('PUT')
            @csrf

            <div class="mb-6">
                <label for="inputUserId" class="block mb-2 text-md font-large text-gray-900 dark:text-white">User</label>
                <input type="hidden" name="user_id" value="{{ $transaction->user_id }}">
                <input type="text" id="inputUserId"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $transaction->user->name }}" readonly>
            </div>

            <div class="mb-6">
                <label for="inputComic"
                    class="block mb-2 text-md font-large text-gray-900 dark:text-white">Comic</label>
                <select id="inputComic" name="comic_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option value="" disabled selected>Choose a comic</option>
                    @foreach ($comics as $comic)
                        <option value="{{ $comic->id }}"
                            {{ $transaction->comic_id == $comic->id ? 'selected' : '' }}>{{ $comic->comic_name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
