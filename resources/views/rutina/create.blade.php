<x-app-layout>

    <x-slot name="breadcrumb">
      <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('rutina.index')}}">Gestión Rutina</a> / <u>Crear Rutina</u>
      </x-breadcrumb>
    </x-slot>
  
  
    <x-slot name="slot">
      <div class="sm:px-6 lg:px-8 sm:w-full lg:w-2/3 h-full flex justify-center">
        <div class="w-full">
          <div class="bg-white mt-5 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 bg-white w-full border-b border-gray-100 inline-flex justify-center space-x-20">
              <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />

                {{-- SELECCIONAR ALUMNO --}}
                  <div class="block" x-data="{ open: false }">
                    <x-button class="text-white bg-blue-800 hover:bg-blue-700 w-52 justify-center z-50" @click="open = true">Seleccionar Alumno</x-button>

                    @include('rutina.selectAlumno')
                  </div>
                {{-- SELECCIONAR PROFESOR --}}
                  <div class="inline-block" x-data="{ open: false }">
                    <x-button class="text-white bg-blue-800 hover:bg-blue-700 justify-center z-50" @click="open = true">Seleccionar Profesor</x-button>

                    @include('rutina.selectProfesor')
                  </div>
            </div>
          </div>
            {{-- RUTINA --}}
            <form id="rutina" action="{{ route('usuario.store') }}" method="POST" class="py-11">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="">
                      <div class="space-x-4">
                        <div class="inline-block">
                            <x-label :value="__('Alumno:')" class="font-semibold" />
                        </div>
                        <div class="inline-block pl-0.5">
                            {{ Auth::user()->name }} {{ Auth::user()->lastName }}
                        </div>
                      </div>
                          
                      <div class="pt-3 pb-1 space-x-4">
                        <div class="inline-block">
                            <x-label :value="__('Profesor:')" class="font-semibold" />
                        </div>
                        <div class="inline-block">
                            {{ Auth::user()->name }} {{ Auth::user()->lastName }}
                        </div>
                      </div>

                      <div class="flex flex-col pt-3">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            {{-- Día 1 --}}
                            <div class="p-2">
                                DÍA 1
                            </div>
                            <div class="shadow overflow-hidden">
                              <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                  <tr class="text-center">
                                    <th scope="col"
                                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Ejercicio
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Series
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Repeticiones
                                    </th>
                                    <th scope="col"
                                      class="px-1 py-3 text-xs font-medium text-gray-500 tracking-wider">
                                      DESCANSO (min)
                                    </th>
                                  </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-red-100">
                                  <tr>
                                    <td class="pl-4 py-1 whitespace-nowrap text-left text-sm font-medium">
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
                                                  USA
                                                  <svg class="float-right" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path d="M6.61 11.89L3.5 8.78 2.44 9.84 6.61 14l8.95-8.95L14.5 4z"/></svg>
                                                </p>
                                              </li>
                                              <li>
                                                <p class="p-2 block text-sm text-black hover:bg-grey-light cursor-pointer">
                                                  Montenegro
                                                </p>
                                              </li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300" type="text">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- BOTON CREAR RUTINA --}}
                    <div class="px-4 pt-7 pb-1 bg-white text-center sm:px-6">
                      <x-button class="ml-3 bg-red-800">
                        {{ __('Crear Rutina') }}
                      </x-button>
                    </div>
                  </div>
                </div>
            </form>
        </div>
      </div>
    </x-slot>
  </x-app-layout>
  
  
  {{-- <!-- Password -->
              <div class="mt-4">
                  <x-label for="password" :value="__('Password')" />
  
                  <x-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password" />
              </div>
  
              <!-- Confirm Password -->
              <div class="mt-4">
                  <x-label for="password_confirmation" :value="__('Confirm Password')" />
  
                  <x-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password"
                                  name="password_confirmation" required />
              </div> --}}