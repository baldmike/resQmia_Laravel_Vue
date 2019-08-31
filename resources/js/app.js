import Vue from 'vue' 
import VueRouter from 'vue-router'
import { router } from './router'
import BootstrapVue from 'bootstrap-vue'
import Notifications from 'vue-notification'
import Auth from './auth.js';
import VueCookie from 'vue-cookie';
import store from './store'

import Vuelidate from "vuelidate";

import 'bootstrap/dist/css/bootstrap.css'


import VueHtmlToPaper from 'vue-html-to-paper';
 
const options = {
  name: '_blank',
  specs: [
    'fullscreen=yes',
    'titlebar=yes',
    'scrollbars=yes'
  ],
  styles: [
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
    'https://unpkg.com/kidlat-css/css/kidlat.css'
  ]
}

require('./bootstrap')

Vue.use(VueHtmlToPaper, options)
Vue.use(VueRouter)
Vue.use(BootstrapVue)
Vue.use(VueCookie)
Vue.use(Notifications)
Vue.use(require('vue-moment'))
Vue.use(Vuelidate)

window.Vue = require('vue')
window.auth = new Auth()

Vue.component('main-app', require('./mainApp.vue'))
Vue.component('login-component', require('./components/LoginComponent.vue'))
Vue.component('dashboard-component', require('./components/DashboardComponent.vue'))
Vue.component('not-found', require('./components/NotFound.vue'))

window.addEventListener('load', function () { 
    const app = new Vue({ 
        el: "#app", 
        template: '<router-view></router-view>', 
        router,
        store
    })
})