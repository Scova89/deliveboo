/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
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



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './App.vue';

import router from "./router";

import vClickOutside from 'v-click-outside';

import vue_braintree from 'vue-braintree';


const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});

router.beforeEach((to, from, next) => {
    let temp = `DeliveBoo - ${to.meta.title}`
    if (to.meta.title) {
        document.title = temp
    } else {
        document.title = `DeliveBoo - ${to.params.title}`
    }
    next()
});

Vue.use(vClickOutside);

Vue.use(vue_braintree);