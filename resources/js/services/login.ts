import {request, authRequest} from ".//api";
import {ROUTES} from "../constants/routes";

const loginRequest = (data): Promise<any> => {
    data['device_name'] = window.navigator.userAgent;

    return request.post(ROUTES.login, data)
}

export {loginRequest};

