require('./bootstrap');
window.Vue = require('vue').default;
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);


import App from './components/App.vue';
import LoginAdmin from './components/LoginAdmin.vue';
import Chat from './components/Chat.vue';


const routes = [
    {
        name: 'loginAdmin',
        path: '/loginAdmin',
        component: LoginAdmin
    },
    {
        name: 'chat',
        path: '/chat',
        component: Chat
    }
    
  ];
  const router = new VueRouter({ mode: 'history', routes: routes});
  const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
