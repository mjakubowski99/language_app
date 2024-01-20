
export interface LoginRequest {
    email: string,
    password: string,
    device_name: string
}

export interface LoginResponse {
    user: {
        id: string,
        email: string
    },
    token: string
}
