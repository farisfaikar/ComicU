<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 dark:text-neutral-200 leading-tight">
            {{ __('Categories List') }}
        </h2>
    </x-slot>
    <section class="p-5">
        <div class="flex justify-between items-center w-full">
            <div class="flex items-center w-full">
                <x-searchbar :action="route('category.search')" />   
                <a href="{{ route('category.create') }}" type="button" class=" focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm text-center px-2.5 py-2.5 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                    Create Categories
                </a>
            </div>
        </div>

        <div class="overflow-x-auto mt-5">
            <table class="table table-auto">
                <!-- head -->
                <thead class="text-xs text-gray-300 uppercase bg-neutral-950">
                    <tr class="uppercase">
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Color</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="bg-neutral-900 border-b border-neutral-900">
                    @forelse ($categories as $key => $category)
                        <tr>
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $categories->firstitem() + $key }}</th>
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $category->category_name }}</th>
                            <th>
                                <span class="
                                        text-sm font-medium me-2 px-3 py-1 rounded 
                                        {{ ($category->color == 'red') ? '      bg-red-600/20        text-red-500 border     border-red-500 ' : '' }}
                                        {{ ($category->color == 'cyan') ? '     bg-cyan-700/30       text-cyan-500 border    border-cyan-500' : '' }}
                                        {{ ($category->color == 'pink') ? '     bg-pink-200/10       text-pink-500 border    border-pink-500' : '' }}
                                        {{ ($category->color == 'blue') ? '     bg-blue-800/20       text-blue-400 border    border-blue-400' : '' }}
                                        {{ ($category->color == 'white') ? '    bg-neutral-300/20    text-gray-200 border    border-gray-200' : '' }}
                                        {{ ($category->color == 'green') ? '    bg-green-500/10      text-green-400 border   border-green-400 ' : '' }}
                                        {{ ($category->color == 'yellow') ? '   bg-yellow-400/10     text-yellow-400 border  border-yellow-400' : '' }}
                                        {{ ($category->color == 'purple') ? '   bg-purple-600/20     text-purple-400 border  border-purple-400' : '' }}
                                        {{ ($category->color == 'orange') ? '   bg-orange-600/10     text-orange-500 border  border-orange-500' : '' }}
                                        {{ ($category->color == 'indigo') ? '   bg-indigo-500/20     text-indigo-400 border  border-indigo-400' : '' }}
                                        ">
                                {{$category->color}}</span>
                            </th>
                            <td class="text-center">
                                <div class="flex flex-col sm:flex-row justify-end items-center gap-2 text-centerr">
                                    <a href="{{ route('category.edit', $category->id) }}" type="button"
                                        class="text-blue-700 hover:text-blue-500 border border-blue-500 hover:bg-gray-900 focus:ring-4 focus:outline-none  focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-gray-800">
                                        Edit
                                    </a>

                                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                        <button data-modal-target="static-modal-{{ $loop->iteration }}"
                                            data-modal-toggle="static-modal-{{ $loop->iteration }}"
                                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                                            type="button">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <!-- Main modal -->
                        <div id="static-modal-{{ $loop->iteration }}" data-modal-backdrop="static" tabindex="-1"
                            aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-neutral-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-neutral-600">
                                        <h3 class="text-xl font-semibold text-error">
                                            Warning
                                        </h3>
                                        <button type="button"
                                            class="text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-neutral-600 dark:hover:text-white"
                                            data-modal-hide="static-modal-{{ $loop->iteration }}">X
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <p class="text-base leading-relaxed text-white">
                                            Are you sure you want to delete this category data?
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 md:p-5">
                                        <form action={{ route('category.destroy', $category->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button data-modal-hide="static-modal-{{ $loop->iteration }}"
                                                type="submit" class="btn btn-error text-white">Yes, I'm sure</button>
                                            <button data-modal-hide="static-modal-{{ $loop->iteration }}"
                                                type="button" class="btn btn-ghost">No, cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                There are no category.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $categories->links() }}
            </div>
        </div>
    </section>
</x-app-layout>
