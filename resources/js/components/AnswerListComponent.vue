<template>
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card card-default">
              <div class="card-header">Answer List Component</div>

              <div class="card-body" v-for="answer in answers" v-bind:key="answer.id">
                  {{ answer.result }}
              </div>
              <router-link :to="{name: 'createAnswer'}" class="btn btn-primary">Create Answer</router-link>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
        props:['answers'],
        mounted() {
            console.log(this.answers);
        }
    }
</script>