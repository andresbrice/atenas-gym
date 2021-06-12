<nav class="bg-gray-600" x-data="{ open: false }">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">

      {{--Logo y botones de navegación--}}
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <a href="{{route('dashboard')}}">
            {{-- logo solo--}}
            <x-application-logo class="block lg:hidden h-8 w-auto" />

            {{-- logo + Atenas Gym --}}
            <x-nav-logo class="hidden lg:block h-8 w-auto" />
          </a>
        </div>
        <!-- Botones de navegación lg-->
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-1 sm:ml-1">
            @switch(Auth::user()->role_id)
            @case(1)
            @include('layouts.menu.alumno')
            @break
            @case(2)
            @include('layouts.menu.profesor')
            @break
            @case(3)
            @include('layouts.menu.administrador')
            @break
            @default
            @break
            @endswitch
          </div>
        </div>
      </div>

      <!-- Dropdown de Perfil TERMINADO-->
      <div class="hidden md:block">
        <div class="ml-4 flex items-center md:ml-6">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button
                class="flex items-center text-sm font-bold text-red-900 hover:text-red-800 focus:outline-none focus:text-red-800 transition duration-150 ease-in-out">
                <div>{{ Auth::user()->userName }}</div>

                <div class="ml-1">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
              </button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-link href="#">
                {{ __('Perfil') }}
              </x-dropdown-link>

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                  {{ __('Log Out') }}
                </x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>
        </div>
      </div>

      <!-- Menú hamburguesa -->
      <div class="-mr-1 flex md:hidden">
        <button x-on:click="open = ! open" type="button"
          class="bg-gray-600 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-red-800"
          aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Abrir Menú Principal</span>

          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>

          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Menu celulares -->
  <div class="md:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false">
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      @switch(Auth::user()->role_id)
      @case(1)
      @include('layouts.menu.alumno')
      @break
      @case(2)
      @include('layouts.menu.profesor')
      @break
      @case(3)
      @include('layouts.menu.administrador')
      @break
      @default
      @break
      @endswitch
    </div>
    <div class="pt-4 pb-3 border-t border-gray-700">
      <div class="flex items-center px-2">

        <div class="ml-3">
          <div class="text-base font-medium leading-none text-white">{{ Auth::user()->userName }}</div>
          <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
        </div>

      </div>
      <div class="mt-3 px-2 space-y-1">
        <x-dropdown-link href="#">
          {{ __('Perfil') }}
        </x-dropdown-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-dropdown-link>
      </div>
    </div>
  </div>
</nav>