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
  <link rel="stylesheet" href="{{ asset('cssPropio/estiloSize.css') }}">
  <link rel="shortcut icon" href="{{asset('img/favicon/favicon.ico')}}" type="image/x-icon">


  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>

  <!--Font Awesome-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
  </script>


</head>

<body class="font-sans antialiased bg-gray-200 leading-normal tracking-normal" x-data="{ open: false }"
  :class="open ? 'overflow-hidden' : 'overflow-visible'">
  {{-- Nav --}}
  @include('layouts.navigation')

  <div class="flex flex-col md:flex-row">


    <div class="altura90 main-content flex-1 bg-gray-200">

      <div class="bg-gradient-to-r from-red-900 to-gray-900 p-2 shadow text-md md:text-lg text-gray-100">
        <div class="container mx-auto">
          {{$breadcrumb}}
        </div>
      </div>

      <div style="height: 80vh;" class="flex flex-wrap items-center">
        <div class=" container h-full mx-auto flex justify-center items-center">
          {{ $slot }}
        </div>
      </div>

      <x-footer />

    </div>
  </div>

</body>

</html>