<div class="bg-neutral-950 flex justify-center">
    <div class="flex items-center py-2 px-6 lg:px-8 max-w-7xl justify-between w-full">
        <a class="btn btn-ghost text-xl">
            <x-application-logo class="h-16 w-16" />
        </a>
        <div class="flex items-center gap-5">
            <div class="form-control">
                <input type="text" placeholder="Search" class="input input-bordered bg-neutral-900 w-full md:w-auto" />
            </div>
            @auth
                <a href="{{ route('dashboard') }}" class="font-semibold text-neutral-400 hover:text-neutral-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-neutral-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-neutral-400 hover:text-neutral-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-neutral-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-neutral-400 hover:text-neutral-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-neutral-500">Register</a>
                @endif
            @endauth
        </div>
    </div>
</div>
