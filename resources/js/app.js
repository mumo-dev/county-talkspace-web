
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./autoexpandtextarea')

import Vue from 'vue'
import Vuex from 'vuex'
import storeData from './store'


Vue.use(Vuex);

const store = new Vuex.Store(storeData);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('app-profile', require('./components/Profile.vue').default);
Vue.component('app-create-post', require('./components/CreatePost.vue').default);
Vue.component('app-create-comment', require('./components/CreateComment.vue').default);
Vue.component('app-posts', require('./components/Posts.vue').default);

Vue.component('app-admin-posts', require('./components/AdminPosts.vue').default);
Vue.component('app-post', require('./components/Post.vue').default);
Vue.component('app-create-poll', require('./components/CreatePoll.vue').default);
Vue.component('app-polls', require('./components/Polls.vue').default);

Vue.component('app-comments', require('./components/Comments.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app',
    store

});



