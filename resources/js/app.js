/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('lang.js');

import VueLang from '@eli5/vue-lang-js'
// get the data source
import translations from './vue-translations.js';



window.Vue = require('vue').default;

import VueAxios from 'vue-axios';
import axios from 'axios';


Vue.use(VueAxios, axios);


Vue.use(VueLang, {
    messages: translations, // Provide locale file
    locale: document.documentElement.lang, // Set locale
    fallback: 'en' // Set fallback lacale
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

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('post-index', require('./components/Admin/posts/PostIndex.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('post-create', require('./components/Admin/posts/PostCreate.vue').default);
Vue.component('post-edit', require('./components/Admin/posts/PostEdit.vue').default);
Vue.component('post-comment', require('./components/Admin/Comment.vue').default);


Vue.component('vue-multiselect', window.VueMultiselect.default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    
});
