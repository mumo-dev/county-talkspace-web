<template>
<div>
  <ul class="list-group mb-2" v-for="poll in polls" :key="poll.id">
      <!-- <li class="list-group-item">Cras justo odio</li> -->
      <app-poll :poll="poll" :isadmin="isadmin"></app-poll>
  </ul>
</div>
</template>

<script>
import Poll from './Poll.vue'
export default {
  props:['polls','isadmin'],

  components:{
    'app-poll':Poll
  }
  
}
</script>
<style scoped>

</style>


