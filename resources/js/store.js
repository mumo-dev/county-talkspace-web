export default {
  state:{
    posts:[]
  },
  mutations:{
    loadPosts(state, payload){
      state.posts= payload;
    },
    addPost(state, payload){
      state.posts.unshift(payload)
    }
  },
  getters:{
    posts(state){
      return state.posts
    }
  }
}