<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('rutina.index')}}">Gestión Rutina</a> / <u>Crear Rutina</u>
    </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6 overflow-auto">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg">

              {{-- RUTINA --}}
              <form id="rutina" action="{{ route('usuario.store') }}" method="POST">
                  @csrf
                    <div class="py-5 bg-white sm:p-6">
                        <div class="flex flex-col md:w-80 space-y-4">
                          {{-- BÚSQUEDA ALUMNO --}}
                          <div class="flex space-x-1 items-center">
                            <div class="flex-1">
                              <x-label :value="__('Alumno:')" class="font-semibold text-base" />
                            </div>
                            <div class="flex-1 text-center">
                              <select class="js-example-basic-single w-56" style="height: 20px;" id="alumno" name="alumno" :value="old('alumno')">
                                <option value=""></option>
                                @foreach ($alumnos as $alumno)
                                  <option>
                                    {{ $alumno->name }} {{ $alumno->lastName }}
                                  </option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          {{-- BÚSQUEDA PROFESOR --}}
                          <div class="flex space-x-1 items-center">
                            <div class="flex-1">
                              <x-label :value="__('Profesor:')" class="font-semibold text-base" />
                            </div>
                            <div class="flex-1 text-center">
                              <select class="js-example-basic-single w-56" style="height: 20px;" id="profesor" name="profesor" :value="old('profesor')">
                                <option value=""></option>
                                @foreach ($profesores as $profesor)
                                  <option>
                                    {{ $profesor->name }} {{ $profesor->lastName }}
                                  </option>
                                @endforeach
                              </select> 
                            </div>
                          </div>
                        </div>
                        
                        {{-- Día 1 --}}
                        <div id="dia1" class="flex flex-col mt-8">
                          <div class="flex">
                            <div class="flex-1 ml-2">
                              DÍA 1
                            </div>
                          </div>
                          <div class="flex-1 shadow border-b border-gray-200 sm:rounded-lg">
                            <x-table>
                              @section('nombre-columna')
                              <tr>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Ejercicio
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Series
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Repeticiones
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  DESCANSO (min)
                                </th>
                              </tr>
                              @endsection
                              @section('contenido-filas')
                              @for ($i = 0; $i < 5; $i++)
                              <tr>
                                <td class="w-max px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                                  <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                    <option value=""></option>
                                    @foreach ($ejercicios as $ejercicio)
                                      <option>
                                        {{ $ejercicio->nombre_ejercicio }}
                                      </option>
                                    @endforeach
                                  </select>
                                </td>
                                @php
                                  $c = 0
                                @endphp
                                @while ($c < 3)
                                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <input class="rounded-md w-12 h-7 text-center shadow-sm sm:text-sm border border-gray-300 focus:outline-none focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" type="text" maxlength="2" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57;" id="series" name="series" :value="old('series')" required />
                                  </td>
                                  @php $c++ @endphp
                                @endwhile
                              </tr>    
                              @endfor
                              @endsection
                            </x-table>
                          </div>
                          <div id="btnDia1" class="w-full flex justify-end">
                            <x-btnDia/>
                          </div>
                        </div>

                        {{-- Día 2 --}}
                        <div id="dia2" class="flex flex-col mt-6">
                          <div class="flex">
                            <div class="flex-1 ml-2">
                              DÍA 2
                            </div>
                            <div id="close2" class="justify-end">
                              <x-btnClose/>
                            </div>
                          </div>
                          <div class="flex-1">
                            <x-table>
                              @section('nombre-columna')
                              <tr>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Ejercicio
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Series
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Repeticiones
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  DESCANSO (min)
                                </th>
                              </tr>
                              @endsection
                              @section('contenido-filas')
                              @for ($i = 0; $i < 5; $i++)
                              <tr>
                                <td class="w-max px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                                  <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                    <option value=""></option>
                                    @foreach ($ejercicios as $ejercicio)
                                      <option>
                                        {{ $ejercicio->nombre_ejercicio }}
                                      </option>
                                    @endforeach
                                  </select>
                                </td>
                                @php
                                  $c = 0
                                @endphp
                                @while ($c < 3)
                                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <input class="rounded-md w-12 h-7 text-center shadow-sm sm:text-sm border border-gray-300 focus:outline-none focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" type="text" maxlength="2" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57;" id="series" name="series" :value="old('series')" required />
                                  </td>
                                  @php $c++ @endphp
                                @endwhile
                              </tr>    
                              @endfor
                              @endsection
                            </x-table>
                          </div>
                          <div id="btnDia2" class="w-full flex justify-end">
                            <x-btnDia/>
                          </div>
                        </div>

                        {{-- Día 3 --}}
                        <div id="dia3" class="hidden flex-col mt-6">
                          <div class="flex">
                            <div class="flex-1 ml-2">
                              DÍA 3
                            </div>
                            <div id="close3" class="justify-end">
                              <x-btnClose/>
                            </div>
                          </div>
                          <div class="flex-1">
                            <x-table>
                              @section('nombre-columna')
                              <tr>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Ejercicio
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Series
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Repeticiones
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  DESCANSO (min)
                                </th>
                              </tr>
                              @endsection
                              @section('contenido-filas')
                              @for ($i = 0; $i < 5; $i++)
                              <tr>
                                <td class="w-max px-3 py-4 whitespace-normal text-center text-sm font-medium">
                                  <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                    <option value=""></option>
                                    @foreach ($ejercicios as $ejercicio)
                                      <option>
                                        {{ $ejercicio->nombre_ejercicio }}
                                      </option>
                                    @endforeach
                                  </select>
                                </td>
                                @php
                                  $c = 0
                                @endphp
                                @while ($c < 3)
                                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <input class="rounded-md w-12 h-7 text-center shadow-sm sm:text-sm border border-gray-300 focus:outline-none focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" type="text" maxlength="2" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57;" id="series" name="series" :value="old('series')" required />
                                  </td>
                                  @php $c++ @endphp
                                @endwhile
                              </tr>    
                              @endfor
                              @endsection
                            </x-table>
                          </div>
                          <div id="btnDia3" class="w-full flex justify-end">
                            <x-btnDia/>
                          </div>
                        </div>

                        {{-- Día 4 --}}
                        <div id="dia4" class="hidden flex-col mt-6">
                          <div class="flex">
                            <div class="flex-1 ml-2">
                              DÍA 4
                            </div>
                            <div id="close4" class="justify-end">
                              <x-btnClose/>
                            </div>
                          </div>
                          <div class="flex-1">
                            <x-table>
                              @section('nombre-columna')
                              <tr>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Ejercicio
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Series
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Repeticiones
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  DESCANSO (min)
                                </th>
                              </tr>
                              @endsection
                              @section('contenido-filas')
                              @for ($i = 0; $i < 5; $i++)
                              <tr>
                                <td class="w-max px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                                  <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                    <option value=""></option>
                                    @foreach ($ejercicios as $ejercicio)
                                      <option>
                                        {{ $ejercicio->nombre_ejercicio }}
                                      </option>
                                    @endforeach
                                  </select>
                                </td>
                                @php
                                  $c = 0
                                @endphp
                                @while ($c < 3)
                                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <input class="rounded-md w-12 h-7 text-center shadow-sm sm:text-sm border border-gray-300 focus:outline-none focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" type="text" maxlength="2" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57;" id="series" name="series" :value="old('series')" required />
                                  </td>
                                  @php $c++ @endphp
                                @endwhile
                              </tr>    
                              @endfor
                              @endsection
                            </x-table>
                          </div>
                          <div id="btnDia4" class="w-full flex justify-end">
                            <x-btnDia/>
                          </div>
                        </div>

                        {{-- Día 5 --}}
                        <div id="dia5" class="hidden flex-col mt-6">
                          <div class="flex">
                            <div class="flex-1 ml-2">
                              DÍA 5
                            </div>
                            <div id="close5" class="justify-end">
                              <x-btnClose/>
                            </div>
                          </div>
                          <div class="flex-1">
                            <x-table>
                              @section('nombre-columna')
                              <tr>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Ejercicio
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Series
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Repeticiones
                                </th>
                                <th scope="col"
                                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  DESCANSO (min)
                                </th>
                              </tr>
                              @endsection
                              @section('contenido-filas')
                              @for ($i = 0; $i < 5; $i++)
                              <tr>
                                <td class="w-max px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                                  <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                    <option value=""></option>
                                    @foreach ($ejercicios as $ejercicio)
                                      <option>
                                        {{ $ejercicio->nombre_ejercicio }}
                                      </option>
                                    @endforeach
                                  </select>
                                </td>
                                @php
                                  $c = 0
                                @endphp
                                @while ($c < 3)
                                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <input class="rounded-md w-12 h-7 text-center shadow-sm sm:text-sm border border-gray-300 focus:outline-none focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" type="text" maxlength="2" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57;" id="series" name="series" :value="old('series')" required />
                                  </td>
                                  @php $c++ @endphp
                                @endwhile
                              </tr>    
                              @endfor
                              @endsection
                            </x-table>
                          </div>
                        </div>
                      {{-- BOTON ATRAS y CREAR RUTINA --}}
                      <div class="flex justify-center items-center bg-white mx-auto mt-10 px-7">
                        <div class="flex-auto">
                          <a class="flex-1 justify-start" href="{{route('rutina.index')}}">
                            <x-button type="button" class="ml-2 bg-gray-600">
                              {{ __('Atras') }}
                            </x-button>
                          </a>
                        </div>

                        <x-button type="button" class="bg-red-300 text-red-700 focus:outline-none hover:bg-red-700 hover:text-white border-red-600 font-bold">
                          {{ __('Crear Rutina') }}
                        </x-button>
                      </div>
                    </div>
              </form>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2({
      placeholder: "Seleccionar",
      allowClear: true
    });
  });

  window.addEventListener('DOMContentLoaded', () => {
    const btnD1 = document.querySelector('#btnDia1')

    const btnD2 = document.querySelector('#btnDia2')
    const divD2 = document.querySelector('#dia2')
    const c2 = document.querySelector('#close2')
    
    const btnD3 = document.querySelector('#btnDia3')
    const divD3 = document.querySelector('#dia3')
    const c3 = document.querySelector('#close3')

    const btnD4 = document.querySelector('#btnDia4')
    const divD4 = document.querySelector('#dia4')
    const c4 = document.querySelector('#close4')

    const divD5 = document.querySelector('#dia5')
    const c5 = document.querySelector('#close5')

    btnDia1.addEventListener('click', () => {
      divD2.classList.remove('hidden');
      divD2.classList.add('flex');
      btnDia1.classList.remove('flex');
      btnDia1.classList.add('hidden');
    })

    c2.addEventListener('click', () => {
      divD2.classList.remove('flex');
      divD2.classList.add('hidden');
      btnDia1.classList.remove('hidden');
      btnDia1.classList.add('flex');
    })

    btnDia2.addEventListener('click', () => {
      divD3.classList.remove('hidden');
      divD3.classList.add('flex');
      c2.classList.remove('flex');
      c2.classList.add('hidden');
      btnDia2.classList.remove('flex');
      btnDia2.classList.add('hidden');
    })

    c3.addEventListener('click', () => {
      divD3.classList.remove('flex');
      divD3.classList.add('hidden');
      c2.classList.remove('hidden');
      c2.classList.add('flex');
      btnDia2.classList.remove('hidden');
      btnDia2.classList.add('flex');
    })

    btnDia3.addEventListener('click', () => {
      divD4.classList.remove('hidden');
      divD4.classList.add('flex');
      c3.classList.remove('flex');
      c3.classList.add('hidden');
      btnDia3.classList.remove('flex');
      btnDia3.classList.add('hidden');
    })

    c4.addEventListener('click', () => {
      divD4.classList.remove('flex');
      divD4.classList.add('hidden');
      c3.classList.remove('hidden');
      c3.classList.add('flex');
      btnDia3.classList.remove('hidden');
      btnDia3.classList.add('flex');
    })

    btnDia4.addEventListener('click', () => {
      divD5.classList.remove('hidden');
      divD5.classList.add('flex');
      c4.classList.remove('flex');
      c4.classList.add('hidden');
      btnDia4.classList.remove('flex');
      btnDia4.classList.add('hidden');
    })

    c5.addEventListener('click', () => {
      divD5.classList.remove('flex');
      divD5.classList.add('hidden');
      c4.classList.remove('hidden');
      c4.classList.add('flex');
      btnDia4.classList.remove('hidden');
      btnDia4.classList.add('flex');
    })
  });
</script>