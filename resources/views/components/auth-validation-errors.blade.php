@props(['errors'])

@if ($errors->any())
<div {{ $attributes }}>
  <div class="font-medium text-red-600">
    {{ __('Whoops! Something went wrong.') }}
  </div>

  <ul class="list-disc list-inside grid grid-cols-2 text-sm text-red-600">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>

</div>
@endif