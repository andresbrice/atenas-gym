<x-app-layout>

    <x-slot name="breadcrumb">
      <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('rutina.index')}}">Gestión Rutina</a> / <u>Crear Rutina</u>
      </x-breadcrumb>
    </x-slot>
  
  
    <x-slot name="slot">
        <div class="sm:px-6 lg:px-8 h-full flex justify-center">
            <div class="w-full">
              <div class="bg-white mt-5 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white border-b border-gray-100">
                  <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
                  
                  <div class="space-x-4">
                    <div class="inline-block">
                        <x-label :value="__('Seleccionar alumno:')" class="font-semibold" />
                    </div>
                    <div class="inline-block pl-1.5">
                        {{ Auth::user()->name }} {{ Auth::user()->lastName }}
                    </div>
                  </div>
                  
                  <div class="pt-3 pb-1 space-x-4">
                    <div class="inline-block">
                        <x-label :value="__('Seleccionar profesor:')" class="font-semibold" />
                    </div>
                    <div class="inline-block">
                      {{ Auth::user()->name }} {{ Auth::user()->lastName }}
                    </div>
                  </div>

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
                                  rol
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
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                  {{$usuario->role->nombre_rol}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    {{-- BOTON SELECCIONAR --}}
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
                </div>
              </div>

              {{-- RUTINA --}}
              <form id="rutina" action="{{ route('usuario.store') }}" method="POST" class="py-11">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="">
                      <div class="space-x-4">
                        <div class="inline-block">
                            <x-label :value="__('Alumno:')" class="font-semibold" />
                        </div>
                        <div class="inline-block pl-0.5">
                            {{ Auth::user()->name }} {{ Auth::user()->lastName }}
                        </div>
                      </div>
                          
                      <div class="pt-3 pb-1 space-x-4">
                        <div class="inline-block">
                            <x-label :value="__('Profesor:')" class="font-semibold" />
                        </div>
                        <div class="inline-block">
                            {{ Auth::user()->name }} {{ Auth::user()->lastName }}
                        </div>
                      </div>

                      <div class="flex flex-col pt-3">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            {{-- Día 1 --}}
                            <div class="p-2">
                                DÍA 1
                            </div>
                            <div class="shadow overflow-hidden">
                              <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                  <tr class="text-center">
                                    <th scope="col"
                                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Ejercicio
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Series
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Repeticiones
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 tracking-wider">
                                      DESCANSO (min)
                                    </th>
                                  </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-red-100">
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>

                            {{-- Día 2 --}}
                            <div class="p-2 mt-2">
                              DÍA 2
                            </div>
                            <div class="shadow overflow-hidden">
                              <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                  <tr class="text-center">
                                    <th scope="col"
                                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Ejercicio
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Series
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Repeticiones
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 tracking-wider">
                                      DESCANSO (min)
                                    </th>
                                  </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-red-100">
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>

                            {{-- Día 3 --}}
                            <div class="p-2 mt-2">
                              DÍA 3
                            </div>
                            <div class="shadow overflow-hidden">
                              <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                  <tr class="text-center">
                                    <th scope="col"
                                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Ejercicio
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Series
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Repeticiones
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 tracking-wider">
                                      DESCANSO (min)
                                    </th>
                                  </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-red-100">
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>

                            {{-- Día 4 --}}
                            <div class="p-2 mt-2">
                              DÍA 4
                            </div>
                            <div class="shadow overflow-hidden">
                              <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                  <tr class="text-center">
                                    <th scope="col"
                                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Ejercicio
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Series
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Repeticiones
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 tracking-wider">
                                      DESCANSO (min)
                                    </th>
                                  </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-red-100">
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>

                            {{-- Día 5 --}}
                            <div class="p-2 mt-2">
                              DÍA 5
                            </div>
                            <div class="shadow overflow-hidden">
                              <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                  <tr class="text-center">
                                    <th scope="col"
                                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Ejercicio
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Series
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Repeticiones
                                    </th>
                                    <th scope="col"
                                      class="px-6 py-3 text-xs font-medium text-gray-500 tracking-wider">
                                      DESCANSO (min)
                                    </th>
                                  </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-red-100">
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                  <tr class="">
                                    <td class="pl-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                      <input class="w-36 h-6 text-sm rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
          
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                      <input class="w-12 h-6 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0" type="text">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- BOTON CREAR RUTINA --}}
                    <div class="px-4 pt-7 pb-1 bg-white text-center sm:px-6">
                      <x-button class="ml-3 bg-red-800">
                        {{ __('Crear Rutina') }}
                      </x-button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
    </x-slot>
  </x-app-layout>
  
  
  {{-- <!-- Password -->
              <div class="mt-4">
                  <x-label for="password" :value="__('Password')" />
  
                  <x-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password" />
              </div>
  
              <!-- Confirm Password -->
              <div class="mt-4">
                  <x-label for="password_confirmation" :value="__('Confirm Password')" />
  
                  <x-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password"
                                  name="password_confirmation" required />
              </div> --}}