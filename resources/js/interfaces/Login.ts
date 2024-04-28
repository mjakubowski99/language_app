
export enum UserType{
    student = 'student'
}
export interface LoginRequest {
    email: string,
    password: string,
    device_name: string,
    user_type: UserType
}

export interface LoginResponse {
    user: {
        id: string,
        email: string
    },
    token: string
}
