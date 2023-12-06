<div class="flex justify-center bg-neutral-950">
    <div class="flex items-center justify-between w-full px-6 py-2 lg:px-8 max-w-7xl">
        <a class="text-xl btn btn-ghost">
            <x-application-logo class="w-16 h-16" />
        </a>
        <div class="flex items-center gap-5">
            <div class="form-control">
                <input type="text" placeholder="Search" class="w-full input input-bordered bg-neutral-900 md:w-auto" />
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
