<x-app-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Ejercicio</u></x-breadcrumb>
    </x-slot>

    <x-slot name="slot">
        <div class="py-2 xl:py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
                        <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
                        <div class="mb-3">
                            {{-- BOTON CREAR EJERCICIO Y BUSCADOR --}}
                            <div class="flex flex-col sm:flex-row justify-between items-center">
                                {{-- BOTON --}}
                                <a href="{{ route('ejercicio.create') }}" class="w-max md:mr-5">
                                    <x-button type="button"
                                        class="bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                                        {{ __('Register Exercise') }}
                                    </x-button>
                                </a>

                                {{-- BUSCADOR --}}
                                <x-search>
                                    @section('action')
                                        {{ route('ejercicio.index') }}
                                    @endsection

                                    @section('opciones')
                                        <option hidden value="">
                                            Filtrar por...
                                        </option>

                                        <option value="1" @php
                                            if (isset($seleccionado) && $seleccionado == '1') {
                                                echo 'selected';
                                            }
                                        @endphp>
                                            Ejercicio
                                        </option>

                                    @endsection
                                </x-search>
                                {{-- FIN BUSCADOR --}}
                            </div>
                        </div>
                        <x-table>
                            @section('nombre-columna')
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Descripción
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    </th>
                                </tr>
                            @endsection


                            @section('contenido-filas')
                                @forelse ($ejercicios as $ejercicio)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            {{ $ejercicio->nombre_ejercicio }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            {{ $ejercicio->descripcion }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <div class="inline-flex" role="group" aria-label="Button group">
                                                <button
                                                    class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-l-md focus:shadow-outline hover:bg-green-800">
                                                    <a
                                                        href="{{ route('ejercicio.edit', $ejercicio->id) }}">Editar</a></button>
                                                <form method="POST"
                                                    action="{{ route('ejercicio.destroy', $ejercicio->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-r-md focus:shadow-outline hover:bg-red-800"
                                                        onclick="return confirm('¿Esta seguro de querer borrar este ejercicio?');">Borrar</button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            <center>
                                                No se encontró dicho ejercicio. Intente nuevamente
                                            </center>
                                        </td>
                                    </tr>
                                @endforelse
                            @endsection
                        @section('paginacion')
                            <div class="mt-4">
                                {{ $ejercicios->links() }}
                            </div>
                        @endsection
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-slot>

</x-app-layout>

