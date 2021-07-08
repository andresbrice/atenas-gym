{{-- <x-app-layout>

    <x-slot name="breadcrumb">
        <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('ejercicio.index') }}">Gestión Ejercicio</a> /
            <u>Crear
                Ejercicio</u>
        </x-breadcrumb>
    </x-slot>


    <x-slot name="slot">
        <div class="mt-5 sm:mt-0  max-w-7xl mx-auto">
            <div class="md:flex md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <!-- Validation Errors -->
                    {{-- <x-auth-validation-errors class=" mt-5 " :errors="$errors" />

                    <form action="{{ route('ejercicio.store') }}" method="POST">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-2 gap-6">
                                    <div class="col-span-6">
                                        <x-label for="nombre_ejercicio" :value="__('Ejercicio')"
                                            class="font-semibold" />
                                        <x-input id="nombre_ejercicio" class="block w-full px-4 py-2 mt-2" type="text"
                                            name="nombre_ejercicio" :value="old('nombre_ejercicio')" required
                                            autofocus />
                                    </div>
                                    <div class="col-span-6">
                                        <x-label for="descripcion" :value="__('Descripción')" class="font-semibold" />
                                        <textarea id="descripcion" name="descripcion" class="resize-none
                        border-gray-300 block
                        focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" rows="3" cols="50"
                                            minlength="10" value="old('descripcion')" required autofocus></textarea>
                                    </div>
                                </div>

                                <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
                                    <x-button class=" bg-red-800">
                                        {{ __('Register Exercise') }}
                                    </x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout> --}}







<x-app-layout>

    <x-slot name="breadcrumb">
        <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('ejercicio.index') }}">Gestión Ejercicio</a> /
            <u>Crear
                Ejercicio</u>
        </x-breadcrumb>
    </x-slot>

    {{-- <div class="px-4 py-5 bg-white sm:p-6"> --}}
    <x-slot name="slot">
        <div class="py-2 xl:py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
                        <!-- Validation Errors -->
                        {{-- <x-auth-validation-errors class="mb-3" :errors="$errors" /> --}}

                        <form action="{{ route('ejercicio.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-col p-4 overflow-hidden sm:rounded-md">

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <x-label for="nombre_ejercicio" :value="__('Ejercicio')"
                                            class="font-semibold" />
                                        <x-input id="nombre_ejercicio" class="block w-full px-4 py-2 mt-2" type="text"
                                            name="nombre_ejercicio" :value="old('nombre_ejercicio')" required
                                            autofocus />
                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <x-label for="descripcion" :value="__('Descripción')" class="font-semibold" />
                                        <textarea id="descripcion" name="descripcion" class="resize-none
                                      border-gray-300 block
                                      focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                                            rows="3" cols="50" minlength="10" value="old('descripcion')" required
                                            autofocus></textarea>
                                    </div>
                                </div>
                                <div class="px-4 py-2  flex items-center justify-between sm:px-6">
                                    <a href="{{ route('ejercicio.index') }}">
                                        <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                                            {{ __('Back') }}
                                        </x-button>
                                    </a>

                                    <x-button
                                        class="ml-3 bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                                        {{ __('Register Exercise') }}
                                    </x-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
