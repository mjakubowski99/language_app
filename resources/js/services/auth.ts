import type {LoginResponse} from "@/interfaces/Login";

const saveUser = (response: LoginResponse) => {
    localStorage.setItem('token', response.token);
    localStorage.setItem('user', JSON.stringify(response.user));
}

export const removeUser = () => {
    localStorage.removeItem('token');
    localStorage.removeItem('user');
}

const token = () => {
    return localStorage.getItem('token');
}

const user = () => {
    if (!localStorage.getItem('user')) {
        return null;
    }
    return JSON.parse(localStorage.getItem('user'));
}

export {saveUser, token, user};
