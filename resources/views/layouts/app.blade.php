<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Pet Stop') }}</title>

</head>
<body>
  <div id="app">
      <!-- <title>{{ 'title' }}</title> -->
      <!-- provides navbar on every page -->
    <header class="row">
      @include('inc._navbar')
    </header>

    <div id="display" class="row">
  	@if(Request::is('/'))
      <!-- include showcase only on home page -->
    	 @include('inc._showcase')
    @endif
    </div>

    <div id="topRow" class="row" style="height: 120px; background-color: #145A56; z-index: -1;"></div>

    <div id='leftContainer' class='container d-flex justify-content-start' style="height: 460px:">
      <h1>@yield('title')</h1>

        @yield('content')
    </div>


  </div>

      @include('inc._footer')


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
