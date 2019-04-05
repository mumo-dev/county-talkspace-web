<template>
  <div class>
    <div class="col-12 justify-content-center">
      
      <div class="alert alert-danger text-center" v-show="error">
          {{ errorMessage }}
      </div>
      <div class="alert alert-success text-center" v-show="success">
        {{ successMessage }}
      </div>
      
    </div>
      <div class="form-group m-0 p-0">
        <textarea class="form-control autoExpand" placeholder="comment... "
            rows='1' data-min-rows='0' v-model="comment">
        </textarea>

        <div class="photos-area">
          <div class="row mt-0 pt-0" v-if="files">

            <div class="col-3 img-preview" v-for="(img, index) in imgSrc" :key="index" 
              style="height=100px!important">
              <div class="card">
                <div class="card-body p-1">
                <img :src="imgSrc[index]" class="img-fluid" height="100px" />
               </div>
              </div>
              <button class="btn btn-sm btn-default" 
                @click.prevent="removeImage(index)" title="Remove">X</button>
            </div>

          </div>
      </div>

      <div class="mt-1">
        
        <label class="text-primary" for="file" style="cursor:pointer">
          <!-- <i class="far fa-file-image fa-2x"></i> -->
          <img src="/images/gallery.svg" width="20px" height="20px">
        </label>
        <input type="file" class="d-none overflow-hidden" id="file" ref="file"  
          accept="image/*" multiple 
          v-on:change="handleImageUpload()" >
        
        <button class="btn btn-primary btn-sm float-right" 
        :disabled="!comment" v-if="!submitting" @click.prevent="submitComment">Comment</button>
        <button class="btn btn-primary btn-sm float-right" type="button" disabled  v-else>
          <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
          Sending...
        </button>
      </div>
      </div>
  </div>
</template>
<script>
export default {
  props:['post_id', 'iscomment'],
  data(){
    return {
        files:[],
        uploadFileArray:[],
        imgSrc:[],
        error:false,
        success:false,
        errorMessage:'',
        successMessage:'',
        comment:'',
        submitting:false
    }
  },

    methods:{
    submitComment(){
        //validate 
        if(!this.comment) return;

        let data = new FormData();
       
        data.append('comment', this.comment );
        data.append('post_id', this.post_id );
        
        if(this.iscomment){
          data.append('is_comment', true);
        }
    
        if(this.uploadFileArray){
           for(let i=0; i<this.uploadFileArray.length;i++){
               data.append('images[]',this.uploadFileArray[i]);
            }
        }

        this.submitting = true;

        axios.post('/comments/',data,
                {
                headers: {
                'Content-Type': 'multipart/form-data'
                }
        }).then((result)=>{
            this.files = null;
            this.imgSrc =[];
            this.comment = '';
            
            this.submitting = false;
            this.success = true;
            this.error = false;
            this.successMessage= "Comment saved successfully"

            console.log(result.data);
            const data = result.data.comment[0]
            this.$store.commit('addComment', data);
            // console.log(result);
        }).catch((err)=>{ 
            this.submitting = false;
            this.success = false;
            this.error = true;
            this.errorMessage= err.response.data.message || "An Error occured. Try again later!";
            console.log(err);
        });



    },
    handleImageUpload(){
     if(this.$refs.file.files.length > 4){
            this.error= true;
            this.errorMessage =" You can only upload a maximum of 4 images";
            return;
      }
      this.files = this.$refs.file.files;
      this.uploadFileArray = Array.from(this.files);
      this.error = false;


      for (let i = 0; i < this.files.length; i++) {
          this.imgSrc[i] = URL.createObjectURL(this.files[i]);  
      }  
    },

    removeImage(index){
      this.uploadFileArray.splice(index, 1);
      this.imgSrc.splice(index, 1);
    }
  }


}
</script>

<style scoped>
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



