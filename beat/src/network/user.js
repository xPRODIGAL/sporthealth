import { request } from "./index";

// 前台查找用户信息
export function getInfos(data) {
  return request({
    method: "post",
    url: "user/getInfos",
    data
  });
}

// 前台修改头像
export function uploadPic(data) {
  return request({
    method: "post",
    url: "user/uploadPic",
    data
  });
}

// 前台修改个人信息
export function updateInfo(data) {
  return request({
    method: "post",
    url: "user/updateInfo",
    data
  });
}

export function resetPassword(data) {
  return request({
    method: "post",
    url: "user/resetPassword",
    data
  });
}
