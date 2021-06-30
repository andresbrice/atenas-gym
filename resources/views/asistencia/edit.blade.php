<x-app-layout>

    <x-slot name="breadcrumb">
      <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('asistencia.index')}}">Gestión Asistencia</a> / <u>Crear
          Asistencia</u>
      </x-breadcrumb>
    </x-slot>
  
  
    <x-slot name="slot">
      <div class="mt-5 sm:mt-0  max-w-7xl mx-auto">
        <div class="md:flex md:grid-cols-3 md:gap-6">
          <div class="mt-5 md:mt-0 md:col-span-2">
            <!-- Validation Errors -->
            <x-auth-validation-errors class=" mt-5 " :errors="$errors" />
  
            <form action="{{ route('asistencia.store') }}" method="POST">
              @csrf
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">

                  {{-- Buscador --}}

                  <x-label for="buscar" :value="__('Buscar Clase')" class="font-semibold" />
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

                    {{--Fin Buscador--}}

                  <div class="grid grid-cols-2 gap-6">
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          <x-label for="horario" :value="__('Horario')" class="font-semibold" />
                          <x-input id="horario" class="block w-full px-4 py-2 mt-2" type="text" name="horario" :value="old('horario')"
                            required autofocus />
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      <x-label for="tipo_clase" :value="__('Tipo de Clase')" class="font-semibold" />
                      <x-input id="tipo_clase" class="block w-full px-4 py-2 mt-2" type="text" name="tipo_clase" :value="old('tipo_clase')"
                        required autofocus />
                    </div>
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <x-label for="profesor" :value="__('Profesor')" class="font-semibold" />
                        <x-input id="profesor" class="block w-full px-4 py-2 mt-2" type="text" name="profesor" :value="old('profesor')"
                          required autofocus />
                    </div>
                    

                        
                    <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
                        <x-button class="ml-3 bg-green-900 hover:bg-green-700">
                          {{ __('Edit Assistance') }}
                        </x-button>
                      </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </x-slot>
  </x-app-layout>