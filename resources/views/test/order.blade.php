<x-guest-layout>
    <section class="max-w-4xl w-full py-20 overflow-hidden bg-white font-poppins dark:bg-neutral-800">
        <div class="px-4 py-4 mx-auto lg:py-8 md:px-6">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4 md:w-1/2 ">
                    <div class="sticky top-0 z-10 overflow-hidden ">
                        <div class="relative mb-6 lg:mb-10" style="height:450px;">
                            <img src="{{ asset('storage/comic-photo/' . $comic->comic_photo) }}" alt="{{ $comic->comic_name }}" class="object-contain w-full h-full ">
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 ">
                    <form method="post" action="{{ route('checkout') }}">
                        @csrf

                        <input type="text" name="name" value="{{ auth()->user()->name }}" hidden>
                        <input type="number" name="qty" value="{{ $comic->price }}" hidden>

                        <div class="pb-6 mb-8 border-b border-neutral-200 dark:border-neutral-700">
                            <h2 class="max-w-2xl mt-2 mb-6 text-xl font-bold dark:text-neutral-300 md:text-4xl">
                                {{ $comic->comic_name }}
                            </h2>
                            <div class="flex flex-wrap items-center mb-6">
                                @if ($comic->average_stars)
                                    @for ($i = 0; $i < floor($comic->average_stars); $i++)
                                        ⭐
                                    @endfor
                                @else
                                    ⭐
                                @endif
                            </div>
                            @if ($comic->synopsis)
                                <p class="max-w-2xl mb-8 text-neutral-200">
                                    {{ strlen($comic->synopsis) > 200 ? substr($comic->synopsis, 0, 200) . '...' : $comic->synopsis }}
                                </p>
                            @else
                                <p class="max-w-2xl mb-8 text-neutral-200">
                                    No synopsis provided.
                                </p>

                            @endif
                            <p class="inline-block text-2xl font-semibold text-white">
                                <span>Rp. {{ $comic->price }}</span>
                            </p>
                        </div>
                        <div class="mb-5 border-b border-neutral-700">
                            <h2 class="mb-4 text-xl font-bold text-white">
                                Category</h2>
                            <div class="flex flex-wrap gap-4 mb-8">
                                <span
                                    class="
                                        text-sm font-medium me-2 px-3 py-1 rounded 
                                        {{ $comic->category->color == 'red' ? '      bg-red-600/20        text-red-500 border     border-red-500 ' : '' }}
                                        {{ $comic->category->color == 'cyan' ? '     bg-cyan-700/30       text-cyan-500 border    border-cyan-500' : '' }}
                                        {{ $comic->category->color == 'pink' ? '     bg-pink-200/10       text-pink-500 border    border-pink-500' : '' }}
                                        {{ $comic->category->color == 'blue' ? '     bg-blue-800/20       text-blue-400 border    border-blue-400' : '' }}
                                        {{ $comic->category->color == 'white' ? '    bg-gray-300/20      text-gray-200 border     border-gray-200' : '' }}
                                        {{ $comic->category->color == 'green' ? '    bg-green-500/10      text-green-400 border   border-green-400 ' : '' }}
                                        {{ $comic->category->color == 'yellow' ? '   bg-yellow-400/10     text-yellow-400 border  border-yellow-400' : '' }}
                                        {{ $comic->category->color == 'purple' ? '   bg-purple-600/20     text-purple-400 border  border-purple-400' : '' }}
                                        {{ $comic->category->color == 'orange' ? '   bg-orange-600/10     text-orange-500 border  border-orange-500' : '' }}
                                        {{ $comic->category->color == 'indigo' ? '   bg-indigo-500/20     text-indigo-400 border  border-indigo-400' : '' }}
                                        ">
                                    {{ $comic->category->category_name }}
                                </span>
                            </div>
                        </div>
                        <h2 class="mb-4 text-3xl font-bold text-white">
                            Order Information
                        </h2>
                        <div class="mb-5">
                            <label for="textareaAddress" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Address</label>
                            <div class="flex flex-wrap gap-4">
                                <textarea id="textareaAddress" name="address" rows="10" class="block p-2.5 w-full text-sm text-neutral-900 bg-neutral-50 rounded-lg border border-neutral-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter address here..." required></textarea>
                            </div>
                        </div>
                        <div class="mb-5 border-b border-neutral-700">
                            <label for="inputPhone" class="block mb-2 text-md font-large text-neutral-900 dark:text-white">Phone Number</label>
                            <input type="number" name="phone" id="inputPhone" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-8" placeholder="Enter phone number here..." required>
                        </div>
                        <div class="flex flex-wrap items-center mt-8">
                            <button type="submit" class="w-full h-10 p-2 bg-blue-500 rounded mr-4b dark:text-neutral-200 text-neutral-50 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500">
                                Purchase Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
</x-guest-layout>
