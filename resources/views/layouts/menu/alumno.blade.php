<x-nav-link class="px-3 py-2" :href="route('alumnos.clase')" :active="request()->routeIs('alumnos.clase')">
  {{ __('Clases') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Rutinas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Cuotas') }}
</x-nav-link>

<x-nav-link class="px-3 py-2" {{--:href="route('usuario.index')" :active="request()->routeIs('usuario.index')"--}}>
  {{ __('Asistencias') }}
</x-nav-link>