{{-- 
  
  Secciones a tener en cuenta al llamar al componente busqueda:
  - action
  - opciones

  --}}

<form action="@yield('action')" method="GET" class="flex-auto justify-center max-w-3xl
  space-x-3">

  <div class="md:flex md:items-center space-x-2">
    <div>
      <x-select name="filtro">
        <x-slot name="slot">
          @yield('opciones')
        </x-slot>
      </x-select>
    </div>

    <x-input type="text" id="search" name="search" value="{{Request::input ('search')}}"
      class="mt-1 rounded-xl border-transparent flex-1 appearance-none border shadow-sm text-base focus:outline-none focus:ring-2 focus:border-transparent sm:w-1/2"
      autocomplete="off" />

    <button
      class="bg-red-700 text-white rounded-full p-2 hover:bg-red-500 focus:outline-none w-12 h-12 flex items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
          clip-rule="evenodd" />
      </svg>
    </button>
  </div>
</form>


{{-- 
          OPCIONES PARA SELECT

          <option value="">
            Filtrar por...
          </option>

          <option value="opc1">
            opc1
          </option> 
--}}