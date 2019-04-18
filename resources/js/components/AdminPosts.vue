<template>
<ul class="list-unstyled">
    <template v-if="!loading">
      <app-post v-for="(post, index) in posts" :key="index"
          v-bind:post="post" v-bind:isadmin="isadmin"></app-post>
    </template>
    
    <template v-else>
      <div  class="text-center">
        <span class="spinner-grow spinner-grow bg-primary" role="status" aria-hidden="true"></span>
        <span class="spinner-grow spinner-grow bg-warning" role="status" aria-hidden="true"></span>
        <span class="spinner-grow spinner-grow bg-danger" role="status" aria-hidden="true"></span>
        <span class="spinner-grow spinner-grow " role="status" aria-hidden="true"></span>
      </div>
    </template>

    <div v-if="posts.length == 0 && !loading" class="text-center">
      <p> NO POSTS YET ON THIS THREAD</p>
    </div>
    
</ul>
  
</template>
<script>
import Post from './Post.vue';
export default {
  props:['isadmin','tag'],
  components:{
    'app-post':Post
  },

  data(){
    return {
      posts:[],
      loading:false
    }
  },

  mounted(){
    this.fetchPosts();
    console.log(this.tag);
  },

  computed:{
    // posts(){
    //   return this.$store.getters.posts;
    // }
  },

  methods:{

    fetchPosts(page=1){
      this.loading = true;
      axios.get('/posts/'+this.tag)
      .then((result) => {
        let data = result.data[0].data;
        // this.$store.commit('loadPosts', data);
        this.posts = data;
        this.loading = false;
        console.log(data)
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

