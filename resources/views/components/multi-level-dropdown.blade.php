<!-- component -->
<div class=" group inline-block z-50">
  <x-button class="outline-none focus:outline-none border px-3 py-1 bg-gray-900 hover:bg-gray-700 text-white rounded-sm flex items-center min-w-32">
    <span class="pr-1 font-semibold flex-1">Acciones</span>
    <span>
      <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
        transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
      </svg>
    </span>
  </x-button>
  <ul class="bg-white mt-1 ring-2 ring-red-800 border rounded-lg transform scale-0 group-hover:scale-100 absolute 
  transition duration-150 ease-in-out origin-top min-w-32">
    
    <li class="rounded-lg px-3 py-1 hover:bg-gray-400">@yield('editar')</li>
    <li class="rounded-lg px-3 py-1 hover:bg-gray-400 ">@yield('borrar')</li>
    @yield('mostrar')
    @yield('alumnos')
    @yield('profesores')
  </ul>
</div>

<style>
  li>ul {
    transform: translatex(100%) scale(0)
  }

  li:hover>ul {
    transform: translatex(101%) scale(1)
  }

  li>button svg {
    transform: rotate(-90deg)
  }

  li:hover>button svg {
    transform: rotate(-270deg)
  }

  .group:hover .group-hover\:scale-100 {
    transform: scale(1)
  }

  .group:hover .group-hover\:-rotate-180 {
    transform: rotate(180deg)
  }

  .scale-0 {
    transform: scale(0)
  }

  .min-w-32 {
    min-width: 8rem
  }
</style>


{{-- 

  boton mostrar

  <li class="rounded-lg px-3 py-1 hover:bg-gray-400 ">
    <button @click="open = true">
      Mostrar
    </button>
    
    @include('usuario.infoUser')
  </li>




  boton alumnos

  <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
    <button class="w-full text-left flex items-center outline-none focus:outline-none">
      <span class="pr-1 flex-1">Alumnos</span>
      <span class="mr-auto">
        <svg class="fill-current h-4 w-4
              transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
        </svg>
      </span>
    </button>
    <ul class="bg-white border rounded-sm absolute top-0 right-0 
    transition duration-150 ease-in-out origin-top-left
    min-w-32
    ">
      <li class="px-3 py-1 hover:bg-gray-100">Agregar</li>
      <li class="px-3 py-1 hover:bg-gray-100">Editar</li>
      <li class="px-3 py-1 hover:bg-gray-100">Mostrar</li>
      <li class="px-3 py-1 hover:bg-gray-100">Borrar</li>
    </ul>
  </li>


  boton profesores

  <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
    <button class="w-full text-left flex items-center outline-none focus:outline-none">
      <span class="pr-1 flex-1">Profesores</span>
      <span class="mr-auto">
        <svg class="fill-current h-4 w-4
              transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
        </svg>
      </span>
    </button>
    <ul class="bg-white border rounded-sm absolute top-0 right-0 
    transition duration-150 ease-in-out origin-top-left
    min-w-32
    ">
      <li class="px-3 py-1 hover:bg-gray-100">Agregar</li>
      <li class="px-3 py-1 hover:bg-gray-100">Editar</li>
      <li class="px-3 py-1 hover:bg-gray-100">Mostrar</li>
      <li class="px-3 py-1 hover:bg-gray-100">Borrar</li>
    </ul>
  </li>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  --}}