<template>
  <div>
      <h1>Quizs</h1>
        <div class="row">
          <div class="col-md-10"></div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="quiz in quizs" :key="quiz.id">
                    <td>{{ quiz.name }}</td>
                    <td>{{ quiz.title }}</td>
                    <td><img :src='quiz.image' height="42" width="42"></td>
                    <td><router-link :to="{name: 'quiz', params: { id: quiz.id }}" class="btn btn-primary">Launch</router-link></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          quizs: []
        }
      },
      created() {
      let uri = '/api/quizs';
      this.axios.get(uri).then(response => {
        this.quizs = response.data.success;
      });
    }
  }
</script>
