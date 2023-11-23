<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 dark:text-neutral-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="py-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto pb-5">
            <div class="bg-white dark:bg-neutral-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-neutral-900 dark:text-neutral-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        <div class="w-full bg-white">
            <!-- Statistics Chart -->
            <div class="w-full bg-white rounded-lg shadow dark:bg-neutral-900 p-4 md:p-6">
                <div class="flex justify-between mb-5">
                    <div>
                        <h5 class="leading-none text-3xl font-bold text-neutral-900 dark:text-white pb-2">
                            {{ array_sum($comicsAddedData) }}
                        </h5>
                        <p class="text-base font-normal text-neutral-500 dark:text-neutral-400">Books Added This Week</p>
                    </div>
                </div>
                <div id="grid-chart"></div>
                <div class="grid grid-cols-1 items-center border-neutral-200 border-t dark:border-neutral-700 justify-between mt-5">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown" data-dropdown-placement="bottom" class="text-sm font-medium text-neutral-500 dark:text-neutral-400 hover:text-neutral-900 text-center inline-flex items-center dark:hover:text-white" type="button">
                            Last 7 days
                            <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-neutral-100 rounded-lg shadow w-44 dark:bg-neutral-700">
                            <ul class="py-2 text-sm text-neutral-700 dark:text-neutral-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-neutral-100 dark:hover:bg-neutral-600 dark:hover:text-white">Yesterday</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-neutral-100 dark:hover:bg-neutral-600 dark:hover:text-white">Today</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-neutral-100 dark:hover:bg-neutral-600 dark:hover:text-white">Last 7 days</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-neutral-100 dark:hover:bg-neutral-600 dark:hover:text-white">Last 30 days</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-neutral-100 dark:hover:bg-neutral-600 dark:hover:text-white">Last 90 days</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                            }
                        ],
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
        <div class="mt-10 grid grid-cols-1 lg:grid-cols-4 sm:grid-cols-2 md:grid-cols-3 gap-10">
            <!-- Comic -->
            <div class="max-w-sm bg-neutral-900 border border-neutral-800 rounded-lg shadow">
                <div class="p-5">
                    <a href="{{ route('comic.index') }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-neutral-900 dark:text-white">
                            Comic
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-neutral-700 dark:text-neutral-400">
                        Admin management for the creation, editing, and deletion of comics inside the inventory.
                    </p>
                    <a href="{{ route('comic.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Open Comic
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Category -->
            <div class="max-w-sm bg-neutral-900 border border-neutral-800 rounded-lg shadow">
                <div class="p-5">
                    <a href="{{ route('category.index') }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-neutral-900 dark:text-white">
                            Category
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-neutral-700 dark:text-neutral-400">
                        Admin management for the creation, editing, and deletion of comic categories.
                    </p>
                    <a href="{{ route('category.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Open Category
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Transaction -->
            <div class="max-w-sm bg-neutral-900 border border-neutral-800 rounded-lg shadow">
                <div class="p-5">
                    <a href="{{ route('transaction.index') }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-neutral-900 dark:text-white">
                            Transaction
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-neutral-700 dark:text-neutral-400">
                        Admin management for the creation, editing, and deletion of transactions.
                    </p>
                    <a href="{{ route('transaction.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Open Transaction
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Review -->
            <div class="max-w-sm bg-neutral-900 border border-neutral-800 rounded-lg shadow">
                <div class="p-5">
                    <a href="{{ route('review.index') }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-neutral-900 dark:text-white">
                            Review
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-neutral-700 dark:text-neutral-400">
                        Admin management for the creation, editing, and deletion of comic reviews.
                    </p>
                    <a href="{{ route('review.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Open Review
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
