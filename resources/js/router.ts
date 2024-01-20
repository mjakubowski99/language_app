import Login from './pages/Login.vue';
import Main from './pages/Main.vue';

import {route, redirect, redirectToRoute} from './services/navigation'
import {token as authToken} from './services/auth'
import {ROUTES} from "@/constants/routes";

import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: route(ROUTES.home),
        name: 'welcome',
        component: Main,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: route(ROUTES.login),
        name: 'login',
        component: Login,
        meta: {
            guestOnly: true
        }
    },
];

const router = createRouter({
    routes: routes,
    history: createWebHistory()
})

router.beforeEach((to, from, next) => {
    const token = authToken();

    if (to.meta.requiresAuth && !token) {
        next(route(ROUTES.login));
        return;
    }
    if (to.meta.guestOnly && token) {
        next(route(ROUTES.home));
        return;
    }

    next();
});


export default router;
