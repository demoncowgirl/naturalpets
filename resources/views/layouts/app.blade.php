<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Pet Stop') }}</title>

</head>
<body>

    <div id="app">
      <!-- <title>{{ 'title' }}</title> -->
      <!-- provides navbar on every page -->
      @include('inc._navbar')

    	@if(Request::is('/'))
        <!-- include showcase only on home page -->
      	 @include('inc._showcase')
      @endif

      @include('inc._footer')
      </div>
      @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

<body>
