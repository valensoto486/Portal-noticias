@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-lg font-medium pt-3">Configuración de Perfil</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 pt-4 pb-4">
                {{ __('Información de perfil') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Actualiza tu información de perfil o Email.") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4 pb-4">
                <x-primary-button>{{ __('Guardar') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Guardado.') }}</p>
                @endif
            </div>
        </form>
    </section>

    <hr>

    <!-- Sección para Cambiar la Imagen de Perfil -->
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 pt-5 pb-4">
                {{ __('Cambiar Imagen de Perfil') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Sube una nueva imagen para tu perfil.') }}
            </p>
        </header>

        <form method="post" action="{{ route('profile.image.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div>
                <x-input-label for="profile_image" :value="__('Imagen de Perfil')" />
                <x-text-input id="profile_image" name="profile_image" type="file" class="mt-1 block w-full" accept="image/*" />
                <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
            </div>

            <div class="flex items-center gap-4 pb-4">
                <x-primary-button>{{ __('Subir Imagen') }}</x-primary-button>

                @if (session('status') === 'image-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Imagen Actualizada.') }}</p>
                @endif
            </div>
        </form>
    </section>

    <hr>

    <!-- Formulario para Actualizar Contraseña -->
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 pt-5 pb-4">
                {{ __('Actualiza tu contraseña') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Asegúrate de que la cuenta utilice una contraseña segura.') }}
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')

            <div>
                <x-input-label for="update_password_current_password" :value="__('Contraseña Actual')" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="update_password_password" :value="__('Contraseña Nueva')" />
                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="update_password_password_confirmation" :value="__('Confirmar Contraseña')" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center gap-4 pb-4">
                <x-primary-button>{{ __('Guardar') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Guardado.') }}</p>
                @endif
            </div>
        </form>
    </section>

    <hr>

    <!-- Formulario para Eliminar Cuenta -->
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900 pt-5 pb-4">
                {{ __('Eliminar Cuenta') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Una vez que tu cuenta sea eliminada, todos sus recursos y datos serán eliminados permanentemente. Antes de eliminar tu cuenta, descarga cualquier dato o información que desees conservar.') }}
            </p>
        </header>

        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >{{ __('Eliminar Cuenta') }}</x-danger-button>

        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('¿Estás seguro de que deseas eliminar tu cuenta?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Una vez que tu cuenta sea eliminada, todos sus recursos y datos serán eliminados permanentemente. Por favor, ingresa tu contraseña para confirmar que deseas eliminar tu cuenta permanentemente.') }}
                </p>

                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Contraseña') }}" class="sr-only" />

                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Contraseña') }}"
                    />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="mt-6 flex gap-4">
                    <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancelar') }}</x-secondary-button>

                    <x-danger-button>{{ __('Eliminar Cuenta') }}</x-danger-button>
                </div>
            </form>
        </x-modal>
    </section>
</div>
@endsection
