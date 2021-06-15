<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><u>Dashboard</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="sm:px-6 altura89por flex justify-center items-center">
      <div class="w-auto">
        <div class="bg-gray-200 overflow-visible">
          <div class="text-center text-5xl font-bold  bg-gray-200 text-black mx-auto w-auto h-auto ">
            Le damos la bienvenida, {{ Auth::user()->name }} 😄
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>