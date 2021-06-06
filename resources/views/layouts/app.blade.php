<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Atenas GYM') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/cssPropio/estiloSize.css') }}">
  <link rel="shortcut icon" href="{{asset('img/favicon/favicon.ico')}}" type="image/x-icon">


  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>

  <!--Font Awesome-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
  </script>


</head>

<body class="font-sans antialiased bg-gray-400 leading-normal tracking-normal mt-12">
  {{-- Nav --}}
  @include('layouts.navigation')

  <div id="contenedor-sinNav" class="flex flex-col md:flex-row">

    @include('layouts.side-bar')

    <div class="altura90 main-content flex-1 bg-gray-200 mt-12 md:mt-2 pb-24 md:pb-5">

      <div class="bg-gray-400 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-red-900  to-gray-400 p-4 shadow text-2xl text-gray-100">
          {{$breadcrumb}}
        </div>
      </div>

      <div class="flex flex-wrap altura90por">{{--class="flex flex-wrap"--}}
        <div class="container mx-auto py-2">
          {{ $slot }}
        </div>
      </div>

      <x-footer />

    </div>
  </div>
</body>

</html>