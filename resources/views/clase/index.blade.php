



<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Clase</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white  shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
            <div class="mb-3">
              {{-- BOTON CREAR clase Y BUSCADOR --}}
              <div class="flex flex-col sm:flex-row justify-between items-center">
                {{-- BOTON --}}
                <a href="{{ route('clase.create') }}" class="w-max md:mr-5">
                  <x-button type="button"
                    class="bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                    {{ __('Register Class') }}
                  </x-button>
                </a>

                {{-- BUSCADOR --}}
                <x-search>
                  @section('action')
                  {{ route('clase.index') }}
                  @endsection

                  @section('opciones')
                  <option hidden value="">
                    Filtrar por...
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
                  id
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Tipo de clase
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Cupos Disponibles
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Horario
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Dias de Entrenamiento
                </th>

                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Tarifa
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">

                </th>
              </tr>
              @endsection


              @section('contenido-filas')
              @forelse ($clases as $clase)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  {{ $clase->id }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  {{ $clase->tipo_clase }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  {{ $clase->cupos_disponibles }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  {{ $clase->horario->hora->format('H:i A') }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center">
                  @foreach ($clase->dias as $dia)
                  {{$dia->dia}}@if(!$loop->last), @endif
                  @endforeach
                </td>

                {{-- AVERIGUAR COMO MOSTRAR COMAS ENTRE DIAS --}}
                <td class="px-6 py-4 whitespace-nowrap text-center">
                  ${{ $clase->tarifa->precio }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <x-multi-level-dropdown>
                    @section('editar')
                    <a href="{{ route('clase.edit', $clase->id) }}">
                      Editar
                    </a>
                    @endsection

                    @section('borrar')
                    <form action="{{route('clase.destroy', $clase->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="focus:outline-none"
                        onclick="return confirm('¿Esta seguro de querer borrar la clase {{$clase->tipo_clase}} de las {{ $clase->horario->hora->format('H:i A') }}?')">Borrar</button>
                    </form>
                    @endsection

                    @section('alumnos')
                    <li class="rounded-lg relative px-3 py-1 hover:bg-gray-400">
                      <button class="w-full text-left flex items-center outline-none focus:outline-none">
                        <span class="pr-1 flex-1">Alumnos</span>
                        <span class="mr-auto">
                          <svg class="fill-current h-4 w-4
                                        transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                          </svg>
                        </span>
                      </button>
                      <ul class="bg-white border ring-2 ring-red-700 rounded-lg absolute top-0 right-0 
                              transition duration-150 ease-in-out origin-top-left
                              min-w-32
                              ">
                        <li class="rounded-lg px-3 py-1 hover:bg-gray-400">Agregar</li>
                        <li class="rounded-lg px-3 py-1 hover:bg-gray-400">Editar</li>
                        <li class="rounded-lg px-3 py-1 hover:bg-gray-400">Mostrar</li>
                        <li class="rounded-lg px-3 py-1 hover:bg-gray-400">Borrar</li>

                      </ul>
                    </li>
                    @endsection

                    @section('profesores')
                    <li class="rounded-lg relative px-3 py-1 hover:bg-gray-400">
                      <button class="w-full text-left flex items-center outline-none focus:outline-none">
                        <span class="pr-1 flex-1">Profesores</span>
                        <span class="mr-auto">
                          <svg class="fill-current h-4 w-4
                                        transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                          </svg>
                        </span>
                      </button>
                      <ul class="bg-white border ring-2 ring-red-700 rounded-lg absolute top-0 right-0 
                              transition duration-150 ease-in-out origin-top-left
                              min-w-32
                              ">
                        <li class="rounded-lg px-3 py-1 hover:bg-gray-400">Agregar</li>
                        <li class="rounded-lg px-3 py-1 hover:bg-gray-400">Editar</li>
                        <li class="rounded-lg px-3 py-1 hover:bg-gray-400">Mostrar</li>
                        <li class="rounded-lg px-3 py-1 hover:bg-gray-400">Borrar</li>
                      </ul>
                    </li>
                    @endsection
                  </x-multi-level-dropdown>
                </td>
              </tr>
              @empty
              <tr>
                <td>
                  @if (strlen($clases) === 0)
                  <center>No hay clases creadas.</center>
                  @else
                  <center>No se encontró dicho clase. Intente nuevamente</center>
                  @endif
                </td>
              </tr>
              @endforelse
              @endsection
              @section('paginacion')
              <div class="mt-4">
                {{ $clases->links() }}
              </div>
              @endsection

            </x-table>
          </div>
        </div>
      </div>

  </x-slot>
</x-app-layout>