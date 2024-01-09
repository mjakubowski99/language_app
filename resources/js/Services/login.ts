import {request, authRequest} from "../Services/api";
import {ROUTES} from "../Constants/routes";

const loginRequest = (data): Promise<any> => {
    data['device_name'] = window.navigator.userAgent;

    return request.post(ROUTES.login, data)
}

export {loginRequest};

