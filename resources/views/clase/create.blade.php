<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('clase.index')}}">Gestión Clase</a> / <u>Crear
        Clase</u>
    </x-breadcrumb>
  </x-slot>


  <x-slot name="slot">
    <div class="mt-5 sm:mt-0  max-w-7xl mx-auto">
      <div class="md:flex md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <!-- Validation Errors -->
          <x-auth-validation-errors class=" mt-5" :errors="$errors" />

          <form action="{{ route('clase.store') }}" method="POST">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-4 gap-6">
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="tipo_clase" :value="__('Tipo de Clase')" class="font-semibold" />
                    <x-input id="tipo_clase" class="block w-full px-4 py-2 mt-2" type="text" name="tipo_clase"
                      :value="old('tipo_clase')" required autofocus />
                  </div>

                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="hoarios" :value="__('Horario')" class="font-semibold" />

                    <select id="horarios"
                      class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300"
                      name="horario" required>
                      <option hidden value="">
                        - Seleccionar Horario -
                      </option>
                      @foreach ($horarios as $horario)
                      <option value="{{$horario->id}}">
                        {{$horario->hora}}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="mt-3">
                  <div class="inline grid-cols-6 space-x-2 gap-6 ">
                    <x-label for="dias_semana" :value="__('Días de la semana')"
                      class="text-xl px-2 mb-2 font-semibold" />
                    @foreach ($dias as $dia)
                    <label for="dias_semana" class="inline-flex items-center">
                      <input id="dias_semana" type="checkbox" class="rounded border-gray-300 text-red-900 
                      shadow-sm focus:border-red-300 focus:ring
                      focus:ring-red-200 focus:ring-opacity-50" name="dias_semana[]" value="{{$dia->id}}">
                      <span class="ml-2 text-sm text-gray-600">{{ $dia->dia }}</span>
                    </label>
                    @endforeach
                  </div>{{--/div dias de la semana--}}
                </div>
                <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
                  <x-button class="ml-3 bg-red-800">
                    {{ __('Register Class') }}
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