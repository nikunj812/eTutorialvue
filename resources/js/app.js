/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
import {routes} from './routes';



Vue.use(VueRouter);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-user', require('./vue_user/Header.vue').default);
Vue.component('footer-user', require('./vue_user/Footer.vue').default);
Vue.component('index', require('./vue_user/Index.vue').default);
Vue.component('about', require('./vue_user/About.vue').default);
Vue.component('contact', require('./vue_user/Contact.vue').default);
Vue.component('bookdata', require('./vue_user/BookData.vue').default);
Vue.component('singlerecord', require('./vue_user/SingleRecord.vue').default);
Vue.component('userregister', require('./vue_user/UserRegister.vue').default);
Vue.component('userlogin', require('./vue_user/UserLogin.vue').default);
Vue.component('userlogin', require('./vue_user/UserLogin.vue').default);
Vue.component('searchbookdata', require('./vue_user/SearchBookdata.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    mode:'history',
    routes: routes,
})
const app = new Vue({
    el: '#app',
    router: router,
});


