<x-guest-layout>
    <div class="relative min-h-screen bg-center bg-dots-darker selection:bg-neutral-500 selection:text-white">
        <div class="p-6 mx-auto my-12 max-w-7xl lg:p-8">
            <div class="bg-white rounded-xl dark:bg-neutral-900 sm:mt-12">
                <div class="grid max-w-screen-xl px-5 py-10 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                    <div class="mr-auto place-self-center lg:col-span-7">
                        <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">Comic Inventory Management Made Easy</h1>
                        <p class="max-w-2xl mb-6 font-light text-neutral-500 lg:mb-8 md:text-lg lg:text-xl dark:text-neutral-400">From tracking rare editions to seamless inventory control, comic shops worldwide relying on ComicU to streamline their management processes.</p>
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                            Explore Features
                            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="{{ route('about') }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center border rounded-lg text-neutral-900 border-neutral-300 hover:bg-neutral-100 focus:ring-4 focus:ring-neutral-100 dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:ring-neutral-800">
                            About Us
                        </a>
                    </div>
                    <div class="justify-center hidden lg:flex lg:mt-0 lg:col-span-5 max-h-80">
                        <img src="{{ asset('img/comicu-logo.png') }}" alt="ComicU Logo">
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-5 mb-5 md:m-0 ">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg mt-relative md:h-96">
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            <!-- Item 1 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2023/5/25/b29498e6-da76-443c-97ea-426b4a4e2e01.jpg.webp?ect=4g" class="absolute block object-cover w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 rounded-2xl max-h-56" alt="...">
                            </div>
                            <!-- Item 2 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                <img src="https://www.static-src.com/siva/asset/05_2023/desktop-12mei-maybank-car4-2.jpg?w=960" class="absolute block object-cover w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 rounded-2xl max-h-56" alt="...">
                            </div>
                            <!-- Item 3 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2023/5/26/0784c14e-c0d0-48da-b01c-d669b86a086f.jpg.webp?ect=4g" class="absolute block object-cover w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 rounded-2xl max-h-56" alt="...">
                            </div>
                            <!-- Item 4 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://www.static-src.com/siva/asset/05_2023/desktop-12mei-maybank-car4-2.jpg?w=960" class="absolute block object-cover w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 rounded-2xl max-h-56" alt="...">
                            </div>
                            <!-- Item 5 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2023/5/25/b29498e6-da76-443c-97ea-426b4a4e2e01.jpg.webp?ect=4g" class="absolute block object-cover w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 rounded-2xl max-h-56" alt="...">
                            </div>
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer start-0 group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-neutral-800/30 group-hover:bg-white/50 dark:group-hover:bg-neutral-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-neutral-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-neutral-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer end-0 group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-neutral-800/30 group-hover:bg-white/50 dark:group-hover:bg-neutral-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-neutral-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-neutral-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-5">
                @foreach ($categories as $category)
                    <div class="flex flex-col max-w-sm border rounded-lg shadow bg-neutral-900/80 border-neutral-800">
                        <div class="p-2 sm:p-5">
                            <h2 class="text-lg font-bold text-center text-white sm:text-xl">{{ $category->category_name }}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5 text-3xl font-bold text-neutral-100">
                <h2>Comic Recommend For You</h2>
            </div>
            <div class="grid grid-cols-1 gap-10 mt-10 lg:grid-cols-6 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($rec_comics as $rec_comic)
                    <div class="flex flex-col max-w-sm border rounded-lg shadow bg-neutral-900 border-neutral-800">
                        <a href="#" class="overflow-hidden">
                            <img class="rounded-t-lg object-fill h-[300px]" src="{{ asset('storage/comic-photo/' . $rec_comic->comic_photo) }}" alt="..." />

                        </a>
                        <div class="flex-1 pt-1 pl-5 pr-5">
                            <a href="#">
                                <h5 class="text-sm font-bold tracking-tight text-neutral-400">
                                    {{ $rec_comic->author }}
                                </h5>
                            </a>
                        </div>
                        <div class="flex-1 pt-3 pl-5 pr-5">
                            <a href="#">
                                <h5 class="text-xl font-bold tracking-tight text-neutral-900 dark:text-white">
                                    {{ $rec_comic->comic_name }}
                                </h5>
                            </a>
                        </div>
                        <div class="flex-1 pt-1 pl-5 pr-5">
                            <p class="text-white">
                                @if ($rec_comic->average_stars)
                                    @for ($i = 0; $i < floor($rec_comic->average_stars); $i++)
                                        ⭐
                                    @endfor
                                @else
                                    ⭐
                                @endif
                            </p>
                        </div>
                        <div class="flex-1 pt-2 pl-5">
                            <p class="mb-3 font-normal text-neutral-700 dark:text-neutral-400">
                                Rp. {{ $rec_comic->price }}
                            </p>
                        </div>
                        <div class="pb-5 pl-5 pr-5">
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-10 text-3xl font-bold text-neutral-100">
                {{-- title --}}
                <h2>Comic Popular Comics</h2>
            </div>
            <div class="grid grid-cols-1 gap-10 mt-10 lg:grid-cols-6 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($popu_comics as $popu_comic)
                    <div class="flex flex-col max-w-sm border rounded-lg shadow bg-neutral-900 border-neutral-800">
                        <a href="#" class="overflow-hidden">
                            <img class="rounded-t-lg object-fill h-[300px]" src="{{ asset('storage/comic-photo/' . $popu_comic->comic_photo) }}" alt="..." />
                        </a>
                        <div class="flex-1 pt-1 pl-5 pr-5">
                            <a href="#">
                                <h5 class="text-sm font-bold tracking-tight text-neutral-400">
                                    {{ $popu_comic->author }}
                                </h5>
                            </a>
                        </div>
                        <div class="flex-1 pt-3 pl-5 pr-5">
                            <a href="#">
                                <h5 class="text-xl font-bold tracking-tight text-neutral-900 dark:text-white">
                                    {{ $popu_comic->comic_name }}
                                </h5>
                            </a>
                        </div>
                        <div class="flex-1 pt-1 pl-5 pr-5">
                            <p class="text-white">
                                @if ($popu_comic->average_stars)
                                    @for ($i = 0; $i < floor($popu_comic->average_stars); $i++)
                                        ⭐
                                    @endfor
                                @else
                                    ⭐
                                @endif
                            </p>
                        </div>
                        <div class="flex-1 pt-2 pl-5">
                            <p class="mb-3 font-normal text-neutral-700 dark:text-neutral-400">
                                Rp. {{ $popu_comic->price }}
                            </p>

                        </div>
                        <div class="pb-5 pl-5 pr-5">
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />

                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-guest-layout>
