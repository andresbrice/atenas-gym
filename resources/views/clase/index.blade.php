<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Clase</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">

    <div class="sm:px-6 lg:px-6 h-full flex justify-center">
      <div class="max-w-8xl">
        <div class="bg-white mt-5 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-4 bg-white border-b border-gray-100">
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
            {{-- DIV ALIGN --}}
            <div class="flex justify-center items-center bg-white mx-auto mb-3 ">

              {{-- BOTON CREAR CLASE --}}
              <div class="flex-auto justify-center ml-4">
                <a href="{{route('clase.create')}}">
                  <x-button type="button"
                    class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold">
                    {{ __('Register Class') }}
                  </x-button>
                </a>
              </div>

              {{-- BUSQUEDA
              <form action="{{route('clase.index')}}" method="GET" class="flex-auto justify-center max-w-3xl
              space-x-3">

              <div class="md:flex md:items-center space-x-2">
                <x-input type="text" id="userName" name="userName" value="{{Request::input('userName')}}" class=" mt-1 rounded-xl border-transparent flex-1 appearance-none border shadow-sm text-base
                  focus:outline-none focus:ring-2 focus:border-transparent" placeholder="{{__('Search User...')}}"
                  autocomplete="off" />

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
              </form>{{--FIN BUSQUEDA --}}
            </div>{{--FIN DIV ALIGN--}}

            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div>
                    <div class="shadow overflow-hidden border-b border-gray-400 sm:rounded-lg">
                      <table class="table-auto min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                          <tr>
                            <th scope="col"
                              class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              id
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Tipo de clase
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Cupos Disponibles
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Horario
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Dias de Entrenamiento
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Alumnos
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Profesores
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Tarifa
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              acciones
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-red-100">

                          @forelse ($clases as $clase)
                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                              {{$clase->id}}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              {{$clase->tipo_clase}}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              {{$clase->cupos_disponibles}}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              {{$clase->horario->hora->format('H:i A')}}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              @foreach ($clase->dias as $dia)
                              {{$dia->dia}}<br>
                              @endforeach
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              <button
                                class="bg-gray-500 text-white active:bg-gray-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button">
                                Ver
                              </button>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              {{-- $clase->profesors->pr --}}
                              Martin Palermo <br>
                              Juan Roman Riquelme
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              ${{$clase->tarifa->precio}}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                              {{-- BOTON EDITAR --}}
                              <a href="">
                                <x-button class="text-white bg-green-800 hover:bg-green-700">Editar</x-button>
                              </a>

                              {{-- BOTON AGREGAR ALUMNOS --}}

                              <div class="inline">
                                <x-dropdown class="origin-top-right right-auto" width="48"
                                  contentClasses="bg-white rounded-md ring-1 ring-blue-700 text-blue-800"
                                  class="inline-flex">
                                  <x-slot name="trigger">
                                    <x-button class="text-white bg-blue-700 hover:bg-blue-600">
                                      <span class="mx-1">Alumnos</span>

                                      <div>
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                          viewBox="0 0 20 20">
                                          <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                        </svg>
                                      </div>
                                    </x-button>
                                  </x-slot>

                                  <x-slot name="content">
                                    <x-dropdown-link href="#">
                                      {{ __('Agregar alumnos') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link href="#">
                                      {{ __('Editar alumnos') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link href="#">
                                      {{ __('Borrar alumnos') }}
                                    </x-dropdown-link>
                                  </x-slot>
                                </x-dropdown>
                              </div>


                              {{-- BOTON AGREGAR Profesores --}}

                              <div class="inline">
                                <x-dropdown class="origin-top-right right-auto" width="48"
                                  contentClasses="bg-white rounded-md ring-1 ring-yellow-500 text-black"
                                  class="inline-flex">
                                  <x-slot name="trigger">
                                    <x-button class="text-white bg-yellow-600 hover:bg-yellow-700">
                                      <span class="mx-1">Profesores</span>

                                      <div>
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                          viewBox="0 0 20 20">
                                          <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                        </svg>
                                      </div>
                                    </x-button>
                                  </x-slot>

                                  <x-slot name="content">
                                    <x-dropdown-link href="#">
                                      {{ __('Agregar profesores') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link href="#">
                                      {{ __('Editar profesores') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link href="#">
                                      {{ __('Borrar profesores') }}
                                    </x-dropdown-link>
                                  </x-slot>
                                </x-dropdown>
                              </div>


                              {{-- @include('clase.addProfesores') --}}




                              {{-- BOTON BORRAR --}}
                              <form action="#" method="post" class="inline">
                                @csrf
                                @method('DELETE')

                                <x-button class="text-white bg-red-900 hover:bg-red-700"
                                  onclick="return confirm('¿Quieres borrar esta clase?')">
                                  Borrar</x-button>
                              </form>
                            </td>
                          </tr>
                          @empty
                          <tr>
                            <td>
                              @if(strlen($clases) === 0)
                              <center>No hay clases creadas.</center>
                              @else
                              <center>No se encontró dicho clase. Intente nuevamente</center>
                              @endif
                            </td>
                          </tr>
                          @endforelse
                          {{-- @include('clase.show') --}}
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="mt-4">
                    {{$clases->links()}}
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