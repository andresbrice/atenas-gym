{{-- <x-app-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('asistencia.index') }}">Gestión Asistencia</a> /
            <u>Crear
                Asistencia</u>
        </x-breadcrumb>
    </x-slot>

    <x-slot name="slot">
        <div class="py-2 xl:py-6">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <div class="px-4 py-5 sm:px-6">
                                    <ul class="list-disc list-inside bold">
                                        <li>Fecha: Ejemplo</li>
                                        <li>Horario: Ejemplo</li>
                                        <li>Tipo de Clase: Ejemplo</li>
                                        <li>Profesor: Ejemplo</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="border-t grid grid-cols-1 border-gray-200">
                                <dl>
                                    <div>
                                        <div>
                                            <class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4
                                            sm:px-6">
                                            <dt class="text-sm font-medium  text-gray-500">
                                                Nombre y Apellido
                                            </dt>
                                            <dd class="mt-1  text-sm  text-gray-900 sm:mt-0 sm:col-span-2">
                                                <input type="checkbox" name="alumno1" id="alumno1">
                                            </dd>
                                        </div>
                                        <div>
                                            <class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4
                                            sm:px-6">
                                            <dt class="text-sm font-medium  text-gray-500">
                                                Nombre y Apellido
                                            </dt>
                                            <dd class="mt-1  text-sm  text-gray-900 sm:mt-0 sm:col-span-2">
                                                <input type="checkbox" name="alumno1" id="alumno1">
                                            </dd>
                                        </div>
                                        <div>
                                            <class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4
                                            sm:px-6">
                                            <dt class="text-sm font-medium  text-gray-500">
                                                Nombre y Apellido
                                            </dt>
                                            <dd class="mt-1  text-sm  text-gray-900 sm:mt-0 sm:col-span-2">
                                                <input type="checkbox" name="alumno1" id="alumno1">
                                            </dd>
                                        </div>
                                        <div>
                                            <class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4
                                            sm:px-6">
                                            <dt class="text-sm font-medium  text-gray-500">
                                                Nombre y Apellido
                                            </dt>
                                            <dd class="mt-1  text-sm  text-gray-900 sm:mt-0 sm:col-span-2">
                                                <input type="checkbox" name="alumno1" id="alumno1">
                                            </dd>
                                        </div>
                                        <div>
                                            <class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4
                                            sm:px-6">
                                            <dt class="text-sm font-medium  text-gray-500">
                                                Nombre y Apellido
                                            </dt>
                                            <dd class="mt-1  text-sm  text-gray-900 sm:mt-0 sm:col-span-2">
                                                <input type="checkbox" name="alumno1" id="alumno1">
                                            </dd>
                                        </div>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-2  flex items-center justify-between sm:px-6">
                        <a href="{{ route('asistencia.buscarclase') }}">
                            <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                                {{ __('Back') }}
                            </x-button>
                        </a>
    
                        <x-button
                            class="ml-3 bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                            {{ __('Register Assistance') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>    
</x-app-layout> --}}









<x-app-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('asistencia.index') }}">Gestión Asistencia</a> /
            <u>Crear Asistencia</u>
        </x-breadcrumb>
    </x-slot>

    <x-slot name="slot">
        <div class="py-2 xl:py-6">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-2 2xl:p-4 bg-white">
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <h1 class="text-xl leading-6 font-semibold text-gray-900">
                                    <ul class="list-disc list-inside bold">
                                        <li>Fecha: Ejemplo</li>
                                        <li>Horario: Ejemplo</li>
                                        <li>Tipo de Clase: Ejemplo</li>
                                        <li>Profesor: Ejemplo</li>
                                    </ul>
                                </h1>
                            </div>
                            <div class="border-t grid grid-cols-1 border-gray-200">
                                <dl>
                                    <div
                                        class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium  text-gray-500">
                                            Alumno 
                                        </dt>
                                        <dd class="mt-1  text-sm  text-gray-900 sm:mt-0 sm:col-span-2">
                                            <input type="checkbox" name="alumno1" id="alumno1">
                                        </dd>
                                    </div>
                                    <div
                                        class="bg-white px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Alumno
                                        </dt>
                                        <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <input type="checkbox" name="alumno1" id="alumno1">
                                        </dd>
                                    </div>
                                    <div
                                        class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium  text-gray-500">
                                            Alumno
                                        </dt>
                                        <dd class="mt-1  text-sm  text-gray-900 sm:mt-0 sm:col-span-2">
                                            <input type="checkbox" name="alumno1" id="alumno1">
                                        </dd>
                                    </div>
                                    <div
                                        class="bg-white px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Alumno
                                        </dt>
                                        <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <input type="checkbox" name="alumno1" id="alumno1">
                                        </dd>
                                    </div>
                                    <div
                                        class="bg-gray-50 px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium  text-gray-500">
                                            Alumno
                                        </dt>
                                        <dd class="mt-1  text-sm  text-gray-900 sm:mt-0 sm:col-span-2">
                                            <input type="checkbox" name="alumno1" id="alumno1">
                                        </dd>
                                    </div>
                                    <div
                                        class="bg-white px-4 py-5 place-items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Alumno
                                        </dt>
                                        <dd class="mt-1  text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <input type="checkbox" name="alumno1" id="alumno1">
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-2  flex items-center justify-center sm:px-6">
                        <a href="{{ route('asistencia.index') }}">
                            <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                                {{ __('Back') }}
                            </x-button>
                        </a>
                        <x-button
                            class="ml-3 bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                            {{ __('Register Assistance') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>










