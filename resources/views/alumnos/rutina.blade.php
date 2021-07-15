<x-app-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Asistencia</u></x-breadcrumb>
    </x-slot>

    <x-slot name="slot">
        <div class="py-2 xl:py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
                        <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
                        <div class="mb-3">
                            {{-- BOTON CREAR ASISTENCIA Y BUSCADOR --}}
                            <div class="flex flex-col sm:flex-row justify-between items-center">
                                {{-- BOTON --}}
                                <div class="flex-auto justify-center">
                                    <a href="{{ route('asistencia.buscarclase') }}">
                                        <x-button
                                            class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold">
                                            {{ __('Imprimir Rutina') }}
                                        </x-button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <x-table>
                            @section('nombre-columna')
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Ejercicio
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Series
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Repeticiones
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Descansos
                                    </th>
                                </tr>
                            @endsection


                            @section('contenido-filas')
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        Press de Banca
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        4
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        10
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        60"
                                    </td>
                                </tr>
                            @endsection
                            @section('contenido-filas')
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        Aperturas
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        4
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        10
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        60"
                                    </td>
                                </tr>
                            @endsection
                            @section('contenido-filas')
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        Burpees
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        4
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        10
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        60"
                                    </td>
                                </tr>
                            @endsection
                        </x-table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
