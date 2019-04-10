<template>
<div>
  <ul class="list-group" v-for="poll in polls" :key="poll.id">
      <!-- <li class="list-group-item">Cras justo odio</li> -->
      <app-poll :poll="poll"></app-poll>
  </ul>
</div>
</template>

<script>
import Poll from './Poll.vue'
export default {
  props:['polls'],

  components:{
    'app-poll':Poll
  }
  
}
</script>
<style scoped>

</style>


