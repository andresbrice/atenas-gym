<x-app-layout>
  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{ route('clase.index') }}">Gestión Clase</a> / <u>Alumnos</u>
    </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="block md:flex py-2 xl:py-6">
      <x-auth-session-status class="mb-4 font-bold flex justify-center" :status="session('status')" />
      <div class="flex-1">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
              <x-table>
                @section('nombre-columna')
                <h1 class="text-center">Listado de Alumnos</h1>
                <tr>
                  <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    usuario
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    nombre
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    apellido
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    acciones
                  </th>
                </tr>
                @endsection

                @section('contenido-filas')
                @forelse ($alumnos as $alumno)
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    {{ $alumno->userName }}
                  </td>

                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    {{ $alumno->name }}
                  </td>

                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    {{ $alumno->lastName }}
                  </td>

                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    {{-- BOTON EDITAR --}}
                    <a href="#">
                      <x-button class=" text-white bg-yellow-600 hover:bg-yellow-700">
                        Seleccionar
                      </x-button>
                    </a>
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
                  {{ $alumnos->links() }}
                </div>
                @endsection

              </x-table>
            </div>
          </div>
        </div>
      </div>

      <div class="flex-1">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">
              {{-- aca van los alumnos que estan en la clase --}}
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, aliquam ex totam inventore dolor
              quas hic itaque natus! Consequuntur a mollitia accusantium. Molestias voluptas natus soluta non
              consequuntur aspernatur perferendis dolor, provident aut ex sint et facilis unde corporis omnis
              perspiciatis dignissimos ratione sapiente officiis harum, fugiat commodi mollitia iste! Ex ad nisi commodi
              quis totam praesentium alias odio deleniti iure corrupti voluptate officia atque, nihil amet pariatur. Cum
              adipisci perspiciatis veritatis explicabo, non molestias magni voluptas recusandae? Inventore
              exercitationem provident omnis, voluptatum, est minima temporibus ipsa atque laudantium, non quos eius
              accusantium labore eveniet? Quis, tenetur officiis sit veniam expedita aliquid pariatur impedit,
              repellendus repudiandae dicta enim dolore, aut facilis aspernatur eligendi. Aut dolore tenetur ab modi
              officia earum cum velit neque ipsum esse corrupti laudantium laboriosam, aliquid nobis eaque atque
              quibusdam reiciendis dolorem inventore hic quisquam minima aliquam! Deserunt expedita doloremque molestias
              reprehenderit aut, corporis iste tenetur harum provident fugit, ullam unde iusto accusamus. Voluptatum
              nihil maxime nemo nam, impedit quod debitis nisi itaque aliquid harum aspernatur ut deleniti iusto ullam
              officia alias dolorum quibusdam dicta nobis. Delectus sit, tempora minima iure dignissimos, architecto
              numquam, libero minus officiis similique molestias quod quos. Facilis rem veniam perspiciatis esse
              numquam!
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>