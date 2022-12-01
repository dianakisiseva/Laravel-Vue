import './bootstrap';
import vue from 'vue'
window.Vue = vue;
import App from './components/App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
import Vue from "vue";

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
// Vue.prototype.$userId = document.querySelector("meta[name='user_id']").getAttribute('content');
// Vue.prototype.$userRoleId = document.querySelector("meta[name='user_role_id']").getAttribute('content');

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
