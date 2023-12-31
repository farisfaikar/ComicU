<x-app-layout>
    <div class="flex flex-col items-center gap-5 w-full  p-24" style="background-image: url('/img/background-comicu.jpg'); background-size: contain;">
        <div class="bg-neutral-900 p-8 rounded-lg w-full max-w-3xl">
            <h2 class="text-center text-2xl font-bold mb-3 text-neutral-900 dark:text-white">
                Create Transaction
            </h2>
            <form method="post" action="{{ route('transaction.store') }}" enctype="multipart/form-data" class="w-full sm:w max-w-3xl">
                @csrf

                <div class="mb-6">
                    <label for="inputUser" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">User</label>
                    <select id="inputUser_id" name="user_id" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected>Choose a user</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="inputComic" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Comic</label>
                    <select id="inputComic_id" name="comic_id" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected>Choose a comic</option>
                        @foreach ($comics as $comic)
                            <option value="{{ $comic->id }}">{{ $comic->comic_name }}</option>
                        @endforeach
                    </select>
                </div>



                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
