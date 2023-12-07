<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Website Icon -->
    <link rel="icon" href="{{ asset('img/comicu-logo.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-neutral-900 bg-neutral-950">
    <nav class="fixed z-50 flex justify-center w-full bg-neutral-900/80 backdrop-blur-lg">
        <div class="flex items-center justify-between w-full gap-2 px-6 py-2 lg:px-8 max-w-7xl">
            <a href="{{ route('home') }}" class="flex justify-center text-xl align-center">
                <x-application-logo class="w-16 h-16" />
            </a>

            <div class="flex items-center gap-5">
                <a href="{{ route('about') }}" class="font-semibold text-neutral-400 hover:text-neutral-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-neutral-500">About Us</a>
                @auth
                <a href="{{ route('dashboard') }}" class="font-semibold text-neutral-400 hover:text-neutral-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-neutral-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="inline-block px-4 py-2 font-semibold bg-transparent border rounded hover:bg-neutral-300 text-neutral-100 hover:text-neutral-900 border-white-500 hover:border-transparent focus:outline-none focus:ring focus:ring-blue-200 focus:ring-offset-neutral-100">
                        Login
                    </a>

                        @endif --}}
                    @endauth
                </div>
            </div>
        </nav>
        
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image: url('/img/background-comicu.jpg'); background-size: contain;">
            {{ $slot }}
        </div>


        
        <footer class="footer p-10 bg-neutral-800 opacity-90">
       <div class="comicu">
              <a href="" class="flex items-center">
                  <img src="{{ asset('img/comicu-logo.png') }}" class="" width="150" alt="Comicu Logo" />
              </a>
          </div>
            <nav>
                <header class="footer text-base text-neutral-50">ComicU</header>
                <a class="link link-hover text-slate-300">About us</a>
                <a class="link link-hover text-slate-300">Design</a>
                <a class="link link-hover text-slate-300">Achivement</a>
                <a class="link link-hover text-slate-300">Cooperation</a>
            </nav>
            <nav>
                <header class="footer text-base text-neutral-50">Categories</header>
                <a class="link link-hover text-slate-300">Fiction</a>
                <a class="link link-hover text-slate-300">Histories</a>
                <a class="link link-hover text-slate-300">Action</a>
                <a class="link link-hover text-slate-300">Sci-FI</a>
            </nav>
            <nav>
                <header class="footer text-base text-neutral-50">Transactions</header>
                <a class="link link-hover text-slate-300">Payment Methods</a>
                <a class="link link-hover text-slate-300">Refund Policy</a>
                <a class="link link-hover text-slate-300">Shipping Information </a>
                <a class="link link-hover text-slate-300">Return Policy </a>
            </nav>
            <nav>
                <header class="footer text-base text-neutral-50">Others</header>
                <a class="link link-hover text-slate-300">Terms of use</a>
                <a class="link link-hover text-slate-300">Privacy policy</a>
                <a class="link link-hover text-slate-300">Cookie Policy</a>
                <a class="link link-hover text-slate-300">Contact Us</a>
            </nav>
        </footer>
        <footer class="footer px-10 py-4  border-t border-neutral-900 bg-neutral-800 text-base-content">
            <aside class="items-center grid-flow-col">
                <p class="text-neutral-50">
                    © 2023 Copyright Made With   ♥
                </p>
                <a class="text-reset text-neutral-50" href="">Comic U</a>
            </aside>

        <nav class="md:place-self-center md:justify-self-end">
            <div class="grid grid-flow-col gap-4">
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                        <linearGradient id="dYJkfAQNfP2dCzgdw4ruIa_fdfLpA6fsXN2_gr1" x1="23.672" x2="23.672" y1="6.365" y2="42.252" gradientTransform="translate(.305 -.206)" gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#4c4c4c"></stop>
                            <stop offset="1" stop-color="#343434"></stop>
                        </linearGradient>
                        <path fill="url(#dYJkfAQNfP2dCzgdw4ruIa_fdfLpA6fsXN2_gr1)" d="M40.004,41.969L8.031,42c-1.099,0.001-1.999-0.897-2-1.996L6,8.031	c-0.001-1.099,0.897-1.999,1.996-2L39.969,6c1.099-0.001,1.999,0.897,2,1.996L42,39.969C42.001,41.068,41.103,41.968,40.004,41.969z"></path>
                        <path fill="#ec407a" fill-rule="evenodd" d="M29.208,20.607c1.576,1.126,3.507,1.788,5.592,1.788v-4.011	c-0.395,0-0.788-0.041-1.174-0.123v3.157c-2.085,0-4.015-0.663-5.592-1.788v8.184c0,4.094-3.321,7.413-7.417,7.413	c-1.528,0-2.949-0.462-4.129-1.254c1.347,1.376,3.225,2.23,5.303,2.23c4.096,0,7.417-3.319,7.417-7.413V20.607L29.208,20.607z M30.657,16.561c-0.805-0.879-1.334-2.016-1.449-3.273v-0.516h-1.113C28.375,14.369,29.331,15.734,30.657,16.561L30.657,16.561z M19.079,30.832c-0.45-0.59-0.693-1.311-0.692-2.053c0-1.873,1.519-3.391,3.393-3.391c0.349,0,0.696,0.053,1.029,0.159v-4.1	c-0.389-0.053-0.781-0.076-1.174-0.068v3.191c-0.333-0.106-0.68-0.159-1.03-0.159c-1.874,0-3.393,1.518-3.393,3.391	C17.213,29.127,17.972,30.274,19.079,30.832z" clip-rule="evenodd"></path>
                        <path fill="#fff" fill-rule="evenodd" d="M28.034,19.63c1.576,1.126,3.507,1.788,5.592,1.788v-3.157	c-1.164-0.248-2.194-0.856-2.969-1.701c-1.326-0.827-2.281-2.191-2.561-3.788h-2.923V28.79c-0.007,1.867-1.523,3.379-3.393,3.379	c-1.102,0-2.081-0.525-2.701-1.338c-1.107-0.558-1.866-1.705-1.866-3.029c0-1.873,1.519-3.391,3.393-3.391	c0.359,0,0.705,0.056,1.03,0.159v-3.19c-4.024,0.083-7.26,3.369-7.26,7.411c0,2.018,0.806,3.847,2.114,5.183	c1.18,0.792,2.601,1.254,4.129,1.254c4.096,0,7.417-3.319,7.417-7.413L28.034,19.63L28.034,19.63z" clip-rule="evenodd"></path>
                        <path fill="#81d4fa" fill-rule="evenodd" d="M33.626,18.262v-0.854c-1.05,0.002-2.078-0.292-2.969-0.848	C31.445,17.423,32.483,18.018,33.626,18.262z M28.095,12.772c-0.027-0.153-0.047-0.306-0.061-0.461v-0.516h-4.036v16.019	c-0.006,1.867-1.523,3.379-3.393,3.379c-0.549,0-1.067-0.13-1.526-0.362c0.62,0.813,1.599,1.338,2.701,1.338	c1.87,0,3.386-1.512,3.393-3.379V12.772H28.095z M21.635,21.38v-0.909c-0.337-0.046-0.677-0.069-1.018-0.069	c-4.097,0-7.417,3.319-7.417,7.413c0,2.567,1.305,4.829,3.288,6.159c-1.308-1.336-2.114-3.165-2.114-5.183	C14.374,24.749,17.611,21.463,21.635,21.38z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="https://www.instagram.com/comicu_6/">
                    <svg xmlns="http://www.w3.org/2000/svg\" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                        <radialGradient id="yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1" cx="19.38" cy="42.035" r="44.899" gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#fd5"></stop>
                            <stop offset=".328" stop-color="#ff543f"></stop>
                            <stop offset=".348" stop-color="#fc5245"></stop>
                            <stop offset=".504" stop-color="#e64771"></stop>
                            <stop offset=".643" stop-color="#d53e91"></stop>
                            <stop offset=".761" stop-color="#cc39a4"></stop>
                            <stop offset=".841" stop-color="#c837ab"></stop>
                        </radialGradient>
                        <path fill="url(#yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"></path>
                        <radialGradient id="yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2" cx="11.786" cy="5.54" r="29.813" gradientTransform="matrix(1 0 0 .6663 0 1.849)" gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#4168c9"></stop>
                            <stop offset=".999" stop-color="#4168c9" stop-opacity="0"></stop>
                        </radialGradient>
                        <path fill="url(#yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"></path>
                        <path fill="#fff" d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5	s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z"></path>
                        <circle cx="31.5" cy="16.5" r="1.5" fill="#fff"></circle>
                        <path fill="#fff" d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12	C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z"></path>
                    </svg>
                </a>

                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                        <linearGradient id="awSgIinfw5_FS5MLHI~A9a_yGcWL8copNNQ_gr1" x1="6.228" x2="42.077" y1="4.896" y2="43.432" gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#0d61a9"></stop>
                            <stop offset="1" stop-color="#16528c"></stop>
                        </linearGradient>
                        <path fill="url(#awSgIinfw5_FS5MLHI~A9a_yGcWL8copNNQ_gr1)" d="M42,40c0,1.105-0.895,2-2,2H8c-1.105,0-2-0.895-2-2V8c0-1.105,0.895-2,2-2h32	c1.105,0,2,0.895,2,2V40z"></path>
                        <path d="M25,38V27h-4v-6h4v-2.138c0-5.042,2.666-7.818,7.505-7.818c1.995,0,3.077,0.14,3.598,0.208	l0.858,0.111L37,12.224L37,17h-3.635C32.237,17,32,18.378,32,19.535V21h4.723l-0.928,6H32v11H25z" opacity=".05"></path>
                        <path d="M25.5,37.5v-11h-4v-5h4v-2.638c0-4.788,2.422-7.318,7.005-7.318c1.971,0,3.03,0.138,3.54,0.204	l0.436,0.057l0.02,0.442V16.5h-3.135c-1.623,0-1.865,1.901-1.865,3.035V21.5h4.64l-0.773,5H31.5v11H25.5z" opacity=".07"></path>
                        <path fill="#fff" d="M33.365,16H36v-3.754c-0.492-0.064-1.531-0.203-3.495-0.203c-4.101,0-6.505,2.08-6.505,6.819V22h-4v4	h4v11h5V26h3.938l0.618-4H31v-2.465C31,17.661,31.612,16,33.365,16z"></path>
                    </svg>
                </a>
            </div>
        </nav>
    </footer>
</body>

</html>
