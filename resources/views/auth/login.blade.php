<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="focus:outline-none focus:ring-cyan-400"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" class="focus:outline-none focus:ring-cyan-400"/>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-cyan-500 shadow-sm" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-cyan-5000 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 bg-cyan-500">
                {{ __('Ingresar') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Opción de registrarse si no tiene cuenta -->
    <div class="mt-4 text-center">
        <span class="text-sm text-gray-600">{{ __('¿No tienes una cuenta?') }}</span>
        <a href="{{ route('register') }}" class="underline text-sm text-cyan-500 hover:text-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 rounded-md">
            {{ __('Registrarse') }}
        </a>
    </div>

</x-guest-layout>
