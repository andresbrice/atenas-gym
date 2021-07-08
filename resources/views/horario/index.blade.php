<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Horario</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-validation-errors class="mb-4 font-bold flex justify-center" :status="session('status')" />
            <x-success-message class="mb-4 font-bold flex justify-center" />
            <div class="mb-3">
              {{-- BOTON CREAR horario Y BUSCADOR --}}
              <div class="flex flex-col sm:flex-row justify-between items-center">
                {{-- BOTON --}}
                <a href="{{ route('horario.create') }}" class="w-max md:mr-5">
                  <x-button type="button"
                    class="bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                    {{ __('Register Time') }}
                  </x-button>
                </a>

                {{-- BUSCADOR --}}
                <x-search>
                  @section('action')
                  {{ route('horario.index') }}
                  @endsection

                  @section('opciones')
                  <option hidden value="">
                    Filtrar por...
                  </option>

                  <option {{ old('filtro') == 'time' ? 'selected' : '' }}value="hora">
                    Horario
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
                  hora
                </th>

                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  acciones
                </th>
              </tr>
              @endsection


              @section('contenido-filas')
              @forelse ($horarios as $horario)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center">
                  {{ $horario->hora->format('H:i A') }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium">
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
                      <x-dropdown-link href="{{ route('horario.edit', $horario->id) }}">
                        {{ __('Edit') }}
                      </x-dropdown-link>

                      <form method="POST" action="{{ route('horario.destroy', $horario->id) }}">
                        @csrf
                        @method('DELETE')

                        <x-dropdown-link class="text-center" :href="route('horario.destroy',$horario->id)">
                          <button
                            onclick="return confirm('¿Esta seguro de querer borrar este horario?');">Borrar</button>
                        </x-dropdown-link>
                      </form>

                    </x-slot>
                  </x-dropdown>
                </td>
              </tr>
              @empty
              <tr class="text-center">
                <td>
                  @if (strlen($horarios) === 0)
                  <center>No hay horarios creados.</center>
                  @else
                  <center>No se encontró dicho horario. Intente nuevamente</center>
                  @endif
                </td>
              </tr>
              @endforelse
              @endsection
              @section('paginacion')
              <div class="mt-4">
                {{ $horarios->links() }}
              </div>
              @endsection
            </x-table>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>