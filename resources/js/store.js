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
      state.posts.comments_count +=1;
    },
    loadComments(state, payload){
      state.comments= payload;
    },
    addComment(state, payload){
      state.comments.unshift(payload)
      // state.posts[0].comments_count +=1;
    },

    addLikeToComment(state, payload){
      state.comments = state.comments.map(element => {
        if(element.id == payload){
          element.likes_count+=1;
        }
      });
    },
    addLikeToPost(state){
      // state.posts.likes_count += 1;

      state.posts = state.posts.map(element => {
        if(element.id == payload){
          element.likes_count+=1;
        }
      });
    },
    removeLikeToComment(state){
      state.comments.likes_count -=1
    },
    removeLikeToPost(state){
      state.posts.likes_count --;
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