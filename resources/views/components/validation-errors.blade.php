@props(['errors'])

@if ($errors->any())
<div {{ $attributes }}>
  <div class="font-normal text-red-600">
    {{ __('Whoops! Something went wrong.') }}
  </div>

  <ul class="grid grid-cols-3 mt-2 list-disc list-inside text-xs text-red-600">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>

</div>
@endif