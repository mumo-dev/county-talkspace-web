<template>
  <div class="card">
    <div class="card-header bg-white">
      Profile
      <a class="btn btn-primary btn-sm float-right" href="#" title="EDIT" 
          v-if="shouldEdit" @click.prevent="editable=!editable">
        <i class="fas fa-pen"></i>
      </a>
    </div>

    <div class="card-body">
      <div class="photo text-center">
        <img src="/images/user.png" class="img-fluid img-thumbnail" width="100%">

        <input type="file" class="d-none overflow-hidden" id="file"
         ref="file" accept="image/*" v-on:change="handleImageUpload()">
        <label class="btn btn-danger" for="file">
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
              <input id="username" type="text" v-model="user.name" class="form-control" :disabled="!editable">
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
              <input id="email" type="email" v-model="user.email" class="form-control" :disabled="!editable">
            </div>
          </div>

          <div class="col-auto" v-if="editable">
            <button class="btn btn-success btn-sm" :disabled="!shouldSubmit">SAVE</button>
          </div>

        </div>

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
      editable:false
    };
  },
  computed: {
    shouldEdit() {
      return this.userdetails.id == this.currentuserid;
    },

    shouldSubmit(){
      if(this.userdetails.id !== this.currentuserid || !this.user.name || !this.user.email){
        return false;
      }
      return true;
    }
  },

  methods:{
    handleImageUpload(){
      
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

