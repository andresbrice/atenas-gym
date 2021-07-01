<x-responsive-nav-link class="px-3 py-2"
  {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Asistencias') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('clase.index')" :active="request()->routeIs('clase.index')">
  {{ __('Clases') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2"
  {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Rutinas') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2"
  {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Ejercicios') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('usuario.index')" :active="request()->routeIs('usuario.index')">
  {{ __('Usuarios') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2"
  {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Cuotas') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2"
  {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Tarifas') }}
</x-responsive-nav-link>
<x-responsive-nav-link class="px-3 py-2" :href="route('horario.index')" :active="request()->routeIs('horario.index')">
  {{ __('Horarios') }}
</x-responsive-nav-link>