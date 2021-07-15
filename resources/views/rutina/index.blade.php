<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestión Rutina</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="sm:px-6 lg:px-16 h-full flex justify-center">
      <div class="w-full">
        <div class="bg-white mt-5 shadow-sm sm:rounded-lg">
          <div class="p-2 bg-white border-b border-gray-100">
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
            {{-- DIV ALIGN --}}
            <div class="flex justify-center items-center bg-white mx-auto mb-3 ">

              {{-- BOTON CREAR RUTINA --}}
              <div class="flex-auto justify-center ml-2">
                <a href="{{route('rutina.create')}}">
                  <x-button type="button" class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold">
                    {{ __('Crear rutina') }}
                  </x-button>
                </a>
              </div>

              {{-- BUSCADOR --}}
              <x-search>
                @section('action')
                {{ route('rutina.index') }}
                @endsection

                @section('opciones')
                <option hidden value="">
                  Filtrar por...
                </option>

                <option value="userName" {{ old('filtro') == 'userName' ? 'selected' : '' }}>
                  rutina
                </option>

                <option value="name" {{ old('filtro') == 'name' ? 'selected' : '' }}>
                  Nombre y Apellido
                </option>

                @endsection
              </x-search>
              {{-- FIN BUSCADOR --}}
            </div>{{-- FIN DIV ALIGN --}}

            <x-table>
              @section('nombre-columna')
              <tr>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  fecha de emisión
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  alumno
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  profesor
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  acciones
                </th>
              </tr>
              @endsection


              @section('contenido-filas')
              @forelse ($rutinas as $rutina)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{-- {{ $rutina->userName }} --}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{-- {{ $rutina->name }} --}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{-- {{ $rutina->lastName }} --}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                      <x-button
                        class="outline-none focus:outline-none border px-3 py-1 bg-gray-900 hover:bg-gray-700 text-white rounded-sm flex items-center min-w-32">
                        <span class="pr-1 font-semibold flex-1">Acciones</span>
                        <span>
                          <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                              d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                          </svg>
                        </span>
                      </x-button>
                    </x-slot>

                    <x-slot name="content">
                      <x-dropdown-link href="{{ route('rutina.edit', $rutina->id) }}">
                        {{ __('Edit') }}
                      </x-dropdown-link>

                      <form method="POST" action="{{ route('rutina.destroy', $rutina->id) }}">
                        @csrf
                        @method('DELETE')

                        <x-dropdown-button class="text-center w-full"
                          :href="route('rutina.destroy',$rutina->id)"
                          onclick="return confirm('¿Esta seguro de querer borrar esta rutina?');">
                          Borrar
                        </x-dropdown-button>
                      </form>

                      <x-dropdown-link href="{{ route('rutina.show', $rutina->id) }}">
                        {{ __('Show') }}
                      </x-dropdown-link>
                    </x-slot>
                  </x-dropdown>
                </td>
              </tr>
              @empty
              <tr>
                <td>
                  <center>
                    No se encontró dicho usuario. Intente nuevamente
                  </center>
                </td>
              </tr>
              @endforelse
              @endsection
              @section('paginacion')
              <div class="mt-4">
                {{ $rutinas->links() }}
              </div>
              @endsection
            </x-table>

          </div>
        </div>
      </div>
    </div>
  </x-slot>

</x-app-layout>