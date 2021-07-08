<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Tarifa</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white  shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
            <div class="mb-3">
              {{-- BOTON CREAR tarifa Y BUSCADOR --}}
              <div class="flex flex-col sm:flex-row justify-between items-center">
                {{-- BOTON --}}
                <div class="flex-auto justify-center ml-4">
                  @if (count($tarifas)==5)
                  <x-button title="Solo se admiten 5 tarifas"
                    class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold opacity-50 cursor-not-allowed">
                    {{ __('Register Fee') }}
                  </x-button>
                  @else
                  <a href="{{route('tarifa.create')}}">
                    <x-button type="button"
                      class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold">
                      {{ __('Register Fee') }}
                    </x-button>
                  </a>
                  @endif


                </div>

                {{-- BUSCADOR --}}
                {{-- <x-search>
                    @section('action')
                      {{ route('tarifa.index') }}
                @endsection

                @section('opciones')
                <option hidden value="">
                  Filtrar por...
                </option>

                <option {{ old('filtro') == 'userName' ? 'selected' : '' }}value="userName">
                  tarifa
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
                  Cantidad de Dias
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Precio
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                </th>
              </tr>
              @endsection


              @section('contenido-filas')
              @forelse ($tarifas as $tarifa)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $tarifa->cantidad_dias }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $tarifa->precio}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                      <x-button
                        class="outline-none focus:outline-none border px-3 py-1 bg-gray-900 hover:bg-gray-700 text-white rounded-sm flex items-center min-w-32">
                        <span class="pr-1 font-semibold flex-1">Acciones</span>
                        <span>
                          <svg
                            class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                                                                                                                      transition duration-150 ease-in-out"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                          </svg>
                        </span>
                      </x-button>
                    </x-slot>

                    <x-slot name="content">
                      <x-dropdown-link href="{{ route('ejercicio.edit', $ejercicio->id) }}">
                        {{ __('Edit') }}
                      </x-dropdown-link>

                      <form method="POST" action="{{ route('ejercicio.destroy', $ejercicio->id) }}">
                        @csrf
                        @method('DELETE')

                        <x-dropdown-button class="text-center w-full" :href="route('ejercicio.destroy',$ejercicio->id)"
                          onclick="return confirm('¿Esta seguro de querer borrar este ejercicio?');">
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
                  <center>
                    No se encontró dicha tarifa. Intente nuevamente
                  </center>
                </td>
              </tr>
              @endforelse
              @endsection
              @section('paginacion')
              <div class="mt-4">
                {{ $tarifas->links() }}
              </div>
              @endsection
            </x-table>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>