<x-app-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('alumnos.buscarClase') }}">Buscar clase</a> / <u>Consulta Rutinas</u></x-breadcrumb>
    </x-slot>

    <x-slot name="slot">
        <div class="py-2 xl:py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
                        <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
                        <div class="mb-3">
                            {{-- BOTON --}}
                            <div class="flex flex-col sm:flex-row justify-between items-center">
                                {{-- BOTON --}}
                                <div class="flex-auto justify-center">
                                    <x-button
                                        class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold">
                                        {{ __('Print Routine') }}
                                    </x-button>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex-1 my-3">
                                <h2 class="text-xl font-bold text-gray-800 uppercase dark:text-white">
                                    DÍA 1
                                </h2>
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
                                    @foreach ($ejercicios as $ejercicio)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $ejercicio->nombre_ejercicio }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $ejercicio->series }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $ejercicio->repeticiones }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $ejercicio->descanso }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endsection

                                </x-table>
                            </div>
                            {{-- <div class="flex-1 my-3">
                                <h2 class="text-xl font-bold text-gray-800 uppercase dark:text-white">Día 2</h2>
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
                                                Zancadas
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                3
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                20
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                30"
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                Abdominales
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                4
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                30
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                60"
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                Peso Muerto
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                4
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                15
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                60"
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                Dominadas
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                3
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                12
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                30"
                                            </td>

                                        </tr>
                                    @endsection

                                </x-table>
                            </div>
                            <div class="flex-1 my-3">
                                <h2 class="text-xl font-bold text-gray-800 uppercase dark:text-white">Día 3</h2>
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
                                                Salto a la cuerda
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                4
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                10
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                60"
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                Jumping Jack
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                3
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                20
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                30"
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                Burpees
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                3
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                10
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                60"
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                Sentadillas Hisometricas
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                4
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                10
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                45"
                                            </td>
                                        </tr>
                                    @endsection

                                </x-table>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
