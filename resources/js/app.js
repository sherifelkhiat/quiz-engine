require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import IndexComponent from './components/IndexComponent.vue';
import QuizComponent from './components/QuizComponent.vue';
import QuestionComponent from './components/QuestionComponent.vue';
import AnswerListComponent from './components/AnswerListComponent.vue';
import CreateAnswerComponent from './components/CreateAnswerComponent.vue';


const routes = [
  {
      name: 'quizs',
      path: '/front/quizs',
      component: IndexComponent
  },
  {
    name: 'quiz',
    path: '/front/quiz/:id',
    component: QuizComponent
  },
  {
      name: 'question',
      path: '/front/question/:id',
      component: QuestionComponent
  },
  {
      name: 'answers',
      path: '/front/answers',
      component: AnswerListComponent
  },
  {
      name: 'createAnswer',
      path: '/front/answer/:id/create',
      component: CreateAnswerComponent
  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#quiz');