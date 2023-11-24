<x-app-layout>
    <section class="p-5">
        <div class="flex justify-between items-center w-full">
            <h2 class="text-2xl font-bold">Categories List</h2>
            <form action="{{ route('category.search') }}" method="get">   
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="flex ">
                    <input type="search" name="search" id="search" class="bg-black input input-bordered mr-1" placeholder="Search" required>
                    <button type="submit" class="text-red-700 hover:text-white border border-blue-700 hover:bg-black-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-b-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900">Search</button>
                </div>
            </form>
            <a href="{{ route('category.create') }}" type="button"
                class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                Create Categories
            </a>
        </div>
        
        <div class="overflow-x-auto mt-5">
            <table class="table table-auto">
                <!-- head -->
                <thead>
                    <tr class="uppercase">
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Color</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $key => $category)
                    <tr>
                        <th>{{ $categories-> firstitem() + $key }}</th>
                        <th>{{ $category->category_name }}</th>
                        <th>
                            <span class="
                                {{-- red --}}
                                {{($category->color == 'red' ) ? 
                                // color style
                                'class=" bg-red-800 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400 " ' : '' }}

                                {{-- green --}}
                                {{($category->color == 'green' ) ? 
                                // color style
                                'class=" bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400 " ' : '' }}

                                {{-- yellow --}}
                                {{($category->color == 'yellow' ) ? 
                                // color style
                                'class=" bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300 " ' : '' }}
                                
                                {{-- purple --}}
                                {{($category->color == 'purple' ) ? 
                                // color style
                                'class=" bg-purple-100 text-purple-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-purple-400 border border-purple-400 " ' : '' }}

                                {{-- dark --}}
                                {{($category->color == 'dark' ) ? 
                                // color style
                                'class=" bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500 " ' : '' }}

                                {{-- pink --}}
                                {{($category->color == 'pink' ) ? 
                                // color style
                                'class=" bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-pink-400 border border-pink-400 " ' : '' }}

                                {{-- blue --}}
                                {{($category->color == 'blue' ) ? 
                                // color style
                                'class=" bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 " ' : '' }}

                                {{-- orange --}}
                                {{($category->color == 'orange' ) ? 
                                // color style
                                'class=" bg-orange-100 text-orange-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-orange-400 border border-orange-400 " ' : '' }}

                                {{-- indigo --}}
                                {{($category->color == 'indigo' ) ? 
                                // color style
                                'class=" bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-indigo-400 border border-indigo-400 " ' : '' }}

                                {{-- white --}}
                                {{($category->color == 'white' ) ? 
                                // color style
                                'class=" bg-gray-100 text-gray-50 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-500 dark:text-gray-50 border border-gray-100 " ' : '' }}

                                {{-- end --}}">{{ $category->color }}
                            </span></th>

                            <td class="text-center">
                                <div class="flex flex-col sm:flex-row justify-end items-center gap-2 text-centerr">
                                    <a href="{{ route('category.edit', $category->id) }}" type="button"
                                        class="text-gray-900 hover:text-white hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
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
