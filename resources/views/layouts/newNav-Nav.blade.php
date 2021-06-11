<nav class="bg-gray-600 fixed w-full z-20 top-0">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <!-- Hamburger -->
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <button id="btn-mobile" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 focus:text-gray-300 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.
  
              Heroicon name: outline/menu
  
              Menu open: "hidden", Menu closed: "block"
            -->
            <svg id="btn-hambur" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
              Icon when menu is open.
  
              Heroicon name: outline/x
  
              Menu open: "block", Menu closed: "hidden"
            -->
            <svg id="btn-equis" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>

          <script>
            window.addEventListener('DOMContentLoaded', () => {
              const btnMobile = document.querySelector('#btn-mobile')
              const mobileMenu = document.querySelector('#mobile-menu')

              btnMobile.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('flex');
              })
            });
          </script>

        </div>
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0 flex items-center">
            <a href="{{route('dashboard')}}">
              {{-- img Icono Atenas Gym --}}
            <x-application-logo class="block lg:hidden h-8 w-auto"/>

              {{-- img Atenas Gym --}}
              <x-nav-logo class="hidden lg:block h-8 w-auto" />
            </a>
          </div>

          <!-- Sidebar -->
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">

              @include('layouts.side-bar')

            </div>
          </div>

        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

          <!-- Profile dropdown -->
          <div class="ml-3 relative hidden md:flex">
            <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                  <button class="flex items-center text-sm font-bold text-red-900 hover:text-red-800 focus:outline-none focus:text-red-800 transition duration-150 ease-in-out">
                      <div>{{ Auth::user()->userName }}</div>

                      <div class="ml-1">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
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

                      <x-dropdown-link :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                          {{ __('Log Out') }}
                      </x-dropdown-link>
                  </form>
              </x-slot>
            </x-dropdown>

            {{-- <div>
              <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </button>
            </div>
  
            <!--
              Dropdown menu, show/hide based on menu state.
  
              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="bg-gray-600 hidden sm:hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1 w-full">
        <x-perfil />

        <div class="ml-2">
          @include('layouts.side-bar')
        </div>

        <form class="w-44 border-t-2 border-gray-700" method="POST" action="{{ route('logout') }}">
          @csrf

          <a class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 mt-1.5 text-base font-medium" 
            :href="route('logout')"
              onclick="event.preventDefault();
                this.closest('form').submit();">
            Cerrar sesión
          </a>
      </form>
      </div>
    </div>
  </nav>