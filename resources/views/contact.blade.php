@extends('layouts.services')

@section('content')
<h1>Contact</h1>

{!! Form::open(['url' => '/contact']) !!}

  <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('name', '',['class' => 'form-control', 'placeholder' => 'Enter Name'] ) }}
    {{ Form::text('name', 'Name') }}
  </div>
  <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('email', '',['class' => 'form-control', 'placeholder' => 'Enter E-mail'] ) }}
    {{ Form::text('email', 'E-Mail Address') }}
  </div>
  <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('message', '',['class' => 'form-control', 'placeholder' => 'Enter message']) }}
    {{ Form::textarea('message', 'Enter message here') }}
  </div>
  <div>
    {{ Form::submit ('Submit', ['class' => 'btn btn-dark']) }}
  </div>

{!! Form::close() !!}

<div p-2>
@include('inc._terriergif')
<div>

@endsection
