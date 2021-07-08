<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestión Usuario</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="py-2 xl:py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg">
          <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
            <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
            <div class="mb-3">
              {{-- BOTON CREAR USUARIO Y BUSCADOR --}}
              <div class="flex flex-col sm:flex-row justify-between items-center">
                {{-- BOTON --}}
                <a href="{{ route('usuario.create') }}" class="w-max md:mr-5">
                  <x-button type="button"
                    class="bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                    {{ __('Register User') }}
                  </x-button>
                </a>

                @php
                if (isset($_GET['filtro'])) {
                $seleccionado= $_GET['filtro'];
                }
                @endphp

                {{-- BUSCADOR --}}
                <x-search>
                  @section('action')
                  {{ route('usuario.index') }}
                  @endsection

                  @section('opciones')
                  <option hidden value="">
                    Filtrar por...
                  </option>

                  <option value="1" @php if (isset($seleccionado) && $seleccionado=='1' ) { echo 'selected' ; } @endphp>
                    Usuario
                  </option>

                  <option value="2" @php if (isset($seleccionado) && $seleccionado=='2' ) { echo 'selected' ; } @endphp>
                    Nombre y Apellido
                  </option>

                  @endsection
                </x-search>
                {{-- FIN BUSCADOR --}}
              </div>
            </div>
        </div>
    </div>
</x-slot>
</x-app-layout>
