<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestión Rutina</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-success-message class="mb-4 font-bold flex justify-center" />
            <x-denied-message class="mb-4 font-bold flex justify-center" />
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
            <div class="mb-3">
              {{-- BOTON CREAR USUARIO Y BUSCADOR --}}
              <div class="flex flex-col sm:flex-row justify-between items-center">
                {{-- BOTON --}}
                <a href="{{ route('rutina.create') }}" class="w-max md:mr-5">
                  <x-button type="button"
                    class="bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                    {{ __('Register Rutine') }}
                  </x-button>
                </a>
                {{-- BUSCADOR --}}
                <x-search>
                  @section('action')
                  {{ route('rutina.index') }}
                  @endsection

                  @section('opciones')
                  <option hidden value="">
                    Filtrar por...
                  </option>
                  {{-- @php if (isset($seleccionado) && $seleccionado=='1' ) { echo 'selected' ; } @endphp --}}
                  <option value="1">
                    Tipo de clase
                  </option>

                  <option value="2">
                    Nombre y Apellido
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
                  Tipo de clase
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Fecha de emisión
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Alumno
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Profesor
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Acciones
                </th>
              </tr>
              @endsection

              @section('contenido-filas')
              @forelse ($rutinas as $rutina)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{-- {{ $usuario->userName }} --}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{-- {{ $usuario->name }} --}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{-- {{ $usuario->lastName }} --}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{-- {{ $usuario->email }} --}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <div class="inline-flex" role="group" aria-label="Button group">
                    <button
                      class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-l-md focus:shadow-outline hover:bg-green-800">
                      <a href="{{ route('usuario.edit', $usuario->id) }}">Editar</a></button>
                    <button
                      class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 focus:shadow-outline hover:bg-yellow-600">
                      <a href="{{ route('usuario.show', $usuario->id) }}">Mostrar</a></button>

                    <form method="POST" action="{{ route('usuario.destroy', $usuario->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="h-9 px-3 text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-r-md focus:shadow-outline hover:bg-red-800"
                        onclick="return confirm('¿Esta seguro de querer borrar este usuario?');">Borrar</button>
                    </form>
                  </div>
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
                {{-- {{ $usuarios->links() }} --}}
              </div>
              @endsection
            </x-table>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>