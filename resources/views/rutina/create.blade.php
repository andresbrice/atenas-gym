<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('rutina.index')}}">Gestión Rutina</a> / <u>Crear Rutina</u>
    </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-4xl mx-auto sm:px-6 lg:px-2">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            {{-- RUTINA --}}
            <form id="rutina" action="{{ route('rutina.store') }}" method="POST">
              @csrf
              <div class="flex flex-col space-y-4 p-2">
                {{-- BÚSQUEDA ALUMNO --}}
                <div class="inline-flex space-x-5 items-center text-center sm:flex-row">
                  <x-label :value="__('Alumno:')" class="font-semibold text-base" />
                  <select class="select2_el w-56" style="height: 20px;" id="alumno" name="alumno" :value="old('alumno')" required >
                    <option value=""></option>
                    @foreach ($alumnos as $alumno)
                      <option value="{{ $alumno->id }}">
                        {{ $alumno->name }} {{ $alumno->lastName }}
                      </option>
                    @endforeach
                  </select>
                </div>

                {{-- BÚSQUEDA PROFESOR --}}
                <div class="inline-flex space-x-4 items-center text-center sm:flex-row">
                  <x-label :value="__('Profesor:')" class="font-semibold text-base" />
                  <select class="select2_el w-56" style="height: 20px;" id="profesor" name="profesor" :value="old('profesor')" required >
                    <option value=""></option>
                    @foreach ($profesores as $profesor)
                      <option value="{{ $profesor->id }}">
                        {{ $profesor->name }} {{ $profesor->lastName }}
                      </option>
                    @endforeach
                  </select>
                </div>

                {{-- BÚSQUEDA CLASE --}}
                <div class="inline-flex space-x-9 items-center text-center sm:flex-row">
                  <x-label :value="__('Clase:')" class="font-semibold text-base mr-0.5" />
                  <select class="select2_el w-56" style="height: 20px;" id="clase" name="clase" :value="old('clase')" required >
                    <option value=""></option>
                    @foreach ($clases as $clase)
                      <option value="{{ $clase->id }}">
                        {{ $clase->horario->hora->format('H:i A') }} {{ $clase->tipo_clase }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <script type="text/javascript">
                $(document).ready(function(){
              
                  $(document).on('change','#alumno',function(){
              
                    var alumno_id=$(this).val();
                    var div=$(this).parent();
              
                    var op=" ";
              
                    $.ajax({
                      type:'get',
                      url:'{!!URL::to('findClase')!!}',
                      data:{'id':alumno_id},
                      success:function(data){
                        op+='<option value="0" selected disabled>chose product</option>';
                        for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].tipo_clase+'</option>';
                         }
              
                         div.find('.productname').html(" ");
                         div.find('.productname').append(op);
                      },
                      error:function(){
              
                      }
                    });
                  });
              
                });
              </script>
                
              {{-- Día 1 --}}
              <div id="dia1" class="flex flex-col mt-8">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                  <label for="">DÍA 1</label>
                </div>
                <div class="flex-1 shadow border-b border-gray-200 sm:rounded-lg">
                  <x-table id="tablaEjerciciosDia1">
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
                        DESCANSO
                      </th>
                      <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <button id="botonAgregar" class="uppercase">+ Fila</button>
                      </th>
                    </tr>
                    @endsection
                    @section('contenido-filas')
                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select id="ejercicio" name="ejercicio" :value="old('ejercicio')" class="select2_el w-48" style="height: 20px;" name="state" required >
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option value="{{ $ejercicio->id }}">
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" min="1" max="99" maxlength="2" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" min="1" max="99" maxlength="2" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" min="1" max="99" maxlength="2" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>
                    @endsection
                  </x-table>
                </div>
                <div id="btnDia1" class="flex w-full justify-end">
                  <x-btnDia/>
                </div>
              </div>

              {{-- Día 2 --}}
              {{-- <div id="dia2" class="hidden flex-col mt-6">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                  <label for="">DÍA 2</label>
                  <div id="close2" class="flex">
                    <x-btnClose/>
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
                        DESCANSO
                      </th>
                    </tr>
                    @endsection
                    @section('contenido-filas')
                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>
                    @endsection
                  </x-table>
                </div>
                <div id="btnDia2" class="flex w-full justify-end">
                  <x-btnDia/>
                </div>
              </div> --}}

              {{-- Día 3 --}}
              {{-- <div id="dia3" class="hidden flex-col mt-6">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                  <label for="">DÍA 3</label>
                  <div id="close3" class="flex">
                    <x-btnClose/>
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
                        DESCANSO
                      </th>
                    </tr>
                    @endsection
                    @section('contenido-filas')
                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>
                    @endsection
                  </x-table>
                </div>
                <div id="btnDia3" class="flex w-full justify-end">
                  <x-btnDia/>
                </div>
              </div> --}}

              {{-- Día 4 --}}
              {{-- <div id="dia4" class="hidden flex-col mt-6">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                  <label for="">DÍA 4</label>
                  <div id="close4" class="flex">
                    <x-btnClose/>
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
                        DESCANSO
                      </th>
                    </tr>
                    @endsection
                    @section('contenido-filas')
                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>
                    @endsection
                  </x-table>
                </div>
                <div id="btnDia4" class="flex w-full justify-end">
                  <x-btnDia/>
                </div>
              </div> --}}

              {{-- Día 5 --}}
              {{-- <div id="dia5" class="hidden flex-col mt-6">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                  <label for="">DÍA 5</label>
                  <div id="close5" class="flex">
                    <x-btnClose/>
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
                        DESCANSO
                      </th>
                    </tr>
                    @endsection
                    @section('contenido-filas')
                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>

                    <tr>
                      <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <select name="ejercicio" :value="old('ejercicio')" class="js-example-basic-single w-48" style="height: 20px;" name="state">
                          <option value=""></option>
                          @foreach ($ejercicios as $ejercicio)
                            <option>
                              {{ $ejercicio->nombre_ejercicio }}
                            </option>
                          @endforeach
                        </select>
                      </td>
                      
                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
                      </td>
                    </tr>
                    @endsection
                  </x-table>
                </div>
              </div> --}}

              {{-- BOTON ATRAS y CREAR RUTINA --}}
              <div class="mt-7 px-4 flex items-center justify-between sm:px-6">
                <a href="{{ route('rutina.index') }}">
                  <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                    {{ __('Back') }}
                  </x-button>
                </a>

                <x-button class="ml-3 bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                  {{ __('Register Rutine') }}
                </x-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>
