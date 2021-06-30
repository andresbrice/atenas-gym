<x-modal> 
    <x-slot name="title">
      <div class="grid grid-cols-2">
          {{-- Aca va el titulo de modal en un div --}} 
        <div class="cursor-pointer grid justify-items-end" @click="open = false">
          <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
            viewBox="0 0 18 18">
            <path
              d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
            </path>
          </svg>
        </div>
      </div>
    </x-slot>
    <div class="grid grid-cols-2">
    <x-slot name="body">
        {{-- input fecha --}}
        <x-label for="fecha" :value="__('Fecha')" class="font-semibold" />
        <x-input id="fecha" class="block w-full px-4 py-2 mt-2" type="date" name="fecha" :value="old('fecha')"
        required autofocus />

        {{-- selec tipo de clase --}}
        <select name="tipo_clase">
            <option value="value1">Value 1</option>
            <option value="value2" selected>Value 2</option>
            <option value="value3">Value 3</option>
        </select>

         {{-- selec horario --}}
         <select name="horario">
            <option value="value1">Value 1</option>
            <option value="value2" selected>Value 2</option>
            <option value="value3">Value 3</option>
        </select>

      </div>
    </x-slot>

    <x-slot name="footer">
      <div class="w-full grid justify-items-end">
  
        <x-button class="bg-gray-600 hover:bg-gray-700" @click="open = false">{{_('Cancel')}}</x-button>

        {{-- aca va el boton de redireccion a crear asistencia, tiene que ir dentro de un form con el metodo post --}}

        <form action="{{route('asistencia.create')}}" method="GET" class="inline">
            <x-button class="text-white bg-red-900 hover:bg-red-700"
              onclick="return">
              Buscar</x-button>
        </form>

      </div>
    </x-slot>
  </x-modal>