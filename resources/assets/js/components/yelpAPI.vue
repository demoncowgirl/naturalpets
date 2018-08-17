<template>
  <div id="vetSearchInput" class="container-fluid" style="width: auto;">
    <div class="form-group">
        <label for="searchZip">ZipCode</label>
        <input type="text" name="zipCode" value="" class="input-sm" placeholder="Zipcode Required" style="width: auto;" v-model='searchZip' required>
        <div>
        <input class="btn btn-secondary" style="color: white;" type="submit" id="submitZip" @click="getPet(); showBtn();">
        <input class="btn btn-secondary"  value="Clear" style="color:white;" type="button" id="reloadForm" @click="reloadForm();">
        </div>
    </div>
  </div>

	<div >
			<!-- <my-task :task="task"></my-task> -->

  <div id="output" class="container-fluid" v-for="search in searches" v-if="showOutput">
    <ul>
      <li>{{ vet.name }}</li>
      <li>{{image_url}}</li>
      <li>{{ vet.rating }}</li>
      <li>{{ vet.lat }}</li>
      <li>{{ vet.lon }}</li>
      <li>{{ vet.address}} </li>
      <li>{{ vet.city }}</li>
      <li>{{ vet.phone }}</li>
    </ul>
  </div>

</template>

<script>
console.log('is this working?');
// Vue.component('yelpAPI', require('./components/yelpAPI.vue'));

 export default {
  mounted(){
   },
   props: ['zipCode'],
   data: function() {
       return {
         name:'',
         image_url:'',
         rating:'',
         lat:'',
         lon:'',
         active_url: '',
         id:'',
         is_closed:'',
         zipCode:'',
         address:'',
         city:'',
         phone:'',
         image:'',
         apiRequest: null,
         apiKey: "4YfigUosp-VDB6IqL0OsQwXN8R1yNldMtWH_PflYhY2EOTgfMo34jrD6YZj2ghj2Z1936M3RO6XJ6Rh43v4iEF91I1i8KWpgSHoN41WJ38oZ1Fd-Sb2Y8VLZ6l9zW3Yx"
       }
     },
     methods: {

      getAPI: function(location) {

         // my authentication
         const client = yelp.client(apiKey);

         // Set up url for fetching adoptable pet data.
         var url = 'https://api.yelp.com/v3/businesses/search';
         const apiKey = '4YfigUosp-VDB6IqL0OsQwXN8R1yNldMtWH_PflYhY2EOTgfMo34jrD6YZj2ghj2Z1936M3RO6XJ6Rh43v4iEF91I1i8KWpgSHoN41WJ38oZ1Fd-Sb2Y8VLZ6l9zW3Yx'; //yelp api key
         //
         // url = url.replace("<location>", '40515');
         // url = url.replace("<categories>", 'pets');
         // url = url.replace("<term>", 'vet');

          'use strict';

          const yelp = require('yelp-fusion');

          const searchRequest = {
            categories: 'pets',
            term: 'vet',
            location: '40515'
          };

          client.search(searchRequest).then(response => {
            .done(this.catchResponse)
            // const firstResult = response.jsonBody.businesses[0];
            // const prettyJson = JSON.stringify(firstResult, null, 4);
            // console.log(prettyJson);
            console.log(this.catchResponse);
          }).catch(e => {
            console.log(e);
          });

          // $.getJSON(url)
          //   .done(this.catchResponse)
          //   .catch(function(err) { alert('Error retrieving data!');
          //   });
      },

      catchResponse: function(response) {

          // var response = JSON.parse(this.apiRequest.responseText);
          // console.log(response);

          for(var i =0; i < response.businesses.length; i++){

              this.showError = false;
              this.showStatus = false;
               // used in search
              currentVet.name = response.businesses[i].name;
              currentVet.rating = response.businesses[i].rating;
              currentVet.lat = response.businesses[i].lat;
              currentVet.lon = response.businesses[i].lon;
              currentVet.active_url = response.businesses[i].url;
              // for response, not displayed
              currentVet.id = response.businesses[i].id;
              currentVet.is_closed = response.businesses[i].is_closed;
              currentVet.zipCode = response.businesses[i].id;
              //for response, displayed
              currentVet.address = response.businesses[i].display_address;
              currentVet.city = response.businesses[i].location.city;
              currentVet.phone = response.businesses[i].display_phone;
              currentVet.image = response.businesses[i].image_url;
              currentVet.showOutput = true;
         }

         console.log(response);
      }



</script>
