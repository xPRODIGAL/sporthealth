import { request } from "./index";

export function course() {
	return request({
		method: "get",
		url: "course/course",
	});
}

export function deleteSc(data) {
	return request({
		method: "post",
		url: "course/deleteCourse",
		data,
	});
}

export function addCourse(data) {
	return request({
		method: "post",
		url: "course/addCourse",
		data,
	});
}

export function updateCourse(data) {
	return request({
		method: "post",
		url: "course/updateCourse",
		data,
	});
}

export function search(data) {
	return request({
		method: "post",
		url: "course/searchCourse",
		data,
	});
}

export function getComment() {
	return request({
		method: "get",
		url: "course/getComment",
	});
}

export function searchComment(data) {
	return request({
		method: "post",
		url: "course/searchComment",
		data,
	});
}

export function deleteComment(data) {
	return request({
		method: "post",
		url: "course/deleteComment",
		data,
	});
}
