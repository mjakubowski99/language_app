import axios from 'axios'
import type {InternalAxiosRequestConfig} from "axios";

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
    config.headers['Authorization'] = 'Bearer {token}';
    return config;
})

export {request, authRequest}




