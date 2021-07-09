<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('asistencia.index') }}">Gestión Asistencia</a> /
      <u>Buscar Clase</u>
    </x-breadcrumb>
  </x-slot>

  {{-- <div class="px-4 py-5 bg-white sm:p-6"> --}}
  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <!-- Validation Errors -->
            {{-- <x-auth-validation-errors class="mb-3" :errors="$errors" /> --}}

            <form action="{{ route('asistencia.create') }}" method="GET">
              @csrf
              <div class="flex flex-col p-4 overflow-hidden sm:rounded-md">

                <div class="grid grid-cols-1 gap-4">
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="date" :value="__('Fecha')" class="font-semibold" />
                    <x-input id="date" class="block w-full px-4 py-2 mt-2" type="date" name="fecha_asistencia"
                      :value="old('date')" autofocus />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="hora" :value="__('Horario')" class="font-semibold" />
                    <select name="hora"
                      class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300">
                      <option hidden value="">Seleccione el horario</option>
                      <option value="value1">Value 1</option>
                      {{-- @foreach ($clases as $clase)
                                            <option value="{{ $clase->id }}">{{ $clase->tipo_clase }}</option>
                      @endforeach --}}
                    </select>
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="tipo_clase" :value="__('Clase')" class="font-semibold" />
                    <select name="tipo_clase"
                      class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300">
                      <option hidden value="">Seleccione la clase</option>
                      <option value="value1">Value 1</option>
                      {{-- @foreach ($clases as $clase)
                                            <option value="{{ $clase->id }}">{{ $clase->tipo_clase }}</option>
                      @endforeach --}}
                    </select>
                  </div>
                </div>
                <div class="px-4 mt-3 py-2  flex items-center justify-between sm:px-6">
                  <a href="{{ route('asistencia.index') }}">
                    <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                      {{ __('Back') }}
                    </x-button>
                  </a>
                  <x-button
                    class="ml-3 bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                    {{ __('Find Class') }}
                  </x-button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>























<<<<<<< HEAD
=======
{{-- <x-app-layout>

    <x-slot name="breadcrumb">
        <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('asistencia.index') }}">Gestión Asistencia</a> /
<u>Buscar Clase</u>
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
                  <x-label for="fecha" :value="__('Fecha')" class="font-semibold" />
                  <x-input id="fecha" class="block w-full px-4 py-2 mt-2" type="date" name="fecha" :value="old('fecha')"
                    autofocus />
                </div>
              </div>

              <div class="grid grid-cols-2 gap-6">
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  {{-- Select tipo de clase 
                                        <x-label for="Clase" :value="__('Clase:')" class="font-semibold" />
                                        <select name="tipo_clase"
                                            class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300"
                                           >
                                            <option hidden value="">Seleccione la clase</option>
                                            {{-- @foreach ($clases as $clase)
                                                <option value="{{ $clase->id }}">{{ $clase->tipo_clase }}</option>
                  @endforeach
                  </select>
                </div>
              </div>
              <div class="grid grid-cols-2 gap-6">
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  {{-- Select horario 
                                        <x-label for="horario" :value="__('Horario:')" class="font-semibold" />
                                        <select name="horario"
                                            class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300"
                                           >
                                            <option hidden value="">Seleccione el horario</option>
                                            {{-- @foreach ($horarios as $horario)
                                                <option value="{{ $horario->id }}">
                  {{ $horario->hora->format('H:i A') }}</option>
                  @endforeach
                  </select>
                </div>
              </div>
              <div class="px-4 py-2  flex items-center justify-between sm:px-6">
                <a href="{{ route('usuario.index') }}">
                  <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                    {{ __('Back') }}
                  </x-button>
                </a>

                <x-button
                  class="ml-3 bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                  {{ __('Find Class') }}
                </x-button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-slot>
</x-app-layout> --}}
>>>>>>> perfil
