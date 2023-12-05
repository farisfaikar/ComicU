<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

<div class="card w-100 bg-neutral-800 my-24 ">
  <figure><img src="{{ asset('img/comicu-logo.png') }} "width="150" alt=""/></figure>
  <div class="card-body">
    
      <form method="POST" action="{{ route('login') }}">
          @csrf
          
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        {{-- Logo Google --}}
        <div class="flex items-center justify-center border-solid border-2 mt-3 hover:bg-neutral-300">
            <a href="URL_LOGIN_GMAIL" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-item-center" x="0px" y="0px" width="35" height="40" viewBox="0 0 48 48">
                    <!-- ... (Path SVG) ... -->
                    <path fill="#fbc02d" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#e53935" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4caf50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1565c0" d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                </svg>
                <span class="ml-2 text-neutral-100 hover:text-neutral-900">Login with Google</span>
            </a>
        </div>
        
        
        

        <div class="mt-4">
            <a class="btn btn-primary btn-sm btn-block" style="background-color: #3b5998" href="{{ route('google-login') }}" role="button">
                Continue with Google
            </a>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-indigo-600 rounded shadow-sm dark:bg-neutral-900 border-neutral-300 dark:border-neutral-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-neutral-800" name="remember">
                <span class="text-sm ms-2 text-neutral-600 dark:text-neutral-400">{{ __('Remember me') }}</span>
            </label>
        </div>
        

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="text-sm underline rounded-md text-neutral-600 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-neutral-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-neutral-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>
</div>
</x-guest-layout>
