import Vue from "vue";
import App from "./App.vue";
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import VueRouter from "vue-router";
import Global from "./components/Global";
import router from "./router/route";
import axios from "axios";
import Vuex from "vuex";
//引入store.js
import store from "./vuex/store";
import Router from "vue-router";
const routerPush = Router.prototype.push;
Router.prototype.push = function push(location) {
  return routerPush.call(this, location).catch(error => error);
};

Vue.prototype.bus = new Vue();

Vue.use(Vuex);
Vue.prototype.Global = Global;
Vue.prototype.$axios = axios;
//注册路由

import Icon from "vue2-svg-icon/Icon.vue";
Vue.component("icon", Icon);

Vue.use(ElementUI, VueRouter);

new Vue({
  router,
  store,
  el: "#app",
  render: h => h(App)
});
