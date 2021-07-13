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
                            {{-- BOTON CREAR cuota Y BUSCADOR --}}
                            <div class="flex flex-col sm:flex-row justify-between items-center">
                                {{-- BOTON --}}
                                <a href="{{ route('cuota.create') }}" class="w-max md:mr-5">
                                    <x-button type="button"
                                        class="bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                                        {{ __('Register Class') }}
                                    </x-button>
                                </a>

                                {{-- BUSCADOR --}}
                                {{-- <x-search>
                    @section('action')
                    {{ route('cuota.index') }}
                    @endsection
  
                    @section('opciones')
                    <option hidden value="">
                      Filtrar por...
                    </option>
  
                    <option {{ old('filtro') == 'userName' ? 'selected' : '' }}value="userName">cuota
                    </option>
  
                    @endsection
                  </x-search> --}}
                                {{-- FIN BUSCADOR --}}
                            </div>
                        </div>
                        <x-table>
                            @section('nombre-columna')
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        id
                                    </th>
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
                                        Acciones
                                    </th>
                                </tr>
                            @endsection


                            @section('contenido-filas')
                                @forelse ($cuotas as $cuota)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            {{ $cuota->id }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $cuota->userName }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $cuota->tipo_clase }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $cuota->fecha_de_pago }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $cuota->fechaCaducidad }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $cuota->precio }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="inline-flex" role="group" aria-label="Button group">
                                                <button
                                                    class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-l-md focus:shadow-outline hover:bg-green-800">
                                                    <a
                                                        href="{{ route('cuota.edit', $cuota->id) }}">Editar</a></button>
                                                <button
                                                    class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 focus:shadow-outline hover:bg-yellow-600">
                                                    <a
                                                        href="{{ route('cuota.show', $cuota->id) }}">Mostrar</a></button>

                                                <form method="POST" action="{{ route('cuota.destroy', $cuota->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-r-md focus:shadow-outline hover:bg-red-800"
                                                        onclick="return confirm('¿Esta seguro de querer borrar esta cuota?');">Borrar</button>
                                                </form>
                                            </div>
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
