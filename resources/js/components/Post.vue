<template>
<div>
  <li class="media">
    <img :src="user_icon" 
    class="mr-3 rounded-circle" alt="user photo" width="50px" height="50px">
    <div class="media-body">
      <h5 class="my-0">{{ post.user.name }}
        <span class="text-secondary font-weight-light my-0 mb-2" style="font-size:14px;">
        {{ postedOn }}
        </span>
      </h5>
       <p>{{post.message.trim()}}</p>

      <div class="row" v-if="post.images.length >0">
        <!-- <i class="fas fa-angle-left"></i> -->

        <!-- <div class="col-6 " v-for="i in 4" :key="i">
          <img src="/images/NO-DEPLOY.jpg" class="img-fluid" height="150px">
        </div> -->
        <div class="col-12">
           <div class="photos-wrapper">
              <div :class="imageClasses" class="p-1" v-for="(imageUrl, index) in imagesUrls" :key="index">
                <img :src="'/images/thumbnails/'+imageUrl"  
                  style="max-width:100%; height:auto;object-fit:contain" data-target="#imageModal">
              </div>

              
              <!-- <div class="">
                <img src="/images/NO-DEPLOY.jpg" style="max-width:100%; height:auto; object-fit:contain">
              </div>
              <div class="">
                <img src="/images/NO-DEPLOY.jpg"  style="max-width:100%; height:auto; object-fit:contain">
              </div> -->
          
            </div> 
        </div>
  
      </div>



      <div class="media-footer mt-2">
        <div class="row">
          <div class="col-6 post-btns mr-md-20">
            <i class="far fa-comment-alt text-primary mr-1"></i>
              <template v-if="!iscomment">
                  <a :href="'/posts/'+ post.id+'/comments'" class="text-secondary">
                  {{ post.comments_count}} Comments 
                  </a>
              </template>
              <template v-else>
                <a :href="'/comments/'+ post.id" class="text-secondary">
                {{ post.comments_count}} Comments 
                </a>
              </template>
            </div>
          <div class="col-6 text-center post-btns"> 
            
              <template v-if="postIsLiked">
          
                  <a href="#" @click.prevent="unlikePost"> 
                    <i class="fas fa-heart mr-1 text-danger"></i> 
                    <span> {{ myPost.likes_count}} Likes </span>
                  </a>
              </template>
              <template v-else>
                  
                   <a href="#" @click.prevent="likePost"> 
                     <i class="far fa-heart mr-1 text-primary"></i>
                     <span class="text-secondary"> {{ myPost.likes_count}} Likes </span>
                  </a>
              </template>
              
             
          </div>
        </div>
      </div>


    </div>
    
  </li>
  <hr>
  </div>
</template>
<script>

import moment from 'moment'

export default {

  props:['post', 'iscomment'],

  mounted(){
    let url = '/isliked/'+this.post.id;
    if(this.iscomment){
      url += '?comment=true'
    }
    axios.get(url)
    .then((result) => {
      this.postIsLiked = result.data.liked
    }).catch((err) => {
      
    });
  },

  data(){
    return{
        noOfImages: this.post.images.length,
        postIsLiked: false,
        myPost: this.post
    }
  },
  computed: {
    postedOn(){
        return moment(this.post.created_at).fromNow()
    },
    user_icon(){
      if(this.post.user.photo_url){
        return '/images/thumbnails/'+ this.post.user.photo_url;
      }else{
        return '/images/user.png';
      }
    },

    imagesUrls() {
      if(this.post.images){
        return this.post.images.map(image => image.name);
      }
      return null;
    },

    imageClasses(){
      if(this.noOfImages == 1){
        return {
          'full-height': true,
          'full-width': true
        }
      }

      if(this.noOfImages == 2){
        return {
          'full-height': true
        };
      }

      return {};
    }
  },

  methods: {
    unlikePost(){
      let url = '/unlike/'+ this.post.id;
      if(this.iscomment){
        url += '?comment=true'
      }
      axios.post(url).then(result=>{
        //add p
         this.postIsLiked = false; 

        this.myPost.likes_count--;
     
      });
    }
    ,

    likePost(){
      let url = '/like/'+ this.post.id;
      if(this.iscomment){
        url += '?comment=true'
      }
      axios.post(url).then(result=>{

         this.postIsLiked = true; 
     
        this.myPost.likes_count++;
      });
    },

  }

};
</script>

<style scoped>

.photos-wrapper {
  display: grid;
  max-width: 100%;
  grid-template-columns: 50% 50%;
  /* grid-template-rows: 150px 150px; */

}

.photos-wrapper .full-height {
  grid-row-start: 1;
  grid-row-end: 3;
  max-height: 300px;
}

.photos-wrapper .full-width {
  grid-column-start: 1;
  grid-column-end: 3;
  max-height: 300px;
}

.post-btns{
  cursor: pointer;
  padding: 8px;
  border-radius: 4px;
}
.post-btns:hover, .post-btns:focus {
    background-color: #f2f2f2;
}
</style>

