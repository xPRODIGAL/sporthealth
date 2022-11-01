import { request } from "./index";

export function getUser() {
	return request({
		method: "get",
		url: "user/getUser",
	});
}

export function deleteSc(data) {
	return request({
		method: "post",
		url: "user/deleteSelection",
		data,
	});
}

export function addUser(data) {
	return request({
		method: "post",
		url: "user/addUser",
		data,
	});
}

export function updateUser(data) {
	return request({
		method: "post",
		url: "user/updateUser",
		data,
	});
}

export function search(data) {
	return request({
		method: "post",
		url: "user/search",
		data,
	});
}

export function getCarousel() {
	return request({
		method: "get",
		url: "user/getCarousel",
	});
}

export function addCarousel(data) {
	return request({
		method: "post",
		url: "user/addCarousel",
		data,
	});
}

export function delCarousel(data) {
	return request({
		method: "post",
		url: "user/delCarousel",
		data,
	});
}
