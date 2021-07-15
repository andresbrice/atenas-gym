<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Asistencia</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
            <div class="mb-3">
              {{-- BOTON CREAR ASISTENCIA Y BUSCADOR --}}
              <div class="flex flex-col sm:flex-row justify-between items-center">
                {{-- BOTON --}}
                <div class="flex-auto justify-center">
                  <a href="{{ route('asistencia.buscarclase') }}">
                    <x-button
                      class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold">
                      {{ __('Register Assistance') }}
                    </x-button>
                  </a>
                </div>

                {{-- BUSCADOR --}}
                <x-search>
                  @section('action')
                  {{ route('asistencia.index') }}
                  @endsection

                  @section('opciones')
                  <option hidden value="">
                    Filtrar por...
                  </option>

                  <option {{ old('filtro') == 'userName' ? 'selected' : '' }}value="userName">
                    Asistencia
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
                  Tipo de Clase
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Fecha
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Horario
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Acciones
                </th>
              </tr>
              @endsection


              @section('contenido-filas')
              @forelse ($asistencias as $asistencia)
              <tr>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  {{ $asistencia->tipo_clase }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  {{ $asistencia->fecha }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  {{ $asistencia->horario->hora->format('H:i A') }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="inline-flex" role="group" aria-label="Button group">
                    <button
                      class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-l-md focus:shadow-outline hover:bg-green-800">
                      <a href="{{ route('asistencia.edit', $asistencia->id) }}">Editar</a></button>
                    <button
                      class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 focus:shadow-outline hover:bg-yellow-600">
                      <a href="{{ route('asistencia.show', $asistencia->id) }}">Mostrar</a></button>

                    <form method="POST" action="{{ route('asistencia.destroy', $asistencia->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-r-md focus:shadow-outline hover:bg-red-800"
                        onclick="return confirm('¿Esta seguro de querer borrar esta asistencia?');">Borrar</button>
                    </form>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td>
                  @if (strlen($asistencias) === 0)
                  <center>No hay asistencias creadas.</center>
                  @else
                  <center>No se encontró dicho asistencia. Intente nuevamente</center>
                  @endif
                </td>
              </tr>
              @endforelse
              @endsection
              @section('paginacion')
              <div class="mt-4">
                {{ $asistencias->links() }}
              </div>
              @endsection

            </x-table>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>