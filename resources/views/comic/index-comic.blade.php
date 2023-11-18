<x-app-layout>
    <section class="p-5">
        <div class="flex justify-between items-center w-full">
            <h2 class="text-2xl font-bold">Comic List</h2>
            <a href="{{ route('comic.create') }}" class="btn btn-primary">Create Comic</a>
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
                                <a class="btn btn-ghost btn-primary btn-sm w-16" href="{{ route('comic.edit', $comic->id) }}">Edit</a>
                                <form action="{{ route('comic.destroy', $comic->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-error btn-sm w-16" onclick="return confirm('are you sure')">Delete</button>
                                </form>
                            </td>
                        </tr>
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
