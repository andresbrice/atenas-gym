<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestión Cuota</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
            <div class="mb-3">
              {{-- BOTON CREAR CUOTA Y BUSCADOR --}}
              <div class="flex flex-col sm:flex-row justify-between items-center">
                {{-- BOTON --}}
                <div class="flex-auto justify-center ml-4">
                  <a href="{{ route('cuota.seleccionaralumno') }}">
                    <x-button
                      class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold">
                      {{ __('Register Subscription') }}
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
                  {{-- {{ old('filtro') == 'userName' ? 'selected' : '' }}value="userName" --}}
                  <option >Alumno
                  </option>
                  <option >Clase
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
                  Acciones
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
                  <div class="inline-flex" role="group" aria-label="Button group">
                    <button
                      class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-l-md focus:shadow-outline hover:bg-green-800">
                      <a href="{{ route('cuota.edit', $cuota->id) }}">Editar</a></button>

                    <button
                      class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-r-md focus:shadow-outline hover:bg-red-800"
                      onclick="return confirm('¿Esta seguro de querer borrar esta cuota?');">Borrar</button>

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