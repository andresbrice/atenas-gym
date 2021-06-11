<x-app-layout>
  <x-slot name="breadcrumb">
    <h3 class="text-red-300 underline">Dashboard</h3>
  </x-slot>

  <x-slot name="slot">
    <div class="sm:px-6 lg:px-8 h-full flex justify-center items-center">
      <div class="w-full">
        <div class="bg-gray-200 overflow-visible">
            <div class="text-center text-5xl font-bold p-14 bg-gray-200 text-black w-100 h-100 mx-auto mb-3 ">

              Te damos la bienvenida, {{ Auth::user()->name }} 😄
              
              {{-- @if (Auth::user()->gender == 'Femenino')
                Bienvenida, {{ Auth::user()->name }} 😄
              @else
                Bienvenido, {{ Auth::user()->name }} 😄
              @endif --}}

            </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>