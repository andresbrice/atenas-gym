<nav x-data="{ open: false }" class="bg-gray-400 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full top-0">
  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">
        <div class="alturaLogo w-1/2 flex-shrink-0 flex items-center bg-black">
          <!-- Logo -->
          <a href="{{ route('dashboard') }}">
            <x-nav-logo />
          </a>
        </div>

        <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
          {{--  Buscador  --}}
        </div>

        <!-- Settings Dropdown -->
        <div class=" hidden sm:flex w-full pt-2 mx-3 content-center justify-end md:w-1/3 md:justify-end">
          <div class="relative inline-block">
            <x-dropdown class="flex justify-end items-end w-48">
              <x-slot name="trigger">
                <button
                  class="flex items-center text-md font-semibold text-red-800 hover:text-red-700 hover:border-gray-300 focus:outline-none focus:text-red-700 focus:border-gray-300 transition duration-150 ease-in-out">
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

        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden">
          <button @click="open = ! open"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 bg-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden ">
      <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
          {{ __('Dashboard') }}
        </x-responsive-nav-link>
      </div>

      <!-- Responsive Settings Options -->
      <div class="pt-4 pb-1 border-t border-gray-200">
        <div class="flex items-center px-4">
          <div class="flex-shrink-0">
            <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>

          <div class="ml-3">
            <div class="font-medium text-base text-gray-800">{{ Auth::user()->userName }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
          </div>
        </div>
        {{-- Sidebar --}}
        <div class="mt-3 space-y-1">
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

<!-- Navigation Links -->
{{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
          <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
</x-nav-link>
<x-nav-link :href="route('usuario.index')" :active="request()->routeIs('usuario.index')">
  {{ __('Gestión Usuario') }}
</x-nav-link>
</div> --}}