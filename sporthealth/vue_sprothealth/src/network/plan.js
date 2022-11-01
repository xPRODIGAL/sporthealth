import { request } from "./index";

export function plan() {
    return request({
        method: "get",
        url: "action/plan",
    });
}

export function deletePlan(data) {
    return request({
        method: "post",
        url: "action/deletePlan",
        data,
    });
}

export function addPlan(data) {
    return request({
        method: "post",
        url: "action/addPlan",
        data,
    });
}

export function updatePlan(data) {
    return request({
        method: "post",
        url: "action/updatePlan",
        data,
    });
}

export function search(data) {
    return request({
        method: "post",
        url: "action/searchPlan",
        data,
    });
}