<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <a href="{{route('usuario.index')}}">Gestión Usuario</a> / <u>Crear
        Usuario</u>
    </x-breadcrumb>
  </x-slot>


  <x-slot name="slot">
    <div class="mt-5 sm:mt-0  max-w-7xl mx-auto">
      <div class="md:flex md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <!-- Validation Errors -->
          <x-auth-validation-errors class=" mt-5" :errors="$errors" />

          <form action="{{ route('usuario.store') }}" method="POST">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="userName" :value="__('User Name')" class="font-semibold" />
                    <x-input id="userName" class="block w-full px-4 py-2 mt-2" type="text" name="userName"
                      :value="old('userName')" required autofocus />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="email" :value="__('Email')" class="font-semibold" />
                    <x-input id="email" class="block w-full px-4 py-2 mt-2" type="email" name="email"
                      :value="old('email')" required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="dni" :value="__('DNI')" class="font-semibold" />
                    <x-input id="dni" class="block w-full px-4 py-2 mt-2" type="text" name="dni" :value="old('dni')"
                      required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="name" :value="__('Name')" class="font-semibold" />
                    <x-input id="name" class="block w-full px-4 py-2 mt-2" type="text" name="name" :value="old('name')"
                      required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="lastName" :value="__('Last Name')" class="font-semibold" />
                    <x-input id="lastName" class="block w-full px-4 py-2 mt-2" type="text" name="lastName"
                      :value="old('lastName')" required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="gender" :value="__('gender')" class="font-semibold" />
                    <select id="gender"
                      class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300"
                      name="gender" required>
                      <option hidden value="">
                        - Seleccionar Género -
                      </option>
                      <option value="Masculino">
                        Masculino
                      </option>
                      <option value="Femenino">
                        Femenino
                      </option>
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="age" :value="__('Age')" class="font-semibold" />
                    <x-input id="age" class="block w-full px-4 py-2 mt-2" type="text" name="age" :value="old('age')"
                      required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="phone" :value="__('Phone')" class="font-semibold" />
                    <x-input id="phone" class="block w-full px-4 py-2 mt-2" type="text" name="phone"
                      :value="old('phone')" required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="emergency_number" :value="__('Emergency Number')" class="font-semibold" />
                    <x-input id="emergency_number" class="block w-full px-4 py-2 mt-2" type="text"
                      name="emergency_number" :value="old('emergency_number')" required />
                  </div>
                  <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <x-label for="roles" :value="__('Role')" class="font-semibold" />

                    <select id="roles"
                      class="block w-full px-2 py-2 mt-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-300 focus:border-red-300"
                      name="role_id" required>
                      <option hidden value="">
                        - Seleccionar Rol -
                      </option>
                      @foreach ($roles as $role)
                      <option value="{{$role->id}}">
                        {{$role->nombre_rol}}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="my-3">
                  <div class="inline grid-cols-6 space-x-2 gap-6 ">

                    <x-label for="historial_medico" :value="__('Historial Médico')"
                      class="text-xl px-2 font-semibold" />
                    <label for="eRespiratorias" class="inline-flex items-center">
                      <input id="eRespiratorias" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="eRespiratorias" value="eRespiratorias">
                      <span class="ml-2 text-sm text-gray-600">{{ __('E. Respiratorias') }}</span>
                    </label>

                    <label for="eCardiacas" class="inline-flex items-center">
                      <input id="eCardiacas" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="eCardiacas" value="" eCardiacas>
                      <span class="ml-2 text-sm text-gray-600">{{ __('E. Cardíacas') }}</span>
                    </label>

                    <label for="eRenal" class="inline-flex items-center">
                      <input id="eRenal" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="eRenal" value="eRenal">
                      <span class="ml-2 text-sm text-gray-600">{{ __('E. Renales') }}</span>
                    </label>

                    <label for="convulsiones" class="inline-flex items-center">
                      <input id="convulsiones" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="convulsiones" value="convulsiones">
                      <span class="ml-2 text-sm text-gray-600">{{ __('Convulsiones') }}</span>
                    </label>

                    <label for="epilepsia" class="inline-flex items-center">
                      <input id="epilepsia" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="epilepsia" value="epilepsia">
                      <span class="ml-2 text-sm text-gray-600">{{ __('Epilepsia') }}</span>
                    </label>

                    <label for="diabetes" class="inline-flex items-center">
                      <input id="diabetes" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="diabetes" value="diabetes">
                      <span class="ml-2 text-sm text-gray-600">{{ __('Diabetes') }}</span>
                    </label>

                    <label for="asma" class="inline-flex items-center">
                      <input id="asma" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="asma" value="asma">
                      <span class="ml-2 text-sm text-gray-600">{{ __('Asma') }}</span>
                    </label>

                    <label for="alergia" class="inline-flex items-center">
                      <input id="alergia" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="alergia" value="alergia">
                      <span class="ml-2 text-sm text-gray-600">{{ __('Alergias') }}</span>
                    </label>

                    <label for="medicacion" class="inline-flex items-center">
                      <input id="medicacion" type="checkbox"
                        class="rounded border-gray-300 text-red-900 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                        name="medicacion" value="medicacion">
                      <span class="ml-2 text-sm text-gray-600">{{ __('Medicación') }}</span>
                    </label>
                  </div>{{--/div historial medico--}}
                </div>
                <div class="px-4 py-2 bg-gray-50 flex items-center justify-between sm:px-6">
                  <a href="{{ route('usuario.index') }}">
                    <x-button type="button" class="bg-gray-600">
                      {{ __('Back') }}
                    </x-button>
                  </a>

                  <x-button
                    class="ml-3 bg-red-400 text-red-800 hover:bg-red-700 hover:text-white border-red-800 font-bold">
                    {{ __('Register User') }}
                  </x-button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>


{{-- <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div> --}}