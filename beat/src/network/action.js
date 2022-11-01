import { request } from "./index";

export function action() {
  return request({
    method: "get",
    url: "action/action"
  });
}

export function plan() {
  return request({
    method: "get",
    url: "action/plan"
  });
}

export function getPlans(data) {
  return request({
    method: "post",
    url: "action/getPlans",
    data
  });
}
deletePlans;

export function deletePlans(data) {
  return request({
    method: "post",
    url: "action/deletePlans",
    data
  });
}

export function addPlans(data) {
  return request({
    method: "post",
    url: "action/addPlans",
    data
  });
}

export function dbPlans(data) {
  return request({
    method: "post",
    url: "action/dbPlans",
    data
  });
}
