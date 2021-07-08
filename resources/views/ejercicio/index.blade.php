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
                                            <x-dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    <x-button
                                                        class="outline-none focus:outline-none border px-3 py-1 bg-gray-900 hover:bg-gray-700 text-white rounded-sm flex items-center min-w-32">
                                                        <span class="pr-1 font-semibold flex-1">Acciones</span>
                                                        <span>
                                                            <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                                                                            transition duration-150 ease-in-out"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                <path
                                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                            </svg>
                                                        </span>
                                                    </x-button>
                                                </x-slot>

                                                <x-slot name="content">
                                                    <x-dropdown-link href="{{ route('ejercicio.edit', $ejercicio->id) }}">
                                                        {{ __('Edit') }}
                                                    </x-dropdown-link>

                                                    <form method="POST"
                                                        action="{{ route('ejercicio.destroy', $ejercicio->id) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <x-dropdown-link class="text-center" :href="route('ejercicio.destroy',$ejercicio->id)">
                                                            <button onclick="return confirm('¿Esta seguro de querer borrar este ejercicio?');">Borrar
                                                            </button>
                                                        </x-dropdown-link>
                                                    </form>
                                                </x-slot>
                                            </x-dropdown>
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
