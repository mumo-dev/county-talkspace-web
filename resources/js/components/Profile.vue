<template>
  <div class="card">
    <div class="card-header bg-white">
      Profile
      <a
        class="btn btn-primary btn-sm float-right"
        href="#"
        title="EDIT"
        v-show="shouldEdit"
        @click.prevent="editable=!editable"
      >
        <i class="fas fa-pen"></i>
      </a>
    </div>

    <div class="card-body">
      <div class="photo">
        <img v-bind:src="imagePreview ? imagePreview : imagePath"
         class="img-fluid img-thumbnail">

        <input
          type="file"
          class="d-none overflow-hidden"
          id="file"
          ref="file"
          accept="image/*"
          v-on:change="handleImageUpload()"
        >
        <label class="btn btn-danger" for="file" v-show="editable">
          <i class="fas fa-pen"></i>
        </label>
      </div>

      <div class="details mt-2 font-weight-normal" style="font-size:1.2rem">
        <div class="form-row">
          <div class="col-auto">
            <label class="sr-only" for="username">Username</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-user-tag text-primary"></i>
                </div>
              </div>
              <input
                id="username"
                type="text"
                v-model="user.name"
                class="form-control"
                :disabled="!editable"
                required
              >
            </div>
          </div>

          <div class="col-auto">
            <label class="sr-only" for="email">Email</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-envelope text-primary mr-1"></i>
                </div>
              </div>
              <input
                id="email"
                type="email"
                v-model="user.email"
                class="form-control"
                :disabled="!editable"
                required
              >
            </div>
          </div>

          <div class="col-auto" v-if="editable">
            <button class="btn btn-success btn-sm"
             :disabled="!shouldSubmit"
             @click.prevent="submitUpdate()">{{submitting ? 'SAVING...': 'SAVE'}}</button>
          </div>
        </div>
      </div>

      <div class="alert alert-success" v-show="success">
          <p>Profile update successful</p>
      </div>

      <div class="alert alert-danger" v-show="error">
          <p>Profile update failed</p>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  props: ["userdetails", "currentuserid"],
  data() {
    return {
      user: this.userdetails,
      editable: false,
      file: "",
      showPreview: false,
      imagePreview: '',
      submitting:false,
      success:false,
      error:false
    };
  },
  computed: {
    shouldEdit() {
      return this.userdetails.id == this.currentuserid;
    },

    shouldSubmit() {
      if (
        this.userdetails.id !== this.currentuserid ||
        !this.user.name ||
        !this.user.email || 
        this.submitting
      ) {
        return false;
      }
      return true;
    },
    imagePath(){
     return this.userdetails.photo_url
        ? "/images/" + this.userdetails.photo_url
        : "/images/user.png";
    }
  },

  methods: {
    submitUpdate(){
      //validate
      let data  = new FormData();
      
      // add form data to submit
      data.append('image', this.file);
      data.append('name', this.user.name);
      data.append('email', this.user.email);
      data.append('photo_url', this.user.photo_url);
      data.append('id', this.user.id);
      data.append('authId', this.currentuserid);

        /*
          Make the request to the POST /single-file URL
        */
      this.submitting = true;
      axios.post('/user/profile/update',data,
              {
              headers: {
              'Content-Type': 'multipart/form-data'
              }
      }).then((result)=>{
          this.submitting = false;
          this.success = true;
          this.error = false;
          // console.log(result);
      }).catch((err)=>{ 
          this.submitting = false;
          this.success = false;
          this.error = true;
          // console.log(err);
      });

    },
    handleImageUpload() {
     
      /*
        Set the local file variable to what the user has selected.
      */
      this.file = this.$refs.file.files[0];

      /*
        Initialize a File Reader object
      */
      let reader  = new FileReader();

      /*
        Add an event listener to the reader that when the file
        has been loaded, we flag the show preview as true and set the
        image to be what was read from the reader.
      */
      reader.addEventListener("load", function () {
        this.showPreview = true;
        this.imagePreview = reader.result;
      }.bind(this), false);

      /*
        Check to see if the file is not empty.
      */
      if( this.file ){
        /*
          Ensure the file is an image file.
        */
        if ( /\.(jpe?g|png|gif)$/i.test( this.file.name ) ) {
          /*
            Fire the readAsDataURL method which will read the file in and
            upon completion fire a 'load' event which we will listen to and
            display the image in the preview.
          */
          reader.readAsDataURL( this.file );
        }
      }

    }



  }
};
</script>

<style scoped>
.photo {
  position: relative;
  width: 100%;
}
.photo label {
  position: absolute;
  bottom: 0;
  right: 0;
}
</style>

