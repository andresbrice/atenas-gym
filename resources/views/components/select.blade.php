<select
  {{ $attributes->merge(['class' => 'block w-52 text-gray-700 py-1 px-3 mt-1 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-800 focus:border-red-800']) }}>
  {{ $slot }}
</select>