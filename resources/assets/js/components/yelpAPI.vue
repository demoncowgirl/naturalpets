<template>
<div id="container">
  <div id="vetOutput" class="container-fluid" v-for="vet in results" v-if="showOutput">
    <div>
      <ul>
        <li >{{ vet.name }}</li>
        <li>{{ vet.image_url }}</li>
        <li>{{ vet.rating }}</li>
        <li>{{ vet.lat }}</li>
        <li>{{ vet.lon }}</li>
        <li>{{ vet.address }} </li>
        <li>{{ vet.city }}</li>
        <li>{{ vet.phone }}</li>
      </ul>
    </div>
  </div>
</div>
</template>

<script>

export default{
    el: "#results",
  mounted() {
    console.log('Component mounted.')
  },
  props: ['zipCode'],
   data: function(){
       return {
         showOutput: false,
         limit: int,
         name: '',
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
         showError: false,
         showStatus:true,
         apiRequest: null,
         API_KEY: "4YfigUosp-VDB6IqL0OsQwXN8R1yNldMtWH_PflYhY2EOTgfMo34jrD6YZj2ghj2Z1936M3RO6XJ6Rh43v4iEF91I1i8KWpgSHoN41WJ38oZ1Fd-Sb2Y8VLZ6l9zW3Yx",

       }
    }
  }

  methods: {

     getAPI: function(){
         var URL = 'https://api.yelp.com/v3/businesses/search?location=40515&term&categories=vet&limit=10';
         // var  url = "https://api.yelp.com/v3/businesses/search?location=<zipCode>&categories=<categories>&rating=<rating>&limit=10";
         var API_KEY = '4YfigUosp-VDB6IqL0OsQwXN8R1yNldMtWH_PflYhY2EOTgfMo34jrD6YZj2ghj2Z1936M3RO6XJ6Rh43v4iEF91I1i8KWpgSHoN41WJ38oZ1Fd-Sb2Y8VLZ6l9zW3Yx';
         var client_id = 'iSw8jvkEOU0wGsEbxnD0oA';


        // var myHeaders = new Headers();

         //
         // $.ajax({
         //   url: URL,
         //   method: 'GET',
         //   mode: 'no-cors',
         //   headers: {
         //     Authorization: myHeader,
         //   },
         // }).then((response) => {
         //      if(response.ok){
         //      return response.json();
         //    }else{
         //      throw new Error();
         //    }
         //  })
         //  .then((jsonData) => {
         //      console.log(jsonData);
         //    })
         //   .catch((err) => {
         //      console.log('ERROR: ', err.message);
         //    });
         //

         var req = new Request(url, {
           method: 'GET',
           headers: new Headers({
             'Authorization: Bearer', API_KEY,
             'Content-Type': 'application/json'
           })
           mode: 'no-cors'
         });

        fetch (req)
          .then((response) => {
             if(response.ok){
             return response.json();
           }else{ssss
             throw new Error();
           }
         })
         .then((jsonData) => {
             console.log(jsonData);
           })
          .catch((err) => {
             console.log('ERROR: ', err.message);
           });
    },

    getVet: function(){


      url=url.replace("<client_secret>", this.client_id)
      url= url.replace("<zipCode>", '40515');
      url= url.replace("<categories>", 'vet');
      url=url.replace("<rating>", 5);
      url= url.replace("<limit>", 10);

      $.getJSON(url)
        .done(this.catchResponse)
        .catch(function(err) { alert('Error retrieving data!');
        });
        console.log(url);
    },

    catchResponse: function(data) {
          var vetData=[];

          var data = JSON.parse(this.apiRequest.responseText);
          console.log(data);

          for(var i =0; i < response.businesses.length; i++){

            var currentVet=[];

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

               // this.searchArray = searchArray;
               this.vetData.push(Object.assign({}, currentVet));
               this.showOutput=true;

         return vetData;
        }
      }
}
</script>
