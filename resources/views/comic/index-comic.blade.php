<x-app-layout>
    <section class="p-5">
        <div class="flex justify-between items-center w-full">
            <h2 class="text-2xl font-bold">Comic List</h2>
            <a href="{{ route('comic.create') }}" class="btn btn-outline btn-success ">Create a new comics</a>
        </div>

        <div class="overflow-x-auto mt-5">
            <table class="table table-auto">
                <!-- head -->
                <thead>
                    <tr class="uppercase">
                        <th>no</th>
                        <th>comic name</th>
                        <th>synopsis</th>
                        <th>author</th>
                        <th class="text-center">stock</th>
                        <th class="text-center">category</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comics as $comic)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $comic->comic_name }} </td>
                            <td> {{ $comic->synopsis }}</td>
                            <td> {{ $comic->author }} </td>
                            <td class="text-center"> {{ $comic->stock }}</td>
                            <td class="text-center"> {{ $comic->category_id }}</td>
                            <td class="flex flex-col sm:flex-row justify-end items-center gap-2 text-center">
                                <a class="btn btn-ghost btn-primary text-secondary btn-sm w-16"
                                    href="{{ route('comic.edit', $comic->id) }}">Edit</a>
                                <form action="{{ route('comic.destroy', $comic->id) }}" method="post">
                                    <button data-modal-target="static-modal-{{ $loop->iteration }}" data-modal-toggle="static-modal-{{ $loop->iteration }}"
                                        class="btn btn-outline btn-error btn-sm w-16" type="button">
                                        delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <!-- Main modal -->
                        <div id="static-modal-{{ $loop->iteration }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-neutral-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-neutral-600">
                                        <h3 class="text-xl font-semibold text-error">
                                            WARNING !!!
                                        </h3>
                                        <button type="button"
                                            class="text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-neutral-600 dark:hover:text-white"
                                            data-modal-hide="static-modal-{{ $loop->iteration }}">X
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4">
                                        <p class="text-base leading-relaxed text-white">
                                            are you sure delete this?
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 md:p-5">
                                        <form action="{{ route('comic.destroy', $comic->id) }}" method="post">
                                            @method('delete')
                                            @csrf                
                                            <button data-modal-hide="static-modal-{{ $loop->iteration }}" type="submit"
                                                class="btn btn-error text-white">YES</button>
                                            <button data-modal-hide="static-modal-{{ $loop->iteration }}" type="button"
                                                class="btn btn-ghost">NO</button>
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
    </section>


</x-app-layout>
