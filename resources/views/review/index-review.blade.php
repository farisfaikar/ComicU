<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-neutral-800 dark:text-neutral-200">
            {{ __('Review List') }}
        </h2>
    </x-slot>
    <section class="p-5">
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center w-full">
                <x-searchbar :action="route('review.search')" />    
                <a href="{{ route('review.create') }}" type="button" class=" focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm text-center px-2.5 py-2.5 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                    Create Review
                </a>
            </div>
        </div>
           
        <div class="mt-5 overflow-x-auto">
            <table class="table table-auto">
                <!-- head -->
                <thead class="text-xs text-gray-300 uppercase bg-neutral-950">
                    <tr class="uppercase">
                        <th>No</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th class="text-center">Stars</th>
                        <th class="text-center">User</th>
                        <th class="text-center">Comic</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="border-b bg-neutral-900 border-neutral-900">
                    @forelse ($reviews as $key => $review)
                        <tr>
                            <td class="px-6 py-4 font-medium text-white"> {{ $reviews-> firstitem() + $key }} </td>
                            <td class="px-6 py-4 font-medium text-white"> {{ $review->title }}</td>
                            <td class="px-6 py-4 font-medium text-neutral-500"> {{ $review->content }} </td>
                            <td class="flex flex-nowrap px-6 py-4 font-medium text-center text-white w-52"> 
                                @for ($i = 0; $i < $review->stars; $i++)
                                    ⭐
                                @endfor
                            </td>
                            <td class="px-6 py-4 font-medium text-center text-white"> {{ $review->user->name }}</td>
                            <td class="px-6 py-4 font-medium text-center text-white"> {{ $review->comic->comic_name }}</td>
                            <td class="flex flex-col items-center justify-end gap-2 text-center sm:flex-row">
                                <a href="{{ route('review.edit', $review->id) }}" type="button" class="text-blue-700 hover:text-blue-500 border border-blue-500 hover:bg-gray-900 focus:ring-4 focus:outline-none  focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-gray-800">
                                    Edit
                                </a>
                                <form action="{{ route('review.destroy', $review->id) }}" method="post">
                                    <button data-modal-target="static-modal-{{ $loop->iteration }}" data-modal-toggle="static-modal-{{ $loop->iteration }}" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" type="button">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <!-- Main modal -->
                        <div id="static-modal-{{ $loop->iteration }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full p-4">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-neutral-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 border-neutral-600">
                                        <h3 class="text-xl font-semibold text-error">
                                            Warning
                                        </h3>
                                        <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-white bg-transparent rounded-lg ms-auto dark:hover:bg-neutral-600 dark:hover:text-white" data-modal-hide="static-modal-{{ $loop->iteration }}">X
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 space-y-4 md:p-5">
                                        <p class="text-base leading-relaxed text-white">
                                            Are you sure you want to delete this review data?
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 md:p-5">
                                        <form action="{{ route('review.destroy', $review->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button data-modal-hide="static-modal-{{ $loop->iteration }}" type="submit" class="text-white btn btn-error">Yes, I'm sure</button>
                                            <button data-modal-hide="static-modal-{{ $loop->iteration }}" type="button" class="btn btn-ghost">No, cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <div class="mt-5">
            {{ $reviews->links() }}
        </div>
    </section>
</x-app-layout>
