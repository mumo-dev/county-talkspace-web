<template>
  <div class="card">
    <div class="card-body">
      <p> 
        {{ poll.question }}
      </p>
      <div v-for="choice in poll.choices" :key="choice.id">
          <button class="btn btn-outline-primary w-100 mt-1">{{choice.value}}</button>
      </div>
      <p  class="text-secondary mt-1 ml-1">4675 votes - 3 days left</p>
    </div>
  </div>
</template>

<script>

export default {

  props:['poll'],
  
}
</script>
<style scoped>

.btn {
  border-radius: 4rem;
}
</style>
