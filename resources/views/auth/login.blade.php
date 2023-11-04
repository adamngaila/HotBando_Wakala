<x-guest-layout>
    <x-auth-card>
    <div class="ie-fixMinHeight">
        <div class="main">
            <div class="wrap animated fadeIn">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
       
            @csrf

            <!-- Email Address -->
            <img class='logo' src="img/HotBandoLogo.png" alt="#"/>
         
            <label>
                        <img class="ico" src="img/user.svg" alt="#" />
                        <input name="email" id ='email' type="text" value="username/phone/email" placeholder="Username" />
                    </label>
            <!-- Password -->
           
            <label>
                        <img class="ico" src="img/password.svg" alt="#" />
                        <input name="password" type="password" placeholder="Password"  required autocomplete="current-password" />
                    </label>


            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <input type="submit" value="Connect" />
            </div>
        </form>
        <p class="info bt">Powered by Black Science Technologies Ltd</p> 

            </div>
    </x-auth-card>
</x-guest-layout>
