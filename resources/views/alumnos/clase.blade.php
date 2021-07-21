<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Consulta Clase</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />

            <div class="flex flex-col items-center md:flex-row">
              @foreach ($clases as $clase)
              <div class="flex-1 m-3 max-w-max overflow-hidden bg-gray-900 rounded-lg shadow-lg dark:bg-gray-800">
                <div class="px-4 py-2">
                  <h2 class="text-xl font-bold text-gray-100 uppercase dark:text-white">
                    Tipo de clase
                  </h2>
                  <p class="mt-1 text-lg text-gray-100 dark:text-gray-400">
                    {{ $clase->tipo_clase }}
                  </p>
                </div>
                <div class="px-4 py-2">
                  <h2 class="text-xl font-bold text-gray-100 uppercase dark:text-white">
                    Días
                  </h2>
                  <p class="mt-1 text-lg text-gray-100 dark:text-gray-400">
                    @foreach ($clase->dias as $dia)
                      {{ $dia->dia }}@if (!$loop->last),
                      @endif
                    @endforeach
                  </p>
                </div>
                <div class="px-4 py-2">
                  <h2 class="text-xl font-bold text-gray-100 uppercase dark:text-white">
                    Horario
                  </h2>
                  <p class="mt-1 text-lg text-gray-100 dark:text-gray-400">
                    {{ $clase->horario->hora->format('H:i A') }}
                  </p>
                </div>
              </div>    
              @endforeach
              
              <div class="flex-1 m-3 max-w-max overflow-hidden bg-gray-900 rounded-lg shadow-lg dark:bg-gray-800">
                <div class="px-4 py-2">
                  <h2 class="text-xl font-bold text-gray-100 uppercase dark:text-white">Tipo de Clase
                  </h2>
                  <p class="mt-1 text-lg text-gray-100 dark:text-gray-400">Funcional</p>
                </div>
                <div class="px-4 py-2">
                  <h2 class="text-xl font-bold text-gray-100 uppercase dark:text-white">Días</h2>
                  <p class="mt-1 text-lg text-gray-100 dark:text-gray-400">Lunes - Miercoles - Viernes
                  </p>
                </div>
                <div class="px-4 py-2">
                  <h2 class="text-xl font-bold text-gray-100 uppercase dark:text-white">Horarios</h2>
                  <p class="mt-1 text-lg text-gray-100 dark:text-gray-400">08:00</p>
                </div>
              </div>
              <div class="flex-1 m-3 max-w-max overflow-hidden bg-gray-900 rounded-lg shadow-lg dark:bg-gray-800">
                <div class="px-4 py-2">
                  <h2 class="text-xl font-bold text-gray-100 uppercase dark:text-white">Tipo de Clase
                  </h2>
                  <p class="mt-1 text-lg text-gray-100 dark:text-gray-400">Funcional</p>
                </div>
                <div class="px-4 py-2">
                  <h2 class="text-xl font-bold text-gray-100 uppercase dark:text-white">Días</h2>
                  <p class="mt-1 text-lg text-gray-100 dark:text-gray-400">Lunes - Miercoles - Viernes
                  </p>
                </div>
                <div class="px-4 py-2">
                  <h2 class="text-xl font-bold text-gray-100 uppercase dark:text-white">Horarios</h2>
                  <p class="mt-1 text-lg text-gray-100 dark:text-gray-400">08:00</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>