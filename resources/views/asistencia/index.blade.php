<x-app-layout>

    <x-slot name="breadcrumb">
      <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Asistencia</u></x-breadcrumb>
    </x-slot>
  
    <x-slot name="slot">
  
      <div class="sm:px-6 lg:px-8 h-full flex justify-center">
        <div class="w-full">
          <div class="bg-white mt-5 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 bg-white border-b border-gray-100">
              <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
              {{-- DIV ALIGN --}}
              <div class="flex justify-center items-center bg-white mx-auto mb-3 ">
  
                {{-- BOTON Mostrar  ASISTENCIA --}}
                <div class="flex-auto justify-center ml-4">
                  <x-button class="text-white bg-yellow-600 hover:bg-yellow-500" @click="open = true">
                    Crear Asistencia
                  </x-button>

                  @include('asistencia.filtroclase')
                </div>
  
                {{--BUSQUEDA--}}

                <div class="w-52 cursor-pointer" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">

                  <div @click="open = ! open" class="w-40 h-7 px-2 pt-1 bg-white border border-gray-300 rounded text-sm text-gray-400 shadow-sm hover:text-red-300 hover:border-red-300 active:bg-white focus:outline-none focus:border-red-300 focus:ring ring-gray-100 disabled:opacity-25 transition ease-in-out duration-150">
                    <span class="float-left">Seleccionar</span>
      
                    <svg class="h-5 fill-current float-right py-1" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                      <g>
                        <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/>
                      </g>
                    </svg>
                  </div>
                    
                  
                  <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-40 z-50 rounded-md shadow-lg bg-white" style="display: none;" @click="open = false">
                    <div class="rounded shadow-md relative">
                      <ul class="list-reset">
                        <li class="p-2">
                          <input type="text" class="border-2 rounded text-sm h-7 w-full focus:ring-0 ring-gray-100 focus:outline-none disabled:opacity-25">
                          <br>
                        </li>
                        <li>
                          <p class="p-2 block text-sm text-black hover:bg-grey-light cursor-pointer">
                            Funcional
                            <svg class="float-right" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path d="M6.61 11.89L3.5 8.78 2.44 9.84 6.61 14l8.95-8.95L14.5 4z"/></svg>
                          </p>
                        </li>
                        <li>
                          <p class="p-2 block text-sm text-black hover:bg-grey-light cursor-pointer">
                            Crossfit
                          </p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                

               </div> {{--FIN DIV ALIGN --}} 
  
              <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-400 sm:rounded-lg">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                          <tr>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Tipo de Clase
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Fecha
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Horario
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Profesor
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Asistencia
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Acciones
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-red-100">
  
                          @forelse ($asistencias as $asistencia)
                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                              {{$asistencia->id}}
                            </td>
  
                            <td class="px-6 py-4 whitespace-nowrap">
                              {{$asistencia->tipo_clase}}
                            </td>
  
                            <td class="px-6 py-4 whitespace-nowrap">
                              {{$asistencia->fecha}}
                            </td>
  
                            <td class="px-6 py-4 whitespace-nowrap">
                              {{$asistencia->horario}}
                            </td>
  
                            <td class="px-6 py-4 whitespace-nowrap">
                              {{$asistencia->profesor}}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                              {{$asistencia->asistio}}
                            </td>
  
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                              {{-- BOTON EDITAR --}}
                              <a href="{{route('asistencia.edit',$asistencia->id)}}">
                                <x-button class="text-white bg-green-800 hover:bg-green-700">Editar</x-button>
                              </a>
  
                              {{-- BOTON BORRAR --}}
                              <form action="{{route('asistencia.destroy',$asistencia->id)}}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
  
                                <x-button class="text-white bg-red-900 hover:bg-red-700"
                                  onclick="return confirm('¿Quieres borrar esta asistencia?')">
                                  Borrar</x-button>
                              </form>
                            </td>
                          </tr>
                          @empty
                          <tr>
                            <td>
                              <center>No se encontró dicha asistencia. Intente nuevamente</center>
                            </td>
                          </tr>
                          @endforelse
                          {{-- @include('asistencia.show') --}}
                        </tbody>
                      </table>
                    </div>
                    <div class="mt-4">
                      {{$asistencias->links()}}
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