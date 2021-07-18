<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('rutina.index') }}">Gestión Rutina</a> / <u>Crear
        Rutina</u>
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
              <div class="grid grid-cols-1 gap-6 p-4 w-1/3"> {{-- WRAPPER --}}

                <div class="sm:col-span-2">
                  <x-label value="{{ __('Student:') }}" class="block text-md font-medium text-gray-700" />

                  <select class="select2_el w-full" id="alumno_id" name="alumno" required>
                    <option value="" selected></option>
                    @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->id }}">{{ $alumno->name }} {{ $alumno->lastName }}</option>
                    @endforeach
                  </select>
                </div>


                <div id="clase" class="hidden sm:col-span-2">
                  <x-label value="{{ __('Clase:') }}" class="block text-md font-medium text-gray-700" />

                  <select class="select2_el w-full" id="clase_id" name="clase" required>
                    <option value="" selected></option>
                  </select>
                </div>

                <div id="profesor" class="hidden sm:col-span-2">
                  <x-label value="{{ __('Profesor:') }}" class="block text-md font-medium text-gray-700" />

                  <select class="select2_el w-full" id="profesor_id" name="profesor" required>
                    <option value="" selected></option>
                  </select>
                </div>

              </div>

              {{-- BOTON ATRAS y CREAR RUTINA --}}
              <div class="px-4 py-2 my-3 flex items-center justify-between sm:px-6">
                <a href="{{ route('rutina.index') }}">
                  <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                    {{ __('Back') }}
                  </x-button>
                </a>

                <x-button
                  class="ml-3 bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
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
      allowClear: true,
      language: {

        noResults: function() {

          return "No hay resultado";
        },
        searching: function() {

          return "Buscando..";
        }
      }
    });
  });
</script>

<script>
  $(document).ready(function() {

    $('#alumno_id').change(function() {
      var $clase = $('#clase_id');
      $.ajax({
        url: "{{ route('findClase') }}",
        data: {
          alumno_id: $(this).val()
        },
        success: function(data) {

          //console.log(data);
          $clase.html('<option value="" selected>Choose Class</option>');
          $.each(data, function(id, value) {
            $clase.append('<option value="' + id + '">' + value + '</option>');
          });
        }
      });
      $('#clase_id, #profesor_id').val("");
      $('#clase').removeClass('hidden');
    });

    // $('#clase_id').change(function() {
    //   var $profesor = $('#profesor_id');
    //   $ajax({
    //     url: "{{ route('rutina.create') }}",
    //     data: {
    //       clase_id: $(this).val(),
    //     },
    //     success: function(data) {
    //       $profesor.html('<option value="" selected></option>');
    //       $.each(data, function(id, value) {
    //         $profesor.append('<option value="' + id + '">' + value + '</option>');
    //       });
    //     }
    //   });
    //   $('#profesor').removeClass('hidden');
    // });
  });
</script>

{{-- <script type="text/javascript">
  $(document).ready(function(){
              
    $(document).on('change','#alumno',function(){
              
      var alumno_id=$(this).val();
                    var div=$(this).parent();
                    var op=" ";
                    
                    $.ajax({
                      url:"{{route('findClase')}}",
// type:'GET',
data:{'id':alumno_id},
// dataType:'json',
success:function(data){
// console.log(data.length);
op+='<option value="0" selected disabled>Seleccionar clase</option>';
for(var i=0;i<response.length;i++){ op+='<option value="' +response[i].id+'">'+response[i].tipo_clase+'</option>';
  }

  div.find('.tipo_clase').html(" ");
  div.find('.tipo_clase').append(op);
  },
  error:function(){
  console.log("error");
  }
  });
  });

  });
  </script> --}}