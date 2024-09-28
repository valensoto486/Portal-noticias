<x-app-layout>
    <x-slot name="header">
        @include('components.header') <!-- header -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Iniciaste Sesion") }}
                </div>
            </div>
        </div>
    </div>
    @include('components.footer') <!-- footer -->

</x-app-layout>
