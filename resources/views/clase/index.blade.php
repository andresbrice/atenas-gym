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
                  <option {{ old('filtro') == 'tipo_clase' ? 'selected' : '' }}value="tipo_clase">
                    Clase
                  </option>
                  <option {{ old('filtro') == 'clase' ? 'selected' : '' }}value="clase">
                    clase
                  </option>
                  <option {{ old('filtro') == 'clase' ? 'selected' : '' }}value="clase">
                    Días
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
                  Cupos Disponibles
                </th>
                <th scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  clase
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
                  {{ $dia->dia }}@if (!$loop->last), @endif
                  @endforeach
                </td>

                {{-- AVERIGUAR COMO MOSTRAR COMAS ENTRE DIAS --}}
                <td class="px-6 py-4 whitespace-nowrap text-center">
                  ${{ $clase->tarifa->precio }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                  {{-- <x-multilevel-dropdown>
                    @section('editar')
                    <li><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                        href="{{route('clase.edit',$clase->id)}}">Editar</a></li>
                  @endsection
                  @section('borrar')
                  <form method="POST" action="{{ route('clase.destroy',$clase->id) }}">
                    @csrf
                    @method('DELETE')
                    <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                        href="{{route('clase.destroy',$clase->id)}}"
                        onclick="event.preventDefault();this.closest('form').submit();return confirm('¿Esta seguro de querer borrar la clase?');">Borrar</a>
                    </li>
                  </form>
                  @endsection
                  @section('alumnos')
                  <li class="dropdown">
                    <span class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Alumnos
                      🡺</span>
                    <ul
                      class="dropdown-content rounded-md border-2 border-red-700 absolute hidden text-gray-900 left-28 -mt-10">
                      <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Agregar
                          Alumnos</a>
                      <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Editar
                          Alumnos</a>
                      <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Mostrar
                          Alumnos</a>
                      <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Borrar
                          Alumnos</a>
                    </ul>
                  </li>
                  @endsection
                  @section('profesores')
                  <li class="dropdown">
                    <span class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Profesores
                      🡺</span>
                    <ul
                      class="dropdown-content rounded-md border-2 border-red-700 absolute hidden text-gray-900 left-28 -mt-10">
                      <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Agregar
                          Profesores</a>
                      <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Editar
                          Profesores</a>
                      <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Mostrar
                          Profesores</a>
                      <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Borrar
                          Profesores</a>
                    </ul>
                  </li>
                  @endsection
                  </x-multilevel-dropdown> --}}
                  <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                      <x-button
                        class="outline-none focus:outline-none border px-3 py-1 bg-gray-900 hover:bg-gray-700 text-white rounded-sm flex items-center min-w-32">
                        <span class="pr-1 font-semibold flex-1">Acciones</span>
                        <span>
                          <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                                                  transition duration-150 ease-in-out"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                          </svg>
                        </span>
                      </x-button>
                    </x-slot>

                    <x-slot name="content">
                      <x-dropdown-link href="{{ route('clase.edit', $clase->id) }}">
                        {{ __('Edit') }}
                      </x-dropdown-link>

                      <form method="POST" action="{{ route('clase.destroy', $clase->id) }}">
                        @csrf
                        @method('DELETE')

                        <x-dropdown-link class="text-center" :href="route('clase.destroy',$clase->id)">
                          <button onclick="return confirm('¿Esta seguro de querer borrar esta clase?');">Borrar</button>
                        </x-dropdown-link>
                      </form>

                      <x-dropdown-link href="{{ route('clase.alumnos', $clase->id) }}">
                        {{ __('Students') }}
                      </x-dropdown-link>

                      <x-dropdown-link href="#">
                        {{ __('Teachers') }}
                      </x-dropdown-link>
                    </x-slot>
                  </x-dropdown>
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
    </div>
  </x-slot>
</x-app-layout>