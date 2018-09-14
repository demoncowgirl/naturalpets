@extends('layouts.services')
@section('content')
<h1>Contact</h1>
<div id="contactForm" class="container-fluid" >
  <form action=/inputMessages method="post">
    {{csrf_field()}}
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
          @if (session('status'))
        <div class="alert alert-success" role="alert">
        {{ session('status') }}
        </div>
        @endif
    </div>
    </div>
    <div class = "row">
    @include('inc._terriergif')
    </div>
  </form>
</div>
@endsection
