<x-app-layout>

    <x-slot name="breadcrumb">
      <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestión Rutina</u></x-breadcrumb>
    </x-slot>
  
    <x-slot name="slot">
  
      <div class="sm:px-6 lg:px-8 h-full flex justify-center">
        <div class="w-full px-8">
          <div class="bg-white mt-5 overflow-hidden shadow-sm sm:rounded-lg">
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
                      Usuario
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
                              {{-- BOTON EDITAR --}}
                              <a href="{{route('rutina.edit',$rutina->id)}}">
                                <x-button class="text-white bg-green-800 hover:bg-green-700">Editar</x-button>
                              </a>
  
                              {{-- BOTON MOSTRAR --}}
  
                              <div class="mt-6 inline" x-data="{ open: false }">
                                <x-button class="text-white bg-yellow-600 hover:bg-yellow-500 z-5000"
                                  @click="open = true">
                                  Mostrar
                                </x-button>
  
                                {{-- @include('rutina.infoUser') --}}
  
                              </div>
  
                              {{-- BOTON BORRAR --}}
                              <form action="{{route('rutina.destroy',$rutina->id)}}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
  
                                <x-button class="text-white bg-red-900 hover:bg-red-700"
                                  onclick="return confirm('¿Quieres borrar este rutina?')">
                                  Borrar</x-button>
                              </form>
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