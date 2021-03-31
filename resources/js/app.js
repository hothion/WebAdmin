require('./bootstrap');
window.Vue = require('vue').default;
Vue.config.productionTip = false;
import VueRouter from 'vue-router';
Vue.use(VueRouter);
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('dashboard', require('./components/Dashboard.vue').default);
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);


import App from './components/App.vue';
import LoginAdmin from './components/LoginAdmin.vue';
import Chat from './components/Chat.vue';
import dashboard from './components/Dashboard.vue';
import Navigation from './components/Navigation.vue';
import listUser from './components/ListUser.vue';
import listProduct from './components/ListProduct.vue';
import listOrder from './components/ListOrder.vue';
import content from './components/Content.vue';
import ProfileAdmin from './components/ProfileAdmin.vue';
import Notification from './components/Notification.vue';
import statistic from './components/Statistic.vue';
import love from './components/Love.vue';
const routes = [
    {
        name: 'loginAdmin',
        path: '/',
        component: LoginAdmin
    },
    {
        name: 'chat',
        path: '/chat',
        component: Chat
    },
    {
        name: 'statistic',
        path: '/statistic',
        component: statistic
    },
    {
        name: 'order',
        path: '/order',
        component: listOrder
    },
    {
        name: 'content',
        path: '/content',
        component: content
    },
    {
        name: 'product',
        path: '/product',
        component: listProduct
    },
    {
        name: 'user',
        path: '/user',
        component: listUser
    },
    {
        name: 'profile',
        path: '/profile',
        component: ProfileAdmin
    },
    {
        name: 'notification',
        path: '/notification',
        component: Notification
    },
    {
        name: 'navigation',
        path: '/navigation',
        component: Navigation
    }
]
  const router = new VueRouter({ mode: 'history', routes: routes});
  const app = new Vue(Vue.util.extend({ router }, Navigation)).$mount('#app');

