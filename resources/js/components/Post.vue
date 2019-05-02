<template>
  <div>
    <li class="media">
      <img :src="user_icon" class="mr-3 rounded-circle" alt="user photo" width="50px" height="50px">
      <div class="media-body">
        <h5 class="my-0">
          <template v-if="post.user.user_type == 0">{{post.user.name.trim()}}</template>
          <template v-else>
            <strong>County Government</strong>
          </template>

          <span
            class="text-secondary font-weight-light my-0 mb-2"
            style="font-size:14px;"
          >{{ postedOn }}</span>

          <template v-if="isadmin && !iscomment">
            <span class="badge badge-danger float-right" v-if="!myPost.read">NEW</span>
            <button
              class="btn btn-sm py-0 btn-info float-right mr-1"
              v-if="!myPost.read"
              @click.prevent="markPostAsRead"
            >Mark As Read</button>
          </template>
        </h5>
        <p>{{post.message.trim()}}</p>

        <div class="row" v-if="post.images.length >0">
          <!-- <i class="fas fa-angle-left"></i> -->

          <!-- <div class="col-6 " v-for="i in 4" :key="i">
          <img src="/images/NO-DEPLOY.jpg" class="img-fluid" height="150px">
          </div>-->
          <div class="col-12">
            <div class="photos-wrapper">
              <div
                :class="imageClasses"
                class="p-1"
                v-for="(imageUrl, index) in imagesUrls"
                :key="index"
              >
                <img
                  :src="'/images/thumbnails/'+imageUrl"
                  class="myImg"
                  v-on:click.prevent="displayModal(index)"
                >
              </div>

              <!-- <div class="">
                <img src="/images/NO-DEPLOY.jpg" style="max-width:100%; height:auto; object-fit:contain">
              </div>
              <div class="">
                <img src="/images/NO-DEPLOY.jpg"  style="max-width:100%; height:auto; object-fit:contain">
              </div>-->
            </div>
          </div>
        </div>
        <!-- <div class=""> -->

        <!-- </div> -->

        <!-- The Modal -->
        <div
          id="myModal"
          class="modal"
          v-bind:class="{'d-block':showModal,'d-none':!showModal}"
          v-if="showModal"
        >
          <!-- The Close Button -->
          <span class="close" @click="showModal = false">&times;</span>

          <span class="next" @click="displayNextImage()">
            <i class="fas fa-angle-right fa-3x text-white"></i>
          </span>

          <span class="prev" @click="displayPrevImage()">
            <i class="fas fa-angle-left fa-3x text-white"></i>
          </span>
          <!-- Modal Content (The Image) -->

          <img class="modal-content" ref="img01" :src="'/images/thumbnails/'+currentModalImageUrl">

          <!-- Modal Caption (Image Text) -->
          <div id="caption"></div>
        </div>

        <div class="media-footer mt-2">
          <div class="row">
            <div class="col-6 post-btns mr-md-20">
              <i class="far fa-comment-alt text-primary mr-1"></i>
              <template v-if="!iscomment">
                <template v-if="isadmin">
                  <a
                    :href="'/admin/posts/'+ post.id+'/comments'"
                    class="text-secondary"
                  >{{ post.comments_count}} Comments</a>
                </template>
                <template v-else>
                  <a
                    :href="'/posts/'+ post.id+'/comments'"
                    class="text-secondary"
                  >{{ post.comments_count}} Comments</a>
                </template>
              </template>
              <template v-else>
                <template v-if="isadmin">
                  <a
                    :href="'/admin/comments/'+ post.id"
                    class="text-secondary"
                  >{{ post.comments_count}} Comments</a>
                </template>
                <template v-else>
                  <a
                    :href="'/comments/'+ post.id"
                    class="text-secondary"
                  >{{ post.comments_count}} Comments</a>
                </template>
              </template>
            </div>
            <div class="col-6 text-center post-btns">
              <template v-if="postIsLiked">
                <a href="#" @click.prevent="unlikePost">
                  <i class="fas fa-heart mr-1 text-danger"></i>
                  <span>{{ myPost.likes_count}} Likes</span>
                </a>
              </template>
              <template v-else>
                <a href="#" @click.prevent="likePost">
                  <i class="far fa-heart mr-1 text-primary"></i>
                  <span class="text-secondary">{{ myPost.likes_count}} Likes</span>
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
import moment from "moment";

