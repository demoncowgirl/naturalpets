@extends('layouts.app')
<html>
  <div>
    <div id='leftContainer' class='container d-flex flex-column justify-content-start'>
      <head>
      @yield('title')
    </head>
    <body>
      @yield('content')
    </body>
    </div>
  </div>
</html>
