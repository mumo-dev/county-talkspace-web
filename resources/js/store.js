export default {
  state:{
    posts:[],
    comments:[]
  },
  mutations:{
    loadPosts(state, payload){
      state.posts= payload;
    },
    addPost(state, payload){
      state.posts.unshift(payload)
    },
    loadComments(state, payload){
      state.comments= payload;
    },
    addComment(state, payload){
      state.comments.unshift(payload)
    }
  },
  getters:{
    posts(state){
      return state.posts
    },
    comments(state){
      return state.comments
    }
  }
}