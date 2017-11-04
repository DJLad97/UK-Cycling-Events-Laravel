
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

$(document).ready(function(){

    $('.login').click(function(){
        $('#login-modal').css('display', 'block');
    });

    // $('.close').click(function(){
    //     $('#login-form').removeClass('animate');
    //     $('#login-form').addClass('close-animate');
    // });

    $('header nav').ready(function(){
        $('header nav').meanmenu();
    });
 
    // var modal = document.getElementById('login-modal');


    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // }

});
