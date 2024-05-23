const basePath = '/app'

export const route = (endpoint: string) => {
    const path = basePath.endsWith("/") ? basePath.slice(0,-1) : basePath;
    endpoint = endpoint.startsWith("/") ? endpoint.substring(1) : endpoint;

    return path + "/" + endpoint;
}

export const redirect = (url: string) => {
    window.location.href = url
}

export const redirectToRoute = (routeName: string) => {
    window.location.href = route(routeName);
}
