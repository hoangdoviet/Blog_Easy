/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
import $ from 'jquery';
import 'select2';
import 'bootstrap';

$('.select2').select2();
$('.select2-tags').select2({tags: true});
$('#flash-overlay-modal').modal();

var laravel = {
   initialize: function() {
     this.methodLinks = $('a[data-method]');
     this.token = $('a[data-token]');
     this.registerEvents();
   },

   registerEvents: function() {
     this.methodLinks.on('click', this.handleMethod);
   },

   handleMethod: function(e) {
     var link = $(this);
     var httpMethod = link.data('method').toUpperCase();
     var form;

     // If the data-method attribute is not PUT or DELETE,
     // then we don't know what to do. Just ignore.
     if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
       return;
     }

     // Allow user to optionally provide data-confirm="Are you sure?"
     if ( link.data('confirm') ) {
       if ( ! laravel.verifyConfirm(link) ) {
         return false;
       }
     }

     form = laravel.createForm(link);
     form.submit();

     e.preventDefault();
   },

   verifyConfirm: function(link) {
     return confirm(link.data('confirm'));
   },

   createForm: function(link) {
     var form =
     $('<form>', {
       'method': 'POST',
       'action': link.attr('href')
     });

     var token =
     $('<input>', {
       'type': 'hidden',
       'name': '_token',
       'value': link.data('token')
       });

     var hiddenInput =
     $('<input>', {
       'name': '_method',
       'type': 'hidden',
       'value': link.data('method')
     });

     return form.append(token, hiddenInput)
                .appendTo('body');
   }
 };

 laravel.initialize();