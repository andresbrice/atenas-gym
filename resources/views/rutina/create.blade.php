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
              <form id="rutina" action="{{ route('usuario.store') }}" method="POST" class="p-1">
                  @csrf
                  <div class="">
                    <div class="px-4 py-5 bg-white sm:p-6">
                      <div class="">
                        <div class="space-y-2">
                          {{-- BÚSQUEDA ALUMNO --}}
                          <div class="flex space-x-8 h-12 items-center">
                            <x-label :value="__('Alumno:')" class="font-semibold text-base inline-block" />
                            <div class="inline-block w-max">
                              <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                <option value=""></option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">jasbdabsdoab</option>
                                <option value="123">asasdasdasdf</option>
                                <option value="3">asasdsadasdrwvebhnujdf</option>
                              </select>
                            </div>
                          </div>

                          {{-- BÚSQUEDA PROFESOR --}}
                          <div class="flex space-x-7 h-12 items-center">
                            <x-label :value="__('Profesor:')" class="font-semibold text-base inline-block" />
                            <div class="inline-block w-max">
                              <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                <option value=""></option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">jasbdabsdoab</option>
                                <option value="123">asasdasdasdf</option>
                                <option value="3">asasdsadasdrwvebhnujdf</option>
                              </select>    
                            </div>
                          </div>
                        </div>
      
                        <div class="flex relative z-1 justify-center pt-6">
                          <div class="-my-2 w-full sm:-mx-6 lg:-mx-8">
                            {{-- Día 1 --}}
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                              <div class="grid grid-cols-2">
                                <div class="place-self-start p-3">
                                  DÍA 1
                                </div>
                              </div>
                              <div class="shadow">
                                <table class="min-w-full divide-y divide-gray-200">
                                  <thead class="bg-gray-100">
                                    <tr class="text-center">
                                      <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                        class="px-1 py-3 text-xs font-medium text-gray-500 tracking-wider">
                                        DESCANSO (min)
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody class="bg-white divide-y divide-red-100">
                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <div id="btnDia1" class="w-full flex justify-end">
                                <x-btnDia/>
                              </div>
                            </div>

                            {{-- Día 2 --}}
                            <div id="dia2" class="hidden align-middle inline-block min-w-full sm:px-6 lg:px-8">
                              <div class="grid grid-cols-2">
                                <div class="place-self-start p-3">
                                  DÍA 2
                                </div>
                                <div id="close2" class="place-self-end p-1">
                                  <x-btnClose/>
                                </div>
                              </div>
                              <div class="shadow">
                                <table class="min-w-full divide-y divide-gray-200">
                                  <thead class="bg-gray-100">
                                    <tr class="text-center">
                                      <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                        class="px-1 py-3 text-xs font-medium text-gray-500 tracking-wider">
                                        DESCANSO (min)
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody class="bg-white divide-y divide-red-100">
                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <div id="btnDia2" class="w-full flex justify-end">
                                <x-btnDia/>
                              </div>
                            </div>

                            {{-- Día 3 --}}
                            <div id="dia3" class="hidden align-middle inline-block min-w-full sm:px-6 lg:px-8">
                              <div class="grid grid-cols-2">
                                <div class="place-self-start p-3">
                                  DÍA 3
                                </div>
                                <div id="close3" class="place-self-end p-1">
                                  <x-btnClose/>
                                </div>
                              </div>
                              <div class="shadow">
                                <table class="min-w-full divide-y divide-gray-200">
                                  <thead class="bg-gray-100">
                                    <tr class="text-center">
                                      <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                        class="px-1 py-3 text-xs font-medium text-gray-500 tracking-wider">
                                        DESCANSO (min)
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody class="bg-white divide-y divide-red-100">
                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <div id="btnDia3" class="w-full flex justify-end">
                                <x-btnDia/>
                              </div>
                            </div>

                            {{-- Día 4 --}}
                            <div id="dia4" class="hidden align-middle inline-block min-w-full sm:px-6 lg:px-8">
                              <div class="grid grid-cols-2">
                                <div class="place-self-start p-3">
                                  DÍA 4
                                </div>
                                <div id="close4" class="place-self-end p-1">
                                  <x-btnClose/>
                                </div>
                              </div>
                              <div class="shadow">
                                <table class="min-w-full divide-y divide-gray-200">
                                  <thead class="bg-gray-100">
                                    <tr class="text-center">
                                      <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                        class="px-1 py-3 text-xs font-medium text-gray-500 tracking-wider">
                                        DESCANSO (min)
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody class="bg-white divide-y divide-red-100">
                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <div id="btnDia4" class="w-full flex justify-end">
                                <x-btnDia/>
                              </div>
                            </div>

                            {{-- Día 5 --}}
                            <div id="dia5" class="hidden align-middle inline-block min-w-full sm:px-6 lg:px-8">
                              <div class="grid grid-cols-2">
                                <div class="place-self-start p-3">
                                  DÍA 5
                                </div>
                                <div id="close5" class="place-self-end p-1">
                                  <x-btnClose/>
                                </div>
                              </div>
                              <div class="shadow">
                                <table class="min-w-full divide-y divide-gray-200">
                                  <thead class="bg-gray-100">
                                    <tr class="text-center">
                                      <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                        class="px-1 py-3 text-xs font-medium text-gray-500 tracking-wider">
                                        DESCANSO (min)
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody class="bg-white divide-y divide-red-100">
                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td class="py-3 flex justify-center whitespace-nowrap">
                                        <select class="js-example-basic-single w-auto" style="height: 20px;" name="state">
                                          <option value=""></option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AL">jasbdabsdoab</option>
                                          <option value="123">asasdasdasdf</option>
                                          <option value="3">asasdsadasdrwvebhnujdf</option>
                                        </select>
                                      </td>
                                      
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
            
                                      <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <input type="text" maxlength="2" value="" step="1"
                                         ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="w-20 h-7 text-sm text-center rounded border-gray-300 focus:border-red-300 focus:ring-0 hover:border-red-300">
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- BOTON ATRAS y CREAR RUTINA --}}
                      <div class="px-4 pt-10 pb-1 grid grid-cols-3 bg-white sm:px-6">
                        <a href="{{route('rutina.index')}}">
                          <x-button type="button" class="place-self-start ml-2 bg-gray-600">
                            {{ __('Atras') }}
                          </x-button>
                        </a>
                        <x-button type="button" class="place-self-center bg-red-300 text-red-700 focus:outline-none hover:bg-red-700 hover:text-white border-red-600 font-bold">
                          {{ __('Crear Rutina') }}
                        </x-button>
                      </div>
                    </div>
                  </div>
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
                        divD2.classList.add('block');
                        btnDia1.classList.remove('block');
                        btnDia1.classList.add('hidden');
                      })

                      c2.addEventListener('click', () => {
                        divD2.classList.remove('block');
                        divD2.classList.add('hidden');
                        btnDia1.classList.remove('hidden');
                        btnDia1.classList.add('block');
                      })

                      btnDia2.addEventListener('click', () => {
                        divD3.classList.remove('hidden');
                        divD3.classList.add('block');
                        c2.classList.remove('block');
                        c2.classList.add('hidden');
                        btnDia2.classList.remove('block');
                        btnDia2.classList.add('hidden');
                      })

                      c3.addEventListener('click', () => {
                        divD3.classList.remove('block');
                        divD3.classList.add('hidden');
                        c2.classList.remove('hidden');
                        c2.classList.add('block');
                        btnDia2.classList.remove('hidden');
                        btnDia2.classList.add('block');
                      })

                      btnDia3.addEventListener('click', () => {
                        divD4.classList.remove('hidden');
                        divD4.classList.add('block');
                        c3.classList.remove('block');
                        c3.classList.add('hidden');
                        btnDia3.classList.remove('block');
                        btnDia3.classList.add('hidden');
                      })

                      c4.addEventListener('click', () => {
                        divD4.classList.remove('block');
                        divD4.classList.add('hidden');
                        c3.classList.remove('hidden');
                        c3.classList.add('block');
                        btnDia3.classList.remove('hidden');
                        btnDia3.classList.add('block');
                      })

                      btnDia4.addEventListener('click', () => {
                        divD5.classList.remove('hidden');
                        divD5.classList.add('block');
                        c4.classList.remove('block');
                        c4.classList.add('hidden');
                        btnDia4.classList.remove('block');
                        btnDia4.classList.add('hidden');
                      })

                      c5.addEventListener('click', () => {
                        divD5.classList.remove('block');
                        divD5.classList.add('hidden');
                        c4.classList.remove('hidden');
                        c4.classList.add('block');
                        btnDia4.classList.remove('hidden');
                        btnDia4.classList.add('block');
                      })
                    });
                  </script>
              </form>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>


{{-- felipecarmona@flyzar.com
reserva del vuelo
foto documento del frente
pcr negativo

Me dejan directamente en la puerta de embarque del vuelo comercial --}}