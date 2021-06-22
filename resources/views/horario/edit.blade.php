<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('horario.index')}}">Gestión Horario</a> / <u>Editar
        Horario</u>
    </x-breadcrumb>
  </x-slot>


  <x-slot name="slot">
    <div class="mt-5 sm:mt-0  max-w-7xl mx-auto">
      <div class="md:flex md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <!-- Validation Errors -->
          <x-auth-validation-errors class=" mt-5" :errors="$errors" />

          <form method="POST" action="{{route('horario.update',$horario->id)}}">
            @csrf
            @method('PUT')
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-1 gap-6">
                  <div class="col-span-1">
                    <x-label for="hora" :value="__('Horario')" class="font-semibold" />
                    <x-input id="hora" class="block w-full px-4 py-2 mt-2" type="time" name="hora"
                      value="{{old('hora',$horario->hora->format('H:i'))}}" required autofocus />
                  </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
                  <x-button class="ml-3 bg-green-900 hover:bg-green-700">
                    {{ __('Edit User') }}
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