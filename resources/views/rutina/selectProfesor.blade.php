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
            <x-label class="font-semibold text-base">Seleccionar profesor:</x-label>
          </div>
        </div>
      </h3>

      <div class="p-1">
        <p class="text-sm leading-5 text-gray-500">
          {{-- DIV ALIGN --}}
          <div class="mx-32 pt-3 mb-3 ">

            {{-- BUSCADOR --}}
            <x-search>
              @section('action')
                {{ route('rutina.index') }}
              @endsection

              @section('opciones')
                <option hidden value="">
                  Filtrar por...
                </option>

                <option value="userName" {{ old('filtro') == 'userName' ? 'selected' : '' }}>
                  Usuario
                </option>

                <option value="name" {{ old('filtro') == 'name' ? 'selected' : '' }}>
                  Nombre y Apellido
                </option>
                
              @endsection
            </x-search>
            {{-- FIN BUSCADOR --}}
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
                          class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                          usuario
                        </th>
                        <th scope="col"
                          class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                          nombre
                        </th>
                        <th scope="col"
                          class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                          apellido
                        </th>
                        <th scope="col"
                          class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                          acciones
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-red-100">

                      @forelse ($usuarios as $usuario)
                      <tr>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                          {{$usuario->userName}}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                          {{$usuario->name}}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                          {{$usuario->lastName}}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium">
                            <a href="#rutina">
                              <x-button type="button" class="text-white bg-blue-600 hover:bg-blue-500">Seleccionar</x-button>
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