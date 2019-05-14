<template>
  <div class="row justify-content-center">
          <div class="col-md-8">
          <div class="card card-default">
          <div class="card-header">Create An Answer</div>
    
    <form @submit.prevent="addAnswer" class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Outcome Type:</label>
            <select class="form-control" v-on:change="changeItem($event)" v-model="answer.outcome_type">
                <option>select answer type</option>
                <option  value="url_redirect">Redirect Url</option>
                <option  value="builder">Builder</option>
            </select>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-8" v-show="show === 'builder'">
            <div class="form-group">
              <label>Result:</label>
              <vue-editor v-model="answer.result"></vue-editor>
            </div>
          </div>
          <div class="col-md-6" v-show="show === 'url_redirect'">
            <div class="form-group">
              <label>Result:</label>
              <input class="form-control" v-model="answer.result">
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Create</button>
        </div>
    </form>
          </div>
          </div>
  </div>
</template>

<script>
import { VueEditor } from 'vue2-editor';
    export default {
      data(){
          return {
            answer:{},
            show: 'url_redirect',
            question_id:this.$route.params.id
          }
      },
      methods: {
          addAnswer(){
              this.answer.question_id = this.question_id;
              let uri = `/api/answer/create`;
              this.axios.post(uri, this.answer).then((response) => {
                  this.$router.push({path: `/front/question/${this.question_id}`});
              });
          },
          changeItem: function changeItem(event) {
              this.show =  event.target.value;
          }
      },
      components: {
         VueEditor
      }
  }
</script>