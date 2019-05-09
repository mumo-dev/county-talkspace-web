<template>
  <div>
    <a class="btn btn-sm btn-outline-secondary mb-2" href="#!" @click="showCreate= !showCreate">
      {{  showCreate? 'Close': 'Request For Service'}}
    </a>
    <app-create-service v-show="showCreate"
      v-on:addservice ="addService"
    ></app-create-service>

    <h5 class=" p-2 text-primary"> All Services You have Requested</h5>

      <div class="text-center" v-show="loading">
        <span class="spinner-grow spinner-grow bg-primary" role="status" aria-hidden="true"></span>
        <span class="spinner-grow spinner-grow bg-warning" role="status" aria-hidden="true"></span>
        <span class="spinner-grow spinner-grow bg-danger" role="status" aria-hidden="true"></span>
        <span class="spinner-grow spinner-grow" role="status" aria-hidden="true"></span>
      </div>
 
    <div class="list-group">

      <a :href="'/services/'+ service.id" class="list-group-item list-group-item-action"
         v-for="service in services" :key="service.id">
          <!-- //firefighting -->
          <!-- ambulance -->

          Request for {{ service.type == 'ambulance'? 'Ambulance':'Fire -fighting'}} Service on 
          {{ formatDate(service.created_at)}}
      </a>
      
    </div>
    <div v-show="services.length ==0 && !loading">
          <p> No Services Requested Yet</p>
    </div>
   
    
  </div>
</template>

<script>

import CreateService from './CreateService'
import axios from 'axios'
import moment from 'moment'
  export default {
    props:['id'],
    components: {
      'app-create-service': CreateService
    },


    created() {
        this.fetchServices();
    },

    data() {
      return {
        showCreate:false,
        services:[],
        loading:false
      }
    },

    

    methods:{
      fetchServices(page=1){
        this.loading = true;

        const url = `/services/user/${this.id}?page=${page}`

        axios.get(url)
        .then(({data})=> {

          this.loading = false;
          this.services = data.data;

        })
        .catch(err=>{
          this.loading = false;
          console.log(err);

        })
      },

      formatDate(date) {
        return moment(date).format('LLL')
      },

      addService(service) {
        this.services.unshift(service);
      }
    }
  }
</script>

