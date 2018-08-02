<template>

  <!-- @section('results') -->
  <div class="container">
    <div class="status-section text-center" v-if="showStatus">
        <span v-html="status"></span>
    </div>
    <div class="error-section" v-if="showError">
        <div class="card mb-3 border-dark">
            <div class="card-header bg-danger text-center font-weight-bold border-dark">Error</div>
            <div class="card-body"><span v-html="error"></span></div>
        </div>
    </div>
    <div class="output-section" v-if="showOutput">
        <div class="row">
          <div class="col" style="min-width: 300px;">
              <div class="card mb-3 border-dark">
                  <div class="card-header bg-warning text-center font-weight-bold border-dark">Location</div>
                  <div class="card-body">
                      <h3 v-if="zipCode"><strong>Zipcode:</strong> {{ zipCode }}</h3>
                      <div><strong>Location:</strong> {{ city }}</div>
                      <div><strong>Name:</strong> {{ name }}</div>
                      <div><strong>Age:</strong> {{ age }}</div>
                      <div><strong>Sex:</strong> {{ sex }}</div>
                      <div><strong>Size:</strong> {{ size }}</div>
                      <div><strong>Breed:</strong> {{ breed }}</div>
                      <div><strong>Description:</strong> {{ description }}</div>
                  </div>
              </div>
              <div class="card mb-3 border-dark">
                  <div class="card-header bg-warning text-center font-weight-bold border-dark">Temperature</div>
                    <div class="card-body">
                        <div class="row align-items-center justify-content-center no-gutters">
                            <div class="border border-secondary col text-center pt-3 pb-3">{{ tempK }}</div>
                            <div class="border border-secondary col text-center pt-3 pb-3"><span v-html="tempF"></span></div>
                            <div class="border border-secondary col text-center pt-3 pb-3"><span v-html="tempC"></span></div>
                        </div>
                    </div>
              </div>
            </div>
          </div>
      </div>
  </div>
  <!-- @endsection -->

</template>

<script>

    export default {
        props: ['location', //zipcode
                'animal',  //barnyard, bird, cat, dog, horse, reptile, smallfurry
                'breed', // need to use breeds.list method here
                'size',  // S = small, M = medium, L= Large,  XL = Extra Large
                'sex', // M = male, F = female
                'id', // petfinder ID of pet
                'output'], //how much of pet ID do you want to fetch? id, basic or full. basic will be what I use

        data: function() {
            return {
                showOutput: false,
                id: '',
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
              },
            // getBreed: function(){
            //   //Set up url to fetch breed list
            //   var url = 'http://api.petfinder.com/breed.list';
            //   var animal = document.getElementByID('animal').value;
            //   var breed = document.getElementById('breed').value;
            // },
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
            // catchResponse: function() {
            //     if (this.apiRequest.status.$t === "A") {
            //         var response = JSON.parse(this.apiRequest.responseText);
            //         console.log(response);
            //         this.showError = false;
            //         this.showStatus = false;
            //         this.id = response.it.$t;
            //         this.city = response.city.$t;
            //         this.name = response.name.$t;
            //         this.age = response.age.$t;
            //         this.size = respone.size.$t;
            //         this.breed = response.breed.$t;
            //         this.sex = response.sex.$t;
            //         this.description = response.description.$t;
            //         this.showOutput = true;
            //     }
            //     else {
            //         this.showError = true;
            //         this.showStatus = false;
            //         this.showOutput = false;
            //         this.error = '<h3 v-if="zipCode"><strong>ZipCode:</strong> ' + this.zipcode + '</h3>' + this.apiRequest.statusText;
            //     }
            //   },
            // displayImage: function(id) {
            //   var img = response.petfinder.pet.media.photos.photo[0].$t;
            //   var newImg = document.createElement('img');
            //   newImg.src = img;
            //
            //   var list = document.createElement("div");
            //   list.setAttribute("id", "List");
            //   document.body.appendChild(list);
            //
            //   list.appendChild(newImg);
            // }
        }
    };

</script>