export default {
  props: ["post", "iscomment", "isadmin"],

  mounted() {
    let url = "/isliked/" + this.post.id;
    if (this.iscomment) {
      url += "?comment=true";
    }
    axios
      .get(url)
      .then(result => {
        this.postIsLiked = result.data.liked;
      })
      .catch(err => {});
  },

  data() {
    return {
      noOfImages: this.post.images.length,
      postIsLiked: false,
      myPost: this.post,
      showModal: false,
      currentModalImageUrl: "",
      currentImageIndex: 0
    };
  },
  computed: {
    postedOn() {
      return moment(this.post.created_at).fromNow();
    },
    user_icon() {
      if (this.post.user.photo_url) {
        return "/images/thumbnails/" + this.post.user.photo_url;
      } else {
        return "/images/user.png";
      }
    },

    imagesUrls() {
      if (this.post.images) {
        return this.post.images.map(image => image.name);
      }
      return null;
    },

    imageClasses() {
      if (this.noOfImages == 1) {
        return {
          "full-height": true,
          "full-width": true
        };
      }

      if (this.noOfImages == 2) {
        return {
          "full-height": true
        };
      }

      return {};
    }
  },

  methods: {
    unlikePost() {
      let url = "/unlike/" + this.post.id;
      if (this.iscomment) {
        url += "?comment=true";
      }
      axios.post(url).then(result => {
        //add p
        this.postIsLiked = false;

        this.myPost.likes_count--;
      });
    },
    likePost() {
      let url = "/like/" + this.post.id;
      if (this.iscomment) {
        url += "?comment=true";
      }
      axios.post(url).then(result => {
        this.postIsLiked = true;

        this.myPost.likes_count++;
      });
    },

    displayModal(index) {
      //displayModal

      // var nd = "img";
      // var imgSrc = this.$refs.nd[0].src;

      // var modal =  this.$refs.img01;

      // modal.src = imgSrc
      this.currentImageIndex = index;

      this.currentModalImageUrl = this.imagesUrls[index];

      this.showModal = true;
    },

    displayNextImage() {
      this.currentImageIndex++;
      if (this.currentImageIndex == this.imagesUrls.length) {
        this.currentImageIndex = 0;
      }

      this.currentModalImageUrl = this.imagesUrls[this.currentImageIndex];
    },
    displayPrevImage() {
      if (this.currentImageIndex == 0) {
        this.currentImageIndex = this.imagesUrls.length;
      }
      this.currentImageIndex--;
      this.currentModalImageUrl = this.imagesUrls[this.currentImageIndex];
    },

    markPostAsRead() {
      axios.post("/markpostasread/" + this.post.id).then(() => {
        this.myPost.read = 1;
      });
    }
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

.post-btns {
  cursor: pointer;
  padding: 8px;
  border-radius: 4px;
}
.post-btns:hover,
.post-btns:focus {
  background-color: #f2f2f2;
}

/* Style the Image Used to Trigger the Modal */
.myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  max-width: 100%;
  height: auto;
  object-fit: contain;
}

.myImg:hover {
  opacity: 0.7;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0, 0, 0); /* Fallback color */
  background-color: rgba(0, 0, 0, 0.9); /* Black w/ opacity */
}

.modal .next {
  position: absolute;
  top: 45%;
  right: 35px;
  z-index: 2;
  cursor: pointer;
}

.modal .prev {
  position: absolute;
  top: 45%;
  left: 35px;
  z-index: 2;
  cursor: pointer;
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content,
#caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {
    transform: scale(0);
  }
  to {
    transform: scale(1);
  }
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px) {
  .modal-content {
    width: 100%;
  }

  .modal .prev {
    top: 30%;
  }

  .modal .next {
    top: 30%;
  }
}
</style>

