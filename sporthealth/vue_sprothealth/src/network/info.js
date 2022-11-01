import { request } from "./index";

export function knowledge() {
    return request({
        method: "get",
        url: "knowledge/knowledge",
    });
}

export function deleteSc(data) {
    return request({
        method: "post",
        url: "knowledge/deleteselection",
        data,
    });
}

export function addMessage(data) {
    return request({
        method: "post",
        url: "knowledge/addMessage",
        data,
    });
}

export function updateMessage(data) {
    return request({
        method: "post",
        url: "knowledge/updateMessage",
        data,
    });
}

export function search(data) {
    return request({
        method: "post",
        url: "knowledge/search",
        data,
    });
}