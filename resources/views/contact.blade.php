@extends('layouts.services')
@section('content')
<h1>Contact</h1>
<div id="contactForm" class="container-fluid">
<<<<<<< HEAD
<<<<<<< HEAD
{!! Form::open(['url' => '/??????.store']) !!}
=======
{!! Form::open(['url' => '/contact']) !!}
>>>>>>> parent of a5e1e3b... working on yelp api

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
=======
  <form>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="name" class="form-control" id="name" placeholder="Name">
      </div>
    </div>

    <div class="form-group row">
      <label for="email_address" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email-address" class="form-control" id="email_address" placeholder="Email">
      </div>
    </div>

    <div class="form-group row">
      <label for="message" class="col-sm-2 col-form-label">Message</label>
      <div class="col-sm-10">
        <textarea type="text" class="form-control" rows="10" id="message" placeholder="Type message here"></textarea>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10" >
        <button type="submit" class="btn btn-dark m-0 btn" style="center">Submit</button>
      </div>
    </div>

    <div class = "row">
    @include('inc._terriergif')
    </div>
  </form>
>>>>>>> bf61cb8... adds profile page. fixes contact page.
</div>
@endsection