<script>
  $(document).ready(function() {
    $('.select2_el').select2({
      placeholder: "Seleccionar",
      allowClear: true
    });
  });

  const tbodyEl = document.querySelector("tbody");
  const tableEl = document.querySelector("table");
  const btnAgregar = document.getElementById('botonAgregar');
  function onAddRow(e) {
    e.preventDefault();
    new_select2 = $("select2_el").first().clone();
    $('.select2_el').select2({
      placeholder: "Seleccionar",
      allowClear: true
    });
    $('.select2_el').last().next().next().remove();
    tbodyEl.innerHTML += `
      <tr>
        <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
          <select id="ejercicio'+count+'" name="ejercicio" :value="old('ejercicio')" class="select2_el w-48" style="height: 20px;" name="state">
            <option value=""></option>
            @foreach ($ejercicios as $ejercicio)
              <option>
                {{ $ejercicio->nombre_ejercicio }}
              </option>
            @endforeach
          </select>
        </td>

        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
          <x-input class="focus:outline-none text-center border border-gray-300" id="series" name="series" :value="old('series')" required />
        </td>

        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
          <x-input class="focus:outline-none text-center border border-gray-300" id="repeticiones" name="repeticiones" :value="old('repeticiones')" required />
        </td>

        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
          <x-input class="focus:outline-none text-center border border-gray-300" id="descanso" name="descanso" :value="old('descanso')" required />
        </td>

        <td class="px-6 py-4 whitespace-nowrap items-center text-center text-sm font-medium">
          <button class="deleteBtn h-7 px-3 text-red-700 transition-colors duration-150 focus:shadow-outline hover:bg-gray-200 hover:rounded-r-md">Borrar</button>
        </td>
      </tr>
    `;
  }

  function onDeleteRow(e) {
    if (!e.target.classList.contains("deleteBtn")) {
      return;
    }

    const btn = e.target;
    btn.closest("tr").remove();
  }

  btnAgregar.addEventListener("click", onAddRow);
  tableEl.addEventListener("click", onDeleteRow);


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