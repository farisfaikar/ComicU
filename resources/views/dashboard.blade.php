<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-neutral-800 dark:text-neutral-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="px-4 py-5 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- This should be an alert -->
        {{-- <div class="pb-5 mx-auto max-w-7xl">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-neutral-900 sm:rounded-lg">
                <div class="p-6 text-neutral-900 dark:text-neutral-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div> --}}
        <div class="w-full">
            <!-- Statistics Chart -->
            <div class="w-full p-4 bg-white rounded-lg shadow dark:bg-neutral-900 md:p-6">
                <div class="flex justify-between mb-5">
                    <div class="w-full">
                        <h5 class="pb-2 text-3xl font-bold leading-none text-neutral-900 dark:text-white">
                            This week's statistics
                        </h5>
                        <div class="flex justify-between w-full gap-5 mt-2">
                            <div class="w-full p-5 rounded bg-neutral-800">
                                <p class="text-base font-normal text-neutral-500 dark:text-neutral-400">Total Comics Added</p>
                                <h5 class="pb-2 text-3xl font-bold leading-none text-neutral-900 dark:text-white">
                                    {{ array_sum($comicsAddedData) }}
                                </h5>
                            </div>
                            <div class="w-full p-5 rounded bg-neutral-800">
                                <p class="text-base font-normal text-neutral-500 dark:text-neutral-400">Total Transactions Created</p>
                                <h5 class="pb-2 text-3xl font-bold leading-none text-neutral-900 dark:text-white">
                                    {{ array_sum($transactionsAddedData) }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="grid-chart"></div>
            </div>

            <script>
                // ApexCharts options and config
                window.addEventListener("load", function() {
                    let options = {
                        // set grid lines to improve the readabilit of the chart, learn more here: https://apexcharts.com/docs/grid/
                        grid: {
                            show: true,
                            strokeDashArray: 4,
                            padding: {
                                left: 2,
                                right: 2,
                                top: -26
                            },
                        },
                        series: [{
                            name: "Comics Added",
                            data: @json($comicsAddedData),
                            color: "#991d20",
                        }, {
                            name: "Transactions Created",
                            data: @json($transactionsAddedData),
                            color: "#d9b42e"
                        }],
                        chart: {
                            height: "100%",
                            maxWidth: "100%",
                            type: "area",
                            fontFamily: "Inter, sans-serif",
                            dropShadow: {
                                enabled: false,
                            },
                            toolbar: {
                                show: false,
                            },
                        },
                        tooltip: {
                            enabled: true,
                            x: {
                                show: false,
                            },
                        },
                        legend: {
                            show: true
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                opacityFrom: 0.55,
                                opacityTo: 0,
                                shade: "#991d20",
                                gradientToColors: ["#991d20"],
                            },
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        stroke: {
                            width: 6,
                        },
                        xaxis: {
                            categories: @json($categories),
                            labels: {
                                show: false,
                            },
                            axisBorder: {
                                show: false,
                            },
                            axisTicks: {
                                show: false,
                            },
                        },
                        yaxis: {
                            show: false,
                            labels: {
                                formatter: function(value) {
                                    return value;
                                }
                            }
                        },
                    }

                    if (document.getElementById("grid-chart") && typeof ApexCharts !== 'undefined') {
                        const chart = new ApexCharts(document.getElementById("grid-chart"), options);
                        chart.render();
                    } else {
                        console.log('ApexCharts failed to load');
                    }
                });
            </script>
        </div>
        <div class="grid grid-cols-1 gap-5 mt-5 lg:grid-cols-5 sm:grid-cols-2 md:grid-cols-3">
            <!-- Comic -->
            <div class="max-w-sm border rounded-lg shadow bg-neutral-900 border-neutral-800">
                <div class="flex flex-col items-start justify-between h-full p-5">
                    <div>
                        <a href="{{ route('comic.index') }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-neutral-900 dark:text-white">
                                Comic
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-neutral-700 dark:text-neutral-400">
                            Admin management for the creation, editing, and deletion of comics inside the inventory.
                        </p>
                    </div>
                    <a href="{{ route('comic.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Open Comic
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Category -->
            <div class="max-w-sm border rounded-lg shadow bg-neutral-900 border-neutral-800">
                <div class="flex flex-col items-start justify-between h-full p-5">
                    <div>
                        <a href="{{ route('category.index') }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-neutral-900 dark:text-white">
                                Category
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-neutral-700 dark:text-neutral-400">
                            Admin management for the creation, editing, and deletion of comic categories.
                        </p>
                    </div>
                    <a href="{{ route('category.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Open Category
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Transaction -->
            <div class="max-w-sm border rounded-lg shadow bg-neutral-900 border-neutral-800">
                <div class="flex flex-col items-start justify-between h-full p-5">
                    <div>
                        <a href="{{ route('transaction.index') }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-neutral-900 dark:text-white">
                                Transaction
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-neutral-700 dark:text-neutral-400">
                            Admin management for the creation, editing, and deletion of transactions.
                        </p>
                    </div>
                    <a href="{{ route('transaction.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Open Transaction
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Review -->
            <div class="max-w-sm border rounded-lg shadow bg-neutral-900 border-neutral-800">
                <div class="flex flex-col items-start justify-between h-full p-5">
                    <div>
                        <a href="{{ route('review.index') }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-neutral-900 dark:text-white">
                                Review
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-neutral-700 dark:text-neutral-400">
                            Admin management for the creation, editing, and deletion of comic reviews.
                        </p>
                    </div>
                    <a href="{{ route('review.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Open Review
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- User -->
            <div class="max-w-sm border rounded-lg shadow bg-neutral-900 border-neutral-800">
                <div class="flex flex-col items-start justify-between h-full p-5">
                    <div>
                        <a href="{{ route('user.index') }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-neutral-900 dark:text-white">
                                User
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-neutral-700 dark:text-neutral-400">
                            User access and creation and editing of user data.
                        </p>
                    </div>
                    <a href="{{ route('user.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Open User
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
