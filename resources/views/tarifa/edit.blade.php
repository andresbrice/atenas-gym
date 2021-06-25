<x-app-layout>

    <x-slot name="breadcrumb">
      <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('tarifa.index')}}">Gestión Tarifa</a> / <u>Crear
          Tarifa</u>
      </x-breadcrumb>
    </x-slot>
  
  
    <x-slot name="slot">
      <div class="mt-5 sm:mt-0  max-w-7xl mx-auto">
        <div class="md:flex md:grid-cols-3 md:gap-6">
          <div class="mt-5 md:mt-0 md:col-span-2">
            <!-- Validation Errors -->
            <x-auth-validation-errors class=" mt-5 " :errors="$errors" />
  
            <form action="{{ route('tarifa.store') }}" method="POST">
              @csrf
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      <x-label for="cantidad_dias" :value="__('Cantidad de dias')" class="font-semibold" />
                      <x-input id="cantidad_dias" class="block w-full px-4 py-2 mt-2" type="text" name="precio" :value="old('cantidad_dias')"
                    required autofocus />
                    </div>
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      <x-label for="precio" :value="__('Precio')" class="font-semibold" />
                      <x-input id="precio" class="block w-full px-4 py-2 mt-2" type="text" name="precio" :value="old('precio')"
                        required autofocus />
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
                      <x-button class="ml-3 bg-green-900 hover:bg-green-700">
                        {{ __('Edit Exercise') }}
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