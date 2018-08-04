<template>
  <!-- input form for pet search -->
  <div id="petSearchInput" class="container">
    <div class="form-group justify-content-center  p-3">
      <label for="searchZip">ZipCode</label>
      <input type="text" name="zipCode" value="" class="form-control" style="width: auto;" v-model='searchZip'>

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
      <div>
      <input class="btn btn-secondary" type="submit" id="submitZip" @click="getPet()">
    ``</div>
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
            <span><i class="fas fa-arrow-circle-left fa-2x"></i></span>
          </a>
        </button>
        <button type="button" class="btn btn-lg" id="nextPage" @click="nextPage()">
          <a href="#" class="next">
            <span class ="arrow-icon"><i class="fas fa-arrow-circle-right fa-2x"></i></span>
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
                var url = "http://api.petfinder.com/pet.find?key=d37c684a8dee07c9424f59462cfd9f15&animal=<animal>&location=<zipCode>&output=basic&format=json&callback=?";
                // var url ="http://api.petfinder.com/pet.getRandom?location=<zipCode>&animal=<animal>?format=json&key=<apiKey>&callback=?";
                // var url = "http://api.petfinder.com/pet.getRandom?format=json&key=<apiKey>&callback=?<&location=<zipCode>&animal=<animal>";

                // &lastOffset=<lastOffset>/
                // url = url.replace("<lastOffset>", '10'); //change return number from 25 to 10
                url = url.replace("<apiKey>", this.apiKey);
                url = url.replace("<zipCode>", this.searchZip);
                url = url.replace("<animal>", this.animalType);
                url = url.replace("<cross_origin>", '?format=json&key=<apiKey>&callback=?'); //added to end for cross-origin request


                if(this.animalAge.length > 0){
                  (url = url + '&age=' + this.animalAge)
                }

                if(this.animalSize.length > 0){
                  (url = url + '&size=' + this.animalSize)
                }

                if(this.animalSex.length > 0){
                  (url = url + '&sex=' + this.animalSex)
                }

                $.getJSON(url)
                  .done(this.catchResponse)
                  .catch(function(err) { alert('Error retrieving data!');
                });

            },

                catchResponse: function(data) {
                  console.log(data);
                  var pets = data.petfinder.pets; //returns array

                  for(var i = 0; i < pets.pet.length; i++){
                    if (pets.pet[i].status.$t === "A") {
                       // used in search
                       this.showError = false;
                       this.showStatus = false;
                       this.animalType = pets.pet[i].animal.$t;
                       this.animalAge = pets.pet[i].age.$t;
                       this.animalSize = pets.pet[i].size.$t;
                       this.animalSex = pets.pet[i].sex.$t;
                       this.status = pets.pet[i].status.$t; //default of 'A'
                       // for response, not displayed
                       this.id = pets.pet[i].id.$t;
                       this.zipCode = pets.pet[i].contact.zip.$t;
                       //for response, displayed
                       this.city = pets.pet[i].contact.city.$t;
                       this.name = pets.pet[i].name.$t;
                       this.description = pets.pet[i].description.$t;
                       this.email = pets.pet[i].contact.email.$t;
                       this.phone = pets.pet[i].contact.phone.$t;
                       this.showOutput = true;
                       this.breed = pets.pet[i].breeds.breed.$t;

                       this.array = pets.pet[i];
                        console.log(this.array);

                         if(pets.pet[i].breeds.breed.length > 0){
                          console.log("this is mixed breed");
                          console.log(Object.values(pets.pet[i].breeds.breed[0]));
                          console.log(Object.values(pets.pet[i].breeds.breed[1]));
                          // this.breed = ((Object.values(pet.breeds.breed[0]).concat((Object.values(pet.breeds.breed[1])));
                          // console.log(this.breed);
                         }
                         else {
                           this.breed = pets.pet[i].breeds.breed.$t;
                           console.log("this is not a mixed breed");
                         }

                    } else {
                     this.showError = true;
                     this.showStatus = false;
                     this.showOutput = false;
                     this.error = '<h3 v-if="zipCode"><strong>ZipCode:</strong> ' + this.zipcode + '</h3>' + this.apiRequest.statusText;
                      }
                }

             // displayImage: function() {
             //   var img = data.petfinder.pet.media.photos.photo[0].$t;
             //   var newImg = document.createElement('img');
             //   newImg.src = img;
             //
             //   var list = document.createElement("div");
             //   list.setAttribute("id", "List");
             //   document.body.appendChild(list);
             //
             //   list.appendChild(newImg);
             }
          }
    }

</script>
