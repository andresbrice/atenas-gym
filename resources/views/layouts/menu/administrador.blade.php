<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

<x-nav-link class="px-3 py-2" :href="route('asistencia.index')" :active="request()->routeIs('asistencia.index')">
  {{ __('Asistencias') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('clase.index')" :active="request()->routeIs('clase.index')">
  {{ __('Clases') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Rutinas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Ejercicios') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('usuario.index')" :active="request()->routeIs('usuario.index')">
  {{ __('Usuarios') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Cuotas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Tarifas') }}
</x-nav-link>
<x-nav-link class="px-3 py-2" :href="route('horario.index')" :active="request()->routeIs('horario.index')">
  {{ __('Horarios') }}
</x-nav-link>