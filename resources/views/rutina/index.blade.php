<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestión Rutina</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">

    <div class="sm:px-6 lg:px-8 h-full flex justify-center">
      <div class="w-full px-8">
        <div class="bg-white mt-5  shadow-sm sm:rounded-lg">
          <div class="p-4 bg-white border-b border-gray-100">
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
            {{-- DIV ALIGN --}}
            <div class="flex justify-center items-center bg-white mx-auto mb-3 ">

              {{-- BOTON CREAR RUTINA --}}
              <div class="flex-auto justify-center ml-4">
                <a href="{{route('rutina.create')}}">
                  <x-button type="button"
                    class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold">
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

            <div class="flex flex-col px-5">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-400 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-100">
                        <tr>
                          <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            fecha de emisión
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
                            acciones
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-red-100">

                        @forelse ($rutinas as $rutina)
                        <tr>
                          <td class="px-6 py-4 whitespace-nowrap">
                            {{$rutina->fecha_emision}}
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            {{-- acá van los alumnos --}}
                            {{-- {{$rutina->series}} --}}
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            {{-- acá los pofesores --}}
                            {{-- {{$rutina->repeticiones}} --}}
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
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
                            <center>No se encontró dicho rutina. Intente nuevamente</center>
                          </td>
                        </tr>
                        @endforelse
                        {{-- @include('rutina.show') --}}
                      </tbody>
                    </table>
                  </div>
                  <div class="mt-4">
                    {{$rutinas->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot>

</x-app-layout>