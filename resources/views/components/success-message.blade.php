{{-- auth-session-status --}}

@if (session('message'))
<div {{ $attributes }}>
  <div class="font-normal text-green-600">
    {{ __('Success') }}
  </div>

  <ul class="grid grid-cols-3 mt-2 list-disc list-inside text-xs text-green-600">
    {{session('message')}}
  </ul>

</div>
@endif