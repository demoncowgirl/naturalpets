<template>
  <!-- input form for pet search -->
  <div id="petSearchInput" class="container">
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

          <!-- <label for="breed">Breed</label> -->
          <!-- how do i bring up breed list here -->

        <label for="age">Age</label>
          <select name="age">
            <option value = ''>Any</option>
            <option value = "Baby">Baby</option>
            <option value="Young">Young</option>
            <option value="Adult">Adult</option>
            <option value="Senior">Senior</option>
          </select>

          <!-- todo: add approximate weight to size labels -->
          <label for="size">Size</label>
            <select name="size">
              <option value = ''>Any</option>
              <option value="S">Small</option>
              <option value="M">Medium</option>
              <option value="L">Large</option>
              <option value="XL">Extra Large</option>
            </select>

          <label for="sex">Animal Type</label>
            <select name="sex">
              <option value = ''>Any</option>
              <option value="M">Male</option>
              <option value="F">Female</option>
            </select>
          <input type="submit" id="submitZip">
      </div>

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
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

</template>

<script>

 export default {
   mounted(){
     console.log('DERP!!')
   },
   // from input form
          // props: [
          //   'zipCode',
          //   'location',
          //   'animal',
          //   'breed',
          //   'size',
          //   'sex'
          // ],
          // retrieved from API
        data: function() {
            return {
                showOutput: false,
                status:'A',
                zipCode: '',
                city:'',
                id: '',
                name: '',
                size: '',
                age: '',
                sex:'',
                breed: '',
                sex: '',
                output: 'basic',
                description: '',
                phone: '',
                email: '',
                showError: false,
                error: '',
                showStatus: true,
                status: '<h1>Fetching a list of your potential new best friends...</h1>',
                apiRequest: null,
                apiKey: "d37c684a8dee07c9424f59462cfd9f15"
            }
          },
        methods: {
            getAPI: function(location) {
                // Set up url for fetching adoptable pet data.
                var url = 'http://api.petfinder.com/pet.getRandom';
                var apiKey = 'd37c684a8dee07c9424f59462cfd9f15'; //petfinder api key
                var secret = 'e44ea7e83d9bf772aebb3e512bbf4628'; //petfinder secret
                var cross_origin = '&output=basic&format=json&callback=?' //added to end for cross-origin request
              },
            getPet: function bindButtons(){
                //Set up url to fetch individual pet ID
                // var url = 'http://api.petfinder.com/pet.getRandom';
                 var url = "http://api.petfinder.com/pet.getRandom?key=<apiKey>&animal=<animal>&breed=<breed>&size=<size>&sex=<sex>&shelterID=<shelterID>&output=basic<cross-origin>";
                document.getElementById('submitZip').addEventListener('click', function(event){
            		event.preventDefault();

                var zipCode = document.getElementById('zip').value; // this line gets the zip code from the form entry
                // input from form
                var city = document.getElementByID('city').value;
                var animal = document.getElementByID('animal').value;
                var breed = document.getElementById('breed').value;
                var size = document.getElementById('size').value;
                var sex = document.getElementById('sex').value;
                var id = document.getElementById('id').value;
                var email = document.getElementById('id').value;
                var output = document.getElementById('output').value;


                url = url.replace("<apiKey>", this.apiKey);
                // Code that fetches data from the API URL and stores it in results.
                this.apiRequest = new XMLHttpRequest();
                this.apiRequest.onload = this.catchResponse;
                this.apiRequest.onerror = this.httpRequestOnError;
                this.apiRequest.open('get', url, true);
                this.apiRequest.send();
                });
            },

                catchResponse: function() {
                 if (this.apiRequest.status.$t === "A") {
                     var response = JSON.parse(this.apiRequest.responseText);
                     console.log(response);
                     this.showError = false;
                     this.showStatus = false;
                     this.status = pet.status.$t;
                     this.zipCode = pet.contact.zip.$t;
                     this.city = pet.contact.response.city.$t;
                     this.id = response.pet.id.$t;
                     this.name = response.pet.name.$t;
                     this.breed = response.pet.breeds.breed.$t;
                     this.size = respone.pet.size.$t;
                     this.age = response.pet.age.$t;
                     this.sex = response.pet.sex.$t;
                     this.description = response.description.$t;
                     this.email = response.pet.contact.email.$t;
                     this.phone = response.pet.contact.phone.$t;
                     this.showOutput = true;
                 }
                 else {
                     this.showError = true;
                     this.showStatus = false;
                     this.showOutput = false;
                     this.error = '<h3 v-if="zipCode"><strong>ZipCode:</strong> ' + this.zipcode + '</h3>' + this.apiRequest.statusText;
                 }
               },
             displayImage: function(id) {
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
