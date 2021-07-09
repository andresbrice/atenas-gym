<x-app-layout>

  <x-slot name="breadcrumb">
    <x-breadcrumb><a href="/">Dashboard</a> / <u>Perfil</u>
    </x-breadcrumb>
  </x-slot>

  <x-slot name="slot">
    <div class="mt-5 sm:mt-0  max-w-7xl mx-auto">
      <div class="md:flex md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <!-- Validation Errors -->
          <x-auth-validation-errors class=" mt-5" :errors="$errors" />

          <form method="POST" action="{{route('usuario.update',auth()->id())}}">
            @csrf
            @method('PUT')
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-2 gap-4">
                  <!-- Email -->
                  {{-- col-span-6 sm:col-span-6 lg:col-span-2 --}}
                  <div class="col-span-6 md:col-span-2">
                    <x-label for="email" :value="__('Email')" class="font-semibold" />
                    <x-input id="email" class="block w-full px-4 py-2 mt-2" type="email" name="email"
                      value="{{old('email', auth()->user()->email)}}" required />
                  </div>
                  <!-- Password -->
                  <div class="col-span-6 md:col-span-1">
                    <x-label for="password" :value="__('Password')" class="font-semibold" />
                    <x-input id="password" class="block w-full px-4 py-2 mt-2" type="password" name="password" required
                      autocomplete="new-password" />
                  </div>
                  <!-- Confirm Password -->
                  <div class="col-span-6 md:col-span-1">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" class="font-semibold" />
                    <x-input id="password_confirmation" class="block w-full px-4 py-2 mt-2" type="password"
                      name="password_confirmation" required />
                  </div>
                  <!-- Teléfono -->
                  <div class="col-span-6 md:col-span-1">
                    <x-label for="phone" :value="__('Phone')" class="font-semibold" />
                    <x-input id="phone" class="block w-full px-4 py-2 mt-2" type="text" name="phone"
                      value="{{old('phone', auth()->user()->phone)}}" required />
                  </div>
                  <!-- Teléfono Emergencia -->
                  <div class="col-span-6 md:col-span-1">
                    <x-label for="emergency_number" :value="__('Teléfono de emergencia')" class="font-semibold" />
                    <x-input id="emergency_number" class="block w-full px-4 py-2 mt-2" type="text"
                      name="emergency_number" value="{{old('emergency_number', auth()->user()->emergency_number)}}"
                      required />
                  </div>
                </div>
                <!-- Botón Editar -->
                <div class="px-4 py-2  flex items-center justify-between sm:px-6">
                  <a href="{{ route('clase.index') }}">
                    <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
                      {{ __('Back') }}
                    </x-button>
                  </a>

                  <x-button class="ml-3 bg-green-900 hover:bg-green-700">
                    {{ __('Edit Profile') }}
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