{{-- <nav class="sticky top-0  bg-gray-900">
  <div class="max-w-7xl  mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">

      {{--Logo y botones de navegación
      <div class="flex items-center">
        <div class="flex-shrink-0 lg:mr-4 sm:-mr-1">
          <a href="{{route('dashboard')}}">
{{-- logo solo
            <x-application-logo class="block lg:hidden h-8 w-auto" />

            {{-- logo + Atenas Gym 
            <x-nav-logo class="hidden lg:block h-8 w-auto" />
          </a>
        </div>
         Botones de navegación lg
        <div class="hidden md:block">
          <div class="flex items-baseline space-x-1 ml-10 sm:ml-2 sm:space-x-0">
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

      <!-- Dropdown de Perfil
      <div class="hidden md:block justify-items-end">
        <div class="ml-4 flex items-center md:ml-6">
          <x-dropdown class="relative" align="right" width="48"
            contentClasses="bg-gray-200 rounded-md ring-1 ring-red-900">
            <x-slot name="trigger">
              <button
                class="flex items-center text-md font-semibold text-red-800 hover:text-red-700 focus:outline-none focus:text-red-700 transition duration-150 ease-in-out">
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

<!-- Menú hamburguesa 
      <div class="-mr-1 flex md:hidden">
        <button x-on:click="open = !open" type="button"
          class="bg-gray-900 inline-flex items-center justify-center p-2 focus:outline-none text-gray-400 hover:text-red-800"
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

  <!-- Menu celulares 
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
          <div class="text-md font-medium leading-none text-red-700">{{ Auth::user()->userName }}</div>
          <div class="text-xs font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
        </div>

      </div>
      <div class="mt-3 px-1 space-y-1">
        <x-dropdown-link href="#">
          {{ __('Perfil') }}
        </x-dropdown-link>

        <!-- Authentication 
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-dropdown-link>
        </form>
      </div>
    </div>
  </div>
</nav> --}}

<nav class="bg-gray-900">
  <!-- Primary Navigation Menu -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="flex justify-between h-16">
    <div class="flex">
      <!-- Logo -->
      <div class="flex-shrink-0 flex items-center">
        <a href="{{route('dashboard')}}">
          {{-- logo solo--}}
          <x-application-logo class="block xl:hidden h-8 w-auto" />

          {{-- logo + Atenas Gym --}}
          <x-nav-logo class="hidden xl:block h-8 w-auto" />
        </a>
      </div>

      <!-- Navigation Links -->
      <div class="hidden space-x-2 md:-my-px md:ml-10 lg:flex">
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

    <!-- Settings Dropdown -->
    <div class="hidden lg:flex lg:items-center lg:ml-6">
      <x-dropdown align="right" width="48">
        <x-slot name="trigger">
          <button
            class="flex items-center text-md font-semibold text-red-800 hover:text-red-700 focus:outline-none focus:text-red-700 transition duration-150 ease-in-out">
            <div>{{ Auth::user()->name }}</div>

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

    <!-- Hamburger -->
    <div class="-mr-2 flex items-center lg:hidden">
      <button @click="open = ! open"
        class="inline-flex items-center justify-center p-2 rounded-md focus:outline-none text-gray-400 hover:text-red-800 transition duration-150 ease-in-out">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
          <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
            stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
</div>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
  <div class="pt-2 pb-3 space-y-1">
    @switch(Auth::user()->role_id)
    @case(1)
    @include('layouts.menu.responsive.responsive-alumno')
    @break
    @case(2)
    @include('layouts.menu.responsive.responsive-profesor')
    @break
    @case(3)
    @include('layouts.menu.responsive.responsive-admin')
    @break
    @default
    @break
    @endswitch
  </div>

  <!-- Responsive Settings Options -->
  <div class="pt-4 pb-1 border-t border-gray-200">
    <div class="px-4">
      <div class="font-medium text-base text-red-700">{{ Auth::user()->name }}</div>
      <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
    </div>

    <div class="mt-3 space-y-1">
      <x-responsive-nav-link href="{{route('usuario.show',Auth::user()->id)}}">
        {{ __('Profile') }}
      </x-responsive-nav-link>
      <!-- Authentication -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                          this.closest('form').submit();">
          {{ __('Log Out') }}
        </x-responsive-nav-link>
      </form>
    </div>
  </div>
</div>
</nav>