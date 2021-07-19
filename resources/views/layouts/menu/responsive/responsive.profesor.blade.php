<x-responsive-nav-link class="px-3 py-2" :href="route('asistencia.index')" :active="request()->routeIs('asistencia.*')">
  {{ __('Asistencias') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('rutinas.index')" :active="request()->routeIs('rutinas.*')">
  {{ __('Rutinas') }}
</x-responsive-nav-link>

<x-responsive-nav-link class="px-3 py-2" :href="route('cuotas.index')" :active="request()->routeIs('cuotas.*')">
  {{ __('Cuotas') }}
</x-responsive-nav-link>