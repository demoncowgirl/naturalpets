@extends('layouts.services')

@section('content')
<h1>Contact</h1>
<div id="contactForm" class="container">
{!! Form::open(['url' => '/contact']) !!}

  <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('name', '',['class' => 'form-control', 'placeholder' => 'Enter Name'] ) }}
    {{ Form::text('name', 'Name', ['class' => 'form-input']) }}
  </div>
  <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('email', '',['class' => 'form-control', 'placeholder' => 'Enter E-mail'] ) }}
    {{ Form::text('email', 'E-Mail Address', ['class' => 'form-input']) }}
  </div>
  <div class="form-group mb-0" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('message', '',['class' => 'form-control', 'placeholder' => 'Enter message']) }}
    {{ Form::textarea('message', 'Enter message here') }}
  </div>
  <div>
      <!-- {{ Form::submit ('Submit', ['class' => 'btn btn-dark m-0']) }} -->
      {{ Form::submit ('Submit', ['class' => 'btn btn-dark m-0 btn disabled', 'disabled' => true]) }}
  </div>

{!! Form::close() !!}
<div class = "row">
@include('inc._terriergif')
</div>
@endsection
