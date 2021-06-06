<x-modal>
  <x-slot name="title">
    <div class="grid grid-cols-2">
      <div>
        <u>Usuario:</u> {{$usuario->userName}}
      </div>
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
    <div class="grid grid-flow-col">
      <div class="col-start-1 w-auto mr-6">
        <ul class="list-disc">
          <li><b><u>Email:</u></b> {{$usuario->email}}</li>
          <li><b><u>Rol:</u></b> {{$usuario->role->nombre_rol}}</li>
          <li><b><u>Nombre:</u></b> {{$usuario->name}}</li>
          <li><b><u>Apellido:</u></b> {{$usuario->lastName}}</li>
          <li><b><u>DNI:</u></b> {{$usuario->dni}}</li>
          <li><b><u>Edad:</u></b> {{$usuario->age}}</li>
          <li><b><u>Sexo:</u></b> {{$usuario->sex}}</li>
          <li><b><u>Teléfono:</u></b> {{$usuario->phone}}</li>
          <li><b><u>Teléfono de Emergencia:</u></b> {{$usuario->emergency_number}}</li>
        </ul>
      </div>
      <div class="col-start-2 w-auto">
        <ul class="list-disc">
          @if ($usuario->eRespiratorias === 1)
          <li><b><u>E. Respiratorias:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg> </li>
          @else
          <li><b><u>E. Respiratorias:</u></b>
            @endif

            @if ($usuario->eCardiacas === 1)
          <li><b><u>E. Cardiacas:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg> </li>
          @else
          <li><b><u>E. Cardiacas:</u></b>
            @endif

            @if ($usuario->eRenal === 1)
          <li><b><u>E. Renales:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg> </li>
          @else
          <li><b><u>E. Renales:</u></b>
            @endif

            @if ($usuario->convulsiones === 1)
          <li><b><u>Convulsiones:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg> </li>
          @else
          <li><b><u>Convulsiones:</u></b>
            @endif

            @if ($usuario->epilepsia === 1)
          <li><b><u>Epilepsia:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg> </li>
          @else
          <li><b><u>Epilepsia:</u></b>
            @endif

            @if ($usuario->diabetes === 1)
          <li><b><u>Diabetes:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg> </li>
          @else
          <li><b><u>Diabetes:</u></b>
            @endif

            @if ($usuario->alergia === 1)
          <li><b><u>Alergias:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg> </li>
          @else
          <li><b><u>Alergias:</u></b>
            @endif

            @if ($usuario->asma === 1)
          <li><b><u>Asma:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg> </li>
          @else
          <li><b><u>Asma:</u></b>
            @endif

            @if ($usuario->medicacion === 1)
          <li><b><u>Medicación:</u></b> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg> </li>
          @else
          <li><b><u>Medicación:</u></b>
            @endif
        </ul>
      </div>
    </div>
  </x-slot>

  <x-slot name="footer">
    {{-- <div class="w-full grid justify-items-end">

      <x-button class="bg-gray-600 hover:bg-gray-700" @click="open = false">{{_('Cancel')}}
    </x-button>

    </div> --}}
  </x-slot>
</x-modal>