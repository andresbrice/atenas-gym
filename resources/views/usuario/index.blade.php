<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Usuario</u></x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="container h-full mt-5 p-4 bg-white lg:p-12 md:p-10 sm:mx-auto sm:rounded-lg  ">
      <div class="mb-3">
        {{-- BOTON CREAR USUARIO Y BUSCADOR --}}
        <div class="flex justify-between items-center">
          {{-- BOTON--}}
          <a href="{{route('usuario.create')}}" class="w-max md:mr-5">
            <x-button type="button"
              class="bg-red-300 text-red-700 hover:bg-red-700 hover:text-white border-red-600 font-bold">
              {{ __('Register User') }}
            </x-button>
          </a>

          {{-- BUSCADOR --}}
          <x-search>
            @section('action')
            {{route('usuario.index')}}
            @endsection

            @section('opciones')
            <option value=" ">
              Filtrar por...
            </option>

            <option value="userName">
              Usuario
            </option>

            <option value="name">
              Nombre y Apellido
            </option>
            @endsection
          </x-search>
          {{-- FIN BUSCADOR --}}
        </div>
      </div>
      <x-table>
        @section('nombre-columna')
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            id
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            usuario
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            nombre
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            apellido
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            email
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            rol
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            acciones
          </th>
        </tr>
        @endsection


        @section('contenido-filas')
        @forelse ($usuarios as $usuario)
        <tr>
          <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
            {{$usuario->id}}
          </td>

          <td class="px-6 py-4 whitespace-nowrap">
            {{$usuario->userName}}
          </td>

          <td class="px-6 py-4 whitespace-nowrap">
            {{$usuario->name}}
          </td>

          <td class="px-6 py-4 whitespace-nowrap">
            {{$usuario->lastName}}
          </td>

          <td class="px-6 py-4 whitespace-nowrap">
            {{$usuario->email}}
          </td>

          <td class="px-6 py-4 whitespace-nowrap">
            {{$usuario->role->nombre_rol}}
          </td>

          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
            {{-- BOTON EDITAR --}}
            <a href="{{route('usuario.edit',$usuario->id)}}">
              <x-button class="text-white bg-green-800 hover:bg-green-700">Editar</x-button>
            </a>

            {{-- BOTON MOSTRAR --}}
            <div class="mt-6 inline" x-data="{ open: false }">
              <x-button class="text-white bg-yellow-600 hover:bg-yellow-500" @click="open = true">
                Mostrar
              </x-button>

              @include('usuario.infoUser')

            </div>

            {{-- BOTON BORRAR --}}
            <form action="{{route('usuario.destroy',$usuario->id)}}" method="post" class="inline">
              @csrf
              @method('DELETE')

              <x-button class="text-white bg-red-900 hover:bg-red-700"
                onclick="return confirm('¿Quieres borrar este usuario?')">
                Borrar
              </x-button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td>
            <center>
              No se encontró dicho usuario. Intente nuevamente
            </center>
          </td>
        </tr>
        @endforelse
        @endsection
        @section('paginacion')
        <div class="mt-4">
          {{$usuarios->links()}}
        </div>
        @endsection
      </x-table>
    </div>
  </x-slot>
</x-app-layout>