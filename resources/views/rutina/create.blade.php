<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('rutina.index')}}">Gestión Rutina</a> / <u>Crear
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
              <div class="grid grid-cols-1 gap-6 p-4 w-1/3"> {{--WRAPPER--}}

                <div class="sm:col-span-2">
                  <x-label value="{{__('Student:')}}" class="block text-md font-medium text-gray-700" />

                  <select class="select2_el w-full" id="alumno_id" name="alumno" required>
                    <option value="" selected></option>
                    @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->id }}">{{ $alumno->name }} {{ $alumno->lastName }}</option>
                    @endforeach
                  </select>
                </div>


                <div id="clase" class="hidden sm:col-span-2">
                  <x-label value="{{__('Clase:')}}" class="block text-md font-medium text-gray-700" />

                  <select class="select2_el w-full" id="clase_id" name="clase" required>
                    <option value="" selected></option>
                  </select>
                </div>

                <div id="profesor" class="hidden sm:col-span-2">
                  <x-label value="{{__('Profesor:')}}" class="block text-md font-medium text-gray-700" />

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
  // $(document).ready(function() {
  //   $('.select2_el').select2({
  //     placeholder: "Seleccionar",
  //     allowClear: true
  //   });
  // });




  $(document).ready(function() {

    $('#alumno_id').change(function(){
      var $clase = $('#clase_id');
      $ajax({
        method: 'get',
        url: "{{route('findClase')}}",
        data:{
          alumno_id:$(this).val(),
        },
        success: function(data){
          console.log(alumno_id);
          $clase.html('<option value="" selected></option>');
          $.each(data, function(id,value){
            $clase.append('<option value="'+ id + '">' + value + '</option>');
          });
        }
      });
      $('#clase_id, #profesor_id').val("");
      $('#clase').removeClass('hidden');
    });

    $('#clase_id').change(function(){
      var $profesor = $('#profesor_id');
      $ajax({
        url: "{{route('rutina.create')}}",
        data:{
          clase_id:$(this).val(),
        },
        success: function(data){
          $profesor.html('<option value="" selected></option>');
          $.each(data, function(id,value){
            $profesor.append('<option value="'+ id + '">' + value + '</option>');
          });
        }
      });
      $('#profesor').removeClass('hidden');
    });
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

    $(wrapper).on("click", "#btnRemoveRow", function(e) { //user click on remove text
      e.preventDefault();
      $(this).closest("tr").remove();

      // $(".camerasCounter").each(function(elm) {
      //   var count = elm + 1
      //   $(this).attr("name", "Camera " + count);
      //   $(this).attr("value", "Camera " + count);
      //   x = elm + 1;
      // });
    })

  });
<<<<<<< HEAD
  
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
  
=======



  





>>>>>>> dc2851cdf6d3af034743066402ced133d2ee8362

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