@extends('layouts.app')

    <div id='leftContainer' class='container d-flex justify-content-start' style="height: 460px:">
      <h1>@yield('title')</h1>

        @yield('content')
    </div>
