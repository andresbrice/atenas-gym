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
  {{-- <link rel="stylesheet" href="{{ asset('cssPropio/estiloSize.css') }}"> --}}
  <link rel="shortcut icon" href="{{asset('img/favicon/favicon.ico')}}" type="image/x-icon">

  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
    integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>






  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> --}}
  {{-- <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}"> --}}

  <!-- Scripts -->
  {{-- <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script> --}}
  <script src="{{ asset('js/app.js') }}"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --}}

  <!--Font Awesome-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
  </script>


</head>

<body class="font-sans antialiased" x-data="{ open: false }" :class="open ? 'overflow-hidden' : 'overflow-visible'">

  <div class="min-h-screen flex flex-col bg-gray-200">
    @include('layouts.navigation')

    <header class="bg-gradient-to-r from-red-900 to-gray-900 shadow">
      <div class="max-w-7xl mx-auto p-2 text-gray-100 sm:px-6 lg:px-8">
        {{ $breadcrumb }}
      </div>
    </header>

    <main class="flex flex-auto flex-col justify-center">
      {{ $slot }}
    </main>
    <x-footer />
  </div>
</body>

</html>