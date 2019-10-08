
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


const router = new VueRouter({
	routes,
	mode:"history"
});

const app = new Vue({
    el: '#app',
    router
});
