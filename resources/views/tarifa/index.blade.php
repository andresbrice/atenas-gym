<x-app-layout>
    <x-slot name="breadcrumb">
      <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Tarifa</u></x-breadcrumb>
    </x-slot>
  
    <x-slot name="slot">
      <div class="py-2 xl:py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
              <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
              <div class="mb-3">
                {{-- BOTON CREAR tarifa Y BUSCADOR --}}
                <div class="flex flex-col sm:flex-row justify-between items-center">
                  {{-- BOTON --}}
                  <div class="flex-auto justify-center ml-4"> 
                    @if (count($tarifas)==5)
                  <x-button title="Solo se admiten 5 tarifas" class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold opacity-50 cursor-not-allowed">
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
                        <x-multi-level-dropdown>
                          @section('editar')
                          <a href="{{ route('tarifa.edit', $tarifa->id) }}">
                            Editar
                          </a>
                          @endsection
      
                          @section('borrar')
                          <form action="{{route('tarifa.destroy', $tarifa->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="focus:outline-none"
                              onclick="return confirm('¿Esta seguro de querer borrar la tarifa?')">Borrar</button>
                          </form>
                          @endsection
                        </x-multi-level-dropdown>
                        </form>
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