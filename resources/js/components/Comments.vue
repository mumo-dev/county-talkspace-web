<template>
<ul class="list-unstyled">
    <template v-if="!loading">
      <app-post v-for="(comment, index) in comments" :key="index"
          v-bind:post="comment" v-bind:iscomment="true" v-bind:isadmin="isadmin"></app-post>
    </template>
    <template v-else>
      <div  class="text-center">
        <span class="spinner-grow spinner-grow bg-primary" role="status" aria-hidden="true"></span>
        <span class="spinner-grow spinner-grow bg-warning" role="status" aria-hidden="true"></span>
        <span class="spinner-grow spinner-grow bg-danger" role="status" aria-hidden="true"></span>
        <span class="spinner-grow spinner-grow " role="status" aria-hidden="true"></span>
      </div>
    </template>
    
</ul>
  
</template>
<script>
import Post from './Post.vue';
export default {
  props:['postid','iscomment','isadmin'],
  components:{
    'app-post':Post
  },

  data(){
    return {
       loading:false
    }
  },

  mounted(){
    this.fetchComments();
    //  this.$store.commit('loadComments', this.posts);

  },

  computed:{
    comments(){
      return this.$store.getters.comments;
    }
  },

  methods:{

    fetchComments(page=1){
      this.loading = true;
      let url = '/comments/post/'+ this.postid;
      if(this.iscomment){
        url += '?comment=true'
      }
      axios.get(url)
      .then((result) => {
        // console.log(result.data);
        let data = result.data[0];
        this.$store.commit('loadComments', data);
        this.loading = false;
        // console.log(data)
      })
      .catch((err) => {
          this.loading = false;

      });
    }
  },



}
</script>

<style scoped>

</style>

