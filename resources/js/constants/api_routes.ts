
export const API_ROUTES = {
    login: '/api/auth/login',
    logout: '/api/auth/logout',
    refresh_login: '/api/auth/login/refresh',
    me: '/api/auth/user/me',

    quiz: '/api/exercises/quiz/:id',

    courses: '/api/courses/',
    course: '/api/courses/:id',
    subject: '/api/courses/subjects/:id',
    subject_quiz: '/api/courses/subjects/:id/quiz'
}

export const formatParams = (route, params) => {
    let formattedRoute = route;

    for (const key in params) {
        formattedRoute = formattedRoute.replace(`:${key}`, params[key]);
    }

    return formattedRoute;
};
