{{-- <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
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
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
    </svg>
    <span class="pb-1 md:pb-0 text-xs md:text-base font-bold block md:inline-block">
      Gestión Rutina
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
        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    </svg>
    <span class="pb-1 md:pb-0 text-xs md:text-base font-bold block md:inline-block">
      Información Personal
    </span>
  </x-a-sidebar>
</ul> --}}

<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
<x-userMobile />

<a href="#" class="md:hidden text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Perfil</a>

<x-a-sidebar href="#" aria-current="page">Asistencias</x-a-sidebar>

<x-a-sidebar href="#" aria-current="page">Rutinas</x-a-sidebar>

<x-a-sidebar href="#" aria-current="page">Cuotas</x-a-sidebar>