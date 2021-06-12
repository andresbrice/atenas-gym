@props(['active'])

@php
$classes = ($active ?? false)
? 'block px-1 py-1 items-center border-b-2 border-red-900 text-base font-medium leading-5 text-red-900
focus:outline-none focus:border-red-900 transition duration-150 ease-in-out'
: 'block px-1 py-1 items-center border-b-2 border-transparent text-base font-medium leading-5 text-gray-300
hover:text-red-900 hover:border-red-900 focus:outline-none focus:text-red-900 focus:border-red-900 transition
duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>