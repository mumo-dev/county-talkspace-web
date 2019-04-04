<template>
<ul class="list-unstyled">
    <app-post v-for="(post, index) in posts" :key="index"
    v-bind:post="post"></app-post>
</ul>
  
</template>
<script>
import Post from './Post.vue';
export default {
  
  components:{
    'app-post':Post
  },

  data(){
    return {
        posts:[],
    }
  },

  mounted(){
    this.fetchPosts();
  },

  methods:{

    fetchPosts(page=1){
      axios.get('/posts')
      .then((result) => {
        this.posts = result.data[0].data;
        console.log(result.data)
      })
      .catch((err) => {
        
      });
    }
  }


}
</script>

<style scoped>

</style>

