<x-app-layout>

    <x-slot name="breadcrumb">
      <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Tarifa</u></x-breadcrumb>
    </x-slot>
  
    <x-slot name="slot">
  
      <div class="sm:px-6 lg:px-8 h-full flex justify-center">
        <div class="w-full">
          <div class="bg-white mt-5 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 bg-white border-b border-gray-100">
              <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
              {{-- DIV ALIGN --}}
              <div class="flex justify-center items-center bg-white mx-auto mb-3 ">
  
                {{-- BOTON CREAR TARIFA --}}
                 <div class="flex-auto justify-center ml-4"> 
                  <a href="{{route('tarifa.create')}}">
                    <x-button type="button"
                      class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold">
                      {{ __('Register Rate') }}
                    </x-button>
                  </a>
                </div>
  
                {{--BUSQUEDA--}}
                {{-- <form action="{{route('tarifa.index')}}" method="GET"
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
              </div> {{-- FIN DIV ALIGN  --}}
  
              <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-400 sm:rounded-lg">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                          <tr>
                            <th scope="col"
                              class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                             Cantidad de días
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Precio
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Acciones
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-red-100">
  
                           @forelse ($tarifas as $tarifa)
                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                              {{$tarifa->id}}
                            </td>
  
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                              {{$tarifa->precio}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                              {{-- BOTON EDITAR --}}
                              <a href="{{route('tarifa.edit',$tarifa->id)}}">
                                <x-button class="text-white bg-green-800 hover:bg-green-700">Editar</x-button>
                              </a>
  
                              {{-- BOTON BORRAR --}}
                              <form action="{{route('tarifa.destroy',$tarifa->id)}}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
  
                                <x-button class="text-white bg-red-900 hover:bg-red-700"
                                  onclick="return confirm('¿Quieres borrar esta tarifa?')">
                                  Borrar</x-button>
                              </form>
                            </td>
                          </tr>
                          @empty
                          <tr>
                            <td>
                              <center>No se encontró dicho tarifa. Intente nuevamente</center>
                            </td>
                          </tr>
                          @endforelse
                          {{-- @include('tarifa.show') --}}
                        </tbody>
                      </table>
                    </div>
                    <div class="mt-4">
                      {{$tarifas->links()}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </x-slot>
  
  </x-app-layout>