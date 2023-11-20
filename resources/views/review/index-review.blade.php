<x-app-layout>
    <section class="p-5">
        <div class="flex justify-between items-center w-full">
            <h2 class="text-2xl font-bold">Review List</h2>
            <a href="{{ route('review.create') }}" class="btn btn-primary">Create Review</a>
        </div>

        <div class="overflow-x-auto mt-5">
            <table class="table table-auto">
                <!-- head -->
                <thead>
                    <tr class="uppercase">
                        <th>no</th>
                        <th>user</th>
                        <th>comic</th>
                        <th class="text-center">title</th>
                        <th class="text-center">content</th>
                        <th class="text-center">stars</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reviews as $review)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $review->review_comic }} </td>
                            <td> {{ $review->title }}</td>
                            <td> {{ $review->content }} </td>
                            <td class="text-center"> {{ $review->stars }}</td>
                            <td class="flex flex-col sm:flex-row justify-end items-center gap-2 text-center">
                                <a class="btn btn-ghost btn-primary btn-sm w-16" href="{{ route('review.edit', $review->id) }}">Edit</a>
                                <form action="{{ route('review.destroy', $review->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-error btn-sm w-16" onclick="return confirm('are you sure')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                There are no reviews.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>
