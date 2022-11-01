import { request } from "./index";

export function action() {
    return request({
        method: "get",
        url: "action/action",
    });
}

export function deleteSc(data) {
    return request({
        method: "post",
        url: "action/deleteSelection",
        data,
    });
}

export function addAction(data) {
    return request({
        method: "post",
        url: "action/addAction",
        data,
    });
}

export function updateAction(data) {
    return request({
        method: "post",
        url: "action/updateAction",
        data,
    });
}

export function search(data) {
    return request({
        method: "post",
        url: "action/search",
        data,
    });
}