<template>
  <!-- input form for pet search -->
<div id="petSearchInput" class="container">
  <div class="form-group">
      <label for="searchZip">ZipCode</label>
      <input type="text" name="zipCode" value="" class="form-control input-sm d-flex justify-content-center" placeholder="Zipcode Required" style="width: auto;" v-model='searchZip'>
      <label for="animal">Animal Type</label>
      <select name="animal" v-model='animalType'>
        <option value="dog" selected="selected">Dog</option>
        <option value="cat" >Cat</option>
        <option value="bird" >Bird</option>
        <option value="horse" >Horse</option>s
        <option value="barnyard" >Barnyard</option>
        <option value="reptile" >Reptile</option>
        <option value="smallfurry" >Small Furry</option>
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
      <select name="sex" v-model="animalSex">s
        <option value = ''>Any</option>
        <option value="M">Male</option>
        <option value="F">Female</option>
      </select>
      <div>
      <input class="btn btn-secondary" type="submit" id="submitZip" @click="getPet(); showBtn();">
      </div>
    </div>
  <!-- output -->
  <div id="petDisplay" class="container d-flex justify-content-center p-1 m-0">
      <div class="row">
        <div id="prevBtn" class="m-1" style="display:none; width:30px;">
          <button type="button" class="btn btn-sm" id="prevPage" @click="previousPages()">
          <a href="#" class="previous">
            <span><i class="fas fa-arrow-circle-left fa-2x"></i></span>
          </a>
          </button>
        </div>
        <div>
          <div class=" col-md-3 output-section border border-dark m-2" style="width:400px;" v-for="pet in petsArray" v-if="showOutput">
            <div><strong>Name:</strong> {{ pet.name }}</div>
            <div><strong>Location:</strong> {{ pet.city }}</div>
            <div><strong>Age:</strong> {{ pet.animalAge }}</div>
            <div><strong>Sex:</strong> {{ pet.animalSex }}</div>
            <div><strong>Size:</strong> {{ pet.animalSize }}</div>
            <div><strong>Breed:</strong> {{ pet.breed }}</div>
            <div><strong>Contact Email:</strong> {{ pet.email }}</div>
            <div><strong>Contact Phone:</strong> {{ pet.phone }}</div>
            <img class="petImage" src='assets/images/peaches.jpg'/>
            <div class="m-2">{{ pet.description }}</div>
          </div>
        </div>
      </div>
          <div id="nextBtn" class="m-1" style="display:none; width:30px;">
            <button type="button" class="btn btn-sm" id="nextPage" @click="nextPage()">
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
            // options:'',

            petsArray: [],
            animalType: '',
            animalSize: '',
            animalAge: '',
            animalSex:'',

            nextPage: '',
            previousPage: '',

            showError: false,
            errorMsg: '<h1>There was an error. Please try again.</h1>',

            showStatus: true,
            fetchingStatus: '<h1>Fetching a list of potential new best friends...</h1>',
            noMatchesFound: '<h1>Sorry, but we did not find any matches.<h1>',

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

        // hides next and previous buttons until submit button is clicked
        showBtn: function() {
           document.getElementById('prevBtn').style.display = "block";
           document.getElementById('nextBtn').style.display = "block";
         },

        getPet: function (){
          var url = "http://api.petfinder.com/pet.find?key=d37c684a8dee07c9424f59462cfd9f15&animal=<animal>&location=<zipCode>&output=basic&format=json&callback=?";

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

          var pets = data.petfinder.pets;
          var count = 3;
          var statusCode = data.petfinder.header.status.code.$t;

          // var numOfItemsViewed = 0;

        if(statusCode !== "100"){
          console.log('there was an error' + statusCode);
           this.showError = true;
           this.showStatus = false;
           this.showOutput = false;
          }

        // loop returns objects from petfinder array
          for(var i = 0; i < 3; i++){
            var currentPet = [];
            console.log('index numbers of records ' + i);
            // console.log(data);

            if (pets.pet[i].status.$t === 'A') {
              // console.log(data);
            // numberOfItemsViewed += numberOfItemsViewed;
             this.showError = false;
             this.showStatus = false;
              // used in search
             currentPet.animalType = pets.pet[i].animal.$t;
             currentPet.animalAge = pets.pet[i].age.$t;
             currentPet.animalSize = pets.pet[i].size.$t;
             currentPet.animalSex = pets.pet[i].sex.$t;
             // for response, not displayed
             currentPet.id = pets.pet[i].id.$t;
             currentPet.zipCode = pets.pet[i].contact.zip.$t;
             //for response, displayed
             currentPet.city = pets.pet[i].contact.city.$t;
             currentPet.name = pets.pet[i].name.$t;
             currentPet.description = pets.pet[i].description.$t;
             currentPet.email = pets.pet[i].contact.email.$t;
             currentPet.phone = pets.pet[i].contact.phone.$t;
             currentPet.breed = pets.pet[i].breeds.breed.$t;
             currentPet.showOutput = true;
             // retrieves first image if there are multiple images
             // this.petImage = pets.pet[i].media.photos.photo[0];

                if(pets.pet.mix === 'Yes' || pets.pet[i].breeds.breed.length > 0){
                  // console.log("this is mixed breed");
                  console.log(Object.values(pets.pet[i].breeds.breed[0]));
                  console.log(Object.values(pets.pet[i].breeds.breed[1]));
                  // this.breed = ((Object.values(pet.breeds.breed[0]).concat((Object.values(pet.breeds.breed[1])));
                  // console.log(this.breed);
                }else{
                       currentPet.breed = pets.pet[i].breeds.breed.$t;
                       // console.log("this is not a mixed breed");
                     }

                // if(pets.pet[i].option,options > 1){
                //   console.log(Object.values(pets.pet[i].option.options[0]));
                //   console.log(Object.values(pets.pet[i].option.options[1]));
                //   console.log(Object.values(pets.pet[i].option.options[2]));
                //   console.log(Object.values(pets.pet[i].option.options[3]));
                //   }
               // petsArray.push({city:this.city, name:this.name, animalAge:this.animalAge, animalSex:this.animalSex, animalSize:this.animalSize, description:this.description,  breed:this.breed, email:this.email, phone:this.phone});

               console.log(currentPet);
               this.petsArray.push(Object.assign({}, currentPet));

          }
        }

         // displayImage: function(petImage) {
         //   var img = data.petfinder.pet.media.photos.photo[0].$t;
         //   var newImg = document.createElement('img');
         //   newImg.src = img;
         //
         //   var list = document.createElement("div");
         //   list.setAttribute("id", "List");
         //   document.body.appendChild(list);
         //
         //   list.appendChild(newImg);

         this.showOutput=true;
      }
    }
}

</script>
