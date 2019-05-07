<template>
  <div class="card">

          <div class="alert alert-danger text-center" v-show="error">
             {{ errorMessage }}
          </div>
          <div class="alert alert-success text-center" v-show="success">
            {{ successMessage }}
          </div>
          <div class="card-header bg-white"><h5 class="m-0">Request for a service</h5></div>

          <div class="card-body">
              <form>
                  

                  <label for="name" class=" col-form-label">Service Type </label>

                  <div class="form-group">
                      <select class="form-control" v-model="service.type" required>
                        <option value="">Select service type</option>
                        <option value="ambulance">Ambulance Service</option>
                        <option value="firefighting">Firefighting Equipment</option>
                      </select>

                  </div>

                  <label for="description" class=" col-form-label">Description</label>

                  <div class="form-group">
                      <textarea id="description" 
                       placeholder="Tell us what happened ..." class="form-control" required  v-model="service.description">
                        
                      </textarea>

                  </div>

                  <label for="phone" class=" col-form-label">Your Phone Number</label>

                  <div class="form-group">
                      <input id="phone" type="text" placeholder="eg 0701010101"  
                        v-on:blur="phoneNumberIsNotValid()"
                        v-bind:class="{ 'is-invalid': hasPhoneError}"
                        class="form-control"  required  v-model="service.phone">

                       <span class="invalid-feedback" role="alert" v-if="phoneError">
                          <strong>{{ phoneError }}</strong>
                      </span>
                  </div>

                  <label for="location" class=" col-form-label">Your Current Location</label>

                  <div class="form-group">
                      <input id="location" type="text" class="form-control" v-model="service.location"  required >
                  </div>

                  <label for="image" class=" col-form-label">Image of what's Happening (Optional) </label> 
                 
                  <div class="image" v-if="imgSrc">
                    <img :src="imgSrc" width="200px" height="200px"/>
                  </div>
                  
                  <div class="form-group">
                      <input id="image" type="file" class="form-control-file" 
                       accept="image/*" ref="file" v-on:change="handleImageUpload()" >
                  </div>

                  
                  <div class="form-group">
                    
                      <button  v-if="!submitting"
                        @click.prevent="submitData" class="btn btn-primary" :disabled="!dataIsValid">
                        SEND
                      </button>

                       <button class="btn btn-primary" type="button" disabled  v-else>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Sending...
                      </button>
                  
                  </div>

        </form>
    </div>
</div>
</template>

<script>
  export default {

    data() {

      return {
        service:{
          type:"",
          description:"",
          phone:'',
          location:'',
        },

        file:'',
        imgSrc:'',
        phoneError:'',
        hasPhoneError:false,
        submitting:false,
        success:false,
        error:false,
        errorMessage:'',
        successMessage:''
      }
      
    },

    computed:{

      dataIsValid() {
        if(!this.service.type || !this.service.description 
            || !this.service.phone || !this.service.location) {
              return false;
        }else if( this.phoneNumberIsNotValid()) {
          return false
        }


        return true;
      }

    },

    methods: {
      handleImageUpload(){
        this.file = this.$refs.file.files[0];
        this.imgSrc = URL.createObjectURL(this.file);  
        
      },

      submitData() {
      
        let data = new FormData();
  
        data.append('type', this.service.type );
        data.append('description', this.service.description);
        data.append('location', this.service.location);
        data.append('phone', this.service.phone);
        if(this.file){
           data.append('image',this.file);   
        }

        this.submitting = true;
        axios.post('/services/',data,
                {
                headers: {
                'Content-Type': 'multipart/form-data'
                }
        }).then((result)=>{
            
            
            this.submitting = false;
            this.success = true;
            this.error = false;
            this.successMessage= result.data.message;

            this.service ={
              type:'',
              description:'',
              location:'',
              phone:''
            }

            this.file=''
            this.imgSrc =''

        }).catch((err)=>{ 
            this.submitting = false;
            this.success = false;
            this.error = true;
            this.errorMessage= err.response.data.message || "An Error occured. Try again later!";
            console.log(err);
        });
      },

    

      phoneNumberIsNotValid() {
        const phone = this.service.phone;
        if(!phone) {
          this.phoneError= "Phone Number is required";
          this.hasPhoneError = true;
          return true;
        }

        else if(isNaN(phone)){
           this.phoneError= "Phone Number is not valid"
            this.hasPhoneError = true;
           return true;
        }

        else if(phone.length != 10){
          this.phoneError= "Phone Number is not valid"
           this.hasPhoneError = true;
          return true;
        }else if(!phone.startsWith("07")){
          this.phoneError= "Phone Number is not valid"
          this.hasPhoneError = true;
          return true;
        }
        else {
          this.phoneError ="",
          this.hasPhoneError = false;
          return false;
        }
      }
    }
  }

</script>
