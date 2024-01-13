import Login from './pages/Login.vue';
import Main from './pages/Main.vue';

import { createRouter, createWebHistory } from 'vue-router';

const basePath = '/app'

const route = (name) => {
    return basePath+"/"+name;
}

const routes = [
    {
        path: route('/'),
        name: 'welcome',
        component: Main,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: route('/login'),
        name: 'login',
        component: Login,
    },
];

const router = createRouter({
    routes: routes,
    history: createWebHistory()
})

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth) {
        const token = localStorage.getItem('token');
        if (token) {
            next();
        } else {
            next(route('login'));
        }
    } else {
        next();
    }
});


export default router;
