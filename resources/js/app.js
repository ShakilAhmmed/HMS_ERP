/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueLoading from 'vuejs-loading-plugin';
import axios from 'axios';
import VueAxios from 'vue-axios';
import {routes} from './router' ;
import {filter} from './filters';
import VueToastr2 from 'vue-toastr-2';
import VueSweetalert2 from 'vue-sweetalert2';
import 'vue-toastr-2/dist/vue-toastr-2.min.css';
import Loading from './components/Loading';
window.Vue = require('vue');
window.toastr = require('toastr');

Vue.use(VueToastr2);
Vue.use(VueRouter);
Vue.use(VueLoading);
Vue.use(VueAxios, axios);

Vue.component('pagination', require('laravel-vue-pagination'));
//Preloader
Vue.use(VueLoading, {
  dark: true, // default false
  text: 'Loading', // default 'Loading'
  loading: true, // default false
  customLoader: Loading, // replaces the spinner and text with your own
  background: 'rgb(255,255,255)', // set custom background
  classes: ['myclass'] // array, object or string
});




// All Global
Vue.mixin({
    data(){
        return {
            baseUrl:"api/v1/"
        }
    },
     methods:{
         LoadingStatus:function(){
             this.$loading(true)
             setTimeout(() => this.$loading(false), 1000)
         }
     }
});




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


const router = new VueRouter({
	routes,
	mode:"history"
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
