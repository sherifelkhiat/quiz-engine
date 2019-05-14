<template>
  <div class="row justify-content-center" style="padding: 50px 0px;">
      <div class="col-md-8">
          <div class="card card-default">
              <div class="card-header">{{ question.title }}</div>

              <div class="card-body">
                  {{ question.title }}
              </div>
          </div>
          <br><br>
          <answer-list-component v-bind:answers="question.answers"></answer-list-component>
      </div>
  </div>
</template>

<script>
import AnswerListComponent from './AnswerListComponent.vue';
import CreateAnswerComponent from './CreateAnswerComponent.vue';
    export default {
      data() {
        return {
          question: {},
          question_id:this.$route.params.id
        }
      },
      created() {
        let uri = `/api/question/${this.question_id}`;
        this.axios.get(uri).then((response) => {
            this.question = response.data.success;
        });
      },
      components: {
        'answer-list-component': AnswerListComponent,
        'create-answer-component': CreateAnswerComponent,
      }
    }
</script>


