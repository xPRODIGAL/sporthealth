import Vue from "vue";
import App from "./App.vue";
import router from "./router";
// import "./plugins/element.js";
import ElementUI from "element-ui";
//字体图标
import "./assets/fonts/iconfont.css";
//全局样式
import "./assets/css/global.css";

import axios from "axios";

// axios.defaults.baseURL = "https://lianghj.top:8888/api/private/v1/";
// Vue.prototype.$http = axios;

Vue.use(ElementUI);

Vue.config.productionTip = false;

new Vue({
    router,
    render: (h) => h(App),
}).$mount("#app");