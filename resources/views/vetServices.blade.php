@extends('layouts.services')

@section('content')
<h1>Veterinary Services</h1>
  <div id="vetSearchInput" class="container-fluid" style="width: auto;">
    <div class="form-group">
        <label for="searchZip">ZipCode</label>
        <input type="text" name="zipCode" value="" class="input-sm" placeholder="Zipcode Required" style="width: auto;" v-model='searchZip' required>
        <div>
        <input class="btn btn-secondary m-2" style="color: white;" type="submit" id="submitZip" @click="getVet();">
        <input class="btn btn-secondary m-2" value="Clear" style="color:white;" type="button" id="reloadForm" @click="reloadForm();">
        </div>
    </div>
  </div>

<yelpAPI></yelpAPI>

@endsection
