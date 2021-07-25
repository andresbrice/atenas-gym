<x-app-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('alumnos.buscarClase') }}">Buscar clase</a> / <u>Consulta Rutinas</u></x-breadcrumb>
    </x-slot>

    <x-slot name="slot">
        <div class="py-2 xl:py-6">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
                        <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
                        <div class="flex flex-col">
                            <style>
                                @media print {
                                  body * {
                                    visibility: hidden;
                                  }
                
                                  .print-container,
                                  .print-container * {
                                    visibility: visible;
                                  }
                
                                  @page {
                                    margin: 0;
                                  }
                
                                  body {
                                    margin: 1.6cm;
                                  }
                                }
                              </style>
                            <div class="flex-1 my-3 print-container">
                                
                                {{-- class="flex pb-5 uppercase text-lg font-bold text-red-700" --}}
                                <div class="text-center font-bold mb-2 underline">
                                    <h2>
                                        Rutina de: {{ Auth::user()->name }} 
                                        {{ Auth::user()->lastName }} - 
                                        {{$clase->tipo_clase}} - 
                                         @foreach ($clase->dias as $dia)
                                         {{ $dia->dia }}@if (!$loop->last),
                                         @endif
                                         @endforeach - 
                                         {{ $clase->horario->hora->format('H:i A') }}
                                    </h2>
                                    
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
                            <div class="px-4 mt-3 py-2  flex items-center justify-between sm:px-6">
                                <a href="{{ route('alumnos.buscarClase') }}">
                                    <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                                        {{ __('Back') }}
                                    </x-button>
                                </a>
                                <x-button
                                    onclick="window.print()" class="ml-3 bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                                    {{ __('Print Routine') }}
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
