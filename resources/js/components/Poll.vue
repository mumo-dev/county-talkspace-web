<template>
  <div class="card">
    <template v-if="!hasVoted && pollIsValid && !isadmin">
      <div class="card-body">
        <p> 
          {{ poll.question }}
        </p>
        <div v-for="choice in poll.choices" :key="choice.id">
            <button class="btn btn-outline-primary w-100 mt-1" 
              @click="submitVote(choice.id)" :disabled="submitting">
              {{choice.value}}
            </button>
        </div>
        <p  class="text-secondary mt-1 ml-1">{{currentPoll.votes_count}} votes - {{ timeRemaining }} hours left</p>
      </div>
    </template>
    <template v-else>
        <div class="card-body">
        <p> 
          {{ currentPoll.question }}
        </p>
        <div v-for="choice in orderedChoices" :key="choice.id">
           
            <button  class="btn btn-outline-secondary w-100 mt-1" disabled>
              {{ choice.value }} - {{ calculateVotePercentage(choice.votes) +'%' }} 
            </button>
        </div>
        <p  class="text-secondary mt-1 ml-1" v-if="pollIsValid">
          {{currentPoll.votes_count}} votes - {{ timeRemaining }} hours left
 
        </p>

        <p  class="text-secondary mt-1 ml-1" v-else>
          Final Results: {{currentPoll.votes_count}} votes 
        </p>
      </div>
    </template>
  </div>

</template>

<script>
import moment from 'moment';
export default {

  props:['poll','isadmin'],

  data(){
    return {
      currentPoll: this.poll,
      hasVoted: this.poll.has_voted,
      submitting:false
    }
  },

  computed: {
    timeRemaining() {
      return moment(this.poll.expiry_date).diff(moment(), 'hours');
    },
    pollIsValid() {
       return moment(this.poll.expiry_date).diff(moment()) > 0;
    },
    orderedChoices() {
      //sorted them by votes
      let choices = [];
      this.currentPoll.choices.forEach(choice => {
          const data = {
            id: choice.id,
            value: choice.value,
            votes: choice.votes
          }
         choices.push(data);
      });
      return choices.sort((a,b)=> b.votes - a.votes);
    }
  },

  methods:{
    submitVote(choiceId) {
        if(this.pollIsValid){
          const data = {
            choice_id: choiceId,
            poll_id: this.poll.id
          };

          this.submitting = true;
          axios.post('/vote', data).then((result) => {
            
              this.hasVoted = true;
              this.submitting = false;
              
              this.currentPoll.votes_count++;
              this.currentPoll.has_voted = true;
              this.currentPoll.choices.forEach(element=>{
                  if(element.id == choiceId){
                    element.votes++;
                  }
              })

          }).catch((err) => {
              this.submitting = false;
          });

        }else {
          alert("Polling period is over")
        }
    },

    calculateVotePercentage(votes){
          if(this.currentPoll.votes_count == 0){
            return 0;
          }
         return  (votes/ this.currentPoll.votes_count) * 100 ;
    }
  }
  
}
</script>
<style scoped>

.btn {
  border-radius: 4rem;
}

.my-progress {
  display: flex;
  width: 100%;
  height: 30px;
  border-radius: 4rem;
  background-color: #f2f2f2;
}
.my-progress-bar {
  display: flex-item;
  width: 100%;
  height: 30px;
  border-radius: 4rem;

  /* background-color: #f2f2f2; */
}
</style>
