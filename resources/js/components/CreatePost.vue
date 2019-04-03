<template>
  <div class="row post-bg">
    <div class="col-12 justify-content-center">
      
      <div class="alert alert-danger text-center" v-show="error">
          {{ errorMessage }}
      </div>
      <div class="alert alert-success text-center" v-show="success">
        {{ successMessage }}
      </div>
    </div>
    <div class="col-2">
      <img src="/images/user.png" class="rounded-circle" width="50px" height="50px"/>
    </div>

    <div class="col-10 ">
      <div class="form-group m-0 p-0">
        <textarea class="form-control autoExpand" placeholder="Create a post.."
         rows='3' data-min-rows='3' v-model="post">
        </textarea>
      </div>
      <div class="form-group m-0 mt-1">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio"  id="opinion" 
          v-model="tag" name="type" value="opinion">
          <label class="form-check-label" for="opinion" >Opinion</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="enquiry" 
           v-model="tag" name="type" value="enquiry" >
          <label class="form-check-label" for="enquiry">Enquiry</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio"  id="complain"
           v-model="tag" name="type" value="complain">
          <label class="form-check-label" for="complain" >Complain</label>
        </div>
        
      </div>

      <div class="photos-area">
          <div class="row mt-0 pt-0" v-if="files">

            <div class="col-3 img-preview" v-for="(img, index) in imgSrc" :key="index" 
              style="height=100px!important">
              <div class="card">
                <div class="card-body p-1">
                <img :src="imgSrc[index]" class="img-fluid" />
               </div>
              </div>
              <button class="btn btn-sm btn-default" 
                @click.prevent="removeImage(index)" title="Remove">X</button>
            </div>

          </div>
      </div>

      <div class="mt-1">
        
        <label class="text-primary" for="file" style="cursor:pointer">
          <i class="far fa-file-image fa-2x"></i>
        </label>
        <input type="file" class="d-none overflow-hidden" id="file" ref="file"  
          accept="image/*" multiple 
          v-on:change="handleImageUpload()" >
        
        <button class="btn btn-primary btn-sm float-right" :disabled="!post" v-if="submitting">Post</button>
        <button class="btn btn-primary btn-sm float-right" type="button" disabled  v-else>
          <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
          Posting...
        </button>
      </div>

    </div>

  </div>
</template>
<script>

export default {

  props:['id'],

  data(){
    return {
        files:[],
        uploadFileArray:[],
        imgSrc:[],
        error:false,
        success:false,
        errorMessage:'',
        successMessage:'',
        post:'',
        tag:'opinion',
        submitting:false
        
    }
  },

  methods:{
    submitPost(){
        //validate 
        if(!this.post) return;

        let data = new FormData();
        data.append('images', this.uploadFileArray);
        data.append('message', this.post );
        data.append('tag', this.tag);
        data.append('userId', this.id);

        this.submitting = true;
        axios.post('/posts/',data,
                {
                headers: {
                'Content-Type': 'multipart/form-data'
                }
        }).then((result)=>{
            this.submitting = false;
            this.success = true;
            this.error = false;
            this.successMessage= "Post saved successfully"
            console.log(result);
        }).catch((err)=>{ 
            this.submitting = false;
            this.success = false;
            this.error = true;
            this.errorMessage= err.response.data.message || "An Error occured. Try again later!";
            console.log(err);
        });



    },
    handleImageUpload(){
     
      this.files = this.$refs.file.files;
      this.uploadFileArray = Array.from(this.files);
      this.error = false;


      for (let i = 0; i < this.files.length; i++) {
          if(i == 4){
            this.error= true;
            this.errorMessage =" You can only upload a maximum of 4 images";
            break;
          }
          this.imgSrc[i] = URL.createObjectURL(this.files[i]);  
      }  
    },

    removeImage(index){
      this.uploadFileArray.splice(index, 1);
      this.imgSrc.splice(index, 1);
    }
  }
};
</script>

<style scoped>
.post-bg{
  background: #f2f2f2;
  border: none;
  border-radius: 4px;
  margin: 15px auto;
  padding: 16px 0;
}

.img-preview {
  position: relative;
}
.img-preview button {
  position: absolute;
  top: 0;
  right: 14px;
  background-color: black;
  color:white;
  opacity: 0.6;
  border-radius: 50%;
}

.img-preview button:hover, .img-preview button:focus, .img-preview button:active {
  opacity: 0.7;
  background-color: red;
}


</style>


