import { request } from "./index";

export function knowledge() {
  return request({
    method: "get",
    url: "knowledge/knowledge"
  });
}

export function getCarousel() {
  return request({
    method: "get",
    url: "knowledge/carousel"
  });
}
