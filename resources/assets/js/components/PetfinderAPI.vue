<template>
  <!-- input form for pet search -->
  <div id="petSearchInput" class="container">
    <div class="form-group justify-content-center">
      <label for="searchZip">ZipCode</label>
      <input type="text" name="zipCode" value="" class="form-control" v-model='searchZip'>
      <label for="animal">Animal Type</label>
      <select name="animal" v-model='animalType'>
        <option value="dog" selected>Dog</option>
        <option value="cat">Cat</option>
        <option value="bird">Bird</option>
        <option value="horse">Horse</option>
        <option value="barnyard">Barnyard</option>
        <option value="reptile">Reptile</option>
        <option value="smallfurry">Small Furry</option>
      </select>

      <label for="age">Age</label>
      <select name="age" v-model='animalAge'>
        <option value = ''>Any</option>
        <option value = "Baby">Baby</option>
        <option value="Young">Young</option>
        <option value="Adult">Adult</option>
        <option value="Senior">Senior</option>
      </select>

          <!-- todo: add approximate weight to size labels -->
      <label for="size">Size</label>
      <select name="size" v-model='animalSize'>
        <option value = ''>Any</option>
        <option value="S">Small</option>
        <option value="M">Medium</option>
        <option value="L">Large</option>
        <option value="XL">Extra Large</option>
      </select>

      <label for="sex">Sex</label>
      <select name="sex" v-model="animalSex">
        <option value = ''>Any</option>
        <option value="M">Male</option>
        <option value="F">Female</option>
      </select>
      <input type="submit" id="submitZip" @click="getPet()">
    </div>
    <div class="container">
      <div class="status-section center" v-if="showStatus">
        <span v-html="status"></span>
        <div class="output-section w-85 border border-dark" v-if="showOutput">
          <h3 v-if="searchZip"><strong>Zipcode:</strong> {{ searchZip }}</h3>
          <div><strong>Location:</strong> {{ city }}</div>
          <div><strong>Name:</strong> {{ name }}</div>
          <div><strong>Age:</strong> {{ age }}</div>
          <div><strong>Sex:</strong> {{ sex }}</div>
          <div><strong>Size:</strong> {{ size }}</div>
          <div><strong>Breed:</strong> {{ breed }}</div>
          <div><strong>Description:</strong> {{ description }}</div>
        </div>
        <button type="button" class="btn btn-lg" id="prevpage" @click="previousPage()">
          <a href="#" class="previous">
            <span class="arrow-icon"><i class="fas fa-arrow-circle-left"></i></span>
          </a>
        </button>
        <button type="button" class="btn btn-lg" id="nextPage" @click="nextPage()">
          <a href="#" class="next">
            <span class ="arrow-icon"><i class="fas fa-arrow-circle-right"></i></span>
          </a>
        </button>
      </div>
    </div>
  </div>

</template>

<script>

 export default {
   mounted(){
   },
        data: function() {
            return {
                showOutput: false,
                output: 'basic',
                searchZip: '',
                city:'',
                name: '',
                animalType: '',
                animalSize: '',
                animalAge: '',
                animalSex:'',
                breed: '',
                description: '',
                phone: '',
                email: '',
                showError: false,
                error: '',
                showStatus: true,
                status: '<h1>Fetching a list of potential new best friends...</h1>',
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
              },

            getPet: function bindButtons(){
                var url = "http://api.petfinder.com/pet.getRandom?key=d37c684a8dee07c9424f59462cfd9f15&animal=dog&location=<zipCode>&output=basic&format=json&callback=?";
                // var url ="http://api.petfinder.com/pet.getRandom?location=<zipCode>&animal=<animal>?format=json&key=<apiKey>&callback=?";
                // var url = "http://api.petfinder.com/pet.getRandom?format=json&key=<apiKey>&callback=?<&location=<zipCode>&animal=<animal>";

                url = url.replace("<apiKey>", this.apiKey);
                url = url.replace("<zipCode>", this.searchZip);
                url = url.replace("<animal>", this.animalType);
                url = url.replace("<cross_origin>", '?format=json&key=<apiKey>&callback=?'); //added to end for cross-origin request
                // &output=basic

                if(this.animalAge.length > 0){
                  (url = url + '&age=' + this.animalAge)
                }

                if(this.animalSize.length > 0){
                  (url = url + '&size=' + this.animalSize)
                }

                if(this.animalSex.length > 0){
                  (url = url + '&sex=' + this.animalSex)
                }


                // Code that fetches data from the API URL and stores it in results.
                // this.apiRequest = new XMLHttpRequest();
                // this.apiRequest.onload = this.catchResponse;
                // this.apiRequest.onerror = this.httpRequestOnError;
                // this.apiRequest.open('get', url, true);
                // this.apiRequest.send();

                $.getJSON(url)
                  .done(this.catchResponse)
                  .catch(function(err) { alert('Error retrieving data!');
                });

            },

                catchResponse: function(data) {
                  console.log(data);
                  var pet = data.petfinder.pet;
                 if (pet.status.$t === "A") {
                     // used in search
                     this.showError = false;
                     this.showStatus = false;
                     this.animalType = pet.animal.$t;
                     this.animalAge = pet.age.$t;
                     this.animalSize = pet.size.$t;
                     this.animalSex = pet.sex.$t;
                     this.status = pet.status.$t; //default of 'A'
                     // for response, not displayed
                     this.id = pet.id.$t;
                     this.zipCode = pet.contact.zip.$t;
                     //for response, displayed
                     this.city = pet.contact.city.$t;
                     this.name = pet.name.$t;
                     this.description = pet.description.$t;
                     this.email = pet.contact.email.$t;
                     this.phone = pet.contact.phone.$t;
                     this.showOutput = true;

                     this.breed = pet.breeds.breed.$t;

                       if(pet.breeds.breed.length > 0){
                        console.log("this is mixed breed");
                        console.log(Object.values(pet.breeds.breed[0]));
                        console.log(Object.values(pet.breeds.breed[1]));
                        // this.breed = ((Object.values(pet.breeds.breed[0]).concat((Object.values(pet.breeds.breed[1])));
                        // console.log(this.breed);


                       }
                       else {
                         this.breed = pet.breeds.breed.$t;
                         console.log("this is not a mixed breed");
                       }
                 }
                 else {
                     this.showError = true;
                     this.showStatus = false;
                     this.showOutput = false;
                     this.error = '<h3 v-if="zipCode"><strong>ZipCode:</strong> ' + this.zipcode + '</h3>' + this.apiRequest.statusText;
                 }
               },
             displayImage: function(data) {
               var img = data.petfinder.pet.media.photos.photo[0].$t;
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
