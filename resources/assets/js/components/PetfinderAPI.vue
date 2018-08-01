<template>

  @section('results')
  //format to return results
  <div class="container">
		<h1>Look who we found for you!</hi>

  <div>

  @endsection

</template>

<script>
    // import { convertKtoF, convertKtoC } from '../utils';

    export default {
        props: ['location', //zipcode
                'animal',  //barnyard, bird, cat, dog, horse, reptile, smallfurry
                'breed', // need to use breeds.list method here
                'size',  // S = small, M = medium, L= Large,  XL = Extra Large
                'sex', // M = male, F = female
                'shelterID', //ID of shelter pet is located at
                'output'], //how much of pet ID do you want to fetch? id, basic or full. basic will be what I use

        data: function() {
            return {
                showOutput: false,
                city: '',
                name: '',
                age: '',
                size: '',
                breed: '',
                description: '',
                showError: false,
                error: '',
                showStatus: true,
                status: '<h1>Fetching a list of your potential adoptees...</h1>',
                apiRequest: null,
                apiKey: "d37c684a8dee07c9424f59462cfd9f15"
            }
        },
        methods: {
            getPet: function(location) {
                // Set up url for fetching adoptable pet data.
                var url = 'http://api.petfinder.com/pet.getRandom';
                var apiKey = 'd37c684a8dee07c9424f59462cfd9f15'; //petfinder api key
                var secret = 'e44ea7e83d9bf772aebb3e512bbf4628'; //petfinder secret
                var cross_origin = '&output=basic&format=json&callback=?' //added to end for cross-origin request

            getBreed: function(){
              //Set up url to fetch breed list
              var url = 'http://api.petfinder.com/breed.list';
              var animal = document.getElementByID('animal').value;
              var breed = document.getElementById('breed').value;
            },

            getPet: function bindButtons(){
                //Set up url to fetch individual pet ID
                var url = 'http://api.petfinder.com/pet.getRandom';
                document.getElementById('submitZip').addEventListener('click', function(event){
            		event.preventDefault();
                // input from form
                var zipCode = document.getElementByID('location').value;
                var animal = document.getElementByID('animal').value;
                var breed = document.getElementById('breed').value;
                var size = document.getElementById('size').value;
                var sex = document.getElementById('sex').value;
                var shelterID = document.getElementById('shelterID').value;
                var output = document.getElementById('output').value; //needs to be set to basic as preventDefault

                var url = "http://api.petfinder.com/pet.getRandom?key=<apiKey>&animal=<animal>&breed=<breed>&size=<size>&sex=<sex>&shelterID=<shelterID>&output=basic<cross-origin>";

                url = url.replace("<apiKey>", this.apiKey);
                // Code that fetches data from the API URL and stores it in results.
                this.apiRequest = new XMLHttpRequest();
                this.apiRequest.onload = this.catchResponse;
                this.apiRequest.onerror = this.httpRequestOnError;
                this.apiRequest.open('get', url, true);
                this.apiRequest.send();
            },
            // httpRequestOnError: function() {
            //     this.locationDenied();
            // },
            catchResponse: function() {
                if (this.apiRequest.status.$t === "A") {
                    var response = JSON.parse(this.apiRequest.responseText);
                    console.log(response);
                    this.showError = false;
                    this.showStatus = false;
                    this.city = response.city.$t;
                    this.name = response.name.$t;
                    this.age = response.age.$t;
                    this.size = respone.size.$t;
                    this.breed = response.breed.$t;
                    this.sex = response.sex.$t;
                    this.description = response.description.$t;

                    // this.displayImage(convertKtoF(response.main.temp));
                    this.showOutput = true;
                }
                else {
                    this.showError = true;
                    this.showStatus = false;
                    this.showOutput = false;
                    this.error = '<h3 v-if="zipcode"><strong>Zipcode:</strong> ' + this.zipcode + '</h3>' + this.apiRequest.statusText;
                }
            },
            displayImage: function(shelterID) {
              var img = response.petfinder.pet.media.photos.photo[0].$t;
              var newImg = document.createElement('img');
              newImg.src = img;

              var list = document.createElement("div");
              list.setAttribute("id", "List");
              document.body.appendChild(list);

              list.appendChild(newImg);
            }
        }
    }

</script>

<style>

<style>
