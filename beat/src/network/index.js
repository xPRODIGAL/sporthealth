import axios from "axios";

export function request(config) {
    // 1.创建axios实例
    const instance = axios.create({
        baseURL: "http://api.sport.com/index.php/index/",

        transformRequest: [
            function(data) {
                let postdata = new FormData();
                for (let key in data) {
                    postdata.append(key, data[key]);
                }
                return postdata;
            }
        ]
    }); // 2.拦截器的使用 // 2.1 请求拦截器

    instance.interceptors.request.use(
        config => {
            return config;
        },
        err => {
            console.log(err);
        }
    ); // 2.2 响应拦截

    instance.interceptors.response.use(
        res => {
            // console.log(res.data);
            return res.data;
        },
        err => {
            console.log(err);
        }
    ); // 3.发送真正的网络请求

    return instance(config);
}