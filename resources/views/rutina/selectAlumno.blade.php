<div class="fixed z-50 bg-black bg-opacity-50 top-0 left-0 bottom-0 right-0 flex items-center justify-center w-screen h-screen" style="display:none" x-show="open">

  <div class="h-auto p-2 mx-2 text-left bg-white rounded shadow-xl w-5/6 lg:w-3/5 lg:p-2 md:mx-0"
    @click.away="open = false">
    <div class="mt-1 text-center sm:text-left">
      <h3 class="text-lg px-2 font-medium leading-6 text-gray-900">
        <div class="space-y-2">
          <div class="inline-block cursor-pointer grid justify-items-end" @click="open = false">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
              viewBox="0 0 18 18">
              <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
              </path>
            </svg>
          </div>
          <div class="inline-block pl-1">
            <x-label class="font-semibold">Seleccionar alumno:</x-label>
          </div>
        </div>
      </h3>

      <div class="p-1">
        <p class="text-sm leading-5 text-gray-500">
          {{-- DIV ALIGN --}}
          <div class="flex justify-center items-center bg-white mx-auto pt-3 mb-3 ">

            {{--BUSQUEDA--}}
            <form action="{{route('usuario.index')}}" method="GET"
              class="flex-auto justify-center max-w-3xl space-x-3">

              <div class="md:flex md:items-center space-x-2">
                <x-input type="text" id="userName" name="userName" value="{{Request::input('userName')}}"
                  class=" mt-1 rounded-xl border-transparent flex-1 appearance-none border shadow-sm text-base focus:outline-none focus:ring-2 focus:border-transparent"
                  placeholder="{{__('Search User...')}}" autocomplete="off" />

                <x-input type="text" id="name" name="name" value="{{Request::input('name')}}"
                  class=" mt-1 rounded-xl border-transparent flex-1 appearance-none border shadow-sm text-base focus:outline-none focus:ring-2 focus:border-transparent"
                  placeholder="{{__('Search Name...')}}" autocomplete="off" />

                <x-input type="text" id="lastName" name="lastName" value="{{Request::input('lastName')}}"
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
          </div>{{-- FIN DIV ALIGN --}}

          {{-- TABLA BÚSQUEDA --}}
          <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-400 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                      <tr>
                        <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          id
                        </th>
                        <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          usuario
                        </th>
                        <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          nombre
                        </th>
                        <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          apellido
                        </th>
                        <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          acciones
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-red-100">

                      @forelse ($usuarios as $usuario)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                          {{$usuario->id}}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          {{$usuario->userName}}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          {{$usuario->name}}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          {{$usuario->lastName}}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#rutina">
                              <x-button class="text-white bg-blue-800 hover:bg-blue-700">Seleccionar</x-button>
                            </a>    
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td>
                          <center>No se encontró dicho usuario. Intente nuevamente</center>
                        </td>
                      </tr>
                      @endforelse
                      {{-- @include('usuario.show') --}}
                    </tbody>
                  </table>
                </div>
                <div class="mt-4">
                  {{$usuarios->links()}}
                </div>
              </div>
            </div>
          </div>
        </p>
      </div>
    </div>
  </div>
</div>