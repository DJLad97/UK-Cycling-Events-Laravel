// window.Vue = require('vue');
import './bootstrap';
import router from './routes';
import App from './App.vue';
import store from './store';
const app = new Vue({
    el: '#app',
    router,
    store,
    template: '<App/>',
    components: { App },
});

// new Vue({
//     el: '#app',
//     data: () => {
//         return {
//             races: [
//                 {name: 'Race 1', signedUp: false},
//                 {name: 'Race 2', signedUp: false},
//                 {name: 'Race 3', signedUp: true},
//                 {name: 'Race 4', signedUp: false},
//             ]
//         }
//     },
//     computed: {
//         signedUpRaces(){
//             return this.races.filter(race => race.signedUp);
//         },

//         notSignedUpRaces(){
//             return this.races.filter(race => !race.signedUp);
//         }
//     },
//     methods: {
//         signUp(race){
//             race.signedUp = true;
//         }
//     }
// }).$mount('#app');