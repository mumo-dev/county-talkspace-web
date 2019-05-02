<template>
  <div>
    <button class="btn btn-success mb-1" @click="showCreateView =!showCreateView">
      {{ showCreateView ? 'Close ':'Create A Poll' }}
    </button>
  <div class="card" v-show="showCreateView">
      <div class="alert alert-success m-2" v-show="success">
          Poll has been created
      </div>
      <div class="alert alert-danger m-2" v-show="error">
        {{ errorMessage }}
      </div>
     <div class="card-header bg-white"> Create a New Poll </div>

      <div class="card-body">

            <div class="form-group">
              <label for="question">Question:</label>
              <textarea class="form-control autoExpand" placeholder="question... "
                    rows='1' data-min-rows='0' v-model="question">
               </textarea>
            </div>

            <div class="form-group row ml-0">
              <div class="col-11 ml-0 pl-0">
                <label for="question">Choices:</label> 
                <!-- <span class="float-right   text-success "  @click="noOfchoices++">
                  <i class="far fa-plus-square fa-2x"></i>
                </span> -->
              </div>

              <template v-for="choice in noOfchoices">
                    <div class="col-10 p-0 m-0" :key="choice">
                        <input type="text" class="form-control mb-1" 
                        :placeholder= "'Choice '+ choice" v-model="choices[choice]">
                    </div>
                    <div class="col-2  p-1 m-0" :key="'k'+choice" v-show="choice > 2" 
                      style="cursor:pointer">
                        <span class="float-left" @click="noOfchoices--">
                          <i class="far fa-times-circle fa-2x" style="color:#DCDCDC"></i>
                        </span>
                    </div>
                  
              </template>
              <div class="w-100"></div>
              <p class="p-0 mb-0"> <a href="#" class="text-info" @click.prevent="noOfchoices++">Add More choices</a></p>
              
            </div>

            
              <div class="form-group d-flex pt-0">
                <label class="m-2">Poll Length:</label>
                <label class="m-2">Days:</label>
                <div class="mt-1">
                  <select class="form-control-sm" v-model="days">
                    <option value="0">0</option>  
                    <option v-for="i in 7" :key="i"> {{ i }}</option>
                  </select>
                </div>
                
                <label class="m-2">Hours:</label>
                <div class="mt-1">
                <select class="form-control-sm" v-model="hours">
                      <option value="0">0</option>
                      <option v-for="i in 23" :key="i" :value="i"> {{ i }}</option>
                  </select>
                </div>

                <label class="m-2">Min:</label>
                <div class="mt-1">
                  <select class="form-control-sm" v-model="minutes">
                   <option value="0">0</option>
                   <option v-for="i in 59" :key="i" :value="i"> {{ i }}</option>
                  </select>
                </div>

                
              </div>

              <div class="form-group">
                <button class="btn btn-info"  v-if="!submitting"
                    @click="submitPoll"
                    :disabled="!allFieldsValid">Create</button>

                <button class="btn btn-primary btn-sm float-right" type="button" disabled  v-else>
                  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                  Saving...
                </button>
              </div>

        </div>
    
    </div>

    </div>
 

</template>

<script>
import moment from 'moment'
export default {

    data(){
      return {
        question:'',
        choices:[],
        noOfchoices:2,
        days:1,
        hours:0,
        minutes:0,
        submitting:false,
        success: false,
        error: false,
        errorMessage:'',
        showCreateView: false
      }
    },
     
    computed:{
        allFieldsValid() {
          if(!this.question){
            return false;
          }
          if(this.choices.length < 3){
              return false;
          }
          for(let i =1 ; i <= this.noOfchoices;i++){
            if(!this.choices[i]){
              return false;
            }
          }

          return true;
        },
        date() {
            return moment().add(this.days,'days')
                .add(this.hours,'hours').add(this.minutes,'minutes').format('YYYY-MM-DD HH:mm:ss');
        }
    },
    methods: {
      submitPoll(){

        // let choices = []
          const data =  {
            question: this.question,
            choices : this.choices.slice(1, this.noOfchoices+1),
            expiry_date: this.date
          }

          this.submitting = true;
          axios.post('/admin/polls/create', data).then((result) => {
             this.submitting = false;
             this.error = false;
             this.success = true;
            // console.log(result.data)
          }).catch((err) => {
            // console.log(err)
            this.question ='';
            showCreateView = false;
            this.choices =[];
            this.days = 1;
            this.hours = 0;
            this.minutes =0;
            this.submitting = false;
            this.success = false;
            this.error = true;
            this.errorMessage = err.response.data.message || "Error saving the poll";
          });

      }
    }

}
</script>

<style scoped>

</style>
