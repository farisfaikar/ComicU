@if ($paginator->lastPage() > 1)
    <nav aria-label="Page navigation example">
        <div class="flex items-center justify-center mb-4 sm:justify-between">
            <p class="hidden px-3 py-2 text-sm rounded-lg text-neutral-400 bg-neutral-900 sm:flex">
                Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
            </p>

            <ul class="flex items-center p-0 text-sm">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <!-- Hide the "Previous" button on the first page -->
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="block px-3 py-2 border rounded-l-lg text-neutral-900 bg-neutral-900 border-neutral-900 hover:bg-neutral-700 dark:bg-neutral-900 dark:border-neutral-900 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-white">Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true"><span class="block px-3 py-2 border cursor-not-allowed text-neutral-900 bg-neutral-900 border-neutral-300 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">{{ $element }}</span></li>
                    @endif

                    {{-- Array of links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <span class="block px-3 py-2 border text-neutral-900 bg-neutral-900 border-neutral-900 dark:bg-neutral-900 dark:border-neutral-900 dark:text-neutral-400">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" class="block px-3 py-2 border text-neutral-900 bg-neutral-900 border-neutral-900 hover:bg-neutral-900 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-white">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="block px-3 py-2 border rounded-r-lg text-neutral-900 bg-neutral-900 border-neutral-900 hover:bg-neutral-900 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-white">Next</a>
                    </li>
                @else
                    <li class="disabled" aria-disabled="true">
                        <span class="block px-3 py-2 border rounded-r-lg cursor-not-allowed text-neutral-900 bg-neutral-900 border-neutral-300 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">Next</span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
