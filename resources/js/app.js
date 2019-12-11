/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
// import App from './App.vue'
import store from './store'
import router from './router'
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import VueLocalStorage from 'vue-localstorage'


library.add(fas)
Vue.use(VueLocalStorage)
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('font-awesome-icon',     FontAwesomeIcon);
Vue.component('the-header-component',  require('./components/globals/TheHeaderComponent.vue').default);
Vue.component('the-footer-component',  require('./components/globals/TheFooterComponent.vue').default);

Vue.component('weekly-card-component', require('./components/pages/WeeklyCardComponent.vue').default);
// Vue.component('request-page-component', require('./components/pages/RequestPageComponent.vue').default);

Vue.component('todo-card-component',   require('./components/parts/todo/TodoCardComponent.vue').default);
Vue.component('task-card-component',   require('./components/parts/todo/TaskCardComponent.vue').default);
Vue.component('menu-component',        require('./components/parts/MenuComponent.vue').default);

/**s
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: router,
    localStorage: {        
    },
});

