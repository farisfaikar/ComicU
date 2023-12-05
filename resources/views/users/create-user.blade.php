<x-app-layout>
    <div class="flex flex-col items-center gap-5 w-full mt-10 p-5">
        <div class="bg-neutral-900 p-8 rounded-lg">

            <h2 class="text-2xl font-bold text-center mb-3">
                Create New User
        </h2>
        <form method="post" action="{{ route('user.store') }}" class="w-full sm:w max-w-2xl">
            @csrf

            <div class="mb-6">
                <label for="inputName" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Name</label>
                <input type="text" id="inputName" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter name here" required>
            </div>

            <div class="mb-6">
                <label for="inputEmail" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Email</label>
                <input type="email" id="inputEmail" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter email here" required>
            </div>

            <div class="mb-6">
                <label for="inputPassword" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Password</label>
                <input type="password" id="inputPassword" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********" required>
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="inputConfirmPassword" class="block mb-2 text-md font-large text-gray-900 dark:text-white">Confirm Password</label>
                <input type="password" id="inputConfirmPassword" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********" required>
            </div>
            
            <!-- Add other fields as needed -->

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Create User
            </button>
        </form>
    </div>
    </div>
</x-app-layout>
