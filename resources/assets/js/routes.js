import VueRouter from 'vue-router';
import store from './store';

let routes = [
    {
        path: '/',
        name: 'home',
        component: require('./components/Home.vue')
    },
    {
        path: '/races',
        component: require('./components/Races.vue')
    },
    {
        path: '/sign-up',
        component: require('./components/Register.vue')
    },
    {
        path: '/logout',
        component: require('./components/Logout.vue')
    },
    {
        path: '/race/:id',
        component: require('./components/Race.vue'),
        props: true
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    if(to.matched.some(route => route.meta.requiresAuth) && !store.getters.isLoggedIn){
        next({name: 'home'})
        return;
    }

    next();
})

export default router;