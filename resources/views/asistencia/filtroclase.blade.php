<x-modal> 
    <x-slot name="title">
      <div class="grid grid-cols-2">
          <h3>Buscar Clase:</h3>
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
    <x-slot name="body">
      <div class="grid grid-cols-1">

        {{-- Select tipo de clase --}}
        <x-label for="Clase" :value="__('Clase:')" class="font-semibold" />
        <select name="tipo_clase" class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300" required>
            <option hidden value="">Seleccione la clase</option>
            @foreach ($clases as $clase)
            <option value="{{$clase->id}}" >{{$clase->tipo_clase}}</option>
            @endforeach
        </select>

          {{-- Select horario --}}
        <x-label for="horario" :value="__('Horario:')" class="font-semibold" />
         <select name="horario" class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300" required>
          <option hidden value="">Seleccione el horario</option>
          @foreach ($horarios as $horario)
          <option value="{{$horario->id}}" >{{ $horario->hora->format('H:i A') }}</option>
          @endforeach
        </select>

      </div>
    </x-slot>

    <x-slot name="footer">
      <div class="px-4 py-2  flex items-center justify-center sm:px-6">
        <form action="{{route('asistencia.create')}}" method="GET" class="inline">
        <x-button
          class="ml-3 bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
          {{ __('Find Class') }}
        </x-button>
      </form>
      </div> 
    </x-slot>
  </x-modal>





  