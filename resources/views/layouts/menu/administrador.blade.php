<ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">


  <x-a-sidebar href="#" class="text-red-900">
    <svg class="inline w-4 h-4 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
      </path>
    </svg>
    <span class="pb-1 md:pb-0 text-xs md:text-base font-bold block md:inline-block">
      Gestión Asistencia
    </span>
  </x-a-sidebar>

  <x-a-sidebar href="#" class="text-red-900">
    <svg class="inline w-4 h-4 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
      <path
        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
      </path>
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
      </path>
    </svg>
    <span class="pb-1 md:pb-0 text-xs md:text-base font-bold block md:inline-block">
      Gestión Clase
    </span>
  </x-a-sidebar>

  <x-a-sidebar href="#" class="text-red-900">
    <svg class="inline w-4 h-4 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
    </svg>
    <span class="pb-1 md:pb-0 text-xs md:text-base font-bold block md:inline-block">
      Gestión Rutina
    </span>
  </x-a-sidebar>

  <x-a-sidebar href="#" class="text-red-900 ">
    <svg class="inline w-4 h-4 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path>
    </svg>
    <span class="pb-1 md:pb-0 text-xs md:text-base font-bold block md:inline-block">
      Gestión Ejercicio
    </span>
  </x-a-sidebar>

  <x-a-sidebar href="{{route('usuario.index')}}" class="text-red-900">
    <svg class="inline w-4 h-4 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
    </svg>
    <span class="pb-1 md:pb-0 text-xs md:text-base font-bold block md:inline-block">
      Gestión Usuario
    </span>
  </x-a-sidebar>

  <x-a-sidebar href="#" class="text-red-900">
    <svg class="inline w-4 h-4 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
      </path>
    </svg>
    <span class="pb-1 md:pb-0 text-xs md:text-base font-bold block md:inline-block">
      Gestión Cuota
    </span>
  </x-a-sidebar>

  <x-a-sidebar href="#" class="text-red-900">
    <svg class="inline w-4 h-4 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
      </path>
    </svg>
    <span class="pb-1 md:pb-0 text-xs md:text-base font-bold block md:inline-block">
      Gestión Tarifa
    </span>
  </x-a-sidebar>

  <x-a-sidebar href="#" class="text-red-900">
    <svg class="inline w-4 h-4 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    </svg>
    <span class="pb-1 md:pb-0 text-xs md:text-base font-bold block md:inline-block">
      Información Personal
    </span>
  </x-a-sidebar>

</ul>