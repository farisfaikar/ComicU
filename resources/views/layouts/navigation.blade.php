<nav x-data="{ open: false }" class="bg-white border-b dark:bg-neutral-900 border-neutral-100 dark:border-neutral-800">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block w-16 h-16 fill-current text-neutral-800 dark:text-neutral-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('comic.index')" :active="request()->routeIs('comic.index')">
                        {{ __('Comics') }}
                    </x-nav-link>
                    <x-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')">
                        {{ __('Categories') }}
                    </x-nav-link>
                    <x-nav-link :href="route('transaction.index')" :active="request()->routeIs('transaction.index')">
                        {{ __('Transactions') }}
                    </x-nav-link>
                    <x-nav-link :href="route('review.index')" :active="request()->routeIs('review.index')">
                        {{ __('Reviews') }}
                    </x-nav-link>
                    <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                        {{ __('Users') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contacts.index')" :active="request()->routeIs('contacts.index')">
                    {{ __('Contact Us') }}
                </x-nav-link>

                </div>
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden lg:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 transition duration-150 ease-in-out bg-white border border-transparent rounded-md text-neutral-500 dark:text-neutral-400 dark:bg-neutral-800 hover:text-neutral-700 dark:hover:text-neutral-300 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 transition duration-150 ease-in-out rounded-md text-neutral-400 dark:text-neutral-500 hover:text-neutral-500 dark:hover:text-neutral-400 hover:bg-neutral-100 dark:hover:bg-neutral-900 focus:outline-none focus:bg-neutral-100 dark:focus:bg-neutral-900 focus:text-neutral-500 dark:focus:text-neutral-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('comic.index')" :active="request()->routeIs('comic.index')">
                {{ __('Comics') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')">
                {{ __('Categories') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('transaction.index')" :active="request()->routeIs('transaction.index')">
                {{ __('Transactions') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('review.index')" :active="request()->routeIs('review.index')">
                {{ __('Reviews') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                {{ __('Users') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-neutral-200 dark:border-neutral-600">
            <div class="px-4">
                <div class="text-base font-medium text-neutral-800 dark:text-neutral-200">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-neutral-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
