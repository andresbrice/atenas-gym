<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('rutina.index') }}">Gestión Rutina</a> / <u>Crear
        Rutina</u>
    </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white  border-gray-200">
            <x-success-message class=" mt-5" />
            <x-denied-message class=" mt-5" :errors="$errors" />
            <form action="{{ route('rutina.addejercicio') }}" method="POST">
              @csrf
              <div class="flex flex-col">
                <x-table>
                  @section('nombre-columna')
                  <tr>
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Ejercicio
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Series
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Repeticiones
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Descansos(MIN)
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      acciones
                    </th>
                  </tr>
                  @endsection


                  @section('contenido-filas')


                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap w-48 text-center font-medium">
                      {{-- {{dd($alum_id)}} --}}
                      <select class="select2_el" id="ejercicio_id" style="width:100%" name="ejercicio" required>
                        <option value="" selected></option>
                        @foreach ($ejercicios as $ejercicio)
                        <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre_ejercicio }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                      <x-input maxlength="2" value="" step="1" ondrop="return false;" onpaste="return false;"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="series"
                        class="block text-center w-full px-4 py-2 mt-2" type="text" name="series" :value="old('series')"
                        required autofocus />
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                      <x-input id="repeticiones" class="block w-full text-center px-4 py-2 mt-2" maxlength="2" value=""
                        step="1" ondrop="return false;" onpaste="return false;"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="repeticiones"
                        :value="old('repeticiones')" required />
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                      <x-input id="descanso" class="block w-full text-center px-4 py-2 mt-2" type="text" name="descanso"
                        :value="old('descanso')" maxlength="2" value="" step="1" ondrop="return false;"
                        onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                        required />
                    </td>


                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                      <div class="inline-flex" role="group" aria-label="Button group">
                        <x-button
                          class=" text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-md focus:shadow-outline hover:bg-green-800">
                          Agregar Ejercicio</x-button>

                      </div>
                    </td>
                  </tr>
                  @endsection
                </x-table>
                <x-table>
                  @section('nombre-columna')
                  <tr>
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Ejercicio
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Series
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Repeticiones
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Descansos(MIN)
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      acciones
                    </th>
                  </tr>
                  @endsection


                  @section('contenido-filas')


                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap w-48 text-center font-medium">
                      {{-- {{dd($alum_id)}} --}}
                      <select class="select2_el" id="ejercicio_id" style="width:100%" name="ejercicio" required>
                        <option value="" selected></option>
                        @foreach ($ejercicios as $ejercicio)
                        <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre_ejercicio }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                      <x-input maxlength="2" value="" step="1" ondrop="return false;" onpaste="return false;"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="series"
                        class="block text-center w-full px-4 py-2 mt-2" type="text" name="series" :value="old('series')"
                        required autofocus />
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                      <x-input id="repeticiones" class="block w-full text-center px-4 py-2 mt-2" maxlength="2" value=""
                        step="1" ondrop="return false;" onpaste="return false;"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="repeticiones"
                        :value="old('repeticiones')" required />
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                      <x-input id="descanso" class="block w-full text-center px-4 py-2 mt-2" type="text" name="descanso"
                        :value="old('descanso')" maxlength="2" value="" step="1" ondrop="return false;"
                        onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                        required />
                    </td>


                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                      <div class="inline-flex" role="group" aria-label="Button group">


                        <x-button
                          class=" text-indigo-100 transition-colors duration-150 bg-gray-900 rounded-md focus:shadow-outline hover:bg-green-800">
                          Agregar Ejercicio</x-button>

                      </div>
                    </td>
                  </tr>
                  @endsection
                </x-table>
              </div>
          </div>
          <div class="px-4 py-2  my-3 flex items-center justify-center sm:px-6">
            <a href="{{ url()->previous() }}">
              <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                {{ __('Back') }}
              </x-button>

            </a>
            <x-button class="ml-3 bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
              {{ __('Register Rutine') }}
            </x-button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </x-slot>
</x-app-layout>
<script>
  $(document).ready(function() {
    $('.select2_el').select2({
      placeholder: "Seleccionar",
      allowClear: true,
      width: 'resolve',
      language: {

        noResults: function() {

          return "No hay resultado";
        },
        searching: function() {

          return "Buscando..";
        }
      }
    });
  });
</script>