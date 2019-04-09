<template>
  <div class="card">
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

              <p class="p-0 mb-0"> <a href="#" class="text-info" @click.prevent="noOfchoices++">Add More choices</a></p>
              
            </div>

            
              <div class="form-group d-flex pt-0">
                <label class="m-2">Poll Length:</label>
                <label class="m-2">Days:</label>
                <div class="mt-1">
                  <select class="form-control-sm" v-model="days">
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
                <button class="btn btn-info">Create</button>
              </div>

        </div>
    
    </div>
  
</template>

<script>

export default {

  
  
    data(){
      return {
        question:'',
        choices:[],
        noOfchoices:2,
        days:1,
        hours:0,
        minutes:0
        
      }
    }
}
</script>

<style scoped>

</style>
