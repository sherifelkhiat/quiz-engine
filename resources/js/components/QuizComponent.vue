<template>
  <div class="quiz" v-bind:style="{ backgroundImage: 'url(' + quiz.image + ')' }" style="height: 100vh;background-repeat:no-repeat;">
      <h1>{{ quiz.title }}</h1>
      <p>{{ quiz.description }}</p>

      <div v-if="quiz.question">
          <router-link :to="{ name: 'question', params: { id: quiz.id }}" class="btn btn-success">Start Quiz</router-link>
      </div>
      <div v-else>
        <p>No Question available</p>
      </div>
  </div>
</template>

<script>
    export default {

      data() {
        return {
          quiz: {}
        }
      },
      created() {
        let uri = `/api/quiz/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.quiz = response.data.success;
            console.log(this.questionExist);
        });
      }
    }
</script>