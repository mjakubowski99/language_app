import Login from './pages/Login.vue';

import {route, redirect, redirectToRoute} from './services/navigation'
import {token as authToken} from './services/auth'
import {ROUTES} from "@/constants/routes";

import { createRouter, createWebHistory } from 'vue-router';
import QuizPage from "@/pages/QuizPage.vue";
import SubjectPage from "@/pages/SubjectPage.vue";
import CourseListPage from "@/pages/CourseListPage.vue";
import CoursePage from "@/pages/CoursePage.vue";

const routes= [
    {
        path: route(ROUTES.home),
        name: 'welcome',
        component: CourseListPage,
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
    {
        path: route(ROUTES.course),
        name: 'course',
        component: CoursePage,
        meta: {
            requiresAuth: false
        },
        params: true,
    },
    {
        path: route(ROUTES.courses),
        name: 'courses',
        component: CourseListPage,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: route(ROUTES.subject),
        name: 'subject',
        component: SubjectPage,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: route(ROUTES.quiz),
        name: 'quiz',
        component: QuizPage,
        meta: {
            requiresAuth: false
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
