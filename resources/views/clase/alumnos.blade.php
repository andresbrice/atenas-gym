<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Consulta Clase</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-success-message class=" mt-5" :errors="$errors" />
            <div class="flex flex-col">
              <x-table>
                @section('id')
                id="tabla-alumnos"
                @endsection
              </x-table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>


































{{-- <x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('clase.index') }}">Gestión Clase</a> / <u>Alumnos</u>
</x-breadcrumb>
</x-slot>

<x-slot name="slot">
  <div class="flex flex-col md:flex-row py-2 xl:py-6">
    <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
    <div class="flex-1 ">
      <div class="max-w-3xl m-3 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-table>
              @section('nombre-columna')
              <h1 class="text-center">Listado de Alumnos</h1>
              <tr>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  usuario
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  nombre
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  apellido
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  acciones
                </th>
              </tr>
              @endsection

              @section('contenido-filas')
              @forelse ($alumnos as $alumno)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $alumno->userName }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $alumno->name }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $alumno->lastName }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{-- BOTON EDITAR 
                    <a href="#">
                      <x-button class=" text-white bg-yellow-600 hover:bg-yellow-700">
                        Seleccionar
                      </x-button>
                    </a>
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
                  {{ $alumnos->links() }}
          </div>
          @endsection

          </x-table>
        </div>
      </div>
    </div>
  </div>
  <div class="flex-1 ">
    <div class="max-w-3xl m-3 sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
          <x-table>
            @section('nombre-columna')
            <h1 class="text-center">Listado de Alumnos</h1>
            <tr>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                usuario
              </th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                nombre
              </th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                apellido
              </th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                acciones
              </th>
            </tr>
            @endsection

            @section('contenido-filas')
            @forelse ($alumnos as $alumno)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                {{ $alumno->userName }}
              </td>

              <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                {{ $alumno->name }}
              </td>

              <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                {{ $alumno->lastName }}
              </td>

              <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                {{-- BOTON EDITAR
                    <a href="#">
                      <x-button class=" text-white bg-yellow-600 hover:bg-yellow-700">
                        Seleccionar
                      </x-button>
                    </a>
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
                  {{ $alumnos->links() }}
        </div>
        @endsection

        </x-table>
      </div>
    </div>
  </div>
  </div>


  </div>
</x-slot>
</x-app-layout> --}}