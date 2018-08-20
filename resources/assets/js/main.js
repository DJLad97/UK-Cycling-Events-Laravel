
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
//  */m 

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('races');

$(document).ready(function(){

    var modal = document.getElementById('login-modal');
    
    
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    var modal2 = document.getElementById('register-modal');

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    $('.login').click(function(){
        // $('#login-modal').css('display', 'block');
        // $('#register-modal').css('display', 'none');
    });

    $('.register').click(function(){
        $('#register-modal').css('display', 'block');
        $('#login-modal').css('display', 'none');
    });

    $('.close').click(function(){
        $('#login-form').removeClass('animate');
        $('#login-form').addClass('close-animate');
    });

    $('header nav').ready(function(){
        $('header nav').meanmenu();
    });

    $('body').click(function(e){
        // $('.modal').css('display', 'none');
    })
 
    // var modal = document.getElementById('login-modal');


    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // }

});
