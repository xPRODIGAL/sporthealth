import { request } from "./index";

export function login(data) {
  return request({
    method: "post",
    url: "user/login",
    data
  });
}

export function register(data) {
  return request({
    method: "POST",
    url: "user/register",
    data
  });
}

export function mail(data) {
  return request({
    method: "POST",
    url: "user/mail",
    data
  });
}

export function retrieve(data) {
  return request({
    method: "POST",
    url: "user/retrieve",
    data
  });
}
