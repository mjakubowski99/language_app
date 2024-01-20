import {request, authRequest} from "./api";
import {API_ROUTES} from "@/constants/api_routes";
import type {LoginRequest} from "@/interfaces/Login";
import {saveUser} from "@/services/auth";
import {removeUser} from "@/services/auth";
import {redirectToRoute} from "@/services/navigation";

export const login = (data: LoginRequest): Promise<any> => {
    return request.post(API_ROUTES.login, data)
        .then((response) => {
            saveUser(response.data.data)
            return response
        })
        .catch((err) => alert('Nieudane logowanie'))
}

export const logout = () => {
    return authRequest.post(API_ROUTES.logout)
        .then((res) => {
            if (res.status==200) {
                removeUser()
            }
            redirectToRoute('/login')
        }).catch((err) => alert('Logout gone wrong'))
}


