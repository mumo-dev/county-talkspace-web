<template>
<div>


    <div class="text-center" v-if="loading">
        <span class="spinner-grow spinner-grow bg-primary" role="status" aria-hidden="true"></span>
        <span class="spinner-grow spinner-grow bg-warning" role="status" aria-hidden="true"></span>
        <span class="spinner-grow spinner-grow bg-danger" role="status" aria-hidden="true"></span>
        <span class="spinner-grow spinner-grow" role="status" aria-hidden="true"></span>
    </div>


    <div v-else >
      <h5>Messages</h5>
      <div class="messages">
      <div class="d-flex" v-for="comment in comments" :key="comment.id" >
        <!-- <img :src="comment.user.photo_url ? '/images/thumbnails/'+comment.user.photo_url : '/images/user.png'"
         class="mr-3 rounded-circle" alt="user photo" width="50px" height="50px">
        <div class="media-body">
            <template v-if="comment.user.user_type == 0">
                <h5 class="my-0">{{comment.user.name.trim()}}</h5>
              </template>
            <template v-else>
              <h5 class="my-0">County Government</h5>
            </template>
          
            <span
            class="text-secondary font-weight-light my-0"
            style="font-size:14px;">
            {{ postedOn(comment.created_at) }}
            </span>
            <p>
            {{ comment.message}}
            </p>
        </div>  -->
        <div style="width:40%" v-if="user.id ==comment.user.id"></div>
        <div class="message" :class="{sender: user.id ==comment.user.id, receiver: user.id != comment.user.id}">
          
          <p class="m-0 p-0"  style="font-size:16px;"> {{ comment.message}} 
           <br>
            <span
              class="text-secondary font-weight-light m-0 p-0"
              style="font-size:12px;">
              {{ postedOn(comment.created_at) }}
              </span>
         </p>
        </div>
      </div>
      </div>
    </div>
  <!-- <hr> -->
  <div class="form-group mb-1">
    <textarea class="form-control" rows="1" v-model="message" placeholder="Enter a message..."></textarea>
  </div>

    <button class="btn btn-sm btn-primary float-right clear-fix" v-if="!saving"
      :disabled="message.trim().length == 0"
      @click.prevent="saveComment">Send</button>

    <button class="btn btn-primary btn-sm float-right clear-fix" type="button" disabled  v-else>
        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
        Sending...
    </button>
   
    
  </div>
   
  
</template>

<script>
  import axios from 'axios'
  import moment from "moment";

  export default {
    props:['id', 'user'],
    data(){
      return {
        message:'',
        saving:false,
        loading:false,
        comments:[]
      }
    },

    computed:{
        isSender() {
          // return this.user.id == ;
        }
    },

    

    created(){
      this.fetchComments();
    },

    methods:{
        saveComment() {
            const data = {
              comment: this.message,
              serviceId: this.id
            }
            this.saving = true;
            axios.post('/services/comment', data)
              .then((res)=>{
                this.saving = false;
                const data = res.data;
                data['user'] = this.user;
                this.comments.push(data);
                this.message =''
              })
              .catch(err=>{
                this.saving = false;
                console.log(err);
              })

        },

        fetchComments() {
          this.loading = true;
          axios.get('/services/comments/'+ this.id)
          .then((result) => {
            this.loading = false;
            const data = result.data;
            this.comments = data;
            console.log(data)
          }).catch((err) => {
             this.loading = false;
             console.log(err)
          });
        },

        postedOn(date) {
          return moment(date).fromNow();
        }
    }
    
  }
</script>

<style scoped>
  .messages {
    background-color: #f2f2f2;
    background-image:url(/images/chat-background.png);
    background-repeat:repeat;
    padding: 30px 10px;
    border-radius: 4px;
    margin-bottom: 10px;

  }
  .message {
    width: 60%;
    background-color: #dcf8c6;
    padding: 6px 16px;
    border-radius: 4px 0px 10px 4px;
    margin-bottom: 10px;
    text-align: right;
  }

  .receiver {
    text-align: left;
    border-radius: 0px 4px 4px 10px;
    color: black;
    background-color: #fff;
  }
  .sender {
    text-align: right;
  }

</style>
