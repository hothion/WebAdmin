
require('./bootstrap');
window.Vue = require('vue').default;
import VueRouter from 'vue-router';
Vue.use(VueRouter);
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('dashboard', require('./components/Dashboard.vue').default);

import dashboard from './components/Dashboard.vue';
import navigation from './components/Navigation.vue';
import listUser from './components/ListUser.vue';
import listProduct from './components/ListProduct.vue';
import listOrder from './components/ListOrder.vue';
import content from './components/Content.vue';

const routes = [
    {
        name: 'order',
        path: '/order',
        component: listOrder
    },
    {
        name: 'content',
        path: '/',
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
    }
]
  const router = new VueRouter({ mode: 'history', routes: routes});
  const app = new Vue(Vue.util.extend({ router }, navigation)).$mount('#app');

// const app = new Vue({
//     el: '#app',
// });



