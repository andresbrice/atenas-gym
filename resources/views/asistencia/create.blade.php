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
                    <x-button class=" bg-red-800">
                      {{ __('Register Assistance') }}
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