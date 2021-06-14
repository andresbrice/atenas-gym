<x-modal>
  <x-slot name="title">
    <div class="grid grid-cols-2">
      <div>
        <h3>Agregar Alumnos</h3>
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
    <form action="{{route('usuario.index')}}" method="GET" class="flex-auto justify-center max-w-3xl space-x-3">

      <div class="md:flex md:items-center space-x-2">
        <x-input type="text" id="userName" name="userName" value="{{--Request::input('userName')--}}"
          class=" mt-1 rounded-xl border-transparent flex-1 appearance-none border shadow-sm text-base focus:outline-none focus:ring-2 focus:border-transparent"
          placeholder="{{__('Search User...')}}" autocomplete="off" />

        <x-input type="text" id="name" name="name" value="{{--Request::input('name')--}}"
          class=" mt-1 rounded-xl border-transparent flex-1 appearance-none border shadow-sm text-base focus:outline-none focus:ring-2 focus:border-transparent"
          placeholder="{{__('Search Name...')}}" autocomplete="off" />

        <x-input type="text" id="lastName" name="lastName" value="{{--Request::input('lastName')--}}"
          class=" mt-1 rounded-xl border-transparent flex-1 appearance-none border shadow-sm text-base focus:outline-none focus:ring-2 focus:border-transparent"
          placeholder="{{__('Search Last Name...')}}" autocomplete="off" />

        <button
          class="bg-red-700 text-white rounded-full p-2 hover:bg-red-500 focus:outline-none w-12 h-12 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
              clip-rule="evenodd" />
          </svg>
        </button>
      </div>
    </form>{{-- FIN BUSQUEDA --}}
  </x-slot>

  <x-slot name="footer">
    <div class="w-full grid justify-items-end">

      <x-button class="bg-gray-600 hover:bg-gray-700" @click="open = false">{{_('Cancel')}}
      </x-button>

    </div>


  </x-slot>
</x-modal>