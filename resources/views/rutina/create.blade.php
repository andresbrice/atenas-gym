<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('rutina.index') }}">Gestión Rutina</a> / <u>Crear
        Rutina</u>
    </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-5xl mx-auto sm:px-6 lg:px-2">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            {{-- RUTINA --}}
            <form action="{{ route('rutina.store') }}" method="POST">
              @csrf
              <div class="grid grid-cols-1 gap-6 p-4 w-1/3"> {{-- WRAPPER --}}
                <div id="profesor" class="sm:col-span-2">
                  <x-label value="{{ __('Profesor:') }}" class="block text-md font-medium text-gray-700" />

                  <x-input type="text" name="" id="" placeholder="{{Auth::user()->name}} {{Auth::user()->lastName}}"
                    disabled />
                </div>


                <div class="sm:col-span-2">
                  <x-label value="{{ __('Student:') }}" class="block text-md font-medium text-gray-700" />

                  <select class="select2_el" id="alumno_id" style="width:100%" name="alumno" required>
                    <option value="" selected></option>
                    @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->id }}">{{ $alumno->name }} {{ $alumno->lastName }}</option>
                    @endforeach
                  </select>
                </div>


                <div id="clase" class="hidden sm:col-span-2">
                  <x-label value="{{ __('Clase:') }}" class="block text-md font-medium text-gray-700" />

                  <select class="select2_el " style="width:100%" id="clase_id" name="clase" required>
                    <option value="" selected></option>
                  </select>
                </div>

                {{-- <div id="profesor" class="hidden sm:col-span-2">
                  <x-label value="{{ __('Profesor:') }}" class="block text-md font-medium text-gray-700" />

                <select class="select2_el " style="width:100%" id="profesor_id" name="profesor" required>
                  <option value="" selected></option>
                </select>
              </div> --}}

          </div>


          <div>
            <x-table>
              @section('id')
              rutina_id
              @endsection

              @section('nombre-columna')
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Ejercicio
              </th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Series
              </th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Repeticiones
              </th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Descanso (MIN)
              </th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Filas
              </th>
              @endsection

              @section('tbodyID')
              id="dynamic"
              @endsection

              @section('contenido-filas')
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center">
                  <select class="select2_el" id="ejercicio_id" name="ejercicio[]" required>
                    <option value="" selected></option>
                    @foreach ($ejercicios as $ejercicio)
                    <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre_ejercicio }}</option>
                    @endforeach
                  </select>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <x-input id="series" class="block px-4 py-2" type="text" name="series[]" :value="old('series')"
                    required autofocus />
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <x-input id="repeticiones" class="block px-4 py-2" maxlength="2" type="text" name="repeticiones[]"
                    :value="old('repeticiones')" required autofocus />
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <x-input id="descansos" class="block px-4 py-2" maxlength="3" type="text" name="descansos[]"
                    :value="old('descansos')" required autofocus />
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <button type="button" id="add" class="addRow text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                  </button>
                </td>
              </tr>
              @endsection
            </x-table>
          </div>

          {{-- BOTON ATRAS y CREAR RUTINA --}}
          <div class="px-4 py-2 my-3 flex items-center justify-between sm:px-6">
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
  @section('scripts')
  <script>
    $(document).ready(function() {
      initSelect2();
      function initSelect2(){ 
        $('.select2_el').select2({
          placeholder: "Seleccionar",
          allowClear: true,
          width: 'resolve',
          language: {
    
            noResults: function() {
    
              return "No hay resultado";
            },
            searching: function() {
    
              return "Buscando..";
            }
          }
        });
      }
    });

    $(document).ready(function() {
  
      $('#alumno_id').change(function() {
        var $clase = $('#clase_id');
       
        console.log($(this).val());
        $.ajax({
          url: "{{ route('findClase') }}",
          data: {
            alumno_id: $(this).val()
          },
          success: function(data) {
            console.log(data);
            $clase.html('<option value="" selected>Seleccionar</option>');
            $.each(data, function(id, value) {
              $clase.append('<option value="' + value.id + '">' + value.tipo_clase +' - '+ value.hora +' - '+ value.dias + '</option>');
              console.log(id.id);
            });
          }
        });
        $('#clase_id').val("");
        $('#clase').removeClass('hidden');
      });
    });

    $(document).ready(function() {
      function initSelect2(){
      $('.select2_el').select2({
      placeholder: "Seleccionar",
      allowClear: true,
      width: 'resolve',
      language: {
      
      noResults: function() {
      
      return "No hay resultado";
      },
      searching: function() {
      
      return "Buscando..";
      }
      }
      });
      }

      let i = 1;
      let maxRow = 10;
        
      $('#add').click(function() {
        if (i<maxRow) {
          i++;
          $('#dynamic').append(''+'<tr id="row'+ i +'">'+
            '<td class="px-6 py-4 whitespace-nowrap text-center"><select class="select2_el" id="ejercicio_id" name="ejercicio[i]" required><option value="" selected></option>@foreach ($ejercicios as $ejercicio)<option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre_ejercicio }}</option>@endforeach</select></td>'+
            '<td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium"><x-input id="series" class="block px-4 py-2" type="text" name="series[i]" value="old("series")" required autofocus /></td>'+
            '<td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium"><x-input id="repeticiones" class="block px-4 py-2" maxlength="2" type="text" name="repeticiones[i]":value="old("respiraciones")" required autofocus /></td>'+
            '<td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium"><x-input id="descansos" class="block px-4 py-2" maxlength="3" type="text" name="descansos[i]"value="old("descansos")" required autofocus /></td>'+
            '<td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium"><button type="button" id="'+i+'" name="remove" class="remove_row text-gray-900 focus:outline-none"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></button></td></tr>');
          initSelect2();
        }
      });
    
    });
  </script>


  @endsection
</x-app-layout>



{{-- <script>
  $(document).ready(function(){
    let count = 1;  
    let maxRowNumber = 10;

    dynamicRows(count);

    function dynamicRows(number) {
      let html = `<tr>`;
      html += `<td class="px-6 py-4 whitespace-nowrap text-center">
        <select class="select2_el" id="ejercicio_id" name="ejercicio[]" required>
          <option value="" selected></option>
          @foreach ($ejercicios as $ejercicio)
          <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre_ejercicio }}</option>
@endforeach
</select>
</td>`;
html += `<td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
  <x-input id="series_id" class="block px-4 py-2" type="text" name="series[]" :value="old('series')" required
    autofocus />
</td>`;
html += `<td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
  <x-input id="repeticiones_id" class="block px-4 py-2" type="text" name="repeticiones[]" :value="old('repeticiones')"
    required autofocus />
</td>`;
html += `<td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
  <x-input id="descansos_id" class="block px-4 py-2" type="text" name="descansos[]" :value="old('descansos')" required
    autofocus />
</td>`;

if (number > 1) {
html+= `<td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
  <button type="button" id="remove" name="remove" class="remove text-gray-900 focus:outline-none">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
      </path>
    </svg>
  </button>
</td>
</tr>`;
$('tbody').append(html);
}else{
html+=`<td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
  <button type="button" id="add" name="add" class="add text-gray-900 focus:outline-none">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    </svg>
  </button>
</td>
</tr>`;
$('tbody').html(html);
}
}

function iniSelect2

$('#add').click(function() {
count++;
dynamicRows(count);
});


$(document).on('click','#remove',function(){
count--;
dynamicRows(count);
});

$()
});
</script> --}}