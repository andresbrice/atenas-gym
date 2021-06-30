<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Asistencias') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('clase.index')" :active="request()->routeIs('clase.*')">
  {{ __('Clases') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Rutinas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('ejercicio.index')" :active="request()->routeIs('ejercicio.index')">
  {{ __('Ejercicios') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('usuario.index')" :active="request()->routeIs('usuario.*')">
  {{ __('Usuarios') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Cuotas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('tarifa.index')" :active="request()->routeIs('tarifa.index')">
  {{ __('Tarifas') }}
</x-nav-link>
<x-nav-link class="px-3 py-2" :href="route('horario.index')" :active="request()->routeIs('horario.*')">
  {{ __('Horarios') }}
</x-nav-link>