import axios from 'axios'
import type {InternalAxiosRequestConfig, AxiosResponse} from "axios";
import {token} from "@/services/auth";
import {saveToken} from "@/services/auth";
import {removeUser} from "@/services/auth";
import {API_ROUTES} from "@/constants/api_routes";
import {redirectToRoute} from "@/services/navigation";
import {ROUTES} from "@/constants/routes";

const makeAxios = () => axios.create({
    baseURL: 'http://localhost',
    timeout: 20000,
    headers: {
        'Content-Type': 'application/json',
    }
});

const request = makeAxios();

const authRequest = makeAxios();

authRequest.interceptors.request.use((config: InternalAxiosRequestConfig) => {
    config.headers['Authorization'] = 'Bearer ' + token();
    return config;
})

authRequest.interceptors.response.use(
    (response: AxiosResponse) => {
        if (response.status >= 200 && response.status < 300) {
            return response
        }
    },
    async (error) => {
        if (error?.response?.status === 401) {
            const req = makeAxios()

            await req.post(API_ROUTES.refresh_login, {}, {
                'headers': {
                    'Authorization': 'Bearer ' + token()
                }
            }).then((res) => {
                if (res.status === 200) {
                    saveToken(res.data['token'])
                } else {
                    removeUser()
                    redirectToRoute(ROUTES.login)
                }
            }).catch((err) => {
                removeUser()
                redirectToRoute(ROUTES.login)
            })
        }
})

export {request, authRequest}




