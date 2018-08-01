@extends('layouts.app')

@section('title', 'Profile')

@section('content')

{!! Form::open(['url' => '/profile']) !!}

  <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('name', '',['class' => 'form-control', 'placeholder' => 'Enter Name'] ) }}
    {{ Form::text('name', 'Name') }}
  </div>
  <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('email', '',['class' => 'form-control', 'placeholder' => 'Enter E-mail'] ) }}
    {{ Form::text('email', 'E-Mail Address') }}
  </div>
  <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('address', '',['class' => 'form-control', 'placeholder' => 'Enter Address'] ) }}
    {{ Form::text('address', 'Address') }}
  </div>
  <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('city', '',['class' => 'form-control', 'placeholder' => 'Enter City'] ) }}
    {{ Form::text('city', 'City') }}
  </div>
    <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
      {{ Form::label('state', '',['class' => 'form-control', 'placeholder' => 'State'] ) }}
      {{ Form::text('state', 'State') }}
    </div>
  <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('zipCode', '',['class' => 'form-control', 'placeholder' => 'zipCode'] ) }}
    {{ Form::text('zipcode', 'Name') }}
  </div>
  <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('num_in_family', '',['class' => 'form-control', 'placeholder' => 'Family Size'] ) }}
    {{ Form::smallint('num_in_family', 'Family Size') }}
  </div>
  <div class="form-group" method="post" action="{{htmlspecialchars($_SERVER["PHP_SELF"])}}">
    {{ Form::label('apt_or_house', '',['class' => 'form-control', 'placeholder' => 'Do you rent an apartment or live in a house?] ) }}
    {{ Form::radio('apt_or_house', 'AptOrHouse') }}
  </div>
    {{ Form::label('yard', '',['class' => 'form-control', 'placeholder' => 'Do you have a fenced yard?] ) }}
    {{ Form::checkbox('yard', 'value', true); }}
  <div>

    <!-- todo: add subform with the following:
          pets_in_family smallint
          pet_photo upload
          pet_breed
          age_of_pet -->

    {{ Form::submit ('Submit', ['class' => 'btn btn-dark']) }}
  </div>

{!! Form::close() !!}

@endsection
