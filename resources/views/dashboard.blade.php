<x-app-layout>
  <x-slot name="breadcrumb">
    <h3 class="text-gray-300 underline ml-4">Dashboard</h3>
  </x-slot>

  <x-slot name="slot">
    <div class="sm:px-6 lg:px-8 h-full flex justify-center items-center">
      <div class="w-4/5">
        <div class="bg-gray-200 overflow-visible">
            <div class="text-center text-5xl font-bold py-28 bg-gray-200 text-black w-100 h-100 mx-auto mb-3 ">

              Le damos la bienvenida, {{ Auth::user()->name }} 😄

            </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>