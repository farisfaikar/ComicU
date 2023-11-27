<x-app-layout>
    <section class="p-5">
        <div class="flex sm:flex-row flex-col gap-2 justify-between items-center w-full">
            <h2 class="text-2xl font-bold text-center sm:text-left">Comic List</h2>
            <div class="flex items-center align-center gap-5">
                <form action="{{ route('comic.search') }}" method="get">
                    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="flex gap-2 justify-end">
                        <input type="search" name="search" id="search" class="w-full sm:w-auto bg-black input input-bordered mr-1" placeholder="Search" required>
                        <button type="submit" class="text-red-700 hover:text-white border border-blue-700 hover:bg-black-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-b-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900">Search</button>
                    </div>
                </form>
                <a href="{{ route('comic.create') }}" type="button" class="sm:w-auto w-full text-center focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                    Create Comic
                </a>
            </div>
        </div>

        <div class="overflow-x-auto mt-5">
            <table class="table table-auto">
                <!-- head -->
                <thead class="text-xs text-gray-300 uppercase bg-neutral-950">
                    <tr>
                        <th>no</th>
                        <th>comic name</th>
                        <th>synopsis</th>
                        <th>author</th>
                        <th class="text-center">stock</th>
                        <th class="text-center">category</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody class="bg-neutral-900 border-b border-neutral-900">
                    @forelse ($comics as $key => $comic)
                        <tr class="border-b border-neutral-800">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ $comics->firstitem() + $key }} </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ $comic->comic_name }} </td>
                            <td> {{ strlen($comic->synopsis) > 100 ? substr($comic->synopsis, 0, 100) . '...' : $comic->synopsis }} </td>
                            <td> {{ $comic->author }} </td>
                            <td class="text-center"> {{ $comic->stock }}</td>
                            <td class="text-center">
                                @if ($comic->category_id !== null)
                                    <p>{{ $comic->category->category_name }}</p>
                                @else
                                    No category.
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="flex flex-col gap-2 md:flex-row justify-center items-center">
                                    <a href="{{ route('comic.edit', $comic->id) }}" type="button" class="text-blue-700 hover:text-blue-500 border border-blue-500 hover:bg-gray-900 focus:ring-4 focus:outline-none  focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-gray-800">
                                        Edit
                                    </a>

                                    <form action="{{ route('comic.destroy', $comic->id) }}" method="post">
                                        <button data-modal-target="static-modal-{{ $loop->iteration }}" data-modal-toggle="static-modal-{{ $loop->iteration }}" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" type="button">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <!-- Main modal -->
                        <div id="static-modal-{{ $loop->iteration }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-neutral-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-neutral-600">
                                        <h3 class="text-xl font-semibold text-error">
                                            Warning
                                        </h3>
                                        <button type="button" class="text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-neutral-600 dark:hover:text-white" data-modal-hide="static-modal-{{ $loop->iteration }}">X
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <p class="text-base leading-relaxed text-white">
                                            Are you sure you want to delete this comic data?
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 md:p-5">
                                        <form action="{{ route('comic.destroy', $comic->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button data-modal-hide="static-modal-{{ $loop->iteration }}" type="submit" class="btn btn-error text-white">Yes, I'm sure</button>
                                            <button data-modal-hide="static-modal-{{ $loop->iteration }}" type="button" class="btn btn-ghost">No, cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                There are no comics.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            {{ $comics->links() }}
        </div>
    </section>
</x-app-layout>
