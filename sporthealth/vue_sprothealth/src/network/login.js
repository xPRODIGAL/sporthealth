import { request } from "./index";

export function login(data) {
    return request({
        method: "post",
        url: "index/login",
        data,
    });
}

export function getUser() {
    return request({
        method: "get",
        url: "user/getUser",
    });
}