<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Asistencias') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('clase.index')" :active="request()->routeIs('clase.*')">
  {{ __('Clases') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('rutina.index')" :active="request()->routeIs('rutina.index')">
  {{ __('Rutinas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Ejercicios') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" :href="route('usuario.index')" :active="request()->routeIs('usuario.*')">
  {{ __('Usuarios') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Cuotas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Tarifas') }}
</x-nav-link>
<x-nav-link class="px-3 py-2" :href="route('horario.index')" :active="request()->routeIs('horario.*')">
  {{ __('Horarios') }}
</x-nav-link>