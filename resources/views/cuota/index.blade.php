<x-app-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Cuota</u></x-breadcrumb>
    </x-slot>

    <x-slot name="slot">
        <div class="py-2 xl:py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  shadow-sm sm:rounded-lg">
                    <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
                        <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
                        <div class="mb-3">
                            {{-- BOTON CREAR CUOTA Y BUSCADOR --}}
                            <div class="flex flex-col sm:flex-row justify-between items-center">
                                {{-- BOTON --}}
                                <div class="flex-auto justify-center ml-4">
                                    <a href="{{ route('cuota.buscaralumno') }}">
                                        <x-button
                                            class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold">
                                            {{ __('Register subscription') }}
                                        </x-button>
                                    </a>
                                </div>

                                {{-- BUSCADOR --}}
                                <x-search>
                                    @section('action')
                                        {{ route('cuota.index') }}
                                    @endsection

                                    @section('opciones')
                                        <option hidden value="">
                                            Filtrar por...
                                        </option>

                                        <option {{ old('filtro') == 'userName' ? 'selected' : '' }}value="userName">Alumno
                                        </option>
                                        <option {{ old('filtro') == 'userName' ? 'selected' : '' }}value="userName">Clase
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
                                        Alumno
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tipo de Clase
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha de pago
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha de Caducidad
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Importe
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    </th>
                                </tr>
                            @endsection


                            @section('contenido-filas')
                                @forelse ($cuotas as $cuota)
                                    <tr>

                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $cuota->userName }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $cuota->tipo_clase }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $cuota->fechaDePago }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $cuota->fechaCaducidad }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $cuota->importe }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
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
                                                    <x-dropdown-link href="{{ route('cuota.edit', $cuota->id) }}">
                                                        {{ __('Edit') }}
                                                    </x-dropdown-link>

                                                    <form method="POST"
                                                        action="{{ route('cuota.destroy', $cuota->id) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <x-dropdown-button class="text-center w-full"
                                                            :href="route('cuota.destroy',$cuota->id)"
                                                            onclick="return confirm('¿Esta seguro de querer borrar esta cuota?');">
                                                            Borrar
                                                        </x-dropdown-button>
                                                    </form>
                                                </x-slot>
                                            </x-dropdown>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            @if (strlen($cuotas) === 0)
                                                <center>No hay cuotas creadas.</center>
                                            @else
                                                <center>No se encontró dicha cuota. Intente nuevamente</center>
                                            @endif
                                        </td>
                                    </tr>
                                @endforelse
                            @endsection
                        @section('paginacion')
                            <div class="mt-4">
                                {{ $cuotas->links() }}
                            </div>
                        @endsection

                    </x-table>
                </div>
            </div>
        </div>

</x-slot>
</x-app-layout>
