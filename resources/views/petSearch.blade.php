@extends('layouts.app')

@section('title', 'Pet Search')

@section('content')
  <div class="form-group">
    <label for="location">ZipCode</label>
      <input type="text" name="zipCode" value="" class="form-control">

    <label for="animal">Animal Type</label>
      <select name="animal">
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="bird">Bird</option>
        <option value="horse">Horse</option>
        <option value="barnyard">Barnyard</option>
        <option value="reptile">Reptile</option>
        <option value="smallfurry">Small Furry</option>
      </select>

      <label for="breed">Breed</label>
      <!-- how do i bring up breed list here -->

      <!-- todo: add approximate weight to size labels -->
      <label for="size">Size</label>
        <select name="size">
          <option value="S">Small</option>
          <option value="M">Medium</option>
          <option value="L">Large</option>
          <option value="XL">Extra Large</option>
        </select>

      <label for="sex">Animal Type</label>
        <select name="sex">
          <option value="M">Male</option>
          <option value="F">Female</option>
        </select>
    </div>
@endsection

<!-- @section('results')

search results go here....

@endsection -->
