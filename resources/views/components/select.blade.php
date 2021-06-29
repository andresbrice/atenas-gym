@props(['name'])

<select name="{{ $name }}"
  {{ $attributes->merge(['class' => 'w-28 sm:w-48 block text-gray-700 py-1 px-3 mt-1 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-800 focus:border-red-800']) }}
  required>
  {{ $slot }}
</select>