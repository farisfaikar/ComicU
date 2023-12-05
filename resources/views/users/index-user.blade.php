<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 dark:text-neutral-200 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>
    <section class="p-5">
        <div class="flex justify-between items-center">
            <div class="flex items-center w-full">
                <x-searchbar :action="route('user.search')" />    
                <a href="{{ route('user.create') }}" type="button" class=" focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm text-center px-2.5 py-2.5 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                    Create User
                </a>
            </div>
        </div>

        <div class="overflow-x-auto mt-5">
            <table class="table table-auto">
                <!-- head -->
                <thead class="text-xs text-gray-300 uppercase bg-neutral-950">
                    <tr class="uppercase">
                        <th>No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <!-- Tambahkan kolom lain jika dibutuhkan -->
                        <th></th>
                    </tr>
                </thead>
                <tbody class="bg-neutral-900 border-b border-neutral-900">
                    @forelse ($users as $key => $user)
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $users->firstItem() + $key }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-gray-500 dark:text-gray-400 text-center">{{ $user->email }}</td>
                            <!-- Tambahkan kolom lain jika dibutuhkan -->
                            <td class="flex flex-col sm:flex-row justify-end items-center gap-2 text-center">
                                <!-- Tambahkan tombol untuk edit dan hapus jika dibutuhkan -->
                                <a href="{{ route('user.edit', $user->id) }}" type="button" class="text-blue-700 hover:text-blue-500 border border-blue-500 hover:bg-gray-900 focus:ring-4 focus:outline-none  focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-gray-800">
                                    Edit
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                    <button data-modal-target="static-modal-delete-{{ $user->id }}" data-modal-toggle="static-modal-delete-{{ $user->id }}" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" type="button">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <!-- Main modal -->
                        <div id="static-modal-delete-{{ $user->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-neutral-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-neutral-600">
                                        <h3 class="text-xl font-semibold text-error">
                                            Warning
                                        </h3>
                                        <button type="button" class="text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-neutral-600 dark:hover:text-white" data-modal-hide="static-modal-delete-{{ $user->id }}">X</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <p class="text-base leading-relaxed text-white">
                                            Are you sure you want to delete this user data?
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 md:p-5">
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button data-modal-hide="static-modal-delete-{{ $user->id }}" type="submit" class="btn btn-error text-white">Yes, I'm sure</button>
                                            <button data-modal-hide="static-modal-delete-{{ $user->id }}" type="button" class="btn btn-ghost">No, cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                There are no users.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <!-- Menampilkan pagination jika dibutuhkan -->
            {{ $users->links() }}
        </div>
    </section>
</x-app-layout>
