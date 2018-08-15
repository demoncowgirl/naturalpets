<template>
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
           petsArray: [],
           animalType: '',
           animalSize: '',
           animalAge: '',
           animalSex:'',
           // options:'',
           pageNum: 0,
           prevBtn:'',
           nextBtn:'',
           showError: false,
           errorMsg: '<h1>There was an error. Please try again.</h1>',
           noMatchesFound: '<h1>Sorry, but we did not find any matches.<h1>',
           showStatus: true,
           fetchingStatus: '<h1>Fetching a list of potential new best friends...</h1>',

           apiRequest: null,
           apiKey: "4YfigUosp-VDB6IqL0OsQwXN8R1yNldMtWH_PflYhY2EOTgfMo34jrD6YZj2ghj2Z1936M3RO6XJ6Rh43v4iEF91I1i8KWpgSHoN41WJ38oZ1Fd-Sb2Y8VLZ6l9zW3Yx"
       }
     },
     methods: {

       getAPI: function(location) {
         // Set up url for fetching adoptable pet data.
         var url = 'https://api.yelp.com/v3/businesses/search';
         var apiKey = '4YfigUosp-VDB6IqL0OsQwXN8R1yNldMtWH_PflYhY2EOTgfMo34jrD6YZj2ghj2Z1936M3RO6XJ6Rh43v4iEF91I1i8KWpgSHoN41WJ38oZ1Fd-Sb2Y8VLZ6l9zW3Yx'; //yelp api key
         var clientID = 'iSw8jvkEOU0wGsEbxnD0oA'; //yelp client id
         },

       // hides next and previous buttons until submit button is clicked
       showBtn: function() {
          document.getElementById('prev').style.display="block";
          document.getElementById('next').style.display="block";
        },

       getYelp: function (){
         var url = "https://api.yelp.com/v3/businesses/search?key=<apiKey>&location=<zipCode>&categories=pets&term=vets&limit=25&format=json&callback=?"

         // url = url.replace("<lastOffset>", '10'); //change return number from 25 to 10
         url = url.replace("<apiKey>", this.apiKey);
         url = url.replace("<zipCode>", this.searchZip);
         url = url.replace("<term>", this.businessType);
         url=url.replace("<limit>", this.limit); //number of returned results. Maximu = 50
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

           if(statusCode !== "100"){
             console.log('there was an error' + statusCode);
              this.showError = true;
              this.showStatus = false;
              this.showOutput = false;
            }

           for(var i =0; i < pets.pet.length; i++){
             var currentPet = [];

             if (pets.pet[i].status.$t === 'A') {
               console.log(data);
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
              currentPet.image = pets.pet[i].media.photos.photo[3].$t;
              currentPet.showOutput = true;

               if(pets.pet.mix === 'Yes' || pets.pet[i].breeds.breed.length > 0){
                 currentPet.breed = (pets.pet[i].breeds.breed[0]) + (pets.pet[i].breeds.breed[1])
                 console.log(Object.values(pets.pet[i].breeds.breed[0]));
                 console.log(Object.values(pets.pet[i].breeds.breed[1]));
               }else{
                      currentPet.breed = pets.pet[i].breeds.breed.$t;
               }
                // retrieves first image if there are multiple images
               var petImage = "http://photos.petfinder.com/photos/pets/<currentPet.id>";
               petImage = petImage.replace("<currentPet.id>", currentPet.id);
               petImage = petImage.replace("http", "https");


                              this.petsArray.push(Object.assign({}, currentPet));

                              }
                                 // nextPages.onclick = function('nextBtn'){nextIteration = i + 2};
                            },
                      nextPage: function(){
                        if(this.pageNum * 3 < this.petsArray.length){
                          this.pageNum +=1;
                        }
                      },

                      previousPage: function(){
                        if(this.pageNum > 0){
                          this.pageNum -=1;
                        }
                      },

          computed: {
            displayArray: function(){
              return this.petsArray.slice(this.pageNum * 3, (this.pageNum * 3) + 3);

              // var mainArray = this.petsArray;
              //   if(mainArray <=25){
              //       var displayArray = mainArray.slice(this.pageNum + 3);
              //       console.log(mainArray);
              //       console.log(newStart);
                  //   }
                  }

                }
          }
        }


</script>
